$(function () {
    console.log(jwplayer.version);
    var hayFlash = function (a, b) {
        try {
            a = new ActiveXObject(a + b + '.' + a + b);
        } catch (e) {
            a = navigator.plugins[a + ' ' + b];
        }
        return !!a;
    }('Shockwave', 'Flash');
    var hasFlash = '';
    if (hayFlash) {
        // alert("Flash Player is installed");
        hasFlash = 'yes';
    } else {
        hasFlash = 'no';
        //lert("Your browser doesn't have Flash Player installed");
    }

    var video_id = $("#lakitaid").val();
    $.ajax({
        type: "POST",
        url: 'player/index',
        data: {
            video_id: video_id,
            hayFlash: hasFlash
        },
        dataType: "text",
        beforeSend: function (xhr)
        {
            xhr.setRequestHeader("Ajax-Request", "true");
        },
        success: function (response)
        {
            console.log(response);
        //    console.log(hayFlash);
//            var rs = response.split(":");
        //    console.log(rs[0]);
            if (response == '')
            {
                alert('Video không tồn tại')
                return;
            }
            
            
            
            jwplayer('mediaspace').setup({
                file: response,
                autostart: 'false',
                width: "100%",
                aspectratio: "16:9",
                stretching: 'fill',
                dash: true,

                image: "https://lakita.vn/styles/images/play.jpg",
                events: {
                    onComplete: function () {
                        //xác định xem trang học hay trang chi tiết khóa học để auto next
                        if ($("#auto_next").val() == '1') {
                            $.ajax({
                                type: "POST",
                                url: 'player/next_learn',
                                data: {
                                    curr_learn_id: $("#curr_learn_id").val()
                                },
                                dataType: "text",
                                beforeSend: function (xhr)
                                {
                                    xhr.setRequestHeader("Ajax-Request", "true");
                                },
                                success: function (response)
                                {
                                    console.log(response);
                                    if (response != '0') {
                                        window.location.assign(response);
                                    }
                                }
                            });
                        }

                    }
                }
            });
        }
    });
});
