Notification.requestPermission();

$(document).ready(function () {

// Thực hiện hành động bên trong khi nhấp vào Cho phép thông báo

//$( "#shownoti" ).click(function() {
//  alert( "Handler for .click() called." );
//});
//// Thực hiện hành động bên trong khi nhấp vào Hiển thị thông báo
//$('#shownoti1').onclick = function (e) {
//    var notify;
//    e.preventDefault();
//    // Nếu chưa cho phép thông báo

// Ngược lại đã cho phép

    var notify;


    setInterval(function () {
//        appent_noti();
//        num_noti();
    }, 30000);
});

function num_noti() {
    var student_id = $("#id_hv").val();
    jQuery.ajax({
        type: "POST",
        url: 'student/num_noti',
        data: {
            student_id: student_id
        },
        dataType: "text",
        scriptCharset: "utf-8",
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        success: function (response) {

            $('#notification_num').remove();
            $('#num_noti').prepend("<span id='notification_num' class='badge'>" + response + "</span>");
        }
    });
}
;

function appent_noti() {
    var student_id = $("#id_hv").val();
    jQuery.ajax({
        type: "POST",
        url: 'student/check_noti_current',
        data: {
            student_id: student_id
//                csrf_test_name: csrf_test_name
        },
        dataType: "text",
        scriptCharset: "utf-8",
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        success: function (response) {

            var check = response.slice(0, response.indexOf(" "));
            if (check == 1) {
                var type = response.slice(response.indexOf(" ") + 1, response.lastIndexOf(" "));
                var url = response.slice(response.lastIndexOf(" "), response.length);
                // Tạo thông báo
                var a;
                if (type == 'comment') {
                    a = 'Bình luận của bạn vừa được trả lời !';
                } else if (type == 'exercise') {
                    a = 'Bài tập của bạn đã được chữa !';
                } else if (type == 'invite') {
                    a = 'Mã giới thiệu của bạn vừa được sử dụng !'
                }

                notify = new Notification(
                        'Bạn có một thông báo mới từ lakita', // Tiêu đề thông báo
                        {
                            body: a, // Nội dung thông báo
                            icon: 'https://lakita.vn/styles/v2.0/img/logo2.png', // Hình ảnh
                            tag: url, // Đường dẫn
                            image: 'https://lakita.vn/styles/v2.0/img/logo2.png'
                        }
                );
                // Thực hiện khi nhấp vào thông báo
                notify.onclick = function () {
                    window.location.href = this.tag; // Di chuyển đến trang cho url = tag
                };
            }
        }
    });
}
;


/*========================= click thì xóa số noti chưa đọc ===========================================*/

$("#notification").click(function () {

    $("#notification_num").css("display", "none");

    jQuery.ajax({
        type: "POST",
        url: 'student/read_noti',
        data: {
        },
        dataType: "text",
        scriptCharset: "utf-8",
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        success: function (response) {
            console.log(response);
        }
    });
});

$("#notification_num").click(function () {

    $("#notification_num").css("display", "none");

    jQuery.ajax({
        type: "POST",
        url: 'student/read_noti',
        data: {
        },
        dataType: "text",
        scriptCharset: "utf-8",
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        success: function (response) {
            console.log(response);
        }
    });
});
/*========================= hết click thì xóa số noti chưa đọc ===========================================*/
