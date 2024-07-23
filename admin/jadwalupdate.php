<?php

// Menangkap dan menyaring input POST dari formulir
$id_jadwal = filter_var($_POST['id_jadwal'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$hari_tgl = filter_var($_POST['hari_tgl'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$waktu_ibadah = filter_var($_POST['waktu_ibadah'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$jenis_keg = filter_var($_POST['jenis_keg'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$lokasi_ibadah = filter_var($_POST['lokasi_ibadah'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

// Memeriksa apakah semua input tidak kosong
if (empty($id_jadwal) || empty($hari_tgl) || empty($waktu_ibadah) || empty($jenis_keg) || empty($lokasi_ibadah)) {
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
                lokasi_ibadah = :lokasi_ibadah WHERE id_jadwal = :id_jadwal";

    // Mempersiapkan statement untuk eksekusi
    $update = $con->prepare($sql);

    // Mengikat parameter dengan nilai dari input
    $update->bindParam(':id_jadwal', $id_jadwal);
    $update->bindParam(':hari_tgl', $hari_tgl);
    $update->bindParam(':waktu_ibadah', $waktu_ibadah);
    $update->bindParam(':jenis_keg', $jenis_keg);
    $update->bindParam(':lokasi_ibadah', $lokasi_ibadah);

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
