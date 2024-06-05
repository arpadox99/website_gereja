// Mendapatkan semua elemen navbar
var navItems = document.querySelectorAll(".navbar-nav .nav-item");

// Menambahkan event listener ke setiap elemen navbar
navItems.forEach(function (item) {
  item.addEventListener("click", function () {
    // Menghapus class 'active' dari semua elemen navbar
    navItems.forEach(function (item) {
      item.classList.remove("active");
    });
    // Menambahkan class 'active' ke elemen yang diklik
    this.classList.add("active");
  });
});