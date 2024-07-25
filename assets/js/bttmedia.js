let goTopBtn = document.getElementById("goTopBtn");

window.onscroll = function () {
  scrollFunction();
};

window.onload = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 11000 ||
    document.documentElement.scrollTop > 11000
  ) {
    goTopBtn.style.display = "flex";
  } else {
    goTopBtn.style.display = "none";
  }
}

function scrollToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}