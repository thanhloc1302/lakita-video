<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml" lang="vi"> 
    <?php $this->load->view('head') ?>
    <body style="overflow-x: hidden;">
        <div id="fb-root"></div>
        <script>
            window.fbMessengerPlugins = window.fbMessengerPlugins || {
                init: function () {
                    FB.init({
                        appId: '1678638095724206',
                        autoLogAppEvents: true,
                        xfbml: true,
                        version: 'v2.10'
                    });
                }, callable: []
            };
            window.fbAsyncInit = window.fbAsyncInit || function () {
                window.fbMessengerPlugins.callable.forEach(function (item) {
                    item();
                });
                window.fbMessengerPlugins.init();
            };
            setTimeout(function () {
                (function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) {
                        return;
                    }
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/en_US/sdk.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            }, 0);
        </script>

        <div
            class="fb-customerchat"
            page_id="872893369492994"
            ref="">
        </div>

<!--        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=315347858825221";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>-->
        <!--ghi thời gian học viên đang đăng nhâp-->
        <?php $this->load->view('student/watching_video') ?>
        <?php
        ?>
        <?php //$this->load->view('home/try_learn'); ?>
        <?php //$this->load->view('home/event2'); ?>
        <?php
        if (isset($content)) {
            $this->load->view($content);
        }
        $this->load->view('home/footer');
        ?>
        <?php $this->load->view('footer') ?>
    </body>
</html>