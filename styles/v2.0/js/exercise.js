$(document).ready(function () {


//chọn khóa để upfile bài tập
    $(".type_submit").click(function () {
        $("#type_submit").val($(this).attr('type_submit'));
    });
    $('[name="course_id_input"]').change(function () {
        jQuery.ajax({
            type: "POST",
            url: 'student2/studying/load_learn',
            data: {
                course_id_input: $(this).val()
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
                $('[name="learn_id_input"]').empty().html(response);
                return false;
            }
        });
    });


//chọn khóa để load danh sách
    $('[name="course_id_input1"]').change(function () {

        jQuery.ajax({
            type: "POST",
            url: 'student2/studying/load_learn_search',
            data: {
                course_id_input1: $(this).val()
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
                $('[name="learn_id_input1"]').empty().html(response);
                return false;
            }
        });
    });


//ajax up load bài tập


    $("#uploadForm").on('submit', (function (e) {
        e.preventDefault();
        var course_id_input = $('[name="course_id_input"]').val();
        var learn_id_input = $('[name="learn_id_input"]').val();
//        if (file_data == undefined) {
//            $.alert({
//                title: 'Bạn phải chọn file để tải lên!',
//                content: 'Mời bạn thử lại',
//                theme: 'material',
//                type: 'red',
//                typeAnimated: true,
//                buttons: {
//                    tryAgain: {
//                        text: 'Thử lại',
//                        btnClass: 'btn-red',
//                        action: function () {
//                        }
//                    },
//                    close: function () {
//                    }
//                }
//            });
//            return false;
//        }

        if (course_id_input == 0) {
            $.alert({
                title: 'Bạn phải chọn khóa học!',
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
            return false;
        }

        if (learn_id_input == 0) {
            $.alert({
                title: 'Bạn phải chọn bài học!',
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
            return false;
        }
        
        var data = new FormData(this);
        console.log($('[name="excel"]').prop("files")[0]);
        data = data.append( 'excel', $('[name="excel"]').prop("files")[0] );
        
        jQuery.ajax({
            type: "POST",
            url: 'student2/studying/action_upload',
            data: data,
            dataType: "text",
            scriptCharset: "utf-8",
            processData:false,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            beforeSend: function (xhr)
            {
                xhr.setRequestHeader("Ajax-Request", "true");
            },
            success: function (response)
            {
                console.log(response);
            }
        });


    }));

//    $("#nap").click(function () {
//        var file_data = ('[name="excel"]').files;
//        var course_id_input = $('[name="course_id_input"]').val();
//        var learn_id_input = $('[name="learn_id_input"]').val();
//        var note = $('[name="note"]').val();
//        var ok = $('[name="ok"]').val();
//
//        alert(file_data);
//        if (file_data == undefined) {
//            $.alert({
//                title: 'Bạn phải chọn file để tải lên!',
//                content: 'Mời bạn thử lại',
//                theme: 'material',
//                type: 'red',
//                typeAnimated: true,
//                buttons: {
//                    tryAgain: {
//                        text: 'Thử lại',
//                        btnClass: 'btn-red',
//                        action: function () {
//                        }
//                    },
//                    close: function () {
//                    }
//                }
//            });
//            return false;
//        }
//
//        if (course_id_input == 0) {
//            $.alert({
//                title: 'Bạn phải chọn khóa học!',
//                content: 'Mời bạn thử lại',
//                theme: 'material',
//                type: 'red',
//                typeAnimated: true,
//                buttons: {
//                    tryAgain: {
//                        text: 'Thử lại',
//                        btnClass: 'btn-red',
//                        action: function () {
//                        }
//                    },
//                    close: function () {
//                    }
//                }
//            });
//            return false;
//        }
//
//        if (learn_id_input == 0) {
//            $.alert({
//                title: 'Bạn phải chọn bài học!',
//                content: 'Mời bạn thử lại',
//                theme: 'material',
//                type: 'red',
//                typeAnimated: true,
//                buttons: {
//                    tryAgain: {
//                        text: 'Thử lại',
//                        btnClass: 'btn-red',
//                        action: function () {
//                        }
//                    },
//                    close: function () {
//                    }
//                }
//            });
//            return false;
//        }
//
//        jQuery.ajax({
//            type: "POST",
//            url: 'student2/studying/action_upload',
//            data: {
//                file_data: file_data,
//                course_id_input: course_id_input,
//                learn_id_input: learn_id_input,
//                note: note,
//                ok: ok
//            },
//            dataType: "text",
//            scriptCharset: "utf-8",
//            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
//            beforeSend: function (xhr)
//            {
//                xhr.setRequestHeader("Ajax-Request", "true");
//            },
//            success: function (response)
//            {
//                console.log(response);
//            }
//        });
//
//    });

});
