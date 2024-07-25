<div class="container-fluid px-4">
  <h1 class="mt-4"> IMAGE SLIDER </h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php"> Dashboard </a></li>
    <li class="breadcrumb-item active"> Media </li>
  </ol>
  <div class="card mb-4">
    <div class="card-header">
      <i class="fas fa-table me-1"></i>
      Daftar Image Slider
    </div>
    <div class="card-body">
      <table id="datatablesSimple">
        <div class="col-md-12 bg-light">
          <div class="d-flex justify-content-between">
            <!-- Button trigger modal -->
            <a href="index.php?page=mediaadd">
              <button type="button" class="btn btn-primary" style="margin-bottom: 15px;">
                <i class="fas fa-plus"></i>
                Input Media
              </button>
            </a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info text-light" style="margin-bottom: 15px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="fas fa-info"></i>
              Info Role
            </button>
          </div>
        </div>

        <thead>
          <tr>
            <th> NO </th>
            <th style="width: 100px;"> GAMBAR </th> <!-- Set the width of the image column -->
            <th> NAMA GAMBAR </th>
            <th> JUDUL </th>
            <th> DESKRIPSI </th>
            <th> ROLE </th>
            <th> EDIT </th>
            <th> DELETE </th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $sql = $con->query("SELECT * FROM slider");
          while ($r = $sql->fetch()) {
            $role = htmlspecialchars($r['role']);
            $gambar_slider = htmlspecialchars($r['gambar_slider']);

            // Menentukan path gambar berdasarkan role
            $gambar_path = "../img/img_upload/$role/$gambar_slider";

            echo "
                  <tr>
                    <td>" . htmlspecialchars($no++) . "</td>
                    <td style='width: 100px;'> <!-- Ensure the image column has a fixed width -->
                      <img src='$gambar_path' class='img-fluid' style='max-width: 250px;'> <!-- Responsive image -->
                    </td>
                    <td>" . $gambar_slider . "</td>
                    <td>" . htmlspecialchars($r['judul_slider']) . "</td>
                    <td>" . htmlspecialchars($r['deskripsi_slider']) . "</td>
                    <td>" . $role . "</td>
                    <td>
                      <a class='btn btn-warning btn-sm text-white' href='index.php?page=mediaedit&id_gambar=" . htmlspecialchars($r['id_gambar']) . "'><i class='fas fa-pencil'></i></a>
                    </td>
                    <td>
                      <a class='btn btn-danger btn-sm' href='index.php?page=mediadelete&id_gambar=" . htmlspecialchars($r['id_gambar']) . "' onclick=\"return confirm('Hapus Data?')\"><i class='fas fa-trash'></i></a>
                    </td>
                  </tr>
                ";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Modal Input -->
<div class="modal fade" id="formJadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> JADWAL IBADAH </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="index.php?page=simpanjadwal" method="POST">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="hari_tgl" placeholder="Masukkan Hari" required="" autocomplete="off">
            <label for="floatingInput"> HARI </label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="waktu_ibadah" placeholder="Masukkan Waktu Ibadah" required="" autocomplete="off">
            <label for="floatingInput"> WAKTU IBADAH </label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="jenis_keg" placeholder="Masukkan Jenis Kegiatan" required="" autocomplete="off">
            <label for="floatingInput"> JENIS IBADAH </label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="lokasi_ibadah" placeholder="Masukkan Lokasi Ibadah" required="" autocomplete="off">
            <label for="floatingInput"> LOKASI IBADAH </label>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-info"> Simpan </button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Close </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Role -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"> Info Role </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul>
          <li> 0. Banner </li>
          <li> 1. Ibadah Raya </li>
          <li> 2. Perjamuan Kasih </li>
          <li> 3. Persembahan Pujian </li>
          <li> 4. Ibadah Sektor </li>
          <li> 5. God's Grace Kids </li>
          <li> 6. YGSM </li>
          <li> 7. Ministries </li>
          <li> 8. Grace Worshipers Training </li>
          <li> 9. Penyerahan Anak </li>
          <li> 10. Baptisan Air </li>
          <li> 11. Worship Mission Manado </li>
          <li> 12. Worship Mission Kalteng </li>
          <li> 13. Worship Mission Waisai </li>
          <li> 14. Kunjungan Akhir Tahun </li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>