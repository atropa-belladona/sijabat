<div class="kategori-block">
  <h6 class="font-weight-bold text-primary">
    <a href="#">Pelaksanaan Penelitian</a>
  </h6>
</div>
<div class="card card-primary card-outline card-outline-tabs elevation-0">
  <div class="card-header p-0 border-bottom-0">
    <ul class="nav nav-tabs" id="pelaksanaan-penelitian-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="penelitian-tab" data-toggle="pill" href="#penelitian" role="tab" aria-controls="penelitian" aria-selected="false">Penelitian</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="publikasi-tab" data-toggle="pill" href="#publikasi" role="tab" aria-controls="publikasi" aria-selected="false">Publikasi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="haki-tab" data-toggle="pill" href="#haki" role="tab" aria-controls="haki" aria-selected="false">HKI/Paten</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content" id="pelaksanaan-penelitian-tabContent">
      <!-- tab penelitian -->
      <div class="tab-pane fade active show" id="penelitian" role="tabpanel" aria-labelledby="penelitian-tab">
        <table class="table table-sm datatable" style="width: 100%;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Judul</th>
              <th>Bidang Keilmuan</th>
              <th>Tahun Pelaksanaan</th>
              <th>Lama Kegiatan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($penelitian as $item) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $item->judul; ?></td>
                <td>
                  <ul>
                    <?php foreach (explode('|', $item->bidang_keilmuan) as $bidang) : ?>
                      <?php if ($bidang) : ?>
                        <li><?= $bidang; ?></li>
                      <?php endif ?>
                    <?php endforeach ?>
                  </ul>
                </td>
                <td><?= $item->tahun_pelaksanaan; ?></td>
                <td><?= $item->lama_kegiatan; ?></td>
                <td class="text-center">
                  <form action="<?= route_to('dupak_addak', $dupak->id, $item->id); ?>" method="GET">
                    <input type="hidden" name="id" value="<?= $id_kegiatan; ?>">
                    <input type="hidden" name="map" value="<?= $item->detail_id; ?>">
                    <button type="submit" class="btn btn-sm btn-default"><i class="fas fa-fw fa-check"></i> </button>
                  </form>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <!-- /. tab penelitian -->

      <!-- tab publikasi -->
      <div class="tab-pane fade" id="publikasi" role="tabpanel" aria-labelledby="publikasi-tab">
        <table class="table table-sm datatable" style="width: 100%;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Judul</th>
              <th>Kategori Kegiatan</th>
              <th>Jenis Publikasi</th>
              <th>Quartile</th>
              <th>Tanggal Terbit</th>
              <th>Asal Data</th>
              <th>Bidang Keilmuan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($publikasi as $item) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $item->judul; ?></td>
                <td><?= $item->kategori_kegiatan; ?></td>
                <td><?= $item->jenis_publikasi; ?></td>
                <td><?= $item->quartile; ?></td>
                <td style="white-space: nowrap;"><?= $item->tanggal; ?></td>
                <td><?= $item->asal_data; ?></td>
                <td>
                  <ul>
                    <?php foreach (explode('|', $item->bidang_keilmuan) as $bidang) : ?>
                      <?php if ($bidang) : ?>
                        <li><?= $bidang; ?></li>
                      <?php endif ?>
                    <?php endforeach ?>
                  </ul>
                </td>
                <td class="text-center">
                  <form action="<?= route_to('dupak_addak', $dupak->id, $item->id); ?>" method="GET">
                    <input type="hidden" name="id" value="<?= $id_kegiatan; ?>">
                    <input type="hidden" name="map" value="<?= $item->detail_id; ?>">
                    <button type="submit" class="btn btn-sm btn-default"><i class="fas fa-fw fa-check"></i> </button>
                  </form>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <!-- /. tab publikasi -->

      <!-- tab publikasi -->
      <div class="tab-pane fade" id="haki" role="tabpanel" aria-labelledby="haki-tab">
        <table class="table table-sm datatable" style="width: 100%;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Judul</th>
              <th>Kategori Kegiatan</th>
              <th>Jenis</th>
              <th>Quartile</th>
              <th>Tanggal Terbit</th>
              <th>Bidang Keilmuan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($haki as $item) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $item->judul; ?></td>
                <td><?= $item->kategori_kegiatan; ?></td>
                <td><?= $item->jenis_publikasi; ?></td>
                <td><?= $item->quartile; ?></td>
                <td style="white-space: nowrap;"><?= $item->tanggal; ?></td>
                <td>
                  <ul>
                    <?php foreach (explode('|', $item->bidang_keilmuan) as $bidang) : ?>
                      <?php if ($bidang) : ?>
                        <li><?= $bidang; ?></li>
                      <?php endif ?>
                    <?php endforeach ?>
                  </ul>
                </td>
                <td class="text-center">
                  <form action="<?= route_to('dupak_addak', $dupak->id, $item->id); ?>" method="GET">
                    <input type="hidden" name="id" value="<?= $id_kegiatan; ?>">
                    <input type="hidden" name="map" value="<?= $item->detail_id; ?>">
                    <button type="submit" class="btn btn-sm btn-default"><i class="fas fa-fw fa-check"></i> </button>
                  </form>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <!-- /. tab publikasi -->
    </div>
  </div>
  <!-- /.card -->
</div>