<?= $this->extend('layouts/content-green') ?>

<!-- breadcrumb -->
<?= $this->section('breadcrumbs') ?>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?= route_to('home') ?>">Home</a></li>
  <li class="breadcrumb-item active">Daftar Usulan</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">
  <?php if (in_groups('operator') or in_groups('dosen')) : ?>
    <div class="row">
      <div class="col mb-2">
        <button type="button" class="btn btn-xs btn-danger toggle-delete"><i class="fas fa-fw fa-trash-alt"></i> Hapus
          Usulan</button>
      </div>
    </div>
    <hr>
  <?php endif ?>
  <div class="row">
    <div class="col">
      <table id="table-dupak" class="table table-sm table-success table-hover datatable" style="width: 100%;">
        <thead class="bg-gradient-dark text-white">
          <tr>
            <th class="align-middle text-center">No.</th>
            <th class="align-middle text-center">Periode Penilaian</th>
            <th class="align-middle text-left">Nama</th>
            <th class="align-middle text-center">NIP</th>
            <th class="align-middle text-center">NIDN</th>
            <th class="align-middle text-center">Jabatan Fungsional</th>
            <th class="align-middle text-center">MK Gol. Lama</th>
            <th class="align-middle text-center">MK Gol. Baru</th>
            <th class="align-middle text-center">Status</th>
            <th class="align-middle text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($dupak as $item) : ?>
            <tr>
              <td class="align-middle text-center"><?= $i++ ?></td>
              <td class="align-middle text-center"><?= $item->tgl_mulai . ' s.d. ' . $item->tgl_selesai ?></td>
              <td class="align-middle text-left"><?= $item->nama_sdm ?></td>
              <td class="align-middle text-center"><?= $item->nip ?></td>
              <td class="align-middle text-center"><?= $item->nidn ?></td>
              <td class="align-middle text-center"><?= $item->jabfung ?></td>
              <td class="align-middle text-center"><?= $item->mk_lama_thn . ' Tahun ' . $item->mk_lama_bln . ' Bulan' ?>
              </td>
              <td class="align-middle text-center"><?= $item->mk_baru_thn . ' Tahun ' . $item->mk_baru_bln . ' Bulan' ?>
              </td>
              <td class="align-middle text-center"><span class="badge <?= $item->bg_color; ?>">-- <?= $item->ur_tahap ?> --</span>
              </td>
              <td class="align-middle d-flex justify-content-center">
                <div class="proses mr-3">
                  <a href="<?= route_to('dupak_detail', $item->id) ?>" class="btn btn-xs btn-success"><i class="fas fa-fw fa-arrow-right"></i> Proses</a>
                </div>

                <?php if ($item->tahap_id <= 10) : ?>
                  <div class="btn-delete d-none">
                    <form action="<?= route_to('dupak_delete', $item->id) ?>" method="post">
                      <?= csrf_field() ?>
                      <input type="hidden" name="_method" value="delete">
                      <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Yakin hapus data usulan ini?');" title="Hapus Usulan"><i class="fas fa-fw fa-times"></i></button>
                    </form>
                  </div>
                <?php endif ?>

              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
  $('.toggle-delete').on('click', function() {
    $('.toggle-delete').toggleClass('btn-danger');
    $('.btn-delete').toggleClass('d-none');
  })
</script>
<?= $this->endSection()
?>