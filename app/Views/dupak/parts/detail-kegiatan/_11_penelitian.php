<div class="detail-info">
  <h6 class="font-weight-bold text-muted">Detail <?= $sister_map->description; ?></h6>
  <div class="row">
    <div class="col">
      <table>
        <tbody>
          <tr>
            <td class="pl-4 align-top">Judul </td>
            <td class="pl-4 align-top">:</td>
            <td class="pl-4 align-top"><?= $sister_detail->judul; ?></td>
          </tr>
          <tr>
            <td class="pl-4 align-top">Lama Kegiatan</td>
            <td class="pl-4 align-top">:</td>
            <td class="pl-4 align-top"><?= $sister_detail->lama_kegiatan; ?> Tahun</td>
          </tr>
          <tr>
            <td class="pl-4 align-top">SK Penugasan</td>
            <td class="pl-4 align-top">:</td>
            <td class="pl-4 align-top"><?= $sister_detail->sk_penugasan; ?></td>
          </tr>
          <tr>
            <td class="pl-4 align-top">Tanggal SK Penugasan</td>
            <td class="pl-4 align-top">:</td>
            <td class="pl-4 align-top"><?= $sister_detail->tanggal_sk_penugasan; ?></td>
          </tr>
          <tr>
            <td class="pl-4 align-top">Lokasi</td>
            <td class="pl-4 align-top">:</td>
            <td class="pl-4 align-top"><?= $sister_detail->lokasi; ?></td>
          </tr>
          <tr>
            <td class="pl-4 align-top">Skim Kegiatan</td>
            <td class="pl-4 align-top">:</td>
            <td class="pl-4 align-top"><?= $sister_detail->jenis_skim; ?></td>
          </tr>
          <tr>
            <td class="pl-4 align-top">Tahun Usulan</td>
            <td class="pl-4 align-top">:</td>
            <td class="pl-4 align-top"><?= $sister_detail->tahun_usulan; ?></td>
          </tr>
          <tr>
            <td class="pl-4 align-top">Tahun Kegiatan</td>
            <td class="pl-4 align-top">:</td>
            <td class="pl-4 align-top"><?= $sister_detail->tahun_kegiatan; ?></td>
          </tr>
          <tr>
            <td class="pl-4 align-top">Tahun Pelaksanaan</td>
            <td class="pl-4 align-top">:</td>
            <td class="pl-4 align-top"><?= $sister_detail->tahun_pelaksanaan; ?></td>
          </tr>
          <tr>
            <td class="pl-4 align-top">Kelompok Bidang</td>
            <td class="pl-4 align-top">:</td>
            <td class="pl-4 align-top"><?= $sister_detail->kelompok_bidang; ?></td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td class="pl-4 align-top align-top">Keanggotaan</td>
            <td class="pl-4 align-top align-top">:</td>
            <td class="pl-4 align-top">
              <table class="table table-sm table-bordered dt-nopaging-nosearch">
                <thead class="bg-dark">
                  <tr>
                    <th>Jenis SDM</th>
                    <th>Nama</th>
                    <th>Peran</th>
                    <th>NIPD</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($sister_detail->anggota as $anggota) : ?>
                    <tr>
                      <td><?= $anggota->jenis; ?></td>
                      <td><?= $anggota->nama; ?></td>
                      <td><?= $anggota->peran; ?></td>
                      <td><?= $anggota->nipd; ?></td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td class="pl-4 align-top align-top">Dokumen</td>
            <td class="pl-4 align-top align-top">:</td>
            <td class="pl-4 align-top">
              <table class="table table-sm table-bordered dt-nopaging-nosearch">
                <thead class="bg-dark">
                  <tr>
                    <th>Jenis Dokumen</th>
                    <th>Nama</th>
                    <th>Nama File</th>
                    <th>Tanggal Upload</th>
                    <th>Tautan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($sister_detail->dokumen as $dokumen) : ?>
                    <tr>
                      <td><?= $dokumen->jenis_dokumen; ?></td>
                      <td><?= $dokumen->nama; ?></td>
                      <td><?= $dokumen->nama_file; ?></td>
                      <td><?= $dokumen->tanggal_upload; ?></td>
                      <td class="text-center">
                        <a href="<?= route_to('download_dokumen', $dokumen->id, $dokumen->jenis_file, $dokumen->nama_file); ?>" target="_blank">Lihat</a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>

</div>