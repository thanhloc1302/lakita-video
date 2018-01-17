<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/student.css?ver=<?php echo _VER_CACHED_ ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/style.bootstrap11.lakita.css?ver=<?php echo _VER_CACHED_ ?>" />
<script src="<?php echo base_url(); ?>styles/v2.0/js/student.min.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<?php
if ($this->agent->is_mobile()) {
    $this->load->view('mobile/my_courses');
} else {
    ?>
    <div class="header">
        <?php $this->load->view('home/navbar'); ?>
        <!--        <div class="row">
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
        ?>" alt="lakita" class="img-circle avatar" />
                            </div>
                            <div class="col-md-6 marginleft15">
                                <h1> <strong> <?php echo $student[0]['name']; ?> </strong></h1>
                                <p> Khóa học của tôi </p>
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
                                <li class="active"><a href="khoa-hoc-cua-toi.html"><i class="fa fa-leanpub" aria-hidden="true"></i> &nbsp; <strong> Khóa học của tôi </strong> </a></li>
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
                    <!--                <div class="QC">
                                        <div class="row">
                                            <a ><img src="<?php echo base_url(); ?>styles/v2.0/dungtt/img/bootstrap/11/QC-2.png"></a>
                                        </div>
                                    </div>-->
                </aside>
            </div>
            <div class="col-md-9">
                <div class="alert alert-info" role="alert" style="font-family: roboto; font-size: 18px;"> 
                    <a href="https://lakita.vn/khoa-hoc-yoga-danh-cho-nguoi-lam-van-phong-783.html">
                        [LAKITA.VN] Chương trình Tri ân khách hàng, Lakita gửi Tặng Miễn Phí 1 tháng học Yoga Online tại Lakita.vn (20/12-20/1).
                    </a>
                </div>


                <section class="group1">
                    <p><a >Trang chủ</a> / <a > Quản lý giao dịch</a> / <a > Khóa học của tôi</a></p>
                    <h3 class="lakita"><i class="fa fa-leanpub" aria-hidden="true"></i> Khóa học của tôi (<?php echo count($courses); ?>)</h3>
                    <table class="table table-bordered" >
                        <thead>
                            <tr>
                                <th>Khóa học (<?php echo count($courses); ?>)</th>
                                <th style="width: 165px;" class="text-center">Hoàn thành bài giảng</th>
                                <th class="text-center">Danh mục khóa học
    <!--                                        <i class="fa fa-sort" aria-hidden="true"></i>-->
                                </th>
                                <th class="text-center">Xem thêm</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
//                            $user_id = $this->session->userdata('user_id');
//                            if($user_id == 2626) {
//                                echo '<pre>';
//                                print_r($courses);
//                                die;
//                            }
                            foreach ($courses as $key => $value) {
                                if (isset($value['speaker'][0])) {
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-5 paddingright0">
                                                    <a 
                                                        href="<?php echo base_url() . $value['slug'] . '-7' . $value['id'] . '.html'; ?>" 
                                                        title="<?php echo $value['name']; ?>">
                                                        <img alt="<?php echo $value['name']; ?>" src="<?php echo 'https://lakita.vn/' . $value['image']; ?>" class="lesson-thumnail" />
                                                    </a>
                                                </div>
                                                <div class="col-md-7 paddingleft0">
                                                    <p>               
                                                        <a 
                                                            href="<?php echo base_url() . $value['slug'] . '-7' . $value['id'] . '.html'; ?>" 
                                                            title="<?php echo $value['name']; ?>">
                                                            <strong>
                                                                <?php echo ($value['is_trial_learn'] == true) ? '[Học thử] ' . $value['name'] : (($value['trial_learn'] == 1) ? '[Trial] ' . $value['name'] : $value['name']); ?> 
                                                                <?php
                                                                if (isset($value['gift'])) {
                                                                    echo '<span style="color:red"> (quà tặng) </span>';
                                                                }
                                                                ?>
                                                            </strong>
                                                        </a>
                                                    </p>
                                                    <p>Giảng viên: <?php echo $value['speaker'][0]['name']; ?></p>
                                                    <p class="lakita">Tổng số <?php echo $value['total_video']; ?> bài học</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <strong>Hoàn thành <?php echo $value['count_all_learn']; ?> bài</strong>
            <!--                                                <p>Đạt lever: <span><b>5</b></span></p>
                                                <p>Điểm: <span><b>20</b></span></p>-->
                                            </div>
                                        </td>
                                        <td> <?php echo $value['group_course_name']; ?></td>
                                        <td class="gr1-td4">
                                            <p><?php echo $value['total_cmt']; ?> bình luận</p>
                                            <p>Tham gia: <?php echo date('d/m/Y', $value['date_join_course']); ?></p>
            <!--                                            <p>Hoàn thành 5 bài về nhà</p>-->
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
    <!--                                <tr>
    <td></td>
    <td></td>
    <td colspan="2">
    <ul class="nextCourse">
    <li> &lt; </li>
    <li class="active">1</li>
    <li >2</li>
    <li >3</li>
    <li >4</li>
    <li >5</li>
    <li> &gt; </li>
    </ul>
    </td>
    </tr>-->
                        </tbody>
                    </table>
                </section>
    <!--                <section class="group2">
                    <p style="color: green; margin-left: 5px; font-size: 17px;"><i class="fa fa-toggle-on" aria-hidden="true"></i><strong> Khóa học khác</strong></p>
                    <div class="row listCourse">
                <?php
                $i = 1;
                foreach ($other_courses as $key => $value) {
                    ?>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                    <a href="<?php echo base_url() . $value['slug'] . '-2' . $value['id']; ?>.html" title="<?php echo $value['name']; ?>">
                                                        <div> <img src="<?php echo 'https://lakita.vn/' . $value['image']; ?>" alt="<?php echo $value['name']; ?>" class="img-responsive"> </div>
                                                        <p class="courseName"><?php echo $value['name']; ?></p>
                                                    </a>
                                                    <p class="teacher"><?php echo $value['speaker_name']; ?></p>
                                                    <p class="price"> <?php echo number_format(str_replace('.', '', $value['price_root']), 0, ',', '.') . " VNĐ"; ?></p>
                                                </div>
                    <?php
                    if ($i % 3 == 0)
                        echo '<div class="clearfix visible-md-block visible-lg-block"></div>';
                    if ($i % 2 == 0)
                        echo '<div class="clearfix visible-sm-block"></div>';
                    $i++;
                }
                ?>
                    </div>
                </section>-->
            </div>
        </div>
    </div>

    <!--*********************************************************DUNG TT (hết)***********************************************-->
    <?php
}
