const btnToggle = document.querySelector(".dropdown");
const dropdown = document.querySelector(".dropdown-menu");

const menuToggle = document.querySelector(".menu-toggle input");
const navBar = document.querySelector(".navbar");

menuToggle.addEventListener("click", function () {
  navBar.classList.toggle("slide");
});

function toggleDropdown() {
  dropdown.classList.toggle("hidden");
}

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

function closeAlert() {
  const AlertClose = document.querySelector(".alert");
  AlertClose.classList.add("hidden");
}
