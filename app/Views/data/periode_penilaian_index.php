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
              <td><?= $i++; ?></td>
              <td><?= $periode->tgl_mulai; ?></td>
              <td><?= $periode->tgl_selesai; ?></td>
              <td><?= $periode->keterangan; ?></td>
              <td><?= $periode->lock; ?></td>
              <td></td>
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
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Extra Large Modal</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>One fine body…</p>
      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?= $this->endSection(); ?>