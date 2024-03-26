// search.js


document.addEventListener("DOMContentLoaded", function () {
  var input = document.getElementById("searchInput");
  var searchList = document.createElement("div");
  searchList.id = "search-list";
  document.body.appendChild(searchList);

  var names = ["bleach" , "attack on titan" , "my hero academia" , "parasyte" , "one piece"];

  // Event listener to show the list when the input is focused
  input.addEventListener("focus", showSearchList);

  // Event listener for input changes
  input.addEventListener("input", filterSearchList);

  // Event listener to close the list when clicking outside the input or search list
  document.addEventListener("click", function (event) {
    if (event.target !== input) {
      searchList.style.display = "none";
    }
  });

  function showSearchList() {
    filterSearchList();
    searchList.style.display = "block";
  }

  function filterSearchList() {
    var inputValue = input.value.toLowerCase();

    searchList.innerHTML = "";

    var filteredNames = names.filter(function (name) {
      return name.toLowerCase().includes(inputValue);
    });

    for (var i = 0; i < filteredNames.length; i++) {
      var link = document.createElement("a");
      link.href = "#";
      link.innerText = filteredNames[i];
      link.onclick = function () {
        input.value = this.innerText;
        searchList.style.display = "none";
      };

      link.style.display = "block";
      link.style.padding = "8px";
      link.style.borderBottom = "1px solid #ccc";
      link.style.backgroundColor = "white";
      link.style.textDecoration = "none";

      searchList.appendChild(link);
    }

    if (filteredNames.length === 0) {
      searchList.style.display = "none";
    } else {
      searchList.style.display = "block";
    }

    var inputRect = input.getBoundingClientRect();
    searchList.style.position = "absolute";
    searchList.style.top = inputRect.bottom + "px";
    searchList.style.left = inputRect.left + "px";
  }

  // Add an event listener to the search button
  var searchButton = document.getElementById("search");
  searchButton.addEventListener("click", search);

  function search() {
    var inputValue = input.value;
    alert("Searching for: " + inputValue);
    searchList.style.display = "none";
  }
});


