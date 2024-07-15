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
              <a class="nav-link" href="info.php"> Info </a>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link active" aria-current="page" href="#ministries"> Ministries </a>
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
    <div id="ministries">
      <img src="../img/Ministries/mix.png" class="mx-auto d-block img-fluid" id="info1">
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="custom-border">
            <h2>OUR MINISTRIES</h2>
          </div>
        </div>
      </div>
    </div><br>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="button-container" id="bc1">
            <button id="toggleText1" type="button" class="btn">
              <a href="#text1"> Praise & Worship </a>
            </button>
            <span id="jsspan"></span>
            <button id="toggleText2" type="button" class="btn">
              <a href="#text2"> Usher Kolektan </a>
            </button>
          </div>
        </div>
      </div>
      <div class="row2">
        <div class="col-md-12">
          <div class="button-container" id="bc2">
            <button id="toggleText3" type="button" class="btn">
              <a href="#text3"> Prayer </a>
            </button>
          </div>
        </div>
      </div>
      <div id="text1" class="hidden">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <img src="../img/Ministries/praise.jpg" alt="Praise & Worship">
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="text-box purple-box">Praise & Worship <br> "Grace Worshippers Training" </span> </div>
              </div>
              <div class=" row">
                <div class="content">
                  <p class="fontjs">
                    Khusus pelayanan di bidang Praise & Worship wajib mengikuti Grace Worshippers Training (GWT)
                    kurang lebih selama 1 Tahun. Di GWT terdapat Class Vocal, Music seperti Gitar, Bass, Keyboard,
                    Drum, Singer, Worship Leader, dan Creative Ministry (Dance, Tamborin dan Banner).
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div><br>
      </div>
      <div id="text2" class="hidden">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <img src="../img/Ministries/usher.jpg" alt="Usher Kolektan">
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="text-box purple-box"> Usher Kolektan </div>
              </div>
              <div class=" row">
                <div class="content">
                  <p class="fontjs">
                    Jemaat yang terlibat sebagai pelayan Usher dan Kolektan adalah jemaat yang berkomitmen sebagai jemaat tetap dan ditentukan oleh kepala Departemen Pastoral.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div><br>
      </div>
      <div id="text3" class="hidden">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <img src="../img/Ministries/prayer.jpg" alt="Prayer">
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="text-box purple-box"> Prayer </div>
              </div>
              <div class=" row">
                <div class="content">
                  <p class="fontjs">
                    Bagi jemaat yang terbeban dan terpanggil untuk berdoa bagi dunia, bangsa dan negara, gereja, serta jiwa-jiwa bagi kerajaan Allah, dapat terlibat sebagai pendoa syafaat.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><br>
    </div>
    <div class="ministriesfooter">
      <img src="../img/Ministries/toserve.png" class="mx-auto d-block img-fluid">
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
  <script src="../assets/js/toggle.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
  </script>
</body>

</html>