$(
        function () {
            
            $("#back_to_login").click(function(){
                $("a#tab_login").click();
            });
            $("#menu_register").click(function () {
                $("#show_modal").click();
                $("a#tab_register").click();
                return false;
            });
            $("#menu_login").click(function () {
                $("#show_modal").click();
                $("a#tab_login").click();
                return false;
            });
            $("a#link_register").click(function () {
                $("a#tab_register").click();
                return false;
            });
            $("a#link_login").click(function () {
                $("a#tab_login").click();
                return false;
            });
            $("a#link_forgetpassword").click(function () {
                $("a#tab_forgetpassword").click();
                return false;
            });
           
            $('.searchIcon').click(
                    function () {
                        $("#searchForm").submit();
                    }
            );
            $("input#key_word").on({
                focus: function () {
                    $(this).val('');
                },
                blur: function () {
                    if ($(this).val() == '')
                        $(this).val('Tìm các khóa học bạn quan tâm...');
                }
            });
            $(window).resize(function () {
                var contentHeight = $('div.TestimonialHighlight').innerHeight();
                var contentWidth = $('div.TestimonialHighlight').innerWidth();
                $('div.content').css({"height": contentHeight, "width": contentWidth});
            });

             $("#forgetPasswordHTML2").hide();
            $("#forgetPassBtn").click(
                    function () {

                        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
                        var forget_email = jQuery("#forgetPasswordEmail").val();
                        if (!filter.test(forget_email))
                        {
                            alert('Địa chỉ Email chưa đúng định dạng');
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
                                        alert('Email không tồn tại trên hệ thống. Vui lòng kiểm tra lại!');
                                    } else
                                    {
                                        alert('Chúng tôi đã gửi 1 mã xác nhận việc quên mật khẩu vào email của bạn, vui lòng kiểm tra email để lấy mã xác nhận!');
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
                    alert("Vui lòng nhập mã xác nhận!");
                    return;
                }
                if (code_forget.length != 8) {
                    alert("Mã xác thực không đúng. Vui lòng kiểm tra lại!");
                    return;
                }
                var password_forget = $("#password_forget").val();
                var re_password_forget = $("#re_password_forget").val();
                if (password_forget.length == 0) {
                    alert("Vui lòng nhập mật khẩu!");
                    return;
                }

                if (password_forget != re_password_forget) {
                    alert("Mật khẩu xác nhận không khớp. Vui lòng kiểm tra lại!");
                    return;
                }
                if (password_forget.length < 6 || re_password_forget.length < 6)
                {
                    alert("Mật khẩu phải nhiều hơn 5 kí tự. Vui lòng nhập lại!");
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
                            alert(result[1]);
                        } else
                        {
                            alert(result[1]);
                            $("a#tab_login").click();
                        }
                        return false;
                    }
                });
            });
        });