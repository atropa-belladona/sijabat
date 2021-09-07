<table class="table table-sm datatable" style="width: 100%;">
  <thead class="bg-dark text-white">
    <tr>
      <th class="text-center">No.</th>
      <th class="text-center">Jenjang Pendidikan</th>
      <th class="text-center">Bidang Studi</th>
      <th class="text-center">Nama Perguruan Tinggi</th>
      <th class="text-center">Gelar Akademik</th>
      <th class="text-center">Tahun Lulus</th>
      <th class="text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1 ?>
    <?php foreach ($pendidikan as $item) : ?>
      <tr>
        <td class="text-center"><?= $i++; ?></td>
        <td class="text-center"><?= $item->jenjang_pendidikan; ?></td>
        <td class="text-center"><?= $item->bidang_studi; ?></td>
        <td class="text-center"><?= $item->nama_perguruan_tinggi; ?></td>
        <td class="text-center"><?= $item->gelar_akademik; ?></td>
        <td class="text-center"><?= $item->tahun_lulus; ?></td>
        <td class="text-center">
          <form action="<?= route_to('dupak_addak', $dupak->id); ?>" method="GET">
            <input type="hidden" name="activity" value="100000">
            <input type="hidden" name="detail" value="<?= $item->id; ?>">
            <button type="submit" class="btn btn-sm btn-default"><i class="fas fa-fw fa-check"></i> </button>
          </form>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>