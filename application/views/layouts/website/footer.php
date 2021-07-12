    <!--<footer>

    <div class="footer-bottom-area">
        <div class="container">
            <div class="footer-border">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-10 col-lg-9 ">
                        <div class="footer-copy-right">
                            <p>
                                
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> 
                               
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3">
                        <div class="footer-social f-right">
                            <a href="https://id-id.facebook.com/PDAMTirtaPatriotKotaBekasi"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/TirtaPatriot"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/tirtapatriot"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</footer>-->
<script type="text/javascript">
(function($) {
  $('.toggle-display').on('click', function() {
    var $target = $($(this).attr('data-target'));
    $target.show();
    $target.animate({
      left: 0
    });
  });
  $('.toggle-hide').on('click', function() {
    var $target = $($(this).attr('data-target'));
    $target.animate({
      left: '100%'
    },function() {
      $target.hide();
    });
  });
})(jQuery);</script>