<?php
session_start();
require_once '../config/config.php';
?>

<?php
//filter
// Menyaring dan menyanitasi input
$username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
$nama = htmlspecialchars($_POST['full_name'], ENT_QUOTES, 'UTF-8');
$password = $_POST['password']; // Tidak perlu disanitasi, akan di-hash sebelum disimpan

// Meng-hash password sebelum disimpan ke database
$password_hash = password_hash($password, PASSWORD_DEFAULT);

if (empty($username) || empty($nama) || empty($password)) {
  echo "<script>
				alert('Data tidak boleh kosong');
				window.location.href = 'login.php';
		</script>";
} else {
  //cek
  $cek = $con->prepare("SELECT * FROM user WHERE username = ?");
  //Bind
  $cek->bindParam(1, $username);
  //Execute
  $cek->execute();

  $jml = $cek->rowCount();;

  if ($jml > 0) {
    # data ada ...
    echo "<script>
				alert('Data Sudah ada');
				window.location.href = 'login.php';
			</script>";
  } else {
    # data tidak ada ..
    $sql = "INSERT INTO user (username, full_name, password) VALUES (:username, :nama, :password)";
    $simpan = $con->prepare($sql);
    //bind
    $simpan->bindParam('username', $username);
    $simpan->bindParam('nama', $nama);
    $simpan->bindParam('password', $password_hash);
    //execute
    $simpan->execute();

    echo "<script>
					alert('Data Berhasil Disimpan, Silahkan Login!!');
					window.location.href = 'login.php';
				</script>";
  }
}
?>
