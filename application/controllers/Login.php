<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author phong
 */
class Login extends CI_Controller {

    public function index() {
        $get = $this->input->get();
        $this->load->model('uid_model');
        if (!isset($get['access_token']) || $get['access_token'] != md5('lakita2017')) {
            redirect('https://lakita.vn');
        }
        if (!isset($get['token'])) {
            redirect('https://lakita.vn');
        }
        $token = $get['token'];
        $input = [];
        $input['select'] = 'uid';
        $input['where'] = array('token' => $token);
        $uid = $this->uid_model->load_all($input);
        if (empty($uid)) {
            redirect('https://lakita.vn');
        } else {
            $this->session->set_userdata('token', $get['token_login']);
            $this->session->set_userdata('user_id', $uid[0]['uid']);
            $last_page = $this->session->userdata('last_page');
            redirect($last_page);
        }
    }

}
