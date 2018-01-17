<?php

class Event extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {
        require_once 'plugin/Rest_Client.php';
        //save c3
        $config = array(
            'server' => 'http://mol.lakita.vn/',
            'api_key' => 'SSeKfm7RXCJZxnFUleFsPf63o2ymZ93fWuCmvCjq',
            'api_name' => 'key',
            'http_user' => 'admin',
            'http_pass' => 'admin',
            'http_auth' => 'basic'
        );
        $restClient = new Rest_Client($config);
        $uri = "contact_collection_api/add_contact_lakita";
        $mobile = $this->agent->is_mobile() ? 'Mobile_' : '';
        $param1 = array(
            'name' => htmlspecialchars($this->input->post('name_event')),
            'phone' => $this->input->post('phone_event'),
            'email' => 'lakita@lakita.vn',
            'tinh' => 'VN',
            'quan' => 'VN',
            'dia_chi' => 'VN',
            'course' => $mobile . '495.000 - ALL COURSES LAKITA - BY CHUYENPN',
        );
        $restClient->post($uri, $param1);
        echo 1;
        die;
    }

    function combo() {
        $this->load->model('courses_model');
        $post = $this->input->post();
        require_once 'plugin/Rest_Client.php';
        $config = array(
            'server' => 'http://mol.lakita.vn/',
            'api_key' => 'SSeKfm7RXCJZxnFUleFsPf63o2ymZ93fWuCmvCjq',
            'api_name' => 'key',
            'http_user' => 'admin',
            'http_pass' => 'admin',
            'http_auth' => 'basic'
        );
        $restClient = new Rest_Client($config);

        if ($post['course_code'] != '') {
            $combo = '';
            foreach ($post['course_code'] as $value) {
                if ($value == 'cb300' || $value == 'cb200') {
                    $combo = $value;
                }
            }
            foreach ($post['course_code'] as $value) {
                if ($value == 'cb300' || $value == 'cb200' || $value == '') {
                    continue;
                }
                $uri = "contact_collection_api/add_contact";
                $param1 = array(
                    'course_code' => $value,
                    'name' => htmlspecialchars($this->input->post('name')),
                    'phone' => $this->input->post('phone'),
                    'email' => 'lakita@lakita.vn',
                    'tinh' => 'VN',
                    'quan' => 'VN',
                    'dia_chi' => strtoupper($combo) . ' - ' . $this->input->post('address'),
                    'course' => 'EVENT 2/9',
                    'id_camp_landingpage' => 2261,
                    'price_purchase' => $this->courses_model->find_course_price($value)
                );
                if (strpos($value, "_free") !== FALSE) {
                    $param1['price_purchase'] = '0';
                    $param1['course_code'] = str_replace('_free', '', $value);
                }
                $link_id = $this->session->tempdata('link_id');
                if (isset($link_id)) {
                    $param1['link_id'] = $this->session->tempdata('link_id');
                }
                $restClient->post($uri, $param1);
            }
        }
        echo 1;
        die;
    }

    function setIDTrial() {
        $user_id = $this->session->userdata('user_id');
        if (!isset($user_id)) {
            echo '0';
            die;
        } else {
            $id = $this->input->post('id', true);
            $this->session->set_tempdata('id_trial', $id, 600);
            echo 1;
        }
    }

    function checkTrialLearn() {
        $id_trial = $this->session->tempdata('id_trial');
        if (isset($id_trial)) {
            $user_id = $this->session->userdata('user_id');
            $this->load->model('learn_trial_model');
            $input2 = array();
            $input2['where'] = array('student_id' => $user_id, 'datetime' => date("d/m/Y", time()));
            $sum_day = $this->learn_trial_model->load_all($input2);
            if (count($sum_day) > 1) {
                echo 0;
                die;
            } else {
                echo 1;
                die;
            }
        } else {
            die;
        }
    }

//    function price_combo() {
//        $this->load->model('courses_model');
//        $course_code = $this->input->post('course_code');
//        $price_sale = $this->courses_model->get_all_price_sale();
//        $course_sale = array(
//            'E100_free' => '0',
//            'E200_free' => '0',
//            'E300_free' => '0',
//            'E400_free' => '0',
//            'TC100_free' => '0',
//            'KT200_free' => '0',
//            'KT400_free' => '0',
//            'KT800_free' => '0',
//            'KT210_free' => '0',
//            'KT110_free' => '0',
//            'KT120_free' => '0',
//            'KT130_free' => '0'
//        );
//        $course_sale = array_merge($course_sale, $price_sale);
//        if ($course_code == '') {
//            echo 0;
//        } else {
//            $price_combo = 0;
//            foreach ($course_code as $value) {
//                if (isset($course_sale[$value]) && $value != '') {
//                    $price_combo += $course_sale[$value];
//                }
//            }
//            echo number_format($price_combo);
//        }
//    }
}
