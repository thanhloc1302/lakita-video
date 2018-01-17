//............ AJAX ............//
jQuery(function () {
    var redirect = $(".redirect").val(); //quay về khóa học của tối hay quyay về trang mua khóa học
    var redirect_type = "mobile"; //quay về tab nào
    $(".menu_login").click(function () {
        redirect_type = $(this).attr("redirect_type");
        return false;
    });

    jQuery(".click_login").click(function (e) {
        action_process(jQuery(this).val());
    });

    jQuery('#login_password').keypress(function (e) {
        if (e.which == 13) {
            action_process('login');
        }
    });

    jQuery('#signup_repassword').keypress(function (e) {
        if (e.which == 13) {
            action_process('signup');
        }
    });

    function action_process(this_click)
    {
        var url = '';
        var login_email = '';
        var login_password = '';
        var signup_name = '';
        var signup_email = '';
        var signup_phone = '';
        var signup_password = '';
        var signup_repassword = '';
        var is_remember = '';
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        var filter_phone = /^[0-9]{10,11}$/;

        if (this_click == 'login')
        {

            login_email = jQuery("#login_email").val();
            login_password = jQuery("#login_password").val();
            if ($('#is_remember').is(':checked')) {
                is_remember = '1';
            } else
                is_remember = '0';
            if (login_email == '')
            {
                $.alert({
                    title: 'Bạn phải nhập địa chỉ Email',
                    content: 'Mời bạn nhập lại',
                    theme: 'material',
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

            if (login_password == '')
            {
                $.alert({
                    title: 'Bạn phải nhập mật khẩu',
                    content: 'Mời bạn nhập lại',
                    theme: 'material',
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
            url = 'guest/action_login';
        } else if (this_click == 'signup')
        {
            signup_name = jQuery("#signup_name").val();
            signup_email = jQuery("#signup_email").val();
            signup_phone = jQuery("#signup_phone").val();
            signup_password = jQuery("#signup_password").val();
            signup_repassword = jQuery("#signup_repassword").val();

            if (signup_name == '')
            {
                $.alert({
                    title: 'Bạn phải nhập họ tên',
                    content: 'Mời bạn nhập lại',
                    theme: 'material',
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

            if (signup_email == '')
            {
                $.alert({
                    title: 'Bạn phải nhập địa chỉ Email',
                    content: 'Mời bạn nhập lại',
                    theme: 'material',
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

            if (!filter.test(signup_email))
            {
                $.alert({
                    title: 'Địa chỉ email chưa đúng định dạng',
                    content: 'Mời bạn nhập lại',
                    theme: 'material',
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

            if (signup_phone == '')
            {
                $.alert({
                    title: 'Bạn phải nhập số điện thoại',
                    content: 'Mời bạn nhập lại',
                    theme: 'material',
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

            if (!filter_phone.test(signup_phone))
            {
                $.alert({
                    title: 'Số điện thoại chưa đúng định dạng',
                    content: 'Mời bạn nhập lại',
                    theme: 'material',
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

            if (signup_password == '')
            {
                $.alert({
                    title: 'Bạn phải nhập mật khẩu',
                    content: 'Mời bạn nhập lại',
                    theme: 'material',
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

            if (signup_repassword == '')
            {
                $.alert({
                    title: 'Bạn phải nhập mật khẩu xác nhận',
                    content: 'Mời bạn nhập lại',
                    theme: 'material',
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

            if (signup_password != signup_repassword) {
                $.alert({
                    title: 'Mật khẩu xác nhận không khớp',
                    content: 'Mời bạn nhập lại',
                    theme: 'material',
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

            url = 'guest/action_register';
        } else
        {
            return false;
        }

        jQuery.ajax({
            type: "POST",
            url: url,
            data: {
                login_email: login_email,
                login_password: login_password,
                signup_name: signup_name,
                signup_email: signup_email,
                signup_phone: signup_phone,
                signup_password: signup_password,
                signup_repassword: signup_repassword,
                is_remember: is_remember,
                redirect_type: redirect_type

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
                    if (!redirect)
                        window.location.href = "khoa-hoc-cua-toi.html";
                    else
                    {
                        window.location.reload();
                    }
                } else if (response == 'tutor') {
                    if (!redirect)
                        window.location.href = "tro-giang.html";
                    else
                    {
                        window.location.reload();
                    }
                } else if (response == 'Tài khoản của bạn đã được đăng nhập từ máy tính khác !! Hãy đăng xuất và đăng nhập lại.') {
                    $.alert({
                        title: 'Tài khoản của bạn đang được đăng nhập từ máy tính khác',
                        content: 'Hãy đăng xuất và đăng nhập lại.',
                        columnClass: 'col-md-6 col-md-offset-3',
                        theme: 'material',
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

                    var notify = "";
                    notify = new Notification(
                            "Có lỗi xảy ra!",
                            {
                                body: "Tài khoản của bạn đang được đăng nhập ở nơi khác. Hãy đăng xuất và đăng nhập lại!",
                                icon: "https://lakita.vn/styles/v2.0/img/logo2.png",
                                tag: "https://lakita.vn/",
                                sound: "https://lakita.vn/styles/wrong.mp3",
                                image: "https://openclipart.org/image/2400px/svg_to_png/200369/primary-logout.png"
                            }
                    );

                } else {
                    $.alert({
                        title: response,
                        content: 'Mời bạn nhập lại',
                        theme: 'material',
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

                }

                return false;
            },
            complete: function () {
                $(".popup-wrapper").hide();
            }
        });
    }
});

/*************************** Quên mật khẩu ************************************/
$(".forgetPass").hide();
$("#fp").click(function (e) {
    e.preventDefault();
    $(".forgetPass").show();
    $(".register").hide();
});
$("#cancel").click(function (e) {
    e.preventDefault();
    $(".forgetPass").hide();
    $(".register").show();
});

$("#forgetPasswordHTML2").hide();
$("#forgetPassBtn").click(
        function () {

            var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            var forget_email = jQuery("#forgetPasswordEmail").val();
            if (!filter.test(forget_email))
            {
                $.alert({
                    title: 'Địa chỉ email chưa đúng định dạng',
                    content: 'Mời bạn nhập lại',
                    theme: 'material',
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
            } else {

                $(".popup-wrapper").show();
                jQuery.ajax({
                    type: "POST",
                    url: 'guest/forgetPassword',
                    data: {
                        forget_email: forget_email
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

                        if (response == 0)
                        {
                            $(".popup-wrapper").hide();
                            $.alert({
                                title: 'Email không tồn tại trên hệ thống.',
                                content: 'Vui lòng kiểm tra lại',
                                theme: 'material',
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
                        } else
                        {
                            $.alert({
                                title: 'Chúng tôi đã gửi 1 mã xác nhận việc quên mật khẩu vào email của bạn.',
                                content: 'Vui lòng kiểm tra email để lấy mã xác nhận!',
                                theme: 'material',
                                type: 'green',
                                typeAnimated: true,
                                buttons: {
                                    tryAgain: {
                                        text: 'Đóng',
                                        btnClass: 'btn-green',
                                        action: function () {
                                        }
                                    },
                                }
                            });
                            $("#forgetPasswordHTML1").hide();
                            $("#forgetPasswordHTML2").show();
                            $("#email_forget_send").text(forget_email);
                            $(".popup-wrapper").hide();
                        }
                        return false;
                    }
                });
            }
        }
);
$("#CreatePassBtn").click(function () {
    var code_forget = $("#code_forget").val();
    if (code_forget.length == 0) {
        $.alert({
            title: 'Vui lòng nhập mã xác nhận!',
            content: 'Mời bạn nhập lại',
            theme: 'material',
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
    if (code_forget.length != 8) {
        $.alert({
            title: 'Mã xác thực không đúng. Vui lòng kiểm tra lại!',
            content: 'Mời bạn nhập lại',
            theme: 'material',
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
    var password_forget = $("#password_forget").val();
    var re_password_forget = $("#re_password_forget").val();
    if (password_forget.length == 0) {
        $.alert({
            title: 'Vui lòng nhập mật khẩu!',
            theme: 'material',
            content: 'Mời bạn nhập lại',
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

    if (password_forget != re_password_forget) {
        $.alert({
            title: 'Mật khẩu xác nhận không khớp.',
            content: 'Mời bạn nhập lại',
            theme: 'material',
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
    if (password_forget.length < 6 || re_password_forget.length < 6)
    {
        $.alert({
            title: 'Mật khẩu phải nhiều hơn 5 kí tự.',
            content: 'Mời bạn nhập lại',
            theme: 'material',
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
        url: 'guest/sendCodeForget',
        data: {
            code_forget: code_forget,
            password_forget: password_forget,
            re_password_forget: re_password_forget
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
            var result = response.split("_");
            if (result[0] == 0)
            {
                $.alert({
                    title: result[1],
                    content: 'Mời bạn thử lại',
                    theme: 'material',
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
            } else
            {
                $.alert({
                    title: result[1],
                    content: 'Vui lòng đăng nhập bằng mật khẩu bạn vừa tạo.',
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
            return false;
        }
    });
});