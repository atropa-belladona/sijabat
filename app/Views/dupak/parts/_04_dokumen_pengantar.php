<?= $this->section('style'); ?>
<link rel="stylesheet" href="<?= base_url() ?>/css/dropzone.css">
<script src="<?= base_url(); ?>/js/dropzone.js"></script>
<?= $this->endSection(); ?>

<?= csrf_meta() ?>

<div class="card card-default card-tabs mb-0">
  <div class="card-header p-0 pt-1">
    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
      <li class="pt-2 px-3">
        <h6 class="card-title font-weight-bold text-primary">Dokumen Persyaratan</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link active" id="list-dokumen-tab" data-toggle="pill" href="#list-dokumen" role="tab" aria-controls="list-dokumen" aria-selected="true"><i class="fas fa-fw fa-list-alt"></i> List</a>
      </li>
      <?php if (in_groups('operator') or in_groups('dosen')) : ?>
        <?php if ($dupak->tahap_id == 1 or $dupak->tahap_id == 10 or $dupak->tahap_id == 25 or $dupak->tahap_id == 35 or $dupak->tahap_id == 45) : ?>
          <li class="nav-item">
            <a class="nav-link" id="upload-dokumen-tab" data-toggle="pill" href="#upload-dokumen" role="tab" aria-controls="upload-dokumen" aria-selected="false"><i class="fas fa-fw fa-upload"></i> Upload</a>
          </li>
        <?php endif ?>
      <?php endif ?>
    </ul>
  </div>
  <div class="card-body py-2">
    <?php if (in_groups('dosen') or in_groups('operator')) : ?>
      <div class="row mb-4">
        <div class="col">
          <button type="button" class="btn btn-sm btn-outline-info mr-2" data-toggle="modal" data-target="#modal-cetak"><i class="fas fa-fw fa-print"></i> Cetak Surat Pernyataan Melaksanakan Pendidikan</button>
          <button type="button" class="btn btn-sm btn-outline-info mr-2" data-toggle="modal" data-target="#modal-cetak"><i class="fas fa-fw fa-print"></i> Cetak Surat Pernyataan Melaksanakan Penelitian</button>
          <button type="button" class="btn btn-sm btn-outline-info mr-2" data-toggle="modal" data-target="#modal-cetak"><i class="fas fa-fw fa-print"></i> Cetak Surat Pernyataan Melaksanakan Pengabdian</button>
          <button type="button" class="btn btn-sm btn-outline-info mr-2" data-toggle="modal" data-target="#modal-cetak"><i class="fas fa-fw fa-print"></i> Cetak Surat Pernyataan Melaksanakan Penunjang Tugas Dosen</button>
        </div>
      </div>
    <?php endif ?>
    <div class="tab-content" id="custom-tabs-two-tabContent">
      <div class="tab-pane fade show active" id="list-dokumen" role="tabpanel" aria-labelledby="list-dokumen-tab">
        <table id="table-dokumen-pengantar" class="table table-sm table-warning" style="width: 100%;">
          <thead class="bg-dark text-white">
            <tr>
              <th>No.</th>
              <th>Nama Dokumen</th>
              <th>Tautan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>

          </tbody>

        </table>
      </div>
      <?php if (in_groups('operator') or in_groups('dosen')) : ?>
        <?php if ($dupak->tahap_id == 1 or $dupak->tahap_id == 10 or $dupak->tahap_id == 25 or $dupak->tahap_id == 45) : ?>
          <div class="tab-pane fade" id="upload-dokumen" role="tabpanel" aria-labelledby="upload-dokumen-tab">
            <div class="upload-dokumen">
              <form action="<?= route_to('dupak_store_dokumen', $dupak->id); ?>" class="dropzone" id="my-great-dropzone"></form>
            </div>
          </div>
        <?php endif ?>
      <?php endif ?>
    </div>
  </div>
  <!-- /.card -->
</div>

<?= $this->section('script1'); ?>
<script>
  Dropzone.options.myGreatDropzone = { // camelized version of the `id`
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 2, // MB
    acceptedFiles: "application/pdf"
  };

  var tdp = $('#table-dokumen-pengantar').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: "<?= route_to('dupak_get_dokumen', $dupak->id); ?>"
    },
    columns: [{
        data: null,
        orderable: false,
        className: 'text-center',
        render: function(data, type, row, meta) {
          return meta.row + meta.settings._iDisplayStart + 1;
        }
      },
      {
        data: 'nama_dokumen',
        name: 'nama_dokumen'
      },
      {
        data: 'tautan',
        className: 'text-center ',
        render: function(data) {
          return '<a href="<?= base_url() ?>/uploads/' + data + '" target="_blank"><u>Lihat</u></a>'
        }
      },
      {
        data: 'action',
        name: 'action',
        className: 'text-center',
        orderable: false,
        render: function(data) {
          var tahap_id = "<?= $dupak->tahap_id; ?>";

          if (tahap_id == 1 || tahap_id == 10 || tahap_id == 25 || tahap_id == 45) {
            return data;
          }

          return '';
        }
      }
    ]
  });


  $('#list-dokumen-tab').on('focus', function() {
    tdp.ajax.reload();
  });

  $('#table-dokumen-pengantar').on('click', '.btn-delete-dokumen', function() {
    var id = $(this).data('id');

    var q = confirm('Yakin ingin menghapus ?');

    if (q == true) {
      $.ajax({
        'url': "<?= site_url('dupak/detail/dokumen/delete/') ?>" + id,
        'type': 'POST',
        'success': function(data) {
          tdp.ajax.reload();
        },
        'error': function(data) {
          console.log(data);
        }
      });
    }
  });
</script>
<?= $this->endSection(); ?>