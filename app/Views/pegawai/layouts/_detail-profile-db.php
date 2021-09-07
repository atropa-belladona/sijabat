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
              <b>NIDN/NITK</b> <span class="float-right"><?= $pegawai->nidn; ?></span>
            </li>
            <li class="list-group-item">
              <b>NIP</b> <span class="float-right"><?= $pegawai->nip; ?></span>
            </li>
            <li class="list-group-item">
              <b>Fakultas</b> <span class="float-right"></span>
            </li>
            <li class="list-group-item">
              <b>Prodi</b> <span class="float-right">
                <?php if (isset($penugasan)) : ?>
                  <?= $penugasan->jenjang_pendidikan . ' ' . $penugasan->unit_kerja; ?>
                <?php endif ?>
              </span>
            </li>
            <li class="list-group-item">
              <b>Status Kepegawaian</b> <span class="float-right"><?= $pegawai->status_pegawai; ?></span>
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
            <li class="nav-item"><a class="nav-link" href="#dokumen" data-toggle="tab"><i class="fas fa-fw fa-file"></i> Dokumen</a></li>
            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"><i class="fas fa-fw fa-tools"></i> Settings</a></li>
            <li class="nav-item ml-auto"><a class="nav-link font-weight-bold" href="#imports" data-toggle="tab"><i class="fas fa-fw fa-download"></i> Import Data</a></li>
          </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="kegiatan">
              <!-- Pendidikan -->
              <div class="kategori-kegiatan">
                <?= $this->include('pegawai/layouts/parts/_01_pendidikan'); ?>
              </div>
              <!-- /. Pendidikan -->

              <!-- Pelaksanaan Pendidikan -->
              <hr class="bt-5">
              <div class="kategori-kegiatan">
                <?= $this->include('pegawai/layouts/parts/_02_pelaksanaan_pendidikan'); ?>

              </div>
              <!-- /. Pelaksanaan Pendidikan -->

              <!-- Pelaksanaan Penelitian -->
              <hr class="bt-5">
              <div class="kategori-kegiatan">
                <?= $this->include('pegawai/layouts/parts/_03_pelaksanaan_penelitian'); ?>
              </div>
              <!-- /. Pelaksanaan Penelitian -->

              <!-- Pelaksanaan Pengabdian Kepada Masyarakat -->
              <hr class="bt-5">
              <div class="kategori-kegiatan">
                <?= $this->include('pegawai/layouts/parts/_04_pelaksanaan_pengabdian'); ?>
              </div>
              <!-- /. Pelaksanaan Pengabdian Kepada Masyarakat -->

              <!-- Penunjang Kegiatan Akademik Dosen -->
              <hr class="bt-5">
              <div class="kategori-kegiatan">
                <?= $this->include('pegawai/layouts/parts/_05_penunjang_kegiatan'); ?>
              </div>
              <!-- /. Penunjang Kegiatan Akademik Dosen -->
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="dokumen">
              <!-- The Documents -->
              <div class="dokumen">
                <?= $this->include('pegawai/layouts/parts/_06_dokumen'); ?>
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