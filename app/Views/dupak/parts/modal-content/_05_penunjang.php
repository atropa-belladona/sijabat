<div class="kategori-block">
  <h6 class="font-weight-bold text-primary">
    <a href="#">Penunjang Kegiatan Akademik Dosen</a>
  </h6>
</div>
<div class="card card-primary card-outline card-outline-tabs elevation-0">
  <div class="card-header p-0 border-bottom-0">
    <ul class="nav nav-tabs" id="pelaksanaan-pengabdian-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="profesi-tab" data-toggle="pill" href="#profesi" role="tab" aria-controls="profesi" aria-selected="false">Anggota Profesi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="penghargaan-tab" data-toggle="pill" href="#penghargaan" role="tab" aria-controls="penghargaan" aria-selected="false">Penghargaan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="penunjang-lain-tab" data-toggle="pill" href="#penunjang-lain" role="tab" aria-controls="penunjang-lain" aria-selected="false">Penunjang lain</a>
      </li>

    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content" id="pelaksanaan-profesi-tabContent">
      <!-- tab profesi -->
      <div class="tab-pane fade active show" id="profesi" role="tabpanel" aria-labelledby="profesi-tab">
        <table class="table table-sm datatable" style="width: 100%;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Organisasi</th>
              <th>Peran/Kedudukan</th>
              <th>Mulai Keanggotaan</th>
              <th>Selesai Keanggotaan</th>
              <th>Instansi Profesi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($anggota_profesi as $item) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $item->nama_organisasi; ?></td>
                <td><?= $item->peran; ?></td>
                <td><?= $item->tanggal_mulai_keanggotaan; ?></td>
                <td><?= $item->tanggal_selesai_keanggotaan; ?></td>
                <td><?= $item->instansi_profesi; ?></td>
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
      <!-- /. tab profesi -->

      <!-- tab penghargaan -->
      <div class="tab-pane fade" id="penghargaan" role="tabpanel" aria-labelledby="penghargaan-tab">
        <table class="table table-sm datatable" style="width: 100%;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Penghargaan</th>
              <th>Jenis Penghargaan</th>
              <th>Instansi</th>
              <th>Tahun</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($penghargaan as $item) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $item->nama; ?></td>
                <td><?= $item->jenis_penghargaan; ?></td>
                <td><?= $item->instansi_pemberi; ?></td>
                <td><?= $item->tahun; ?></td>
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
      <!-- /. tab penghargaan -->

      <!-- tab penunjang-lain -->
      <div class="tab-pane fade" id="penunjang-lain" role="tabpanel" aria-labelledby="penunjang-lain-tab">
        <table class="table table-sm datatable" style="width: 100%;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Kegiatan</th>
              <th>Instansi Penyelenggara</th>
              <th>Nomor SK Penugasan</th>
              <th>Terhitung Mulai Tanggal</th>
              <th>Tanggal Selesai</th>
              <th>Peran</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($penunjang_lain as $item) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $item->nama; ?></td>
                <td><?= $item->instansi; ?></td>
                <td><?= $item->sk_penugasan; ?></td>
                <td><?= $item->tanggal_mulai; ?></td>
                <td><?= $item->tanggal_selesai; ?></td>
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
      <!-- /. tab penunjang lain -->

    </div>
  </div>
  <!-- /.card -->
</div>