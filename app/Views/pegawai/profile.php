<?= $this->extend('layouts/app'); ?>

<?= $this->section('content-header'); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col d-flex justify-content-between align-items-center py-2">
      <div class="breadcrumbs">
        <h1 class="menu-title">Selamat Datang <?= ucwords(strtolower($pegawai->nama_sdm)); ?>,</h1>
      </div>
      <div class="menu-title">
        <h1 class="m-0"><?= (isset($titlePage)) ? $titlePage : ''; ?></h1>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('content-main'); ?>
<div class="detail-pegawai">
  <?= $this->include('pegawai/layouts/_detail-profile-db'); ?>
</div>
<?= $this->endSection(); ?>