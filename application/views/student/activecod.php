<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/student.css?ver=<?php echo _VER_CACHED_ ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/style.bootstrap11.lakita.css?ver=<?php echo _VER_CACHED_ ?>" />
<script src="<?php echo base_url(); ?>styles/v2.0/js/student.min.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<?php
if ($this->agent->is_mobile())
    $this->load->view('mobile/active_cod_mobile');
else {
    ?>
<div class="header">
    <?php $this->load->view('home/navbar');?>
<!--    <div class="row">
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
                            <li><a href="thong-bao.html"><i class="fa fa-bell" aria-hidden="true"></i> &nbsp; Thông báo</a></li>
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
                <div class="row gr4-row-2">
                    
                    <div class="col-md-offset-2 col-md-6">
                        <div class="form-group4">
                            <p style="margin: 3px 48px; position: absolute; color: #ccc;font-size: 20px;"><i class="fa fa-stack-exchange" aria-hidden="true"></i></i><p>
                                <label style="margin-left: -88px; margin-top: 14px;">Nhập mã kích hoạt*</label>
                                <input type="text" class="form-control" placeholder="Nhập mã kích hoạt tại đây" id="cod_cod"/>
                        </div>
                        <div class="form-group4">
                            <p style="margin: 3px 48px; position: absolute; color: #ccc;font-size: 20px;"><i class="fa fa-stack-exchange" aria-hidden="true"></i></i><p>
                                <label style="margin-left: -88px; margin-top: 14px;">Mã giới thiệu (nếu có)</label>
                                <input type="text" class="form-control" placeholder="Nhập mã giới thiệu tại đây" id="invite_code"/>
                        </div>
                        <div class="form-group4 text-center">
                            <button id="nap">KÍCH HOẠT <i class="fa fa-sign-out" aria-hidden="true"></i>  </button>
                        </div>
                    </div>
                    <div class="row gr4-row-1">
                        <p style="margin-left: 130px; margin-top: 12px;position: absolute;"><b>Chú ý:</b></p>
                        <p style="padding-top: 12px; margin-left: 180px;">
                            Khi sử dụng Mã Giới Thiệu bạn sẽ được cộng 5% giá trị khóa học vào tài khoản, người giới thiệu sẽ được cộng 10% giá trị khóa học vào tài khoản !<br>
                            Nếu không có Mã Giới Thiệu, bạn có thể bỏ trống. <br>
                            Bạn chỉ được nhập sai mã kích hoạt tối đa 5 lần, nếu quá chức năng này sẽ bị khóa! <br>
                            Nếu bạn gặp khó khăn trong việc kích hoạt khóa học, vui lòng liên hệ</br>
                            Hotline: <span><b>1900 6361 95</b></span>
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php }?>
 <script src="<?php echo base_url(); ?>styles/v2.0/js/cod.js?ver=<?php echo _VER_CACHED_ ?>"></script>

<!--*********************************************************DUNG TT (hết)***********************************************-->
