<link type="text/css" rel="stylesheet"  href="<?php echo base_url(); ?>styles/v2.0/css/home.css?ver=<?php echo _VER_CACHED_ ?>" />
<script type="text/javascript" src="<?php echo base_url(); ?>styles/v2.0/js/home.min.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<link type="text/css" rel="stylesheet"  href="<?php echo base_url(); ?>styles/v2.0/css/media.css?ver=<?php echo _VER_CACHED_ ?>" />
<link type="text/css" rel="stylesheet"  href="<?php echo base_url(); ?>styles/v2.0/css/define.css?ver=<?php echo _VER_CACHED_ ?>" />

<!--<script src="<?php echo base_url(); ?>styles/v2.0/js/jquery.snow.js"></script>
<script>
$(document).ready( function(){
   $.fn.snow({ minSize: 5, maxSize: 50, newOn: 300, flakeColor: '#fff' });

});
</script>-->
 <?php $this->load->view('home/navbar'); ?>
<div class="navBar hidden-sm hidden-xs">
    <div class="navBarCenter">
        <div id="bs-example-navbar-collapse-1">
            <ul class="nav nav-tabs fontsize16" style="border-bottom:none;">
                <li role="presentation"> <a href="<?php echo base_url(); ?>"> TRANG CHỦ </a></li>
                <li role="presentation"> <a href="tuyendung"> CƠ HỘI NGHỀ NGHIỆP </a></li>
                <li role="presentation"> <a href="dich-vu-excel.html"><img style="width:40px;display: inline;margin-top: -30px;margin-right: -20px;" class="img-responsive" src="https://lakita.vn/styles/images/new-logo.png"> DỊCH VỤ EXCEL </a></li>
                <li role="presentation" class="hidden-sm hidden-xs"> <a href="<?php echo base_url(); ?>"> <img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo base_url(); ?>styles/v2.0/img/logo2.png" /> </a></li>
                <li role="presentation"> <a href="tro-thanh-giang-vien.html"> TRỞ THÀNH GIẢNG VIÊN </a></li>
                <li role="presentation"> <a href="<?php echo base_url(); ?>dang-nhap.html"> ĐĂNG KÝ </a></li>
                <li role="presentation"> <a href="<?php echo base_url(); ?>dang-nhap.html"> ĐĂNG NHẬP </a></li>
                <li role="presentation"> <a href="#footer_link"> LIÊN HỆ </a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</div>
<?php if (!$this->agent->is_mobile()) { ?>
    <hr class="hidden-xs">
<?php } ?>
<?php
//if ($this->agent->is_mobile()) {
//    $this->load->view('mobile/navbar');
//}
?>
<div class="row my-row-1">
    <p class="top-course"> <strong> CÁC KHÓA HỌC HÀNG ĐẦU CỦA LAKITA </strong></p>
    <p> Hãy chọn cho mình một khóa học, tôi tin bạn sẽ hài lòng </p>
</div>

<div class="allCourses hidden-sm hidden-xs">
    <ul class="nav nav-pills">
        <li class="active"><a>NỔI BẬT</a></li>
        <?php
        foreach ($group_courses as $key => $value) {
            ?>
            <li><a href="<?php echo base_url() . 'nhom-khoa-hoc/' . $value['slug'] . '-' . $value['id'] . '.html'; ?>" class="fontsize16"><?php echo $value['name']; ?> </a></li>
        <?php }
        ?>
    </ul>
</div>
<div class="listCourse">
    <div class="container">
        <?php $this->load->view('template/list_course'); ?>
        <div class="clearfix"></div>
        <div>
            <!--                <ul class="nextCourse hidden-sm hidden-xs">
                                <li class="active"></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>-->
            <a href="<?php echo base_url(); ?>khoa-hoc/xem-tat-ca.html" class="seeAll"> Xem tất cả </a>
        </div>
    </div>
</div>
<div class="TestimonialHighlight">
    <img class="img-responsive" alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo base_url(); ?>styles/v2.0/img/bg_cnhv.jpg" />
    <div class="row content">
        <div class="row">
            <div class="col-lg-offset-1 col-lg-1 col-md-offset-1 col-md-1 col-sm-offset-1 col-sm-1 hidden-xs">
                <img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo base_url(); ?>styles/v2.0/img/ngoacmo.png" class="img-responsive">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 content2">
                Mình cảm thấy phương thức giảng dạy của bài học rất chuẩn, sáng tạo và những ví dụ cũng rất gần với thực tế. Khóa học đã mang lại cho những người đi làm như mình cảm thấy rất thích thú với công việc hơn và càng kích thích sự tìm tòi , khám phá về MS. Còn về chất lượng dịch vụ thì trên cả tuyệt với.
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 hidden-xs content3">
                <img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo base_url(); ?>styles/v2.0/img/ngoacdong.png" class="img-responsive">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-offset-5 col-lg-2 col-md-offset-5 col-md-2 col-sm-offset-5 col-sm-2 col-xs-offset-4 col-xs-4 margintop10">
                <img alt="học excel lakita" src="<?php echo base_url(); ?>styles/v2.0/img/cmt1.png" class="img-responsive">
            </div>
        </div>
        <p class="name">DIEU NGUYEN (JENNY)</p>
        <p class="org">Revenue Analyst INTERCONTINENTAL DANANG SUN PENINSULA RESORT</p>
    </div>
</div>

<div class="Testimonials">
    <div class="testimonial"> <strong>  CẢM NHẬN HỌC VIÊN </strong> </div>
    <p class="testimonial2"> Những nhận xét của các học viên khi tham gia khóa học tại Lakita </p>
    <div class="container">
        <?php if (!$this->agent->is_mobile()) {
            ?>
            <div class="carousel slide" id="carousel-example-generic1" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                    $i = 0;
                    for ($i = 0; $i < ceil(count($rates) / 3); $i++) {
                        ?>
                        <li data-target="#carousel-example-generic1" data-slide-to="<?php echo $i; ?>" class="<?php echo ($i == 0) ? 'active' : ''; ?> hidden-sm hidden-xs hidden-1000"></li>
                    <?php } ?>
                </ol>

                <div class="carousel-inner" role="listbox">
                    <?php
                    $i = 0;
                    foreach ($rates as $key => $value) {
                        if ($i % 3 == 0) {
                            echo ' <div class="item ' . (($i == 0) ? 'active' : '') . '">
                             <div class="row">';
                        }
                        ?>
                        <div class="col-md-4">
                            <img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" class="img-responsive img" src="<?php echo 'https://lakita.vn/' . $value['thumbnail']; ?>" style="max-height: 230px;"/>
                            <p class="name">  <?php echo $value['name']; ?> </p>
                            <p class="org"> <?php echo $value['org']; ?> </p>
                            <p class="content"> <?php echo $value['description']; ?>
                            </p>
                        </div>
                        <?php
                        if ($i % 3 == 2)
                            echo '</div> </div>';
                        if ($i == count($rates) - 1 && $key % 3 != 2)
                            echo '</div></div>';
                        $i++;
                    }
                    ?>
                </div>
                <a href="#carousel-example-generic1" class="left carousel-control" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                <a href="#carousel-example-generic1" class="right carousel-control" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
            </div>
            <?php
        } else {
            $this->load->view('mobile/home/testimonial');
        }
        ?>
    </div>
</div>
</div>
<div class="aboutUs">
    <p class="aboutUs1"> VỀ CHÚNG TÔI </p>
    <p class="aboutUs2"> Tại sao bạn nên chọn chúng tôi? </p>
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="row my-row-2">
                <div class="col-md-3 col-sm-3 col-xs-2">
                    <div class="row">
                        <div class="col-md-offset-6 col-md-4 col-sm-offset-6 col-sm-4 col-xs-11 col-xs-offset-1">
                            <img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo base_url(); ?>styles/v2.0/img/icon1.png">
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-10">
                    <p class="aboutUs3">GIẢNG VIÊN GIÀU KINH NGHIỆM</p>
                    <p class="aboutUs4">Đội ngũ giảng viên của nhà trường có bằng cấp và kinh nghiệm quốc tế dày dặn, với trên 40% giáo viên có bằng Thạc sĩ trong lĩnh vực chuyên môn.</p>
                </div>
            </div>
            <div class="row my-row-2">
                <div class="col-md-3 col-sm-3 col-xs-2">
                    <div class="row">
                        <div class="col-md-offset-6 col-md-4 col-sm-offset-6 col-sm-4 col-xs-11 col-xs-offset-1">
                            <img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo base_url(); ?>styles/v2.0/img/icon2.png">
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-10">
                    <p class="aboutUs3">1077 VIDEO</p>
                    <p class="aboutUs4">Với hơn 1077 video về tất cả các môn học tập trung vào các nghề tin học văn phòng, kế toán, hành chính, nhân sự, công nghệ thông tin.</p>
                </div>
            </div>
            <div class="row my-row-2">
                <div class="col-md-3 col-sm-3 col-xs-2">
                    <div class="row">
                        <div class="col-md-offset-6 col-md-4 col-sm-offset-6 col-sm-4 col-xs-11 col-xs-offset-1">
                            <img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo base_url(); ?>styles/v2.0/img/icon3.png">
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-10">
                    <p class="aboutUs3">47 KHÓA HỌC THỰC TIỄN</p>
                    <p class="aboutUs4">Nội dung bài tập thực hành phong phú, thiết thực và cập nhật liên tục. Học hỏi những kỹ năng mới trực tuyến để làm chủ tương lai của bạn.</p>
                </div>
            </div>
            <div class="row my-row-2">
                <div class="col-md-3 col-sm-3 col-xs-2">
                    <div class="row">
                        <div class="col-md-offset-6 col-md-4 col-sm-offset-6 col-sm-4 col-xs-11 col-xs-offset-1">
                            <img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo base_url(); ?>styles/v2.0/img/icon4.png">
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-10">
                    <p class="aboutUs3">HỌC TRÊN MỌI THIẾT BỊ</p>
                    <p class="aboutUs4">Bạn có thể học mọi lúc, mọi nơi, trên thiết bị (điện thoại, máy tính bảng...) có kết nối internet.</p>
                </div>
            </div>
        </div>
        <?php if (!$this->agent->is_mobile()) {
            ?>
            <div class="col-md-6 positionRelative">
                <img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo base_url(); ?>styles/v2.0/img/aboutus.png" >
            </div>
        <?php } ?>
    </div>
</div>
<?php
// $this->load->view('home/popup_tang_sub');
?>




<script>
    $(document).ready(function () {
        if ($(window).width() < 1000) {
            $('#modal2_9').modal('hide');
        } else {
            $('#modal2_9').modal('show');
            var close = false;
            $(".close-btn").click(function () {
                close = true;
            });
            $('#popup_29').click(function () {
                $("#event-ladi")[0].click();
                
               /* $('#modal2_9').modal('hide');
                if (!close) {
                    $('#modal_event').modal('show');
                } */
            });
        }
    });
</script>

