document.addEventListener("DOMContentLoaded", function () {
  // Ambil elemen tombol dan teks
  const toggleText1Button = document.getElementById("toggleText1");
  const toggleText2Button = document.getElementById("toggleText2");
  const toggleText3Button = document.getElementById("toggleText3");
  const text1 = document.getElementById("text1");
  const text2 = document.getElementById("text2");
  const text3 = document.getElementById("text3");

  // Fungsi untuk menyembunyikan semua teks
  function hideAllText() {
    text1.classList.add("hidden");
    text2.classList.add("hidden");
    text3.classList.add("hidden");
    toggleText1Button.textContent = "Praise & Worship";
    toggleText2Button.textContent = "Usher Kolektan";
    toggleText3Button.textContent = "Prayer";
  }

  // Tambahkan event listener untuk tombol "Tampilkan/Sembunyikan Teks 1"
  toggleText1Button.addEventListener("click", function () {
    if (text1.classList.contains("hidden")) {
      hideAllText(); // Sembunyikan semua teks terlebih dahulu
      text1.classList.remove("hidden"); // Tampilkan teks 1
      toggleText1Button.textContent = "Praise & Worship"; // Ubah teks tombol
    } else {
      text1.classList.add("hidden"); // Sembunyikan teks 1
      toggleText1Button.textContent = "Praise & Worship"; // Ubah teks tombol
    }
  });

  // Tambahkan event listener untuk tombol "Tampilkan/Sembunyikan Teks 2"
  toggleText2Button.addEventListener("click", function () {
    if (text2.classList.contains("hidden")) {
      hideAllText(); // Sembunyikan semua teks terlebih dahulu
      text2.classList.remove("hidden"); // Tampilkan teks 2
      toggleText2Button.textContent = "Usher Kolektan"; // Ubah teks tombol
    } else {
      text2.classList.add("hidden"); // Sembunyikan teks 2
      toggleText2Button.textContent = "Usher Kolektan"; // Ubah teks tombol
    }
  });

  // Tambahkan event listener untuk tombol "Tampilkan/Sembunyikan Teks 3"
  toggleText3Button.addEventListener("click", function () {
    if (text3.classList.contains("hidden")) {
      hideAllText(); // Sembunyikan semua teks terlebih dahulu
      text3.classList.remove("hidden"); // Tampilkan teks 3
      toggleText3Button.textContent = "Prayer"; // Ubah teks tombol
    } else {
      text3.classList.add("hidden"); // Sembunyikan teks 3
      toggleText3Button.textContent = "Prayer"; // Ubah teks tombol
    }
  });
});
