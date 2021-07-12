<!doctype html>
<html class="no-js" lang="zxx">

<?php include 'head.php' ?>

<body>


    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="<?= templates('img/', 'website') ?>" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    <?php include 'header.php' ?>

    <main>

        <?= $content ?>
       


    <?php include 'javascript.php' ?>
    <?php
    if (isset($js)) {
        echo $js;
    }
    ?>


</body>

</html>