<?php

class Notification extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {
        $user_id = $this->session->userdata('user_id');
        if (!isset($user_id)) {
            redirect(base_url());
        } else {
            $data = $this->data;

            $data['student'] = $this->lib_mod->load_all('student', '', array('id' => $user_id), '', '', '');
            $noti1 = $this->lib_mod->load_all('notification', '', array('student_id' => $user_id), 10, $this->uri->segment(3), array('time' => 'DESC'), $group_by = '');

            foreach ($noti1 as $k_noti => $v_noti) {
                $noti1[$k_noti]['creator_name'] = $this->get_creator_name($v_noti['creator']);
            }
            $data['noti1'] = $noti1;

            $noti = $this->lib_mod->load_all('notification', '', array('student_id' => $user_id), '', '', array('time' => 'DESC'), $group_by = '');

            $this->load->library('pagination');

            $config['base_url'] = site_url('notification/index/');
            $config['total_rows'] = count($noti);
            $config['per_page'] = 10;
            $this->pagination->initialize($config);
            $data['paging'] = $this->pagination->create_links();

            $data['title'] = 'Thông báo - lakita.vn';
            $data['content'] = 'student/notification';
            $this->load->view('template', $data);
        }
    }

    function get_creator_name($creator_id) {
        $creator = $this->lib_mod->detail('student', array('id' => $creator_id));
        if (isset($creator) && !empty($creator)) {
            return $creator[0]['name'];
        }
    }

}
