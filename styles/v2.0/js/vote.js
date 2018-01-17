$(function () {
    /*===========================================ĐÁNH GIÁ KHÓA HỌC=========================================*/
    $(".vote_icon").click(
            function () {
                var star_number = $(this).attr('value');
                var str = html_after_vote(star_number);
                $(".vote_icon_area").html(str);
                $(".vote_image").hide();
                $("#vote_star_number").val(star_number);
            }
    );
    var lettet_limit = '';
    $("#vote_description").keydown(
            function () {
                var len_remaining = 2500 - $(this).val().length;
                if ($(this).val().length == 2500)
                    lettet_limit = $(this).val();
                if ($(this).val().length > 2500)
                {
                    $.alert({
                        title: 'Giới hạn 2500 kí tự!',
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
                    $(this).val(lettet_limit);
                }
                $(".letter_remaining").text(len_remaining);
            }
    );
    $(".vote_submit_btn").click(
            function () {
                if ($("#vote_star_number").val() == 0) {
                    $.alert({
                        title: 'Bạn cần đánh giá sao cho sản phầm này',
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
                if ($("#vote_description").val() == '') {
                    $.alert({
                        title: 'Bạn cần viết mô tả đánh giá cho sản phầm này',
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
                if ($("#vote_user_name").val() == '') {
                    $.alert({
                        title: 'Bạn nhập tên hiển thị',
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
                    url: 'course/vote',
                    data: {
                        vote_star_number: $("#vote_star_number").val(),
                        vote_description: $("#vote_description").val(),
                        vote_user_name: $("#vote_user_name").val(),
                        vote_user_id: $("#vote_user_id").val(),
                        vote_course_id: $("#vote_course_id").val()
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
                        if (response == 1) {
                            $.alert({
                                title: 'Cảm ơn bạn đã đánh giá khóa học!',
                                content: 'Chúng tôi đã ghi nhận đánh giá của bạn.',
                                type: 'green',
                                typeAnimated: true,
                                buttons: {
                                    close: function () {
                                    }
                                }
                            });
                            $("button[class='close']").click();
                        } else
                            $.alert({
                                title: 'Đã có lỗi xảy ra!',
                                content: 'Vui lòng thực hiện lại',
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
                        return false;
                    }
                });
            }
    );
    //đánh giá 2
    $(".vote_icon").click(
            function () {
                var star_number = $(this).attr('value');
                var str = html_after_vote(star_number);
                $(".vote_icon_area").html(str);
                $(".vote_image").hide();
                $("#vote_star_number_2").val(star_number);
            }
    );
    var lettet_limit = '';
    $("#vote_description_2").keydown(
            function () {
                var len_remaining = 2500 - $(this).val().length;
                if ($(this).val().length == 2500)
                    lettet_limit = $(this).val();
                if ($(this).val().length > 2500)
                {
                    $.alert({
                        title: 'Giới hạn 2500 kí tự!',
                        content: 'Mời thử lại!',
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
                    $(this).val(lettet_limit);
                }
                $(".letter_remaining").text(len_remaining);
            }
    );
    $(".vote_submit_btn_2").click(
            function () {
                if ($("#vote_star_number_2").val() == 0) {
                    $.alert({
                        title: 'Bạn cần đánh giá sao cho sản phầm này',
                        content: ' ',
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
                if ($("#vote_description_2").val() == '') {
                    $.alert({
                        title: 'Bạn cần viết mô tả đánh giá cho sản phầm này',
                        content: 'Vui lòng thử lại!',
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
                if ($("#vote_user_name_2").val() == '') {
                    $.alert({
                        title: 'Bạn nhập tên hiển thị!',
                        content: 'Vui lòng thử lại!',
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
                    url: 'course/vote',
                    data: {
                        vote_star_number: $("#vote_star_number_2").val(),
                        vote_description: $("#vote_description_2").val(),
                        vote_user_name: $("#vote_user_name_2").val(),
                        vote_user_id: $("#vote_user_id_2").val(),
                        vote_course_id: $("#vote_course_id_2").val()
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
                        if (response == 1) {
                            $.alert({
                                title: 'Cảm ơn bạn đã đánh giá khóa học!',
                                content: 'Chúng tôi đã ghi nhận đánh giá của bạn.',
                                type: 'green',
                                typeAnimated: true,
                                buttons: {
                                    close: function () {
                                    }
                                }
                            });
                            $(".vote_hidden").hide();
                            jQuery.ajax({
                                type: "POST",
                                url: 'course/reload_vote',
                                data: {
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
                                    $(".reload_vote").html(response);
                                    return false;
                                }
                            });
                        } else
                            $.alert({
                                title: 'Đã có lỗi xảy ra!',
                                content: 'vui lòng thực hiện lại!',
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
                        return false;
                    }
                });
            }
    );

});
function html_after_vote(number) {
    var str = '';
    for (var i = 1; i <= number; i++) {
        str += '<i class="fa fa-star red fontsize18" aria-hidden="true" value="' + i + '"></i>';
    }
    return str;
}