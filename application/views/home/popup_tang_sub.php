<?php if (!isset($_GET['action'])) { ?>
    <div class="modal fade" id="modal_sub" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div data-toggle="modal" data-target="#myModal" class="modal-content" style="background-image: url('http://lakita.vn/styles/images/popup_tang_sub.png');background-repeat: no-repeat;background-size: contain; ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="position: absolute; top: 8px; right: -58px; z-index: 999999999;"><i class="fa fa-times" aria-hidden="true"></i></button>
                <div style="margin-left: -4em;">
<!--                    <script type="text/javascript" src="https://app.getresponse.com/view_webform_v2.js?u=B0Ivo&webforms_id=15212904"></script>                </div>-->
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="modal fade" id="modal_sub_success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div data-toggle="modal" data-target="#myModal" class="modal-content" style="position: relative">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="position: absolute; top: 8px; right: 0px; z-index: 999999999;"><i class="fa fa-times" aria-hidden="true"></i></button>
                <img class="img img-responsive" src="https://lakita.vn/styles/images/popup_tang_sub_success.png">
            </div>
        </div>
    </div>
<?php } ?>
<script>
    $(document).ready(function () {

        checkCookie();

        $("#modal_sub_success").modal('show');
        /*$('#modal_sub').modal('show');*/

        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        function checkCookie() {
            var popup_sub = getCookie("popup_sub70");
            if (popup_sub == "") {
                $('#modal_sub').modal('show');
                setCookie("popup_sub70", 'popup_sub70', 365);
            }
        }


    });
</script>
