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
  <!-- My CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>/css/my.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="<?= base_url(); ?>/img/logo_unj.png" alt="AdminLTELogo" height="auto" width="60">
    </div> -->

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
  <!-- AdminLTE App -->
  <script src="<?= base_url(); ?>/js/adminlte.js"></script>

  <!-- Custom script -->
  <?= $this->renderSection('script'); ?>

</body>

</html>