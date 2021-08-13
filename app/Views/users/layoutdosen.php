<?= $this->extend('layouts/app'); ?>

<?= $this->section('content-header'); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col d-flex justify-content-between align-items-center py-1">
      <div class="breadcrumbs">
        <?= $this->renderSection('breadcrumbs'); ?>
      </div>
      <div class="menu-title">
        <h1 class="m-0">Profil Dosen</h1>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>


<?= $this->section('content-main'); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="callout callout-success">
        <div class="row">
          <div class="col">
            <h6 class="py-0 font-weight-bold"><?= (isset($content_title)) ? $content_title : ''; ?></h6>
          </div>
        </div>
        <hr>

        <?= $this->renderSection('content'); ?>

      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>