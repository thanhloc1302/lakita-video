<?php

class MY_Controller extends CI_Controller {

    var $data = array();

    function __construct() {
        parent::__construct();
    }

    protected function _getUserIP() {
        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }

        return $ip;
    }

    protected function _check_exist_login($id, $load_from_ajax = true) {
       // return true;
        // kiểm tra tài khoản có đăng nhập từ máy tính khác không
        $check_watching = $this->lib_mod->load_all('watching_time', 'time, token', array('student_id' => $id), '', '', '');
        //   echo  (!empty($check_watching) && abs($check_watching[0]['time'] - time()) < 60);die;
        if (!empty($check_watching) && abs($check_watching[0]['time'] - time()) < 60) {
            $token = $this->session->userdata('token');
            if ($token != $check_watching[0]['token']) {
                if (!$load_from_ajax) {
                    echo '<script> var notify = "";
                            notify = new Notification(
                            "Có lỗi xảy ra!", 
                            {
                                body: "Tài khoản của bạn đang được đăng nhập ở nơi khác. Hãy đăng xuất và đăng nhập lại!",
                                icon: "https://lakita.vn/styles/v2.0/img/logo2.png", 
                                image: "https://openclipart.org/image/2400px/svg_to_png/200369/primary-logout.png"
                            }
                    );
                     setTimeout(function(){
                            alert("Tài khoản của bạn đã được đăng nhập từ máy tính khác !! Hãy đăng xuất và đăng nhập lại. "); 
                        },100);
                   </script>';
                    die;
                } else {
                    echo 'Tài khoản của bạn đã được đăng nhập từ máy tính khác !! Hãy đăng xuất và đăng nhập lại.';
                    die;
                }
            }
        }
    }

}
