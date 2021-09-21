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
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($pengabdian as $abdi) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $abdi->judul; ?></td>
                <td>
                  <ul>
                    <?php foreach (explode('|', $abdi->bidang_keilmuan) as $bidang) : ?>
                      <?php if ($bidang) : ?>
                        <li><?= $bidang; ?></li>
                      <?php endif ?>
                    <?php endforeach ?>
                  </ul>
                </td>
                <td><?= $abdi->tahun_pelaksanaan; ?></td>
                <td><?= $abdi->lama_kegiatan; ?></td>
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
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($pengelola_jurnal as $jurnal) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $jurnal->kategori_kegiatan; ?></td>
                <td><?= $jurnal->sk_penugasan; ?></td>
                <td><?= $jurnal->tanggal_mulai; ?></td>
                <td><?= $jurnal->tanggal_selesai; ?></td>
                <td><?= $jurnal->aktif; ?></td>
                <td><?= $jurnal->peran; ?></td>
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
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($pembicara as $bicara) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $bicara->judul_makalah; ?></td>
                <td><?= $bicara->nama_pertemuan; ?></td>
                <td><?= $bicara->penyelenggara; ?></td>
                <td><?= $bicara->tanggal_pelaksanaan; ?></td>
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
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($jabstruk as $struk) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $struk->jabatan; ?></td>
                <td><?= $struk->sk_jabatan; ?></td>
                <td><?= $struk->tanggal_mulai_jabatan; ?></td>
                <td><?= $struk->tanggal_selesai_jabatan; ?></td>
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