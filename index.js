// saveDataQ
const insertQuestions = () => {
  const notes = document.querySelector("#questionTextarea").value;

  const questionsData = {
    notes,
  };

  const questionsDataKey = `questionsData_${Date.now()}`;
  localStorage.setItem(questionsDataKey, JSON.stringify(questionsData));
};

const insertUser = () => {
  const name = document.getElementById("nameUp").value;
  const username = document.getElementById("usernameUp").value;
  const password = document.getElementById("passwordUp").value;
  const gender = document.querySelector('input[name="gender"]:checked').value;
  const city = document.getElementById("city").value;

  const registrationData = {
    name,
    username,
    password,
    gender,
    city,
  };

  const registrationDataKey = `registrationData_${Date.now()}`;
  localStorage.setItem(registrationDataKey, JSON.stringify(registrationData));
};

const insertLogin = () => {
  const username = document.getElementById("usernameIn").value;
  const password = document.getElementById("passwordIn").value;

  const loginData = {
    username,
    password,
  };

  const loginDataKey = `loginData_${Date.now()}`;
  localStorage.setItem(loginDataKey, JSON.stringify(loginData));
};

$(document).ready(function () {
  // Toggle accordion on click
  $(".accordion").click(function () {
    var $collapse = $(this).find(".collapse");
    $collapse.stop().slideToggle("fast");
  });

  $(".images").click(function () {
    var index = $(".images").index(this) + 1; // Index starts from 0, so add 1
    var url = `accordionExample${index}.html`;
    window.location.href = url;
  });

  $(".images").hover(
    function () {
      $(this).css("cursor", "pointer");
    },
    function () {
      $(this).css("cursor", "auto");
    }
  );
});

function openLoginRegisterModal() {
  $("#loginRegisterModal").modal("show");
}

const priceRange = document.getElementById("priceRange");
const minPriceDisplay = document.getElementById("minPrice");
const maxPriceDisplay = document.getElementById("maxPrice");

priceRange.addEventListener("input", function () {
  const minPrice = "$" + this.value;
  const maxPrice = "$" + this.max;

  minPriceDisplay.textContent = minPrice;
  maxPriceDisplay.textContent = maxPrice;
});
