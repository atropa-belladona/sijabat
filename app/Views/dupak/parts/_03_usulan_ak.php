<h6 class="font-weight-bold text-primary">Usulan Angka Kredit <?= ($total_ak_usulan > 0) ? '<span class="ml-3 badge badge-warning">' . number_format2($total_ak_usulan) . '</span>' : ''; ?></h6>

<?php if (in_groups('dosen') or in_groups('operator')) : ?>
  <?php if ($dupak->tahap_id == 1 or $dupak->tahap_id == 10 or $dupak->tahap_id == 25 or $dupak->tahap_id == 45) : ?>
    <div class="button-actions d-flex py-2">
      <?php foreach ($bidang_kegiatan as $bidang) : ?>
        <button type="button" class="btn btn-sm btn-outline-success mr-4" data-toggle="modal" data-target="#modal-tambah-kegiatan" data-dupak="<?= $dupak->id; ?>" data-kegiatan="<?= $bidang->id; ?>"><i class="fas fa-fw fa-plus"></i> <?= $bidang->nama; ?></button>
      <?php endforeach ?>
    </div>
  <?php endif ?>
<?php endif ?>

<div class="kegiatan py-2">
  <table id="table-ak-usulan" class="table table-sm table-success table-hover" style="width: 100%;">
    <thead class="bg-dark text-white">
      <tr>
        <th class="text-center">No.</th>
        <th>Kategori Kegiatan</th>
        <th>Nama Kegiatan</th>
        <th class="text-center">Volume Kegiatan</th>
        <th class="text-center">Satuan Hasil</th>
        <th class="text-center">Usulan Angka Kredit</th>
        <th class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1 ?>
      <?php foreach ($dupak_detail as $detail) : ?>
        <tr>
          <td class="text-center"><?= $i++; ?></td>
          <td><?= $detail->kategori_kegiatan; ?></td>
          <td><?= $detail->nama; ?></td>
          <td class="text-right pr-4"><?= number_format2($detail->volume); ?></td>
          <td class="text-center"><?= $detail->satuan_hasil; ?></td>
          <td class="text-right pr-4"><?= number_format2($detail->ak_usulan); ?></td>
          <td class="text-center d-flex justify-content-around">
            <button class="btn btn-xs btn-info" title="Detail" data-toggle="modal" data-target="#modal-detail-kegiatan" data-id="<?= $detail->id ?>"><i class="far fa-fw fa-list-alt"></i> Detail</button>

            <?php if (in_groups(['dosen', 'operator'])) : ?>
              <?php if ($dupak->tahap_id == 1 or $dupak->tahap_id == 10 or $dupak->tahap_id == 25 or $dupak->tahap_id == 45) : ?>
                <form action="<?= route_to('dupak_detail_delete', $detail->id_dupak, $detail->id_detail); ?>" method="POST">
                  <?= csrf_field(); ?>
                  <button class="btn btn-xs btn-outline-danger ml-3" title="Hapus Kegiatan" onclick="return confirm('Yakin hapus data ini ?');"><i class="far fa-fw fa-trash-alt"></i></button>
                </form>
              <?php endif ?>
            <?php endif ?>

            <?php if (in_groups('verifikator') and $dupak->tahap_id == 20) : ?>
              <button class="btn btn-xs btn-warning" title="Catatan Evaluasi" data-toggle="modal" data-target="#modal-evaluasi" data-id="<?= $detail->id; ?>"><i class="far fa-fw fa-edit"></i> Evaluasi</button>
            <?php endif ?>

            <?php if (in_groups('reviewer') and $dupak->tahap_id == 40) : ?>
              <button class="btn btn-xs btn-warning" title="Catatan Evaluasi" data-toggle="modal" data-target="#modal-evaluasi" data-id="<?= $detail->id; ?>"><i class="far fa-fw fa-edit"></i> Evaluasi</button>
            <?php endif ?>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
    <tfoot class="bg-dark text-white font-weight-bold">
      <tr>
        <td class="text-right" colspan="5">Total</td>
        <td class="text-right pr-4"><?= number_format2($total_ak_usulan); ?></td>
        <td></td>
      </tr>
    </tfoot>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-tambah-kegiatan">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header py-2">
        <h6 class="modal-title font-weight-bold">Data Usulan</h5>
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

<div class="modal fade" id="modal-detail-kegiatan">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header py-2">
        <h6 class="modal-title font-weight-bold">Detail Kegiatan</h5>
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

<div class="modal fade" id="modal-evaluasi">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header py-2">
        <h6 class="modal-title font-weight-bold">Catatan Hasil Verifikasi</h5>
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
</script>
<?= $this->endSection(); ?>