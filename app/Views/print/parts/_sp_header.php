<div class="row mt-4">
  <div class="col">
    <table class="text-sm">
      <tr>
        <td colspan="4">Yang bertanda tangan di bawah ini :</td>
      </tr>
      <tr>
        <td style="width: 20px;">&nbsp;</td>
        <td style="width: 220px">Nama</td>
        <td style="width: 4px;">:</td>
        <td><?= $sp->penandatangan_nama ?? ''; ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>NIP</td>
        <td>:</td>
        <td><?= $sp->penandatangan_nip ?? ''; ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Pangkat / Golongan ruang / TMT</td>
        <td>:</td>
        <td>
          <?= $pangkat_penandatangan->pangkat ?? ''; ?> / <?= $pangkat_penandatangan->golongan ?? ''; ?> / <?= date_str($sp->penandatangan_tmt_golongan ?? ''); ?>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Jabatan</td>
        <td>:</td>
        <td><?= $sp->jabfung ?? ''; ?> / <?= $sp->jabstruk ?? ''; ?> <?= $dupak->unit_kerja; ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Unit Kerja</td>
        <td>:</td>
        <td><?= $dupak->fakultas ?? ''; ?> Universitas Negeri Jakarta</td>
      </tr>
    </table>
  </div>
</div>

<div class="row mt-4">
  <div class="col">
    <table class="text-sm">
      <tr>
        <td colspan="4">Menyatakan bahwa :</td>
      </tr>
      <tr>
        <td style="width: 20px;">&nbsp;</td>
        <td style="width: 220px">Nama</td>
        <td style="width: 4px;">:</td>
        <td><?= $dupak->nama_sdm ?? ''; ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>NIP</td>
        <td>:</td>
        <td><?= $dupak->nip ?? ''; ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Pangkat / Golongan ruang / TMT</td>
        <td>:</td>
        <td>
          <?= $pangkat_pengaju->pangkat ?? ''; ?> / <?= $pangkat_pengaju->golongan ?? ''; ?> / <?= date_str($dupak->tmt_gol_lama ?? ''); ?>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Jabatan</td>
        <td>:</td>
        <td><?= $dupak->jabfung ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Unit Kerja</td>
        <td>:</td>
        <td><?= $dupak->unit_kerja ?? ''; ?> <?= $dupak->fakultas ?? ''; ?> Universitas Negeri Jakarta</td>
      </tr>
    </table>
  </div>
</div>