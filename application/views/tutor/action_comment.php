<script>
    $(document).ready(function () {
        $.fn.modal.Constructor.prototype.enforceFocus = function () {
            var modal_this = this;
            $(document).on('focusin.modal', function (e) {
                if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length
                        &&
                        !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select') && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
                    modal_this.$element.focus();
                }
            });
        };
    });
    $('body').on('click', '.reply_parent', function () {
        var learn_id = $('#learn_id').val();
        var courses_id = $('#courses_id').val();
        var parent_id = $(this).attr('parentid');
        if ($(this).text() == 'Trả lời') {
            $(this).text('Ẩn');
            $("#rep_box_" + parent_id).show();
        } else {
            $(this).text('Trả lời');
            $("#rep_box_" + parent_id).hide();
        }
    });

    /*lưu nháp cmt*/
    $('body').on('click', '[id^=temp_rep_]', function () {

        var cmt_id = $(this).val();
        var editor_n = 'editor_' + $(this).val();
        var content = CKEDITOR.instances[editor_n].getData();
        if (content != '') {
            var d = new Date();
            d.setTime(d.getTime() + (360 * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cmt_id + "=" + content + ";" + expires + ";path=/";
            $.alert({
                    title: 'Nội dung đã lưu vào bộ nhớ tạm của trình duyệt !',
                    content: ' ',
                    theme: 'material',
                    type: 'green',
                    typeAnimated: true,
                    buttons: {
                        tryAgain: {
                            text: 'Đóng',
                            btnClass: 'btn-green',
                            action: function () {
                            }
                        }
                    }
                });
        }
    });

    $('body').on('click', '[id^=save_rep_]', function () {
        var learn_id = $(this).attr('learn_id');
        var course_id = $(this).attr('course_id');
        var parent = $(this).val();
        var editor_n = 'editor_' + $(this).val();
        var content = CKEDITOR.instances[editor_n].getData();
        var url = $(this).attr('url');
        if (content == '')
        {
            alert('Bạn phải nhập nội dung bình luận' + content);
            return;
        }
        jQuery.ajax({
            type: "POST",
            url: 'course/comment',
            data: {
                learn_id: learn_id,
                courses_id: course_id,
                parent: parent,
                content: content,
                url: url
            },
            dataType: "text",
            scriptCharset: "utf-8",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            beforeSend: function (xhr)
            {
                xhr.setRequestHeader("Ajax-Request", "true");
                $(".popup-wrapper").show();
            },
            success: function (response)
            {
                console.log(response);
                if (response != 1)
                {
                    var d = new Date();
                    $("#modal_body_" + parent).append('<div class="row margintop10"><div class="col-md-2 text-right marginleft25 paddingright0"> <img src="https://lakita.vn/data/source/student/logo3.png" alt="" class="img-circle height-30 width-30"> </div><div class="col-md-9"> <span> <span class="lakita"> <strong>TRỢ GIẢNG LAKITA</strong> </span> trả lời lúc &nbsp; 16:55:35 23/07/2017</span> <p> </p><p>' + content + '</p> <p></p> </div></div>');
                    $("#tr_" + parent).removeClass('warning');
                    $("#tr_" + parent).addClass('success');

                } else
                {
                    var d = new Date();
                    $("#modal_body_" + parent).append('<div class="row margintop10"><div class="col-md-2 text-right marginleft25 paddingright0"> <img src="https://lakita.vn/data/source/student/logo3.png" alt="" class="img-circle height-30 width-30"> </div><div class="col-md-9"> <span> <span class="lakita"> <strong>TRỢ GIẢNG LAKITA</strong> </span> trả lời lúc &nbsp; 16:55:35 23/07/2017</span> <p> </p><p>' + content + '</p> <p></p> </div></div>');
                    $("#tr_" + parent).removeClass('warning');
                    $("#tr_" + parent).addClass('success');
                }
                $('#content_rep_' + parent).text('');
                return false;
            },
            complete: function () {
                $(".popup-wrapper").hide();
            }
        });
    });


    /*sửa comment*/
    $('.repair_cmt').click(function ()
    {
        var cmtid = $(this).attr('cmtid');
        if ($(this).attr('code') == '2') {
            $(this).text('Ẩn');
            $(this).attr('code', '20');
            $("#repair_box_" + cmtid).show();
        } else {
            $(this).text('Sửa');
            $(this).attr('code', '2');
            $("#repair_box_" + cmtid).hide();
        }
    });
    $('body').on('click', '[id^=save_repair_]', function () {

        var cmtid_repair = $(this).val();
        var repair_editor_n = 'repair_editor_' + $(this).val();
        var content = CKEDITOR.instances[repair_editor_n].getData();
        if (content == '')
        {
            alert('Bạn phải nhập nội dung cần sửa' + content);
            return;
        }
        jQuery.ajax({
            type: "POST",
            url: 'tutor/repair_comment',
            data: {
                cmtid_repair: cmtid_repair,
                content: content
            },
            dataType: "text",
            scriptCharset: "utf-8",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            beforeSend: function () {
                $(".popup-wrapper").show();
            },
            success: function (response)
            {
                if (response == 1)
                {
                    $.ajax({
                        type: "POST",
                        url: "tutor/reload_comment",
                        data: {
                        },
                        success: function (result) {
                            console.log(result);
                            $("#list_cmt").html(result);
                        }});
                } else
                {
                    alert(response + 'Đã có lỗi xảy ra khi sửa bình luận');
                }

            },
            complete: function () {
                $(".popup-wrapper").hide();
            }
        });
    });


  /* xóa cmt */
    $('.del_cmt').click(function (e) {
        var link = $(this).attr('href');
        e.preventDefault();
        $.confirm({
            title: 'Xóa bình luận!',
            content: 'Bạn có chắc chắn xóa không ?',
            theme: 'material',
            type: 'red',
            buttons: {
                confirm: {
                    text: 'Đồng ý',
                    btnClass: 'btn-blue',
                    action: function () {
                        location.href = link;
                    }},
                cancel: {
                    text: 'Hủy',
                    action: function () {
                        return
                    }}
            }
        });
    });
</script>


