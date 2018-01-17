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
                            <li class="active"><a href="khoa-hoc-cua-toi.html"><i class="fa fa-leanpub" aria-hidden="true"></i> &nbsp; <strong> Khóa học của tôi </strong> </a></li>
                            <hr>
                            <li><a ><i class="fa fa-bar-chart" aria-hidden="true"></i> &nbsp;  Tiến độ học tập</a></li>
                            <hr>
                            <li><a ><i class="fa fa-leanpub" aria-hidden="true"></i> &nbsp; Bài tập luyện tập</a></li>
                            <hr>
                            <li><a href="nap-tien-vao-tai-khoan.html"><i class="fa fa-usd" aria-hidden="true"></i> &nbsp; Nạp tiền vào tài khoản</a></li>
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
                <p><a >Trang chủ</a> / <a > Quản lý giao dịch</a> / <a > Khóa học của tôi</a></p>
                <h3 class="lakita"><i class="fa fa-leanpub" aria-hidden="true"></i> Khóa học của tôi (<?php echo count($courses); ?>)</h3>
            </div>
            <?php
            foreach ($courses as $key => $value) {
                ?>
                <div class="row">
                    <div class="col-xs-5">
                        <a 
                        <?php if ($value['first_course'] != '') { ?>
                                href="<?php echo $value['first_course']; ?>" 
                            <?php } ?>
                            title="<?php echo $value['name']; ?>">
                            <img alt="<?php echo $value['name']; ?>" src="<?php echo 'https://lakita.vn/' . $value['image']; ?>" class="img-responsive" />
                        </a>
                    </div>
                    <div class="col-xs-7 course_purchased">
                        <p>
                            <a 
                            <?php if ($value['first_course'] != '') { ?>
                                    href="<?php echo $value['first_course']; ?>" 
                                <?php } ?>
                                title="<?php echo $value['name']; ?>">
                                <strong><?php echo ($value['is_trial_learn'] == true) ? '[Học thử] ' . $value['name'] : (($value['trial_learn'] == 1) ? '[Trial] ' . $value['name'] : $value['name']); ?> </strong>
                            </a>
                        </p>
                        <p>Giảng viên: <?php echo $value['speaker'][0]['name']; ?></p>
                        <p>Tổng số <strong> <?php echo $value['total_video']; ?> </strong> bài học</p>
                        <p><strong> <?php echo $value['total_cmt']; ?></strong> bình luận</p>
                        <p>Hoàn thành<strong> <?php echo $value['count_all_learn']; ?> </strong> bài </p>
                        <p>Tham gia: <?php echo date('d/m/Y', $value['date_join_course']); ?></p>
                        <p> <a href="<?php echo $value['first_course']; ?>" class="btn btn-success"> Học ngay </a></p>
                    </div>
                </div>
                <hr/>
                <?php
            }
            ?>
            
        </div>
    </div>
    <div class="row" style="font-family: RobotoCondensed-Regular; overflow: hidden">
                <div class="col-xs-12">
                    <h3 class="margintop45 marginbottom35 fontRoboto"> CÁC KHÓA HỌC KHÁC</h3>
                    <div class="fontsize16">
                        <div class="row listCourse">
                            <?php
                            foreach ($other_courses as $key => $value) {
                                $firs_courses = array_filter(explode(',', $value['speaker_id']));
                                $firs_courses = str_replace('-', '', $firs_courses[0]);
                                $speaker = $this->lib_mod->detail('speaker', array('id' => $firs_courses));
                                ?>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <a href="<?php echo base_url() . $value['slug'] . '-2' . $value['id']; ?>.html" title="<?php echo $value['name']; ?>">
                                        <div> <img src="<?php echo 'https://lakita.vn/' . $value['image']; ?>" alt="<?php echo $value['name']; ?>" class="img-responsive"> </div>
                                        <p class="courseName"><?php echo $value['name']; ?></p>
                                    </a>
                                    <p class="teacher"><?php echo $speaker[0]['name']; ?></p>
                                    <p class="price"> <?php echo number_format(str_replace('.', '', $value['price_root']), 0, ',', '.') . " đ"; ?></p>
                                </div>
                            <?php } ?>
                        </div>
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
