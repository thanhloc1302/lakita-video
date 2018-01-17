<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/student.css?ver=<?php echo _VER_CACHED_ ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/style.bootstrap11.lakita.css?ver=<?php echo _VER_CACHED_ ?>" />
<script src="<?php echo base_url(); ?>styles/v2.0/js/student.min.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<?php
if ($this->agent->is_mobile())
    $this->load->view('mobile/history_transaction_mobile');
else {
    ?>
<div class="header">
    <?php $this->load->view('home/navbar'); ?>
    <div class="row">
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
                    <p> Nạp tiền vào tài khoản </p>
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
    </div>
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
                            <li><a href="thong-tin-tai-khoan.html"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;  Thông tin tài khoản</a></li>
                            <hr>
                            <li class="active"><a href="lich-su-thanh-toan.html"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp; Lịch sử thanh toán</a></li>
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
        <div class="col-md-9">
            <section class="group3 margintop10">
                <div class="link">
                    <p><a >Trang chủ</a> / <a >Quản lý tài khoản</a> / <a >Lịch sử thanh toán</a></p>
                    <p style="color: green; margin-left: 5px; font-size: 20px;"><i class="fa fa-list-alt" aria-hidden="true"></i><strong> Lịch sử thanh toán</strong></p>
                </div>
                <hr style="margin-top: -5px;">
                <table class="table table-striped table-hover table-bordered table-responsive transaction">
                    <thead>
                        <tr>
                            <th class="width-100">STT</th>
                            <th class="width-100">Ngày giao dịch</th>
                            <th>Nội dung</th>
                            <th class="width-150 text-center">Giá trị</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $arrCode = array(
                            '00' => 'Giao dịch thành công',
                            '99' => 'Lỗi, tuy nhiên lỗi chưa được định nghĩa hoặc chưa xác định được nguyên nhân',
                            '01' => 'Lỗi, địa chỉ IP truy cập API của NgânLượng.vn bị từ chối',
                            '02' => 'Lỗi, tham số gửi từ merchant tới NgânLượng.vn chưa chính xác (thường sai tên tham số hoặc thiếu tham số)',
                            '03' => 'Lỗi, Mã merchant không tồn tại hoặc merchant đang bị khóa kết nối tới NgânLượng.vn',
                            '04' => 'Lỗi, Mã checksum không chính xác (lỗi này thường xảy ra khi mật khẩu giao tiếp giữa merchant và NgânLượng.vn không chính xác, hoặc cách sắp xếp các tham số trong biến params không đúng)',
                            '05' => 'Tài khoản nhận tiền nạp của merchant không tồn tại',
                            '06' => 'Tài khoản nhận tiền nạp của merchant đang bị khóa hoặc bị phong tỏa, không thể thực hiện được giao dịch nạp tiền',
                            '07' => 'Thẻ đã được sử dụng ',
                            '08' => 'Thẻ bị khóa',
                            '09' => 'Thẻ hết hạn sử dụng',
                            '10' => 'Thẻ chưa được kích hoạt hoặc không tồn tại',
                            '11' => 'Mã thẻ sai định dạng',
                            '12' => 'Sai số serial của thẻ',
                            '13' => 'Mã thẻ và số serial không khớp',
                            '14' => 'Thẻ không tồn tại',
                            '15' => 'Thẻ không sử dụng được',
                            '16' => 'Số lần thử (nhập sai liên tiếp) của thẻ vượt quá giới hạn cho phép',
                            '17' => 'Hệ thống Telco bị lỗi hoặc quá tải, thẻ chưa bị trừ',
                            '18' => 'Hệ thống Telco bị lỗi hoặc quá tải, thẻ có thể bị trừ, cần phối hợp với NgânLượng.vn để tra soát',
                            '19' => 'Kết nối từ NgânLượng.vn tới hệ thống Telco bị lỗi, thẻ chưa bị trừ (thường do lỗi kết nối giữa NgânLượng.vn với Telco, ví dụ sai tham số kết nối, mà không liên quan đến merchant)',
                            '20' => 'Kết nối tới telco thành công, thẻ bị trừ nhưng chưa cộng tiền trên NgânLượng.vn');
                        foreach ($student_courses_time as $value) {
                            $time[] = $value['create_date'];
                        }
                        foreach ($napthe_time as $key => $value) {
                            $time[] = $value['ngaynap'];
                        }
                        rsort($time);
                        $time = array_unique($time);
                        $stt = 1;
                        foreach ($time as $key => $value) {
                            foreach ($napthe as $key1 => $value1) {
                                if ($value == $value1['ngaynap']) {
                                    ?>
                                    <tr>
                                        <td>
                                            <div ><?php echo $stt++; ?></div>
                                        </td>
                                        <td>
                                            <div><?php echo date('H:i:s d/m/Y', $value); ?></div>
                                        </td>
                                        <td>
                                            <strong>
                                                <p  class="lakita">Nạp thẻ</p>
                                                <p> Loại thẻ: <?php echo $value1['type_card']; ?></p>
                                                <p> Mã thẻ: <?php echo $value1['pin_card']; ?> </p>
                                                <p>Số seri: <?php echo $value1['card_serial']; ?> </p>
                                                <p> Trạng thái: <?php echo $arrCode[$value1['error_code']]; ?> </p>
                                            </strong>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                            $positveNum = intval($value1['card_amount']);
                                            if ($positveNum > 0)
                                                echo '<span class="lakita">+' . number_format($value1['card_amount'], 0, ",", ".") . ' VNĐ' . '</span>';
                                            else
                                                echo "0 VNĐ";
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            foreach ($student_courses as $key2 => $value2) {
                                if ($value == $value2['create_date']) {
                                    $courses = $this->lib_mod->detail('courses', array("id" => $value2['courses_id']));
                                    ?>
                                    <tr>
                                        <td>
                                            <div ><?php echo $stt++; ?></div>
                                        </td>
                                        <td>
                                            <div><?php echo date('H:i:s d/m/Y', $value2['create_date']); ?></div>
                                        </td>
                                        <td class="lakita"> <strong>
                                                <?php
                                                $user_id = $this->session->userdata('user_id');
                                                $trial = $this->lib_mod->detail('student_courses', array('student_id' => $user_id, 'courses_id' => $value2['courses_id'], 'trial_learn' => 1));
                                                if ($courses[0]['id'] == 39)
                                                    echo '<p>Bạn được tặng khóa học</p>';
                                                else if(count($trial))
                                                    echo '<p>Học thử khóa học</p>';
                                                    else
                                                    echo '<p>Mua khóa học</p>';
                                                ?>
                                                <div>
                                                    <a href="<?php echo base_url() . $courses[0]['slug'] . '-2' . $courses[0]['id']; ?>.html" target="_blank" title="<?php echo $courses[0]['name']; ?>"><?php echo $courses[0]['name']; ?></a>
                                                </div>
                                            </strong>
                                        </td>
                                        <td class="text-center"><?php
                                            if ($value2['thanhtien'] > 0)
                                                echo number_format(intval($value2['thanhtien']), 0, ",", ".") . " VNĐ";
                                            else
                                                echo number_format(intval(str_replace('.', '', $courses[0]['price_root2'])), 0, ",", ".") . " VNĐ";
                                            ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>

            </section>
        </div>
    </div>
</div>
<?php }?>
<!--*********************************************************DUNG TT (hết)***********************************************-->