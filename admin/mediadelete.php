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
    // Ambil data gambar dan role dari database
    $row = $cari->fetch(PDO::FETCH_ASSOC);
    $nama_gambar = $row['gambar_slider'];
    $role = $row['role']; // Ambil informasi role

    // Hapus data dari database
    $delete = $con->prepare("DELETE FROM slider WHERE id_gambar = ?");
    $delete->bindParam(1, $id_gambar);
    $delete->execute();

    // Hapus file gambar dari folder sesuai role
    $path_to_image = '../img/img_upload/' . htmlspecialchars($role) . '/' . htmlspecialchars($nama_gambar);
    if (file_exists($path_to_image)) {
      if (unlink($path_to_image)) {
        echo "<script>
          alert('Gambar Dihapus');
          window.location.href = 'index.php?page=media';
        </script>";
      } else {
        // Data gambar berhasil dihapus, gambar di folder gagal dihapus
        echo "<script>
          alert('Gagal menghapus gambar, data berhasil dihapus');
          window.location.href = 'index.php?page=media';
        </script>";
      }
    } else {
      // Data gambar berhasil dihapus, gambar di folder tidak ditemukan
      echo "<script>
        alert('Gambar tidak ditemukan, data berhasil dihapus');
        window.location.href = 'index.php?page=media';
      </script>";
    }
  }
}
