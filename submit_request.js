document.addEventListener("DOMContentLoaded", () => {
  const params = new URLSearchParams(window.location.search);
  if (params.get("success") === "1") {
    alert("Request created successfully!");
  } else if (params.get("success") === "2") {
    alert("Request updated successfully!");
  }
  window.history.replaceState({}, document.title, window.location.pathname);
});
