<?= $this->extend('layouts/content-green'); ?>

<?= $this->section('breadcrumbs'); ?>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?= route_to('home'); ?>">Home</a></li>
  <li class="breadcrumb-item active">Periode Penilaian</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('content'); ?>
<div class="content">
  <div class="row">
    <div class="col mb-4">
      <button type="button" class="btn btn-sm btn-primary bg-gradient-primary" data-toggle="modal" data-target="#modal-create-periode-penilaian"><i class="fas fa-fw fa-plus"></i> Buat Periode Penilaian</button>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <table class="table table-sm table-success datatable" style="width: 100%;">
        <thead class="bg-gradient-dark text-white">
          <tr>
            <th class="text-center">No.</th>
            <th class="text-center">Tanggal Mulai</th>
            <th class="text-center">Tanggal Selesai</th>
            <th class="text-center">Keterangan</th>
            <th class="text-center">Status</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 ?>
          <?php foreach ($periode_penilaian as $periode) : ?>
            <tr>
              <td class="text-center align-middle"><?= $i++; ?></td>
              <td class="text-center align-middle"><?= $periode->tgl_mulai; ?></td>
              <td class="text-center align-middle"><?= $periode->tgl_selesai; ?></td>
              <td class="text-left align-middle"><?= $periode->keterangan; ?></td>
              <td class="text-center align-middle">
                <?php if ($periode->lock == '0') : ?>
                  <span class="badge badge-success">Periode Terbuka</span>
                <?php else : ?>
                  <span class="badge badge-danger">Tutup Periode</span>
                <?php endif ?>
              </td>
              <td class="text-center align-middle">
                <button type="button" class="btn btn-sm btn-warning mr-3" title="Ubah Periode"><i class="fas fa-fw fa-edit"></i></button>
                <button type="button" class="btn btn-sm btn-danger" title="Hapus Periode"><i class="fas fa-fw fa-trash"></i></button>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>
<div class="modal fade show" id="modal-create-periode-penilaian" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header py-2">
        <h6 class="modal-title font-weight-bold">Periode Penilaian</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?= route_to('periode_penilaian_store'); ?>" method="POST">
          <?= csrf_field(); ?>
          <div class="form-group row">
            <label for="tgl-mulai" class="col-sm-2 col-form-label">Tanggal Mulai</label>
            <div class="col-sm-10">
              <input type="date" class="form-control <?= (session('errors.tgl-mulai')) ? 'is-invalid' : ''; ?>" id="tgl-mulai" name="tgl-mulai" value="<?= old('tgl-mulai'); ?>">
              <div class="invalid-feedback">
                <?= session('errors.tgl-mulai') ?>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="tgl-selesai" class="col-sm-2 col-form-label">Tanggal Selesai</label>
            <div class="col-sm-10">
              <input type="date" class="form-control <?= (session('errors.tgl-selesai')) ? 'is-invalid' : ''; ?>" id="tgl-selesai" name="tgl-selesai" value="<?= old('tgl-selesai'); ?>">
              <div class="invalid-feedback">
                <?= session('errors.tgl-selesai') ?>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="periode-keterangan" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
              <textarea name="periode-keterangan" id="periode-keterangan" rows="5" class="form-control <?= (session('errors.periode-keterangan')) ? 'is-invalid' : ''; ?>"><?= old('periode-keterangan'); ?></textarea>
              <div class="invalid-feedback">
                <?= session('errors.periode-keterangan') ?>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col d-flex justify-content-end mt-3">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
  <?php if (session('errors')) :; ?>
    $('#modal-create-periode-penilaian').modal('show');
  <?php endif ?>
</script>
<?= $this->endSection(); ?>