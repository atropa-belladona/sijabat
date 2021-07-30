<?= $this->extend('layouts/app'); ?>

<?= $this->section('content-header'); ?>
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col d-flex justify-content-between py-2">
      <div>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= route_to('home'); ?>">Home</a></li>
          <li class="breadcrumb-item active">Pengguna</li>
        </ol>
      </div>
      <div>
        <h1 class="m-0">Pengaturan Pengguna</h1>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>



<?= $this->section('content-main'); ?>

<?= $this->endSection(); ?>