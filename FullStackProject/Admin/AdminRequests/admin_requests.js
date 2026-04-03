document.addEventListener("DOMContentLoaded", () => {
  const cardsContainer = document.getElementById("cardsContainer");
  const modal = new bootstrap.Modal(document.getElementById("requestModal"));

  const filterType = document.getElementById("filterType");
  const filterSeverity = document.getElementById("filterSeverity");
  const filterDistrict = document.getElementById("filterDistrict");

  let allRequests = [];

  fetch("admin_requests.php")
    .then((res) => res.json())
    .then((data) => {
      allRequests = data;

      const districts = [
        ...new Set(allRequests.map((req) => req.District)),
      ].sort();
      districts.forEach((d) => {
        const opt = document.createElement("option");
        opt.value = d;
        opt.textContent = d;
        filterDistrict.appendChild(opt);
      });

      renderCards(allRequests);
    });

  function renderCards(requests) {
    cardsContainer.innerHTML = "";
    requests.forEach((req) => {
      let border =
        req.FloodSeverityLevel === "High"
          ? "danger"
          : req.FloodSeverityLevel === "Medium"
          ? "warning"
          : "success";
      let badge =
        req.FloodSeverityLevel === "High"
          ? "danger"
          : req.FloodSeverityLevel === "Medium"
          ? "warning text-dark"
          : "success";

      const col = document.createElement("div");
      col.className = "col-lg-6";

      const approveSection =
        req.Status === "Approved"
          ? `<button class="btn btn-danger btn-sm rejectBtn">
         <i class="bi bi-x-circle me-1"></i>Reject
       </button>`
          : `<button class="btn btn-success btn-sm approveBtn">
         <i class="bi bi-check-circle me-1"></i>Approve
       </button>`;

      col.innerHTML = `
        <div class="card border-${border} border-2 shadow-sm h-100">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start mb-3">
              <div>
                <h5 class="card-title fw-bold mb-1">Relief ID #${
                  req.ReliefID
                }</h5>
                <small class="text-muted"><i class="bi bi-person me-1"></i>${
                  req.UserName
                }</small>
              </div>
              <span class="badge bg-${badge} rounded-pill px-3 py-2">${
        req.FloodSeverityLevel
      } Priority</span>
              </div>

            <div class="mb-3">
              <span class="badge bg-success me-2"><i class="bi bi-basket me-1"></i>${
                req.TypeofRelief
              }</span>
              <span class="badge ${
                req.Status === "Approved"
                  ? "bg-success text-white"
                  : "bg-warning text-dark"
              }"><i class="bi bi-calendar3 me-1"></i>${req.date}</span>
            </div>

            <div class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i><strong>Location:</strong> ${
              req.Address
            }</div>
            <div class="mb-2"><i class="bi bi-telephone text-primary me-2"></i><strong>Contact:</strong> ${
              req.ContactPersonNumber
            }</div>
            <div class="mb-3"><i class="bi bi-people text-primary me-2"></i><strong>Family Members:</strong> ${
              req.NoOfFamilyMembers
            }</div>

            <div class="border-top pt-3">
              <button class="btn btn-primary btn-sm viewBtn"><i class="bi bi-eye me-1"></i>View Details</button>
              ${approveSection}
            </div>
          </div>
        </div>
      `;

      const approveBtn = col.querySelector(".approveBtn");
      if (approveBtn) {
        approveBtn.addEventListener("click", () => {
          fetch("approve.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `ReliefID=${req.ReliefID}`,
          })
            .then((res) => res.json())
            .then((resp) => {
              if (resp.success) {
                const badge = document.createElement("span");
                badge.className = "badge bg-success text-white";
                badge.textContent = "Approved";
                req.Status = "Approved";
                renderCards(allRequests);

                alert(`Relief ID #${req.ReliefID} approved successfully!`);
              }
            });
        });
      }

      const rejectBtn = col.querySelector(".rejectBtn");
      if (rejectBtn) {
        rejectBtn.addEventListener("click", () => {
          fetch("reject.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `ReliefID=${req.ReliefID}`,
          })
            .then((res) => res.json())
            .then((resp) => {
              if (resp.success) {
                const approveBtnNew = document.createElement("button");
                approveBtnNew.className = "btn btn-success btn-sm approveBtn";
                approveBtnNew.innerHTML =
                  '<i class="bi bi-check-circle me-1"></i>Approve';

                req.Status = "Pending";
                renderCards(allRequests);

                alert(`Relief ID #${req.ReliefID} rejected successfully!`);
              }
            });
        });
      }

      col.querySelector(".viewBtn").addEventListener("click", () => {
        document.getElementById("modalReliefID").textContent = req.ReliefID;
        document.getElementById("modalName").textContent =
          req.ContactPersonName;
        document.getElementById("modalType").textContent = req.TypeofRelief;
        document.getElementById("modalSeverity").textContent =
          req.FloodSeverityLevel;
        document.getElementById("modalStatus").textContent = req.Status;
        document.getElementById("modalDate").textContent = req.date;
        document.getElementById("modalContact").textContent =
          req.ContactPersonNumber;
        document.getElementById("modalFamily").textContent =
          req.NoOfFamilyMembers;
        document.getElementById("modalAddress").textContent = req.Address;
        document.getElementById("modalDescription").textContent =
          req.Description;
        modal.show();
      });

      cardsContainer.appendChild(col);
    });
  }

  [filterType, filterSeverity, filterDistrict].forEach((drop) => {
    drop.addEventListener("change", () => {
      const type = filterType.value;
      const severity = filterSeverity.value;
      const district = filterDistrict.value;

      const filtered = allRequests.filter(
        (req) =>
          (type === "" || req.TypeofRelief === type) &&
          (severity === "" || req.FloodSeverityLevel === severity) &&
          (district === "" || req.District === district)
      );

      renderCards(filtered);
    });
  });

  const resetFilter = document.getElementById("resetFilter");

  resetFilter.addEventListener("click", () => {
    filterType.value = "";
    filterSeverity.value = "";
    filterDistrict.value = "";

    renderCards(allRequests);
  });
});
