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
        <div class="col-xs-12 col-sm-8">
            <div class="group1">
                <p><a >Trang chủ</a> / <a > Quản lý giao dịch</a> / <a > Kích hoạt khóa học</a></p>
                <h3 class="lakita"><i class="fa fa-compress" aria-hidden="true"></i> Kích hoạt khóa học </h3>
            </div>
            <div class="gr4-row-2">
                <div class="form-group4" style="width: 95%; margin-left: -27px;">
                    <p style="margin: 10px 48px; position: absolute; color: #ccc;font-size: 20px;"><i class="fa fa-stack-exchange" aria-hidden="true"></i></i><p>
                        <input type="text" class="form-control" placeholder="Nhập mã kích hoạt tại đây" style="padding: 22px 38px;" id="cod_cod"/>
                </div>
                <div class="form-group4" style="width: 95%; margin-left: -27px;">
                    <p style="margin: 10px 48px; position: absolute; color: #ccc;font-size: 20px;"><i class="fa fa-stack-exchange" aria-hidden="true"></i></i><p>
                        <input type="text" class="form-control" placeholder="Nhập mã giới thiệu tại đây" style="padding: 22px 38px;" id="invite_code"/>
                </div>
                <div class="form-group4 text-center">
                    <button id="nap">KÍCH HOẠT <i class="fa fa-sign-out" aria-hidden="true"></i>  </button>
                </div>
                <p class="margintop20 paddingleft10"><b>Chú ý:</b></p>
                <p class="paddingleft10">
                        Khi sử dụng Mã Giới Thiệu bạn sẽ được cộng 5% giá trị khóa học vào tài khoản, người giới thiệu sẽ được cộng 10% giá trị khóa học vào tài khoản !<br>
                        Nếu không có Mã Giới Thiệu, bạn có thể bỏ trống. <br>
                        Bạn chỉ được nhập sai mã kích hoạt tối đa 5 lần, nếu quá chức năng này sẽ bị khóa! <br>
                        Nếu bạn gặp khó khăn trong việc kích hoạt khóa học, vui lòng liên hệ</br>
                        Hotline: <span><b>1900 6361 95</b></span>
                    </p>
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
