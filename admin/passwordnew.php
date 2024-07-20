<?php

if (!isset($_SESSION['username'])) {
  header('Location: index.php?page=password');
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Periksa apakah password baru dan konfirmasi password telah diisi
  if (isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
    $new_password = htmlspecialchars($_POST['new_password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);

    if ($new_password == $confirm_password) {
      if (strlen($new_password) >= 8) { // Pastikan panjang password minimal 8 karakter
        $username = $_SESSION['username'];

        // Hash password baru
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        try {
          // Update password di database
          $query = "UPDATE user SET password = :password WHERE username = :username";
          $stmt = $con->prepare($query);
          $stmt->bindValue(':password', $hashed_password);
          $stmt->bindValue(':username', $username);

          if ($stmt->execute()) {
            echo "<script>
                    alert('Password berhasil direset.');
                    window.location.href = 'index.php?page=password';
                  </script>";
            unset($_SESSION['username']);
          } else {
            echo "<script>
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                    window.history.back();
                  </script>";
          }
        } catch (PDOException $e) {
          echo "<script>
                  alert('Terjadi kesalahan pada database: ');
                  window.history.back();
                </script>" . $e->getMessage();
        }
      } else {
        echo "<script>
              alert('Password harus minimal 8 karakter.');
              window.history.back();
            </script>";
      }
    } else {
      echo "<script>
              alert('Password tidak sesuai. Silakan coba lagi.');
              window.history.back();
            </script>";
    }
  }
}
?>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      background-image: url('../img/bgad.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
      margin: 0;
    }
  </style>
  <title> Atur Ulang Password Admin </title>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
          <div class="card-header text-bg-danger">
            <h3 class="text-center text-light fw-bold my-4"> Atur Ulang Password Admin </h3>
          </div>
          <div class="card-body">
            <div class="small mb-3 text-muted"> Enter Password. </div>
            <form action="index.php?page=passwordnew" method="POST">
              <div class="form-floating mb-3">
                <input class="form-control" id="username" name="new_password" type="password" required />
                <label for="new_password"> Password Baru </label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control" id="username" name="confirm_password" type="password" required />
                <label for="confirm_password"> Konfirmasi Password </label>
              </div>
              <div class="text-center mt-4 mb-0">
                <button class="btn btn-primary" type="submit"> Reset Password </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>