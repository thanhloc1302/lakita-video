<?php

class About extends MY_Controller {
  
    public function __construct() {
        parent::__construct();
    }

    function load_data() {
        $data['setting'] = $this->lib_mod->detail('setting', array('id' => 1));
        $data['category_news'] = $this->lib_mod->load_all('category_3s', '', array('status' => 1, 'type_id' => 4, 'parent' => 0), '', '', array('sort' => 'desc'));
        $data['courses_right'] = $this->lib_mod->load_all('courses', '', array('status' => 1, 'hot' => 1), 8, '', array('sort' => 'desc'));
        $data['courses_top'] = $this->lib_mod->load_all('courses', '', array('status' => 1), '', '', array('sort' => 'desc'));

        return $data;
    }

    function tuyendung($id) {
        $data = $this->data;
        $user_id = $this->session->userdata('user_id');
        if (isset($user_id)) {
            $data['student'] = $this->lib_mod->load_all('student', '', array('id' => $user_id), '', '', '');
        }
        $data['tuyendung'] = $id;
        $data['banner_main'] = $this->lib_mod->load_all('banner', '', array('status' => 1, 'type_id' => 0), 1, '', array('sort' => 'desc'));
        $data['banner_1'] = $this->lib_mod->load_all('banner', '', array('status' => 1, 'type_id' => 1), 1, '', array('sort' => 'desc'));
        $data['banner_2'] = $this->lib_mod->load_all('banner', '', array('status' => 1, 'type_id' => 2), 2, '', array('sort' => 'desc'));
        $data['client'] = $this->lib_mod->load_all('client', '', array('status' => 1), '', '', array('sort' => 'desc'));
        $data['rate'] = $this->lib_mod->load_all('rate', '', array('status' => 1), '3', '', array('id' => 'RAND()'));
        $data['title'] = "Thông tin tuyển dụng - lakita.vn";
        $data['content'] = 'about/tuyendung';
        $this->load->view('template', $data);
    }

}
