<!-- ==============================================MODAL ĐĂNG NHẬP - ĐĂNG KÝ ================================================-->

<link type="text/css" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/login_modal.css" />
<div class="modal fade" tabindex="-1" role="dialog" id="myModal3">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content fontOpenSans">
            <div class="modal-body">
                <div class="pull-right required"><span style="display: inline-block; margin-top: 11px;"> Dấu * là bắt buộc &nbsp;&nbsp;&nbsp;&nbsp; </span> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> </div>
                <div class="row">
                    <div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#login" aria-controls="home" role="tab" data-toggle="tab" id="tab_login"> <span class="glyphicon glyphicon-log-in" aria-hidden="true"> </span> &nbsp; Đăng nhập</a></li>
                            <li role="presentation"><a href="#register" aria-controls="profile" role="tab" data-toggle="tab" id="tab_register"><i class="fa fa-user" aria-hidden="true">+</i> Đăng ký</a></li>
                            <li role="presentation"><a href="#forgetPassword" aria-controls="messages" role="tab" data-toggle="tab" id="tab_forgetpassword"> <i class="fa fa-key" aria-hidden="true"></i> Quên mật khẩu</a></li>
<!--                                <li role="presentation"><a href="#activeCOD" aria-controls="settings" role="tab" data-toggle="tab"> <i class="fa fa-check" aria-hidden="true"></i> Kích hoạt khóa học</a></li>-->
                        </ul>

                        <!-- Tab panes -->

                        <div class="tab-content">
                            <!-- ****************************************ĐĂNG NHẬP********************************************-->
                            <div role="tabpanel" class="tab-pane fade in active" id="login">
                                <div class="my-container-1">
                                    <p> <strong> Hãy đăng nhập vào hệ thống học trực tuyến Lakita để nhận nhiều ưu đãi </strong> </p>
                                    <div class="row">
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <div class="my-form-group-1 marginbottom15">
                                                <div class="my-form-control-1">Email*</div>
                                                <div class="my-form-control-1 border">
                                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                                    <span class="vr"></span>
                                                    <input type="email" name="email" id="login_email" placeholder="Nhập Email">
                                                </div>
                                                <div class="clr"></div>
                                            </div>
                                            <div class="my-form-group-1 marginbottom15">
                                                <div class="my-form-control-1">Mật khẩu*</div>
                                                <div class="my-form-control-1 border">
                                                    <i class="fa fa-key" aria-hidden="true"></i>
                                                    <span class="vr"></span>
                                                    <input type="password" name="password" id="login_password" placeholder="Nhập mật khẩu">
                                                </div>
                                                <div class="clr"></div>
                                            </div>
                                            <div class="my-form-group-1 marginbottom0">
                                                <div class="my-form-control-1 remember">  <input type="checkbox" class="checkbox1" name="is_remember" id="is_remember" /> </div>
                                                <div class="my-form-control-1 paddingleft0">
                                                    Ghi nhớ tài khoản
                                                </div>
                                                <div class="clr"></div>
                                            </div>
                                            <div class="my-form-group-1 hidden-sm hidden-xs">
                                                <div class="my-form-control-1"></div>
                                                <div class="my-form-control-1 paddingleft0">
                                                    Quên mật khẩu? <a href="#" class="lakita" id="link_forgetpassword">Click vào đây để lấy lại mật khẩu</a>
                                                </div>
                                                <div class="clr"></div>
                                            </div>
                                            <div class="my-form-group-1 marginbottom10 margintop10">
                                                <div class="my-form-control-1 hidden-xs"></div>
                                                <div class="my-form-control-1 paddingleft0">
                                                    <button value="login" class="click_login btn btn-primary my-btn"> <i class="fa fa-sign-in" aria-hidden="true"></i> ĐĂNG NHẬP VÀO HỆ THỐNG</button>
                                                </div>
                                                <div class="clr"></div>
                                            </div>
                                            <div class="my-form-group-1 hidden-sm hidden-xs">
                                                <div class="my-form-control-1"></div>
                                                <div class="my-form-control-1 paddingleft0">
                                                    Bạn chưa có tài khoản? <a href="#" id="link_register">Đăng ký</a>
                                                </div>
                                                <div class="clr"></div>
                                            </div>
                                            <div class="hidden-sm hidden-xs">
                                                <input type="checkbox" name="remember_password" value="remember_password"/> Tôi muốn nhận khuyến mại đặc biệt và giảm giá qua email.
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-12 social-login">
                                            <p> Hoặc đăng nhập bằng tài khoản sau: </p>
                                            <a href="<?php echo $facebook_login_url;?>" class="my-btn bgfb"> <i class="fa fa-facebook" aria-hidden="true"></i> &nbsp; Đăng nhập qua Facebook </a>
                                            <a id="customBtn" class="my-btn bggg" href="https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=online&client_id=125422840079-ars8uilref93d7jaic148nkqm41vao9u.apps.googleusercontent.com&redirect_uri=http%3A%2F%2Flakita.vn%2Fplugin%2Fgg.php&state&scope=email%20profile&approval_prompt=auto"> <i class="fa fa-google-plus" aria-hidden="true"></i> &nbsp; Đăng nhập qua Google+   </a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- ****************************************ĐĂNG KÝ********************************************-->
                            <div role="tabpanel" class="tab-pane fade" id="register">
                                <div class="my-container-1">
                                    <p> <strong> Hãy đăng ký tài khoản tại Lakita để nhận nhiều ưu đãi </strong> </p>
                                    <div class="row">
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <div class="my-form-group-1 marginbottom15">
                                                <div class="my-form-control-1">Họ và tên*</div>
                                                <div class="my-form-control-1 border">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    <span class="vr"></span>
                                                    <input type="text" name="name" id="signup_name" placeholder="Nhập họ tên">
                                                </div>
                                                <div class="clr"></div>
                                            </div>
                                            <div class="my-form-group-1 marginbottom15">
                                                <div class="my-form-control-1">Email*</div>
                                                <div class="my-form-control-1 border">
                                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                                    <span class="vr"></span>
                                                    <input type="email" name="email" id="signup_email" placeholder="Nhập Email">
                                                </div>
                                                <div class="clr"></div>
                                            </div>
                                            <div class="my-form-group-1 marginbottom15">
                                                <div class="my-form-control-1">Điện thoại*</div>
                                                <div class="my-form-control-1 border">
                                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                                    <span class="vr"></span>
                                                    <input type="phone" name="phone" id="signup_phone"placeholder="Nhập số điện thoại">
                                                </div>
                                                <div class="clr"></div>
                                            </div>
                                            <div class="my-form-group-1 marginbottom15">
                                                <div class="my-form-control-1">Mật khẩu*</div>
                                                <div class="my-form-control-1 border">
                                                    <i class="fa fa-key" aria-hidden="true"></i>
                                                    <span class="vr"></span>
                                                    <input type="password" name="password" id="signup_password" placeholder="Nhập mật khẩu">
                                                </div>
                                                <div class="clr"></div>
                                            </div>
                                            <div class="my-form-group-1 marginbottom15">
                                                <div class="my-form-control-1">Nhập lại*</div>
                                                <div class="my-form-control-1 border">
                                                    <i class="fa fa-key" aria-hidden="true"></i>
                                                    <span class="vr"></span>
                                                    <input type="password" name="re_password" id="signup_repassword" placeholder="Nhập lại mật khẩu">
                                                </div>
                                                <div class="clr"></div>
                                            </div>
                                            <div class="my-form-group-1 marginbottom0">
                                                <div class="my-form-control-1 remember">  
                                                    <input type="checkbox" class="checkbox1" id="agree_term" /> 
                                                </div>
                                                <div class="my-form-control-1 paddingleft0">
                                                    Tôi đồng ý với <a class="lakita" data-toggle="modal" href="#modal-terms"> Điều khoản & dịch vụ </a> của Lakita
                                                    <?php $this->load->view('home/terms'); ?>
                                                </div>
                                                <div class="clr"></div>
                                            </div>
                                            <div class="my-form-group-1 marginbottom10 margintop10">
                                                <div class="my-form-control-1 hidden-xs"></div>
                                                <div class="my-form-control-1 paddingleft0">
                                                    <button value="signup" class="click_login btn btn-primary my-btn">  <i class="fa fa-user" aria-hidden="true">+</i> &nbsp;ĐĂNG KÝ TÀI KHOẢN</button>
                                                </div>
                                                <div class="clr"></div>
                                            </div>
                                            <div class="hidden-sm hidden-xs">
                                                <input type="checkbox" name="remember_password" value="remember_password"/> Tôi muốn nhận khuyến mại đặc biệt và giảm giá qua email.
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-12 social-login">
                                            <p> <strong> Nếu bạn đã có tài khoản hãy <a href="#" class="lakita" id="link_login"> Đăng nhập </a></strong></p>
                                            <p> Hoặc đăng nhập bằng tài khoản sau: </p>
                                            <a href="<?php echo $facebook_login_url;?>" class="my-btn bgfb"> <i class="fa fa-facebook" aria-hidden="true"></i> &nbsp; Đăng nhập qua Facebook </a>
                                            <a id="customBtn2" class="my-btn bggg" href="https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=online&client_id=125422840079-ars8uilref93d7jaic148nkqm41vao9u.apps.googleusercontent.com&redirect_uri=http%3A%2F%2Flakita.vn%2Fplugin%2Fgg.php&state&scope=email%20profile&approval_prompt=auto"> <i class="fa fa-google-plus" aria-hidden="true"></i> &nbsp; Đăng nhập qua Google+ </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- ****************************************QUÊN MẬT KHẨU********************************************-->
                            <div role="tabpanel" class="tab-pane fade" id="forgetPassword">
                                <div class="my-container-1 textaligncenter" id="forgetPasswordHTML1">
                                    <p> <strong> Khôi phục mật khẩu </strong> </p>
                                    <p> Mời bạn nhập email của bạn vào ô dưới đây để tiếp tục </p>
                                    <hr>
                                    <div class="my-form-group-1 marginbottom15">
                                        <div class="my-form-control-1">Email*</div>
                                        <div class="my-form-control-1 border">
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            <span class="vr"></span>
                                            <input type="email" id="forgetPasswordEmail" name="forgetPasswordEmail" placeholder="Nhập Email">
                                        </div>
                                        <div class="clr"></div>
                                    </div>
                                    <div class="my-form-group-1 marginbottom10 margintop10">
                                        <div class="my-form-control-1 return">
                                            <button style="width: 50%;" class="my-btn" id="back_to_login"> <i class="fa fa-arrow-left" aria-hidden="true"></i> QUAY LẠI</button>
                                        </div>
                                        <div class="my-form-control-1 confirm">
                                            <button style="width: 50%;" class="my-btn" id="forgetPassBtn"> XÁC NHẬN <i class="fa fa-arrow-right" aria-hidden="true"> </i></button>
                                        </div>
                                        <div class="clr"></div>
                                    </div>
                                </div>
                                <div class="my-container-1 textaligncenter" id="forgetPasswordHTML2">
                                    <p> <strong> Tạo mới mật khẩu </strong> </p>
                                    <div class="forgetInfo">
                                        <p> <strong>Chú ý:</strong> Nhập mã xác nhận được gửi tới "<span id="email_forget_send" style="font-weight:bold;"> </span>". </p>
                                        <p> Sau đó tiến hành tạo một mật khẩu mới để đăng nhập </p>
                                    </div>
                                    <hr>
                                    <div class="my-form-group-1 marginbottom15">
                                        <div class="my-form-control-1">Mã xác nhận*</div>
                                        <div class="my-form-control-1 border">
                                            <i class="fa fa-compress" aria-hidden="true"></i>
                                            <span class="vr"></span>
                                            <input type="text" id="code_forget" name="code_forget" placeholder="Nhập mã xác nhận">
                                        </div>
                                        <div class="clr"></div>
                                    </div>
                                    <div class="my-form-group-1 marginbottom15">
                                        <div class="my-form-control-1">Mật khẩu*</div>
                                        <div class="my-form-control-1 border">
                                            <i class="fa fa-key" aria-hidden="true"></i>
                                            <span class="vr"></span>
                                            <input type="password" id="password_forget" name="password_forget" placeholder="Nhập mật khẩu mới">
                                        </div>
                                        <div class="clr"></div>
                                    </div>
                                    <div class="my-form-group-1 marginbottom15">
                                        <div class="my-form-control-1">Xác nhận mật khảu*</div>
                                        <div class="my-form-control-1 border">
                                            <i class="fa fa-key" aria-hidden="true"></i>
                                            <span class="vr"></span>
                                            <input type="password" id="re_password_forget" name="re_password_forget" placeholder="Nhập lại mật khẩu mới">
                                        </div>
                                        <div class="clr"></div>
                                    </div>
                                    <div class="my-form-group-1 marginbottom10 margintop10 marginleft35pt">
                                        <div class="my-form-control-1 paddingleft0" style="width:50%">
                                            <button type="submit" class="my-btn" id="CreatePassBtn">  TẠO MẬT KHẨU  <i class="fa fa-key" aria-hidden="true"></i></button>
                                        </div>
                                        <div class="clr"></div>
                                    </div>
                                </div>
                            </div>
                            <!--                                <div role="tabpanel" class="tab-pane fade" id="activeCOD">
                                                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<!--    <button type="button" class="btn btn-primary hidden" data-toggle="modal" data-target="#myModal3" id="show_modal">Large modal</button>-->
<!-- ==============================================MODAL ĐĂNG NHẬP - ĐĂNG KÝ (HẾT)================================================-->
