$(
        function () {

            $('.carousel').carousel({
                interval: 15000
            });
            var contentWidthFooter = $('div.footer').innerWidth();
            $('div.footer div.row').css({"width": contentWidthFooter});
            $(window).resize(function () {
                var contentHeight = $('div.TestimonialHighlight').innerHeight();
                var contentWidth = $('div.TestimonialHighlight').innerWidth();
                $('div.content').css({"height": contentHeight, "width": contentWidth});
                var contentWidthFooter = $('div.footer').innerWidth();
                $('div.footer div.row').css({"width": contentWidthFooter});
            });
            /***********************************************VOUCHER*************************************************/
            $("#voucher1").click(
                    function () {
                        var coupon = $("#coupon").val();
                        if (coupon == '') {
                            $.alert({
                                title: 'Vui lòng nhập vào mã voucher!',
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
                            return false;
                        }
                        var url = "course/applyVoucher";
                        jQuery.ajax({
                            type: "POST",
                            url: url,
                            data: {
                                coupon: coupon
                            },
                            dataType: "json",
                            scriptCharset: "utf-8",
                            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                            beforeSend: function (xhr)
                            {
                                xhr.setRequestHeader("Ajax-Request", "true");
                                $(".popup-wrapper").show();
                            },
                            success: function (response)
                            {
                                if (response.success == 0) {
                                    $.alert({
                                        title: 'Không tồn tại mã voucher!',
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
                                } else if (response.success == 1) {
                                    $.alert({
                                        title: 'Mã voucher này không áp dụng cho khóa học này!',
                                        content: 'Vui lòng kiểm tra lại!',
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
                                } else if (response.success == 2) {
                                    $.alert({
                                        title: 'Mã voucher này chỉ áp dụng khi bạn đã đăng ký khóa "Bí quyết làm chủ Excel 2010" hoặc khóa "Bí quyết làm chủ Excel 2007"!',
                                        content: 'Vui lòng kiểm tra lại!',
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
                                } else {
                                    $(".voucher").html('<span style="color: red;">Áp dụng thành công mã voucher trị giá ' + response.voucher_price.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + ' VNĐ !</span>');
                                    $(".voucher-modal").html('<strong> ' + response.voucher_price.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + ' VNĐ !</strong>');
                                    $('.price-modal').html('<strong>' + response.course_price_sale.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + ' VNĐ </strong>');
                                }
                                return false;
                            },
                            complete: function () {
                                $(".popup-wrapper").hide();
                            }
                        });
                    }
            );
            /***********************************************VOUCHER - HẾT*************************************************/

            /*==============================================MUA KHÓA HỌC BẰNG COD========================================*/
            $(".btn-cod").click(function () {
                var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
                var filter_phone = /^[0-9]{10,11}$/;
                var name = $("[name='cod_name']").val();
                if (name == '') {
                    $.alert({
                        title: 'Vui lòng nhập họ tên!',
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
                    return false;
                }

                var email = $("[name='cod_email']").val();
                if (email == '') {
                    $.alert({
                        title: 'Vui lòng nhập email!',
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
                    return false;
                }

                var tinh = $("[name='cod_tinh']").val();
                if (tinh == '') {
                    $.alert({
                        title: 'Vui lòng nhập tên tỉnh!',
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
                    return false;
                }

                var quan = $("[name='cod_quan']").val();
                if (quan == '') {
                    $.alert({
                        title: 'Vui lòng nhập tên quận/huyện!',
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
                    return false;
                }

                var dia_chi = $("[name='cod_dia_chi']").val();
                if (dia_chi == '') {
                    $.alert({
                        title: 'Vui lòng nhập địa chỉ!',
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
                    return false;
                }

                var phone = $("[name='cod_phone']").val();
                if (phone == '') {
                    $.alert({
                        title: 'Vui lòng nhập số điện thoại!',
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
                    return false;
                }

                if (!filter.test(email))
                {
                    $.alert({
                        title: 'Địa chỉ email chưa đúng định dạng!',
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
                    return false;
                }
                if (!filter_phone.test(phone))
                {
                    $.alert({
                        title: 'Số điện thoại chưa đúng định dạng!',
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
                    return false;
                }

                jQuery.ajax({
                    type: "POST",
                    url: 'course/purchase_by_cod',
                    data: {
                        name: name,
                        email: email,
                        tinh: tinh,
                        quan: quan,
                        dia_chi: dia_chi,
                        phone: phone,
                        submit_form: 'purchase_by_cod'
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
                        if (response == '104')
                            location.assign("mua-khoa-hoc-thanh-cong.html");
                        else
                            $.alert({
                                title: 'Đã có lỗi xảy ra!',
                                content: 'Vui lòng thử lại sau!',
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
                    },
                    complete: function () {
                        $(".popup-wrapper").hide();
                    }
                });
            });
            /*==============================================MUA KHÓA HỌC BẰNG COD (hết)========================================*/

            /*==============================================MUA KHÓA HỌC THANH TOÁN TRỰC TIẾP========================================*/
            $(".btn-direct").click(function () {
                var filter_phone = /^[0-9]{10,11}$/;
                var name = $("[name='direct_name']").val();
                if (name == '') {
                    $.alert({
                        title: 'Vui lòng nhập họ tên!',
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
                    return false;
                }
                var phone = $("[name='direct_phone']").val();
                if (phone == '') {
                    $.alert({
                        title: 'Vui lòng nhập số điện thoại!',
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
                    return false;
                }
                if (!filter_phone.test(phone))
                {
                    $.alert({
                        title: 'Số điện thoại chưa đúng định dạng!',
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
                    return false;
                }
                jQuery.ajax({
                    type: "POST",
                    url: 'course/purchase_direct',
                    data: {
                        name: name,
                        phone: phone,
                        submit_form: 'purchase_by_direct'
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
                        if (response == '104')
                            location.assign("mua-khoa-hoc-thanh-cong.html");
                        else
                            $.alert({
                                title: 'Đã có lỗi xảy ra!',
                                content: 'Vui lòng thử lại sau!',
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
                    },
                    complete: function () {
                        $(".popup-wrapper").hide();
                    }
                });
            });
            /*==============================================MUA KHÓA HỌC THANH TOÁN TRỰC TIẾP (hết)========================================*/

            /*==============================================MUA KHÓA HỌC CHUYỂN KHOẢN========================================*/
            $(".btn-transfer").click(function () {
                var filter_phone = /^[0-9]{10,11}$/;
                var name = $("[name='transfer_name']").val();
                if (name == '') {
                    $.alert({
                        title: 'Vui lòng nhập họ tên!',
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
                    return false;
                }
                var phone = $("[name='transfer_phone']").val();
                if (phone == '') {
                    $.alert({
                        title: 'Vui lòng nhập số điện thoại!',
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
                    return false;
                }
                if (!filter_phone.test(phone))
                {
                    $.alert({
                        title: 'Số điện thoại chưa đúng định dạng!',
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
                    return false;
                }
                jQuery.ajax({
                    type: "POST",
                    url: 'course/purchase_transfer',
                    data: {
                        name: name,
                        phone: phone,
                        submit_form: 'purchase_by_transfer'
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
                        if (response == '104')
                            location.assign("mua-khoa-hoc-thanh-cong.html");
                        else
                            $.alert({
                                title: 'Đã có lỗi xảy ra!',
                                content: 'Vui lòng thử lại sau!',
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
                    },
                    complete: function () {
                        $(".popup-wrapper").hide();
                    }
                });
            });
            /*==============================================MUA KHÓA HỌC CHUYỂN KHOẢN (hết)========================================*/

            /*==============================================MUA KHÓA HỌC THANH TOÁN BẰNG THẺ CÀO ========================================*/
            $(".btn-mobi").click(function () {
                var select_method = $('input[name=select_method]:checked', '#form_mobi').val();
                var txtSoPin = $('#txtSoPin').val();
                var txtSoSeri = $('#txtSoSeri').val();

                if (txtSoPin == '') {
                    $.alert({
                        title: 'Vui lòng nhập mã số thẻ!',
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
                    return false;
                }

                if (txtSoSeri == '') {
                    $.alert({
                        title: 'Vui lòng nhập số seri!',
                        content: 'Vui lòng thử lại!',
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
                    return false;
                }
                jQuery.ajax({
                    type: "POST",
                    url: 'course/purchase_by_mobile_cash',
                    data: {
                        select_method: select_method,
                        txtSoPin: txtSoPin,
                        txtSoSeri: txtSoSeri
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
                        var result = response.split('_');
                        if (result[0] == 0) {
                            $.alert({
                                title: 'Bạn đã nạp thành công ' + result[1] + ' vào trong tài khoản.',
                                content: 'Số tiền bạn nạp không đủ để mua khóa học, vì vậy số tiền nạp sẽ được cộng vào số dư tài khoản lakita của bạn!',
                                theme: 'material',
                                type: 'red',
                                typeAnimated: true,
                                buttons: {
                                    tryAgain: {
                                        text: 'Đóng',
                                        action: function () {
                                        }
                                    }
                                }
                            });
                            return false;
                        } else if (result[0] == 1) {
                            $.alert({
                                title: 'Lỗi : ' + result[1],
                                content: 'Vui lòng thử lại!',
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
                            return false;
                        } else if (result[0] == 2) {
                            $.alert({
                                title: 'Chúc mừng bạn đã mua khóa học thành công!',
                                content: 'Bạn sẽ được chuyển đến trang chi tiết khóa học để học ngay! ',
                                theme: 'material',
                                type: 'green',
                                typeAnimated: true,
                                buttons: {
                                    tryAgain: {
                                        text: 'Đóng',
                                        action: function () {
                                            location.replace(result[1]);
                                        }
                                    }
                                }
                            });
                        }
                    },
                    complete: function () {
                        $(".popup-wrapper").hide();
                    }
                });
            });

            /*==============================================MUA KHÓA HỌC THANH TOÁN BẰNG THẺ CÀO (HẾT)========================================*/
            /*==============================================MUA KHÓA HỌC THANH TOÁN BẰNG THẺ NGÂN HÀNG ========================================*/

            $(".btn-atm").click(function () {
                var bankcode = $('input[name=bankcode]:checked', '#form_atm').val();
      
                var option_payment = $('input[name=option_payment]', '#form_atm').val();
                if (bankcode == undefined) {
                    $.alert({
                        title: 'Hãy chọn ngân hàng phát hành thẻ',
                        content: 'Vui lòng thử lại!',
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
                    return false;
                }
                jQuery.ajax({
                    type: "POST",
                    url: 'course/purchase_by_atm',
                    data: {
                        bankcode: bankcode,
                        option_payment: option_payment
                    },
                    dataType: "json",
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
                        if (response.type == 0) {
                            $.alert({
                                title: response.mes,
                                content: 'Vui lòng thử lại!',
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
                            return false;
                        } else if (response.type == 1) {
                            window.location.replace(response.mes);
                        } else if (response.type == 2) {
                            $.alert({
                                title: response.mes,
                                content: 'Vui lòng thử lại!',
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
                            return false;
                        }else if (result[0] == 3) {
                            $.alert({
                                title: result[1],
                                content: 'Vui lòng thử lại!',
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
                            return false;
                        }

                    }
                });


            });

            /*==============================================MUA KHÓA HỌC THANH TOÁN BẰNG THẺ NGÂN HÀNG (HẾT) ========================================*/

            /*==============================================MUA KHÓA HỌC THANH TOÁN BẰNG THẺ VISA ========================================*/
            $(".btn-visa").click(function () {
                var bankcode = $('input[name=bankcode]:checked', '#form_visa').val();
                var option_payment = $('input[name=option_payment]', '#form_visa').val();
                if (bankcode === undefined) {
                    $.alert({
                        title: 'Hãy chọn loại thẻ để thanh toán',
                        content: 'Vui lòng thử lại!',
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
                    return false;
                }
                jQuery.ajax({
                    type: "POST",
                    url: 'course/purchase_by_atm',
                    data: {
                        bankcode: bankcode,
                        option_payment: option_payment
                    },
                    dataType: "json",
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
                        if (response.type == 0) {
                            $.alert({
                                title: response.mes,
                                content: 'Vui lòng thử lại!',
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
                            return false;
                        } else if (response.type == 1) {
                            window.location.replace(response.mes);
                        } else if (response.type == 2) {
                            $.alert({
                                title: response.mes,
                                content: 'Vui lòng thử lại!',
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
                            return false;
                        }else if (result[0] == 3) {
                            $.alert({
                                title: result[1],
                                content: 'Vui lòng thử lại!',
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
                            return false;
                        }

                    }
                });


            });



            /*==============================================MUA KHÓA HỌC THANH TOÁN BẰNG THẺ VISA (HẾT) ========================================*/




            /*==============================================MUA KHÓA HỌC BẰNG SỐ DƯ LAKITA ========================================*/
            $(".btn-lakita").click(function () {
                jQuery.ajax({
                    type: "POST",
                    url: 'course/purchase_by_lakita_balance',
                    data: {
                        submit_form: 'purchase_by_lakita'
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
                        if (response == 0)
                        {
                            $.alert({
                                title: 'Số dư của bạn không đủ để mua khóa học!',
                                content: 'Vui lòng nạp thêm vào tài khoản!',
                                type: 'red',
                                typeAnimated: true,
                                buttons: {
                                    tryAgain: {
                                        text: 'Nạp thêm',
                                        btnClass: 'btn-red',
                                        action: function () {
                                            location.replace('https://lakita.vn/nap-tien-vao-tai-khoan.html');
                                        }
                                    },
                                    close: function () {
                                        return false;
                                    }
                                }
                            });
                            return false;
                        } else
                        {
                            $.alert({
                                title: 'Chúc mừng bạn đã mua khóa học thành công!',
                                content: 'Hệ thống sẽ đưa bạn đến trang học tập để bạn học ngay!',
                                type: 'green',
                                typeAnimated: true,
                                buttons: {
                                    close: function () {
                                    }
                                }
                            });
                            location.replace(response);
                        }
                        return false;
                    },
                    complete: function () {
                        $(".popup-wrapper").hide();
                    }
                });
            });
            /*==============================================MUA KHÓA HỌC BẰNG SỐ DƯ LAKITA (hết)========================================*/

        });