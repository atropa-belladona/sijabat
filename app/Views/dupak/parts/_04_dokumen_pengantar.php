<?= $this->section('style'); ?>
<link rel="stylesheet" href="<?= base_url() ?>/css/dropzone.css">
<script src="<?= base_url(); ?>/js/dropzone.js"></script>
<?= $this->endSection(); ?>

<?= csrf_meta() ?>

<div class="card card-default card-tabs">
  <div class="card-header p-0 pt-1">
    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
      <li class="pt-2 px-3">
        <h6 class="card-title font-weight-bold text-primary">Dokumen Pengantar</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link active" id="list-dokumen-tab" data-toggle="pill" href="#list-dokumen" role="tab" aria-controls="list-dokumen" aria-selected="true"><i class="fas fa-fw fa-list-alt"></i> List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="upload-dokumen-tab" data-toggle="pill" href="#upload-dokumen" role="tab" aria-controls="upload-dokumen" aria-selected="false"><i class="fas fa-fw fa-upload"></i> Upload</a>
      </li>
    </ul>
  </div>
  <div class="card-body p-1">
    <div class="tab-content" id="custom-tabs-two-tabContent">
      <div class="tab-pane fade show active" id="list-dokumen" role="tabpanel" aria-labelledby="list-dokumen-tab">
        <table id="table-dokumen-pengantar" class="table table-sm table-warning" style="width: 100%;">
          <thead class="bg-dark text-white">
            <tr>
              <th>Nama Dokumen</th>
              <th>Tautan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>

          </tbody>

        </table>
      </div>
      <div class="tab-pane fade" id="upload-dokumen" role="tabpanel" aria-labelledby="upload-dokumen-tab">
        <div class="upload-dokumen">
          <form action="<?= route_to('dupak_store_dokumen', $dupak->id); ?>" class="dropzone" id="my-great-dropzone"></form>
        </div>
      </div>
    </div>
  </div>
  <!-- /.card -->
</div>

<?= $this->section('script1'); ?>
<script>
  Dropzone.options.myGreatDropzone = { // camelized version of the `id`
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 2, // MB
    accept: function(file, done) {
      if (file.name == "") {
        done("Naha, you don't.");
      } else {
        done();
      }
    }
  };

  var tdp = $('#table-dokumen-pengantar').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: "<?= route_to('dupak_get_dokumen', $dupak->id); ?>"
    },
    columns: [{
        data: 'nama_dokumen',
        name: 'nama_dokumen'
      },
      {
        data: 'tautan',
        render: function(data) {
          return '<a href="<?= base_url() ?>/uploads/' + data + '" target="_blank">Lihat</a>'
        }
      },
      {
        data: 'action',
        name: 'action'
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