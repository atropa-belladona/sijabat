<div class="sp-footer">

  <div class="row mt-4">
    <div class="col text-sm">
      Demikian pernyataan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
    </div>
  </div>

  <div class="row mt-4">
    <div class="col">
      <table class="text-sm">
        <tr>
          <td style="width: 400px;">&nbsp;</td>
          <td>Jakarta, <?= date_str($sp->tanggal_surat ?? ''); ?></td>
        </tr>
        <tr>
          <td></td>
          <td><?= $sp->jabstruk; ?></td>
        </tr>
        <tr>
          <td></td>
          <td><?= $dupak->unit_kerja; ?></td>
        </tr>
        <tr>
          <td style="height: 50px;">&nbsp;</td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td><?= $sp->penandatangan_nama; ?></td>
        </tr>
        <tr>
          <td></td>
          <td>NIP. <?= $sp->penandatangan_nip; ?></td>
        </tr>
      </table>
    </div>
  </div>

</div>