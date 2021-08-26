<?= $this->extend('layouts/content-green'); ?>

<!-- breadcrumb -->
<?= $this->section('breadcrumbs'); ?>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?= route_to('home'); ?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?= route_to('data_pegawai'); ?>">Data Pegawai</a></li>
  <li class="breadcrumb-item active"><?= $pegawai->nama_sdm; ?></li>
</ol>
<?= $this->endSection() ?>


<!-- content -->
<?= $this->section('content'); ?>
<!-- Main content -->
<section class="content">
  <?= $this->include('pegawai/layouts/_detail-profile'); ?>
</section>
<!-- /.content -->
<?= $this->endSection(); ?>