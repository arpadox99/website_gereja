<?php

// Menangkap dan menyaring input POST dari formulir
$judul_slider = filter_var($_POST['judul_slider'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$deskripsi_slider = filter_var($_POST['deskripsi_slider'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$role = filter_var($_POST['role'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id_gambar = filter_var($_POST['id_gambar'], FILTER_SANITIZE_NUMBER_INT); // Menggunakan ID unik sebagai alternatif

// File upload handling
$nama_file = $_FILES['gambar']['name'];
$size_file = $_FILES['gambar']['size'];
$tmp_file = $_FILES['gambar']['tmp_name'];

// Check file type
$step1 = strtolower($nama_file);
$step2 = explode(".", $step1);
$tipe = end($step2);

// Memeriksa apakah input tidak kosong
if (empty($role)) {
  echo "<script>
            alert('Data Tidak Boleh Kosong');
            window.history.back();
          </script>";
} else if (!empty($nama_file) && !in_array($tipe, ['png', 'jpg', 'jpeg'])) {
  echo "<script>
            alert('File tidak support!!');
            window.history.back();
          </script>";
} else if (!empty($nama_file) && $size_file >= 3000000) {
  echo "<script>
            alert('File tidak boleh > 3MB!!');
            window.history.back();
          </script>";
} else {
  try {
    // Ambil data lama dari database
    $query = $con->prepare("SELECT gambar_slider, role FROM slider WHERE id_gambar = :id_gambar");
    $query->bindParam(':id_gambar', $id_gambar);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $gambar_lama = $result['gambar_slider'];
    $role_lama = $result['role'];

    // SQL query untuk memperbarui data slider
    $sql = "UPDATE slider SET judul_slider = :judul_slider, deskripsi_slider = :deskripsi_slider, role = :role";
    if (!empty($nama_file)) {
      $sql .= ", gambar_slider = :gambar_slider";
    }
    $sql .= " WHERE id_gambar = :id_gambar";

    $update = $con->prepare($sql);
    $update->bindParam(':id_gambar', $id_gambar);
    $update->bindParam(':judul_slider', $judul_slider);
    $update->bindParam(':deskripsi_slider', $deskripsi_slider);
    $update->bindParam(':role', $role);
    if (!empty($nama_file)) {
      $update->bindParam(':gambar_slider', $nama_file);
    }
    $update->execute();

    // Proses upload dan penghapusan file lama
    if (!empty($nama_file)) {
      // Create role directory if it doesn't exist
      $role_dir = "../img/img_upload/$role";
      if (!file_exists($role_dir)) {
        mkdir($role_dir, 0777, true);
      }

      // Move uploaded file to destination directory
      $target_file = "$role_dir/$nama_file";
      if (move_uploaded_file($tmp_file, $target_file)) {
        // Jika file berhasil diupload, hapus file lama jika ada
        if (!empty($gambar_lama)) {
          $old_file_path = "../img/img_upload/$role_lama/$gambar_lama";
          if (file_exists($old_file_path)) {
            unlink($old_file_path);
          }
        }
      } else {
        // Jika file gagal diupload, tampilkan pesan error
        echo "<script>
                        alert('Gagal mengupload file');
                        window.history.back();
                      </script>";
        exit;
      }
    }

    // Menampilkan pesan sukses dan kembali ke halaman media
    echo "<script>
                alert('Data Berhasil Diubah');
                window.location.href = 'index.php?page=media';
              </script>";
  } catch (PDOException $e) {
    // Menangkap dan menampilkan pesan error jika terjadi kesalahan pada eksekusi SQL
    echo "Error: " . $e->getMessage();
  }
}
