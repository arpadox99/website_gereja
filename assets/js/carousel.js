document.addEventListener("DOMContentLoaded", function () {
  // Mendapatkan semua elemen carousel berdasarkan kelas
  var carousels = document.querySelectorAll(".carousel");

  // Membuat instance IntersectionObserver untuk memantau elemen-elemen carousel
  var observer = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        // Jika elemen masuk ke dalam viewport (threshold tercapai)
        if (entry.isIntersecting) {
          // Menginisialisasi carousel Bootstrap untuk elemen yang terlihat
          var carousel = new bootstrap.Carousel(entry.target, {
            interval: 5000, // Interval rotasi carousel dalam milidetik, bisa diubah sesuai kebutuhan
          });
          // Berhenti mengamati elemen setelah carousel diinisialisasi
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.1 }
  ); // Threshold 0.1 berarti elemen harus terlihat setidaknya 10% dalam viewport

  // Memulai pengamatan terhadap setiap elemen carousel
  carousels.forEach(function (carousel) {
    observer.observe(carousel);
  });
});
