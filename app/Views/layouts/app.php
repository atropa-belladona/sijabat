<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="<?= csrf_token(); ?>">

  <link rel="shortcut icon" href="<?= base_url('img/favicon.png'); ?>">
  <title>SIJABAT <?= (isset($titlePage) ? '| ' . $titlePage : ''); ?></title>

  <!-- My Scripts -->
  <script src="<?= base_url(); ?>/js/accounting.min.js"></script>
  <script src="<?= base_url(); ?>/js/my.js"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url(); ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url(); ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>/css/adminlte.css">

  <!-- JQueryUI Css -->
  <link rel="stylesheet" href="<?= base_url(); ?>/plugins/jquery-ui/jquery-ui.min.css">

  <!-- Datatable -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.25/r-2.2.9/datatables.min.css" />

  <!-- Bootstrap selectpicker -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <!-- My CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>/css/my.css">

  <?= $this->renderSection('style'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm">
  <div class="wrapper">

    <!-- Preloader -->


    <!-- Include parts navbar -->
    <?= $this->include('layouts/parts/navbar'); ?>

    <!-- Include parts : sidebar -->
    <?= $this->include('layouts/parts/sidebar'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content header  -->
      <div class="content-header">
        <?= $this->renderSection('content-header'); ?>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col">
              <?php if (session('app_success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Sukses !</strong> <?= session('app_success'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif ?>
              <?php if (session('app_error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Peringatan !</strong> <?= session('app_error'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif ?>
            </div>
          </div>
        </div>

        <?= $this->renderSection('content-main'); ?>

      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <?= $this->renderSection('modal'); ?>

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; <?= (date('Y') == 2021) ? '2021' : '2021 - ' . date('Y'); ?> Universitas Negeri Jakarta</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 0.1.0
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="<?= base_url(); ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?= base_url(); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url(); ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

  <!-- JQueryUI -->
  <script src="<?= base_url(); ?>/plugins/jquery-ui/jquery-ui.min.js"></script>

  <!-- Datatable -->
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.25/r-2.2.9/datatables.min.js"></script>

  <!-- AdminLTE App -->
  <script src="<?= base_url(); ?>/js/adminlte.js"></script>

  <!-- Bootstrap select -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  </script>

  <script>
    toastr.options = {
      "progressBar": true,
      "positionClass": "toast-top-center",
      "showDuration": "1000",
    }

    <?php if (session('toast_success')) : ?>
      toastr.success("<?= session('toast_success') ?>").css({
        'width': 'auto',
        'max-width': 'fit-content'
      });
    <?php endif ?>

    <?php if (session('toast_error')) : ?>
      toastr.error("<?= session('toast_error') ?>").css({
        'width': 'auto',
        'max-width': 'fit-content'
      });
    <?php endif ?>

    <?php if (session('toast_info')) : ?>
      toastr.info("<?= session('toast_info') ?>").css({
        'width': 'auto',
        'max-width': 'fit-content'
      });
    <?php endif ?>

    <?php if (session('toast_warning')) : ?>
      toastr.warning("<?= session('toast_warning') ?>").css({
        'width': 'auto',
        'max-width': 'fit-content'
      });
    <?php endif ?>
  </script>

  <!-- Custom script -->
  <script>
    $(document).ready(function() {
      $("#tabs").tabs();

      var datatable = $('.datatable').DataTable({
        'responsive': true,
        'language': {
          'emptyTable': '-- Tidak ada data --'
        }
      });

      var datatable = $('.dt-nopaging-nosearch').DataTable({
        'searching': false,
        'paging': false,
        'bInfo': false,
        'language': {
          'emptyTable': '-- Tidak ada data --'
        }
      });
    });
  </script>

  <script>
    function window_popup(popup) {
      window.open('about:blank', popup, 'width=800,height=600');
    }
  </script>


  <?= $this->renderSection('script'); ?>

  <?= $this->renderSection('script1'); ?>


</body>

</html>