const searchButton = document.querySelector(".search-button");
const keyword = document.querySelector(".keyword");
const wrapMenu = document.querySelector(".wrap-menu-page");

keyword.addEventListener("keyup", function () {
  const xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      wrapMenu.innerHTML = xhr.responseText;
    }
  };

  xhr.open("GET", "ajax/search_menu.php?keyword=" + keyword.value, true);
  xhr.send();
});
