<?php 
session_start();
require 'facebook-php-sdk-v4-master/src/Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '1659071634411828',
  'app_secret' => '70eadeff70366b88905151df276ed844',
  'default_graph_version' => 'v2.5',
]);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes']; // optional
//$baseUrl =  "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
//$baseUrl = ($baseUrl == 'https://lakita.vn/plugin/01.php')? 'https://lakita.vn/plugin/02.php' : 'http://lakita.com.vn/plugin/02.php';
$loginUrl = $helper->getLoginUrl('https://lakita.vn/plugin/02.php', $permissions);

echo '<script>location.replace("'. $loginUrl.'");</script>';
$_SESSION["fb"] = "fdsafdfrefjieqw454545645adsfdkurew%&^#%$#&ABCHD";


