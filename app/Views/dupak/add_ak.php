<?= $this->extend('layouts/content-green') ?>

<!-- breadcrumb -->
<?= $this->section('breadcrumbs') ?>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?= route_to('home') ?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?= route_to('dupak_index') ?>">Daftar Usulan</a></li>
  <li class="breadcrumb-item"><a href="<?= route_to('dupak_detail', $dupak->id) ?>">Detail Usulan</a></li>
  <li class="breadcrumb-item active">Tambah Data <?= $kegiatan->nama; ?></li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="detail-kegiatan mb-4">
  <?= $this->include('dupak/parts/detail-kegiatan/' . $sister_map->page); ?>
</div>

<hr class="bt-5">

<div class="form-input">
  <h6 class="font-weight-bold text-muted mb-2">Formulir Isian Kegiatan</h6>
  <form name="f1" action="<?= route_to('dupak_store_addak', $dupak->id, $sister_detail->id); ?>" method="POST">
    <?= csrf_field(); ?>
    <div class="form-group row">
      <label for="klasifikasi" class="col-lg-2 col-form-label text-right">Klasifikasi Kegiatan</label>
      <div class="col-lg-8">
        <table class="table table-sm table-bordered table-hover ">
          <tbody>
            <?php foreach ($ref_kegiatan as $kegiatan) : ?>
              <tr class="pt-row" data-id="<?= $kegiatan->sub_kegiatan_id; ?>">
                <td colspan="2" class="font-weight-bold">
                  <i class="fas fa-fw fa-angle-down"></i> <?= $kegiatan->sub_kegiatan_nama; ?>
                </td>
              </tr>
              <?php foreach ($kegiatan->child as $item) : ?>
                <?php if ($item->sub_kegiatan_child_id) : ?>
                  <tr class="row-hide <?= 'ch-' . $item->sub_kegiatan_id; ?>">
                    <td class="pl-4">
                      <label for="<?= $item->sub_kegiatan_child_id; ?>" class="form-check-label"><?= $item->sub_kegiatan_child_nama; ?></label>
                      <input type="hidden" name="<?= 'ak-' . $item->sub_kegiatan_child_id; ?>" value="<?= number_format2($item->angka_kredit); ?>">
                    </td>
                    <td class="text-center">
                      <input type="radio" id="<?= $item->sub_kegiatan_child_id; ?>" name="klasifikasi" value="<?= $item->sub_kegiatan_child_id; ?>" onchange="showAK()">
                    </td>
                  </tr>
                <?php else : ?>
                  <tr class="row-hide <?= 'ch-' . $item->sub_kegiatan_id; ?>">
                    <td class="pl-4">
                      <label for="<?= $item->sub_kegiatan_id; ?>" class="form-check-label"><?= $item->sub_kegiatan_nama; ?></label>
                      <input type="hidden" name="<?= 'ak-' . $item->sub_kegiatan_id; ?>" value="<?= number_format2($item->angka_kredit); ?>">
                    </td>
                    <td class="text-center">
                      <input type="radio" id="<?= $item->sub_kegiatan_id; ?>" name="klasifikasi" value="<?= $item->sub_kegiatan_id; ?>" onchange="showAK()">
                    </td>
                  </tr>
                <?php endif ?>
              <?php endforeach ?>

            <?php endforeach ?>
          </tbody>
        </table>
        <?php if (session('errors.klasifikasi')) : ?>
          <div class="text-danger text-xs">
            <?= session('errors.klasifikasi') ?>
          </div>
        <?php endif ?>
      </div>
    </div>
    <div class="form-group row">
      <label for="volume" class="col-lg-2 col-form-label text-right">Volume Kegiatan</label>
      <div class="col-lg-2">
        <input type="text" class="form-control form-control-sm text-right <?= (session('errors.volume')) ? 'is-invalid' : ''; ?>" id="volume" name="volume" onkeyup="addSeparator(this)" onfocus="startCalc()" onblur="stopCalc()" value="<?= old('volume'); ?>">
        <div class="invalid-feedback">
          <?= session('errors.volume') ?>
        </div>
      </div>
      <label for="satuan" class="col-lg-2 col-form-label text-right">Satuan Hasil</label>
      <div class="col-lg-2">
        <input type="text" class="form-control form-control-sm <?= (session('errors.satuan')) ? 'is-invalid' : ''; ?>" id="satuan" name="satuan" value="<?= old('satuan'); ?>">
        <div class="invalid-feedback">
          <?= session('errors.satuan') ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="angka-kredit" class="col-lg-2 col-form-label text-right">Angka Kredit</label>
      <div class="col-lg-2">
        <input type="text" class="form-control form-control-sm text-right <?= (session('errors.angka-kredit')) ? 'is-invalid' : ''; ?>" id="angka-kredit" name="angka-kredit" onkeyup="addSeparator(this)" onfocus="startCalc()" onblur="stopCalc()" value="<?= old('angka-kredit'); ?>">
        <div class="invalid-feedback">
          <?= session('errors.angka-kredit') ?>
        </div>
      </div>
      <div class="col-form-label ml-4">
        <span class="font-italic">Nilai Angka Kredit paling tinggi : </span>
        <span class="font-weight-bold ak-rekomendasi">{nilai_rekomendasi_ak}</span>
      </div>
    </div>
    <div class="form-group row">
      <label for="jumlah-angka-kredit" class="col-lg-2 col-form-label text-right">Jumlah Angka Kredit</label>
      <div class="col-lg-2">
        <input type="text" class="form-control form-control-sm text-right font-weight-bold <?= (session('errors.jumlah-angka-kredit')) ? 'is-invalid' : ''; ?>" id="jumlah-angka-kredit" name="jumlah-angka-kredit" value="<?= old('jumlah-angka-kredit'); ?>" readonly>
        <div class="invalid-feedback">
          <?= session('errors.jumlah-angka-kredit') ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <div class="col offset-lg-2">
        <button type="submit" class="btn btn-sm btn-success">Simpan</button>
      </div>
    </div>
  </form>
</div>

<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
  $('.pt-row').on('click', function() {
    var id = $(this).data('id');

    $('.ch-' + id).toggleClass('row-hide');
  });

  // JS Function
  const d = document.f1;

  function showAK() {
    var kegiatan_id = d.elements["klasifikasi"].value;
    var angka_kredit = d.elements["ak-" + kegiatan_id].value;

    d.elements['angka-kredit'].value = angka_kredit;
    d.querySelector('.ak-rekomendasi').innerHTML = angka_kredit;

  }

  function startCalc() {
    interval = setInterval("calc()", 1000);
  }

  function calc() {
    var jumlah = 0;

    var volume = d.elements["volume"].value;
    var angka_kredit = d.elements["angka-kredit"].value;

    /* hitung jumlah */
    jumlah = septoint(volume) * septoint(angka_kredit);

    d.elements['jumlah-angka-kredit'].value = inttosep(jumlah);
  }

  function stopCalc() {
    clearInterval(interval);
  }
</script>
<?= $this->endSection(); ?>