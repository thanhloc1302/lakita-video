<?php ?>
<!--    <script src="<?php echo base_url(); ?>styles/v2.0/js/home.js"></script>-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/view_all.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>styles/v2.0/js/view_all.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>styles/v2.0/js/login.min.js"></script>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<?php if (!$this->agent->is_mobile()) { ?>
    <div class="header">
        <?php $this->load->view('home/navbar'); ?>
        <div class="row">
            <div class="col-md-6  my-row-1">
                <h1> <strong> KHẢO SÁT THÔNG TIN KHÁCH HÀNG – NÂNG CẤP HỆ THỐNG </strong></h1>
            </div>
            <div class="col-md-6 searchBox">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <label for="exampleInputEmail1" class="sr-only">Search</label>
                        <form action="<?php echo base_url(); ?>tim-kiem.html" method="post" id="searchForm">
                            <input type="text" class="form-control" id="key_word" name="key_word" value="Tìm các khóa học bạn quan tâm...">
                            <img alt="học excel cơ bản, excel cho kế toán, tự học excel" class="searchIcon"src="<?php echo base_url(); ?>styles/v2.0/img/icon_seach.png" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <?php $this->load->view('mobile/navbar'); ?>
    <div class="container" style="margin-top: -22px; overflow: hidden">
        <div class="row searchBox" style="background: url(http://lakita.com.vn/styles/v2.0/img/banner-1.jpg); padding-top: 9px; height: 70px">
            <div class="col-md-12">
                <label for="exampleInputEmail1" class="sr-only">Search</label>
                <form action="<?php echo base_url(); ?>tim-kiem.html" method="post" id="searchForm">
                    <input type="text" class="form-control" id="key_word" name="key_word" value="Tìm các khóa học bạn quan tâm...">
                    <img alt="học excel cơ bản, excel cho kế toán, tự học excel" class="searchIcon"src="<?php echo base_url(); ?>styles/v2.0/img/icon_seach.png" style="width:25px; top:10px"/>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<div class="container text-justify" style="font-family: Roboto; font-size: 16px">
    <div class="row">
        <div class="col-md-6 col-md-push-3">
            <h3> Bạn <?php echo $this->session->userdata('user_name'); ?> thân mến </h3>
            <p>Hệ thống đào tào trực tuyến Lakita.vn rất cảm ơn bạn đã tin tưởng và học tập trên hệ thống trong thời gian vừa qua.  </p>
            <p>Lakita rất mong muốn ngày càng có thể phục vụ các bạn nhiều hơn nữa, tốt hơn nữa vì vậy Lakita xin mời bạn <?php echo $this->session->userdata('user_name'); ?> thực hiện giúp Lakita Mẫu khảo sát thông tin dưới đây. Mọi câu trả lời cũng như ý kiến đóng góp của bạn sẽ góp phần giúp Lakita cải thiện những phần còn thiếu sót cũng như tiếp tục phát huy những điểm mạnh, điểm tốt của Lakita.</p> 
            <a href="https://goo.gl/forms/gpwVO3iM3jt434Lz1">Click vào đây</a>
            <p>Mong sớm nhận được ý kiến của bạn. Cảm ơn bạn.</p>
            <p>Chúc bạn có thời gian học tập thú vị và hiệu quả trên hệ thống.</p>
            <p class="text-right"> Trân trọng </p>
            <p class="text-right"> <strong> Lakita team. </strong>  </p>
            <img src="<?php echo base_url(); ?>styles/v2.0/img/news/news2.png" class="img-responsive"/>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6 col-md-push-3">
            <div id="fb-root"></div> 
            <div  class="fb-comments" data-href="https://lakita.vn/tri-an-hoc-vien-006.html" data-width="100%" data-numposts="7" data-order-by="reverse_time"></div>
        </div>
    </div>
</div>
</div>
</div>
</div>

