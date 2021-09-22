<div class="kategori-block">
  <h6 class="font-weight-bold text-primary">
    <a href="#">Daftar Dokumen</a>
  </h6>
</div>
<div>
  <table class="table table-sm table-hovered datatable" style="width: 100%;">
    <thead>
      <tr>
        <th>No.</th>
        <th>Jenis Dokumen</th>
        <th>Nama Dokumen</th>
        <th>Keterangan</th>
        <th>Tanggal Upload</th>
        <th class="text-center">Tautan</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1 ?>
      <?php foreach ($dokumen as $dok) : ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><?= $dok->jenis_dokumen; ?></td>
          <td><?= $dok->nama; ?></td>
          <td><?= $dok->keterangan; ?></td>
          <td><?= $dok->tanggal_upload; ?></td>
          <td class="text-center">
            <a href="<?= route_to('download_dokumen', $dok->id, $dok->jenis_file, $dok->nama_file); ?>" target="_blank">Lihat</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>