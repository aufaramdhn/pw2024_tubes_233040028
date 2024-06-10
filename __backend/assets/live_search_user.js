const searchButton = document.querySelector(".search-button");
const keyword = document.querySelector(".keyword-user");
const table = document.querySelector(".table-user");

keyword.addEventListener("keyup", function () {
  const xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      table.innerHTML = xhr.responseText;
    }
  };

  xhr.open("GET", "ajax/search_user.php?keyword=" + keyword.value, true);
  xhr.send();
});
