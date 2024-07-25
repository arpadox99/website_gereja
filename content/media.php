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
          <img src="../img/Logo/gbi.png" width="50px" height="50px" alt="GBI">
          <img src="../img/Logo/ggm.png" width="50px" height="50px" alt="GGM">
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
              <a class="nav-link" href="ministries.php"> Ministries </a>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link active" aria-current="page" href="media.php"> Media </a>
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
  <div id="media">
    <img src="../img/media/banner.jpg" class="mx-auto d-block img-fluid" alt="banner media">
    <div class="container mt-4" id="ibadah raya - IR">
      <?php
      include '../config/config.php';

      // Ambil role dari query parameter atau variabel lain
      $role = isset($_GET['role']) ? $_GET['role'] : '1'; // Ganti dengan nilai role yang sesuai

      // Ambil data gambar dari database berdasarkan role
      $cari = $con->prepare("SELECT gambar_slider FROM slider WHERE role = ?");
      $cari->bindParam(1, $role);
      $cari->execute();

      $jumlah = $cari->rowCount();
      ?>
      <div id="carousel1" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
        <div class="carousel-indicators">
          <!-- Loop untuk membuat indikator slide berdasarkan jumlah slide ($jumlah) -->
          <?php for ($i = 0; $i < $jumlah; $i++) : ?>
            <button type="button" data-bs-target="#carousel1" data-bs-slide-to="<?= $i ?>" <?= $i === 0 ? 'class="active" aria-current="true"' : '' ?> aria-label="Slide <?= $i + 1 ?>"></button>
          <?php endfor; ?>
        </div>
        <div class="carousel-inner">
          <?php
          $isActive = true; // Menandai slide pertama sebagai aktif
          // Loop untuk menampilkan slide berdasarkan data dari database
          while ($row = $cari->fetch(PDO::FETCH_ASSOC)) :
            $gambar_slider = htmlspecialchars($row['gambar_slider']); // Mengamankan output gambar dari database
            $path_to_image = "../img/img_upload/" . htmlspecialchars($role) . "/" . $gambar_slider; // Menentukan path gambar di folder 
          ?>
            <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
              <img src="<?= $path_to_image ?>" class="mx-auto d-block img-fluid w-100" alt="Slide">
            </div>
            <?php
            $isActive = false; // Menonaktifkan status aktif setelah slide pertama
            ?>
          <?php endwhile; ?>
        </div>
        <div class="carousel-caption d-md-block">
          <h3> IBADAH RAYA </h3>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel1" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel1" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
    </div> <br>
    <div class="container mt-4" id="perjamuan kasih - PK">
      <?php
      include '../config/config.php';
      // Ambil role dari query parameter atau variabel lain
      $role = isset($_GET['role']) ? $_GET['role'] : '2'; // Ganti dengan nilai role yang sesuai

      // Ambil data gambar dari database berdasarkan role
      $cari = $con->prepare("SELECT gambar_slider FROM slider WHERE role = ?");
      $cari->bindParam(1, $role);
      $cari->execute();

      $jumlah = $cari->rowCount();
      ?>

      <div id="carousel2" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
        <div class="carousel-indicators">
          <!-- Loop untuk membuat indikator slide berdasarkan jumlah slide ($jumlah) -->
          <?php for ($i = 0; $i < $jumlah; $i++) : ?>
            <button type="button" data-bs-target="#carousel2" data-bs-slide-to="<?= $i ?>" <?= $i === 0 ? 'class="active" aria-current="true"' : '' ?> aria-label="Slide <?= $i + 1 ?>"></button>
          <?php endfor; ?>
        </div>
        <div class="carousel-inner">
          <?php
          $isActive = true; // Menandai slide pertama sebagai aktif
          // Loop untuk menampilkan slide berdasarkan data dari database
          while ($row = $cari->fetch(PDO::FETCH_ASSOC)) :
            $gambar_slider = htmlspecialchars($row['gambar_slider']); // Mengamankan output gambar dari database
            $path_to_image = "../img/img_upload/" . htmlspecialchars($role) . "/" . $gambar_slider; // Menentukan path gambar di folder 
          ?>
            <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
              <img src="<?= $path_to_image ?>" class="mx-auto d-block img-fluid w-100" alt="Slide">
            </div>
            <?php
            $isActive = false; // Menonaktifkan status aktif setelah slide pertama
            ?>
          <?php endwhile; ?>
        </div>
        <div class="carousel-caption d-md-block">
          <h3> PERJAMUAN KASIH </h3>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel2" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel2" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
    </div> <br>
    <div class="container mt-4" id="pujian suara - PJS">
      <?php
      include '../config/config.php';
      // Ambil role dari query parameter atau variabel lain
      $role = isset($_GET['role']) ? $_GET['role'] : '3'; // Ganti dengan nilai role yang sesuai

      // Ambil data gambar dari database berdasarkan role
      $cari = $con->prepare("SELECT gambar_slider FROM slider WHERE role = ?");
      $cari->bindParam(1, $role);
      $cari->execute();

      $jumlah = $cari->rowCount();
      ?>

      <div id="carousel3" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
        <div class="carousel-indicators">
          <!-- Loop untuk membuat indikator slide berdasarkan jumlah slide ($jumlah) -->
          <?php for ($i = 0; $i < $jumlah; $i++) : ?>
            <button type="button" data-bs-target="#carousel3" data-bs-slide-to="<?= $i ?>" <?= $i === 0 ? 'class="active" aria-current="true"' : '' ?> aria-label="Slide <?= $i + 1 ?>"></button>
          <?php endfor; ?>
        </div>
        <div class="carousel-inner">
          <?php
          $isActive = true; // Menandai slide pertama sebagai aktif
          // Loop untuk menampilkan slide berdasarkan data dari database
          while ($row = $cari->fetch(PDO::FETCH_ASSOC)) :
            $gambar_slider = htmlspecialchars($row['gambar_slider']); // Mengamankan output gambar dari database
            $path_to_image = "../img/img_upload/" . htmlspecialchars($role) . "/" . $gambar_slider; // Menentukan path gambar di folder 
          ?>
            <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
              <img src="<?= $path_to_image ?>" class="mx-auto d-block img-fluid w-100" alt="Slide">
            </div>
            <?php
            $isActive = false; // Menonaktifkan status aktif setelah slide pertama
            ?>
          <?php endwhile; ?>
        </div>
        <div class="carousel-caption d-md-block">
          <h3> PERSEMBAHAN PUJIAN SETIAP SEKTOR </h3>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel3" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel3" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
    </div> <br>
    <!-- Caption Sektor Pisah -->
    <div class="container mt-4" id="ibadah sektor - IS">
      <?php
      include '../config/config.php';
      // Ambil role dari query parameter atau variabel lain
      $role = isset($_GET['role']) ? $_GET['role'] : '4'; // Ganti dengan nilai role yang sesuai

      // Ambil data gambar, judul, dan deskripsi dari database berdasarkan role
      $cari = $con->prepare("SELECT gambar_slider, judul_slider, deskripsi_slider FROM slider WHERE role = ?");
      $cari->bindParam(1, $role);
      $cari->execute();

      $jumlah = $cari->rowCount();
      ?>
      <div id="carousel4" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
        <div class="carousel-indicators">
          <!-- Loop untuk membuat indikator slide berdasarkan jumlah slide ($jumlah) -->
          <?php for ($i = 0; $i < $jumlah; $i++) : ?>
            <button type="button" data-bs-target="#carousel4" data-bs-slide-to="<?= $i ?>" <?= $i === 0 ? 'class="active" aria-current="true"' : '' ?> aria-label="Slide <?= $i + 1 ?>"></button>
          <?php endfor; ?>
        </div>
        <div class="carousel-inner">
          <?php
          $isActive = true; // Menandai slide pertama sebagai aktif
          $slideData = []; // Array untuk menyimpan data slide

          // Loop untuk menampilkan slide berdasarkan data dari database
          while ($row = $cari->fetch(PDO::FETCH_ASSOC)) {
            $slideData[] = $row;
          }

          foreach ($slideData as $index => $slide) :
            $gambar_slider = htmlspecialchars($slide['gambar_slider']); // Mengamankan output gambar dari database
            $judul_slider = htmlspecialchars($slide['judul_slider']); // Mengamankan output judul dari database
            $deskripsi_slider = htmlspecialchars($slide['deskripsi_slider']); // Mengamankan output deskripsi dari database
            $path_to_image = "../img/img_upload/" . htmlspecialchars($role) . "/" . $gambar_slider; // Menentukan path gambar di folder 
          ?>
            <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
              <img src="<?= $path_to_image ?>" class="mx-auto d-block img-fluid w-100" alt="Slide">
              <div class="carousel-caption d-md-block">
                <h3><?= $judul_slider ?></h3>
                <p><?= $deskripsi_slider ?></p>
              </div>
            </div>
          <?php
            $isActive = false; // Menonaktifkan status aktif setelah slide pertama
          endforeach;
          ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel4" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel4" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
    </div> <br>
    <!-- Caption Sektor Pisah -->
    <div class="container mt-4" id="god grace kids - GGK">
      <?php
      include '../config/config.php';
      // Ambil role dari query parameter atau variabel lain
      $role = isset($_GET['role']) ? $_GET['role'] : '5'; // Ganti dengan nilai role yang sesuai

      // Ambil data gambar dari database berdasarkan role
      $cari = $con->prepare("SELECT gambar_slider FROM slider WHERE role = ?");
      $cari->bindParam(1, $role);
      $cari->execute();

      $jumlah = $cari->rowCount();
      ?>

      <div id="carousel5" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
        <div class="carousel-indicators">
          <!-- Loop untuk membuat indikator slide berdasarkan jumlah slide ($jumlah) -->
          <?php for ($i = 0; $i < $jumlah; $i++) : ?>
            <button type="button" data-bs-target="#carousel5" data-bs-slide-to="<?= $i ?>" <?= $i === 0 ? 'class="active" aria-current="true"' : '' ?> aria-label="Slide <?= $i + 1 ?>"></button>
          <?php endfor; ?>
        </div>
        <div class="carousel-inner">
          <?php
          $isActive = true; // Menandai slide pertama sebagai aktif
          // Loop untuk menampilkan slide berdasarkan data dari database
          while ($row = $cari->fetch(PDO::FETCH_ASSOC)) :
            $gambar_slider = htmlspecialchars($row['gambar_slider']); // Mengamankan output gambar dari database
            $path_to_image = "../img/img_upload/" . htmlspecialchars($role) . "/" . $gambar_slider; // Menentukan path gambar di folder 
          ?>
            <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
              <img src="<?= $path_to_image ?>" class="mx-auto d-block img-fluid w-100" alt="Slide">
            </div>
            <?php
            $isActive = false; // Menonaktifkan status aktif setelah slide pertama
            ?>
          <?php endwhile; ?>
        </div>
        <div class="carousel-caption d-md-block">
          <h3> GOD'S GRACE KIDS </h3>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel5" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel5" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
    </div> <br>
    <div class="container mt-4" id="youth grace ministry - YGSM">
      <?php
      include '../config/config.php';
      // Ambil role dari query parameter atau variabel lain
      $role = isset($_GET['role']) ? $_GET['role'] : '6'; // Ganti dengan nilai role yang sesuai

      // Ambil data gambar dari database berdasarkan role
      $cari = $con->prepare("SELECT gambar_slider FROM slider WHERE role = ?");
      $cari->bindParam(1, $role);
      $cari->execute();

      $jumlah = $cari->rowCount();
      ?>

      <div id="carousel6" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
        <div class="carousel-indicators">
          <!-- Loop untuk membuat indikator slide berdasarkan jumlah slide ($jumlah) -->
          <?php for ($i = 0; $i < $jumlah; $i++) : ?>
            <button type="button" data-bs-target="#carousel6" data-bs-slide-to="<?= $i ?>" <?= $i === 0 ? 'class="active" aria-current="true"' : '' ?> aria-label="Slide <?= $i + 1 ?>"></button>
          <?php endfor; ?>
        </div>
        <div class="carousel-inner">
          <?php
          $isActive = true; // Menandai slide pertama sebagai aktif
          // Loop untuk menampilkan slide berdasarkan data dari database
          while ($row = $cari->fetch(PDO::FETCH_ASSOC)) :
            $gambar_slider = htmlspecialchars($row['gambar_slider']); // Mengamankan output gambar dari database
            $path_to_image = "../img/img_upload/" . htmlspecialchars($role) . "/" . $gambar_slider; // Menentukan path gambar di folder 
          ?>
            <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
              <img src="<?= $path_to_image ?>" class="mx-auto d-block img-fluid w-100" alt="Slide">
            </div>
            <?php
            $isActive = false; // Menonaktifkan status aktif setelah slide pertama
            ?>
          <?php endwhile; ?>
        </div>
        <div class="carousel-caption d-md-block">
          <h3> YOUTH GRACE MINISTRY </h3>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel6" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel6" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
    </div> <br>
    <div class="container mt-4" id="melayani - MLYN">
      <?php
      include '../config/config.php';
      // Ambil role dari query parameter atau variabel lain
      $role = isset($_GET['role']) ? $_GET['role'] : '7'; // Ganti dengan nilai role yang sesuai

      // Ambil data gambar dari database berdasarkan role
      $cari = $con->prepare("SELECT gambar_slider FROM slider WHERE role = ?");
      $cari->bindParam(1, $role);
      $cari->execute();

      $jumlah = $cari->rowCount();
      ?>

      <div id="carousel7" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
        <div class="carousel-indicators">
          <!-- Loop untuk membuat indikator slide berdasarkan jumlah slide ($jumlah) -->
          <?php for ($i = 0; $i < $jumlah; $i++) : ?>
            <button type="button" data-bs-target="#carousel7" data-bs-slide-to="<?= $i ?>" <?= $i === 0 ? 'class="active" aria-current="true"' : '' ?> aria-label="Slide <?= $i + 1 ?>"></button>
          <?php endfor; ?>
        </div>
        <div class="carousel-inner">
          <?php
          $isActive = true; // Menandai slide pertama sebagai aktif
          // Loop untuk menampilkan slide berdasarkan data dari database
          while ($row = $cari->fetch(PDO::FETCH_ASSOC)) :
            $gambar_slider = htmlspecialchars($row['gambar_slider']); // Mengamankan output gambar dari database
            $path_to_image = "../img/img_upload/" . htmlspecialchars($role) . "/" . $gambar_slider; // Menentukan path gambar di folder 
          ?>
            <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
              <img src="<?= $path_to_image ?>" class="mx-auto d-block img-fluid w-100" alt="Slide">
            </div>
            <?php
            $isActive = false; // Menonaktifkan status aktif setelah slide pertama
            ?>
          <?php endwhile; ?>
        </div>
        <div class="carousel-caption d-md-block">
          <h3> MELAYANI </h3>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel7" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel7" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
    </div> <br>
    <div class="container mt-4" id="grace worshipers training - GWT">
      <?php
      include '../config/config.php';
      // Ambil role dari query parameter atau variabel lain
      $role = isset($_GET['role']) ? $_GET['role'] : '8'; // Ganti dengan nilai role yang sesuai

      // Ambil data gambar dari database berdasarkan role
      $cari = $con->prepare("SELECT gambar_slider FROM slider WHERE role = ?");
      $cari->bindParam(1, $role);
      $cari->execute();

      $jumlah = $cari->rowCount();
      ?>

      <div id="carousel8" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
        <div class="carousel-indicators">
          <!-- Loop untuk membuat indikator slide berdasarkan jumlah slide ($jumlah) -->
          <?php for ($i = 0; $i < $jumlah; $i++) : ?>
            <button type="button" data-bs-target="#carousel8" data-bs-slide-to="<?= $i ?>" <?= $i === 0 ? 'class="active" aria-current="true"' : '' ?> aria-label="Slide <?= $i + 1 ?>"></button>
          <?php endfor; ?>
        </div>
        <div class="carousel-inner">
          <?php
          $isActive = true; // Menandai slide pertama sebagai aktif
          // Loop untuk menampilkan slide berdasarkan data dari database
          while ($row = $cari->fetch(PDO::FETCH_ASSOC)) :
            $gambar_slider = htmlspecialchars($row['gambar_slider']); // Mengamankan output gambar dari database
            $path_to_image = "../img/img_upload/" . htmlspecialchars($role) . "/" . $gambar_slider; // Menentukan path gambar di folder 
          ?>
            <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
              <img src="<?= $path_to_image ?>" class="mx-auto d-block img-fluid w-100" alt="Slide">
            </div>
            <?php
            $isActive = false; // Menonaktifkan status aktif setelah slide pertama
            ?>
          <?php endwhile; ?>
        </div>
        <div class="carousel-caption d-md-block">
          <h3> GRACE WORSHIPERS TRAINING </h3>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel8" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel8" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
    </div> <br>
    <div class="container mt-4" id="penyerahan anak - PA">
      <?php
      include '../config/config.php';
      // Ambil role dari query parameter atau variabel lain
      $role = isset($_GET['role']) ? $_GET['role'] : '9'; // Ganti dengan nilai role yang sesuai

      // Ambil data gambar dari database berdasarkan role
      $cari = $con->prepare("SELECT gambar_slider FROM slider WHERE role = ?");
      $cari->bindParam(1, $role);
      $cari->execute();

      $jumlah = $cari->rowCount();
      ?>

      <div id="carousel9" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
        <div class="carousel-indicators">
          <!-- Loop untuk membuat indikator slide berdasarkan jumlah slide ($jumlah) -->
          <?php for ($i = 0; $i < $jumlah; $i++) : ?>
            <button type="button" data-bs-target="#carousel9" data-bs-slide-to="<?= $i ?>" <?= $i === 0 ? 'class="active" aria-current="true"' : '' ?> aria-label="Slide <?= $i + 1 ?>"></button>
          <?php endfor; ?>
        </div>
        <div class="carousel-inner">
          <?php
          $isActive = true; // Menandai slide pertama sebagai aktif
          // Loop untuk menampilkan slide berdasarkan data dari database
          while ($row = $cari->fetch(PDO::FETCH_ASSOC)) :
            $gambar_slider = htmlspecialchars($row['gambar_slider']); // Mengamankan output gambar dari database
            $path_to_image = "../img/img_upload/" . htmlspecialchars($role) . "/" . $gambar_slider; // Menentukan path gambar di folder 
          ?>
            <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
              <img src="<?= $path_to_image ?>" class="mx-auto d-block img-fluid w-100" alt="Slide">
            </div>
            <?php
            $isActive = false; // Menonaktifkan status aktif setelah slide pertama
            ?>
          <?php endwhile; ?>
        </div>
        <div class="carousel-caption d-md-block">
          <h3> PENYERAHAN ANAK </h3>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel9" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel9" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
    </div> <br>
    <div class="container mt-4" id="baptisan air - BA">
      <?php
      include '../config/config.php';
      // Ambil role dari query parameter atau variabel lain
      $role = isset($_GET['role']) ? $_GET['role'] : '10'; // Ganti dengan nilai role yang sesuai

      // Ambil data gambar dari database berdasarkan role
      $cari = $con->prepare("SELECT gambar_slider FROM slider WHERE role = ?");
      $cari->bindParam(1, $role);
      $cari->execute();

      $jumlah = $cari->rowCount();
      ?>

      <div id="carousel10" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
        <div class="carousel-indicators">
          <!-- Loop untuk membuat indikator slide berdasarkan jumlah slide ($jumlah) -->
          <?php for ($i = 0; $i < $jumlah; $i++) : ?>
            <button type="button" data-bs-target="#carousel10" data-bs-slide-to="<?= $i ?>" <?= $i === 0 ? 'class="active" aria-current="true"' : '' ?> aria-label="Slide <?= $i + 1 ?>"></button>
          <?php endfor; ?>
        </div>
        <div class="carousel-inner">
          <?php
          $isActive = true; // Menandai slide pertama sebagai aktif
          // Loop untuk menampilkan slide berdasarkan data dari database
          while ($row = $cari->fetch(PDO::FETCH_ASSOC)) :
            $gambar_slider = htmlspecialchars($row['gambar_slider']); // Mengamankan output gambar dari database
            $path_to_image = "../img/img_upload/" . htmlspecialchars($role) . "/" . $gambar_slider; // Menentukan path gambar di folder 
          ?>
            <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
              <img src="<?= $path_to_image ?>" class="mx-auto d-block img-fluid w-100" alt="Slide">
            </div>
            <?php
            $isActive = false; // Menonaktifkan status aktif setelah slide pertama
            ?>
          <?php endwhile; ?>
        </div>
        <div class="carousel-caption d-md-block">
          <h3> BAPTISAN AIR </h3>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel10" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel10" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
    </div> <br>
    <div class="container mt-4" id="worship mision manado - MIS-MANADO">
      <?php
      include '../config/config.php';
      // Ambil role dari query parameter atau variabel lain
      $role = isset($_GET['role']) ? $_GET['role'] : '11'; // Ganti dengan nilai role yang sesuai

      // Ambil data gambar dari database berdasarkan role
      $cari = $con->prepare("SELECT gambar_slider FROM slider WHERE role = ?");
      $cari->bindParam(1, $role);
      $cari->execute();

      $jumlah = $cari->rowCount();
      ?>

      <div id="carousel11" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
        <div class="carousel-indicators">
          <!-- Loop untuk membuat indikator slide berdasarkan jumlah slide ($jumlah) -->
          <?php for ($i = 0; $i < $jumlah; $i++) : ?>
            <button type="button" data-bs-target="#carousel11" data-bs-slide-to="<?= $i ?>" <?= $i === 0 ? 'class="active" aria-current="true"' : '' ?> aria-label="Slide <?= $i + 1 ?>"></button>
          <?php endfor; ?>
        </div>
        <div class="carousel-inner">
          <?php
          $isActive = true; // Menandai slide pertama sebagai aktif
          // Loop untuk menampilkan slide berdasarkan data dari database
          while ($row = $cari->fetch(PDO::FETCH_ASSOC)) :
            $gambar_slider = htmlspecialchars($row['gambar_slider']); // Mengamankan output gambar dari database
            $path_to_image = "../img/img_upload/" . htmlspecialchars($role) . "/" . $gambar_slider; // Menentukan path gambar di folder 
          ?>
            <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
              <img src="<?= $path_to_image ?>" class="mx-auto d-block img-fluid w-100" alt="Slide">
            </div>
            <?php
            $isActive = false; // Menonaktifkan status aktif setelah slide pertama
            ?>
          <?php endwhile; ?>
        </div>
        <div class="carousel-caption d-md-block">
          <h3> WORSHIP MISSION MANADO </h3>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel11" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel11" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
    </div> <br>
    <div class="container mt-4" id="worship mision kalteng - MIS-KALTENG">
      <?php
      include '../config/config.php';
      // Ambil role dari query parameter atau variabel lain
      $role = isset($_GET['role']) ? $_GET['role'] : '12'; // Ganti dengan nilai role yang sesuai

      // Ambil data gambar dari database berdasarkan role
      $cari = $con->prepare("SELECT gambar_slider FROM slider WHERE role = ?");
      $cari->bindParam(1, $role);
      $cari->execute();

      $jumlah = $cari->rowCount();
      ?>

      <div id="carousel12" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
        <div class="carousel-indicators">
          <!-- Loop untuk membuat indikator slide berdasarkan jumlah slide ($jumlah) -->
          <?php for ($i = 0; $i < $jumlah; $i++) : ?>
            <button type="button" data-bs-target="#carousel12" data-bs-slide-to="<?= $i ?>" <?= $i === 0 ? 'class="active" aria-current="true"' : '' ?> aria-label="Slide <?= $i + 1 ?>"></button>
          <?php endfor; ?>
        </div>
        <div class="carousel-inner">
          <?php
          $isActive = true; // Menandai slide pertama sebagai aktif
          // Loop untuk menampilkan slide berdasarkan data dari database
          while ($row = $cari->fetch(PDO::FETCH_ASSOC)) :
            $gambar_slider = htmlspecialchars($row['gambar_slider']); // Mengamankan output gambar dari database
            $path_to_image = "../img/img_upload/" . htmlspecialchars($role) . "/" . $gambar_slider; // Menentukan path gambar di folder 
          ?>
            <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
              <img src="<?= $path_to_image ?>" class="mx-auto d-block img-fluid w-100" alt="Slide">
            </div>
            <?php
            $isActive = false; // Menonaktifkan status aktif setelah slide pertama
            ?>
          <?php endwhile; ?>
        </div>
        <div class="carousel-caption d-md-block">
          <h3> WORSHIP MISSION KALTENG </h3>
          <p> Kabupaten Tamiyanglayang</p>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel12" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel12" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
    </div> <br>
    <div class="container mt-4" id="worship mision waisai - MIS-WAISAI">
      <?php
      include '../config/config.php';
      // Ambil role dari query parameter atau variabel lain
      $role = isset($_GET['role']) ? $_GET['role'] : '13'; // Ganti dengan nilai role yang sesuai

      // Ambil data gambar dari database berdasarkan role
      $cari = $con->prepare("SELECT gambar_slider FROM slider WHERE role = ?");
      $cari->bindParam(1, $role);
      $cari->execute();

      $jumlah = $cari->rowCount();
      ?>

      <div id="carousel13" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
        <div class="carousel-indicators">
          <!-- Loop untuk membuat indikator slide berdasarkan jumlah slide ($jumlah) -->
          <?php for ($i = 0; $i < $jumlah; $i++) : ?>
            <button type="button" data-bs-target="#carousel13" data-bs-slide-to="<?= $i ?>" <?= $i === 0 ? 'class="active" aria-current="true"' : '' ?> aria-label="Slide <?= $i + 1 ?>"></button>
          <?php endfor; ?>
        </div>
        <div class="carousel-inner">
          <?php
          $isActive = true; // Menandai slide pertama sebagai aktif
          // Loop untuk menampilkan slide berdasarkan data dari database
          while ($row = $cari->fetch(PDO::FETCH_ASSOC)) :
            $gambar_slider = htmlspecialchars($row['gambar_slider']); // Mengamankan output gambar dari database
            $path_to_image = "../img/img_upload/" . htmlspecialchars($role) . "/" . $gambar_slider; // Menentukan path gambar di folder 
          ?>
            <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
              <img src="<?= $path_to_image ?>" class="mx-auto d-block img-fluid w-100" alt="Slide">
            </div>
            <?php
            $isActive = false; // Menonaktifkan status aktif setelah slide pertama
            ?>
          <?php endwhile; ?>
        </div>
        <div class="carousel-caption d-md-block">
          <h3> WORSHIP MISSION WAISAI </h3>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel13" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel13" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
    </div> <br>
    <div class="container mt-4" id="kunjungan akhir tahun - KAT">
      <?php
      include '../config/config.php';
      // Ambil role dari query parameter atau variabel lain
      $role = isset($_GET['role']) ? $_GET['role'] : '14'; // Ganti dengan nilai role yang sesuai

      // Ambil data gambar dari database berdasarkan role
      $cari = $con->prepare("SELECT gambar_slider FROM slider WHERE role = ?");
      $cari->bindParam(1, $role);
      $cari->execute();

      $jumlah = $cari->rowCount();
      ?>

      <div id="carousel14" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
        <div class="carousel-indicators">
          <!-- Loop untuk membuat indikator slide berdasarkan jumlah slide ($jumlah) -->
          <?php for ($i = 0; $i < $jumlah; $i++) : ?>
            <button type="button" data-bs-target="#carousel14" data-bs-slide-to="<?= $i ?>" <?= $i === 0 ? 'class="active" aria-current="true"' : '' ?> aria-label="Slide <?= $i + 1 ?>"></button>
          <?php endfor; ?>
        </div>
        <div class="carousel-inner">
          <?php
          $isActive = true; // Menandai slide pertama sebagai aktif
          // Loop untuk menampilkan slide berdasarkan data dari database
          while ($row = $cari->fetch(PDO::FETCH_ASSOC)) :
            $gambar_slider = htmlspecialchars($row['gambar_slider']); // Mengamankan output gambar dari database
            $path_to_image = "../img/img_upload/" . htmlspecialchars($role) . "/" . $gambar_slider; // Menentukan path gambar di folder 
          ?>
            <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
              <img src="<?= $path_to_image ?>" class="mx-auto d-block img-fluid w-100" alt="Slide">
            </div>
            <?php
            $isActive = false; // Menonaktifkan status aktif setelah slide pertama
            ?>
          <?php endwhile; ?>
        </div>
        <div class="carousel-caption d-md-block">
          <h3> KUNJUNGAN AKHIR TAHUN </h3>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel14" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel14" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
    </div> <br>
    <br>
  </div>
  <!-- isi -->

  <!-- Button to Top -->
  <div id="goTop">
    <a href="#" id="goTopBtn"><i class="fa fa-chevron-up" id="btt"></i></a>
  </div>
  <!-- Button to Top -->

  <!-- footer -->
  <div>
    <footer class="link-light bg-dark">
      <div class="mx-0 p-3 row justify-content-between">
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
  <script src="../assets/js/bttmedia.js"></script>
  <script src="../assets/js/carousel.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
  </script>
</body>

</html>