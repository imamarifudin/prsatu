<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>403 - Access Forbidden</title>

    <!-- Bootstrap -->
    <link href="<?=templates('vendors/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=templates('vendors/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=templates('vendors/nprogress/nprogress.css')?>" rel="stylesheet">   

    <!-- Custom Theme Style -->
    <link href="<?=templates('build/css/custom.min.css')?>" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <!-- page content -->
            <div class="col-md-12">
                <div class="col-middle">
                    <div class="text-center text-center">
                        <h1 class="error-number">403</h1>
                        <h1>Access Forbidden</h1>
                        <p><h3>This page you are looking for does not exist. <!--| Visit <a href="http://twitter.com/yogaasaaputra" target="_BLANK"><i class="fa fa-twitter" aria-hidden="true"></i></a> For more detail.
                            <p>Or</p>--->
                            </p>
                        <a href="<?= base_url(); ?>">&larr; Back to page</h3></a>
                        <div class="mid_center">

                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= templates('vendors/jquery/dist/jquery.min.js') ?>"></script>
    <!--Bootstrap -->
    <script src="<?= templates('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- FastClick -->
    <script src="<?= templates('vendors/fastclick/lib/fastclick.js') ?>"></script>
    <!-- NProgress -->
    <script src="<?= templates('vendors/nprogress/nprogress.js') ?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?= templates('build/js/custom.min.js') ?>"></script>

</body>

</html>