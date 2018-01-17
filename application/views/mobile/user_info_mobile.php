<?php $this->load->view('mobile/navbar'); ?>
<?php $this->load->view('mobile/dashboard'); ?>
<div class="container" style="font-family: RobotoCondensed-Regular;">
    <div class="row">
        <div class="col-xs-12" style="overflow: hidden;  ">

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
            <?php
            }
            $type_submit = $this->session->flashdata('type_submit');
            if ($type_submit == 'change_pass') {
                ?>
                <script> $(function () {
                        $("[href='#tab']").click();
                    });</script>
<?php } ?>
            <form class="form-horizontal" role="form" action="<?php echo base_url() . 'student/update_user_info'; ?>" method="POST" enctype="multipart/form-data">
                <h3 class="lakita"><i class="fa fa-leanpub" aria-hidden="true"></i> Thông tin tài khoản</h3>
                <div class="row">
                    <div class="col-xs-2">
                        <img src="<?php
                        if (!empty($student[0]['thumbnail']))
                            echo 'https://lakita.vn/' . $student[0]['thumbnail'];
                        elseif (!empty($student[0]['id_fb']))
                            'https://graph.facebook.com/' . $student[0]['id_fb'] . '/picture?type=large';
                        else
                            echo base_url() . 'styles/images/user.jpg';
                        ?>" alt="<?php echo $student[0]['name']; ?>" class="img-circle width-80 height-80" />
                    </div>
                    <div class="col-xs-9 col-xs-offset-1">
                        <label> Thay đổi avatar: </label>
                        <input type="file" name="thumbnail" class="btn btn-white btn-sm paper-shadow relative" placeholder="Thay đổi avatar">
                    </div>
                </div>
                <div class="row margintop20">
                    <div class="col-xs-12 col-sm-6">
                        <p><strong>Họ tên: </strong></p>
                    </div>
                    <div class="col-xs-12 col-sm-6 div_input">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="vr"></span>
                        <input type="text" name="name" class="input_info" placeholder="<?php echo $student[0]['name']; ?>">
                    </div>
                </div>

                <div class="row gr5-row2-form3 margintop20">
                    <div class="col-xs-12">
                        <p><strong>Giới tính: &nbsp; &nbsp;</strong> 
                            <input type="radio" name="gender" value="1" <?php if ($student[0]['gender'] == 1) echo 'checked="checked"'; ?> />   
                            <span> Nam</span>
                            <input type="radio" name="gender" value="0" i<?php if ($student[0]['gender'] == 0) echo 'checked="checked"'; ?> />   
                            <span> Nữ</span>
                        </p>
                    </div>
                </div>
                <div class="row margintop20">
                    <div class="col-xs-12 col-sm-6">
                        <p><strong>Ngày tháng năm sinh: </strong></p>
                    </div>
                    <div class="col-xs-12 col-sm-6 div_input">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <span class="vr"></span>
                        <input type="text" name="birthday" class="input_info" placeholder="<?php echo $student[0]['birthday']; ?>">
                    </div>
                </div>
                <div class="row margintop20">
                    <div class="col-xs-12 col-sm-6">
                        <p><strong>Email: </strong></p>
                    </div>
                    <div class="col-xs-12 col-sm-6 div_input">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span class="vr"></span>
                        <input type="email" id="inputEmail3" class="input_info" readonly="true" value="<?php echo $student[0]['email']; ?>">
                    </div>
                </div>
                <div class="row margintop20">
                    <div class="col-xs-12 col-sm-6">
                        <p><strong>Di động: </strong></p>
                    </div>
                    <div class="col-xs-12 col-sm-6 div_input">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span class="vr"></span>
                        <input type="text" name="phone" class="input_info" style="border:none;margin-top: 5px;" 
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
                <div class="row margintop20">
                    <div class="col-xs-12 col-sm-6">
                        <p><strong>Địa chỉ: </strong></p>
                    </div>
                    <div class="col-xs-12 col-sm-6 div_input">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>    
                        <span class="vr"></span>
                        <input type="text" name="address" class="input_info" style="border:none;margin-top: 5px;" 
                               placeholder="<?php
                               if ($student[0]['address'] == '')
                                   echo "Nhập vào địa chỉ của bạn";
                               else
                                   echo $student[0]['address'];
                               ?>"  /> 
                    </div>
                </div>
                <div class="row margintop20">
                    <div class="col-xs-12 col-sm-6">
                        <p><strong>Nghề nghiệp: </strong></p>
                    </div>
                    <div class="col-xs-12 col-sm-6 div_input">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>    
                        <span class="vr"></span>
                        <input type="text" name="job" class="input_info" style="border:none;margin-top: 5px;"  
                               placeholder="<?php
                               if ($student[0]['job'] == '')
                                   echo "Nhập vào nghề nghiệp của bạn";
                               else
                                   echo $student[0]['job'];
                               ?>"  /> 
                    </div>
                </div>
                <div class="row margintop20">
                    <div class="col-xs-12 col-sm-6">
                        <p><strong>Nhập mật khẩu cũ: </strong></p>
                    </div>
                    <div class="col-xs-12 col-sm-6 div_input">
                        <i class="fa fa-key" aria-hidden="true"></i>
                        <span class="vr"></span>
                        <input type="password" name="oldpassword" class="input_info" placeholder="Mật khẩu cũ">
                    </div>
                </div>
                <div class="row margintop20">
                    <div class="col-xs-12 col-sm-6">
                        <p><strong>Mật khẩu mới: </strong></p>
                    </div>
                    <div class="col-xs-12 col-sm-6 div_input">
                        <i class="fa fa-key" aria-hidden="true"></i>
                        <span class="vr"></span>
                        <input type="password" name="password" class="input_info" placeholder="Mật khẩu mới">
                    </div>
                </div>
                <div class="row margintop20">
                    <div class="col-xs-12 col-sm-6">
                        <p><strong>Xác nhận mật khẩu mới: </strong></p>
                    </div>
                    <div class="col-xs-12 col-sm-6 div_input">
                        <i class="fa fa-key" aria-hidden="true"></i>
                        <span class="vr"></span>
                        <input type="password" name="re_password" class="input_info" placeholder="Xác nhận mật khẩu mới">
                    </div>
                </div>    
                <div class="row margintop20">
                    <div class="col-xs-12">
                        <p><strong>Số dư tài khoản: </strong></p>
                    </div>
                    <div class="col-xs-12">
                        <input type="text" class="input_info" disabled name="name" value="<?php echo number_format($student[0]['balance'], 0, ",", ".") . " VNĐ"; ?>">
                    </div>
                </div>    
                <div>
                    <div class="col-xs-12 margintop10">
                        <input type="checkbox" checked="checked"/>   Tôi đồng ý với các điều khoản của Lakita! 
                    </div>
                </div>
                <div class="col-xs-12 form-group4 text-center marginbottom15">
                    <button id="nap" class="margintop20 type_submit" type="submit" type_submit="change_info">  CẬP NHẬT TÀI KHOẢN  <i class="fa fa-sign-out" aria-hidden="true"></i>  </button>
                </div>
            </form>
        </div>
    </div>
</div>


<style>
    .div_input{
        border: 1px solid #D3D3D3;
        margin-left: 10px;
        width: 92%;
    }
    .input_info{
        width: 90%;
        padding-left: 10px;
        height: 36px;
        border: none;
    }
</style>