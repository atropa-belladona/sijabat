<div class="kategori-block">
  <h6 class="font-weight-bold text-primary">
    <a href="#">Pendidikan</a>
  </h6>
</div>
<div>
  <ul>
    <?php foreach (array_reverse($pendidikan) as $pendidikan) : ?>
      <li><?= $pendidikan->jenjang_pendidikan . ', ' . $pendidikan->bidang_studi . ' di ' . $pendidikan->nama_perguruan_tinggi . ' : ' . $pendidikan->tahun_lulus; ?></li>
    <?php endforeach ?>
  </ul>
</div>