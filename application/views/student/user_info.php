<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/student.css?ver=<?php echo _VER_CACHED_ ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/style.bootstrap11.lakita.css?ver=<?php echo _VER_CACHED_ ?>" />
<script src="<?php echo base_url(); ?>styles/v2.0/js/student.min.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<?php
if ($this->agent->is_mobile())
    $this->load->view('mobile/user_info_mobile');
else {
    ?>
<div class="header">
    <?php $this->load->view('home/navbar'); ?>
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
                    <p> Thông tin tài khoản </p>
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
                            <li class="active"><a href="thong-tin-tai-khoan.html"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;  Thông tin tài khoản</a></li>
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
                <!--                <div class="QC">
                                    <div class="row">
                                        <a ><img src="<?php echo base_url(); ?>styles/v2.0/dungtt/img/bootstrap/11/QC-1.png"></a>
                                    </div>
                                    <div class="row">
                                        <a ><img src="<?php echo base_url(); ?>styles/v2.0/dungtt/img/bootstrap/11/QC-2.png"></a>
                                    </div>
                                </div>-->
            </aside>
        </div>
        <div class="col-md-9">
            <section class="group4">
                <div class="link4">
                    <p><a href="course/view_all">Trang chủ</a> / <a href="student">Quản lý giao dịch</a> / <a> Thông tin tài khoản</a></p>
                    <p style="color: green; margin-left: 5px; font-size: 20px;"><i class="fa fa-user" aria-hidden="true"></i><strong> Thông tin tài khoản</strong></p>
                </div>

                <?php
                $success = $this->session->flashdata('success');
                if (!empty($success)) {
                    ?>
                    <p class="padding-10 bg-primary"><?php echo $success; ?></p>
                    <?php
                }
                $error = $this->session->flashdata('error');
                if (!empty($error)) {
                    ?>
                    <p class="padding-10 bg-red"><?php echo $error; ?></p>
                <?php } 
                $type_submit = $this->session->flashdata('type_submit');
                if($type_submit == 'change_pass'){
                ?>
                    <script> $(function(){
                        $("[href='#tab']").click();
                    }); </script>
                <?php }?>
                <form class="form-horizontal" role="form" action="<?php echo base_url() . 'student/update_user_info'; ?>" method="POST" enctype="multipart/form-data">
                    <div class="row gr5-row-2 margintop22" role="tabpanel">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist" style="margin-left: -15px;">
                            <li role="presentation" class="active">
                                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thông tin tài khoản</a>
                            </li>
                            <li role="presentation">
                                <a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">Thay đổi mật khẩu</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="row gr5-form">
                                    <div class="row gr5-row2-form1">
                                        <div class="col-md-3 gr5-name-form avatar-name">
                                            <p><strong>Avatar: </strong></p>
                                        </div>
                                        <div class="col-md-2 margintop10">
                                            <img src="<?php
                                            if (!empty($student[0]['thumbnail']))
                                                echo 'https://lakita.vn/' . $student[0]['thumbnail'];
                                            elseif (!empty($student[0]['id_fb']))
                                                'https://graph.facebook.com/' . $student[0]['id_fb'] . '/picture?type=large';
                                            else
                                                echo base_url() . 'styles/images/user.jpg';
                                            ?>" alt="<?php echo $student[0]['name']; ?>" class="img-circle width-80 height-80" />
                                        </div>
                                        <div class="col-md-4 col-md-offset-1" id="form-avatar">
                                            <label class="marginleft15"> Thay đổi avatar: </label>
                                            <input type="file" name="thumbnail" class="btn btn-white btn-sm paper-shadow relative" placeholder="Thay đổi avatar">
                                        </div>
                                    </div>
                                    <div class="row gr5-row2-form2">
                                        <div class="col-md-3 gr5-name-form">
                                            <p><strong>Họ tên: </strong></p>
                                        </div>
                                        <div class="col-md-9" id="form-general">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <span class="vr"></span>
                                            <input type="text" name="name" placeholder="<?php echo $student[0]['name']; ?>">
                                        </div>
                                    </div>
                                    <div class="row gr5-row2-form2">
                                        <div class="col-md-3 gr5-name-form">
                                            <p><strong>Mã giới thiệu: </strong></p>
                                        </div>
                                        <div class="col-md-9" >
                                            <p><strong> <?php echo 'LKT0'. $student[0]['id']; ?></strong></p>
                                        </div>
                                    </div>
                                    <div class="row gr5-row2-form3">
                                        <div class="col-md-3 gr5-name-form">
                                            <p><strong>Giới tính: </strong></p>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="radio" name="gender" value="1" <?php if ($student[0]['gender'] == 1) echo 'checked="checked"'; ?> />   
                                            <span> Nam</span>
                                            <input type="radio" name="gender" value="0" i<?php if ($student[0]['gender'] == 0) echo 'checked="checked"'; ?> />   
                                            <span> Nữ</span>
                                        </div>
                                    </div>
                                    <div class="row gr5-row2-form2">
                                        <div class="col-md-3 gr5-name-form">
                                            <p><strong>Ngày tháng năm sinh: </strong></p>
                                        </div>
                                        <div class="col-md-9" id="form-general">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <span class="vr"></span>
                                            <input type="text" name="birthday" placeholder="<?php echo $student[0]['birthday']; ?>">
                                        </div>
                                    </div>
                                    <div class="row gr5-row2-form2">
                                        <div class="col-md-3 gr5-name-form">
                                            <p><strong>Email: </strong></p>
                                        </div>
                                        <div class="col-md-9" id="form-general">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <span class="vr"></span>
                                            <input type="email" id="inputEmail3" readonly="true" value="<?php echo $student[0]['email']; ?>">
                                        </div>
                                    </div>
                                    <div class="row gr5-row2-form2">
                                        <div class="col-md-3 gr5-name-form">
                                            <p><strong>Di động: </strong></p>
                                        </div>
                                        <div class="col-md-9" id="form-general">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <span class="vr"></span>
                                            <input type="text" name="phone" style="border:none;margin-top: 5px;" 
                                                   placeholder="<?php
                                                   if ($student[0]['phone'] == '')
                                                       echo "Nhập vào số điện thoại";
                                                   else
                                                       echo $student[0]['phone'];
                                                   ?>" 
                                                   <?php
                                                   if ($student[0]['phone'] == '' || !preg_match('/^0[1-9][0-9]{8,9}$/', $student[0]['phone'])) {
                                                       echo "required";
                                                   }
                                                   ?> />
                                        </div>
                                    </div>
                                    <div class="row gr5-row2-form2">
                                        <div class="col-md-3 gr5-name-form">
                                            <p><strong>Địa chỉ: </strong></p>
                                        </div>
                                        <div class="col-md-9" id="form-general">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>    
                                            <span class="vr"></span>
                                            <input type="text" name="address" style="border:none;margin-top: 5px;" 
                                                   placeholder="<?php
                                                   if ($student[0]['address'] == '')
                                                       echo "Nhập vào địa chỉ của bạn";
                                                   else
                                                       echo $student[0]['address'];
                                                   ?>"  /> 
                                        </div>
                                    </div>
                                    <div class="row gr5-row2-form2">
                                        <div class="col-md-3 gr5-name-form">
                                            <p><strong>Nghề nghiệp: </strong></p>
                                        </div>
                                        <div class="col-md-9" id="form-general">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>    
                                            <span class="vr"></span>
                                            <input type="text" name="job" style="border:none;margin-top: 5px;"  
                                                   placeholder="<?php
                                                   if ($student[0]['job'] == '')
                                                       echo "Nhập vào nghề nghiệp của bạn";
                                                   else
                                                       echo $student[0]['job'];
                                                   ?>"  /> 
                                        </div>
                                    </div>
                                    <div class="row gr5-row2-form2">
                                        <div class="col-md-3 gr5-name-form">
                                            <p><strong>Nhập mật khẩu cũ: </strong></p>
                                        </div>
                                        <div class="col-md-9" id="form-general">
                                            <i class="fa fa-key" aria-hidden="true"></i>
                                            <span class="vr"></span>
                                            <input type="password" name="oldpassword" placeholder="Mật khẩu cũ">
                                        </div>
                                    </div>
                                    <div class="row gr5-row2-form2">
                                        <div class="col-md-3 gr5-name-form">
                                            <p><strong>Mật khẩu mới: </strong></p>
                                        </div>
                                        <div class="col-md-9" id="form-general">
                                            <i class="fa fa-key" aria-hidden="true"></i>
                                            <span class="vr"></span>
                                            <input type="password" name="password" placeholder="Mật khẩu mới">
                                        </div>
                                    </div>
                                    <div class="row gr5-row2-form2">
                                        <div class="col-md-3 gr5-name-form">
                                            <p><strong>Xác nhận mật khẩu mới: </strong></p>
                                        </div>
                                        <div class="col-md-9" id="form-general">
                                            <i class="fa fa-key" aria-hidden="true"></i>
                                            <span class="vr"></span>
                                            <input type="password" name="re_password" placeholder="Xác nhận mật khẩu mới">
                                        </div>
                                    </div>    
                                    <div class="row gr5-row2-form2">
                                        <div class="col-md-3 gr5-name-form">
                                            <p><strong>Số dư tài khoản: </strong></p>
                                        </div>
                                        <div class="col-md-9 paddingleft0">

                                            <input type="text" class="paddingleft10 red" disabled name="name" value="<?php echo number_format($student[0]['balance'], 0, ",", ".") . " VNĐ"; ?>">
                                        </div>
                                    </div>    
                                    <div>
                                        <div class="col-md-9 col-md-offset-2 margintop10">
                                            <input type="checkbox" checked="checked"/>   Tôi đồng ý với các điều khoản của Lakita! 
                                        </div>
                                    </div>
                                    <div class="form-group4 text-center marginbottom15">
                                        <button id="nap" class="margintop20 type_submit" type="submit" type_submit="change_info">  CẬP NHẬT TÀI KHOẢN  <i class="fa fa-sign-out" aria-hidden="true"></i>  </button>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="tab">
                                <div class="row gr5-form">
                                    <div class="row gr5-row2-form2">
                                        <div class="col-md-3 gr5-name-form">
                                            <p><strong>Nhập mật khẩu cũ: </strong></p>
                                        </div>
                                        <div class="col-md-9" id="form-general">
                                            <i class="fa fa-key" aria-hidden="true"></i>
                                            <span class="vr"></span>
                                            <input type="password" name="oldpassword" placeholder="Mật khẩu cũ">
                                        </div>
                                    </div>
                                    <div class="row gr5-row2-form2">
                                        <div class="col-md-3 gr5-name-form">
                                            <p><strong>Mật khẩu mới: </strong></p>
                                        </div>
                                        <div class="col-md-9" id="form-general">
                                            <i class="fa fa-key" aria-hidden="true"></i>
                                            <span class="vr"></span>
                                            <input type="password" name="password" placeholder="Mật khẩu mới">
                                        </div>
                                    </div>
                                    <div class="row gr5-row2-form2">
                                        <div class="col-md-3 gr5-name-form">
                                            <p><strong>Xác nhận mật khẩu mới: </strong></p>
                                        </div>
                                        <div class="col-md-9" id="form-general">
                                            <i class="fa fa-key" aria-hidden="true"></i>
                                            <span class="vr"></span>
                                            <input type="password" name="re_password" placeholder="Xác nhận mật khẩu mới">
                                        </div>
                                    </div>    
                                    <div class="form-group4 text-center marginbottom15">
                                        <button id="nap" class="margintop20 type_submit" type_submit="change_pass" type="submit">  CẬP NHẬT TÀI KHOẢN  <i class="fa fa-sign-out" aria-hidden="true"></i>  </button>
                                    </div>
                                    <input type="hidden" id="type_submit" name="type_submit"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
<?php }?>
<script>
    $(".type_submit").click(function () {
        $("#type_submit").val($(this).attr('type_submit'));
    });
</script>


<!--*********************************************************DUNG TT (hết)***********************************************-->