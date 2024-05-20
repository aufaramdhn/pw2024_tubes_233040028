document.addEventListener("DOMContentLoaded", function () {
  const navToggle = document.querySelector(".nav-toggle");
  const sideBar = document.querySelector(".sidebar");
  const arrow = document.querySelector(".nav-toggle i");
  const titles = document.querySelectorAll(".nav-title");
  const navLinks = document.querySelectorAll(".nav-list a");

  if (sideBar && navToggle && arrow && titles) {
    navToggle.addEventListener("click", () => {
      sideBar.classList.toggle("slide");
      arrow.classList.toggle("ri-arrow-right-s-line");

      titles.forEach((title) => {
        title.classList.toggle("hide");
      });
    });

    navLinks.forEach((link) => {
      link.addEventListener("click", (event) => {
        event.stopPropagation();
      });
    });
  } else {
    console.error("One or more elements not found.");
  }
});