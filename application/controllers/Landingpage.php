<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Landingpage extends CI_Controller {

    public function __construct() {
        parent::__construct();
        require_once APPPATH . "../public/lakita/Rest_client/Rest_Client.php";
        $this->load->helper('cookie');
    }

    function index($id = 0) {
        switch ($id) {
            case 1: redirect('http://lapbctcelink.lakita.vn');
                break;
            case 2: redirect('https://www.facebook.com/groups/excelonline');
                break;
            case 3: redirect('http://tailieuexcele300dungtt.gr8.com');
                break;
            case 4: redirect('https://www.facebook.com/meovathuthuatexcel');
                break;
            case 5: redirect('http://bit.ly/lamchuexcelyoutube');
                break;
            case 6: redirect('http://bit.ly/99tuyetchieuexcelyoutube');
                break;
            case 7: redirect('http://bit.ly/excelketoanyoutube');
                break;
            default : redirect(base_url());
        }
    }

    function show($id = 0) {
        if (filter_has_var(INPUT_GET, 'link')) {
            set_cookie('link_id', filter_input(INPUT_GET, 'link'), 3600 * 2);
            // $this->session->set_tempdata('link_id', filter_input(INPUT_GET, 'link'));
            $this->save_c2();
        }
        $this->load->view('landingpage/' . $id . '/index');
    }

    function save_c3() {
        $post = $this->input->post();
        if (empty($post)) {
            die;
        }
        $config0 = array(
            'server' => 'https://crm2.lakita.vn/',
            'api_key' => 'RrF3rcmYdWQbviO5tuki3fdgfgr4',
            'api_name' => 'lakita-key',
        );
        $restClient0 = new Rest_Client($config0);
        $uri0 = "landingpage_api/price/" . $post['code_landingpage'];
        /*
         * Landing page combo
         */
        if (in_array($post['code_landingpage'], array(
                'KT220-KT400',   'KT220-KT210',  'KT210-KT400', 'KT800-KT400', 'KT210-KT800', "custom"
                ))) {

            $priceCombo = array(
                'KT220-KT400' => 695000,
                 'KT220-KT210' => 645000,
                'KT210-KT400' => 645000,
                'KT800-KT400' => 645000,
                'KT210-KT800' => 545000,
                "custom" => 1000000
            );
            $post['course_code'] = ($post['code_landingpage'] == "custom") ? "COMBO-NOEL" : $post['code_landingpage'];
            $post['price_purchase'] = $priceCombo[$post['code_landingpage']];
            $config = array(
                'server' => 'https://crm2.lakita.vn/',
                //'server' => 'http://chuyenpn.com/CRM2/',
                'api_key' => 'RrF3rcmYdWQbviO5tuki3fdgfgr4',
                'api_name' => 'lakita-key'
            );
            $restClient = new Rest_Client($config);
            $uri = "contact_api/add_contact";

            /*
             * Nếu người dùng xóa param thì kiểm tra xem có trong session ko
             * nếu có thì lưu lại link_id
             */
            if ($post['link_id'] == 0) {
                $link_id = get_cookie('link_id');
                // $link_id = $this->session->tempdata('link_id');
                if ($link_id) {
                    $post['link_id'] = $link_id;
                }
            }

            $restClient->post($uri, $post);
            $this->postToMol($post);
            $this->load->view('landingpage/combogiangsinh/popup_dangky');
        } else {
            $result0 = $restClient0->get($uri0);
            $rs = json_decode($result0);
            $post['course_code'] = $rs->course_code;
            $post['price_purchase'] = $rs->price;
            $config = array(
                'server' => 'https://crm2.lakita.vn/',
                //'server' => 'http://chuyenpn.com/CRM2/',
                'api_key' => 'RrF3rcmYdWQbviO5tuki3fdgfgr4',
                'api_name' => 'lakita-key'
            );
            $restClient = new Rest_Client($config);
            $uri = "contact_api/add_contact";

            /*
             * Nếu người dùng xóa param thì kiểm tra xem có trong session ko
             * nếu có thì lưu lại link_id
             */
            if ($post['link_id'] == 0) {
                $link_id = get_cookie('link_id');
                // $link_id = $this->session->tempdata('link_id');
                if ($link_id) {
                    $post['link_id'] = $link_id;
                }
            }

            $restClient->post($uri, $post);
            $this->postToMol($post);
            $this->load->view('landingpage/' . strtolower($rs->course_code) . '/popup_dangky');
        }
    }

    private function postToMol($post) {
        $config = array(
            'server' => 'http://mol.lakita.vn/',
            'api_key' => 'SSeKfm7RXCJZxnFUleFsPf63o2ymZ93fWuCmvCjq',
            'api_name' => 'key',
            'http_user' => 'admin',
            'http_pass' => 'admin',
            'http_auth' => 'basic'
        );
        $restClient = new Rest_Client($config);
        $uri = "contact_collection_api/add_contact_crm";
        $restClient->post($uri, $post);
    }

    private function save_c2() {
        $get = $this->input->get();
        if (isset($get['link'])) {
            $post = array();
            $post['link_id'] = $get['link'];
            $post['ip'] = $this->input->ip_address();
            $config = array(
                'server' => 'https://crm2.lakita.vn/',
                'api_key' => 'RrF3rcmYdWQbviO5tuki3fdgfgr4',
                'api_name' => 'lakita-key'
            );
            $restClient = new Rest_Client($config);
            $uri = "contact_api/add_c2";
            $restClient->post($uri, $post);
        }
    }

}
