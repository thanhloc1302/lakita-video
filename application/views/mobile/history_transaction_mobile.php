<?php $this->load->view('mobile/navbar'); ?>
<?php $this->load->view('mobile/dashboard'); ?>
<div class="container" style="font-family: RobotoCondensed-Regular;">
    <div class="row">
        <div class="col-xs-12" style="overflow: hidden;">
            <div class="row margintop10">
                <div class="col-xs-4">
                    Ngày giao dịch
                </div>
                <div class="col-xs-8">
                    Nội dung
                </div>
            </div>
            <hr/>
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
                        <div class="row">
                            <div class="col-xs-4">
                                <?php echo date('H:i:s d/m/Y', $value); ?>
                            </div>
                            <div class="col-xs-8">
                                <p  class="lakita">Nạp thẻ</p>
                                <p> Loại thẻ: <?php echo $value1['type_card']; ?></p>
                                <p> Mã thẻ: <?php echo $value1['pin_card']; ?> </p>
                                <p>Số seri: <?php echo $value1['card_serial']; ?> </p>
                                <p> Trạng thái: <?php echo $arrCode[$value1['error_code']]; ?> </p>
                                <p> Số tiền: <strong>
                                        <?php
                                        $positveNum = intval($value1['card_amount']);
                                        if ($positveNum > 0)
                                            echo '<span class="lakita">+' . number_format($value1['card_amount'], 0, ",", ".") . ' VNĐ' . '</span>';
                                        else
                                            echo "0 VNĐ";
                                        ?>
                                    </strong></p>
                            </div>
                        </div>
                        <hr/>
                        <?php
                    }
                }
                foreach ($student_courses as $key2 => $value2) {
                    if ($value == $value2['create_date']) {
                        $courses = $this->lib_mod->detail('courses', array("id" => $value2['courses_id']));
                        ?>
                        <div class="row">
                            <div class="col-xs-4">
                                <?php echo date('H:i:s d/m/Y', $value2['create_date']); ?>
                            </div>
                            <div class="col-xs-8">
                                <?php
                                $user_id = $this->session->userdata('user_id');
                                $trial = $this->lib_mod->detail('student_courses', array('student_id' => $user_id, 'courses_id' => $value2['courses_id'], 'trial_learn' => 1));
                                if ($courses[0]['id'] == 39)
                                    echo '<p>Bạn được tặng khóa học</p>';
                                else if (count($trial))
                                    echo '<p>Học thử khóa học</p>';
                                else
                                    echo '<p>Mua khóa học</p>';
                                ?>
                                <div>
                                    <a href="<?php echo base_url() . $courses[0]['slug'] . '-2' . $courses[0]['id']; ?>.html" target="_blank" title="<?php echo $courses[0]['name']; ?>"><?php echo $courses[0]['name']; ?></a>
                                </div>
                                <p> Số tiền: <strong>
                                        <?php
                                        if ($value2['thanhtien'] > 0)
                                            echo number_format(intval($value2['thanhtien']), 0, ",", ".") . " VNĐ";
                                        else
                                            echo number_format(intval(str_replace('.', '', $courses[0]['price_sale'])), 0, ",", ".") . " VNĐ";
                                        ?>
                                    </strong>
                                </p>
                            </div>
                        </div>
                        <hr/>
                        <?php
                    }
                }
            }
            ?>

        </div>
    </div>
</div>
