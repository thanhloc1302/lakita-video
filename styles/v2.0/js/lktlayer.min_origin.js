$(function () {
    var video_id = $("#lakitaid").val();
    $.ajax({
        type: "POST",
        url: 'player/index',
        data: {
            video_id: video_id
        },
        success: function (response)
        {
            var url = b64DecodeUnicode(response);
            url = "http://171.244.19.161:1935/vod/_definst_/mp4:" + url;
            var source = '';
            if (response.indexOf("manifest")) {
                source = {
                    dash: url
                };
            } else if (response.indexOf("m3u8")) {
                source = {
                    hls: url
                };
            }

            var conf = {
                key: "62b92d64-43d0-46b3-990f-817b65d2c781",
                source: source,
                playback: {
                    autoplay: true
                },
                events: {
                    onPlaybackFinished: function(){
                        playNextVideo();
                    }
                }
            };
            var player = bitmovin.player("player");
            player.setup(conf).then(function (value) {
                // Success
                console.log("Successfully created bitmovin player instance");
            }, function (reason) {
                // Error!
                console.log("Error while creating bitmovin player instance");
            });

            var playNextVideo = function () {
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
            };

        }
    });
});

function b64DecodeUnicode(str) {
    return decodeURIComponent(Array.prototype.map.call(atob(str), function(c) {
        return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
    }).join(''));
}

