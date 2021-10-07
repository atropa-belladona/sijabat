<div class="card card-primary card-outline card-outline-tabs mb-0">
  <div class="card-header p-0 border-bottom-0">
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="evaluasi-catatan-tab" data-toggle="pill" href="#evaluasi-catatan" role="tab" aria-controls="evaluasi-catatan" aria-selected="true">Informasi Kegiatan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="evaluasi-verifikasi-tab" data-toggle="pill" href="#evaluasi-verifikasi-log" role="tab" aria-controls="evaluasi-verifikasi-log" aria-selected="false">Sejarah Catatan Verifikasi Unit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="evaluasi-penilaian-tab" data-toggle="pill" href="#evaluasi-penilaian-log" role="tab" aria-controls="evaluasi-penilaian-log" aria-selected="false">Sejarah Catatan Tim Penilai PAK</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content" id="custom-tabs-four-tabContent">
      <div class="tab-pane fade show active" id="evaluasi-catatan" role="tabpanel" aria-labelledby="evaluasi-catatan-tab">
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
      </div>

      <div class="tab-pane fade" id="evaluasi-verifikasi-log" role="tabpanel" aria-labelledby="evaluasi-verifikasi-log-tab">
        <table class="table table-sm table-hover table-striped">
          <tbody>
            <?php if (count($evaluasi_verifikasi) > 0) : ?>
              <?php foreach ($evaluasi_verifikasi as $verifikasi) : ?>
                <tr>
                  <td>
                    <div class="d-flex justify-content-between">
                      <div>
                        <b>Oleh : &nbsp;</b>
                        <i class="fas fa-fw fa-user mr-1"></i><span class="font-weight-bold mr-2"><?= $verifikasi->name; ?></span>
                      </div>
                      <div>
                        <i class="fas fa-fw fa-calendar mr-1"></i> <span class="text-muted"><?= $verifikasi->created_at; ?></span>
                      </div>
                    </div>
                    <div class="font-italic">
                      <div>
                        <b>Kesesuaian : </b> <?= $verifikasi->sesuai == '1' ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>'; ?>
                      </div>
                      <?php if ($verifikasi->catatan) : ?>
                        <b>Catatan : </b>
                        <div class="font-italic mb-2">
                          <?= $verifikasi->catatan; ?>
                        </div>
                      <?php endif ?>
                    </div>
                  </td>
                </tr>
              <?php endforeach ?>
            <?php else : ?>
              <tr>
                <td class="text-center">-- Belum ada catatan --</td>
              </tr>
            <?php endif ?>
          </tbody>
        </table>
      </div>

      <div class="tab-pane fade" id="evaluasi-penilaian-log" role="tabpanel" aria-labelledby="evaluasi-penilaian-log-tab">
        <table class="table table-sm table-hover table-striped">
          <tbody>
            <?php if (count($evaluasi_penilaian) > 0) : ?>
              <?php foreach ($evaluasi_penilaian as $penilaian) : ?>
                <tr>
                  <td>
                    <div class="d-flex justify-content-between mb-2">
                      <div>
                        <b>Oleh : &nbsp;</b>
                        <i class="fas fa-fw fa-user mr-1"></i><span class="font-weight-bold mr-2"><?= $penilaian->name; ?></span>
                      </div>
                      <div>
                        <i class="fas fa-fw fa-calendar mr-1"></i> <span class="text-muted"><?= $penilaian->created_at; ?></span>
                      </div>
                    </div>
                    <div class="font-italic mb-2">
                      <div>
                        <b>Kesesuaian : </b> <?= $penilaian->sesuai == '1' ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>'; ?>
                      </div>
                      <?php if ($penilaian->catatan) : ?>
                        <b>Catatan : </b>
                        <div class="font-italic">
                          <?= $penilaian->catatan; ?>
                        </div>
                      <?php endif ?>
                    </div>
                  </td>
                </tr>
              <?php endforeach ?>
            <?php else : ?>
              <tr>
                <td class="text-center">-- Belum ada catatan --</td>
              </tr>
            <?php endif ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
  <!-- /.card -->
</div>