<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" href="<?= base_url('img/favicon.png'); ?>">
  <title>SIJABAT <?= (isset($titlePage) ? '| ' . $titlePage : ''); ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url(); ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url(); ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>/css/adminlte.min.css">

  <!-- JQueryUI Css -->
  <link rel="stylesheet" href="<?= base_url(); ?>/plugins/jquery-ui/jquery-ui.min.css">

  <!-- Datatable -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.25/r-2.2.9/datatables.min.css" />

  <!-- Bootstrap selectpicker -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

  <!-- My CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>/css/my.css">

  <?= $this->renderSection('style'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="<?= base_url(); ?>/img/logo_unj.png" alt="AdminLTELogo" height="auto" width="60">
    </div>

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
                  <strong>Error !</strong> <?= session('app_error'); ?>
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


  <!-- Custom script -->

  <script>
    $(document).ready(function() {
      $("#tabs").tabs();

      $('.datatable').DataTable({
        'responsive': true
      });
    });
  </script>

  <?= $this->renderSection('script'); ?>

</body>

</html>