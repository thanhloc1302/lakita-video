<!-- trang khóa học của tôi -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/student.css?ver=<?php echo _VER_CACHED_ ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/style.bootstrap11.lakita.css?ver=<?php echo _VER_CACHED_ ?>" />
<script src="<?php echo base_url(); ?>styles/v2.0/js/student.min.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<?php
if ($this->agent->is_mobile())
    $this->load->view('mobile/my_courses');
else {
    ?>
    <div class="header">
        <?php $this->load->view('home/navbar'); ?>
<!--        <div class="row">
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
                        ?>" alt="lakita" class="img-circle avatar" />
                    </div>
                    <div class="col-md-6 marginleft15">
                        <h1> <strong> <?php echo $student[0]['name']; ?> </strong></h1>
                        <p> Thông báo </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 searchBox">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <form action="<?php echo base_url(); ?>tim-kiem.html" method="post" id="searchForm">
                            <label for="exampleInputEmail1" class="sr-only">Search</label>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>"/>
                            <input type="text" class="form-control" id="key_word" name="key_word" value="Tìm các khóa học bạn quan tâm...">
                            <img class="searchIcon"src="<?php echo base_url(); ?>styles/v2.0/img/icon_seach.png" />
                        </form>
                    </div>
                </div>
            </div>
        </div>-->
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
                                <li><a ><i class="fa fa-bar-chart" aria-hidden="true"></i> &nbsp;  Tiến độ học tập</a></li>
                                <hr>
                                <li><a href="bai-tap-luyen-tap.html"><i class="fa fa-leanpub" aria-hidden="true"></i> &nbsp; Bài tập luyện tập</a></li>
                                <hr>
                                <li class="active"><a href="thong-bao.html"><i class="fa fa-bell" aria-hidden="true"></i> &nbsp; Thông báo</a></li>
                                <hr>
                                <li><a href="nap-tien-vao-tai-khoan.html"><i class="fa fa-usd" aria-hidden="true"></i> &nbsp; Nạp tiền vào tài khoản</a></li>
                                <hr>
                                <li class="active_course"><a href="kich-hoat-khoa-hoc.html"><i class="fa fa-compress" aria-hidden="true"></i> &nbsp; Kích hoạt khóa học</a></li>
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
                <section class="group1">
                    <div class="link4">
                        <p><a href="course/view_all">Trang chủ</a> / <a href="student">Quản lý tài khoản</a> / <a>Thông báo</a></p>
                        <p style="color: green; margin-left: 5px; font-size: 20px;"><i class="fa fa-bell" aria-hidden="true"></i><strong> Thông báo</strong></p>
                    </div>
                    <div class="row gr4-row-2" style="">

                        <ul>
                            <?php
                            foreach ($noti1 as $key1 => $value1) {
                                if ($value1['type'] == 'comment') {
                                    ?>
                                    <li> 
                                        <a href="<?php echo $value1['url']; ?>"> 
                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                                <i class="fa fa-comments fa-3x" aria-hidden="true"></i>
                                            </div>
                                            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                                <?php
                                                
                                                    echo '<p>' . $value1['creator_name'] . ' đã trả lời bình luận của bạn</p>';
                                                    echo '<p>'.date('H:i:s d/m/Y', $value1['time']).'<p>';
                                                
                                                ?>
                                                <hr>
                                            </div>
                                        </a>
                                        
                                    </li>
                                    <?php
                                } elseif ($value1['type'] == 'exercise') {
                                    ?>
                                    <li> 
                                        <a href="<?php echo $value1['url']; ?>"> 
                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                                <i class="fa fa-book fa-3x" aria-hidden="true"></i>
                                            </div>
                                            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                                
                                                <p>&nbsp;&nbsp;&nbsp; Giảng viên Lakita đã chữa bài tập của bạn</p>
                                                <p><?php echo '&nbsp;&nbsp;&nbsp;'.date('d/m/Y H:i:s', $value1['time']);?></p>
                                                <hr>
                                            </div>
                                        </a>
                                    </li>
                                    <?php
                                 } elseif ($value1['type'] == 'invite') {
                                    ?>
                                    <li> 
                                        <a href="<?php echo $value1['url']; ?>"> 
                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                                <i class="fa fa-gift fa-3x" aria-hidden="true"></i>
                                            </div>
                                            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                                <?php
                                                    echo '<p>' . $value1['creator_name'] . ' đã sử dụng mã giới thiệu của bạn<p>';
                                                    echo '<p>Bạn được cộng ' . $value1['value'] . ' vào tài khoản</p>';
                                                    echo '<p>&nbsp;&nbsp;&nbsp;'.date("d/m/Y H:i:s", $value1["time"]).'</p>';
                                                ?>
                                                <hr>
                                            </div>
                                        </a>
                                    </li>
                                    <?php
   
                                } elseif ($value1['type'] == 'news') {
                                    ?>
                                    <li> 
                                        <a href="<?php echo $value1['url']; ?>"> 
                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                                <i class="fa fa-newspaper-o fa-3x" aria-hidden="true"></i>
                                            </div>
                                            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                                
                                                <p>&nbsp;&nbsp;&nbsp; [LAKITA.VN] đã đăng 1 tin mới</p>
                                                <p><?php echo '&nbsp;&nbsp;&nbsp;'.date('d/m/Y H:i:s', $value1['time']);?></p>
                                                <hr>
                                            </div>
                                        </a>
                                    </li>
                                    <hr>
                                    <?php
                                }
                            }
                            ?>

                        </ul>

                        <?php echo $paging ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <?php
}
