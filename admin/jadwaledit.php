<?php

// Validasi dan sanitasi input
if (isset($_GET['id_jadwal']) && is_numeric($_GET['id_jadwal'])) {
  $id_jadwal = intval($_GET['id_jadwal']);
} else {
  echo "
        <script>
            alert('ID Jadwal tidak valid!');
            window.location.href='index.php?page=jadwal';
        </script>
    ";
  exit;
}

// Cek koneksi
if (!$con) {
  die("Connection failed: " . $con->errorInfo());
}

// Menggunakan prepared statements untuk keamanan
$stmt = $con->prepare("SELECT * FROM jadwal_ibadah WHERE id_jadwal = :id_jadwal");
$stmt->bindParam(':id_jadwal', $id_jadwal, PDO::PARAM_INT);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
  echo "
        <script>
            alert('Data tidak ada!');
            window.location.href='index.php?page=jadwal';
        </script>
    ";
} else {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> JADWAL </title>
    <link rel="stylesheet" href="css/styles.css">
  </head>

  <body>
    <div class="container">
      <div>
        <div class="body_1">
          <div class="bs-example"><br>
            <h1> EDIT JADWAL IBADAH </h1><br>
            <form class="form-horizontal" action="index.php?page=jadwalupdate" method="POST">
              <input type="hidden" name="id_jadwal" value="<?= $data['id_jadwal'] ?>">
              <div class="form-group" style="margin-top: 5px;">
                <label class="d-grid gap-2 d-md-flex justify-content-md" style="margin-bottom: 5px;" for="Hari"> Hari : </label>
                <div class="col-xs-9">
                  <input type="text" class="form-control" value="<?= $data['hari_tgl'] ?>" name="hari_tgl" placeholder="Masukkan Hari" required="" autocomplete="off">
                </div>
              </div>
              <div class="form-group" style="margin-top: 5px;">
                <label class="d-grid gap-2 d-md-flex justify-content-md" style="margin-bottom: 5px;" for="waktu_ibadah"> Waktu Ibadah : </label>
                <div class="col-xs-9">
                  <input type="text" class="form-control" value="<?= $data['waktu_ibadah'] ?>" name="waktu_ibadah" placeholder="Masukkan Waktu Ibadah" required="" autocomplete="off">
                </div>
              </div>
              <div class="form-group" style="margin-top: 5px;">
                <label class="d-grid gap-2 d-md-flex justify-content-md" style="margin-bottom: 5px;" for="jenis_keg"> Jenis Ibadah : </label>
                <div class="col-xs-9">
                  <input type="text" class="form-control" value="<?= $data['jenis_keg'] ?>" name="jenis_keg" placeholder="Masukkan Jenis Ibadah" required="" autocomplete="off">
                </div>
              </div>
              <div class="form-group" style="margin-top: 5px;">
                <label class="d-grid gap-2 d-md-flex justify-content-md" style="margin-bottom: 5px;" for="lokasi_ibadah"> Lokasi Ibadah : </label>
                <div class="col-xs-9">
                  <input type="text" class="form-control" value="<?= $data['lokasi_ibadah'] ?>" name="lokasi_ibadah" placeholder="Masukkan Lokasi Ibadah" required="" autocomplete="off">
                </div>
              </div><br>
              <div class="form-group" style="margin-top: 5px;">
                <div class="d-grid gap-2 d-md-flex justify-content-md">
                  <input type="submit" class="btn btn-primary" value="UPDATE">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>

  </html>
<?php
}
?>