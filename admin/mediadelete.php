<?php

if (!isset($_GET['id_gambar'])) {
  echo "<script>
    window.location.href = 'index.php?page=media';
  </script>";
} else {
  $id_gambar = $_GET['id_gambar'];
  $cari = $con->prepare("SELECT * FROM slider WHERE id_gambar = ?");
  $cari->bindParam(1, $id_gambar);
  $cari->execute();

  $jumlah = $cari->rowCount();

  if ($jumlah == 0) {
    echo "<script>
       window.location.href = 'index.php?page=media';
    </script>";
  } else {
    // Ambil nama file gambar dari database
    $row = $cari->fetch(PDO::FETCH_ASSOC);
    $nama_gambar = $row['gambar_slider'];

    // Hapus data dari database
    $delete = $con->prepare("DELETE FROM slider WHERE id_gambar = ?");
    $delete->bindParam(1, $id_gambar);
    $delete->execute();

    // Hapus file gambar dari folder
    $path_to_image = '../img/img_upload/' . $nama_gambar; // Sesuaikan dengan path folder Anda
    if (file_exists($path_to_image)) {
      if (unlink($path_to_image)) {
        echo "<script>
          alert('Gambar Dihapus');
          window.location.href = 'index.php?page=media';
        </script>";
      } else {
        // data gambar berhasil dihapus, gambar difolder gagal dihapus
        echo "<script>
          alert('Gagal menghapus gambar, data berhasil dihapus');
          window.location.href = 'index.php?page=media';
        </script>";
      }
    } else {
      // data gambar berhasil dihapus, gambar difolder tidak ditemukan
      echo "<script>
        alert('Gambar tidak ditemukan, data berhasil dihapus');
        window.location.href = 'index.php?page=media';
      </script>";
    }
  }
}
