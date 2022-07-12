<?= $this->extend('layouts/content-green') ?>

<!-- breadcrumb -->
<?= $this->section('breadcrumbs') ?>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?= route_to('home') ?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?= route_to('dupak_index') ?>">Daftar Usulan</a></li>
  <li class="breadcrumb-item active">Detail </li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('right-button-menu'); ?>
<div class="right-button">

  <button type="button" class="btn btn-sm btn-success mr-3" data-toggle="modal" data-target="#modal-kendali"><i class="fas fa-list-alt"></i> Kartu Kendali</button>
  <button type="button" class="btn btn-sm btn-success mr-3" data-toggle="modal" data-target="#modal-rekap"><i class="fas fa-list-alt"></i> Rekap Dupak</button>
  <button type="button" class="btn btn-sm btn-success mr-3" data-toggle="modal" data-target="#modal-logs"><i class="fas fa-history"></i> Lihat sejarah usulan</button>
  <button type="button" class="btn btn-sm btn-warning mr-3" data-toggle="modal" data-target="#modal-ubah-usulan" title="Ubah Data Usulan"><i class="fas fa-edit"></i> Ubah Info Usulan</button>
</div>
<?= $this->endSection(); ?>

<!-- content section -->
<?= $this->section('content') ?>
<div class="row">
  <div class="col d-flex justify-content-between font-weight-bold mb-3">
    <div>
      Status : <span class="badge <?= $dupak->bg_color; ?>"><?= $dupak->ur_tahap; ?></span>
    </div>
    <div class="text-danger">
      Masa Penilaian : <?= date_str($dupak->masa_awal) . ' s.d. ' . date_str($dupak->masa_akhir); ?>
    </div>
  </div>
</div>
<div class="row">
  <div class="col">
    <section class="information">
      <div class="row">
        <div class="col d-flex">
          <h6 class="font-weight-bold text-primary">Keterangan Perorangan</h6>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-10 col-md-8">
          <!-- include keterangan perorangan -->
          <?= $this->include('dupak/parts/_01_keterangan_perorangan'); ?>
        </div>
        <div class="col-lg-2 col-md-4 pr-4">
          <!-- include foto -->
          <?= $this->include('dupak/parts/_02_foto_perorangan'); ?>
        </div>
      </div>

    </section>
  </div>
</div>

<hr class="bt-5">

<div class="row">
  <div class="col">
    <div class="card card-success card-outline card-outline-tabs shadow shadow-none">
      <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="false">
              <h6 class="font-weight-bold text-primary">Usulan Angka Kredit <?= ($total_ak_usulan > 0) ? '<span class="ml-3 badge badge-warning">' . number_format2($total_ak_usulan) . '</span>' : ''; ?></h6>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">
              <h6 class="font-weight-bold text-primary">Dokumen Persyaratan</h6>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">
              <h6 class="font-weight-bold text-primary">Proses Usulan</h6>
            </a>
          </li>

        </ul>
      </div>
      <div class="card-body px-2 py-4">
        <div class="tab-content" id="custom-tabs-four-tabContent">
          <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
            <section class="usulan">
              <!-- include view parts 03 usulan angka kredit -->
              <?= $this->include('dupak/parts/_03_usulan_ak'); ?>
            </section>
          </div>
          <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
            <section class="dokumen-pengantar">
              <!-- include view parts 03 usulan angka kredit -->
              <?= $this->include('dupak/parts/_04_dokumen_pengantar'); ?>
            </section>
          </div>
          <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
            <div class="row">
              <!-- <div class="col d-flex flex-row-reverse align-items-end"> -->
              <div class="col">
                <!-- button actions -->
                <form action="<?= route_to('dupak_send', $dupak->id); ?>" method="POST" class="d-flex justify-content-between">
                  <?= csrf_field(); ?>

                  <?php if (in_groups('dosen')) : ?>
                    <?php if (($dupak->tahap_id == 1)) : ?>
                      <button type="submit" class="btn btn-sm btn-success bg-gradient-success"><i class="fas fa-fw fa-arrow-right"></i> Kirim Usulan ke Admin Fakultas</button>
                    <?php else : ?>
                      <span class="font-italic">Pengajuan sudah terkirim (Status : <?= $dupak->ur_tahap; ?>)</span>
                    <?php endif ?>
                  <?php endif ?>

                  <?php if (in_groups('operator') and ($dupak->tahap_id == 1 or $dupak->tahap_id == 10 or $dupak->tahap_id == 25 or $dupak->tahap_id == 45)) : ?>

                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-fw fa-thumbs-down"></i> Tidak disetujui Tim Penilai PAK Fakultas</button>
                    <button type="button" class="btn btn-sm btn-outline-primary"><i class="fas fa-fw fa-thumbs-up"></i> Disetujui Tim Penilai PAK Fakultas</button>

                    <button type="submit" class="btn btn-sm btn-success bg-gradient-success"><i class="fas fa-fw fa-arrow-right"></i><?= ($dupak->tahap_id == 25 or $dupak->tahap_id == 45) ? 'Kirim Perbaikan' : 'Kirim Usulan ke Bagian Kepegawaian UNJ' ?> </button>
                  <?php endif ?>

                  <?php if (in_groups('verifikator') and $dupak->tahap_id == 20) : ?>
                    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#modal-catatan"><i class="fas fa-fw fa-arrow-left"></i> Kembalikan ke Admin Fakultas</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-fw fa-thumbs-down"></i> Tidak Menyetujui</button>
                    <button type="button" class="btn btn-sm btn-outline-primary"><i class="fas fa-fw fa-thumbs-up"></i> Setujui</button>
                    <button type="submit" class="btn btn-sm btn-success bg-gradient-success "><i class="fas fa-fw fa-arrow-right"></i> Kirim Usulan ke Bagian Kepegawaian</button>
                  <?php endif ?>

                  <?php if (in_groups('koordinator') and $dupak->tahap_id == 30) : ?>
                    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#modal-catatan"><i class="fas fa-fw fa-arrow-left"></i> Kembalikan ke Admin Fakultas</button>
                    <button type="submit" class="btn btn-sm btn-success bg-gradient-success "><i class="fas fa-fw fa-arrow-right"></i> Kirim Usulan ke Tim Penilai PAK</button>
                  <?php endif ?>

                  <?php if (in_groups('reviewer') and $dupak->tahap_id == 40) : ?>
                    <button type="button" class="btn btn-sm btn-outline-danger " data-toggle="modal" data-target="#modal-catatan"><i class="fas fa-fw fa-arrow-left"></i> Kembalikan untuk diperbaiki</button>
                    <button type="button" class="btn btn-sm btn-default bg-gradient-default " data-toggle="modal" data-target="#modal-alasan"><i class="far fa-fw fa-thumbs-down"></i> Tolak Usulan</button>
                    <button type="submit" class="btn btn-sm btn-success bg-gradient-success "><i class="far fa-fw fa-thumbs-up"></i> Setujui dan Kirim ke Bagian Kepegawaian</button>
                  <?php endif ?>
                </form>
                <!-- /. button actions -->
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- <div class="row">
  <div class="col">

  </div>
</div>

<hr class="bt-5">
<div class="row mb-4">
  <div class="col-lg-12 col-md-12">

  </div>

</div>

<hr class="bt-5"> -->



<?= $this->endSection() ?>

<!-- modal sections -->
<?= $this->section('modal'); ?>
<!-- Modal Cetak Surat Pernyataan -->
<div class="modal fade" id="modal-cetak-sp">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header py-2">
        <h6 class="modal-title font-weight-bold">Cetak Surat Pernyataan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <div class="modal-preloader d-none text-center">
          <img src="<?= base_url(); ?>/img/preloader.gif" alt="preloader" height="40" width="auto">
        </div>
        <div class="content"></div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-catatan">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header py-2">
        <h6 class="modal-title font-weight-bold">Catatan Khusus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form action="<?= route_to('dupak_return', $dupak->id); ?>" method="POST">
          <?= csrf_field(); ?>
          <div class="form-group row">
            <div class="col">
              <textarea name="catatan" id="catatan" class="form-control" rows="10"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col d-flex justify-content-end">
              <button type="submit" class="btn btn-sm btn-danger btn-gradient-danger"><i class="fas fa-fw fa-arrow-left"></i> Kembalikan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-alasan">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header py-2">
        <h6 class="modal-title font-weight-bold">Alasan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form action="<?= route_to('dupak_reject', $dupak->id); ?>" method="POST">
          <?= csrf_field(); ?>
          <div class="form-group row">
            <div class="col">
              <textarea name="alasan" id="alasan" class="form-control" rows="10"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col d-flex justify-content-end">
              <button type="submit" class="btn btn-sm btn-danger btn-gradient-danger"><i class="fas fa-fw fa-thumbs-down"></i> Tolak Usulan</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<!-- modal kartu kendali -->
<div class="modal fade" id="modal-kendali">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header py-2">
        <h6 class="modal-title font-weight-bold">Kartu Kendali Usul Kenaikan/Penyesuaian Jabatan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <?= $this->include('dupak/parts/modal-content/_97_kartu_kendali') ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal rekap dupak -->
<div class="modal fade" id="modal-rekap">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header py-2">
        <h6 class="modal-title font-weight-bold">Rekap Daftar Usul Penetapan Angka Kredit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <?= $this->include('dupak/parts/modal-content/_96_rekap_dupak') ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal ubah usulan -->
<div class="modal fade" id="modal-ubah-usulan">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header py-2">
        <h6 class="modal-title font-weight-bold">Ubah Data Usulan PAK</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <?= $this->include('dupak/parts/modal-content/_100_ubah_usulan') ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-logs">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header py-2">
        <h6 class="modal-title font-weight-bold">Sejarah Usulan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <table class="table table-sm">
          <thead class="bg-dark text-white">
            <tr>
              <th>No.</th>
              <th>Tahap</th>
              <th>Waktu</th>
              <th>Oleh</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($dupak_logs as $log) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $log->ur_tahap; ?></td>
                <td><?= $log->created_at; ?></td>
                <td><?= $log->created_by; ?></td>
                <td><?= $log->keterangan; ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
  $('#table-ak-usulan').DataTable({
    'paging': false,
    'searching': false,
    'bInfo': false,
  });

  $('#modal-tambah-kegiatan').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id_kegiatan = button.data('kegiatan');
    var modal = $(this);

    modal.find('.modal-preloader').toggleClass('d-none');
    modal.find('.content').html('');

    $.ajax({
      url: '<?= route_to('dupak_list', $dupak->id); ?>',
      type: 'get',
      data: {
        'id_kegiatan': id_kegiatan
      },
      success: function(data) {
        $('.modal-preloader').toggleClass('d-none');

        modal.find('.datatable').DataTable().clear().destroy();

        modal.find('.content').html(data);

        modal.find('.datatable').DataTable({
          'responsive': true
        });

      },
      error: function(data) {
        console.log(data);
      }
    })

  });


  $('#modal-detail-kegiatan').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id_usulan = button.data('id');
    var modal = $(this);

    modal.find('.modal-preloader').toggleClass('d-none');
    modal.find('.content').html('');

    $.ajax({
      url: '<?= route_to('dupak_detail_kegiatan', $dupak->id); ?>',
      type: 'get',
      data: {
        'id_usulan': id_usulan
      },
      success: function(data) {
        modal.find('.modal-preloader').toggleClass('d-none');

        modal.find('.dt-nopaging-nosearch').DataTable().clear().destroy();

        modal.find('.content').html(data);

        modal.find('.dt-nopaging-nosearch').DataTable({
          'searching': false,
          'paging': false,
          'bInfo': false,
          'language': {
            'emptyTable': '-- Tidak ada data --'
          }
        });
      },
      error: function(data) {
        console.log(data);
      }
    })

  });

  $('#modal-evaluasi').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id_usulan = button.data('id');
    var modal = $(this);

    modal.find('.modal-preloader').toggleClass('d-none');
    modal.find('.content').html('');


    $.ajax({
      url: '<?= route_to('dupak_evaluasi'); ?>',
      type: 'get',
      data: {
        'id_usulan': id_usulan,
      },
      success: function(data) {
        modal.find('.modal-preloader').toggleClass('d-none');
        modal.find('.content').html(data);
      },
      error: function(data) {
        console.log(data);
      }
    })
  });

  $('#modal-cetak-sp').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id_dupak = button.data('id');
    var modal = $(this);

    modal.find('.modal-preloader').toggleClass('d-none');
    modal.find('.content').html('');

    $.ajax({
      url: '<?= route_to('view_cetak_sp'); ?>',
      type: 'get',
      data: {
        'id_dupak': id_dupak,
      },
      success: function(data) {
        modal.find('.modal-preloader').toggleClass('d-none');
        modal.find('.content').html(data);
      },
      error: function(data) {
        console.log(data);
      }
    })
  });
</script>
<?= $this->endSection(); ?>