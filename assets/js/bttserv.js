let goTopBtn = document.getElementById("goTopBtn");

window.onscroll = function () {
  scrollFunction();
};

window.onload = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 3500 ||
    document.documentElement.scrollTop > 3500
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