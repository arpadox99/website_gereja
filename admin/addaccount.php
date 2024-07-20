<?php


//filter
// Menyaring dan menyanitasi input
$username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
$nama = htmlspecialchars($_POST['full_name'], ENT_QUOTES, 'UTF-8');
$password = $_POST['password']; // Tidak perlu disanitasi, akan di-hash sebelum disimpan
$role = htmlspecialchars($_POST['role'], ENT_QUOTES, 'UTF-8');

// Meng-hash password sebelum disimpan ke database
$password_hash = password_hash($password, PASSWORD_DEFAULT);

if (empty($username) || empty($nama) || empty($password) || empty($role)) {
  echo "<script>
				alert('Data tidak boleh kosong');
				window.location.href = 'index.php?page=register';
		</script>";
} else {
  //cek
  $cek = $con->prepare("SELECT * FROM user WHERE id_user = ?");
  //Bind
  $cek->bindParam(1, $username);
  //Execute
  $cek->execute();

  $jml = $cek->rowCount();;

  if ($jml > 0) {
    # data ada ...
    echo "<script>
				alert('Data Sudah ada');
				window.location.href = 'index.php?page=register';
			</script>";
  } else {
    # data tidak ada ..
    $sql = "INSERT INTO user (username, full_name, password, role) VALUES (:username, :nama, :password, :role)";
    $simpan = $con->prepare($sql);
    //bind
    $simpan->bindParam('username', $username);
    $simpan->bindParam('nama', $nama);
    $simpan->bindParam('password', $password_hash);
    $simpan->bindParam('role', $role);
    //execute
    $simpan->execute();

    echo "<script>
					alert('Data Berhasil Disimpan');
					window.location.href = 'index.php?page=register';
				</script>";
  }
}
