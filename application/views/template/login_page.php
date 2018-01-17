<link type="text/css" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/login_page.css?ver=<?php echo _VER_CACHED_ ?>" />

<div class="header row" style="font-family: roboto;">
    <div class="col-md-5 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
        <a href="<?php echo base_url();?>">
        <img class="logo" src="https://crm2.lakita.vn/style/img/logo5.png">
        </a>
    </div>
    <div class="col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
        <div class="row">
            <div class="form-login" >
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="login_email" name="email" placeholder="Nhập Email">
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label for="">Mật khẩu</label>
                    <input type="password" class="form-control" id="login_password" placeholder="Nhập mật khẩu">
                </div>
                  

            </div>
        </div>
        <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12 remember">
            <input type="checkbox" class="checkbox1" name="is_remember" id="is_remember" /><p> Ghi nhớ tài khoản</p>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <a href="#" id="fp">Quên mật khẩu ?</a>
        </div>
        </div>
    </div>
    <div class="col-md-2">
            <div class="form-login" >
                <div class="form-group padding0 col-md-12 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                    <button class="btn btn-success btn-login click_login" value="login">Đăng nhập</button>
                </div> 
                 
            </div>
        
    </div>
</div>
<div class="row body" style="font-family: roboto;">
    <div class="col-md-5 col-md-offset-1 hidden-sm hidden-xs padding0">
        <img style="max-height: 510px" class="img img-responsive" src="<?php echo base_url(); ?>styles/v2.0/img/logo5.png">
    </div>
    <div class="col-md-5 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" >
        <div class="register">
            <div class="col-md-10 social-login padding0">
                <p> Hoặc đăng nhập bằng tài khoản sau: </p>
                <a href="<?php echo $facebook_login_url; ?>" class="my-btn bgfb"> <i class="fa fa-facebook" aria-hidden="true"></i> &nbsp; Facebook </a>
                <a id="customBtn2" class="my-btn bggg" href="https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=online&client_id=125422840079-ars8uilref93d7jaic148nkqm41vao9u.apps.googleusercontent.com&redirect_uri=http%3A%2F%2Flakita.vn%2Fplugin%2Fgg.php&state&scope=email%20profile&approval_prompt=auto"> <i class="fa fa-google-plus" aria-hidden="true"></i> &nbsp; Google+ </a>
            </div>
            <div class="col-md-10 padding0"> 
                <h1>Tạo tài khoản mới</h1>
                <div class="form-register">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="signup_name" placeholder="Họ và tên">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="signup_email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="phone" class="form-control" name="phone" id="signup_phone" placeholder="Số điện thoại">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="signup_password" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="re_password" id="signup_repassword" placeholder="Nhập lại mật khẩu">
                    </div>
                </div>
            </div>
            <div class="col-md-10 padding0">
                <p>Bằng cách nhấp vào Tạo tài khoản, bạn đồng ý với <a class="lakita" data-toggle="modal" href="#modal-terms"> Điều khoản & dịch vụ </a> của chúng tôi</p>
                <?php $this->load->view('home/terms'); ?>
            </div>
            <div class="col-md-12 padding0">
                <button class="btn btn-success click_login" value="signup">Tạo tài khoản</button>
            </div>
        </div>

        <div class="forgetPass" >
            <div class="col-md-10 padding0"> 
                <div id="forgetPasswordHTML1">
                    <h1>Khôi phục mật khẩu</h1>
                    <p>Nhập email vào ô dưới đây để tiếp tục</p>
                    <div class="form-forgetPass">
                        <div class="form-group">
                            <input type="email" class="form-control" name="forgetPasswordEmail" id="forgetPasswordEmail" placeholder="Nhập email">
                        </div>

                    </div>
                    <div class="col-md-12 padding0">
                        <button class="btn btn-success" id="forgetPassBtn">Xác nhận</button>
                        <button class="btn btn-default" id="cancel">Hủy</button>
                    </div>
                </div>
                <div id="forgetPasswordHTML2">
                    <h1>Tạo mới mật khẩu</h1>
                    <p> <strong>Chú ý:</strong> Nhập mã xác nhận được gửi tới "<span id="email_forget_send" style="font-weight:bold;"> </span>". </p>
                    <p> Sau đó tiến hành tạo một mật khẩu mới để đăng nhập </p>
                    <div class="form-rePass">
                        <div class="form-group">
                            <input type="text" class="form-control" id="code_forget" name="code_forget" placeholder="Nhập mã xác nhận">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password_forget" name="password_forget" placeholder="Nhập mật khẩu mới">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="re_password_forget" name="re_password_forget" placeholder="Nhập lại mật khẩu mới">
                        </div>
                    </div>
                    <div class="col-md-12 padding0">
                        <button class="btn btn-success" id="CreatePassBtn">Xác nhận</button>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<script src="<?php echo base_url(); ?>styles/v2.0/js/login_page.js?ver=<?php echo _VER_CACHED_ ?>"></script>
