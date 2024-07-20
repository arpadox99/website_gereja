<?php
if (!isset($_GET['id_jadwal'])) {
  echo "<script>
    window.location.href = 'index.php?page=jadwal';
  </script>";
} else {
  $id_jadwal = $_GET['id_jadwal'];
  $cari = $con->prepare("SELECT * FROM jadwal_ibadah WHERE id_jadwal = ? ");
  $cari->bindParam(1, $id_jadwal);
  $cari->execute();

  $jumlah = $cari->rowCount();

  if ($jumlah == 0) {
    echo "<script>
       window.location.href = 'index.php?page=jadwal';
    </script>";
  } else {
    $delete = $con->prepare("DELETE FROM jadwal_ibadah WHERE id_jadwal = ? ");
    $delete->bindParam(1, $id_jadwal);
    $delete->execute();

    echo "<script>
          alert('Data Berhasil Dihapus');
          window.location.href = 'index.php?page=jadwal';
        </script>";
  }
}
