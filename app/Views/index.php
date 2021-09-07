<?= $this->extend('layouts/app'); ?>

<!-- content header section -->
<?= $this->section('content-header'); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col d-flex justify-content-between align-items-center py-1">
      <div class="menu-title">
        <h1 class="font-weight-bold m-0">Selamat Datang <?= (isset(user()->name) ? user()->name : ''); ?></h1>
      </div>
      <div class="breadcrumbs">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= route_to('home'); ?>">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>


<!-- content main section -->
<?= $this->section('content-main'); ?>
<div class="container-fluid">

</div>
<!--/. container-fluid -->
<?= $this->endSection(); ?>