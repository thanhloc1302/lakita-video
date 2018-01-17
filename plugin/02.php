<?php
error_reporting(0);
session_start();
if( !isset($_SESSION["fb"])) {die; exit;}
if($_SESSION["fb"] != "fdsafdfrefjieqw454545645adsfdkurew%&^#%$#&ABCHD") { die; exit;}
require 'facebook-php-sdk-v4-master/src/Facebook/autoload.php';
$fb = new Facebook\Facebook([
    'app_id' => '1659071634411828',
    'app_secret' => '70eadeff70366b88905151df276ed844',
    'default_graph_version' => 'v2.5',
        ]); # login.php
$helper = $fb->getRedirectLoginHelper();
try {
    $accessToken = $helper->getAccessToken();
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

if (isset($accessToken)) {
    // Logged in!
    $_SESSION['facebook_access_token'] = (string) $accessToken;
    // Now you can redirect to another page and use the
    // access token from $_SESSION['facebook_access_token']
}

// Sets the default fallback access token so we don't have to pass it to each request
$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);

try {
    $response = $fb->get('/me?fields=name,email,picture');
    $userNode = $response->getGraphUser();
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

//echo 'Logged in as ' ; 
$picture = $userNode->getPicture()['url'];
$email = $userNode->getEmail();
$id = $userNode->getId();
$name = $userNode->getName();

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
if ($email != '') {
    
    ?>
    <script src="jquery.min.js"></script>
    <script>
        $(function () {
            jQuery.ajax({
                type: "POST",
                url: location.origin + '/guest/login_via_fb',
                data: {
                    email: "<?php echo $email; ?>",
                    name: "<?php echo $name; ?>",
                    id: "<?php echo $id; ?>",
                    picture: "<?php echo $picture; ?>",
                    protect: "RTDfgjan43#$%@46$fd@!lfdasf*&"
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
else { ?>
    <script>
    alert("Facebook của bạn cần cung cấp email để đăng nhập! Vui lòng kiểm tra quyền truy cập hoặc liên hệ với ban quản trị!");
    location.href="https://lakita.vn";    
    </script>
<?php } 













