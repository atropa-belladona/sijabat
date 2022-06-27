<div class="rekap-dupak">
  <div class="row">
    <div class="col text-center">
      <h6 class="font-weight-bold">DAFTAR USUL PENETAPAN ANGKA KREDIT</h6>
      <h6 class="font-weight-bold">JABATAN AKADEMIK DOSEN</h6>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col text-center">
      Nomor : ...
    </div>
  </div>

  <div class="row">
    <div class="col d-flex justify-content-between">
      <div class="left">Instansi : Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi</div>
      <div class="right">Masa Penilaian : <?= date_str($dupak->masa_awal) . ' s.d. ' . date_str($dupak->masa_akhir) ?></div>
    </div>
  </div>

  <div class="row mt-2">
    <div class="col table-responsive">
      <table class="table table-sm table-bordered" style="width: 100%;">
        <thead>
          <tr>
            <th class="text-center" style="width: 1em;">No</th>
            <th class="text-center" colspan="3">Keterangan Perorangan</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="align-middle text-center">1.</td>
            <td class="align-middle" colspan="2">Nama</td>
            <td class="align-middle">
              <?php if (isset($dupak->nama_sdm)) : ?>
                <?= $dupak->nama_sdm; ?>
              <?php endif ?>
            </td>
          </tr>
          <tr>
            <td class="align-middle text-center">2.</td>
            <td class="align-middle" colspan="2">NIP / NIDN</td>
            <td class="align-middle">
              <?php if (isset($dupak->nip) and $dupak->nip != '') : ?>
                <?= $dupak->nip; ?>
              <?php endif ?>

              <?php if (isset($dupak->nidn) and $dupak->nidn != '') : ?>
                <?= ' / ' . $dupak->nidn; ?>
              <?php endif ?>
            </td>
          </tr>
          <tr>
            <td class="align-middle text-center">3.</td>
            <td class="align-middle" colspan="2">Nomor Seri KARPEG</td>
            <td class="align-middle">
              <?php if (isset($dupak->no_karpeg)) : ?>
                <?= $dupak->no_karpeg; ?>
              <?php endif ?>
            </td>
          </tr>
          <tr>
            <td class="align-middle text-center">4.</td>
            <td class="align-middle" colspan="2">Pangkat / Gol. Ruang / TMT</td>
            <td class="align-middle">
              <?php if (isset($kepangkatan->pangkat)) : ?>
                <?= $kepangkatan->pangkat; ?>
              <?php endif ?>

              <?php if (isset($kepangkatan->golongan)) : ?>
                <?= ' / ' . $kepangkatan->golongan; ?>
              <?php endif ?>

              <?php if (isset($kepangkatan->tanggal_mulai)) : ?>
                <?= ' / ' . date_str($kepangkatan->tanggal_mulai); ?>
              <?php endif ?>
            </td>
          </tr>
          <tr>
            <td class="align-middle text-center">5.</td>
            <td class="align-middle" colspan="2">Tempat dan Tanggal Lahir</td>
            <td class="align-middle">
              <?php if (isset($about_me->tempat_lahir)) : ?>
                <?= $about_me->tempat_lahir; ?>
              <?php endif ?>

              <?php if (isset($about_me->tanggal_lahir)) : ?>
                <?= ', ' . date_str($about_me->tanggal_lahir); ?>
              <?php endif ?>
            </td>
          </tr>
          <tr>
            <td class="align-middle text-center">6.</td>
            <td class="align-middle" colspan="2">Jenis Kelamin</td>
            <td class="align-middle">
              <?php if (isset($about_me->jenis_kelamin)) : ?>
                <?= ($about_me->jenis_kelamin == 'L') ? 'Pria' : 'Wanita' ?>
              <?php endif ?>
            </td>
          </tr>
          <tr>
            <td class="align-middle text-center">7.</td>
            <td class="align-middle" colspan="2">Pendidikan Terakhir</td>
            <td class="align-middle">
              <?php if (isset($pendidikan[0]->jenjang_pendidikan)) : ?>
                <?= $pendidikan[0]->jenjang_pendidikan; ?>
              <?php endif ?>
              <?php if (isset($pendidikan[0]->bidang_studi)) : ?>
                <?= $pendidikan[0]->bidang_studi; ?>
              <?php endif ?>
            </td>
          </tr>
          <tr>
            <td class="align-middle text-center">8.</td>
            <td class="align-middle" colspan="2">Jabatan Fungsional / TMT</td>
            <td class="align-middle">
              <?php if (isset($dupak->jabfung)) : ?>
                <?= $dupak->jabfung; ?>
              <?php endif ?>

              <?php if (isset($dupak->tmt_jabfung)) : ?>
                <?= ' / ' . date_str($dupak->tmt_jabfung); ?>
              <?php endif ?>
            </td>
          </tr>
          <tr>
            <td class="align-middle text-center" rowspan="2">9.</td>
            <td class="align-middle" rowspan="2">Masa Kerja Golongan</td>
            <td class="align-middle">a. Lama</td>
            <td class="align-middle">
              <?php if (isset($dupak->mk_lama_thn)) : ?>
                <?= $dupak->mk_lama_thn . ' Tahun '; ?>
              <?php endif ?>
              <?php if (isset($dupak->mk_lama_bln)) : ?>
                <?= $dupak->mk_lama_bln . ' Bulan '; ?>
              <?php endif ?>
            </td>
          </tr>
          <tr>
            <td class="align-middle">b. Baru</td>
            <td class="align-middle">
              <?php if (isset($dupak->mk_baru_thn)) : ?>
                <?= $dupak->mk_baru_thn . ' Tahun '; ?>
              <?php endif ?>
              <?php if (isset($dupak->mk_baru_bln)) : ?>
                <?= $dupak->mk_baru_bln . ' Bulan '; ?>
              <?php endif ?>
            </td>
          </tr>
          <tr>
            <td class="align-middle text-center">10.</td>
            <td class="align-middle" colspan="2">Unit Kerja</td>
            <td class="align-middle">
              <?php if (isset($penugasan->jenjang_pendidikan)) : ?>
                <?= $penugasan->jenjang_pendidikan; ?>
              <?php endif ?>

              <?php if (isset($penugasan->unit_kerja)) : ?>
                <?= $penugasan->unit_kerja; ?>
              <?php endif ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="row mt-2">
    <div class="col table-responsive">
      <table class="table table-sm table-bordered table-hover" style="width: 100%;">
        <thead>
          <tr>
            <th class="align-middle text-center" rowspan="4" style="width: 1em;">No.</th>
            <th class="align-middle text-center" colspan="7">Unsur yang Dinilai</th>
          </tr>
          <tr>
            <th class="align-middle text-center" rowspan="3">Unsur, Sub Unsur dan Butir Kegiatan</th>
            <th class="align-middle text-center" colspan="6">Angka Kredit Menurut</th>
          </tr>
          <tr>
            <th class="align-middle text-center" colspan="3">Instansi Pengusul</th>
            <th class="align-middle text-center" colspan="3">Tim Penilai</th>
          </tr>
          <tr>
            <th class="align-middle text-center">Lama</th>
            <th class="align-middle text-center">Baru</th>
            <th class="align-middle text-center">Jumlah</th>
            <th class="align-middle text-center">Lama</th>
            <th class="align-middle text-center">Baru</th>
            <th class="align-middle text-center">Jumlah</th>
          </tr>
          <tr>
            <th class="align-middle text-center">1</th>
            <th class="align-middle text-center">2</th>
            <th class="align-middle text-center">3</th>
            <th class="align-middle text-center">4</th>
            <th class="align-middle text-center">5</th>
            <th class="align-middle text-center">6</th>
            <th class="align-middle text-center">7</th>
            <th class="align-middle text-center">8</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>