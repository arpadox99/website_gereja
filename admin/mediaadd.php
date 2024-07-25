<div class="container">
  <!-- Tombol Back -->
  <div class="mt-2">
    <a class="text-dark text-decoration-none" href="index.php?page=media"><i class="fas fa-arrow-left"></i>
      Back
    </a>
  </div>
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="card shadow-lg border-1 rounded-lg mt-5">
        <div class="card-header text-bg-info">
          <h3 class="text-center fw-bold my-3"> INPUT DATA GAMBAR </h3>
        </div>
        <div class="card-body">
          <form class="media-form" action="index.php?page=mediasimpan" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <div class="row mb-3">
                <div class="col-md-12">
                  <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="InputJudulSlider" type="text" name="judul_slider" placeholder="" autocomplete="off">
                    <label for="InputJudulSlider"> Judul Slider </label>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-12">
                  <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="InputDeskSlider" type="text" name="deskripsi_slider" placeholder="" autocomplete="off">
                    <label for="InputDeskSlider"> Deskripsi Slider </label>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-12">
                  <div class="input-group">
                    <select class="form-select" id="inputGroupSelect04" id="Role" type="role" name="role" aria-label="Example select with button addon" required>
                      <option selected>Pilih Level...</option>
                      <option value="0"> 0. Banner </option>
                      <option value="1"> 1. Ibadah Raya </option>
                      <option value="2"> 2. Perjamuan Kasih </option>
                      <option value="3"> 3. Persembahan Pujian </option>
                      <option value="4"> 4. Ibadah Sektor </option>
                      <option value="5"> 5. God's Grace Kids </option>
                      <option value="6"> 6. YGSM </option>
                      <option value="7"> 7. Ministries </option>
                      <option value="8"> 8. Grace Worshipers Training </option>
                      <option value="9"> 9. Penyerahan Anak </option>
                      <option value="10"> 10. Baptisan Air </option>
                      <option value="11"> 11. Worship Mission Manado </option>
                      <option value="12"> 12. Worship Mission Kalteng </option>
                      <option value="13"> 13. Worship Mission Waisai </option>
                      <option value="14"> 14. Kunjungan Akhir Tahun </option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="gambar"> Pilih Gambar </label>
                    <input type="file" class="form-control-file" id="gambar" name="gambar[]" multiple><br>
                    <small class="text-danger"> Format gambar ( png | jpg | jpeg ) Ukuran Gambar 1440px x 830px </small>
                  </div>
                </div>
              </div>
              <button type="submit" name="upload" class="btn btn-primary"> Upload </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>