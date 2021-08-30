<?= $this->extend('layouts/content-green'); ?>

<!-- breadcrumb -->
<?= $this->section('breadcrumbs'); ?>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?= route_to('home'); ?>">Home</a></li>
  <li class="breadcrumb-item active">Daftar Usulan</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <table id="table-dupak" class="table table-sm table-success datatable" style="width: 100%;">
        <thead class="bg-gradient-dark text-white">
          <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>NIP / NIDN</th>
            <th>Jabatan Fungsional</th>
            <th>MK Gol. Lama</th>
            <th>MK Gol. Baru</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($dupak as $item) : ?>
            <tr>
              <td><?= $i++; ?></td>
              <td><?= $item->nama_sdm; ?></td>
              <td><?= $item->nip . ' / ' . $item->nidn; ?></td>
              <td></td>
              <td><?= $item->mk_lama_thn . ' Tahun ' . $item->mk_lama_bln . ' Bulan'; ?></td>
              <td><?= $item->mk_baru_thn . ' Tahun ' . $item->mk_baru_bln . ' Bulan'; ?></td>
              <td></td>
              <td>
                <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-list"></i></a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>