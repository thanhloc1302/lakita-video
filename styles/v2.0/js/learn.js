/*=========================== cuộn đến tên bài học hiện tại =================*/
var scroll = $('#dsbaihoc .active').offset().top - $('#dsbaihoc').offset().top;
$(".tab-content").scrollTop(scroll);

$('a[href="#dsbaihoc"]').on('shown.bs.tab', function (e) {
    var scroll = $('#dsbaihoc .active').offset().top - $('#dsbaihoc').offset().top;
    $(".tab-content").scrollTop(scroll);
});

$('.rep_box').hide();

$('#save_note').click(function () {
    // Your code to save "data", usually through Ajax.

    var learn_id = $('#learn_id').val();
    var learn_note = $('#learn_note').val();
    if (learn_note == '')
    {
        alert('Bạn phải nhập ghi chú trước khi lưu');
        return;
    }
    jQuery.ajax({
        type: "POST",
        url: 'course/save_note',
        data: {
            learn_id: learn_id,
            learn_note: learn_note,
        },
        dataType: "text",
        scriptCharset: "utf-8",
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        beforeSend: function (xhr)
        {
            xhr.setRequestHeader("Ajax-Request", "true");
        },
        success: function (response)
        {
            console.log(response);
            if (response == 1)
            {
                alert('Cập nhật ghi chú thành công');
            } else
            {
                alert('Đã có lỗi xảy ra khi cập nhật ghi chú');
            }
            return false;
        }
    });
});

$(".vote_icon_click").click(
        function () {
            $(".vote_link").click();
        }
);

$(".love_link").click(function () {
    var courses_id = $("#courses_id").val();
    jQuery.ajax({
        type: "POST",
        url: 'student/save_love',
        data: {
            courses_id: courses_id
        },
        dataType: "text",
        scriptCharset: "utf-8",
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        beforeSend: function (xhr)
        {
            xhr.setRequestHeader("Ajax-Request", "true");
        },
        success: function (response)
        {
            console.log(response);
            if (response == 1)
            {
                alert('Thêm khóa học vào danh sách yêu thích thành công');
                $(".love_link").html('<i class="fa fa-heart red" aria-hidden="true"></i>  Tôi thích khóa học này');
            } else
            {
                alert(response);
            }
            return false;
        }
    });
    return false;
});


/***************************** check have flash trên chrome và cốc cốc ***************************************/
function browserName() {
    var Browser = navigator.userAgent;
    if (Browser.indexOf('MSIE') >= 0) {
        Browser = 'MSIE';
    } else if (Browser.indexOf('Firefox') >= 0) {
        Browser = 'Firefox';
    } else if (Browser.indexOf('Chrome') >= 0) {
        Browser = 'Chrome';
    } else if (Browser.indexOf('Safari') >= 0) {
        Browser = 'Safari';
    } else if (Browser.indexOf('Opera') >= 0) {
        Browser = 'Opera';
    } else {
        Browser = 'UNKNOWN';
    }
    return Browser;
}

var ismobile = false;
if (/Android|webOS|iPhone|iPad|iPod|BB10|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    var ismobile = true;
}

if (!swfobject.hasFlashPlayerVersion("1"))
{
    $('#myModal').modal('show');
}

if (ismobile == true) {
    $('#myModal').modal('hide');
}

if (browserName() != 'Chrome') {
    $('#browser_name').css('display', 'block');
}
/***************************** check have flash trên chrome và cốc cốc ***************************************/


/* float video */
$(document).ready(function () {
    $(window).scroll(function () {
        if ($(window).scrollTop() > $(".videolayout").offset().top && $(window).scrollTop() < $(".videolayout").offset().top + 10  && $(window).width() >= 1000) {
            $(".js-video").addClass('float_video');
            $('.js-video-btn').css('display','block');
        } else if($(window).scrollTop() < $(".videolayout").offset().top && $(window).width() >= 1000) {
            $(".js-video").removeClass('float_video');
            $('.js-video-btn').css('display','none');
        } 
    });

    $('.js-video-btn').click(function(){
        $(".js-video").removeClass('float_video');
        $('.js-video-btn').css('display','none');
    });

//setInterval(function(){
//        if (jwplayer().getState() == "playing") {
//            console.log('playing!!!');
//        }    
//}, 1000);

});


