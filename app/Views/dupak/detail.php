<?= $this->extend('layouts/content-green') ?>

<!-- breadcrumb -->
<?= $this->section('breadcrumbs') ?>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?= route_to('home') ?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?= route_to('dupak_index') ?>">Daftar Usulan</a></li>
  <li class="breadcrumb-item active">Detail </li>
</ol>
<?= $this->endSection() ?>

<!-- content section -->
<?= $this->section('content') ?>
<div class="row">
  <div class="col d-flex justify-content-between font-weight-bold mb-3">
    <div>
      Status : <span class="badge <?= $dupak->bg_color; ?>"><?= $dupak->ur_tahap; ?></span>
    </div>
    <div class="text-danger">
      Masa Penilaian : <?= date_str($dupak->tgl_mulai) . ' s.d. ' . date_str($dupak->tgl_selesai); ?>
    </div>
  </div>
</div>
<div class="row">
  <div class="col">
    <section class="information">
      <h6 class="font-weight-bold text-primary">Keterangan Perorangan</h6>
      <div class="row">
        <div class="col-lg-10 col-md-8">
          <!-- include keterangan perorangan -->
          <?= $this->include('dupak/parts/_01_keterangan_perorangan'); ?>
        </div>
        <div class="col-lg-2 col-md-4 pr-4">
          <!-- include foto -->
          <?= $this->include('dupak/parts/_02_foto_perorangan'); ?>
        </div>
      </div>

    </section>
  </div>
</div>

<hr class="bt-5">

<div class="row">
  <div class="col">
    <section class="usulan">
      <!-- include view parts 03 usulan angka kredit -->
      <?= $this->include('dupak/parts/_03_usulan_ak'); ?>
    </section>
  </div>
</div>

<hr class="bt-5">
<div class="row">
  <div class="col-lg-8 col-md-12">
    <section class="dokumen-pengantar">
      <!-- include view parts 03 usulan angka kredit -->
      <?= $this->include('dupak/parts/_04_dokumen_pengantar'); ?>
    </section>
  </div>
  <div class="col d-flex flex-row-reverse align-items-end">
    <!-- button actions -->
    <div class="kirim">
      <form action="<?= route_to('dupak_send', $dupak->id); ?>" method="POST" class=" d-flex flex-row-reverse justify-content-between">
        <?= csrf_field(); ?>

        <?php if (in_groups('dosen') and ($dupak->tahap_id == 1 or $dupak->tahap_id == 25 or $dupak->tahap_id == 45)) : ?>
          <button type="submit" class="btn btn-sm btn-success bg-gradient-success"><i class="fas fa-fw fa-arrow-right"></i> Kirim Usulan ke Admin Fakultas</button>
        <?php endif ?>

        <?php if (in_groups('operator') and ($dupak->tahap_id == 1 or $dupak->tahap_id == 10 or $dupak->tahap_id == 25 or $dupak->tahap_id == 45)) : ?>
          <button type="submit" class="btn btn-sm btn-success bg-gradient-success"><i class="fas fa-fw fa-arrow-right"></i> Kirim Usulan ke Verifikator Fakultas</button>
        <?php endif ?>

        <?php if (in_groups('verifikator') and $dupak->tahap_id == 20) : ?>
          <button type="submit" class="btn btn-sm btn-success bg-gradient-success"><i class="fas fa-fw fa-arrow-right"></i> Kirim Usulan ke Bagian Kepegawaian</button>
          <button type="button" class="btn btn-sm btn-danger bg-gradient-danger" data-toggle="modal" data-target="#modal-catatan"><i class="fas fa-fw fa-arrow-left"></i> Kembalikan untuk diperbaiki</button>
        <?php endif ?>

        <?php if (in_groups('koordinator') and $dupak->tahap_id == 30) : ?>
          <button type="submit" class="btn btn-sm btn-success bg-gradient-success"><i class="fas fa-fw fa-arrow-right"></i> Kirim Usulan ke Tim Penilai PAK</button>
        <?php endif ?>

        <?php if (in_groups('reviewer') and $dupak->tahap_id == 40) : ?>
          <button type="submit" class="btn btn-sm btn-success bg-gradient-success"><i class="far fa-fw fa-thumbs-up"></i> Setujui dan Kirim ke Bagian Kepegawaian</button>
          <button type="button" class="btn btn-sm btn-default bg-gradient-default" data-toggle="modal" data-target="#modal-alasan"><i class="far fa-fw fa-thumbs-down"></i> Tolak Usulan</button>
          <button type="button" class="btn btn-sm btn-danger bg-gradient-danger" data-toggle="modal" data-target="#modal-catatan"><i class="fas fa-fw fa-arrow-left"></i> Kembalikan untuk diperbaiki</button>
        <?php endif ?>
      </form>
    </div>
    <!-- /. button actions -->
  </div>
</div>

<?= $this->endSection() ?>

<!-- modal sections -->
<?= $this->section('modal'); ?>
<!-- Modal -->
<div class="modal fade" id="modal-catatan">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header py-2">
        <h6 class="modal-title font-weight-bold">Catatan Khusus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form action="<?= route_to('dupak_return', $dupak->id); ?>" method="POST">
          <?= csrf_field(); ?>
          <div class="form-group row">
            <div class="col">
              <textarea name="catatan" id="catatan" class="form-control" rows="10"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col d-flex justify-content-end">
              <button type="submit" class="btn btn-sm btn-danger btn-gradient-danger"><i class="fas fa-fw fa-arrow-left"></i> Kembalikan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-alasan">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header py-2">
        <h6 class="modal-title font-weight-bold">Alasan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form action="<?= route_to('dupak_reject', $dupak->id); ?>" method="POST">
          <?= csrf_field(); ?>
          <div class="form-group row">
            <div class="col">
              <textarea name="alasan" id="alasan" class="form-control" rows="10"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col d-flex justify-content-end">
              <button type="submit" class="btn btn-sm btn-danger btn-gradient-danger"><i class="fas fa-fw fa-thumbs-down"></i> Tolak Usulan</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<?= $this->endSection(); ?>