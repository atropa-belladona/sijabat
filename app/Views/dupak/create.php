<?= $this->extend('layouts/content-green'); ?>

<!-- breadcrumb -->
<?= $this->section('breadcrumbs'); ?>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?= route_to('home'); ?>">Home</a></li>
  <li class="breadcrumb-item active">Buat Usulan</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
  <?php if (!$periode_penilaian) : ?>
    <!-- There's no open periode penilaian -->
    <div class="row">
      <div class="col">
        <p>
          Belum masa periode penilaian
        </p>
      </div>
    </div>
  <?php else : ?>
    <!-- Open Periode Penilaian -->

    <div class="row">
      <div class="col">
        <?= $this->include('dupak/form/_usulan'); ?>
      </div>
    </div>
  <?php endif ?>
</div>
<?= $this->endSection(); ?>