<?= $this->extend('layouts/content-green') ?>

<!-- breadcrumb -->
<?= $this->section('breadcrumbs') ?>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?= route_to('home') ?>">Home</a></li>
  <li class="breadcrumb-item active">Daftar Pegawai</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col">
    <table id="table-pegawai" class="table table-sm table-warning datatable" style="width: 100%;">
      <thead class="thead-dark text-white">
        <tr>
          <th class="text-center">No.</th>
          <th class="text-left">Nama Pegawai</th>
          <th class="text-center">NIP</th>
          <th class="text-center">NIDN</th>
          <th class="text-center">Jenis Kepegawaian</th>
          <th class="text-center">Unit Kerja</th>
          <th class="text-center">Aksi</th>
          <th class="text-center">DUPAK</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($pegawai as $sdm) : ?>
        <tr>
          <td class="align-middle text-center"><?= $i++ ?></td>
          <td class="align-middle text-left"><?= ucwords(strtolower($sdm->nama)) ?></td>
          <td class="align-middle text-center"><?= $sdm->nip ?></td>
          <td class="align-middle text-center"><?= $sdm->nidn ?></td>
          <td class="align-middle text-center"><?= $sdm->jenis_sdm ?></td>
          <td class="align-middle text-center"><?= $sdm->jenjang_pendidikan . ' ' . $sdm->unit_kerja ?></td>
          <td class="align-middle text-center">
            <form action="<?= route_to('pegawai_index') ?>" method="GET">
              <input type="hidden" name="id" value="<?= $sdm->id_sdm ?>">
              <button type="submit" class="btn btn-xs btn-info"><i class="fas fa-fw fa-user"></i> Detail</button>
            </form>
          </td>
          <td class="align-middle text-center">
            <a href="<?= route_to('operator_request', $sdm->id_sdm) ?>" class="btn btn-xs btn-warning"><i
                class="fas fa-fw fa-arrow-right"></i> Usulkan</a>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>
<?= $this->endSection()
?>
