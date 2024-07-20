<?php

// Menangkap dan menyaring input POST dari formulir
$judul_slider = filter_var($_POST['judul_slider'], FILTER_SANITIZE_STRING);
$deskripsi_slider = filter_var($_POST['deskripsi_slider'], FILTER_SANITIZE_STRING);
$role = filter_var($_POST['role'], FILTER_SANITIZE_STRING);

// File upload handling
$nama_file = $_FILES['gambar']['name'];
$size_file = $_FILES['gambar']['size'];
$tmp_file = $_FILES['gambar']['tmp_name'];

// Check file type
$step1 = strtolower($nama_file);
$step2 = explode(".", $step1);
$tipe = end($step2);

// Memeriksa apakah input tidak kosong
if (empty($role) || empty($nama_file)) {
  // Jika ada input yang kosong, tampilkan pesan peringatan dan kembalikan ke halaman mediaedit
  echo "<script>
          alert('Data Tidak Boleh Kosong');
          window.history.back();
        </script>";
} else if (!in_array($tipe, ['png', 'jpg', 'jpeg'])) {
  // Jika tipe file tidak didukung, tampilkan pesan peringatan dan kembalikan ke halaman mediaadd
  echo "<script>
          alert('File tidak support!!');
          window.history.back();
        </script>";
} else if ($size_file >= 3000000) {
  // Jika ukuran file melebihi 3MB, tampilkan pesan peringatan
  echo "<script>
          alert('File tidak boleh > 3MB!!');
          window.history.back();
        </script>";
} else {
  // Jika semua input terisi dan file sesuai kriteria, lakukan pembaruan data ke database
  try {
    // Ambil nama file gambar lama dari database
    $query = $con->prepare("SELECT gambar_slider FROM slider WHERE judul_slider = :judul_slider");
    $query->bindParam(':judul_slider', $judul_slider);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $gambar_lama = $result['gambar_slider'];

    // SQL query untuk memperbarui data slider berdasarkan judul_slider
    $sql = "UPDATE slider SET deskripsi_slider = :deskripsi_slider, role = :role, gambar_slider = :gambar_slider WHERE judul_slider = :judul_slider";

    // Mempersiapkan statement untuk eksekusi
    $update = $con->prepare($sql);
    // Mengikat parameter dengan nilai dari input
    $update->bindParam(':judul_slider', $judul_slider);
    $update->bindParam(':deskripsi_slider', $deskripsi_slider);
    $update->bindParam(':role', $role);
    $update->bindParam(':gambar_slider', $nama_file);

    // Menjalankan statement
    $update->execute();

    // Move uploaded file to destination directory
    $target_directory = "../img/img_upload/";
    $target_file = $target_directory . $nama_file;

    if (move_uploaded_file($tmp_file, $target_file)) {
      // Jika file berhasil diupload, hapus file lama jika ada
      if (!empty($gambar_lama) && file_exists($target_directory . $gambar_lama)) {
        unlink($target_directory . $gambar_lama);
      }

      // Menampilkan pesan sukses dan kembali ke halaman media
      echo "<script>
              alert('Data Berhasil Diubah');
              window.location.href = 'index.php?page=media';
            </script>";
    } else {
      // Jika file gagal diupload, tampilkan pesan error
      echo "<script>
              alert('Gagal mengupload file');
              window.history.back();
            </script>";
    }
  } catch (PDOException $e) {
    // Menangkap dan menampilkan pesan error jika terjadi kesalahan pada eksekusi SQL
    echo "Error: " . $e->getMessage();
  }
}
