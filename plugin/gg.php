
<?php
 
require_once 'vendor/autoload.php';
 
// Lấy những giá trị này từ https://console.google.com
$client_id = '125422840079-ars8uilref93d7jaic148nkqm41vao9u.apps.googleusercontent.com'; 
$client_secret = 'opRXahuLdKivgXU_utim6G42';
//$redirect_uri = 'https://lakita.vn/plugin/gg.php';
$redirect_uri = 'https://lakita.vn/plugin/gg.php';

$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");
 
$service = new Google_Service_Oauth2($client);
 
if (isset($_GET['code'])) {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    $user = $service->userinfo->get(); 
   if ($user['email'] != '') {
    
    ?>
    <script src="jquery.min.js"></script>
    <script>
        $(function () {
            jQuery.ajax({
                type: "POST",
                url: location.origin + '/guest/login_via_fb',
                data: {
                    email: "<?php echo $user['email']; ?>",
                    name: "<?php echo $user['familyName'].' '.$user['givenName']; ?>",
                    id: "<?php echo $user['id']; ?>",
                    picture: "<?php echo $user['picture']; ?>",
                    protect: "WVmYEKbFEj6WVmYEKbFEj@%%#^%$##@#WVmYEKbFEj67R5HwEp7o67R5HwEp7o7R5HwEp7o"
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
                    //	console.log(response);
                    if (response === 'success')
                        location.replace(location.origin + '/khoa-hoc-cua-toi.html');
                    else
                        location.replace(location.origin + '/guest/fbrequire');
                }
            });
        });
    </script>
 <?php
}
}

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
} else { // Ngược lại tạo 1 link để login
    $authUrl = $client->createAuthUrl();
}
 
