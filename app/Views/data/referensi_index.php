<?= $this->extend('layouts/content-yellow'); ?>

<?= $this->section('breadcrumbs'); ?>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?= route_to('home'); ?>">Home</a></li>
  <li class="breadcrumb-item active">Referensi</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('right-button-menu'); ?>
<form action="<?= route_to('sinkronisasi_referensi'); ?>" method="POST">
  <?= csrf_field() ?>
  <button type="submit" class="btn btn-sm bg-gradient-danger"><i class="fas fa-fw fa-sync-alt"></i> Sinkronisasi Referensi Unit Kerja dengan SISTER</button>
</form>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="content">
  <div class="row">
    <div class="col py-0">
      <div id="tabs">
        <ul>
          <li class="font-weight-bold"><a href="#tabs-unitkerja"><i class="fas fa-fw fa-building"></i> Unit Kerja</a></li>
        </ul>
        <div id="tabs-unitkerja" class="px-1">

          <div class="row">
            <div class="col">
              <table id="table-unitkerja" class="table table-sm table-warning" style="width: 100%;">
                <thead class="bg-gradient-dark text-white">
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-left">Nama Unit</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1 ?>
                  <?php foreach ($unit_kerja as $unit) : ?>
                    <tr>
                      <td class="align-middle text-center"><?= $i++; ?></td>
                      <td class="align-middle text-left"><?= $unit->nama; ?></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
  $(function() {
    $("#tabs").tabs();
  });

  $(document).ready(function() {
    $('#table-unitkerja').DataTable();
  });
</script>
<?= $this->endSection(); ?>