<?= $this->extend('users/layoutdosen'); ?>

<?= $this->section('breadcrumbs'); ?>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?= route_to('home'); ?>">Home</a></li>
  <li class="breadcrumb-item active">Profil Dosen</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('content'); ?>
<div class="content">
 test
</div>
<?= $this->endSection(); ?>