<?php
if(false){
    ?>
 var googleUser = {};
    var startApp = function () {
        gapi.load('auth2', function () {
            // Retrieve the singleton for the GoogleAuth library and set up the client.
            auth2 = gapi.auth2.init({
                client_id: '125422840079-s9qlg9evcgq5snfr4m611n8j3kf4t9h4.apps.googleusercontent.com',
                cookiepolicy: 'single_host_origin',
                // Request scopes in addition to 'profile' and 'email'
                //scope: 'additional_scope'
            });
            attachSignin(document.getElementById('customBtn'));
            attachSignin(document.getElementById('customBtn2'));
        });
    };

    function attachSignin(element) {
        auth2.attachClickHandler(element, {},
                function (googleUser) {
                    var profile = googleUser.getBasicProfile();
                    $.ajax({
                        type: "POST",
                        url: 'guest/login_via_fb',
                        data: {
                            name: profile.getName(),
                            email: profile.getEmail(),
                            picture: profile.getImageUrl(),
                            protect: 'RTDfgjan43#$%@46$fd@!lfdasf*&'
                        },
                        dataType: "text",
                        beforeSend: function (xhr)
                        {
                            xhr.setRequestHeader("Ajax-Request", "true");
                        },
                        success: function (response)
                        {
                            console.log(response);
                            if (response === 'success')
                                location.replace(location.origin + '/khoa-hoc-cua-toi.html');
                            else
                                location.replace(location.origin + '/guest/fbrequire');
                        }
                    });

                }, function (error) {
            alert(JSON.stringify(error, undefined, 2));
        });
    }
<?php }?>