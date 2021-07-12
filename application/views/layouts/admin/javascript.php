    <!-- jQuery -->
    
    <!--Bootstrap -->
    <script src="<?= templates('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- FastClick -->
    <script src="<?= templates('vendors/fastclick/lib/fastclick.js') ?>"></script>
    <!-- NProgress -->
    <script src="<?= templates('vendors/nprogress/nprogress.js') ?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?= templates('build/js/custom.min.js') ?>"></script>

    <script>
        $('.custom-file-input').on('change', function() {
                    let fileName = $(this).val().split('\\').pop();
                    $(this).next('.custom-file-label').addClass("selected").html(fileName);
                });
    </script>
