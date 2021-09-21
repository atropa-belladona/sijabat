<div class="kategori-block">
  <h6 class="font-weight-bold text-primary">
    <a href="#">Pelaksanaan Pengabdian Kepada Masyarakat</a>
  </h6>
</div>
<div class="card card-primary card-outline card-outline-tabs elevation-0">
  <div class="card-header p-0 border-bottom-0">
    <ul class="nav nav-tabs" id="pelaksanaan-pengabdian-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="pengabdian-tab" data-toggle="pill" href="#pengabdian" role="tab" aria-controls="pengabdian" aria-selected="false">Pengabdian</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pengelola-jurnal-tab" data-toggle="pill" href="#pengelola-jurnal" role="tab" aria-controls="pengelola-jurnal" aria-selected="false">Pengelola Jurnal</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pembicara-tab" data-toggle="pill" href="#pembicara" role="tab" aria-controls="pembicara" aria-selected="false">Pembicara</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="jabstruk-tab" data-toggle="pill" href="#jabstruk" role="tab" aria-controls="jabstruk" aria-selected="false">Jabatan Struktural</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content" id="pelaksanaan-pengabdian-tabContent">
      <!-- tab pengabdian -->
      <div class="tab-pane fade active show" id="pengabdian" role="tabpanel" aria-labelledby="pengabdian-tab">
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
            <?php foreach ($pengabdian as $item) : ?>
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
      <!-- /. tab pengabdian -->


      <!-- tab pengelola-jurnal -->
      <div class="tab-pane fade" id="pengelola-jurnal" role="tabpanel" aria-labelledby="pengelola-jurnal-tab">
        <table class="table table-sm datatable" style="width: 100%;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Jurnal</th>
              <th>No. SK Penugasan</th>
              <th>Terhitung Mulai Tanggal</th>
              <th>Tanggal Selesai</th>
              <th>Status Aktif</th>
              <th>Peran</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($pengelola_jurnal as $item) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $item->kategori_kegiatan; ?></td>
                <td><?= $item->sk_penugasan; ?></td>
                <td><?= $item->tanggal_mulai; ?></td>
                <td><?= $item->tanggal_selesai; ?></td>
                <td><?= $item->aktif; ?></td>
                <td><?= $item->peran; ?></td>
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
      <!-- /. tab pengelola-jurnal -->

      <!-- tab pembicara -->
      <div class="tab-pane fade" id="pembicara" role="tabpanel" aria-labelledby="pembicara-tab">
        <table class="table table-sm datatable" style="width: 100%;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Judul Makalah</th>
              <th>Nama Temu Ilmiah</th>
              <th>Penyelenggara</th>
              <th>Tanggal Pelaksanaan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($pembicara as $item) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $item->judul_makalah; ?></td>
                <td><?= $item->nama_pertemuan; ?></td>
                <td><?= $item->penyelenggara; ?></td>
                <td><?= $item->tanggal_pelaksanaan; ?></td>
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
      <!-- /. tab pembicara -->

      <!-- tab jabstruk -->
      <div class="tab-pane fade" id="jabstruk" role="tabpanel" aria-labelledby="jabstruk-tab">
        <table class="table table-sm datatable" style="width: 100%;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Jabatan Struktural</th>
              <th>Nomor SK</th>
              <th>Terhitung Mulai Tanggal</th>
              <th>Terhitung Tanggal Selesai</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($jabstruk as $item) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $item->jabatan; ?></td>
                <td><?= $item->sk_jabatan; ?></td>
                <td><?= $item->tanggal_mulai_jabatan; ?></td>
                <td><?= $item->tanggal_selesai_jabatan; ?></td>
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
      <!-- /. tab jabstruk -->
    </div>
  </div>
  <!-- /.card -->
</div>