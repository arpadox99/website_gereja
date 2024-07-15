<?php
session_start();
require_once '../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>GBI GOD'S GRACE</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="icon" href="../img/Logo/gbi.png" />
</head>

<body>
  <!-- navBar -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark" aria-label="Ninth navbar example">
      <div class="container-xl d-flex justify-content-center align-items-center">
        <a class="navbar-brand fw-bolder" href="#">
          <img src="../img/Logo/gbi.png" width="50" height="50" alt="GBI">
          <img src="../img/Logo/ggm.png" width="50" height="50" alt="GGM">
        </a>
        <a class="navbar-brand fw-bolder">
          GOD'S GRACE <span class="lighttext">MINISTRY </span>
        </a>
        <div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07XL" aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarsExample07XL">
          <ul class="navbar-nav ml-auto col-lg-10 justify-content-center">
            <li class="nav-item px-3">
              <a class="nav-link" href="../index.php"> Home </a>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link" href="services.php"> Services </a>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link active" aria-current="page" href="#info"> Info </a>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link" href="ministries.php"> Ministries </a>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link" href="media.php"> Media </a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item px-3">
              <a class="nav-link" href="../login/login.php">
                <i class="fas fa-sign-in-alt"></i> Login
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!-- navBar -->

  <!-- isi -->
  <div>
    <div id="info">
      <img src="../img/info/bninfo.png" class="mx-auto d-block img-fluid" id="info1">
    </div>
    <div class="container">
      <div class="row tabel">
        <div class="col-md-3">
          <div class="row">
            <div class="col-12">
              <h4 class="kop">
                <img src="../img/Logo/gbi.png" class="img-fluid" id="x">
                JADWAL IBADAH GBI GOD'S GRACE
                <img src="../img/Logo/ggm.png" class="img-fluid" id="x">
              </h4>
              <hr class="thick-hr" style="height: 4px;">
            </div>
          </div>
          <div class=" row">
            <div class="col-md-6">
              <img src="../img/Logo/gbi.png" class="img-fluid" id="gambartabel">
            </div>
            <div class="col-md-6">
              <img src="../img/Logo/ggm.png" class="img-fluid ggm" id="gambartabel">
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="row">
            <div class="table-responsive table-condensed">
              <table class="table table-striped align-middle table-bordered mt-2">
                <caption> <q>Jadwal Ibadah di gereja GBI God's Grace Pusat Kota Ambon</q> </caption>
                <thead class="table">
                  <tr class="align-middle">
                    <th> HARI </th>
                    <th> WAKTU IBADAH</th>
                    <th> JENIS IBADAH </th>
                    <th> LOKASI IBADAH </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $sql = $con->query("SELECT * FROM jadwal_ibadah");
                  while ($r = $sql->fetch()) {
                    echo "
                                      <tr align='center'>
                                          <td>$r[hari_tgl]</td>
                                          <td>$r[waktu_ibadah]</td>
                                          <td>$r[jenis_keg]</td>
                                          <td>$r[lokasi_ibadah]</td>
                                      </tr>
                                  ";
                    $no++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div><br>
    <div>
      <div>
        <img src="../img/info/kontak.png" class="mx-auto d-block img-fluid" alt="info-kontak">
      </div>
      <div class="container">
        <div class="d-flex justify-content-start align-items-start">
          <div class="contactwa">
            <a target="_blank" href="https://wa.link/3c0b6w" class="wa-button">
              <div class="IconWhatsapp">
                <img src="../img/Logo/wa.png" alt="Whatsapp">
              </div>
              Hubungi kami via whatsapp
            </a>
          </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
          <div class="card QR">
            <img src="../img/Info/QR.png" alt="QR">
            <div class="card-body">
              SCAN ME!
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- isi -->

  <!-- footer -->
  <div>
    <footer class="link-light bg-dark">
      <div class="mx-0 p-3 row justify-content-between ">
        <div class="col-auto">
          <small>
            &copy; <script>
              document.write(new Date().getFullYear());
            </script> GOD'S GRACE
          </small>
        </div>
        <div class="col-auto">
          <div>
            <a target="_blank" class="socialfooter" href="https://www.facebook.com/church.grace.940" title="Facebook GBI">
              <img src="../img/facebook.png" width="30" height="30" alt="FB">
            </a>
            <a target="_blank" class="socialfooter" href="https://www.instagram.com/gbigodsgrace" title="Instagram GBI">
              <img src="../img/instagram.png" width="30" height="30" alt="IG">
            </a>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!-- footer -->

  <script src="https://kit.fontawesome.com/08f3c3a570.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
  </script>
</body>

</html>