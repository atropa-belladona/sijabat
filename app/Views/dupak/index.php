<?= $this->extend('layouts/content-green'); ?>

<!-- breadcrumb -->
<?= $this->section('breadcrumbs'); ?>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?= route_to('home'); ?>">Home</a></li>
  <li class="breadcrumb-item active">Daftar Usulan</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('content'); ?>
daftar usulan
<?= $this->endSection(); ?>