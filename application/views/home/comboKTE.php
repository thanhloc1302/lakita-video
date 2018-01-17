

<input type="hidden" id="base_url" value="<?php echo base_url(); ?>">

<!-- Modal -->
<div class="modal fade" id="modal_event" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="font-family: OpenSans-Regular;z-index: 9999999999;">
    <div class="modal-dialog" role="document" style="margin: 1em auto">
        <div class="modal-content">
            <form id="form-event">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Đăng ký khóa học</h4>
                </div>
                <div class="modal-body">

                    <h3> Mời bạn nhập thông tin đăng ký</h3>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên</label>
                        <input type="text" class="form-control name_event" name="name" placeholder="Nhập họ tên...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Số điện thoại</label>
                        <input type="tel" class="form-control phone_event" name="phone" placeholder="Nhập số điện thoại...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ</label>
                        <input type="text" class="form-control address_event" name="address" placeholder="Nhập địa chỉ...">
                    </div>
                    <div class="form-group hidden">
                        <label for="exampleInputPassword1">Mời bạn chọn khóa học</label>
                        <select class="form-control selectpicker course_code" name="course_code[]" id="course_code" title="Chọn khóa học">
                            <option value="cb200" selected="selected"> Combo 1 khóa excel và 1 khóa kế toán (tổng: 500K) </option>
                        </select>
                    </div>


                    <div class="form-group" id="select_cb200_kt">
                        <label for="exampleInputPassword1">Mời bạn chọn khóa học kế toán</label>
                        <select class="form-control course_code" name="course_code[]" title="Chọn khóa học">
                            <?php
                            $courses_kt = array(
                                '1' => array('course_code' => 'KT100', 'name' => 'Làm chủ hóa đơn chứng từ trong 4h', 'price' => '500.000'),
                                '2' => array('course_code' => 'KT110', 'name' => 'Cách Xác Định Chi Phí Hợp Lý, Công Cụ Bảo Vệ Tại Các Kỳ Thanh Tra, Quyết Toán Thuế', 'price' => '895.000'),
                                '3' => array('course_code' => 'KT130', 'name' => 'Hướng Dẫn Lập Báo Cáo Tài Chính Hợp Lý Và Phân Tích Các Chỉ Số Hỗ Trợ Dự Thầu, Vay Vốn Ngân Hàng', 'price' => '895.000'),
                                '4' => array('course_code' => 'KT200', 'name' => 'Làm chủ kiến thức và xử lý tình huống về hóa đơn', 'price' => '600.000'),
                                '5' => array('course_code' => 'KT210', 'name' => 'Trọn Bộ Kế Toán Thuế Từ A-Z', 'price' => '895.000'),
                                '6' => array('course_code' => 'KT400', 'name' => 'Trọn Bộ hướng dẫn lập Báo Cáo Tài Chính năm 2017', 'price' => '895.000'),
                                '7' => array('course_code' => 'KT800', 'name' => 'Kỹ thuật quyết toán thuế, công tác chuẩn bị cho thanh tra thuế, tối ưu thuế', 'price' => '895.000'),
                            );
                            foreach ($courses_kt as $key => $cour) {
                                ?>
                                <option value="<?php echo $cour['course_code']; ?>"><?php echo $cour['name'] . ' - ' . $cour['price'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group" id="select_cb200_ex">
                        <label for="exampleInputPassword1">Mời bạn chọn khóa học excel</label>
                        <select class="form-control course_code" name="course_code[]" title="Chọn khóa học">
                            <?php
                            $courses_e = array(
                                '1' => array('course_code' => 'E100', 'name' => 'Bí quyết làm chủ Excel năm 2017', 'price' => '895.000'),
                                '2' => array('course_code' => 'E120', 'name' => '18 thủ thuật Excel', 'price' => '500.000'),
                                '3' => array('course_code' => 'E130', 'name' => 'Thủ thuật Excel', 'price' => '500.000'),
                                '4' => array('course_code' => 'E200', 'name' => '99 tuyệt chiêu Excel dành cho người đi làm', 'price' => '600.000'),
                                '5' => array('course_code' => 'E300', 'name' => 'Excel từ cơ bản tới chuyên sâu dành riêng cho kế toán', 'price' => '1.000.000'),
                                '6' => array('course_code' => 'E400', 'name' => 'Excel từ A-Z', 'price' => '600.000'),
                                '7' => array('course_code' => 'EM100', 'name' => 'Bí quyết làm chủ môn Excel cho người đi làm năm 2017', 'price' => '895.000'),
                            );
                            foreach ($courses_e as $key => $cour) {
                                ?>
                                <option value="<?php echo $cour['course_code']; ?>"><?php echo $cour['name'] . ' - ' . $cour['price'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group" id="price_combo">
                        <label id="test">Tạm tính : 499.000 vnđ</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default close_modal" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-success confirm_event">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(function () {

        $('.confirm_event').click(function () {
            var cb300 = $("#course_code").val();
            if ($('.name_event').val() == '' || $('.phone_event').val() == '' || $('#course_code').val() == '' || $('.address_event').val() == '') {
                alert('Bạn hãy nhập đầy đủ thông tin !!');
                return;
            } else {
                $.ajax({
                    url: "<?php echo base_url(); ?>event/combo",
                    type: "POST",
                    data: $("#form-event").serialize(),
                    beforeSend: function ()
                    {
                        $(".popup-wrapper").show();
                    },
                    success: function (data) {
                        console.log(data);
                        if (data == 1) {
                            alert('Cảm ơn bạn đã tham gia chương trình khuyến mại, nhân viên CSKH sẽ liên hệ để xác nhận đăng ký cho bạn!');
                            $('#modal_event').modal('hide');
                        }
                    },
                    complete: function () {
                        $(".popup-wrapper").hide();
                        $('#modal_event').modal('hide');
                    }
                });
            }
        });
    });
</script>


<div class="modal fade" id="modal2_9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div id="popup_29" data-toggle="modal" data-target="#myModal" class="modal-content" 
             style="cursor: pointer; background-image: url('https://lakita.vn/styles/images/KTEX500k.png');
             background-repeat: no-repeat;background-size: contain; height: 330px; width: 628px;">
            <button type="button" class="close" data-dismiss="modal" style="background-color: #fff">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    </div>
</div>

