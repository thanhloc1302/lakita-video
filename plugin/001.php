<?php 
require 'facebook-php-sdk/src/facebook.php';

$facebook = new Facebook(array(
  'appId'  => '1659071634411828',
  'secret' => '70eadeff70366b88905151df276ed844',
));

// Get User ID
$user = $facebook->getUser();

if ($user) {
	
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl();
  echo '<a href="'.$loginUrl.'">Login</a>';
}
if ($user) {
	try{
		$user_profile = $facebook->api('/me?fields=id,name,email,picture,photos');
	print_r(	$user_profile);
	}
catch(FacebookApiException $e){
	error_log($e);
	$user  = null;
}	
}
