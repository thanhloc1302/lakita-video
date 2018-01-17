<input type="hidden" id="learn_id" value="<?php echo $curr_learn[0]['id']; ?>">
<input type="hidden" id="courses_id" value="<?php echo $curr_learn[0]['courses_id']; ?>" >
<input type="hidden" id="parent" value="0">
<input type="hidden" id="curr_url" value="<?php echo $learn_slug; ?>" >

<script>

    /*ghi comment*/
    $('#save_cmt').click(function () {
        var learn_id = $('#learn_id').val();
        var courses_id = $('#courses_id').val();
        var parent = '';
        var content = '<p id="cmt-title">';
        var content1 = $('#content_cmt').val();
        content += content1;
        content += '</p>';
        var content2 = CKEDITOR.instances.editor1.getData();
        content += content2;
        if ((content1 == '' && content2 == '') || (content1 != '' && content2 == ''))
        {
            $.alert({
                title: 'Bạn phải nhập nội dung bình luận!',
                content: 'Mời bạn thử lại',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Thử lại',
                        btnClass: 'btn-red',
                        action: function () {
                        }
                    },
                    close: function () {
                    }
                }
            });
            return;
        }
        jQuery.ajax({
            type: "POST",
            url: 'course/comment',
            data: {
                learn_id: learn_id,
                courses_id: courses_id,
                parent: parent,
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
                console.log(response);
                if (response == 1)
                {
                    $.ajax({
                        type: "POST",
                        url: "course/reload_comment",
                        data: {
                            learn_id: learn_id,
                            courses_id: courses_id
                        },
                        success: function (result) {
                            $("#list_cmt").html(result);
                        }});
                } else
                {
                    /*alert('Đã có lỗi xảy ra khi gửi bình luận');*/
                    $.ajax({
                        type: "POST",
                        url: "course/reload_comment",
                        data: {
                            learn_id: learn_id,
                            courses_id: courses_id
                        },
                        success: function (result) {
                            $("#list_cmt").html(result);
                        }});
                }
                $('#content_cmt').val('');
                $('#parent').val(0);
                return false;
            },
            complete: function () {
                $(".popup-wrapper").hide();
            }
        });
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
            CKEDITOR.instances[instance].setData('');
        }
    });



    /*trả lời comment*/
    $('body').on('click', '.reply_parent', function () {
        var learn_id = $('#learn_id').val();
        var courses_id = $('#courses_id').val();
        var parent_id = $(this).attr('parentid');
        if ($(this).attr('code') == '1') {
            $(this).text('Ẩn');
            $(this).attr('code', '10');
            $("#rep_box_" + parent_id).show();
        } else {
            $(this).text('Trả lời');
            $(this).attr('code', '1');
            $("#rep_box_" + parent_id).hide();
        }
    });

    $('body').on('click', '[id^=save_rep_]', function () {
        var learn_id = $('#learn_id').val();
        var course_id = $('#courses_id').val();
        var parent = $(this).val();
        var url = $('#curr_url').val();
        var editor_n = 'editor_' + $(this).val();
        var content = CKEDITOR.instances[editor_n].getData();
        if (content == '')
        {

            $.alert({
                title: 'Bạn phải nhập nội dung bình luận!',
                content: 'Mời bạn thử lại',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Thử lại',
                        btnClass: 'btn-red',
                        action: function () {
                        }
                    },
                    close: function () {
                    }
                }
            });
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
            beforeSend: function () {
                $(".popup-wrapper").show();
            },
            success: function (response)
            {
                console.log(response);
                if (response == 1)
                {
                    $.ajax({
                        type: "POST",
                        url: "course/reload_comment",
                        data: {
                            learn_id: learn_id,
                            courses_id: course_id
                        },
                        success: function (result) {
                            $("#list_cmt").html(result);
                        }});
                } else
                {
                    /*alert('Đã có lỗi xảy ra khi gửi bình luận');*/
                    $.ajax({
                        type: "POST",
                        url: "course/reload_comment",
                        data: {
                            learn_id: learn_id,
                            courses_id: course_id
                        },
                        success: function (result) {
                            $("#list_cmt").html(result);
                        }});

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
        var learn_id = $('#learn_id').val();
        var courses_id = $('#courses_id').val();
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
        var learn_id = $('#learn_id').val();
        var course_id = $('#courses_id').val();
        var cmtid_repair = $(this).val();
        var repair_editor_n = 'repair_editor_' + $(this).val();
        var content = CKEDITOR.instances[repair_editor_n].getData();
        if (content == '')
        {
            $.alert({
                title: 'Bạn phải nhập nội dung cần sửa!',
                content: 'Mời bạn thử lại',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Thử lại',
                        btnClass: 'btn-red',
                        action: function () {
                        }
                    },
                    close: function () {
                    }
                }
            });
            return;
        }
        jQuery.ajax({
            type: "POST",
            url: 'course/repair_comment',
            data: {
                learn_id: learn_id,
                courses_id: course_id,
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
                console.log(response);
                if (response == 1)
                {
                    $.ajax({
                        type: "POST",
                        url: "course/reload_comment",
                        data: {
                            learn_id: learn_id,
                            courses_id: course_id
                        },
                        success: function (result) {
                            $("#list_cmt").html(result);
                        }});
                } else
                {
                    alert('Đã có lỗi xảy ra khi sửa bình luận');
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

    /* load more comment */

    if (parseInt($(".pagenum:last").val()) >= parseInt($(".total-page:last").val())) {
        $('.load_more_cmt').css("display", "none");
    }

    $(document).on('click', '.load_more_cmt', function (e) {
        e.preventDefault();
        var pagenumLast = parseInt($(".pagenum:last").val());
        var totalPage = parseInt($(".total-page:last").val());
        if (pagenumLast <= totalPage) {
            var pagenum = parseInt($(".pagenum:last").val()) + 1;
            $.ajax({
                url: "course/loadMoreComment",
                type: "post",
                data: {page: pagenum,
                    learn_id: $('#learn_id').val(),
                    courses_id: $('#courses_id').val()
                },
                beforeSend: function () {
                    $(".popup-wrapper").show();
                },
                success: function (data) {
                    $("#list_cmt").append(data);
                },
                complete: function () {
                    $(".popup-wrapper").hide();

                }
            });
            if (pagenum >= $(".total-page").val()) {
                $('.load_more_cmt').css("display", "none");
            }
        } else {
            console.log('khong load them dc cmt, kiem tra lai di');
        }
    });

</script>


