<div class="cetak-sp">
  <form id="form-cetak-sp">
    <input type="hidden" name="id_dupak" value="<?= $dupak_info->id; ?>">
    <div class="form-group row">
      <label for="penandatangan_nama" class="col-lg-2 col-form-label text-sm text-right">Nama</label>
      <div class="col">
        <input type="text" name="penandatangan_nama" id="penandatangan_nama" class="form-control text-sm" value="<?= $penandatangan_sp->penandatangan_nama ?? ''; ?>" placeholder="Masukkan nama penandatangan" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="penandatangan_nip" class="col-lg-2 col-form-label text-sm text-right">NIP</label>
      <div class="col-lg-4 col-md-12">
        <input type="text" name="penandatangan_nip" id="penandatangan_nip" class="form-control text-sm" value="<?= $penandatangan_sp->penandatangan_nip ?? ''; ?>" maxlength="18" placeholder="Masukkan NIP penandatangan" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="penandatangan_gol" class="col-lg-2 col-form-label text-sm text-right">Golongan</label>
      <div class="col-lg-4 col-md-12">
        <select name="penandatangan_gol" id="penandatangan_gol" class="form-control text-sm">
          <option value="">Pilih ...</option>
          <?php foreach ($list_golongan as $gol) : ?>
            <option value="<?= $gol->nama; ?>" <?= (isset($penandatangan_sp->penandatangan_golongan) and $penandatangan_sp->penandatangan_golongan == $gol->nama) ? 'selected' : ''; ?>><?= $gol->nama; ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <label for="penandatangan_tmt_gol" class="col-lg-2 col-form-label text-sm text-right">TMT</label>
      <div class="col-lg-4 col-md-12">
        <input type="date" name="penandatangan_tmt_gol" id="penandatangan_tmt_gol" class="form-control text-sm" value="<?= $penandatangan_sp->penandatangan_tmt_golongan ?? ''; ?>" required>
      </div>
    </div>

    <div class="form-group row">
      <label for="penandatangan_jabfung" class="col-lg-2 col-form-label text-sm text-right">Jabatan</label>
      <div class="col-lg-4 col-md-12">
        <select name="penandatangan_jabfung" id="penandatangan_jabfung" class="form-control text-sm" required>
          <option value="">Pilih ...</option>
          <option value="Asisten Ahli" <?= (isset($penandatangan_sp->jabfung) and $penandatangan_sp->jabfung == 'Asisten Ahli') ? 'selected' : ''; ?>>Asisten Ahli</option>
          <option value="Lektor" <?= (isset($penandatangan_sp->jabfung) and $penandatangan_sp->jabfung == 'Lektor') ? 'selected' : ''; ?>>Lektor</option>
          <option value="Lektor Kepala" <?= (isset($penandatangan_sp->jabfung) and $penandatangan_sp->jabfung == 'Lektor Kepala') ? 'selected' : ''; ?>>Lektor Kepala</option>
          <option value="Profesor" <?= (isset($penandatangan_sp->jabfung) and $penandatangan_sp->jabfung == 'Profesor') ? 'selected' : ''; ?>>Profesor</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="penandatangan_jabstruk" class="col-lg-2 col-form-label text-sm text-right">Sebagai</label>
      <div class="col-lg-4 col-md-12">
        <input type="text" name="penandatangan_jabstruk" id="penandatangan_jabstruk" class="form-control text-sm" value="<?= $penandatangan_sp->jabstruk ?? 'Koordinator Program Studi'; ?>" maxlength="18" required>
      </div>
    </div>

    <hr>

    <div class="form-group row">
      <label for="tanggal_sp" class="col-lg-3 col-form-label text-sm text-right">Tanggal Tanda Tangan</label>
      <div class="col-lg-4 col-md-12 mb-2">
        <input type="date" name="tanggal_sp" id="tanggal_sp" class="form-control text-sm" value="<?= $penandatangan_sp->tanggal_surat ?? ''; ?>" required>
      </div>
      <div class="col">
        <button type="submit" class="btn btn-success mb-2"><i class="fas fa-fw fa-save"></i> Simpan</button>
      </div>
    </div>

  </form>

  <hr class="bt-5">
  <?php if (isset($penandatangan_sp->id_dupak)) : ?>
    <div class="button-cetak-sp">
      <a href="<?= route_to('pdf_sp_pendidikan', $penandatangan_sp->id_dupak); ?>" class="btn btn-sm btn-outline-info mb-2" target="print_popup" onclick="window_popup('print_popup')"><i class="fas fa-fw fa-print"></i> Pelaksanaan Pendidikan</a>
      <a href="<?= route_to('pdf_sp_penelitian', $penandatangan_sp->id_dupak); ?>" class="btn btn-sm btn-outline-info mb-2" target="print_popup" onclick="window_popup('print_popup')"><i class="fas fa-fw fa-print"></i> Penelitian</a>
      <a href="<?= route_to('pdf_sp_pengabdian', $penandatangan_sp->id_dupak); ?>" class="btn btn-sm btn-outline-info mb-2" target="print_popup" onclick="window_popup('print_popup')"><i class="fas fa-fw fa-print"></i> Pengabdian</a>
      <a href="<?= route_to('pdf_sp_penunjang', $penandatangan_sp->id_dupak); ?>" class="btn btn-sm btn-outline-info mb-2" target="print_popup" onclick="window_popup('print_popup')"><i class="fas fa-fw fa-print"></i> Penunjang Tugas</a>
    </div>
  <?php endif ?>
</div>

<script>
  $('#form-cetak-sp').on('submit', function(e) {
    e.preventDefault();

    var modal = $('#modal-cetak-sp')

    var fd = new FormData(this);

    modal.find('.modal-preloader').toggleClass('d-none');
    modal.find('.content').html('');

    $.ajax({
      url: '<?= route_to('store_cetak_sp'); ?>',
      type: 'post',
      data: fd,
      success: function(data) {
        modal.find('.modal-preloader').toggleClass('d-none');
        modal.find('.content').html(data);
      },
      error: function(data) {
        console.log(data);
      },
      processData: false,
      contentType: false,
      cache: false
    })
  });
</script>