<?= $this->extend('layouts/content-green') ?>

<!-- breadcrumb -->
<?= $this->section('breadcrumbs') ?>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?= route_to('home') ?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?= route_to('dupak_index') ?>">Daftar Usulan</a></li>
  <li class="breadcrumb-item"><a href="<?= route_to('dupak_detail') . '?id=' . $dupak->id ?>">Detail Usulan</a></li>
  <li class="breadcrumb-item active">Tambah Data <?= $kegiatan->nama; ?></li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
test
<?= $this->endSection() ?>