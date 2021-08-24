<?= $this->extend('layouts/content-green'); ?>

<?= $this->section('breadcrumbs'); ?>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?= route_to('home'); ?>">Home</a></li>
  <li class="breadcrumb-item active">Data Pegawai</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('right-button-menu'); ?>
<form action="<?= route_to('sinkronisasi_dosen'); ?>" method="POST">
  <?= csrf_field() ?>
  <button type="submit" class="btn btn-link btn-sm bg-gradient-danger" onclick="return confirm('Sinkronisasi Data Pegawai ?');"><i class="fas fa-fw fa-sync-alt"></i> Sinkronisasi Data Pegawai dengan SISTER</button>
</form>
<?= $this->endSection() ?>

<?= $this->section('content'); ?>
<div class="content">
  <div class="row">
    <div class="col">
      <table id="table-pegawai" class="table table-sm table-success" style="width: 100%;">
        <thead class="bg-gradient-dark text-white">
          <tr>
            <th class="text-center">No.</th>
            <th class="text-left">Nama</th>
            <th class="text-center">NIDN</th>
            <th class="text-center">NIP</th>
            <th class="text-center">Status Keaktifan</th>
            <th class="text-center">Status Pegawai</th>
            <th class="text-center">Jenis Pegawai</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 ?>
          <?php foreach ($pegawai as $pegawai) : ?>
            <tr>
              <td class="align-middle text-center"><?= $i++; ?></td>
              <td class="align-middle text-left"><?= $pegawai->nama_sdm; ?></td>
              <td class="align-middle text-center"><?= $pegawai->nidn; ?></td>
              <td class="align-middle text-center"><?= $pegawai->nip; ?></td>
              <td class="align-middle text-center"><?= $pegawai->status_aktif; ?></td>
              <td class="align-middle text-center"><?= $pegawai->status_pegawai; ?></td>
              <td class="align-middle text-center"><?= $pegawai->jenis_sdm; ?></td>
              <td class="align-middle text-center">
                <a href="<?= route_to('detail_pegawai', $pegawai->id_sdm); ?>" class="btn btn-sm btn-success" title="Detail Dosen"><i class="fas fa-fw fa-list"></i></a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>


<?= $this->section('script'); ?>
<script>
  $(document).ready(function() {
    $('#table-pegawai').DataTable();
  });
</script>
<?= $this->endSection(); ?>