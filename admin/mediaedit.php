<?php

// Validasi dan sanitasi input
if (isset($_GET['id_gambar']) && is_numeric($_GET['id_gambar'])) {
  // Memastikan $_GET['id_gambar'] ada dan merupakan nilai numerik
  $id_gambar = intval($_GET['id_gambar']); // Mengonversi nilai $_GET['id_gambar'] menjadi integer
} else {
  handleInvalidIdGambar(); // Memanggil fungsi handleInvalidIdGambar() jika id_gambar tidak valid
}

// Function to handle invalid id_gambar
function handleInvalidIdGambar()
{
  // Menampilkan pesan alert jika id_gambar tidak valid
  echo "
      <script>
          alert('Id Gambar tidak valid!');
          window.history.back();
      </script>
  ";
  exit; // Menghentikan eksekusi skrip PHP setelah menampilkan pesan alert
}

// Cek koneksi dan inisialisasi PDO, Jika telah menginisialisasi $con sebelumnya
// Menggunakan prepared statements untuk keamanan
$stmt = $con->prepare("SELECT * FROM slider WHERE id_gambar = :id_gambar");
$stmt->bindParam(':id_gambar', $id_gambar, PDO::PARAM_INT);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
  echo "
        <script>
            alert('Data tidak ada!');
            window.location.href='index.php?page=media';
        </script>
    ";
} else {
  // Ambil nilai role dan gambar_slider
  $role = $data['role'];
  $gambar_slider = $data['gambar_slider'];
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MEDIA </title>
    <link rel="stylesheet" href="css/styles.css">
  </head>

  <body>
    <div class="container">
      <!-- Tombol Back -->
      <div class="mt-2">
        <a class="text-dark text-decoration-none" href="index.php?page=media"><i class="fas fa-arrow-left"></i>
          Back
        </a>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header text-bg-info">
              <h3 class="text-center fw-bold my-3"> EDIT GAMBAR SLIDER </h3>
            </div>
            <div class="card-body">
              <form class="media-form" action="index.php?page=mediaupdate" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <div class="row mb-3">
                    <div class="col-md-12">
                      <div class="form-floating mb-3 mb-md-0">
                        <input type="hidden" name="id_gambar" value="<?php echo $id_gambar; ?>"> <!-- Hidden field for ID -->
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-12">
                      <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" type="text" name="judul_slider" value="<?= htmlspecialchars($data['judul_slider']) ?>" placeholder="" autocomplete="off">
                        <label for="InputDeskSlider"> Caption Slider </label>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-12">
                      <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" type="text" name="deskripsi_slider" value="<?= htmlspecialchars($data['deskripsi_slider']) ?>" placeholder="" autocomplete="off">
                        <label for="InputDeskSlider"> Deskripsi Slider </label>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-12">
                      <div class="input-group">
                        <select class="form-select" id="Role" name="role" aria-label="Example select with button addon" required>
                          <option value="0" <?= ($role == 0) ? 'selected' : '' ?>> 0. Banner </option>
                          <option value="1" <?= ($role == 1) ? 'selected' : '' ?>> 1. Ibadah Raya </option>
                          <option value="2" <?= ($role == 2) ? 'selected' : '' ?>> 2. Perjamuan Kasih </option>
                          <option value="3" <?= ($role == 3) ? 'selected' : '' ?>> 3. Persembahan Pujian </option>
                          <option value="4" <?= ($role == 4) ? 'selected' : '' ?>> 4. Ibadah Sektor </option>
                          <option value="5" <?= ($role == 5) ? 'selected' : '' ?>> 5. God's Grace Kids </option>
                          <option value="6" <?= ($role == 6) ? 'selected' : '' ?>> 6. YGSM </option>
                          <option value="7" <?= ($role == 7) ? 'selected' : '' ?>> 7. Ministries </option>
                          <option value="8" <?= ($role == 8) ? 'selected' : '' ?>> 8. Grace Worshipers Training </option>
                          <option value="9" <?= ($role == 9) ? 'selected' : '' ?>> 9. Penyerahan Anak </option>
                          <option value="10" <?= ($role == 10) ? 'selected' : '' ?>> 10. Baptisan Air </option>
                          <option value="11" <?= ($role == 11) ? 'selected' : '' ?>> 11. Worship Mission Manado </option>
                          <option value="12" <?= ($role == 12) ? 'selected' : '' ?>> 12. Worship Mission Kalteng </option>
                          <option value="13" <?= ($role == 13) ? 'selected' : '' ?>> 13. Worship Mission Waisai </option>
                          <option value="14" <?= ($role == 14) ? 'selected' : '' ?>> 14. Kunjungan Akhir Tahun </option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="gambar"> Pilih Gambar </label>
                        <input type="file" class="form-control-file" id="gambar" name="gambar"><br>
                        <small class="text-danger"> Format gambar ( png | jpg | jpeg ) Ukuran Gambar 1440px x 830px </small>
                      </div>
                    </div>
                  </div>
                  <div class="form-group" style="margin-top: 5px;">
                    <div class="d-grid gap-2 d-md-flex justify-content-md">
                      <input type="submit" class="btn btn-primary" value="UPDATE">
                    </div>
                  </div>
                  <div>
                    <?php if ($gambar_slider && $role) : ?>
                      <div class="mt-3">
                        <!-- Menentukan path gambar berdasarkan role yg diambil -->
                        <img src="../img/img_upload/<?= htmlspecialchars($role) ?>/<?= htmlspecialchars($gambar_slider) ?>" alt="Gambar Slider" style="max-width: 100%;">
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

  </html>
<?php
}
?>