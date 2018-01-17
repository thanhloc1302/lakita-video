<!-- trang chi tiết khóa học (mua khóa học) view/course/detail/index-->

<!--    <script src="<?php echo base_url(); ?>styles/v2.0/js/home.js"></script>-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/course_detail.css?ver=<?php echo _VER_CACHED_ ?>" />
<script src="<?php echo base_url(); ?>styles/v2.0/js/course_detail.js?ver=<?php echo _VER_CACHED_ ?>"></script>


<div class="header">
    <?php
    if ($this->agent->is_mobile()) {
        $this->load->view('mobile/navbar');
    } else {
        $this->load->view('home/navbar');
    }
    ?>
    <div class="row">
        <div class="col-md-6  my-row-1">
            <p class="group_course"> <?php echo $title; ?> </p>
        </div>
        <div class="col-md-6 searchBox">
            <form action="<?php echo base_url(); ?>tim-kiem.html" method="post" id="searchForm">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <label for="exampleInputEmail1" class="sr-only">Search</label>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="text" class="form-control" id="key_word" name="key_word" value="Tìm các khóa học bạn quan tâm...">
                        <img alt="học excel, hoc excel, học excel cơ bản, tự học excel" title="học excel, hoc excel, học excel cơ bản, tự học excel" class="searchIcon" src="<?php echo base_url(); ?>styles/v2.0/img/icon_seach.png" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="course-summary paddingbottom30">
    <div class="container">
        <div class="dir"> <img alt="học excel, hoc excel, học excel cơ bản, tự học excel" title="học excel, hoc excel, học excel cơ bản, tự học excel" src="<?php echo base_url(); ?>styles/v2.0/img/course-detail/excel.png">
            <a href="https://lakita.vn"> Trang chủ </a> / 
            <a href="<?php echo base_url(); ?>tin-tuc.html"> Tin tức </a> /
            <a href="<?php echo base_url() . $page; ?>.html"> <?php echo $title ?> </a> 
        </div>
    </div>
</div>

<div class=" course-summary outline">
    <div>
        <div class=" text-justify " style="font-family: Roboto; font-size: 16px; padding: 20px !important">
            <div class="col-md-8 " style="background-color: #FFF;">
                <h1 id="title"><strong><?php echo $title; ?></strong></h1>
                <p><?php echo date('H:i d/m/Y', $create_date); ?></p>
                <p><strong><span style="background-color:#31B051 ;color: #FFF">&nbsp;&nbsp;LAKITA&nbsp;&nbsp;</span>
                    <?php echo $description; ?></strong>
                </p>
                <div id="content"><?php echo $content1; ?></div>
            </div>
            <div class="col-md-4 " style="background-color: #FFF; border-color: #e1e1e1; border: 2px">
                <?php $this->load->view('news/interesting') ?>
            </div>
            <div class="clearfix" style="background-color: #FFF">
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 50px">
        <div class="col-md-6 col-md-push-3">
            <div id="fb-root"></div> 
            <div  class="fb-comments" data-href="<?php echo base_url() . $page . '.html' ?>" data-width="100%" data-numposts="7" data-order-by="reverse_time"></div>
        </div>
    </div>
</div>

<script>
    $(' #content img').addClass('img-responsive');
    </script>