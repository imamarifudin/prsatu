<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?= templates('production/images/') ?>" sizes="32x32" />

  <title><?= $title ?></title>

  <!-- Bootstrap -->
  <link href="<?= templates('vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?= templates('vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?= templates('vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
  <!-- DataTables CSS -->
  <link href="<?= templates('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= templates('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= templates('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= templates('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= templates('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">

  <link rel="stylesheet" href="<?= base_url('assets/css/leaflet.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/easy-button.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/fontawesome.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/flatpickr.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
  
  <script src="<?= base_url('assets/js/leaflet.js'); ?>"></script>
  <script src="<?= base_url('assets/js/easy-button.js'); ?>"></script>
  <script src="<?= base_url('assets/js/sweetalert2.min.js'); ?>"></script>
  <script src="<?= base_url('assets/js/flatpickr.js'); ?>"></script>

  <!-- Custom Theme Style -->
  <link href="<?= templates('build/css/custom.min.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin="" />
  <link rel="stylesheet" href="<?= base_url('assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.css') ?>">
  <style type="text/css">
    #map {
      height: 100vh;
    }

    .icon {
      display: inline-block;
      margin: 2px;
      height: 16px;
      width: 16px;
      background-color: #ccc;
    }

    .icon-bar {
      background: url('assets/js/leaflet-panel-layers-master/examples/images/icons/bar.png') center center no-repeat;
    }

    .leaflet-tooltip.no-background {
      background: transparent;
      border: 0;
      box-shadow: none;
      color: #fff;
      font-weight: bold;
      text-shadow: 1px 1px 1px #000, -1px 1px 1px #000, 1px -1px 1px #000, -1px -1px 1px #000;
    }
  </style>
</head>