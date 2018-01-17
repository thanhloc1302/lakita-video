<!-- trang đăng ký mua khóa hoc views/course/purchase -->
<?php
$redirect_type = $this->session->tempdata('redirect_type');
if (isset($redirect_type) && $redirect_type != '') {
    echo '<script>
        $(function () {
            $("#a_' . $redirect_type . '").click();
        });
    </script>';
}
?>
<!--    <script src="<?php echo base_url(); ?>styles/v2.0/js/home.js"></script>-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/course_purchase.css?ver=<?php echo _VER_CACHED_ ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/style.bootstrap8.lakita.css?ver=<?php echo _VER_CACHED_ ?>" />
<script src="<?php echo base_url(); ?>styles/v2.0/js/course_purchase.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<script src="<?php echo base_url(); ?>styles/v2.0/js/login.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<?php
if ($this->agent->is_mobile())
    $this->load->view('mobile/mobile_purchase');
else {
    ?>
    <div class="header">
        <?php $this->load->view('home/navbar'); ?>
<!--        <div class="row">
            <div class="col-md-6  my-row-1">
                <p class="choose_method"> CHỌN PHƯƠNG THỨC THANH TOÁN </p>
                <h1><strong><?php echo $curr_courses[0]['name']; ?></strong></h1>
            </div>
            <div class="col-md-6 searchBox">
            </div>
        </div>-->
    </div>
    <div class="container method margintop10">
        <div class="row">
            <div class="col-md-8">
                <div role="tabpanel">
                    <ul class="nav nav-tabs list-method-tabs" role="tablist">
                        <li role="presentation" class="active method-li-tab">
                            <a href="#method-cod" aria-controls="home" role="tab" data-toggle="tab">
                                <div> 
                                    <img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo base_url(); ?>styles/v2.0/img/course-purchase/cod.png" style="width:75px"/> </div>
                                <p class="margintop10">Giao khóa học và thu tiền tận nơi</p>
                                <span> <i class="fa fa-dot-circle-o" aria-hidden="true"></i> </span>
                            </a>
                        </li>
                        <li role="presentation" class="method-li-tab">
                            <a href="#method-direct" aria-controls="tab" role="tab" data-toggle="tab">
                                <div> <img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo base_url(); ?>styles/v2.0/img/course-purchase/direct.png" style="width:75px" /> </div>
                                <p class="margintop10">Thanh toán trực tiếp tại VP Lakita</p>
                                <span> <i class="fa fa-dot-circle-o" aria-hidden="true"></i> </span>
                            </a>
                        </li>
                        <li role="presentation" class="method-li-tab">
                            <a href="#method-transfer" aria-controls="tab" role="tab" data-toggle="tab">
                                <div> <img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo base_url(); ?>styles/v2.0/img/course-purchase/transfer.png" style="width:75px" /> </div>
                                <p class="margintop10">Chuyển khoản qua ngân hàng</p>
                                <span> <i class="fa fa-dot-circle-o" aria-hidden="true"></i> </span>
                            </a>
                        </li>
                        <li role="presentation" class="method-li-tab">
                            <a href="#method-mobile" aria-controls="tab" role="tab" data-toggle="tab" id="a_mobile">
                                <div> <img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo base_url(); ?>styles/v2.0/img/course-purchase/mobile.png" style="width:75px" /> </div>
                                <p class="margintop10">Thanh toán bằng thẻ cào điện thoại</p>
                                <span> <i class="fa fa-dot-circle-o" aria-hidden="true"></i> </span>
                            </a>
                        </li>
                        <li role="presentation" class="method-li-tab">
                            <a href="#method-atm" aria-controls="tab" role="tab" data-toggle="tab" id="a_atm">
                                <div> <img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo base_url(); ?>styles/v2.0/img/course-purchase/atm.png" style="width:75px" /> </div>
                                <p class="margintop10">Thanh toán trực tuyến bằng thẻ ATM</p>
                                <span> <i class="fa fa-dot-circle-o" aria-hidden="true"></i> </span>
                            </a>
                        </li>
                        <li role="presentation" class="method-li-tab">
                            <a href="#method-visa" aria-controls="tab" role="tab" data-toggle="tab" id="a_visa">
                                <div> <img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo base_url(); ?>styles/v2.0/img/course-purchase/visa.png" style="width:75px" /> </div>
                                <p class="margintop10">Thanh toán bằng thẻ VISA/MasterCard</p>
                                <span> <i class="fa fa-dot-circle-o" aria-hidden="true"></i> </span>
                            </a>
                        </li>
                        <li role="presentation" class="method-li-tab">
                            <a href="#method-lakita" aria-controls="tab" role="tab" data-toggle="tab" id="a_lakita">
                                <div> <img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo base_url(); ?>styles/v2.0/img/course-purchase/lakita.png" style="width:75px" /> </div>
                                <p class="margintop10">Thanh toán bằng số dư LAKITA</p>
                                <span> <i class="fa fa-dot-circle-o" aria-hidden="true"></i> </span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">

                        <div role="tabpanel" class="active tab-pane fade in margintop45" id="method-cod">
                            <?php if ($payed) { ?>
                                <div role="tabpanel" class="active tab-pane fade in margintop45">
                                    <div class="text-center">
                                        <P>Bạn đã mua khóa học này</P>
                                        <a class="btn btn-primary my-btn" href="<?php echo $first_lesson; ?>">  HỌC NGAY </a> 
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="my-form-group-1 marginbottom15">
                                    <div class="my-form-control-1">Họ và tên*</div>
                                    <div class="my-form-control-1 border">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <span class="vr"></span>
                                        <input type="text" name="cod_name" placeholder="Nhập họ và tên">
                                    </div>
                                    <div class="clr"></div>
                                </div>
                                <div class="my-form-group-1 marginbottom15">
                                    <div class="my-form-control-1">Email*</div>
                                    <div class="my-form-control-1 border">
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        <span class="vr"></span>
                                        <input type="text" name="cod_email" placeholder="Email">
                                    </div>
                                    <div class="clr"></div>
                                </div>
                                <div class="my-form-group-1 marginbottom15 hidden">
                                    <div class="my-form-control-1">Tỉnh/Thành Phố*</div>
                                    <div class="my-form-control-1 border">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <span class="vr"></span>
                                        <input type="text" name="cod_tinh" placeholder="Nhập Tỉnh/Thành Phố" value="VN">
                                    </div>
                                    <div class="clr"></div>
                                </div>
                                <div class="my-form-group-1 marginbottom15 hidden">
                                    <div class="my-form-control-1">Quận/Huyện*</div>
                                    <div class="my-form-control-1 border">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <span class="vr"></span>
                                        <input type="text" name="cod_quan" placeholder="Nhập Quận/Huyện" value="VN">
                                    </div>
                                    <div class="clr"></div>
                                </div>
                                <div class="my-form-group-1 marginbottom15">
                                    <div class="my-form-control-1">Địa chỉ*</div>
                                    <div class="my-form-control-1 border">
                                        <i class="fa fa-map" aria-hidden="true"></i>
                                        <span class="vr"></span>
                                        <input type="text" name="cod_dia_chi" placeholder="Nhập địa chỉ">
                                    </div>
                                    <div class="clr"></div>
                                </div>
                                <div class="my-form-group-1 marginbottom15">
                                    <div class="my-form-control-1">Nhập số điện thoại*</div>
                                    <div class="my-form-control-1 border">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <span class="vr"></span>
                                        <input type="tel" name="cod_phone" placeholder="Nhập số điện thoại">
                                    </div>
                                    <div class="clr"></div>
                                </div>
                                <hr>
                                <p>
                                    Lưu ý: Lakita.vn hoặc tổng đài tự động của chúng tôi sẽ liên hệ quý khách theo số điện thoại này để xác nhận hoặc thông báo giao hàng
                                </p>
                                <div class="text-center">
                                    <button class="btn btn-primary my-btn btn-cod" style="padding-left: 70px; padding-right: 70px; width: 30%;"> TIẾP TỤC  <i class="fa fa-sign-in" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="method-direct">

                                <p class="margintop10"> <strong> Thanh toán tại văn phòng LAKITA.VN </strong></p>
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="text-underline"> <strong> Địa chỉ văn phòng: </strong></p>
                                        <p class="text-underline">
                                            <strong> Hot line: </strong>
                                        </p>
                                    </div>
                                    <div class="col-md-9">
                                        <p>
                                            Phòng 701 CT1 - Chung cư Skylight - Ngõ Hòa Bình 6 - 125D Minh Khai - Q. Hai Bà Trưng
                                        </p>
                                        <p>1900 6361 95</p>
                                        <p>
                                            (Thời gian làm việc: từ 8:30 - 18:30 , từ Thứ 2 đến Chủ Nhật hàng tuần)
                                        </p>
                                    </div>
                                </div>

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
                                        <input id="csrf_test_name_purchase_direct" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <button class="btn btn-primary my-btn btn-direct" style="padding-left: 70px; padding-right: 70px; width: 30%;"> TIẾP TỤC  <i class="fa fa-sign-in" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                <div class="margintop20">
                                    <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1pLwglBU_8H3tEIXdubPeDggEf8o" width="740" height="480"></iframe>
                                </div>
                            <?php } ?>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="method-transfer">

                            <?php if ($payed) { ?>
                                <div role="tabpanel" class="active tab-pane fade in margintop45">
                                    <div class="text-center">
                                        <P>Bạn đã mua khóa học này</P>
                                        <a class="btn btn-primary my-btn" href="<?php echo $first_lesson; ?>">  HỌC NGAY </a> 
                                    </div>
                                </div>
                            <?php } else { ?>
                                <p class="margintop20"> <strong> Chuyển khoản ngân hàng </strong></p>
                                <p> Bạn có thể đến bất kỳ ngân hàng nào ở Việt Nam (hoặc sử dụng Internet Banking) để chuyển tiền theo thông tin bên dưới:</p>
                                <ul class="marginleft30">
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
                                        <input id="csrf_test_name_purchase_transfer" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <button class="btn btn-primary my-btn btn-transfer" style="padding-left: 70px; padding-right: 70px; width: 30%;"> TIẾP TỤC  <i class="fa fa-sign-in" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="method-mobile">


                            <?php
                            $user_id = $this->session->userdata('user_id');
                            if (!isset($user_id)) {
                                ?>
                                <p class="margintop45 text-center marginbottom15"> <strong> Bạn cần đăng nhập để mua khóa học bằng thẻ cào </strong></p>
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-6">
                                        <a href="<?php echo base_url() ?>dang-nhap.html" class="btn btn-success btn-lg btn-block" redirect_type="mobile"> ĐĂNG NHẬP </a>
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

                                    <?php if ($payed) { ?>
                                        <div role="tabpanel" class="active tab-pane fade in margintop45">
                                            <div class="text-center">
                                                <P>Bạn đã mua khóa học này</P>
                                                <a class="btn btn-primary my-btn" href="<?php echo $first_lesson; ?>">  HỌC NGAY </a> 
                                            </div>
                                        </div>
                                    <?php } else { ?>

                                        <p class="margintop20"> <strong> Thanh toán bằng thẻ cào điện thoại </strong></p>
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
                                                <table style="margin: 0px auto;">
                                                    <tr>
                                                        <td style="padding-left:0px;padding-top:5px" align="left"><span for="107"><img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo base_url() . "styles/v2.0/nganluong/images/includes/images/viettel.jpg"; ?>" width="110" height="35" /></span></td>
                                                        <td style="padding-top:5px;padding-left:5px"><span for="93"><img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo base_url() . "styles/v2.0/nganluong/images/includes/images/vinaphone.jpg" ?>"/></span></td>
                                                        <td style="padding-left:10px;padding-top:5px" align="right" ><span for="92"><img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo base_url() . "styles/v2.0/nganluong/images/includes/images/mobifone.jpg"; ?>"/></span> </td>
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
                                                        <button class="btn btn-success my-btn btn-mobi" > NẠP THẺ <i class="fa fa-sign-in" aria-hidden="true"></i> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="method-atm">
                            <?php if (!isset($user_id)) { ?>
                                <p class="margintop45 text-center marginbottom15"> <strong> Bạn cần đăng nhập để mua khóa học bằng thẻ ATM </strong></p>
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-6">
                                        <a href="<?php echo base_url() ?>dang-nhap.html" class="btn btn-success btn-lg btn-block" redirect_type="atm"> ĐĂNG NHẬP </a>
                                    </div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <?php if ($payed) { ?>
                                    <div role="tabpanel" class="active tab-pane fade in margintop45">
                                        <div class="text-center">
                                            <P>Bạn đã mua khóa học này</P>
                                            <a class="btn btn-primary my-btn" href="<?php echo $first_lesson; ?>">  HỌC NGAY </a> 
                                        </div>
                                    </div>
                                <?php } else { ?>

                                    <p class="margintop20"> <strong> Thanh toán trực tiếp bằng thẻ ATM </strong></p>
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
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="method-visa">
                            <?php if (!isset($user_id)) { ?>
                                <p class="margintop45 text-center marginbottom15"> <strong> Bạn cần đăng nhập để mua khóa học bằng thẻ VISA/MasterCard </strong></p>
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-6">
                                        <a href="<?php echo base_url() ?>dang-nhap.html" class="btn btn-success btn-lg btn-block" redirect_type="visa"> ĐĂNG NHẬP </a>
                                    </div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <?php if ($payed) { ?>
                                    <div role="tabpanel" class="active tab-pane fade in margintop45">
                                        <div class="text-center">
                                            <P>Bạn đã mua khóa học này</P>
                                            <a class="btn btn-primary my-btn" href="<?php echo $first_lesson; ?>">  HỌC NGAY </a> 
                                        </div>
                                    </div>
                                <?php } else { ?>

                                <div id="form_visa">
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-3">
                                                <p class="margintop20 text-center"> <strong> Thanh toán bằng thẻ VISA/MasterCard </strong></p>
                                                <p class="marginbottom20 text-center"> Mời bạn chọn loại thẻ, sau đó bấm "Tiếp tục" </p>
                                                <ul class="cardList clearfix" style="margin: 22px 86px;">
                                                    <li class="bank-online-methods ">
                                                        <div> <img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo base_url(); ?>styles/v2.0/img/course-detail/visa.png" class="img-responsive"/></div>
                                                        <label for="vcb_ck_on">
                                                            VISA <br/>
                                                            <input type="radio" value="VISA"  name="bankcode" >
                                                        </label>
                                                    </li>
                                                    <li class="bank-online-methods ">
                                                        <div> <img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo base_url(); ?>styles/v2.0/img/course-detail/MasterCard.png" class="img-responsive"/></div>
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
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="method-lakita">
                            <?php if (!isset($user_id)) { ?>
                                <p class="margintop45 text-center marginbottom15"> <strong> Bạn cần đăng nhập để mua khóa học bằng số dư LAKITA </strong></p>
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-6">
                                        <a href="<?php echo base_url() ?>dang-nhap.html" class="btn btn-success btn-lg btn-block" redirect_type="lakita"> ĐĂNG NHẬP </a>
                                    </div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <?php if ($payed) { ?>
                                    <div role="tabpanel" class="active tab-pane fade in margintop45">
                                        <div class="text-center">
                                            <P>Bạn đã mua khóa học này</P>
                                            <a class="btn btn-primary my-btn" href="<?php echo $first_lesson; ?>">  HỌC NGAY </a> 
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <p class="margintop20 text-center marginbottom20"> <strong> Thanh toán bằng số dư LAKITA </strong></p>
                                    <div class="text-center">
                                        <div class="balance1 marginbottom20">
                                            Tài khoản hiện tại của bạn là : <span> <strong> <?php echo number_format($student[0]['balance'], 0, ",", ".") . " VNĐ"; ?> </strong></span>
                                        </div>
                                    </div>
                                    <div class="text-center marginbottom20">
                                        <input id="csrf_test_name_purchase_lakita" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <button class="btn btn-primary my-btn btn-lakita" style="padding-left: 70px; padding-right: 70px;"> TIẾP TỤC  <i class="fa fa-sign-in" aria-hidden="true"></i></button>
                                    </div>
                                    <p class="bottom10"> Lưu ý: Nếu bạn có mã voucher, hãy nhập mã voucher vào ô bên phải và ấn "áp dụng" để được giảm giá! </p>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 purchase-info">
                <p class="info-title">                      
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
                                <h2 style="margin-top: 2px; font-size: 16px"><strong><?php echo $curr_courses[0]['name']; ?></strong></h2>
                            </td>
                            <td>
                                <strong> <?php
                                    $temp = $this->session->tempdata('priceVouched');
                                    echo number_format(str_replace('.', '', $curr_courses[0]['price_root2']));
                                    ?> VNĐ
                                </strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php if (!isset($temp)) { ?>
                    <hr style="margin-top: -20px;">
                    <div class="voucher" style="margin-left: 13px;">
                        <p style="font-size: 16px;"><strong>Nhập mã voucher (nếu có):</strong></p>
                        <input type="text" name="voucher" placeholder="Nhập mã voucher tại đây" id="coupon"/>
                        <span><button type="button" id="voucher1">ÁP DỤNG</button></span>
                    </div>
                <?php } ?>
                <hr style="margin-top: 12px;">
                <div class="tamtinh">
                    <p style="float: left;">Tạm tính </p><p style="text-align: right;"><b class="price-modal" style="text-align: right;">
                            <?php
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
                        </b></p></br>
                    <p style="float: left; margin-top: -26px;">Khuyến mãi</p><p style="text-align: right; margin-top: -26px;"><b class="voucher-modal">
                            <?php
                            if ($curr_courses[0]['time_start_sale'] < time() && $curr_courses[0]['time_end_sale'] > time() & $curr_courses[0]['time_start_sale'] != 0 & $curr_courses[0]['time_start_sale'] != 0) {
                                echo number_format(str_replace('.', '', (isset($temp) ? ( str_replace('.', '', $curr_courses[0]['price_root2']) - $temp) : ( str_replace('.', '', $curr_courses[0]['price_root2']) - str_replace('.', '', $curr_courses[0]['price_sale'])))));
                            } else {
                                echo number_format(str_replace('.', '', (isset($temp) ? ( str_replace('.', '', $curr_courses[0]['price_root2']) - $temp) : 0)));
                            }
                            ?> VNĐ
                        </b></p>
                </div>
                <hr>
                <div class="thanhtien" style="margin:0px  12px;">
                    <strong>Thành tiền </strong>
                    <p>(Đã bao gồm VAT)</p>           
                    <span class="price-modal"><strong>
                            <?php
                            if (isset($temp)) {
                                $priceVouched2 = $temp;
                            } else {
                                if ($curr_courses[0]['time_start_sale'] < time() && $curr_courses[0]['time_end_sale'] > time() & $curr_courses[0]['time_start_sale'] != 0 & $curr_courses[0]['time_start_sale'] != 0) {
                                    $priceVouched2 = $curr_courses[0]['price_sale'];
                                } else {
                                    $priceVouched2 = $curr_courses[0]['price_root2'];
                                }
                            }

                            echo number_format(str_replace('.', '', $priceVouched2));
                            ?> VNĐ
                        </strong></span>
                </div>

                <div class="row giaohang margintop10 marginbottom10">
                    <div class="col-md-5 paddingleft28">
                        <p> <strong> Được giao hàng bởi </strong> </p>
                        <img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo base_url(); ?>styles/v2.0/img/course-detail/viettel-post.png" />
                    </div>
                    <div class="col-md-7 text-right">
                        <img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo base_url(); ?>styles/v2.0/dungtt/img/bootstrap/8/baove.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php
}


