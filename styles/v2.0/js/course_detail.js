$(
        function () {

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
            // $('#myModal3').modal({show: true});
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
            /*****************************************************SEARCH**********************************************/
            $("input#key_word").on({
                focus: function () {
                    $(this).val('');
                },
                blur: function () {
                    if ($(this).val() == '')
                        $(this).val('Tìm các khóa học bạn quan tâm...');
                }
            });
            $('.searchIcon').click(
                    function () {
                        $("#searchForm").submit();
                    }
            );
            /*****************************************************SEARCH (HẾT)**********************************************/


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
                            return;
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
                                console.log(response);
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
                                    $('.price').text(response.course_price_sale.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + ' VNĐ ');
                                }
                                return false;
                            },
                            complete: function () {
                                $(".popup-wrapper").hide();
                            }
                        });
                    }
            );

            /*===============================yêu thích khóa học =======================================*/

            $(".love_link").click(function () {
                var courses_id = $("#vote_course_id_2").val();
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
                            $.alert({
                                title: 'Thêm khóa học vào danh sách yêu thích thành công',
                                content: ' ',
                                type: 'green',
                                typeAnimated: true,
                                buttons: {
                                    close: function () {
                                    }
                                }
                            });
                            $(".love_link").html('<i class="fa fa-heart red" aria-hidden="true"></i>  Tôi thích khóa học này');
                        } else
                        {
                            $.alert({
                                title: response,
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
                        }
                        return false;
                    }
                });
                return false;
            });
            $(".love_link_no_login").click(function () {
                $.alert({
                    title: 'Bạn cần đăng nhập để đưa khoá học này vào danh sách yêu thích của bạn!',
                    content: 'Vui lòng thử lại',
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
            });
        });

