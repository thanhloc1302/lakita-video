<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/style.bootstrap12.lakita.css?ver=<?php echo _VER_CACHED_ ?>" />
<?php if (!$this->agent->is_mobile()) { ?>
    <header>
        <div class="row header-row-1">
            <div class="col-md-5">
                <a href="khoa-hoc-cua-toi.html" class="back"><i class="fa fa-reply" aria-hidden="true"></i> Trở lại  </a>
            </div>
            <div class="col-md-6">

            </div>
            <div class="col-md-1" id="ring">
                <i class="fa fa-bell" aria-hidden="true"></i>
            </div>
        </div>
        <div class="row header-row-2">
            <h3> <?php echo $course_name; ?></h3>
            <div class="row">
                <div class="col-md-3">
                    <p id="head-text1">Tổng số <?php echo $total_video; ?> bài học</p>
                    <p id="head-text1">Bạn đã hoàn thành:</p>
                </div>
                <div class="col-md-6">
                    <p id="head-text2"><i class="fa fa-map-marker" aria-hidden="true"></i> 0% </p>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar"
                             aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                            0%
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php } else { ?>
    <?php $this->load->view('mobile/navbar'); ?>
<?php } ?>
<div class="row" <?php if ($this->agent->is_mobile()) echo 'style="margin-top: -20px;"'; ?>>
    <div class="col-md-8 col-xs-12 col-sm-12">
        <div class="row gr1-row-1">
            <div class="st-pusher" id="content">
                <div class="st-content">
                    <div class="st-content-inner padding-none">
                        <div class="container-fluid">
                            <div class="js-video widescreen">
                                <?php
                                if (!empty($curr_learn[0]['video_file'])) {
                                    $value = $curr_learn[0]['id'];
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
                                    } else if ($Android) {
                                        ?>

                                        <a href="
                                        <?php
                                        $primary_video = $this->lib_mod->detail('learn', array('id' => $value), '');
                                        echo "rtsp://lakita.vn:1935/vod/mp4://" . str_replace('data/source/video_source/', '', $primary_video[0]['video_file']);
                                        ?>
                                           ">
                                            <img src="<?php echo base_url(); ?>styles/v2.0/img/mobi/player.png" class="img-responsive"/>
                                        </a>
                                        <?php
                                    } else {
                                        ?>
                                        <input type="hidden" id="lakitaid" value="<?php echo md5(time()) . '$&((_GNSDADFHGD@!$^&%#' . time() . ')*&^%$@' . time() . '#' . $value . '#' . time() . '_+1357$*^())!%*$$&' . md5('lakita.vn') . '+135+1357$*^())!%*$$7$*^())!%*$$+1+1357$*^())!%*$$357$*^())!%*$$'; ?>" /><div id="mediaspace"></div>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <input type="hidden" id="lakitaid" value="<?php echo md5(time()) . '$&((_GNSDADFHGD@!$^&%#' . time() . ')*&^%$@' . time() . '#' . 612 . '#' . time() . '_+1357$*^())!%*$$&' . md5('lakita.vn') . '+135+1357$*^())!%*$$7$*^())!%*$$+1+1357$*^())!%*$$357$*^())!%*$$'; ?>" /><div id="mediaspace"></div>
                                <?php } ?>
<!--                                <script type="text/javascript" src="<?php echo base_url(); ?>plugin/jwplayer/jwplayer.js"></script>
                                <script type="text/javascript" src="<?php echo base_url(); ?>plugin/jwplayer/jwplayer.html5.js"></script>
                                <script type="text/javascript">jwplayer.key = "N8zhkmYvvRwOhz4aTGkySoEri4x+9pQwR7GHIQ==";</script>-->
                                         <script type="text/javascript" src="https://content.jwplatform.com/libraries/BhGRfCt5.js"></script>
                                <?php $this->session->set_tempdata('is_playable', $curr_id, 3600 * 24); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (!$this->agent->is_mobile()) { ?>
            <div class="row gr1-row-2">
                <div class="col-md-5 gr1-col-1">
                    <p><i class="fa fa-toggle-on" aria-hidden="true"></i><strong> Giảng viên</strong></p>
                </div>
                <div class="col-md-3 gr1-col-2">
                    <img src="<?php echo base_url(); ?>styles/v2.0/dungtt/img/bootstrap/12/gr2-img2.png"> &nbsp;&nbsp;
                    <a style="cursor: pointer">
                        <i class="fa fa-heart-o red" aria-hidden="true"></i>  Tôi thích khóa học này
                    </a> &nbsp;&nbsp;
                    <img src="<?php echo base_url(); ?>styles/v2.0/dungtt/img/bootstrap/12/gr2-img2.png">
                </div>
                <div class="col-md-2 gr1-col-3">
                    <a ><strong>Đánh giá &nbsp;&nbsp;</strong></a>
                    <i class="fa fa-star-o vote_icon_click" aria-hidden="true" style="color: red;"></i>
                    <i class="fa fa-star-o vote_icon_click" aria-hidden="true" style="color: red;"></i>
                    <i class="fa fa-star-o vote_icon_click" aria-hidden="true" style="color: red;"></i>
                    <i class="fa fa-star-o vote_icon_click" aria-hidden="true" style="color: red;"></i>
                    <i class="fa fa-star-o vote_icon_click" aria-hidden="true" style="color: red;"></i>
                    <a href="#click_to_vote" data-toggle="modal" class="hidden vote_link"> 
                    </a> 

                </div>
                <div class="col-md-2 gr1-col-4">
                    <img src="<?php echo base_url(); ?>styles/v2.0/dungtt/img/bootstrap/12/gr2-img3.png">
                    <a> Nhấn vào đây để đánh giá  </a>
                </div>
            </div>
            <hr style="margin-top: 0px; width: 93%;">
            <div class="row gr1-row-3">
                <div class="col-md-3">
                    <img src="<?php echo 'https://lakita.vn/' . $speaker[0]['image']; ?>" class="avatar" style="width: 50px;">
                    <strong> <?php echo $speaker[0]['name']; ?> </strong>
                </div>
                <div class="col-md-3">
                    <p><i class="fa fa-envelope" aria-hidden="true" style="color: green;"></i><i style="font-style: normal;"> <?php echo $speaker[0]['name']; ?></i></p>
                </div>
                <div class="col-md-2">
                    <p><i class="fa fa-facebook" aria-hidden="true" style="color: green;"></i><i style="font-style: normal;"> <?php echo $speaker[0]['name']; ?></i></p>
                </div>
                <div class="col-md-4">
                    <p><i class="fa fa-twitter" aria-hidden="true" style="color: green;"></i><i style="font-style: normal;"> <?php echo $speaker[0]['name']; ?></i></p>
                </div>
            </div>
            <hr style="margin-top: 20px; width: 93%;">
            <div class="row gr1-row-4">
                <div class="row gr1-row4-1">
                    <p><i class="fa fa-comments" aria-hidden="true"></i></i><b> Thảo luận</b></p>
                </div>
                <div class="row gr1-row4-2">
                    <div class="col-md-2">
                        <img src="<?php
                        if (!empty($student[0]['id_fb']))
                            echo 'https://graph.facebook.com/' . $student[0]['id_fb'] . '/picture?type=large';
                        else {
                            if (!empty($student[0]['thumbnail']))
                                echo 'https://lakita.vn/' . $student[0]['thumbnail'];
                            else
                                echo base_url() . 'styles/images/people/110/user.png';
                        }
                        ?>" alt="" class="img-circle avatar" />
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Tiêu đề</label>
                            <input type="text" class="form-control" id="content_cmt" placeholder="Nhập nội dung tiêu đề cần thảo luận">
                        </div>
                        <textarea style="width:100%" name="editor1" class="form-control" rows="5" cols="120" required placeholder="Thảo luận về những thắc mắc, khó khăn khi bạn xem video bài giảng. Không đăng thảo luận không liên quan đến chủ đề học. Cảm ơn bạn!"></textarea>
                        <script>
                            CKEDITOR.replace('editor1', {width: '555px'});
                            CKEDITOR.add;
                        </script>
                        <div class="input-group-btn1 text-center margintop10">
                            <button class="btn btn-primary my-btn" id="save_cmt">Đăng thảo luận</button>
                            <input type="hidden" id="courses_id" value="<?php echo $curr_learn[0]['courses_id']; ?>" placeholder="">
                            <input type="hidden" id="parent" value="0" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <script> $("#save_cmt").click(function () {
                    alert("Bạn cần đăng ký khóa học để đăng thảo luận!");
                });</script>
            <hr style="margin: 20px 15px; width: 95%;">

            <!--============================thảo luận ================================================-->
            <div id="list_cmt">
                <?php $this->load->view('course/load_cmt'); ?>
            </div>
            <!--============================thảo luận (hết) ==========================================-->
        <?php } ?>
    </div>
    <?php if (!$this->agent->is_mobile()) { ?>
        <div class="col-md-4">
            <div role="tabpanel" class="panel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#dsbaihoc" aria-controls="home" role="tab" data-toggle="tab">
                            <i class="fa fa-list" aria-hidden="true"></i></br>
                            DS bài học
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#taitailieu" aria-controls="tab" role="tab" data-toggle="tab">
                            <i class="fa fa-download" aria-hidden="true"></i></br>
                            Tải tài liệu
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#ghichu" aria-controls="tab" role="tab" data-toggle="tab">
                            <i class="fa fa-sticky-note-o" aria-hidden="true"></i> <br/>
                            Ghi chú
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#nopbai" aria-controls="tab" role="tab" data-toggle="tab">
                            <i class="fa fa-level-up" aria-hidden="true"></i></br>
                            Nộp bài
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="dsbaihoc">
                        <?php foreach ($chapter as $key => $value) { ?>
                            <p class="category"><?php echo $value['name']; ?></p>
                            <ul class="sidebar-block list-group list-group-menu list-group-minimal">
                                <?php
                                foreach ($all_learn[$key] as $key2 => $lvalue) {
                                    ?>
                                    <li id = "scroll<?php echo $lvalue['sort']; ?>" class="list-group-item <?php if ($curr_id == $lvalue['id']) echo 'active'; ?>">
                                        <a title="<?php echo $lvalue['name']; ?>" href="<?php echo base_url() . $lvalue['slug'] . '-6' . $lvalue['id']; ?>.html">
                                            <i class='fa fa-circle-o'></i>
                                            <?php echo 'Bài ' . $lvalue['sort'] . ': ' . $lvalue['name']; ?>
                                            <span class="badge"><?php echo $lvalue['length']; ?></span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="taitailieu">
                        <p class="margintop10"> Bạn cần đăng ký khóa học để tải tài liệu! </p>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="ghichu">
                        <p class="margintop10"> Bạn cần đăng ký khóa học để viết ghi chú! </p>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="nopbai">
                        <p class="margintop10"> Bạn cần đăng ký khóa học để nộp bài tập! </p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php if ($this->agent->is_mobile()) { ?>
    <div class="row">
        <div class="col-xs-12">
            <div role="tabpanel" class="panel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#dsbaihoc" aria-controls="home" role="tab" data-toggle="tab">
                            <i class="fa fa-list" aria-hidden="true"></i></br>
                            DS bài học
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#taitailieu" aria-controls="tab" role="tab" data-toggle="tab">
                            <i class="fa fa-download" aria-hidden="true"></i></br>
                            Tải tài liệu
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#ghichu" aria-controls="tab" role="tab" data-toggle="tab">
                            <i class="fa fa-sticky-note-o" aria-hidden="true"></i> <br/>
                            Ghi chú
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#nopbai" aria-controls="tab" role="tab" data-toggle="tab">
                            <i class="fa fa-level-up" aria-hidden="true"></i></br>
                            Nộp bài
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="dsbaihoc">
                        <?php foreach ($chapter as $key => $value) { ?>
                            <p class="category"><?php echo $value['name']; ?></p>
                            <ul class="sidebar-block list-group list-group-menu list-group-minimal">
                                <?php
                                foreach ($all_learn[$key] as $key2 => $lvalue) {
                                    ?>
                                    <li id = "scroll<?php echo $lvalue['sort']; ?>" class="list-group-item <?php if ($curr_id == $lvalue['id']) echo 'active'; ?>">
                                        <a title="<?php echo $lvalue['name']; ?>" href="<?php echo base_url() . $lvalue['slug'] . '-6' . $lvalue['id']; ?>.html"> 
                                            <i class='fa fa-circle-o'></i>
                                            <?php echo 'Bài ' . $lvalue['sort'] . ': ' . $lvalue['name']; ?>
                                            <span class="badge"><?php echo $lvalue['length']; ?></span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="taitailieu">
                        <p class="margintop10"> Bạn cần đăng ký khóa học để tải tài liệu! </p>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="ghichu">
                        <p class="margintop10"> Bạn cần đăng ký khóa học để viết ghi chú! </p>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="nopbai">
                        <p class="margintop10"> Bạn cần đăng ký khóa học để nộp bài tập! </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!--<a href="<?php echo base_url() . $curr_course[0]['slug'] . '-3' . $curr_course[0]['id']; ?>.html">
<img src="https://lakita.vn/styles/v2.0/img/event/hoc-thu.gif" class="img-responsive" style="position: fixed; bottom: 0; z-index: 100000000000;" />
</a>-->
<div>
    <?php //$this->load->view('course/detail/vote_modal'); ?>
</div>
<script src="<?php echo base_url(); ?>styles/v2.0/js/learn.min.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<script src="<?php echo base_url(); ?>styles/v2.0/js/lktlayer.min.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<!--<script src="<?php echo base_url(); ?>styles/v2.0/js/scrt.js"></script>  -->
<?php
//if ($trial_learn == 1 && $curr_id == 269) {
//    echo '<script> alert("Chú ý: Bạn chưa mua khóa học nên bạn chỉ xem được các video của chương đầu tiên trong khóa học này. Trân trọng!");</script>';
//}
?>
<style>
    .panel .tab-content ul li.active:hover a {
        color: #fff;
    }
    .event2011{
        display: none;
    }
</style>
<div class="clock" style="bottom: 0px; position: fixed; z-index: 100000000;width: 23%; right: -2%"> Thời gian học thử còn: </div>
<script>
                $(function () {
                    var end = <?php echo $remain_time + 600; ?>;
                    var now = <?php echo time(); ?>;
                    var distance = end - now;
                    if (distance <= 0) {
                        distance = 0;
                    }
                    var clock = $('.clock').FlipClock(distance, {
                        clockFace: 'DailyCounter',
                        countdown: true
                    });

                    setInterval(function () {
                        $.ajax({
                            url: "<?php echo base_url(); ?>event/checkTrialLearn",
                            type: "POST",
                            success: function (data) {
                                console.log(data);
                                if (data == 0) {
                                    alert("Đã hết 10 phút học thử. Mời bạn quay lại sau hoặc đăng ký khóa học để học tiếp!");
                                    location.href = "<?php echo base_url(); ?>";
                                }
                            }
                        });
                    }, 5000);
                });
</script>
<style>
    .flip-clock-divider.days,
    .flip-clock-divider.hours,
    .flip-clock-divider.minutes,
    .clock ul:nth-child(1),
    .clock ul:nth-child(2),
    .clock ul:nth-child(3),
    .clock ul:nth-child(4),
    .clock ul:nth-child(5),
    .clock ul:nth-child(6)
    {
        display: none;
    }
</style>