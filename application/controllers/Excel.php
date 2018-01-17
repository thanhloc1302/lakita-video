<?php

class Excel extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }
    
    function index(){
        $data = $this->data;
        $user_id = $this->session->userdata('user_id');
        if (isset($user_id)) {
            $data['student'] = $this->lib_mod->load_all('student', '', array('id' => $user_id), '', '', '');
        }
        $data['title'] = 'Dịch vụ Excel';
        $data['content'] = 'excel/index';
        
        $this->load->view('template', $data);
    }
    
    
}

