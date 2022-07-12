<div class="table-responsive pl-4">
  <table id="table-keterangan-perorangan" class="table table-sm table-borderless text-sm">
    <tbody>
      <tr>
        <td style="width: 1em;"></td>
        <td style="width: 250px;"></td>
        <td style="width: 150px;"></td>
        <td style="width: 5px;"></td>
        <td></td>
      </tr>
      <tr>
        <td class="align-middle">1.</td>
        <td class="align-middle" colspan="2">Nama</td>
        <td class="align-middle">:</td>
        <td class="align-middle">
          <?php if (isset($dupak->nama_sdm)) : ?>
            <?= $dupak->nama_sdm; ?>
          <?php endif ?>
        </td>
      </tr>
      <tr>
        <td class="align-middle">2.</td>
        <td class="align-middle" colspan="2">NIP / NIDN</td>
        <td class="align-middle">:</td>
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
        <td class="align-middle">3.</td>
        <td class="align-middle" colspan="2">Nomor Seri KARPEG</td>
        <td class="align-middle">:</td>
        <td class="align-middle">
          <?php if (isset($dupak->no_karpeg)) : ?>
            <?= $dupak->no_karpeg; ?>
          <?php endif ?>
        </td>
      </tr>
      <tr>
        <td class="align-middle">4.</td>
        <td class="align-middle" colspan="2">Pangkat / Gol. Ruang / TMT</td>
        <td class="align-middle">:</td>
        <td class="align-middle">
          <?php if (isset($kepangkatan->pangkat)) : ?>
            <?= $kepangkatan->pangkat; ?>
          <?php endif ?>

          <?php if (isset($kepangkatan->golongan)) : ?>
            <?= ' / ' . $kepangkatan->golongan; ?>
          <?php endif ?>

          <?php if (isset($dupak->tmt_gol_lama)) : ?>
            <?= ' / ' . date_str($dupak->tmt_gol_lama); ?>
          <?php endif ?>
        </td>
      </tr>
      <tr>
        <td class="align-middle">5.</td>
        <td class="align-middle" colspan="2">Tempat dan Tanggal Lahir</td>
        <td class="align-middle">:</td>
        <td class="align-middle">
          <?php if (isset($dupak->tempat_lahir)) : ?>
            <?= $dupak->tempat_lahir; ?>
          <?php endif ?>

          <?php if (isset($dupak->tanggal_lahir)) : ?>
            <?= ', ' . date_str($dupak->tanggal_lahir); ?>
          <?php endif ?>
        </td>
      </tr>
      <tr>
        <td class="align-middle">6.</td>
        <td class="align-middle" colspan="2">Jenis Kelamin</td>
        <td class="align-middle">:</td>
        <td class="align-middle">
          <?php if (isset($dupak->jenis_kelamin)) : ?>
            <?= ($dupak->jenis_kelamin == 'L') ? 'Laki-laki' : 'Perempuan' ?>
          <?php endif ?>
        </td>
      </tr>
      <tr>
        <td class="align-middle">7.</td>
        <td class="align-middle" colspan="2">Pendidikan Terakhir</td>
        <td class="align-middle">:</td>
        <td class="align-middle">
          <?= $dupak->pendidikan_terakhir ?? ''; ?>
        </td>
      </tr>
      <tr>
        <td class="align-middle">8.</td>
        <td class="align-middle" colspan="2">Jabatan Fungsional / TMT</td>
        <td class="align-middle">:</td>
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
        <td class="align-middle" rowspan="2">9.</td>
        <td class="align-middle" rowspan="2">Masa Kerja Golongan</td>
        <td class="align-middle">a. Lama</td>
        <td class="align-middle">:</td>
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
        <td class="align-middle">:</td>
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
        <td class="align-middle">10.</td>
        <td class="align-middle" colspan="2">Unit Kerja</td>
        <td class="align-middle">:</td>
        <td class="align-middle">
          <?= $dupak->unit_kerja ?? ''; ?>
        </td>
      </tr>
    </tbody>
  </table>
</div>