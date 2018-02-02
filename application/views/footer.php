<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!$this->agent->is_mobile()) {
    ?>
    <!--Start of Tawk.to Script-->
<!--    <script type="text/javascript">
        var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
        (function () {
            var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/57fb6f373d527557044541f9/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>-->
    <!--End of Tawk.to Script-->
    <?php
} else {
    ?>
    <button class="btn btn-success scrollup" style="position: fixed; bottom: 5px; right: 16px; background-image: none;padding: 6px 13px;"> <i class="fa fa-arrow-circle-up" aria-hidden="true" style="font-size: 2em !important;"></i> </button>
    <script type="text/javascript">
        $(document).ready(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('.scrollup').fadeIn();
                } else {
                    $('.scrollup').fadeOut();
                }
            });

            $('.scrollup').click(function () {
                $("html, body").animate({scrollTop: 0}, 600);
                return false;
            });

        });
    </script>
<?php } ?>

<script>
    if ($(window).width() < 1024) {
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            $("#myModal3").html("");
        }
    }
    $(document).ready(function () {
        $.ajaxSetup({cache: true});
        $.getScript('//connect.facebook.net/vi_VN/sdk.js', function () {
            FB.init({
                appId: '315347858825221',
                version: 'v2.7'
            });
            /* $('#loginbutton,#feedbutton').removeAttr('disabled');
             FB.getLoginStatus(updateStatusCallback); */
        });
    });
</script>
<script src="https://use.fontawesome.com/0b216c5f11.js"></script>
<script src="<?php echo base_url(); ?>plugin/boostrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="//images.dmca.com/Badges/DMCABadgeHelper.min.js"></script>
<!--Import  owl-carousel-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css">  
<style>
    owl-prev, .owl-next {
        background: #d6d6d600;;
        position: absolute;
        top: 40%;
        margin-top: -1px;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>


<script>
    $(document).ready(function () {
        $(".owl-carousel").owlCarousel({
            loop: true,
            center: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            nav: true,

            navText: ["<img src='styles/v2.0/img/navbar/back.png'>", "<img src='styles/v2.0/img/navbar/next.png'>"],
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 1,
                    nav: false
                },
                1000: {
                    items: 1,
                    nav: true,
                    loop: true
                }
            }
        });

        $('.play').on('click', function () {
            owl.trigger('play.owl.autoplay', [5000]);
        });
        $('.stop').on('click', function () {
            owl.trigger('stop.owl.autoplay');
        });

        function openNav() {
            $('#mySidenav').css('width', '100%');
        }

        function closeNav() {
            $('#mySidenav').css('width', '0');
        }

        var e = document.getElementById('btn-menu-silde');
        if (e != null) {
            e.addEventListener('click', function () {
                if (this.className == 'on') {
                    this.classList.remove('on');
                    closeNav();

                } else {
                    this.classList.add('on');
                    openNav();

                }
            });
        }
    });
</script>
</body>


