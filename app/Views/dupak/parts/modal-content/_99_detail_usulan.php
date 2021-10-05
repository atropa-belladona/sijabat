<div class="detail-kegiatan mb-4">
  <?= $this->include('dupak/parts/detail-kegiatan/' . $sister_map->page); ?>
</div>

<div class="detail-kredit">
  <div class="detail-info">
    <h6 class="font-weight-bold text-muted">Detail Angka Kredit</h6>
    <div class="row">
      <div class="col">
        <table>
          <tbody>
            <tr>
              <td class="pl-4 align-top">Kategori Kegiatan </td>
              <td class="pl-4 align-top">:</td>
              <td class="pl-4 align-top">Bidang <?= $detail_usulan->kategori_kegiatan; ?></td>
            </tr>

            <tr>
              <td class="pl-4 align-top">Volume</td>
              <td class="pl-4 align-top">:</td>
              <td class="pl-4 align-top"><?= number_format2($detail_usulan->volume) . ' ' . $detail_usulan->satuan_hasil . ' <span class="font-italic">( @ ' . $detail_usulan->ak_nilai . ' )'; ?></td>
            </tr>
            <tr>
              <td class="pl-4 align-top">Nilai Usulan Angka Kredit</td>
              <td class="pl-4 align-top">:</td>
              <td class="pl-4 align-top"><?= number_format2($detail_usulan->ak_usulan); ?></td>
            </tr>

          </tbody>
        </table>
      </div>

    </div>

  </div>
</div>