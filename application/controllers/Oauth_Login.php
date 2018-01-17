<?php

class Oauth_Login extends CI_Controller {

    public $user = "";

    public function __construct() {
        parent::__construct();
    }

// Store user information and send to profile page
    public function index() {
        $this->load->model('facebook_model');
        echo '<a href="' . $this->facebook_model->loginUrl() . '"> link </a>';
    }

    public function data() {
        $this->load->model('facebook_model');
        $info = $this->facebook_model->getUserInfo();
        print_r($info);
    }

    public function data2() {
        $this->load->model('google_model');
        $info = $this->google_model->getInfo();
        echo ($info);
    }
     public function data3() {
        $this->load->model('google_model');
        $info = $this->google_model->getInfo2($_GET['code']);
    }

// Logout from facebook
    public function logout() {

// Destroy session
        session_destroy();

// Redirect to baseurl
        redirect(base_url());
    }

}

?>