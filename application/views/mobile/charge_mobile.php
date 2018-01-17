<?php $this->load->view('mobile/navbar'); ?>
<?php $this->load->view('mobile/dashboard'); ?>
<div class="container">
    <div class="row" style="font-family: RobotoCondensed-Regular; overflow: hidden">
        <div class="col-sm-4 hidden-xs">
            <aside class="left-sidebar">
                <div class="all-side">
                    <div class="row side-row-1">
                        <button type="text"><strong>QUẢN LÝ GIAO DỊCH</strong></button>
                        <ul style="margin-left: 35px;">
                            <li><a href="khoa-hoc-cua-toi.html"><i class="fa fa-leanpub" aria-hidden="true"></i> &nbsp; <strong> Khóa học của tôi </strong> </a></li>
                            <hr>
                            <li><a ><i class="fa fa-bar-chart" aria-hidden="true"></i> &nbsp;  Tiến độ học tập</a></li>
                            <hr>
                            <li><a ><i class="fa fa-leanpub" aria-hidden="true"></i> &nbsp; Bài tập luyện tập</a></li>
                            <hr>
                            <li class="active"><a href="nap-tien-vao-tai-khoan.html"><i class="fa fa-usd" aria-hidden="true"></i> &nbsp; Nạp tiền vào tài khoản</a></li>
                            <hr>
                            <li><a href="kich-hoat-khoa-hoc.html"><i class="fa fa-compress" aria-hidden="true"></i> &nbsp; Kích hoạt khóa học</a></li>
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
        <div class="col-xs-12 col-sm-8">
            <div class="group1">
                <p><a >Trang chủ</a> / <a > Quản lý giao dịch</a> / <a > Nạp tiền vào tiền vào tài khoản</a></p>
                <h4 class="lakita"><i class="fa fa-usd" aria-hidden="true"></i> Nạp tiền vào tiền vào tài khoản </h4>
            </div>
            <p>Số dư hiện tại của bạn là: <span class="red"><strong> <?php echo number_format($student[0]['balance'], 0, ",", ".") . " VNĐ"; ?> </strong></span></p>
            <div class="form-gr3">
                <div class="gr3-row-1" style="width: auto; padding-left: 5px;">
                        <p><strong>Chú ý:</strong></p>
                        <?php if (10 >= $solansai) { ?>
                            <p>Vui lòng nhập chính xác mã thẻ và số serial</p>
                            <p>Bạn chỉ được nhập sai tối đa 10 lần, nếu quá sẽ bị khóa chức năng nạp tiền bằng thẻ cào</p>
                            <p> Bạn còn <?php echo 10 - $solansai; ?> lần nhập sai nữa </p> 
                            <?php
                        }
                        ?>
                </div>
                <?php if (10 < $solansai) { ?>
                    <div class="red">
                        Bạn đã quá 10 lần nhập sai tối đa mã thẻ, vui lòng liên hệ với ban quản trị để được trợ giúp
                    </div>
                <?php } else { ?>
                    <form class="form-horizontal" role="form" action="<?php echo base_url() . 'student/naptienvaotaikhoan'; ?>" method="POST" enctype="multipart/form-data">
                        <div id="body12" style="margin: 0 auto;  padding: 10px;">
                            <div class="form-group">
                                <center> Chọn loại thẻ để nạp </center>
                            </div>

                            <div class="form-group">
                                <table style="margin: 0px auto;">
                                    <tr>
                                        <td style="padding-left:0px;padding-top:5px" align="right" ><span for="92"><img  src="<?php echo base_url() . "styles/v2.0/nganluong/images/includes/images/mobifone.jpg"; ?>"/></span> </td>
                                        <td style="padding-left:10px;padding-top:5px"><span for="93"><img  src="<?php echo base_url() . "styles/v2.0/nganluong/images/includes/images/vinaphone.jpg" ?>"/></span></td>
                                        <td style="padding-top:5px;padding-left:5px" align="left"><span for="107"><img  src="<?php echo base_url() . "styles/v2.0/nganluong/images/includes/images/viettel.jpg"; ?>" width="110" height="35" /></span></td>
                                    </tr>
                                    <tr>
                                        <td align="center" style="padding-bottom:0px;">
                                            <input type="radio" name="select_method"  value="VMS" id="92"  />
                                        </td>
                                        <td align="center" style="padding-bottom:0px;padding-left:5px">
                                            <input type="radio"  name="select_method" value="VNP" id="93" />
                                        </td>
                                        <td align="center" style="padding-bottom:0px;padding-right:0px">
                                            <input type="radio"  name="select_method" checked="true" value="VIETTEL" id="107" />
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
                                        <input type="submit" class="btn btn-success" name="NLNapThe" value="NẠP THẺ"  />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<style>
    .course_purchased >p{
        margin-bottom: 5px;
    }
    @media (min-width: 767px){
        .listCourse > div {height: 405px}
    }
</style>
