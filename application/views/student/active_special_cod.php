<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/student.css?ver=<?php echo _VER_CACHED_ ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/style.bootstrap11.lakita.css?ver=<?php echo _VER_CACHED_ ?>" />
<script src="<?php echo base_url(); ?>styles/v2.0/js/student.min.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<?php
if ($this->agent->is_mobile())
    $this->load->view('mobile/active_special_cod_mobile');
else {
    ?>
    <div class="header">
        <?php $this->load->view('home/navbar'); ?>
        <div class="row">
            <div class="col-md-6  my-row-1">
                <div class="row">
                    <div class="col-md-1 col-md-offset-3 margintop22">
                        <img src="<?php
                         if (!empty($student[0]['thumbnail'])) {
                                    echo 'https://lakita.vn/' . $student[0]['thumbnail'];
                                } else {
                                    if (!empty($student[0]['id_fb'])) {
                                        echo 'https://graph.facebook.com/' . $student[0]['id_fb'] . '/picture?type=large';
                                    } else {
                                        echo base_url() . 'styles/images/people/110/user.png';
                                    }
                                }
                        ?>" alt="" class="img-circle avatar" />
                    </div>
                    <div class="col-md-6 marginleft15">
                        <h1> <strong> <?php echo $student[0]['name']; ?> </strong></h1>
                        <p> Kích hoạt khóa học </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 searchBox">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <form action="<?php echo base_url(); ?>tim-kiem.html" method="post" id="searchForm">
                            <label for="exampleInputEmail1" class="sr-only">Search</label>
                            <input type="text" class="form-control" id="key_word" name="key_word" value="Tìm các khóa học bạn quan tâm...">
                            <img class="searchIcon"src="<?php echo base_url(); ?>styles/v2.0/img/icon_seach.png" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <!--*********************************************************DUNG TT***********************************************-->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <aside class="left-sidebar">
                    <div class="all-side">
                        <div class="row side-row-1">
                            <button type="text"><strong>QUẢN LÝ GIAO DỊCH</strong></button>
                            <ul style="margin-left: 35px;">
                                <li><a href="khoa-hoc-cua-toi.html"><i class="fa fa-leanpub" aria-hidden="true"></i> &nbsp; <strong> Khóa học của tôi </strong> </a></li>
                                <hr>
                                <li><a href="tien-do-hoc-tap.html"><i class="fa fa-bar-chart" aria-hidden="true"></i> &nbsp;  Tiến độ học tập</a></li>
                                <hr>
                                <li><a ><i class="fa fa-leanpub" aria-hidden="true"></i> &nbsp; Bài tập luyện tập</a></li>
                                <hr>
                                <li><a href="nap-tien-vao-tai-khoan.html"><i class="fa fa-usd" aria-hidden="true"></i> &nbsp; Nạp tiền vào tài khoản</a></li>
                                <hr>
                                <li class="active"><a href="kich-hoat-khoa-hoc.html"><i class="fa fa-compress" aria-hidden="true"></i> &nbsp; Kích hoạt khóa học</a></li>
                                <hr>
                                <li><a ><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp; Đơn hàng của tôi</a></li>
                                <hr>
                                <li><a ><i class="fa fa-heart-o" aria-hidden="true"></i> &nbsp; Sản phẩm yêu thích</a></li>
                                <hr>
                                <li><a ><i class="fa fa-qrcode" aria-hidden="true"></i> &nbsp; Mã voucher (mã giảm giá)</a></li>
                                <hr>
                                <li><a ><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;  Địa chỉ nhận hàng</a></li>
                            </ul>
                        </div>
                        <div class="row side-row-2">
                            <button type="text"><strong>QUẢN LÝ TÀI KHOẢN</strong></button>
                            <ul style="margin-left: 35px;">
                                <li><a href="thong-tin-tai-khoan.html"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;  Thông tin tài khoản</a></li>
                                <hr>
                                <li><a href="lich-su-thanh-toan.html"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp; Lịch sử thanh toán</a></li>
                                <hr>
                                <li><a ><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp; Quản lý bản tin (hộp thư)</a></li>
                                <hr>
                                <li><a ><i class="fa fa-weixin" aria-hidden="true"></i>&nbsp;  Hỏi đáp</a></li>
                                <hr>
                                <li><a href="student/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp; Thoát</a></li>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="col-md-9">
                <section class="group4">
                    <div class="link4">
                        <p><a href="course/view_all">Trang chủ</a> / <a href="student">Quản lý giao dịch</a> / <a>Kích hoạt khóa học</a></p>
                        <p style="color: green; margin-left: 5px; font-size: 20px;"><i class="fa fa-compress" aria-hidden="true"></i><strong> Kích hoạt khóa học</strong></p>
                    </div>
                    <div class="row gr4-row-2 paddingleft25 paddingtop10">
                        <h1> Chúc mừng bạn đã nhận được quà tặng là một khóa học bất kì của Lakita. Mời bạn chọn một khóa để học. </h1>
                        <?php
                        foreach ($courses as $key => $value) {
                            $firs_courses = array_filter(explode(',', $value['speaker_id']));
                            $firs_courses = str_replace('-', '', $firs_courses[0]);
                            $speaker = $this->lib_mod->detail('speaker', array('id' => $firs_courses));
                            ?>
                            <form action="student/action_active_special_cod" method="POST" id="form_<?php echo $value['id']; ?>">
                                <div class="row margintop45">
                                    <div class="col-xs-4">
                                        <a  title="<?php echo $value['name']; ?>">
                                            <img alt="<?php echo $value['name']; ?>" src="<?php echo 'https://lakita.vn/' . $value['image']; ?>" class="img-responsive" />
                                        </a>
                                    </div>
                                    <div class="col-xs-7 course_purchased">
                                        <p class="courseName"><?php echo $value['name']; ?></p>
                                        <p class="teacher"><?php echo $speaker[0]['name']; ?></p>
                                        <p class="price" style="font-size: 15px; margin-bottom: 0px;"> 
                                            <?php echo number_format(str_replace('.', '', $value['price_root_2']), 0, ',', '.') . " đ"; ?>
                                        </p>
                                        <div class="margintop22">
                                            <a cour_id="<?php echo $value['id']; ?>" cour_name="<?php echo $value['name']; ?>" class="btn btn-success choose_course"> Chọn khóa học </a> 
                                        </div>
                                        <input type="hidden" name="course_id" value="<?php echo $value['id']; ?>" />
                                    </div>
                                </div>
                            </form>
                            <hr/>
                            <?php
                        }
                        ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
<?php } ?>
<script src="<?php echo base_url(); ?>styles/v2.0/js/cod.min.js?ver=<?php echo _VER_CACHED_ ?>"></script>

<!--*********************************************************DUNG TT (hết)***********************************************-->
<style>
    .courseName {
        font-size: 18px;
        font-family: RobotoCondensed-Regular;
    }
    .teacher {
        color: #888888;
        font-family: RobotoCondensed-Regular;
        font-size: 17px;
    }
    .price {
        font-weight: bold;
        margin-bottom: 35px;
        font-family: RobotoCondensed-Bold;
        font-size: 18px;
    }
    a.choose_course{color: #fff;}
</style>
<script>
    $(".choose_course").click(function () {
        var r = confirm('Bạn có chắc chắn muốn chọn khóa học "' + $(this).attr("cour_name") + '" không?');
        if (r == true) {
            var cour_id = $(this).attr("cour_id");
            $("#form_" + cour_id).submit();
        } 
    });
</script>