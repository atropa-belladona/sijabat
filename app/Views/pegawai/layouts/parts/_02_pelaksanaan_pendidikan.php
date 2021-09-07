<div class="kategori-block">
  <h6 class="font-weight-bold text-primary">
    <a href="#">Pelaksanaan Pendidikan</a>
  </h6>
</div>

<div class="card card-primary card-outline card-outline-tabs elevation-0">
  <div class="card-header p-0 border-bottom-0">
    <ul class="nav nav-tabs" id="pelaksanaan-pendidikan-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="pengajaran-tab" data-toggle="pill" href="#pengajaran" role="tab" aria-controls="pengajaran" aria-selected="false">Pengajaran</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="visiting-tab" data-toggle="pill" href="#visiting" role="tab" aria-controls="visiting" aria-selected="false">Visiting Scientist</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="bahan-ajar-tab" data-toggle="pill" href="#bahan-ajar" role="tab" aria-controls="bahan-ajar" aria-selected="false">Bahan Ajar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="detasering-tab" data-toggle="pill" href="#detasering" role="tab" aria-controls="detasering" aria-selected="false">Detasering</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="orasi-tab" data-toggle="pill" href="#orasi" role="tab" aria-controls="orasi" aria-selected="false">Orasi Ilmiah</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pembimbing-tab" data-toggle="pill" href="#pembimbing" role="tab" aria-controls="pembimbing" aria-selected="false">Pembimbing dosen</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="tugas-tambahan-tab" data-toggle="pill" href="#tugas-tambahan" role="tab" aria-controls="tugas-tambahan" aria-selected="false">Tugas Tambahan</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content" id="pelaksanaan-pendidikan-tabContent">
      <!-- tab pengajaran -->
      <div class="tab-pane fade active show" id="pengajaran" role="tabpanel" aria-labelledby="pengajaran-tab">
        <table class="table table-sm datatable" style="width: 100%;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Mata Kuliah</th>
              <th>Bidang Keilmuan</th>
              <th>SKS</th>
              <th>Kelas</th>
              <th>Semester</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($pengajaran as $ajar) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $ajar->mata_kuliah; ?></td>
                <td></td>
                <td><?= $ajar->sks; ?></td>
                <td><?= $ajar->kelas; ?></td>
                <td><?= $ajar->semester; ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <!-- /. tab pengajaran -->

      <!-- tab visiting scientist -->
      <div class="tab-pane fade" id="visiting" role="tabpanel" aria-labelledby="visiting-tab">
        <table class="table table-sm datatable" style="width: 100%;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Perguruan Tinggi Pengundang</th>
              <th>Lama Kegiatan</th>
              <th>Tanggal Pelaksanaan</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($visiting_scientist as $item) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $item->perguruan_tinggi; ?></td>
                <td><?= $item->lama_kegiatan; ?></td>
                <td><?= $item->tanggal; ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <!-- /. tab visiting scientist -->

      <!-- tab bahan-ajar -->
      <div class="tab-pane fade" id="bahan-ajar" role="tabpanel" aria-labelledby="bahan-ajar-tab">
        <table class="table table-sm datatable" style="width: 100%;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Judul Bahan Ajar</th>
              <th>ISBN</th>
              <th>Tanggal Terbit</th>
              <th>Penerbit</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($bahan_ajar as $item) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $item->judul; ?></td>
                <td><?= $item->isbn; ?></td>
                <td><?= $item->tanggal_terbit; ?></td>
                <td><?= $item->nama_penerbit; ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <!-- /. tab bahan-ajar -->

      <!-- tab detasering -->
      <div class="tab-pane fade" id="detasering" role="tabpanel" aria-labelledby="detasering-tab">
        <table class="table table-sm datatable" style="width: 100%;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Perguruan Tinggi Sasaran</th>
              <th>Kategori Kegiatan</th>
              <th>No. SK Penugasan</th>
              <th>Tanggal SK Penugasan</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($detasering as $item) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $item->perguruan_tinggi; ?></td>
                <td><?= $item->kategori_kegiatan; ?></td>
                <td><?= $item->sk_penugasan; ?></td>
                <td><?= $item->tanggal_sk_penugasan; ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <!-- /. tab detasering -->

      <!-- tab orasi -->
      <div class="tab-pane fade" id="orasi" role="tabpanel" aria-labelledby="orasi-tab">
        <table class="table table-sm datatable" style="width: 100%;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Kategori Kegiatan</th>
              <th>Judul Makalah</th>
              <th>Nama Temu Ilmiah</th>
              <th>Penyelenggara</th>
              <th>Tanggal Pelaksanaan</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($orasi_ilmiah as $item) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td></td>
                <td><?= $item->judul_makalah; ?></td>
                <td><?= $item->nama_pertemuan; ?></td>
                <td><?= $item->penyelenggara; ?></td>
                <td><?= $item->tanggal_pelaksanaan; ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <!-- /. tab orasi -->

      <!-- tab pembimbing -->
      <div class="tab-pane fade" id="pembimbing" role="tabpanel" aria-labelledby="pembimbing-tab">
        <table class="table table-sm datatable" style="width: 100%;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Pembimbing</th>
              <th>Nama Bimbingan</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Selesai</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($pembimbing_dosen as $item) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $item->nama_pembimbing; ?></td>
                <td><?= $item->nama_bimbingan; ?></td>
                <td><?= $item->tanggal_mulai; ?></td>
                <td><?= $item->tanggal_selesai; ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <!-- /. tab pembimbing -->

      <!-- tab tugas-tambahan -->
      <div class="tab-pane fade" id="tugas-tambahan" role="tabpanel" aria-labelledby="tugas-tambahan-tab">
        <table class="table table-sm datatable" style="width: 100%;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Tugas Tambahan</th>
              <th>Unit Kerja</th>
              <th>Instansi</th>
              <th>Tangaal Mulai</th>
              <th>Tangaal Berakhir</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($tugas_tambahan as $item) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $item->jenis_tugas; ?></td>
                <td><?= $item->unit_kerja; ?></td>
                <td><?= $item->perguruan_tinggi; ?></td>
                <td><?= $item->tanggal_mulai_tugas; ?></td>
                <td><?= $item->tanggal_selesai_tugas; ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <!-- /. tab tugas-tambahan -->

    </div>
  </div>
  <!-- /.card -->
</div>