const btnToggle = document.querySelector(".dropdown");
const dropdown = document.querySelector(".dropdown-menu");

const menuToggle = document.querySelector(".menu-toggle input");
const navBar = document.querySelector(".navbar");

menuToggle.addEventListener("click", function () {
  navBar.classList.toggle("slide");
});

// Define the function to toggle dropdown
function toggleDropdown() {
  dropdown.classList.toggle("hidden");
}

// Attach event listener to the button
btnToggle.addEventListener("click", toggleDropdown);

function previewImage() {
  const image = document.querySelector(".image");
  const imgPreview = document.querySelector(".img-preview");

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result;
  };
}

function previewImage() {
  const image = document.querySelector(".image");
  const imgPreview = document.querySelector(".img-preview");

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result;
  };
}

function closeAlert() {
  const AlertClose = document.querySelectorAll("alert");
  AlertClose.classList.add("none");
}
