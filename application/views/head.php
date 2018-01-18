<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- Google Tag Manager -->
<!--    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({'gtm.start':
                        new Date().getTime(), event: 'gtm.js'});
            var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KRX79Q5');</script>-->
    <!-- End Google Tag Manager -->
    <base href="<?php echo base_url(); ?>" />   
    <meta http-equiv="content-language" content="vi" />
    <link rel="alternate" href="https://lakita.vn" hreflang="vi-vn" />
    <title><?php echo $title; ?></title>  

    <meta property="fb:admins" content="100001432238036"/>
    <meta property="fb:app_id" content="315347858825221" />
    <meta property="og:type"   content="website" /> 
    <meta property="og:url" content="<?php echo current_url();?>" />
    <meta property="og:title" content="<?php echo $title; ?>" />
    <?php if (isset($image)) { ?>
        <meta property="og:image" content="<?php if (isset($image)) echo $image; ?>"/>
    <?php }else { ?>
        <meta property="og:image" content="<?php echo 'https://lakita.vn/data/logo/share.jpg'; ?>"/>
    <?php } ?>
    <meta property="og:description" content="Hệ thống đào tạo trực tuyến lakita – Cùng bạn vươn xa Học Online qua Video bài giảng - Học Online thỏa thích mọi lúc, mọi nơi - Học trên mọi thiết bị - Học với giảng viên, chuyên gia hàng đầu trong lĩnh vực - Hóa đơn chứng từ - Làm chủ hóa đơn chứng từ"
    <meta name="keywords" content="học excel, hoc excel, tự học excel, học excel cơ bản, học excel co ban, excel kế toán, excel ke toan, làm chủ hóa đơn chứng từ, lam chu hoa don chung tu, <?php if (isset($keywords)) echo $keywords; ?>" />
    <meta name="robots" content="noodp" />
    <meta name="author" content="<?php echo base_url(); ?>" />
    <meta name="robots" content="index,follow"/>
    <meta name="revisit-after" content="3 days"/>
    <meta http-equiv="audience" content="General"/>
    <meta name="resource-type" content="Document"/>
    <meta name="distribution" content="Global"/>
    <meta name="rating" content="General"/>
    <meta name="google-site-verification" content="sMPDm2UwHcFhdiIMKCrV_QFe7rwUT7P0-gkEZkr-k50" />
    <meta itemprop="name" content="lakita.vn" /> 
    <meta itemprop="description" content="Chuyên cung cấp các khóa đào tạo trực tuyến về tin học văn phòng và công nghệ thông tin" /> 
    <script>
        Notification.requestPermission(function (p) {
            if (p === "denied")
            {
                /*                alert("Bạn đã không cho phép thông báo trên trình duyệt.");*/
            }
        });

    </script>
    <script type="text/javascript">
        console.log("%cLưu ý: Đây là chế độ dành cho nhà phát triển. Bạn không nên truy cập vào phần này. Xin cảm ơn!", "background: red; color: yellow; font-size: 40px;font-weight: bold;");
    </script>
    <link rel="shortcut icon" href="<?php echo 'https://lakita.vn/data/source/setting/logo-icon.ico'; ?>" type="image/x-icon" />

    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>styles/v2.0/css/reset.css?ver=<?php echo _VER_CACHED_ ?>" />

<!--    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>styles/v2.0/css/bootstrap.min.css" />-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/css/bootstrap.min.css" />

<!--    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>styles/v2.0/css/bootstrap-theme.min.css" />-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/css/bootstrap-theme.min.css" />

    <link type="text/css" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/general.css?ver=<?php echo _VER_CACHED_ ?>" />
<!--    <script type="text/javascript" src="<?php echo base_url(); ?>styles/v2.0/js/fontawesome.js"></script>-->
    <link href="<?php echo base_url(); ?>plugin/boostrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!-- Facebook Pixel Code -->
    <script>
        !function (f, b, e, v, n, t, s)
        {
            if (f.fbq)
                return;
            n = f.fbq = function () {
                n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq)
                f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1645549219061949');
        fbq('track', 'PageView');
    </script>
    <noscript>
<img height="1" width="1" style="display:none"
     src="https://www.facebook.com/tr?id=1645549219061949&ev=PageView&noscript=1"
     />
</noscript>
<!-- End Facebook Pixel Code -->


<?php include_once("plugin/analyticstracking.php") ?>
<!--    <script type="text/javascript" src="<?php echo base_url(); ?>styles/v2.0/js/jquery-3.1.0.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<!--    <script type="text/javascript" src="<?php echo base_url(); ?>styles/v2.0/js/bootstrap.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

<link type="text/css" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/media.css?ver=<?php echo _VER_CACHED_ ?>" /> 
<link type="text/css" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/define.css?ver=<?php echo _VER_CACHED_ ?>" />
<link type="text/css" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/navbar_fix.css?ver=<?php echo _VER_CACHED_ ?>" />
</head>