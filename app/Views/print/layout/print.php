<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $title ?? 'Cetak Dokumen'; ?></title>

  <style>
    body {
      font-family: 'Arial Narrow', Helvetica, sans-serif;
      font-size: 10pt;
    }

    table {
      font-family: 'Arial Narrow', Helvetica, sans-serif;
      border-collapse: collapse;
      color: 1px solid #000;
    }

    table th {
      padding: .2rem;
    }

    table td {
      padding: .2rem;
    }

    table.outline {
      border: 1px solid black;
    }

    td.border-top {
      border-top: 1px solid black;
    }

    td.border-bottom {
      border-bottom: 1px solid black;
    }

    td.border-right {
      border-right: 1px solid black;
    }

    td.border-left {
      border-left: 1px solid black;
    }

    td.align-top {
      vertical-align: top;
    }

    table.content td {
      padding-bottom: 0.5em;
    }

    .text-center {
      text-align: center;
    }

    .text-left {
      text-align: left;
    }

    .text-bold {
      font-weight: bold;
    }

    .font-weight-bold {
      font-weight: bold;
    }

    .text-right {
      text-align: right;
    }

    .table-bordered th {
      border: 1px solid black;
    }

    .table-bordered td {
      border: 1px solid black;

    }

    .mt-2 {
      margin-top: .5rem;
    }

    .mt-4 {
      margin-top: 1rem;
    }

    .mb-1 {
      margin-bottom: .25rem;
    }

    .mb-2 {
      margin-bottom: .5rem;
    }

    .mb-3 {
      margin-bottom: .75rem;
    }


    .text-lg {
      font-size: 14pt !important;
    }

    .text-md {
      font-size: 10pt !important;
    }

    .text-sm {
      font-size: 8pt !important;
    }

    .border {
      border: 1px solid black;
    }

    @media print {
      body {
        -webkit-print-color-adjust: exact;
      }
    }
  </style>

  <?= $this->renderSection('style'); ?>
</head>

<body>

  <?= $this->renderSection('content'); ?>

</body>

</html>