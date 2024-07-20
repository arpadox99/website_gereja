<div class="container-fluid px-4">
    <h1 class="mt-4"> JADWAL IBADAH </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php"> Dashboard </a></li>
        <li class="breadcrumb-item active"> Info </li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Jadwal ibadah di GBI God Grace Pusat
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <div class="col-md-12 bg-light">
                    <div class="d-grid gap-2 d-md-flex justify-content-md ">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formJadwal" style="margin-bottom: 15px;">
                            <i class="fas fa-plus"></i> Input Jadwal
                        </button>
                    </div>
                </div>
                <thead>
                    <tr class="text-center">
                        <th> HARI </th>
                        <th> WAKTU IBADAH</th>
                        <th> JENIS IBADAH </th>
                        <th> LOKASI IBADAH </th>
                        <th> EDIT </th>
                        <th> DELETE </th>
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
                                                    <td>
                                                        <a class='btn btn-warning btn-sm text-white' href='index.php?page=jadwaledit&id_jadwal=$r[id_jadwal]'><i class='fas fa-pencil '></i></a>
                                                    </td>
                                                    <td>
                                                        <a class='btn btn-danger btn-sm' href='index.php?page=jadwaldelete&id_jadwal=$r[id_jadwal]' onclick=\"return confirm('Hapus Data?')\"><i class='fas fa-trash'></i></a>
                                                    </td>                                        
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
<!-- Modal -->
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
                        <button type="submit" class="btn btn-info">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>