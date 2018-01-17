<?php $this->load->view('mobile/navbar');
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/course_detail_mobi.css?ver=<?php echo _VER_CACHED_ ?>" />
<div class="container" style="overflow: hidden;">
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="js-video widescreen">
                <?php
                $value = $id_video_demo;
//Detect special conditions devices
                $iPod = stripos($_SERVER['HTTP_USER_AGENT'], "iPod");
                $iPhone = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
                $iPad = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
                $Android = stripos($_SERVER['HTTP_USER_AGENT'], "Android");
                // $webOS = stripos($_SERVER['HTTP_USER_AGENT'], "webOS");
//do something with this information
                if ($iPod || $iPhone || $iPad) {
                    ?>
                    <input type="hidden" id="lakitaid" value="<?php echo md5(time()) . '$&((_GNSDADFHGD@!$^&%#' . time() . ')*&^%$@' . time() . '#' . $value . '#' . time() . '_+1357$*^())!%*$$&' . md5('lakita.vn') . '+135+1357$*^())!%*$$7$*^())!%*$$+1+1357$*^())!%*$$357$*^())!%*$$'; ?>" /><div id="mediaspace"></div>
                    <?php
                } else if ($Android && $value != 0) {
                    ?>
                    <div class="text-center">
                        <a href="
                        <?php
                        $primary_video = $this->lib_mod->detail('learn', array('id' => $value), '');
                        echo "rtsp://lakita.vn:1935/vod/mp4://" . str_replace('data/source/video_source/', '', $primary_video[0]['video_file']);
                        ?>
                           ">
                            <img src="<?php echo base_url(); ?>styles/v2.0/img/mobi/player.png" style="max-width: 100%"/>
                        </a>
                    </div>
                    <?php
                } else {
                    ?>
                    <input type="hidden" id="lakitaid" value="<?php echo md5(time()) . '$&((_GNSDADFHGD@!$^&%#' . time() . ')*&^%$@' . time() . '#' . $value . '#' . time() . '_+1357$*^())!%*$$&' . md5('lakita.vn') . '+135+1357$*^())!%*$$7$*^())!%*$$+1+1357$*^())!%*$$357$*^())!%*$$'; ?>" /><div id="mediaspace"></div>
                    <?php
                }
                ?>
                <script type="text/javascript" src="<?php echo base_url(); ?>plugin/jwplayer/jwplayer.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>plugin/jwplayer/jwplayer.html5.js"></script>
                <script type="text/javascript">jwplayer.key = "N8zhkmYvvRwOhz4aTGkySoEri4x+9pQwR7GHIQ=="</script>
                <script src="<?php echo base_url(); ?>styles/v2.0/js/lktlayer.min.js?ver=<?php echo _VER_CACHED_ ?>"></script>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 course_detail_mobile">
            <p class="lakita course_title"> <?php echo $curr_courses[0]['name']; ?> </p>
            <p class="course_price"> Giá : <strong style="font-size: 19px" class="price">          
                    <?php
                    $temp = $this->session->tempdata('priceVouched');
                    if ($curr_courses[0]['time_start_sale'] < time() && $curr_courses[0]['time_end_sale'] > time() & $curr_courses[0]['time_start_sale'] != 0 & $curr_courses[0]['time_start_sale'] != 0) {
                        $price_root = isset($temp) ? $temp : $curr_courses[0]['price_sale'];
                    } else {
                        $price_root = isset($temp) ? $temp : $curr_courses[0]['price_root2'];
                    }
                    echo number_format(str_replace('.', '', $price_root));
                    ?> VNĐ </strong></p>
            <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
                <ul class="nav nav-tabs" id="myTabs" role="tablist" style="width: 130%; margin-left: -6%;">
                    <li role="presentation" class="active" style="margin-left: 6%;"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">Mua khóa học</a></li>
                    <li role="presentation" class=""><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Thông tin khóa học</a></li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active in" role="tabpanel" id="home" aria-labelledby="home-tab">
                        <div class="voucher_mobile voucher margintop20">
                            <p> Nhập mã voucher giảm giá (nếu có) </p>
                            <div class="voucher-input" >
                                <input type="text" name="voucher" placeholder="Mã voucher" id="coupon"/> 
                                <span class="go btn btn-default" id="voucher1"> &nbsp; XÁC NHẬN  </span>
                            </div>
                        </div>
                        <div class="course_purchase"> 
                            <a class="btn btn-success btn-purchase" href="<?php echo base_url() . $curr_courses[0]['slug'] . '-3' . $curr_courses[0]['id']; ?>.html">  MUA KHÓA HỌC </a>       
                        </div>
                        <p class="margintop20"> <strong> Được giao hàng bởi </strong> </p>
                        <div class="row">
                            <div class="col-xs-6">
                                <img alt="học excel lakita" src="<?php echo base_url(); ?>styles/v2.0/img/course-detail/viettel-post.png" class="img-responsive"/>
                            </div>
                            <div class="col-xs-6">
                                <img alt="học excel lakita" src="<?php echo base_url(); ?>styles/v2.0/img/course-detail/satisfied.png" class="img-responsive" />
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" role="tabpanel" id="profile" aria-labelledby="profile-tab">
                        <div class="row course-detail paddingtop15">
                            <div class="col-xs-4">
                                Thời gian 
                            </div>
                            <div class="col-xs-8">
                                <i class="fa fa-calendar lakita" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;
                                <strong> <?php echo date('d/m/Y', $curr_courses[0]['time_release']); ?>  </strong>
                            </div>
                        </div>
                        <div class="row course-detail">
                            <div class="col-xs-4">
                                Giảng viên 
                            </div>
                            <div class="col-xs-8">
                                <i class="fa fa-user lakita" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;
                                <strong> <?php echo $speaker_detail[0]['name']; ?> </strong>
                            </div>
                        </div>
                        <div class="row course-detail">
                            <div class="col-xs-4">
                                Số bài học 
                            </div>
                            <div class="col-xs-8">
                                <i class="fa fa-list-alt lakita" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;
                                <strong> 
                                    <?php
                                    /* =============================================tổng số bài học (càn sửa lại sau)============================================= */
                                    $total_lesson = 0;
                                    foreach ($chapter as $key => $value) {
                                        $learn = $this->lib_mod->load_all('learn', '', array('status' => 1, 'chapter_id' => $value['id']), '', '', array('sort' => 'asc'));
                                        if (isset($learn) && count($learn)) {
                                            $total_lesson += count($learn);
                                        }
                                    }
                                    echo $total_lesson;
                                    /* =============================================tổng số bài học (càn sửa lại sau - hết)============================================= */
                                    ?> bài học </strong>
                            </div>
                        </div>
                        <div class="row course-detail">
                            <div class="col-xs-4">
                                Giải đáp 
                            </div>
                            <div class="col-xs-8">
                                <i class="fa fa-clock-o lakita" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;
                                <strong> trong 68 giờ </strong>
                            </div>
                        </div>
                        <div class="row course-detail">
                            <div class="col-xs-4">
                                Bài viết 
                            </div>
                            <div class="col-xs-8">
                                <i class="fa fa-pencil-square-o lakita" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;
                                <strong> 50 bài viết chuyên môn/năm </strong>
                            </div>
                        </div>
                        <div class="course_purchase"> 
                            <a class="btn btn-success btn-purchase" href="<?php echo base_url() . $curr_courses[0]['slug'] . '-3' . $curr_courses[0]['id']; ?>.html">  MUA KHÓA HỌC </a>       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row margintop20">
        <div class="col-xs-12 hidden-sm hidden-md hidden-lg course_outline_mobile">
            <p class="course_detail_1"> CHI TIẾT KHÓA HỌC </p>
            <?php foreach ($chapter as $key => $value) { ?>
                <p class="category lakita"> <strong> <i class="fa fa-check-square-o lakita" aria-hidden="true"></i> <?php echo $value['name']; ?> </strong></p>
                <hr>
                <ul class="course-outline">
                    <?php foreach ($all_learn[$key] as $key2 => $lvalue) { ?>
                        <li style="height: 38px;">
                            <input type="checkbox" />
                            <?php echo 'Bài ' . $lvalue['sort'] . ': ' . $lvalue['name']; ?>
                            <?php if ($lvalue['trial_learn'] == 1) { ?>
                                <a class="btn btn-success" href="<?php echo base_url() . $lvalue['slug'] . '-5' . $lvalue['id']; ?>.html" target="_blank"> Học thử </a>
                            <?php } ?>
                        </li>
                        <hr>
                        <?php
                    }
                    ?>
                </ul>
            <?php } ?>
            <p class="show_more"> Xem đầy đủ <i class="fa fa-sort-amount-desc" aria-hidden="true"></i></p> 
        </div>
    </div>
    <div class="row course_detail_2">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
                <ul class="nav nav-tabs" id="myTabs2" role="tablist" style="width: 130%; margin-left: -6%;">
                    <li role="presentation" class="active" style="margin-left: 6%;"><a href="#about-course" id="about-course-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">Về khóa học</a></li>
                    <li role="presentation" class=""><a href="#teacher" role="tab" id="teacher-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Giảng viên</a></li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active in" role="tabpanel" id="about-course" aria-labelledby="home-tab">
                        <?php echo $curr_courses[0]['content']; ?>
                    </div>
                    <div class="tab-pane fade" role="tabpanel" id="teacher" aria-labelledby="profile-tab">
                        <p class="lakita margintop45 title fontRoboto" > <i class="fa fa-toggle-on" aria-hidden="true"></i> Giảng viên </p>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="text-center"> <img src="<?php echo 'https://lakita.vn/' . $speaker_detail[0]['image']; ?>" class="img-responsive img-circle" style="display:inline-block"/>  </div>
                                <p class="fontRobotoBold margintop20 textuppercase text-center"> <?php echo $speaker_detail[0]['name']; ?> </p>
                                <div class="row">
                                    <p style="text-align: center;">
                                        <i class="fa fa-envelope lakita" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;&nbsp;<span> <?php echo $speaker_detail[0]['name']; ?> </span>
                                    </p>
                                    <p style="text-align: center;">
                                        <i class="fa fa-facebook lakita" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;&nbsp;<span> <?php echo $speaker_detail[0]['name']; ?> </span>
                                    </p>
                                    <p style="text-align: center;">
                                        <i class="fa fa-twitter lakita" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;&nbsp;<span> <?php echo $speaker_detail[0]['name']; ?> </span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <?php echo $speaker_detail[0]['description']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-5 col-sm-offset-1 col-md-6 hidden-xs course_outline_mobile">
            <p class="course_detail_1"> CHI TIẾT KHÓA HỌC </p>
            <hr class="hidden-xs"/>
            <?php foreach ($chapter as $key => $value) { ?>
                <p class="category lakita"> <strong> <i class="fa fa-check-square-o lakita" aria-hidden="true"></i> <?php echo $value['name']; ?> </strong></p>
                <hr>
                <ul class="course-outline">
                    <?php foreach ($all_learn[$key] as $key2 => $lvalue) { ?>
                        <li>
                            <input type="checkbox" />
                            <?php echo 'Bài ' . $lvalue['sort'] . ': ' . $lvalue['name']; ?>
                            <?php if ($lvalue['trial_learn'] == 1) { ?>
                                <a class="btn btn-success" href="<?php echo base_url() . $lvalue['slug'] . '-5' . $lvalue['id']; ?>.html" target="_blank"> Học thử </a>
                            <?php } ?>
                        </li>
                        <hr>
                        <?php
                    }
                    ?>
                </ul>
            <?php } ?>
            <p class="show_more"> Xem đầy đủ <i class="fa fa-sort-amount-desc" aria-hidden="true"></i></p> 
        </div>
    </div>
    <link type="text/css" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/home.css?ver=<?php echo _VER_CACHED_ ?>" />
    <div class="Testimonials">
        <div class="testimonial"> <strong>  CẢM NHẬN HỌC VIÊN </strong> </div>
        <p class="testimonial2"> Những nhận xét của các học viên khi tham gia khóa học lại Lakita </p>
        <div class="container">
            <?php $this->load->view('mobile/home/testimonial'); ?>
        </div>
    </div>
</div>

<script>
                    var show_more = true;
                    $(".show_more").click(function () {
                        if (show_more) {
                            $(".course_outline_mobile").css({"height": "inherit"});
                            $(this).html('Thu gọn <i class="fa fa-arrow-up" aria-hidden="true"></i>');
                            show_more = false;
                        } else {
                            $(".course_outline_mobile").css({"height": "500px"});
                            $('html,body').animate({
                                scrollTop: $(this).offset().top - 700
                            }, 1000);
                            $(this).html('Xem đầy đủ <i class="fa fa-sort-amount-desc" aria-hidden="true"></i>');
                            show_more = true;
                        }
                        //$(this)();
                    });
</script>
