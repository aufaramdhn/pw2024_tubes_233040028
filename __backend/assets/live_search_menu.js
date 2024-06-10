const searchButton = document.querySelector(".search-button");
const keywordM = document.querySelector(".keyword-menu");
const tableM = document.querySelector(".table-menu");

keywordM.addEventListener("keyup", function () {
  const xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      tableM.innerHTML = xhr.responseText;
    }
  };

  xhr.open("GET", "ajax/search_menu.php?keyword=" + keyword.value, true);
  xhr.send();
});
