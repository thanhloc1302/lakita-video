<link type="text/css" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/login_page.css?ver=<?php echo _VER_CACHED_ ?>" />
<link type="text/css" rel="stylesheet"  href="<?php echo base_url(); ?>styles/v2.0/css/home.css?ver=<?php echo _VER_CACHED_ ?>" />
<link type="text/css" rel="stylesheet"  href="<?php echo base_url(); ?>styles/v2.0/css/media.css?ver=<?php echo _VER_CACHED_ ?>" />
<link type="text/css" rel="stylesheet"  href="<?php echo base_url(); ?>styles/v2.0/css/define.css?ver=<?php echo _VER_CACHED_ ?>" />
<link type="text/css" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/general.css?ver=<?php echo _VER_CACHED_ ?>" />
<div class="header row">
    <div class="col-md-6 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
        <a href="<?php echo base_url(); ?>?link=321">
            <img class="logo" style="margin-bottom: 20px;" src="https://crm2.lakita.vn/style/img/logo5.png">
        </a>
    </div>
    <div class="col-md-5 text-right" style="padding-top: 60px; color: #fff; font-size: 16px; padding-right: 35px;">
        Hotline: 1900 636 195 - 024 7306 2468 - 0971 571 532
    </div>
</div>
<div class="row body">
    <div class="col-md-3 col-md-offset-3 hidden-sm hidden-xs padding0">
        <img style="max-height: 150px" class="img img-responsive" src="https://lakita.vn/styles/v2.0/img/gift.png">
    </div>
    <div class="col-md-5 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" >
        <h2 style="font-family: Roboto;"> Tải tài liệu </h2>
        <a target="_blank" href="<?php echo current_url(); ?>?id=<?php echo $id; ?>" class="btn btn-danger" style="font-family: Roboto; color: #fff"> 
            Mời bạn click vào đây để tải tài liệu 
        </a>
        <br> 
<!--        <a href="<?php echo base_url(); ?>?link=297" class="btn btn-success" style="margin-top: 20px; font-family: Roboto;"> 
            Mời bạn tham khảo các khóa học ưu đãi của Lakita tại đây </a>-->
    </div>

</div>
<div class="listCourse">
    <div class="container">
        <div class="row body" style="background-color: #fff">
            <h2 style="margin-bottom: 50px;"> Mời bạn tham khảo các khóa học ưu đãi trên 50% của Lakita tại đây </h2>
            <?php $this->load->view('template/list_course_2'); ?>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>styles/v2.0/js/login_page.js?ver=<?php echo _VER_CACHED_ ?>"></script>
