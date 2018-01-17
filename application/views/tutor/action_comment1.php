<script>
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
                if (response == 1)
                {
                    $.ajax({
                        type: "POST",
                        url: "tutor/reload_comment",
                        data: {
                           
                        },
                        success: function (result) {
                            $("#list_cmt").empty().html(result);
                        }});
                } else
                {
                    $.ajax({
                        type: "POST",
                        url: "tutor/reload_comment",
                        data: {
                           
                        },
                        success: function (result) {
                            $("#list_cmt").empty().html(result);
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
        var cmtid = $(this).attr('cmtid');
        if ($(this).attr('code') == '2') {
            $(this).text('Ẩn');
            $(this).attr('code','20');
            $("#repair_box_" + cmtid).show();
        } else {
            $(this).text('Sửa');
            $(this).attr('code','2');
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
            {  if (response == 1)
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
                    alert(response+'Đã có lỗi xảy ra khi sửa bình luận');
                }

            },
            complete: function () {
                $(".popup-wrapper").hide();
            }
        });
    });
    
</script>


