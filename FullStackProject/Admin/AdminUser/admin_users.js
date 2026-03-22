let allUsers = [];
let deleteUserID = null;

document.addEventListener("DOMContentLoaded", () => {
  const table = document.getElementById("usertable");

  fetch("admin_users.php")
    .then((res) => res.json())
    .then((data) => {
      allUsers = data;
      table.innerHTML = "";

      data.forEach((user) => {
        const tr = table.insertRow();
        tr.insertCell().textContent = user.UserID;
        tr.insertCell().textContent = user.UserName;
        tr.insertCell().textContent = user.email;
        tr.insertCell().textContent = user.UserContactNo;
        tr.insertCell().textContent = user.RegDate;

        const tdActions = tr.insertCell();
        tdActions.innerHTML = `
          <button class="btn btn-sm btn-primary view-user-btn" data-userid="${user.UserID}">
            <i class="bi bi-eye"></i> View
          </button>
          <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"
            onclick="setUserID(${user.UserID})">
            <i class="bi bi-trash"></i> Delete
          </button>
        `;
      });

      // Attach click event to all view buttons
      document.querySelectorAll(".view-user-btn").forEach((btn) => {
        btn.addEventListener("click", () => {
          const userID = btn.getAttribute("data-userid");
          openUserModal(userID);
        });
      });
    })
    .catch((err) => console.error("Fetch error:", err));
});

function openUserModal(userID) {
  const user = allUsers.find((u) => u.UserID == userID);
  if (!user) return;

  document.getElementById("name").textContent = user.UserName;
  document.getElementById("email").textContent = user.email;
  document.getElementById("phone").textContent = user.UserContactNo;
  document.getElementById("date").textContent = user.RegDate;

  const tbody = document.getElementById("reliefs");
  tbody.innerHTML = "Loading…";

  fetch(`getreliefdetails.php?userID=${userID}`)
    .then((res) => res.json())
    .then((reliefs) => {
      tbody.innerHTML = "";
      if (reliefs.length === 0) {
        tbody.innerHTML = `<tr><td colspan="5" class="text-center">No relief requests</td></tr>`;
        return;
      }

      reliefs.forEach((r) => {
        const severityClass =
          r.FloodSeverityLevel === "High"
            ? "bg-danger"
            : r.FloodSeverityLevel === "Medium"
            ? "bg-warning text-dark"
            : "bg-success";

        const typeClass =
          r.TypeofRelief === "Food"
            ? "bg-success"
            : r.TypeofRelief === "Water"
            ? "bg-info"
            : r.TypeofRelief === "Medicine"
            ? "bg-secondary"
            : "bg-danger";

        const statusClass =
          r.Status === "Pending"
            ? "bg-warning text-dark"
            : r.Status === "Approved"
            ? "bg-info"
            : "bg-success";

        const tr = tbody.insertRow();
        tr.insertCell().textContent = `#${r.ReliefID}`;
        tr.insertCell().innerHTML = `<span class="badge ${typeClass}">${r.TypeofRelief}</span>`;
        tr.insertCell().innerHTML = `<span class="badge ${severityClass}">${r.FloodSeverityLevel}</span>`;
        tr.insertCell().textContent = r.District;
        tr.insertCell().innerHTML = `<span class="badge ${statusClass}">${r.Status}</span>`;
      });
    })
    .catch((err) => {
      tbody.innerHTML = `<tr><td colspan="5" class="text-center text-danger">Error loading reliefs</td></tr>`;
      console.error("Fetch reliefs error:", err);
    });

  const userModalEl = document.getElementById("userModal1");
  const modal = new bootstrap.Modal(userModalEl);
  modal.show();
}

function setUserID(id) {
  deleteUserID = id;
}

function deleteUser() {
  document.getElementById("userID").value = deleteUserID;
  document.getElementById("deleteForm").submit();
}
