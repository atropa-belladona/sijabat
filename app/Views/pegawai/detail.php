<?= $this->extend('layouts/content-green') ?>

<!-- breadcrumb -->
<?= $this->section('breadcrumbs') ?>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?= route_to('home') ?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?= route_to('pegawai_index') ?>">Daftar Pegawai</a></li>
  <li class="breadcrumb-item active">Nama</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col">
    <?= $this->include('pegawai/layouts/_detail-profile-db') ?>
  </div>
</div>
<?= $this->endSection() ?>
