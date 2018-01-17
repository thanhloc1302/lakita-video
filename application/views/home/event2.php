<div style="position: fixed; bottom: 0; z-index: 100000000; width: 100%;" class="event2011 hidden-xs hidden-sm">
    <img class="event" style="width: 33%; "
         alt="học excel cơ bản" title="học excel cơ bản" src="https://lakita.vn/styles/v2.0/img/event/hoc-thu.png" />
    <img class="event" style="width: 33%; margin-left: -5px;"
         alt="học excel cơ bản" title="học excel cơ bản" src="https://lakita.vn/styles/v2.0/img/event/199.png" />
    <a  data-toggle="modal" data-target="#myModal" style="cursor: pointer" class="event2011 hidden-xs hidden-sm"><img class="event" style="width: 33%; margin-left: -5px;"
                                                                                                                      alt="học excel cơ bản" title="học excel cơ bản" src="https://lakita.vn/styles/v2.0/img/event/combo.png" /> </a>
</div>
<script>
    $(function () {
        var max_height = 0;
        $.each($('img.event'), function () {
            console.log($(this).height());
            if (max_height < $(this).height())
                max_height = $(this).height();
        });
        $.each($('img.event'), function () {
            $(this).height(max_height);
        });
    });
</script>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="font-family: OpenSans-Regular;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Đăng ký khóa học</h4>
            </div>
            <div class="modal-body">
                <h3> Mời bạn nhập tên và số điện thoại</h3>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên</label>
                    <input type="text" class="form-control name_event" name="name" placeholder="Nhập họ tên...">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Số điện thoại</label>
                    <input type="tel" class="form-control phone_event" name="phone" placeholder="Nhập số điện thoại...">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default close_modal" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-success confirm_event">Xác nhận</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('.confirm_event').click(function () {
            $(this).unbind('click');
            $.ajax({
                url: "<?php echo base_url(); ?>event/combo",
                type: "POST",
                data: {
                    name_event: $('.name_event').val(),
                    phone_event: $('.phone_event').val()
                },
                success: function (data) {
                    if (data == 1){
                        alert('Cảm ơn bạn đã đăng ký khóa combo mua 3 tặng 1, nhân viên CSKH sẽ liên hệ để xác nhận đăng ký cho bạn!');
                        $(".close_modal").click();
                }
            }

            });
        });
    });
</script>
