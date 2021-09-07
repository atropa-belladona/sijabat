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
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($anggota_profesi as $profesi) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $profesi->nama_organisasi; ?></td>
                <td><?= $profesi->peran; ?></td>
                <td><?= $profesi->tanggal_mulai_keanggotaan; ?></td>
                <td><?= $profesi->tanggal_selesai_keanggotaan; ?></td>
                <td><?= $profesi->instansi_profesi; ?></td>
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
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($penghargaan as $penghargaan) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $penghargaan->nama; ?></td>
                <td><?= $penghargaan->jenis_penghargaan; ?></td>
                <td><?= $penghargaan->instansi_pemberi; ?></td>
                <td><?= $penghargaan->tahun; ?></td>
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
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($penunjang_lain as $penunjang) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $penunjang->nama; ?></td>
                <td><?= $penunjang->instansi; ?></td>
                <td><?= $penunjang->sk_penugasan; ?></td>
                <td><?= $penunjang->tanggal_mulai; ?></td>
                <td><?= $penunjang->tanggal_selesai; ?></td>
                <td><?= $penunjang->peran; ?></td>
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