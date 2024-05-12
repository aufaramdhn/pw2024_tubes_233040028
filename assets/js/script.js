document.addEventListener("DOMContentLoaded", function () {
  const btnToggle = document.querySelector(".toggle-dropdown");
  const dropdown = document.querySelector(".dropdown");

  // Define the function to toggle dropdown
  function toggleDropdown() {
    dropdown.classList.toggle("hidden");
  }

  // Attach event listener to the button
  btnToggle.addEventListener("click", toggleDropdown);
});
