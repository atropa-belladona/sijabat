<?= $this->extend('layouts/content-yellow'); ?>

<?= $this->section('style'); ?>
<style>
  .row-hide {
    display: none;
  }

  .pt-row:hover {
    cursor: pointer;
  }
</style>
<?= $this->endSection(); ?>

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
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link font-weight-bold active" id="unit-tab" data-toggle="tab" href="#unit" role="tab" aria-controls="unit" aria-selected="true">Unit Kerja</a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active p-2" id="unit" role="tabpanel" aria-labelledby="unit-tab">
          <table id="table-unitkerja" class="table table-sm table-warning" style="width: 100%;">
            <thead class="bg-gradient-dark text-white">
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Jenis Unit</th>
                <th class="text-left">Nama Unit</th>
                <th class="text-center">ID Unit</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              $id_jenis = 0; ?>
              <?php foreach ($unit_kerja as $unit) : ?>
                <?php if ($unit->id_jenis_unit != $id_jenis) : ?>
                  <tr class="pt-row font-weight-bold bg-warning" data-id="<?= $unit->id_jenis_unit; ?>">
                    <td colspan="4"><?= $unit->jenis_unit; ?></td>
                  </tr>
                  <?php $id_jenis = $unit->id_jenis_unit;
                  $i = 1; ?>
                <?php endif ?>
                <tr class="<?= 'ch-' . $unit->id_jenis_unit; ?> row-hide">
                  <td class="align-middle text-center"><?= $i++; ?></td>
                  <td class="align-middle text-center"><?= $unit->jenis_unit; ?></td>
                  <td class="align-middle text-left"><?= $unit->nama; ?></td>
                  <td class="align-middle text-center"><?= $unit->id_unit; ?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
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
    $("#accordion").accordion({
      collapsible: true
    });
  });

  $(document).ready(function() {


    $('.pt-row').on('click', function() {
      var id = $(this).data('id');

      $('#table-unitkerja').find('.ch-' + id).toggleClass('row-hide');
    });
  });
</script>
<?= $this->endSection(); ?>