<?php
session_start();
require_once '../config/config.php';

if (empty($_SESSION['user-websitegereja'])) {
    echo "<script>
			window.location.href = '../login/login.php';
		</script>";
} else {
    $user = $_SESSION['user-websitegereja'];
    $role = $_SESSION['role-websitegereja'];
    $full_name = $_SESSION['full_name-websitegereja'];

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> Dashboard - Admin Gereja </title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="icon" href="../img/Logo/gbi.png" />

    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 fw-bold">
                <img draggable="false" src="../img/Logo/gbi.png" width="40" height="40" alt="GBI">
                <img draggable="false" src="../img/Logo/ggm.png" width="40" height="40" alt="GGM">
                ADMIN
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../login/logout.php">
                                <i class="fas fa-right-from-bracket"></i> LogOut
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"> CORE </div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading"> MENU </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="index.php?page=jadwal">
                                        <div class="sb-nav-link-icon"><i class="fas fa-calendar-days"></i></div>
                                        Info
                                    </a>
                                    <a class="nav-link" href="index.php?page=media">
                                        <div class="sb-nav-link-icon"><i class="fa-brands fa-slideshare"></i></div>
                                        Media
                                    </a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-tie"></i></div>
                                Authentication
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="index.php?page=register">
                                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user-plus"></i></div>
                                        Register
                                    </a>
                                    <a class="nav-link" href="index.php?page=password">
                                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user-gear"></i></div>
                                        Forgot Password
                                    </a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer py-2 px-3">
                        <div class="large"> <?= $full_name ?> Logged in as: </div>
                        <p style="text-transform: uppercase;"> "<?= $role ?>" </p>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <!-- isi konten -->
                    <?php
                    $dir = "admin";
                    $page = @$_GET['page'];
                    if (empty($page)) {
                        include "admin.php";
                    } else {
                        include "$page.php";
                    }
                    ?>
                </main>
                <footer class="py-4 bg-dark mt-auto">
                    <div class="container-fluid px-1">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">
                                <small>
                                    &copy; <script>
                                        document.write(new Date().getFullYear());
                                    </script> GOD'S GRACE
                                </small>
                            </div>
                            <div>
                                <a target="_blank" class="socialfooter" href="https://www.facebook.com/church.grace.940" title="Facebook GBI">
                                    <img draggable="false" src="../img/facebook.png" width="30" height="30" alt="FB">
                                </a>
                                <a target="_blank" class="socialfooter" href="https://www.instagram.com/gbigodsgrace" title="Instagram GBI">
                                    <img draggable="false" src="../img/instagram.png" width="30" height="30" alt="IG">
                                </a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>

    </html>
<?php } ?>