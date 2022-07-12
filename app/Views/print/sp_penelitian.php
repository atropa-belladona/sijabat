<?= $this->extend('print/layout/print', ['title' => 'Cetak Surat Pernyataan']); ?>

<?= $this->section('style'); ?>
<style>
  body {
    margin-top: 2cm;
  }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="surat-pernyataan">

  <div class="row">
    <div class="col text-center">
      <div class="font-weight-bold text-md">SURAT PERNYATAAN</div>
      <div class="font-weight-bold text-md">MELAKSANAKAN PENELITIAN</div>
    </div>
  </div>

  <?= $this->include('print/parts/_sp_header'); ?>

  <br>
  <div class="row mt-4">
    <div class="col text-sm">
      Telah melaksanakan kegiatan penelitian sebagai berikut :
    </div>
  </div>

  <?= $this->include('print/parts/_sp_footer'); ?>
</div>
<?= $this->endSection(); ?>