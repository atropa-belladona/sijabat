<form class="form" action="<?= route_to('dupak_evaluasi_store', $detail_usulan->id); ?>" method="POST">
  <?= csrf_field(); ?>
  <div class="form-group row">
    <label for="kategori" class="col-form-label col-lg-2">Kategori</label>
    <div class="col-lg-10">
      <input type="text" name="kategori" id="kategori" class="form-control form-control-sm font-weight-bold" value="<?= $detail_usulan->kategori_kegiatan; ?>" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label for="sesuai" class="col-form-label col-lg-2">Kesesuaian</label>
    <div class="col-lg-10">
      <select name="sesuai" id="sesuai" class="form-control form-control-sm" required>
        <option value="">Pilih ...</option>
        <option value="1">Sesuai</option>
        <option value="0">Tidak Sesuai</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="catatan" class="col-form-label col-lg-2">Catatan</label>
    <div class="col-lg-10">
      <textarea name="catatan" id="catatan" class="form-control form-control-sm" rows="10"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <div class="col d-flex flex-row-reverse">
      <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
    </div>
  </div>
</form>