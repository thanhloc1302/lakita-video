<?php

define('FACEBOOK_SDK_V4_SRC_DIR', APPPATH . '/models/facebook/');

require_once("facebook/autoload.php");


class Facebook_model extends CI_Model {

    public $fb;
    public $access_token;

    public function __construct() {
        parent::__construct();
        $this->fb = new Facebook\Facebook([
            'app_id' => '315347858825221',
            'app_secret' => 'bb002ba801af5d39a48ad2c8dd50e905',
            'default_graph_version' => 'v2.11',
        ]);
    }

    public function loginUrl() {
        $helper = $this->fb->getRedirectLoginHelper();
        $permissions = ['email', 'user_friends']; // Optional permissions
        $loginUrl = $helper->getLoginUrl(base_url() . "guest/login_via_fb2", $permissions);
    //    echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
        return htmlspecialchars($loginUrl);
    }

    public function getUserInfo() {
        
        $getAccessToken = file_get_contents('https://graph.facebook.com/v2.11/oauth/access_token?client_id=315347858825221&redirect_uri=https://lakita.vn/guest/login_via_fb2&client_secret=bb002ba801af5d39a48ad2c8dd50e905&code='. $this->input->get('code'));
        $accessTokenObj = json_decode($getAccessToken);
     //  print_r($accessTokenObj); die;
        //$helper = $this->fb->getRedirectLoginHelper();
//        try {
//            $accessToken = $helper->getAccessToken();
//        } catch (Facebook\Exceptions\FacebookResponseException $e) {
//            // When Graph returns an error
//            echo 'Graph returned an error: ' . $e->getMessage();
//            exit;
//        } catch (Facebook\Exceptions\FacebookSDKException $e) {
//            // When validation fails or other local issues
//            echo 'Facebook SDK returned an error: ' . $e->getMessage();
//            exit;
//        }
        $this->fb->setDefaultAccessToken($accessTokenObj->access_token);

        try {
            $response = $this->fb->get('/me?fields=name,email,picture');
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
        $info = array();
        $info['picture'] = $userNode->getPicture()['url'];
        $info['email'] = $userNode->getEmail();
        $info['id'] = $userNode->getId();
        $info['name'] = $userNode->getName();
        return $info;
    }

}
