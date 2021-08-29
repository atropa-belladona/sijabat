<div class="container-fluid">
  <div class="row">
    <div class="col-md-3 fixedElement">

      <!-- Profile Image -->
      <div class="card card-primary card-outline ">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-kategori-img img-fluid" src="<?= (isset($foto)) ? $foto : ''; ?>" alt="<?= $pegawai->nama_sdm; ?>" style="width: auto !important;">
          </div>

          <h3 class="profile-username text-center"><?= ucwords(strtolower($pegawai->nama_sdm)); ?></h3>

          <p class="text-muted text-center"><?= $pegawai->jenis_sdm; ?></p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>NIDN/NITK</b> <a class="float-right"><?= $pegawai->nidn; ?></a>
            </li>
            <li class="list-group-item">
              <b>NIP</b> <a class="float-right"><?= $pegawai->nip; ?></a>
            </li>
            <li class="list-group-item">
              <b>Fakultas</b> <a class="float-right"></a>
            </li>
            <li class="list-group-item">
              <b>Prodi</b> <a class="float-right">
                <?php if (isset($penugasan)) : ?>
                  <?= $penugasan->jenjang_pendidikan . ' ' . $penugasan->unit_kerja; ?>
                <?php endif ?>
              </a>
            </li>
            <li class="list-group-item">
              <b>Status Kepegawaian</b> <a class="float-right"><?= $pegawai->status_pegawai; ?></a>
            </li>
          </ul>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <!-- About Me Box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Tentang Saya</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <?php if (isset($about_me)) : ?>
            <strong><i class="fas fa-map-marker-alt mr-1"></i> Kelahiran</strong>
            <p class="text-muted pl-3"><?= $about_me->tempat_lahir; ?>, <?= $about_me->tanggal_lahir; ?></p>
            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat & Kontak</strong>
            <p class="text-muted pl-3">
              <span><?= $about_me->alamat ?></span>
            </p>
            <p class="text-muted pl-3">
              <span>Telepon : <?= $about_me->telepon_hp; ?></span><br>
              <span>Email : <?= $about_me->email; ?></span>
            </p>
          <?php else : ?>
            <p class="text-center">-- Tidak ada data --</p>
          <?php endif ?>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->

    <!-- right side -->
    <div class="col-md-9">
      <div class="card">
        <div class="card-header p-2">
          <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#kegiatan" data-toggle="tab"><i class="fas fa-fw fa-list-alt"></i> Kegiatan</a></li>
            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab"><i class="fas fa-fw fa-history"></i> Timeline</a></li>
            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"><i class="fas fa-fw fa-tools"></i> Settings</a></li>
            <li class="nav-item ml-auto"><a class="nav-link font-weight-bold" href="#imports" data-toggle="tab"><i class="fas fa-fw fa-download"></i> Import Data</a></li>
          </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="kegiatan">

              <!-- Pendidikan -->
              <div class="kategori-kegiatan">
                <div class="kategori-block">
                  <h6 class="font-weight-bold text-primary">
                    <a href="#">Pendidikan</a>
                  </h6>
                </div>
                <div>
                  <ul>
                    <?php foreach (array_reverse($pendidikan) as $pendidikan) : ?>
                      <li><?= $pendidikan->jenjang_pendidikan . ', ' . $pendidikan->bidang_studi . ' di ' . $pendidikan->nama_perguruan_tinggi . ' : ' . $pendidikan->tahun_lulus; ?></li>
                    <?php endforeach ?>
                  </ul>
                </div>
              </div>
              <!-- /. Pendidikan -->


              <!-- Pelaksanaan Pendidikan -->
              <hr class="bt-5">
              <div class="kategori-kegiatan">
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

              </div>
              <!-- /. Pelaksanaan Pendidikan -->

              <!-- Pelaksanaan Penelitian -->
              <hr class="bt-5">
              <div class="kategori-kegiatan">
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
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i = 1 ?>
                            <?php foreach ($penelitian as $teliti) : ?>
                              <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $teliti->judul; ?></td>
                                <td>
                                  <ul>
                                    <?php foreach (explode('|', $teliti->bidang_keilmuan) as $bidang) : ?>
                                      <li><?= $bidang; ?></li>
                                    <?php endforeach ?>
                                  </ul>
                                </td>
                                <td><?= $teliti->tahun_pelaksanaan; ?></td>
                                <td><?= $teliti->lama_kegiatan; ?></td>
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
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i = 1 ?>
                            <?php foreach ($publikasi as $publikasi) : ?>
                              <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $publikasi->judul; ?></td>
                                <td><?= $publikasi->kategori_kegiatan; ?></td>
                                <td><?= $publikasi->jenis_publikasi; ?></td>
                                <td><?= $publikasi->quartile; ?></td>
                                <td style="white-space: nowrap;"><?= $publikasi->tanggal; ?></td>
                                <td><?= $publikasi->asal_data; ?></td>
                                <td>
                                  <ul>
                                    <?php foreach (explode('|', $publikasi->bidang_keilmuan) as $bidang) : ?>
                                      <li><?= $bidang; ?></li>
                                    <?php endforeach ?>
                                  </ul>
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
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i = 1 ?>
                            <?php foreach ($haki as $haki) : ?>
                              <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $haki->judul; ?></td>
                                <td><?= $haki->kategori_kegiatan; ?></td>
                                <td><?= $haki->jenis_publikasi; ?></td>
                                <td><?= $haki->quartile; ?></td>
                                <td style="white-space: nowrap;"><?= $haki->tanggal; ?></td>
                                <td>
                                  <ul>
                                    <?php foreach (explode('|', $haki->bidang_keilmuan) as $bidang) : ?>
                                      <li><?= $bidang; ?></li>
                                    <?php endforeach ?>
                                  </ul>
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
              </div>
              <!-- /. Pelaksanaan Penelitian -->

              <!-- Pelaksanaan Pengabdian Kepada Masyarakat -->
              <hr class="bt-5">
              <div class="kategori-kegiatan">
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
                                      <li><?= $bidang; ?></li>
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
              </div>
              <!-- /. Pelaksanaan Pengabdian Kepada Masyarakat -->

              <!-- Penunjang Kegiatan Akademik Dosen -->
              <hr class="bt-5">
              <div class="kategori-kegiatan">
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
              </div>
              <!-- /. Penunjang Kegiatan Akademik Dosen -->

            </div>

            <!-- /.tab-pane -->
            <div class="tab-pane" id="timeline">
              <!-- The timeline -->
              <div class="timeline timeline-inverse">
                <!-- timeline time label -->
                <div class="time-label">
                  <span class="bg-danger">
                    10 Feb. 2014
                  </span>
                </div>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <div>
                  <i class="fas fa-envelope bg-primary"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="far fa-clock"></i> 12:05</span>

                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                    <div class="timeline-body">
                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                      weebly ning heekya handango imeem plugg dopplr jibjab, movity
                      jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                      quora plaxo ideeli hulu weebly balihoo...
                    </div>
                    <div class="timeline-footer">
                      <a href="#" class="btn btn-primary btn-sm">Read more</a>
                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                  </div>
                </div>
                <!-- END timeline item -->
                <!-- timeline item -->
                <div>
                  <i class="fas fa-kategori bg-info"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                    <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                    </h3>
                  </div>
                </div>
                <!-- END timeline item -->
                <!-- timeline item -->
                <div>
                  <i class="fas fa-comments bg-warning"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your kategori-kegiatan</h3>

                    <div class="timeline-body">
                      Take me to your leader!
                      Switzerland is small and neutral!
                      We are more like Germany, ambitious and misunderstood!
                    </div>
                    <div class="timeline-footer">
                      <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                    </div>
                  </div>
                </div>
                <!-- END timeline item -->
                <!-- timeline time label -->
                <div class="time-label">
                  <span class="bg-success">
                    3 Jan. 2014
                  </span>
                </div>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <div>
                  <i class="fas fa-camera bg-purple"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                    <div class="timeline-body">
                      <img src="https://placehold.it/150x100" alt="...">
                      <img src="https://placehold.it/150x100" alt="...">
                      <img src="https://placehold.it/150x100" alt="...">
                      <img src="https://placehold.it/150x100" alt="...">
                    </div>
                  </div>
                </div>
                <!-- END timeline item -->
                <div>
                  <i class="far fa-clock bg-gray"></i>
                </div>
              </div>
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="settings">
              <form class="form-horizontal">
                <div class="form-group row">
                  <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputName" placeholder="Name">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName2" placeholder="Name">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="imports">
              <p class="">
                Menu ini digunakan untuk mengambil data pegawai dari aplikasi SISTER UNJ. <br>
                Klik tombol di bawah ini untuk melakukan pengambilan data.
              </p>
              <form id="import-data-sister" action="<?= route_to('import_data_sdm_sister', $pegawai->id_sdm); ?>" method="POST">
                <?= csrf_field() ?>
                <button type="button" class="btn btn-link btn-sm bg-gradient-danger btn-import text-white"><i class="fas fa-fw fa-sync"></i> Import Data dari SISTER UNJ</button>
              </form>
            </div>
          </div>
          <!-- /.tab-content -->
        </div><!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div><!-- /.container-fluid -->

<?= $this->section('script'); ?>
<script>
  $('.btn-import').on('click', function() {
    var q = confirm('Apakah Anda yakin ?');

    if (q == true) {
      $(this).prop('disabled', true);
      $('.fa-sync').addClass('fa-spin');
      $('#import-data-sister').submit();
    }
  });
</script>
<?= $this->endSection(); ?>