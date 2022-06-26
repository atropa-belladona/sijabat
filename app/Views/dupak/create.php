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
  <div class="row">
    <div class="col">
      <?= $this->include('dupak/form/_usulan'); ?>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>