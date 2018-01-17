<?php $this->load->view('mobile/navbar'); ?>
<div class="container">
    <div class="row method">
        <div class="col-xs-12 col-sm-6" style="overflow: hidden">
            <p class="method_title"> <strong> Chọn phương thức thanh toán </strong></p>
            <hr>
            <p class="methods_choose" data-toggle="collapse" data-target="#cod_method_content" aria-expanded="false" aria-controls="cod_method_content"> &nbsp; <i class="fa fa-circle-o" aria-hidden="true"></i> &nbsp;&nbsp; Giao khóa học và thu tiền tận nơi </p>
            <div class="row collapse" id="cod_method_content">
                <div class="col-xs-12">
                    <p> Mời bạn nhập địa chỉ giao hàng </p>
                    <div class="my-form-group-1 marginbottom15">
                        <div class="my-form-control-1 hidden-xs hidden-sm">Họ và tên*</div>
                        <div class="my-form-control-1 border width95">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span class="vr"></span>
                            <input type="text" name="cod_name" placeholder="Nhập họ và tên">
                        </div>
                        <div class="clr"></div>
                    </div>
                    <div class="my-form-group-1 marginbottom15">
                        <div class="my-form-control-1 hidden-xs hidden-sm">Email*</div>
                        <div class="my-form-control-1 border width95">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <span class="vr"></span>
                            <input type="email" name="cod_email" placeholder="Nhập email">
                        </div>
                        <div class="clr"></div>
                    </div>
                    <div class="my-form-group-1 marginbottom15 hidden">
                        <div class="my-form-control-1 hidden-xs hidden-sm">Tỉnh/Thành Phố*</div>
                        <div class="my-form-control-1 border width95">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span class="vr"></span>
                            <input type="text" name="cod_tinh" id="login_email" placeholder="Nhập Tỉnh/Thành Phố" value="VN">
                        </div>
                        <div class="clr"></div>
                    </div>
                    <div class="my-form-group-1 marginbottom15 hidden">
                        <div class="my-form-control-1 hidden-xs hidden-sm">Quận/Huyện*</div>
                        <div class="my-form-control-1 border width95">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span class="vr"></span>
                            <input type="text" name="cod_quan" id="login_email" placeholder="Nhập Quận/Huyện" value="VN">
                        </div>
                        <div class="clr"></div>
                    </div>
                    <div class="my-form-group-1 marginbottom15">
                        <div class="my-form-control-1 hidden-xs hidden-sm">Địa chỉ*</div>
                        <div class="my-form-control-1 border width95">
                            <i class="fa fa-map" aria-hidden="true"></i>
                            <span class="vr"></span>
                            <input type="text" name="cod_dia_chi" id="login_email" placeholder="Nhập địa chỉ">
                        </div>
                        <div class="clr"></div>
                    </div>
                    <div class="my-form-group-1 marginbottom15">
                        <div class="my-form-control-1 hidden-xs hidden-sm">Nhập số điện thoại*</div>
                        <div class="my-form-control-1 border width95">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span class="vr"></span>
                            <input type="tel" name="cod_phone" id="login_email" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="clr"></div>
                    </div>
                    <p>
                        Lưu ý: Lakita.vn hoặc tổng đài tự động của chúng tôi sẽ liên hệ quý khách theo số điện thoại này để xác nhận hoặc thông báo giao hàng
                    </p>
                    <div class="text-center">
                        <button class="btn btn-primary my-btn btn-cod" style="padding-left: 70px; padding-right: 70px;"> TIẾP TỤC  <i class="fa fa-sign-in" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
            <hr>
            <p class="methods_choose" data-toggle="collapse" data-target="#direct_method_content" aria-expanded="false" aria-controls="direct_method_content"> &nbsp; <i class="fa fa-circle-o" aria-hidden="true"></i> &nbsp;&nbsp; Thanh toán trực tiếp tại VP Lakita </p>
            <div class="row collapse" id="direct_method_content">
                <div class="col-xs-12">
                    <p class="text-underline"> <strong> Địa chỉ văn phòng: </strong></p>
                    <p>
                        Phòng 701 CT1 - Chung cư Skylight - Ngõ Hòa Bình 6 - 125D Minh Khai - Q. Hai Bà Trưng
                    </p>
                    <p>
                        <strong class="text-underline"> Hot line: </strong> 1900 6361 95
                    </p>
                    <p>
                        (Thời gian làm việc: từ 8:30 - 18:30 , từ Thứ 2 đến Chủ Nhật hàng tuần)
                    </p>
                    <div class="margintop20">
                        <p>Mời bạn nhập họ tên và số điện thoại để nhân viên tư vấn liên hệ để xác nhận khóa học cho bạn </p>
                        <div class="my-form-group-1 marginbottom15">
                            <div class="my-form-control-1">Họ và tên*</div>
                            <div class="my-form-control-1 border">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="vr"></span>
                                <input type="text" name="direct_name" placeholder="Nhập họ và tên">
                            </div>
                            <div class="clr"></div>
                        </div>
                        <div class="my-form-group-1 marginbottom15">
                            <div class="my-form-control-1">Nhập số điện thoại*</div>
                            <div class="my-form-control-1 border">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span class="vr"></span>
                                <input type="tel" name="direct_phone" placeholder="Nhập số điện thoại">
                            </div>
                            <div class="clr"></div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary my-btn btn-direct" style="padding-left: 70px; padding-right: 70px;"> TIẾP TỤC  <i class="fa fa-sign-in" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="margintop20">
                        <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1pLwglBU_8H3tEIXdubPeDggEf8o" width="740" height="480"></iframe>
                    </div>
                </div>
            </div>
            <hr>
            <p class="methods_choose" data-toggle="collapse" data-target="#transfer_method_content" aria-expanded="false" aria-controls="transfer_method_content"> &nbsp; <i class="fa fa-circle-o" aria-hidden="true"></i> &nbsp;&nbsp; Chuyển khoản qua ngân hàng </p>
            <div class="row collapse" id="transfer_method_content">
                <div class="col-xs-12">
                    <p> Bạn có thể đến bất kỳ ngân hàng nào ở Việt Nam (hoặc sử dụng Internet Banking) để chuyển tiền theo thông tin bên dưới:</p>
                    <ul>
                        <li> <strong> Số tài khoản: </strong> 16221068 </li>
                        <li> <strong> Chủ tài khoản: </strong>Công ty cổ phần giáo dục Lakita </li>
                        <li><strong> Ngân hàng:</strong> Ngân hàng ACB, chi nhánh Trần Đại Nghĩa, Hai Bà Trưng, Hà Nội </li>
                    </ul>
                    <p class="text-underline">
                        <strong>
                            Ghi chú khi chuyển khoản:
                        </strong>
                    </p>
                    <ul class="marginleft30">
                        <li> Tại mục "Ghi chú" khi chuyển khoản, bạn ghi rõ: Số điện thoại - Email đăng ký học - Khóa học đăng ký - Mã voucher giảm giá (nếu có)
                        </li>
                        <li>
                            <span class="text-underline">Ví dụ:</span> 0948467389 – trinhnv@bkindex.com – Lam Chu Excel 2010 - 96a13b6982a331c
                        </li>
                        Giao dịch sẽ hoàn tất khi lakita.vn nhận được tiền từ ngân hàng, thường là từ 1 – 24 giờ. Lakita.vn sẽ gọi điện và gửi email báo cho bạn biết khi giao dịch hoàn tất.
                    </ul>

                    <div class="margintop20">
                        <p>Mời bạn nhập họ tên và số điện thoại để nhân viên tư vấn liên hệ để xác nhận khóa học cho bạn </p>
                        <div class="my-form-group-1 marginbottom15">
                            <div class="my-form-control-1">Họ và tên*</div>
                            <div class="my-form-control-1 border">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="vr"></span>
                                <input type="text" name="transfer_name" placeholder="Nhập họ và tên">
                            </div>
                            <div class="clr"></div>
                        </div>
                        <div class="my-form-group-1 marginbottom15">
                            <div class="my-form-control-1">Nhập số điện thoại*</div>
                            <div class="my-form-control-1 border">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span class="vr"></span>
                                <input type="tel" name="transfer_phone" placeholder="Nhập số điện thoại">
                            </div>
                            <div class="clr"></div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary my-btn btn-transfer" style="padding-left: 70px; padding-right: 70px;"> TIẾP TỤC  <i class="fa fa-sign-in" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <p class="methods_choose" data-toggle="collapse" data-target="#mobile_method_content" aria-expanded="false" aria-controls="mobile_method_content"> &nbsp; <i class="fa fa-circle-o" aria-hidden="true"></i> &nbsp;&nbsp; Thanh toán bằng thẻ cào điện thoại </p>
            <div class="row collapse" id="mobile_method_content">
                <div class="col-xs-12">
                    <?php
                    $user_id = $this->session->userdata('user_id');
                    if (!isset($user_id)) {
                        ?>
                        <p class="margintop45 text-center marginbottom15"> <strong> Bạn cần đăng nhập để mua khóa học bằng thẻ cào </strong></p>
                        <div class="row">
                            <div class="col-md-offset-3 col-md-6">
                                <a href="" class="btn btn-success btn-lg btn-block menu_login_mobile" redirect_type="mobile"> ĐĂNG NHẬP </a>
                            </div>
                        </div>
                        <input type="hidden" class="redirect" value="<?php echo base_url(); ?>course/purchase" />
                        <?php
                    } else {
                        if (10 < $solansai) {
                            ?>
                            <div class="red">
                                Bạn đã quá 10 lần nhập sai tối đa mã thẻ, vui lòng liên hệ với ban quản trị để được trợ giúp
                            </div>
                        <?php } else { ?>
                            <p class="text-underline"> <strong> Lưu ý: </strong></p>
                            <p>  Nếu thẻ có mệnh giá nhỏ hơn tổng tiền mua khóa học thì mệnh giá tiền thẻ cào sẽ được cộng vào số dư tài khoản lakita của bạn! </p>
                            <ul class="marginleft30">
                                <li>
                                    Bạn chỉ được nhập sai tối đa 10 lần, nếu quá sẽ bị khóa chức năng nạp tiền bằng thẻ cào
                                </li>
                                <li>
                                    Bạn còn <?php echo 10 - $solansai; ?> lần nhập sai nữa
                                </li>
                            </ul>
                            <p class="text-underline"><strong>Vui lòng chọn loại thẻ, sau đó nhập chính xác mã thẻ và số serial </strong></p>
                            <div id="form_mobi">
                                <div class="form-group">
                                    <table style="margin: 0px auto;" class="tbl_cards">
                                        <tr>
                                            <td style="padding-left:0px;padding-top:5px" align="left"><span for="107"><img  src="<?php echo base_url() . "styles/v2.0/nganluong/images/includes/images/viettel.jpg"; ?>" width="110" height="35" /></span></td>
                                            <td style="padding-top:5px;padding-left:5px"><span for="93"><img  src="<?php echo base_url() . "styles/v2.0/nganluong/images/includes/images/vinaphone.jpg" ?>"/></span></td>
                                            <td style="padding-left:10px;padding-top:5px" align="right" ><span for="92"><img  src="<?php echo base_url() . "styles/v2.0/nganluong/images/includes/images/mobifone.jpg"; ?>"/></span> </td>
                                        <tr>
                                            <td align="center" style="padding-bottom:0px;padding-right:0px">
                                                <input type="radio"  name="select_method" checked="true" value="VIETTEL" id="107" />
                                            </td>
                                            <td align="center" style="padding-bottom:0px;padding-left:5px">
                                                <input type="radio"  name="select_method" value="VNP" id="93" />
                                            </td>
                                            <td align="center" style="padding-bottom:0px;">
                                                <input type="radio" name="select_method"  value="VMS" id="92"  />
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-6">
                                        <div class="form-group">
                                            <label>Mã số thẻ :</label>
                                            <input type="text" id="txtSoPin" name="txtSoPin" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label>Số Seri :</label>
                                            <input type="text" id="txtSoSeri" name="txtSoSeri" class="form-control" />
                                        </div>
                                        <div class="form-group text-center">
                                            <input type="hidden" name="NLNapThe" value="NLNapThe" />
                                            <button class="btn btn-success my-btn btn-mobi"> NẠP THẺ <i class="fa fa-sign-in" aria-hidden="true"></i> </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <hr>
            <p class="methods_choose" data-toggle="collapse" data-target="#atm_method_content" aria-expanded="false" aria-controls="atm_method_content"> &nbsp; <i class="fa fa-circle-o" aria-hidden="true"></i> &nbsp;&nbsp; Thanh toán trực tuyến bằng thẻ ATM </p>
            <div class="row collapse" id="atm_method_content">
                <div class="col-xs-12">
                    <?php if (!isset($user_id)) { ?>
                        <p class="margintop45 text-center marginbottom15"> <strong> Bạn cần đăng nhập để mua khóa học bằng thẻ ATM </strong></p>
                        <div class="row">
                            <div class="col-md-offset-3 col-md-6">
                                <a href="" class="btn btn-success btn-lg btn-block menu_login_mobile" redirect_type="atm"> ĐĂNG NHẬP </a>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <p class="marginbottom20"> Mời bạn chọn thẻ ngân hàng phát hàng thẻ ATM của bạn, sau đó ấn "Tiếp tục" </p>
                        <div id="form_atm">
                            <ul class="cardList clearfix">
                                <li class="bank-online-methods ">
                                    <label for="vcb_ck_on">
                                        <i class="BIDV" title="Ngân hàng TMCP Đầu tư &amp; Phát triển Việt Nam"></i>
                                        <input type="radio" value="BIDV"  name="bankcode" >

                                    </label></li>
                                <li class="bank-online-methods ">
                                    <label for="vcb_ck_on">
                                        <i class="VCB" title="Ngân hàng TMCP Ngoại Thương Việt Nam"></i>
                                        <input type="radio" value="VCB"  name="bankcode" >

                                    </label></li>

                                <li class="bank-online-methods ">
                                    <label for="vnbc_ck_on">
                                        <i class="DAB" title="Ngân hàng Đông Á"></i>
                                        <input type="radio" value="DAB"  name="bankcode" >

                                    </label></li>

                                <li class="bank-online-methods ">
                                    <label for="tcb_ck_on">
                                        <i class="TCB" title="Ngân hàng Kỹ Thương"></i>
                                        <input type="radio" value="TCB"  name="bankcode" >

                                    </label></li>

                                <li class="bank-online-methods ">
                                    <label for="sml_atm_mb_ck_on">
                                        <i class="MB" title="Ngân hàng Quân Đội"></i>
                                        <input type="radio" value="MB"  name="bankcode" >

                                    </label></li>

                                <li class="bank-online-methods ">
                                    <label for="sml_atm_vib_ck_on">
                                        <i class="VIB" title="Ngân hàng Quốc tế"></i>
                                        <input type="radio" value="VIB"  name="bankcode" >

                                    </label></li>

                                <li class="bank-online-methods ">
                                    <label for="sml_atm_vtb_ck_on">
                                        <i class="ICB" title="Ngân hàng Công Thương Việt Nam"></i>
                                        <input type="radio" value="ICB"  name="bankcode" >

                                    </label></li>

                                <li class="bank-online-methods ">
                                    <label for="sml_atm_exb_ck_on">
                                        <i class="EXB" title="Ngân hàng Xuất Nhập Khẩu"></i>
                                        <input type="radio" value="EXB"  name="bankcode" >

                                    </label></li>

                                <li class="bank-online-methods ">
                                    <label for="sml_atm_acb_ck_on">
                                        <i class="ACB" title="Ngân hàng Á Châu"></i>
                                        <input type="radio" value="ACB"  name="bankcode" >

                                    </label></li>

                                <li class="bank-online-methods ">
                                    <label for="sml_atm_hdb_ck_on">
                                        <i class="HDB" title="Ngân hàng Phát triển Nhà TPHCM"></i>
                                        <input type="radio" value="HDB"  name="bankcode" >

                                    </label></li>

                                <li class="bank-online-methods ">
                                    <label for="sml_atm_msb_ck_on">
                                        <i class="MSB" title="Ngân hàng Hàng Hải"></i>
                                        <input type="radio" value="MSB"  name="bankcode" >

                                    </label></li>

                                <li class="bank-online-methods ">
                                    <label for="sml_atm_nvb_ck_on">
                                        <i class="NVB" title="Ngân hàng Nam Việt"></i>
                                        <input type="radio" value="NVB"  name="bankcode" >

                                    </label></li>

                                <li class="bank-online-methods ">
                                    <label for="sml_atm_vab_ck_on">
                                        <i class="VAB" title="Ngân hàng Việt Á"></i>
                                        <input type="radio" value="VAB"  name="bankcode" >

                                    </label></li>

                                <li class="bank-online-methods ">
                                    <label for="sml_atm_vpb_ck_on">
                                        <i class="VPB" title="Ngân Hàng Việt Nam Thịnh Vượng"></i>
                                        <input type="radio" value="VPB"  name="bankcode" >

                                    </label></li>

                                <li class="bank-online-methods ">
                                    <label for="sml_atm_scb_ck_on">
                                        <i class="SCB" title="Ngân hàng Sài Gòn Thương tín"></i>
                                        <input type="radio" value="SCB"  name="bankcode" >

                                    </label></li>
                                <li class="bank-online-methods ">
                                    <label for="bnt_atm_pgb_ck_on">
                                        <i class="PGB" title="Ngân hàng Xăng dầu Petrolimex"></i>
                                        <input type="radio" value="PGB"  name="bankcode" >

                                    </label></li>

                                <li class="bank-online-methods ">
                                    <label for="bnt_atm_gpb_ck_on">
                                        <i class="GPB" title="Ngân hàng TMCP Dầu khí Toàn Cầu"></i>
                                        <input type="radio" value="GPB"  name="bankcode" >

                                    </label></li>

                                <li class="bank-online-methods ">
                                    <label for="bnt_atm_agb_ck_on">
                                        <i class="AGB" title="Ngân hàng Nông nghiệp &amp; Phát triển nông thôn"></i>
                                        <input type="radio" value="AGB"  name="bankcode" >

                                    </label></li>

                                <li class="bank-online-methods ">
                                    <label for="bnt_atm_sgb_ck_on">
                                        <i class="SGB" title="Ngân hàng Sài Gòn Công Thương"></i>
                                        <input type="radio" value="SGB"  name="bankcode" >

                                    </label></li>
                                <li class="bank-online-methods ">
                                    <label for="sml_atm_bab_ck_on">
                                        <i class="BAB" title="Ngân hàng Bắc Á"></i>
                                        <input type="radio" value="BAB"  name="bankcode" >

                                    </label></li>
                                <li class="bank-online-methods ">
                                    <label for="sml_atm_bab_ck_on">
                                        <i class="TPB" title="Tền phong bank"></i>
                                        <input type="radio" value="TPB"  name="bankcode" >

                                    </label></li>
                                <li class="bank-online-methods ">
                                    <label for="sml_atm_bab_ck_on">
                                        <i class="NAB" title="Ngân hàng Nam Á"></i>
                                        <input type="radio" value="NAB"  name="bankcode" >

                                    </label></li>
                                <li class="bank-online-methods ">
                                    <label for="sml_atm_bab_ck_on">
                                        <i class="SHB" title="Ngân hàng TMCP Sài Gòn - Hà Nội (SHB)"></i>
                                        <input type="radio" value="SHB"  name="bankcode" >

                                    </label></li>
                                <li class="bank-online-methods ">
                                    <label for="sml_atm_bab_ck_on">
                                        <i class="OJB" title="Ngân hàng TMCP Đại Dương (OceanBank)"></i>
                                        <input type="radio" value="OJB"  name="bankcode" >

                                    </label></li>
                            </ul>
                            <div class="text-center">
                                <input type="hidden" value="ATM_ONLINE" name="option_payment" />
                                <button class="btn btn-success my-btn btn-atm" > TIẾP TỤC <i class="fa fa-sign-in" aria-hidden="true"></i> </button>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <hr>
            <p class="methods_choose" data-toggle="collapse" data-target="#visa_method_content" aria-expanded="false" aria-controls="visa_method_content"> &nbsp; <i class="fa fa-circle-o" aria-hidden="true"></i> &nbsp;&nbsp; Thanh toán bằng thẻ VISA/MasterCard </p>
            <div class="row collapse" id="visa_method_content">
                <div class="col-xs-12">
                    <?php if (!isset($user_id)) { ?>
                        <p class="margintop45 text-center marginbottom15"> <strong> Bạn cần đăng nhập để mua khóa học bằng thẻ VISA/MasterCard </strong></p>
                        <div class="row">
                            <div class="col-md-offset-3 col-md-6">
                                <a href="" class="btn btn-success btn-lg btn-block menu_login_mobile" redirect_type="visa"> ĐĂNG NHẬP </a>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div id="form_visa">
                            <p class="marginbottom20 text-center"> Mời bạn chọn loại thẻ, sau đó bấm "Tiếp tục" </p>
                            <ul class="cardList clearfix" style="display:inline-block">
                                <li class="bank-online-methods ">
                                    <div> <img src="<?php echo base_url(); ?>styles/v2.0/img/course-detail/visa.png" class="img-responsive"/></div>
                                    <label for="vcb_ck_on">
                                        VISA <br/>
                                        <input type="radio" value="VISA"  name="bankcode" >
                                    </label>
                                </li>
                                <li class="bank-online-methods ">
                                    <div> <img src="<?php echo base_url(); ?>styles/v2.0/img/course-detail/MasterCard.png" class="img-responsive"/></div>
                                    <label for="vnbc_ck_on">
                                        MasterCard <br/> <input type="radio" value="MASTER"  name="bankcode" >
                                    </label>
                                </li>
                            </ul>
                            <div class="text-center">
                                <input type="hidden" value="VISA" name="option_payment" selected="true">
                                <button class="btn btn-success my-btn btn-visa" > TIẾP TỤC <i class="fa fa-sign-in" aria-hidden="true"></i> </button>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <hr>
            <p class="methods_choose" data-toggle="collapse" data-target="#lakita_method_content" aria-expanded="false" aria-controls="lakita_method_content"> &nbsp; <i class="fa fa-circle-o" aria-hidden="true"></i> &nbsp;&nbsp; Thanh toán bằng số dư LAKITA </p>
            <div class="row collapse" id="lakita_method_content">
                <div class="col-xs-12">
                    <?php if (!isset($user_id)) { ?>
                        <p class="margintop45 text-center marginbottom15"> <strong> Bạn cần đăng nhập để mua khóa học bằng số dư LAKITA </strong></p>
                        <div class="row">
                            <div class="col-md-offset-3 col-md-6">
                                <a href="" class="btn btn-success btn-lg btn-block menu_login_mobile" redirect_type="lakita"> ĐĂNG NHẬP </a>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="text-center">
                            <div class="balance1 marginbottom20">
                                Tài khoản hiện tại của bạn là : <span> <strong> <?php echo number_format($student[0]['balance'], 0, ",", ".") . " VNĐ"; ?> </strong></span>
                            </div>
                        </div>
                        <div class="text-center marginbottom20">
                            <button class="btn btn-primary my-btn btn-lakita" style="padding-left: 70px; padding-right: 70px;"> TIẾP TỤC  <i class="fa fa-sign-in" aria-hidden="true"></i></button>
                        </div>
                        <p class="bottom10"> Lưu ý: Nếu bạn có mã voucher, hãy nhập mã voucher vào ô bên phải và ấn "áp dụng" để được giảm giá! </p>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 purchase-info" style="overflow: hidden">
            <p class="info-title fontsize18">                      
                <strong>Thông tin mua hàng</strong>                 
            </p>
            <table class="table">
                <thead style="color: #999999;">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <strong><?php echo $curr_courses[0]['name']; ?>
                            </strong>
                        </td>
                        <td>
                            <strong>  <?php
                                $temp = $this->session->tempdata('priceVouched');
                                echo number_format(str_replace('.', '', $curr_courses[0]['price_root2']));
                                ?>  VNĐ
                            </strong>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php if (!isset($temp)) { ?>
                <hr style="margin-top: -20px;">
                <div class="voucher" style="margin-left: 13px;">
                    <p style="font-size: 16px;" class="text-center"><strong>Nhập mã voucher (nếu có):</strong></p>
                    <input style="width: 95%; border: 1px solid #DDDDDD;" type="text" name="voucher" placeholder="Nhập mã voucher tại đây" id="coupon"/>
                    <div class="text-center" style="width: 90%;">
                        <span class="displayinlineblock margintop10"><button type="button" id="voucher1">ÁP DỤNG</button></span>
                    </div>
                </div>
            <?php } ?>
            <hr style="margin-top: 12px;">
            <div class="tamtinh">
                <p style="float: left;">Tạm tính </p>
                <p style="text-align: right;">
                    <b class="price-modal" style="text-align: right;">
                        <?php
                        if ($curr_courses[0]['time_start_sale'] < time() && $curr_courses[0]['time_end_sale'] > time() & $curr_courses[0]['time_start_sale'] != 0 & $curr_courses[0]['time_start_sale'] != 0) {
                            $price_root = isset($temp) ? $temp : $curr_courses[0]['price_sale'];
                        } else {
                            $price_root = isset($temp) ? $temp : $curr_courses[0]['price_root2'];
                        }
                        echo number_format(str_replace('.', '', $price_root));
                        ?>  VNĐ
                    </b>
                </p></br>
                <p style="float: left; margin-top: -26px;">Khuyến mãi</p><p style="text-align: right; margin-top: -26px;"><b class="voucher-modal">
                        <?php
                        if ($curr_courses[0]['time_start_sale'] < time() && $curr_courses[0]['time_end_sale'] > time() & $curr_courses[0]['time_start_sale'] != 0 & $curr_courses[0]['time_start_sale'] != 0) {
                        echo number_format(str_replace('.', '', (isset($temp) ? ( str_replace('.', '', $curr_courses[0]['price_root2']) - $temp) : ( str_replace('.', '', $curr_courses[0]['price_root2']) - str_replace('.', '', $curr_courses[0]['price_sale'])))));
                        }else{
                        echo number_format(str_replace('.', '', (isset($temp) ? ( str_replace('.', '', $curr_courses[0]['price_root2']) - $temp) : 0)));
                        
                        }
                        ?> VNĐ
                    </b></p>
            </div>
            <hr>
            <div class="thanhtien" style="margin:0px  12px;">
                <strong>Thành tiền </strong>
                <p>(Đã bao gồm VAT)</p>           
                <span class="price-modal">
                    <strong>
                        <?php
//                                        $priceVouched = isset($temp) ? $temp : $curr_courses[0]['price_root'];
//                                        $priceVouched2 = isset($temp) ? $temp : $curr_courses[0]['price_root2'];
//                                        
//                                            echo number_format(str_replace('.', '', $priceVouched2));
                        if (isset($temp)) {
                            echo number_format(str_replace('.', '', $temp));
                        } else {
                            if ($curr_courses[0]['time_start_sale'] < time() && $curr_courses[0]['time_end_sale'] > time() & $curr_courses[0]['time_start_sale'] != 0 & $curr_courses[0]['time_start_sale'] != 0) {
                                echo number_format(str_replace('.', '', $curr_courses[0]['price_sale']));
                            } else {
                                echo number_format(str_replace('.', '', $curr_courses[0]['price_root2']));
                            }
                        }
                        ?> VNĐ
                    </strong>
                </span>
            </div>
            <p> <strong> Được giao hàng bởi </strong> </p>
            <div class="row giaohang margintop10 marginbottom10">
                <div class="col-xs-6">
                    <img src="<?php echo base_url(); ?>styles/v2.0/img/course-detail/viettel-post.png" />
                </div>
                <div class="col-xs-6">
                    <img src="<?php echo base_url(); ?>styles/v2.0/dungtt/img/bootstrap/8/baove.png">
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .method_title{
        font-size: 21px;

    }
    p, input, button, div{
        font-family: RobotoCondensed-Regular;
    }
    .methods_choose{
        font-size: 18px;
    }
    i.fa-circle-o{
        font-size: 19px;
    }
    .collapse, .purchase-info{
        font-size: 16px;
    }
    .methods_choose_active {
        background-color: #02561B;
        color: #fff;
        padding: 7px 0px;
        width: 130%;
        margin-left: -6%;
        padding-left: 6%;
    }
    ul{
        list-style-position: inside;
    }
    @media (max-width: 350px){
        .tbl_cards{
            margin-left: -25px !important;
        }
        .purchase-info{
            margin-top: 30px;
        }
    }
    .my-form-control-1 > input{
        border: none;
        padding-left: 10px;
        height: 38px;
        width: 90%;
    }
    .my-form-group-1 .my-form-control-1 .vr {
        width: 1px;
        height: 100%;
        border-right: 1px dotted #000;
        margin-left: 4px;
    }
    .my-form-group-1 .my-form-control-1:first-child {
        float:none;
        width: 90% !important;
        margin-bottom: 5px;
    }
</style>
<script>
    var collapsed = false;
    $(".methods_choose").click(function () {
        if (!collapsed) {
            $(".methods_choose").removeClass('methods_choose_active');
            $(this).addClass('methods_choose_active');
            collapsed = true;
        } else {
            $(".methods_choose").removeClass('methods_choose_active');
            collapsed = false;
        }
    });

</script>