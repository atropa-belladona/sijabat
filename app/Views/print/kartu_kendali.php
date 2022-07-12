<?= $this->extend('print/layout/print', ['title' => 'Cetak Kartu Kendali']); ?>

<?= $this->section('content'); ?>
<div class="kartu-kendali">

  <div class="row">
    <div class="col text-center">
      <h6 class="font-weight-bold text-lg">KARTU KENDALI USUL KENAIKAN/PENYESUAIAN JABATAN</h6>
    </div>
  </div>

  <div class="row">
    <div class="col mb-1">
      <span class="font-weight-bold text-md">I. DATA YANG BERSANGKUTAN</span>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col border table-responsive">
      <table class="table table-sm table-borderless" style="width: 100%;">
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td><?= $dupak->nama_sdm ?? '' ?></td>
          <td>NIP</td>
          <td>:</td>
          <td><?= $dupak->nip ?? '' ?></td>
        </tr>
        <tr>
          <td>Pangkat</td>
          <td>:</td>
          <td>
            <?php if (isset($kepangkatan->pangkat)) : ?>
              <?= $kepangkatan->pangkat; ?>
            <?php endif ?>

            <?php if (isset($kepangkatan->golongan)) : ?>
              <?= ' / ' . $kepangkatan->golongan; ?>
            <?php endif ?>
          </td>
          <td>TMT</td>
          <td>:</td>
          <td>
            <?php if (isset($dupak->tmt_gol_lama)) : ?>
              <?= date_str($dupak->tmt_gol_lama); ?>
            <?php endif ?>
          </td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td>:</td>
          <td>
            <?php if (isset($dupak->jabfung)) : ?>
              <?= $dupak->jabfung; ?>
            <?php endif ?>
          </td>
          <td>TMT</td>
          <td>:</td>
          <td>
            <?php if (isset($dupak->tmt_jabfung)) : ?>
              <?= date_str($dupak->tmt_jabfung); ?>
            <?php endif ?>
          </td>
        </tr>
        <tr>
          <td>Fakultas/Program Studi</td>
          <td>:</td>
          <td>
            <?= $dupak->fakultas ?? '' ?>
          </td>
          <td colspan="3">
            <?= $dupak->unit_kerja ?>
          </td>
        </tr>
        <tr>
          <td>Usul ke Jabatan</td>
          <td>:</td>
          <td>
            <?= $dupak->jabfung_baru ?? ''; ?>
            <?= '(' . $dupak->kum_baru . ' kum)'; ?>
          </td>
          <td colspan="3" class="font-weight-bold">
            <?= $dupak->kum_baru . ' - ' . $dupak->kum_lama . ' = ' . $dupak->kum_baru - $dupak->kum_lama . ' kum'; ?>
          </td>
        </tr>
      </table>
    </div>
  </div>

  <div class="row">
    <div class="col mb-1">
      <span class="font-weight-bold text-md">II. PERINCIAN ANGKA KREDIT</sp>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col p-0 table-responsive">
      <table class="table table-sm table-bordered table-hover" style="width: 100%;">
        <thead>
          <tr>
            <th class="text-center align-middle" rowspan="2">Unsur Utama</th>
            <th class="text-center" colspan="3">Jumlah yang dimiliki</th>
            <th class="text-center align-middle" rowspan="2">Yang diperlukan</th>
          </tr>
          <tr>
            <th class="text-center">Ijazah / kelebihan</th>
            <th class="text-center">Yang dimiliki</th>
            <th class="text-center">Jumlah</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Bidang A Mengikuti Pendidikan Formal memperoleh Ijazah/Pra-Jabatan</td>
            <td></td>
            <td class="text-right">
              <?= number_format2($total_ak_bidang_a); ?>
            </td>
            <td class="text-right">
              <?= number_format2($total_ak_bidang_a); ?>
            </td>
            <td></td>
          </tr>
          <tr class="font-weight-bold">
            <td class="text-right">Jumlah Bidang ( A )</td>
            <td></td>
            <td class="text-right">
              <?= number_format2($total_ak_bidang_a); ?>
            </td>
            <td class="text-right">
              <?= number_format2($total_ak_bidang_a); ?>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>Bidang B (Pendidikan dan Pengajaran) Minimum 45%</td>
            <td></td>
            <td class="text-right">
              <?= number_format2($total_ak_bidang_b); ?>
            </td>
            <td class="text-right">
              <?= number_format2($total_ak_bidang_b); ?>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>Bidang C (Penelitian) Minimum 35%</td>
            <td></td>
            <td class="text-right">
              <?= number_format2($total_ak_bidang_c); ?>
            </td>
            <td class="text-right">
              <?= number_format2($total_ak_bidang_c); ?>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>Bidang D (Pengabdian pada Masyarakat) Maksimum 10%</td>
            <td></td>
            <td class="text-right">
              <?= number_format2($total_ak_bidang_d); ?>
            </td>
            <td class="text-right">
              <?= number_format2($total_ak_bidang_d); ?>
            </td>
            <td></td>
          </tr>
          <tr class="font-weight-bold">
            <td class="text-right">Jumlah Bidang ( A + B + C + D )</td>
            <td></td>
            <td class="text-right">
              <?= number_format2($total_ak_bidang_a + $total_ak_bidang_b + $total_ak_bidang_c + $total_ak_bidang_d); ?>
            </td>
            <td class="text-right">
              <?= number_format2($total_ak_bidang_a + $total_ak_bidang_b + $total_ak_bidang_c + $total_ak_bidang_d); ?>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>Bidang E (Penunjang Tri Dharma Perguruan Tinggi) Maksimum 10%</td>
            <td></td>
            <td class="text-right">
              <?= number_format2($total_ak_bidang_e); ?>
            </td>
            <td class="text-right">
              <?= number_format2($total_ak_bidang_e); ?>
            </td>
            <td></td>
          </tr>
          <tr class="font-weight-bold">
            <td class="text-right">Jumlah Bidang ( A + B + C + D + E )</td>
            <td></td>
            <td class="text-right">
              <?= number_format2($total_ak_bidang_a + $total_ak_bidang_b + $total_ak_bidang_c + $total_ak_bidang_d + $total_ak_bidang_e); ?>
            </td>
            <td class="text-right">
              <?= number_format2($total_ak_bidang_a + $total_ak_bidang_b + $total_ak_bidang_c + $total_ak_bidang_d + $total_ak_bidang_e); ?>
            </td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <span class="font-weight-bold text-md">III. HASIL PENILAIAN</span>
    </div>
  </div>
  <div class="row">
    <div class="col p-0 table-responsive border">
      <table class="table table-sm" style="width: 100%;">
        <tbody>
          <tr>
            <td class="border-bottom" style="width: 90px;">Penilai I</td>
            <td class="border-bottom">:</td>
            <td class="border-bottom"> </td>
          </tr>
          <tr>
            <td class="border-bottom">Penilai II</td>
            <td class="border-bottom">:</td>
            <td class="border-bottom"> </td>
          </tr>
          <tr>
            <td class="border-bottom">Penilai III</td>
            <td class="border-bottom">:</td>
            <td class="border-bottom"> </td>
          </tr>

        </tbody>
      </table>

      <table class="table table-sm table-borderless">
        <tr class="border-top">
          <td colspan="2">
            Keputusan Tim Penilai Angka Kredit Universitas Negeri Jakarta. <br>
            Disetujui / tidak disetujui, dalam mata kuliah : <b><?= $dupak->mata_kuliah ?></b>
          </td>
        </tr>
        <tr>
          <td style="width: 480px;">dengan catatan :</td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td>
            <div>Jakarta, </div>
            <div class="font-weight-bold">
              Ketua, <br>
              <br><br><br>
              ....................................... <br>
              NIP. ................................
            </div>
          </td>
        </tr>
      </table>
    </div>
  </div>

</div>
<?= $this->endSection(); ?>