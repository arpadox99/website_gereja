<?php

// Menangkap dan menyaring input POST dari formulirs
// $id_jadwal = filter_var($_POST['id_jadwal'], FILTER_SANITIZE_STRING);
$hari_tgl = filter_var($_POST['hari_tgl'], FILTER_SANITIZE_STRING);
$waktu_ibadah = filter_var($_POST['waktu_ibadah'], FILTER_SANITIZE_STRING);
$jenis_keg = filter_var($_POST['jenis_keg'], FILTER_SANITIZE_STRING);
$lokasi_ibadah = filter_var($_POST['lokasi_ibadah'], FILTER_SANITIZE_STRING);

// Memeriksa apakah semua input tidak kosong
if (empty($hari_tgl) || empty($waktu_ibadah) || empty($jenis_keg) || empty($lokasi_ibadah)) {
  // Jika ada input yang kosong, tampilkan pesan peringatan dan kembalikan ke halaman jadwal
  echo "<script>
          alert('Data Tidak Boleh Kosong');
          window.location.href = 'index.php?page=jadwal';
      </script>";
} else {
  // Jika semua input terisi, lakukan pembaruan data ke database
  try {
    // SQL query untuk memperbarui jadwal ibadah
    $sql = "UPDATE jadwal_ibadah SET hari_tgl = :hari_tgl, waktu_ibadah = :waktu_ibadah, jenis_keg = :jenis_keg, 
                lokasi_ibadah = :lokasi_ibadah WHERE hari_tgl = :hari_tgl ";

    // Mempersiapkan statement untuk eksekusi
    $update = $con->prepare($sql);
    // Mengikat parameter dengan nilai dari input
    $update->bindParam('id_jadwal', $id_jadwal);
    $update->bindParam('hari_tgl', $hari_tgl);
    $update->bindParam('waktu_ibadah', $waktu_ibadah);
    $update->bindParam('jenis_keg', $jenis_keg);
    $update->bindParam('lokasi_ibadah', $lokasi_ibadah);

    // Menjalankan statement
    $update->execute();

    // Menampilkan pesan sukses dan kembali ke halaman jadwal
    echo "<script>
            alert('Data Berhasil Diubah');
            window.location.href = 'index.php?page=jadwal';
        </script>";
  } catch (PDOException $e) {
    // Menangkap dan menampilkan pesan error jika terjadi kesalahan pada eksekusi SQL
    echo "Error: " . $e->getMessage();
  }
}
