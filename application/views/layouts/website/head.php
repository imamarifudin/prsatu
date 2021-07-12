<head>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#000000">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $title ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- CSS here
    <link rel="stylesheet" href="<?= templates('assets/css/bootstrapc.min.css', 'website') ?>">-->
    <link rel="stylesheet" href="<?= templates('assets/css/owl.carousel.min.css', 'website') ?>">
    <link rel="stylesheet" href="<?= templates('assets/css/slicknav.css', 'website') ?>">
    <link rel="stylesheet" href="<?= templates('assets/css/flaticon.css', 'website') ?>">
    <link rel="stylesheet" href="<?= templates('assets/css/progressbar_barfiller.css', 'website') ?>">
    <link rel="stylesheet" href="<?= templates('assets/css/gijgo.css', 'website') ?>">
    <link rel="stylesheet" href="<?= templates('assets/css/animate.min.css', 'website') ?>">
    <link rel="stylesheet" href="<?= templates('assets/css/animated-headline.css', 'website') ?>">
    <link rel="stylesheet" href="<?= templates('assets/css/magnific-popup.css', 'website') ?>">
    <link rel="stylesheet" href="<?= templates('assets/css/fontawesome-all.min.css', 'website') ?>">
    <link rel="stylesheet" href="<?= templates('assets/css/themify-icons.css', 'website') ?>">
    <link rel="stylesheet" href="<?= templates('assets/css/slick.css', 'website') ?>">
    <link rel="stylesheet" href="<?= templates('assets/css/nice-select.css', 'website') ?>">
    <link rel="stylesheet" href="<?= templates('assets/css/styless.css', 'website') ?>">

    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin="" />
    <link rel="stylesheet" href="<?= base_url('assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.css') ?>">
    <style type="text/css">
	#autocomplete {
        z-index: 100;
        margin-bottom: 5px;
      }
        #map 
	
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
		@import url("//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");

.navbar-icon-top .navbar-nav .nav-link > .fa {
  position: relative;
  width: 36px;
  font-size: 24px;
}

.navbar-icon-top .navbar-nav .nav-link > .fa > .badge {
  font-size: 0.75rem;
  position: absolute;
  right: 0;
  font-family: sans-serif;
}

.navbar-icon-top .navbar-nav .nav-link > .fa {
  top: 3px;
  line-height: 12px;
}

.navbar-icon-top .navbar-nav .nav-link > .fa > .badge {
  top: -10px;
}

@media (min-width: 576px) {
  .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link {
    text-align: center;
    display: table-cell;
    height: 70px;
    vertical-align: middle;
    padding-top: 0;
    padding-bottom: 0;
  }

  .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link > .fa {
    display: block;
    width: 48px;
    margin: 2px auto 4px auto;
    top: 0;
    line-height: 24px;
  }

  .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link > .fa > .badge {
    top: -7px;
  }
}

@media (min-width: 768px) {
  .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link {
    text-align: center;
    display: table-cell;
    height: 70px;
    vertical-align: middle;
    padding-top: 0;
    padding-bottom: 0;
  }

  .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link > .fa {
    display: block;
    width: 48px;
    margin: 2px auto 4px auto;
    top: 0;
    line-height: 24px;
  }

  .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link > .fa > .badge {
    top: -7px;
  }
}

@media (min-width: 992px) {
  .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link {
    text-align: center;
    display: table-cell;
    height: 70px;
    vertical-align: middle;
    padding-top: 0;
    padding-bottom: 0;
  }

  .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link > .fa {
    display: block;
    width: 48px;
    margin: 2px auto 4px auto;
    top: 0;
    line-height: 24px;
  }

  .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link > .fa > .badge {
    top: -7px;
  }
}

@media (min-width: 1200px) {
  .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link {
    text-align: center;
    display: table-cell;
    height: 70px;
    vertical-align: middle;
    padding-top: 0;
    padding-bottom: 0;
  }

  .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link > .fa {
    display: block;
    width: 48px;
    margin: 2px auto 4px auto;
    top: 0;
    line-height: 24px;
  }

  .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link > .fa > .badge {
    top: -7px;
  }
}
    </style>

</head>