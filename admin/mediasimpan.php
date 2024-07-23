<?php
// Menganggap bahwa $con adalah objek koneksi database Anda

// Validasi dan sanitasi data input
$judul_slider = filter_var($_POST['judul_slider'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$deskripsi_slider = filter_var($_POST['deskripsi_slider'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$role = filter_var($_POST['role'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

// Mendapatkan informasi file yang diunggah
$nama_files = $_FILES['gambar']['name'];
$tmp_files = $_FILES['gambar']['tmp_name'];
$size_files = $_FILES['gambar']['size'];
$allowed_extensions = ['png', 'jpg', 'jpeg']; // Ekstensi file yang diperbolehkan

// Mengecek apakah nama file atau role kosong
if (empty($nama_files) || empty($role)) {
    echo "<script>
            alert('Gambar harap Dipilih!!');
            window.history.back();
        </script>";
    exit();
}

// Membuat direktori berdasarkan role jika belum ada
$role_dir = "../img/img_upload/$role";
if (!file_exists($role_dir)) {
    mkdir($role_dir, 0777, true);
}

// Cek apakah file adalah array atau bukan
$files = is_array($nama_files) ? $nama_files : [$nama_files];
$tmp_files = is_array($tmp_files) ? $tmp_files : [$tmp_files];
$size_files = is_array($size_files) ? $size_files : [$size_files];

$fileCount = count($files);
for ($i = 0; $i < $fileCount; $i++) {
    $nama_file = $files[$i];
    $tmp_file = $tmp_files[$i];
    $size_file = $size_files[$i];

    // Mengecek tipe file dengan memeriksa ekstensi
    $tipe = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));

    // Validasi tipe file
    if (!in_array($tipe, $allowed_extensions)) {
        echo "<script>
                alert('File $nama_file tidak support!!');
                window.history.back();
            </script>";
        continue;
    }

    // Validasi ukuran file
    if ($size_file >= 3000000) {
        echo "<script>
                alert('File $nama_file tidak boleh > 3MB!!');
                window.history.back();
            </script>";
        continue;
    }

    // Menyiapkan pernyataan SQL untuk penyimpanan ke DB
    $sql = "INSERT INTO slider (gambar_slider, judul_slider, deskripsi_slider, role) VALUES (:gambar_slider, :judul_slider, :deskripsi_slider, :role)";
    $simpan = $con->prepare($sql);

    // Mengikat parameter
    $simpan->bindParam(':gambar_slider', $nama_file);
    $simpan->bindParam(':judul_slider', $judul_slider);
    $simpan->bindParam(':deskripsi_slider', $deskripsi_slider);
    $simpan->bindParam(':role', $role);

    // Menjalankan kueri
    $simpan->execute();

    // Memindahkan file yang diunggah ke direktori tujuan
    if (move_uploaded_file($tmp_file, "$role_dir/$nama_file")) {
        echo "<script>
                alert('File $nama_file berhasil di-upload!!');
            </script>";
    } else {
        echo "<script>
                alert('Terjadi kesalahan saat meng-upload file $nama_file.');
            </script>";
    }
}

// Mengarahkan kembali ke halaman media setelah selesai
echo "<script>
        window.location.href = 'index.php?page=media';
    </script>";
