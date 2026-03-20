document.addEventListener("DOMContentLoaded", () => {
  const modalElement = document.getElementById("requestModal");

  if (!modalElement) {
    console.error("Modal not found!");
    return;
  }

  const modal = new bootstrap.Modal(modalElement);

  document.querySelectorAll(".viewBtn").forEach((btn) => {
    btn.addEventListener("click", () => {
      document.getElementById("ReliefID").textContent = btn.dataset.id;
      document.getElementById("Name").textContent = btn.dataset.name;
      document.getElementById("Type").textContent = btn.dataset.type;
      document.getElementById("Severity").textContent = btn.dataset.severity;
      document.getElementById("Status").textContent = btn.dataset.status;
      document.getElementById("Date").textContent = btn.dataset.date;
      document.getElementById("Contact").textContent = btn.dataset.contact;
      document.getElementById("Family").textContent = btn.dataset.family;
      document.getElementById("Address").textContent = btn.dataset.address;
      document.getElementById("Description").textContent =
        btn.dataset.description;

      modal.show();
    });
  });
});
