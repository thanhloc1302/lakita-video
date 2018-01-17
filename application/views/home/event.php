<link href="<?php echo base_url() ?>plugin/flipclock/compiled/flipclock.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url() ?>plugin/flipclock/compiled/flipclock.min.js" type="text/javascript"></script>
<!--<a data-toggle="modal" data-target="#modal_event" style="cursor: pointer" class="event2011 hidden-xs hidden-sm">
    <img class="event2011 img-responsive" style="position: fixed; bottom: 0; z-index: 100000000; width: 100%;" alt="học excel cơ bản" title="học excel cơ bản" src="https://lakita.vn/styles/v2.0/img/event/banner.png?ver=<?php echo time(); ?>" />
    <span style="position: fixed; color: #fff; z-index: 1000000000000000; bottom: 13px; right: 40.2%; font-size: 62px;" class="num-day"> 0 <br></span>
    <span style="position: fixed; color: #fff; z-index: 1000000000000000; bottom: 13px; right: 41.3%; font-size: 10px;"> NGÀY <br></span>
    <span style="position: fixed; color: #fff; z-index: 1000000000000000; bottom: 13px; right: 32.9%; font-size: 62px;" class="num-hour"> 200 <br></span>
    <span style="position: fixed; color: #fff; z-index: 1000000000000000; bottom: 13px; right: 34.9%; font-size: 10px;"> GIỜ <br></span>
    <span style="position: fixed; color: #fff; z-index: 1000000000000000; bottom: 13px; right: 26.0%; font-size: 62px;" class="num-minute"> 300 <br></span>
    <span style="position: fixed; color: #fff; z-index: 1000000000000000; bottom: 13px; right: 27.5%; font-size: 10px;"> PHÚT <br></span>
    <span style="position: fixed; color: #fff; z-index: 1000000000000000; bottom: 13px; right: 19.4%; font-size: 62px;" class="num-second"> 400 <br></span>
    <span style="position: fixed; color: #fff; z-index: 1000000000000000; bottom: 13px; right: 21.0%; font-size: 10px;"> GIÂY <br></span>
    <div class="clock" style="bottom: 0px; position: fixed; z-index: 999999999;width: 46%; right: -10%"></div>
</a>-->
<!--<a target="_blank" href="https://lakita.vn/combo-qua-khung-dip-giang-sinh.html" id="event-ladi" class="event2011 hidden-xs hidden-sm">
    <img class="event2011 img-responsive" style="position: fixed; bottom: 0; z-index: 100000000; width: 100%;" alt="học excel cơ bản" title="học excel cơ bản" src="https://lakita.vn/styles/v2.0/img/event/banner.png?ver=<?php echo time(); ?>" />
    <span style="position: fixed; color: #fff; z-index: 1000000000000000; bottom: 13px; right: 40.2%; font-size: 62px;" class="num-day"> 0 <br></span>
    <span style="position: fixed; color: #fff; z-index: 1000000000000000; bottom: 13px; right: 41.3%; font-size: 10px;"> NGÀY <br></span>
    <span style="position: fixed; color: #fff; z-index: 1000000000000000; bottom: 13px; right: 32.9%; font-size: 62px;" class="num-hour"> 200 <br></span>
    <span style="position: fixed; color: #fff; z-index: 1000000000000000; bottom: 13px; right: 34.9%; font-size: 10px;"> GIỜ <br></span>
    <span style="position: fixed; color: #fff; z-index: 1000000000000000; bottom: 13px; right: 26.0%; font-size: 62px;" class="num-minute"> 300 <br></span>
    <span style="position: fixed; color: #fff; z-index: 1000000000000000; bottom: 13px; right: 27.5%; font-size: 10px;"> PHÚT <br></span>
    <span style="position: fixed; color: #fff; z-index: 1000000000000000; bottom: 13px; right: 19.4%; font-size: 62px;" class="num-second"> 400 <br></span>
    <span style="position: fixed; color: #fff; z-index: 1000000000000000; bottom: 13px; right: 21.0%; font-size: 10px;"> GIÂY <br></span>
    <div class="clock" style="bottom: 0px; position: fixed; z-index: 999999999;width: 46%; right: -10%"></div>
</a>-->
<script type="text/javascript">
    /* var end = <?php echo $time_end_sale; ?>;
     var now = <?php echo time(); ?>;
     var distance = end - now;
     if (distance <= 0) {
     distance = 0;
     }
     var clock = $('.clock').FlipClock(distance, {
     clockFace: 'DailyCounter',
     countdown: true
     }); */
</script>

<input type="hidden" id="base_url" value="<?php echo base_url(); ?>">

<!-- Modal -->
<div class="modal fade" id="modal_event" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="font-family: OpenSans-Regular;z-index: 9999999999;">
    <div class="modal-dialog" role="document" style="margin: 1em auto">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Đăng ký khóa học</h4>
            </div>
            <div class="modal-body">
                <form id="form-event">
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
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mời bạn chọn khóa học</label>
                        <select class="form-control selectpicker course_code" name="course_code[]" id="course_code" multiple title="Chọn khóa học">
                            <?php
                            foreach ($courses_sale as $key => $cour) {
                                ?>
                                <option value="<?php echo $cour['course_code']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $cour['name']; ?></option>
                                <?php
                            }
                            ?>
                            <!--                            <option value="cb300"> Combo mua 3 tặng 1 </option>
                                                        <option value="cb200"> Combo 1 khóa excel và 1 khóa kế toán (tổng: 499K) </option>-->
                        </select>
                    </div>
                    <!--
                    <div class="form-group" id="select_cb300">
                        <label for="exampleInputPassword1">Mời bạn chọn 3 khóa học trả tiền</label>
                        <select class="form-control selectpicker course_code" name="course_code[]" multiple title="Chọn khóa học">
                    <?php foreach ($courses_sale as $key => $cour) {
                        ?>
                                                                    <option value="<?php echo $cour['course_code']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $cour['name']; ?></option>
                        <?php
                    }
                    ?>
                        </select>
                    </div>
                    <div class="form-group" id="select_cb300_free">
                        <label for="exampleInputPassword1">Mời bạn chọn khóa học miễn phí</label>
                        <select class="form-control selectpicker course_code" name="course_code[]" title="Chọn khóa học">
                    <?php
                    foreach ($courses_sale as $key => $cour) {
                        ?>
                                                                    <option value="<?php echo $cour['course_code'] . "_free"; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $cour['name']; ?></option>
                        <?php
                    }
                    ?>
                        </select>
                    </div>
                    <div class="form-group" id="select_cb200_kt">
                        <label for="exampleInputPassword1">Mời bạn chọn khóa học kế toán</label>
                        <select class="form-control selectpicker course_code" name="course_code[]" multiple title="Chọn khóa học">
                    <?php
//                            $courses_sale = array(
//                                '6' => array('course_code' => 'KT200', 'name' => 'Làm chủ kiến thức và xử lý tình huống về hóa đơn'),
//                                '8' => array('course_code' => 'KT210', 'name' => 'Trọn Bộ Kế Toán Thuế Từ A-Z'),
//                                '9' => array('course_code' => 'KT110', 'name' => 'Cách Xác Định Chi Phí Hợp Lý, Công Cụ Bảo Vệ Tại Các Kỳ Thanh Tra, Quyết Toán Thuế'),
//                                '11' => array('course_code' => 'KT130', 'name' => 'Hướng Dẫn Lập Báo Cáo Tài Chính Hợp Lý Và Phân Tích Các Chỉ Số Hỗ Trợ Dự Thầu, Vay Vốn Ngân Hàng'),
//                                '12' => array('course_code' => 'KT800', 'name' => 'Kỹ thuật quyết toán thuế, công tác chuẩn bị cho thanh tra thuế, tối ưu thuế'),
//                            );
                    foreach ($courses_sale as $key => $cour) {
                        ?>
                                                                    <option value="<?php echo $cour['course_code']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $cour['name']; ?></option>
                        <?php
                    }
                    ?>
                        </select>
                    </div>
                    <div class="form-group" id="select_cb200_ex">
                        <label for="exampleInputPassword1">Mời bạn chọn khóa học excel</label>
                        <select class="form-control selectpicker course_code" name="course_code[]" title="Chọn khóa học">
                    <?php
//                            $courses_sale = array(
//                                '1' => array('course_code' => 'E100', 'name' => 'Bí quyết làm chủ Excel năm 2017'),
//                                '2' => array('course_code' => 'E200', 'name' => '99 tuyệt chiêu Excel dành cho người đi làm'),
//                                '3' => array('course_code' => 'E300', 'name' => 'Excel từ cơ bản tới chuyên sâu dành riêng cho kế toán'),
//                                '4' => array('course_code' => 'E400', 'name' => 'Excel từ A-Z'),
//                            );
//                            foreach ($courses_sale as $key => $cour) {
//                                
                    ?>
                                <option value="<?php echo $cour['course_code']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $cour['name']; ?></option>
                    <?php
//                            }
                    ?>
                        </select>
                    </div> -->
                    <div class="form-group" id="price_combo">
                        <label id="test">Tạm tính : 0 vnđ</label>
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
        var a = <?php echo json_encode($courses_sale); ?>;
        console.log(a);
        var b = new Array();

        a.forEach(function (element) {
            b[element["course_code"]] = [element["price_sale"]];
        });

        $('.course_code').change(function () {
            var c = Number(0);
            var course_selected = $('.course_code').selectpicker('val');
            course_selected.forEach(function (element) {
                c += Number(b[element][0]);
            });
            $("label").remove("#test");
            $('#price_combo').html('<label id="test">Tạm tính : ' + c.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") + ' vnđ</label>');
        });

        $.fn.digits = function () {
            return this.each(function () {
                $(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
            })
        };


        /*$("#select_cb300, #select_cb300_free, #select_cb200_kt, #select_cb200_ex").hide();
         $('.course_code').change(function () {
         var cb300 = $("#course_code").val();
         if (cb300.length == 1 && cb300[0] == "cb300") {
         $("#select_cb300, #select_cb300_free").show();
         } else {
         $("#select_cb300, #select_cb300_free").hide();
         }
         if (cb300.length == 1 && cb300[0] == "cb200") {
         $("#select_cb200_kt, #select_cb200_ex").show();
         $('#price_combo').html('<label id="test">Tạm tính : 499.000 vnđ</label>');
         } else {
         $("#select_cb200_kt, #select_cb200_ex").hide();
         $.ajax({
         url: "<?php echo base_url(); ?>event/price_combo",
         type: "POST",
         data: $("#form-event").serialize(),
         success: function (data) {
         console.log(data);
         $("label").remove("#test");
         $('#price_combo').html('<label id="test">Tạm tính : ' + data + ' vnđ</label>');
         }
         });
         }
         });*/


        $('.confirm_event').click(function () {
            var cb300 = $("#course_code").val();
            if ($('.name_event').val() == '' || $('.phone_event').val() == '' || $('#course_code').val() == '' || $('.address_event').val() == '') {
                alert('Bạn hãy nhập đầy đủ thông tin !!');
                return;
            } else if ((cb300.length == 1 && cb300[0] == "cb300")
                    && ($("#select_cb300 select").val().length != 3 || $("#select_cb300_free select").val() == '')) {
                alert('Mời bạn chọn đúng 3 khóa học combo và 1 khóa miễn phí !!');
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
             style="cursor: pointer; background-size: contain; width: 506px;">
            <button onclick="close_modal();" type="button" style="position: absolute;right: 0;padding: 0px;"> 
                <img src="https://cdn3.iconfinder.com/data/icons/line/36/cancel-512.png" style="width: 20px;"> </button>
            <img style="width: 100%" src="https://lakita.vn/styles/v2.0/img/event/popup.png?ver=<?php echo time(); ?>">
        </div>
    </div>
</div>

<script>
    function close_modal() {
            $('#modal2_9').modal('hide');
            $('#popup_29').unbind("click");
    }
</script>