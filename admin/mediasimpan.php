<?php
// Assuming $con is your database connection object

// Validate and sanitize input data
$judul_slider = filter_var($_POST['judul_slider'], FILTER_SANITIZE_STRING);
$deskripsi_slider = filter_var($_POST['deskripsi_slider'], FILTER_SANITIZE_STRING);
$role = filter_var($_POST['role'], FILTER_SANITIZE_STRING);

// File upload handling
$nama_file = $_FILES['gambar']['name'];
$tmp_file = $_FILES['gambar']['tmp_name'];
$size_file = $_FILES['gambar']['size'];

// Check file type
$step1 = strtolower($nama_file);
$step2 = explode(".", $step1);
$tipe = end($step2);

// Check if role is empty
if (empty($nama_file) || empty($role)) {
    echo "<script>
            alert('Gambar harap Dipilih!!');
            window.history.back();
        </script>";
} else {
    // Check if data already exists in database
    $cek = $con->prepare("SELECT * FROM slider WHERE id_gambar = ?");
    $cek->bindParam(1, $id_gambar);
    $cek->execute();
    $jumlah = $cek->rowCount();

    if ($jumlah > 0) {
        echo "<script>
                alert('Data Sudah Ada');
                window.history.back();
            </script>";
    } else if (!in_array($tipe, ['png', 'jpg', 'jpeg'])) {
        echo "<script>
                alert('File tidak support!!');
                window.history.back();
            </script>";
    } else if ($size_file >= 3000000) {
        echo "<script>
                alert('File tidak boleh > 3MB!!');
                window.history.back();
            </script>";
    } else {
        // Prepare SQL statement for insertion
        $sql = "INSERT INTO slider (gambar_slider, judul_slider, deskripsi_slider, role) VALUES (:gambar_slider, :judul_slider, :deskripsi_slider, :role)";
        $simpan = $con->prepare($sql);

        // Bind parameters
        $simpan->bindParam(':gambar_slider', $nama_file);
        $simpan->bindParam(':judul_slider', $judul_slider);
        $simpan->bindParam(':deskripsi_slider', $deskripsi_slider);
        $simpan->bindParam(':role', $role);

        // Execute query
        $simpan->execute();

        // Move uploaded file to destination directory
        move_uploaded_file($tmp_file, "../img/img_upload/" . $nama_file);

        echo "<script>
                alert('Gambar Berhasil di Upload!!');
                window.location.href = 'index.php?page=media';
            </script>";
    }
}
