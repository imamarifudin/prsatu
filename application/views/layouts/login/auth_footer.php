<!-- Bootstrap core JavaScript-->
<script src="<?= templates('vendor/jquery/jquery.min.js', 'login') ?>"></script>
<script src="<?= templates('vendor/bootstrap/js/bootstrap.bundle.min.js', 'login') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= templates('vendor/jquery-easing/jquery.easing.min.js', 'login') ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= templates('js/sb-admin-2.min.js', 'login') ?>"></script>
<script>
    $(document).ready(function() {
        $('#checkbox').click(function () {
            if ($(this).is(':checked')) {
                $('#password').attr('type','text');
            } else {
                $('#password').attr('type','password');
            }
        })
    })
</script>
</body>

</html>