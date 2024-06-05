document.addEventListener("DOMContentLoaded", function () {
  // Ambil elemen tombol dan teks
  const toggleText1Button = document.getElementById("toggleText1");
  const toggleText2Button = document.getElementById("toggleText2");
  const toggleText3Button = document.getElementById("toggleText3");
  const text1 = document.getElementById("text1");
  const text2 = document.getElementById("text2");
  const text3 = document.getElementById("text3");

  // Fungsi untuk menyembunyikan semua teks dan menghapus kelas warna dari tombol
  function hideAllText() {
    text1.classList.add("hidden");
    text2.classList.add("hidden");
    text3.classList.add("hidden");
    toggleText1Button.textContent = "Praise & Worship";
    toggleText2Button.textContent = "Usher Kolektan";
    toggleText3Button.textContent = "Prayer";
    toggleText1Button.classList.remove("colored");
    toggleText2Button.classList.remove("colored");
    toggleText3Button.classList.remove("colored");
  }

  // Tambahkan event listener untuk tombol "Tampilkan/Sembunyikan Teks 1"
  toggleText1Button.addEventListener("click", function () {
    if (text1.classList.contains("hidden")) {
      hideAllText(); // Sembunyikan semua teks terlebih dahulu
      text1.classList.remove("hidden"); // Tampilkan teks 1
      toggleText1Button.textContent = "Praise & Worship"; // Ubah teks tombol
      toggleText1Button.style.backgroundColor = "#b6a9ff"; // Tambahkan kelas warna
      toggleText1Button.style.boxShadow = "0 0 30px #b6a9ff"; // Tambahkan kelas shadow
    } else {
      text1.classList.add("hidden"); // Sembunyikan teks 1
      toggleText1Button.textContent = "Praise & Worship"; // Ubah teks tombol
      toggleText1Button.style.backgroundColor = "#fff"; // Tambahkan kelas warna
      toggleText1Button.style.boxShadow = "0 0 30px #b6a9ff"; // Tambahkan kelas shadow
    }
  });

  // Tambahkan event listener untuk tombol "Tampilkan/Sembunyikan Teks 2"
  toggleText2Button.addEventListener("click", function () {
    if (text2.classList.contains("hidden")) {
      hideAllText(); // Sembunyikan semua teks terlebih dahulu
      text2.classList.remove("hidden"); // Tampilkan teks 2
      toggleText2Button.textContent = "Usher Kolektan"; // Ubah teks tombol
      toggleText2Button.classList.add("colored"); // Tambahkan kelas warna
    } else {
      text2.classList.add("hidden"); // Sembunyikan teks 2
      toggleText2Button.textContent = "Usher Kolektan"; // Ubah teks tombol
      toggleText2Button.classList.remove("colored"); // Hapus kelas warna
    }
  });

  // Tambahkan event listener untuk tombol "Tampilkan/Sembunyikan Teks 3"
  toggleText3Button.addEventListener("click", function () {
    if (text3.classList.contains("hidden")) {
      hideAllText(); // Sembunyikan semua teks terlebih dahulu
      text3.classList.remove("hidden"); // Tampilkan teks 3
      toggleText3Button.textContent = "Prayer"; // Ubah teks tombol
      toggleText3Button.classList.add("colored"); // Tambahkan kelas warna
    } else {
      text3.classList.add("hidden"); // Sembunyikan teks 3
      toggleText3Button.textContent = "Prayer"; // Ubah teks tombol
      toggleText3Button.classList.remove("colored"); // Hapus kelas warna
    }
  });

  // Tambahkan event listener untuk efek hover pada tombol
  function addHoverEffect(button) {
    button.addEventListener("mouseover", function () {
      button.classList.add("hovered");
    });

    button.addEventListener("mouseout", function () {
      button.classList.remove("hovered");
    });
  }

  addHoverEffect(toggleText1Button);
  addHoverEffect(toggleText2Button);
  addHoverEffect(toggleText3Button);
});
