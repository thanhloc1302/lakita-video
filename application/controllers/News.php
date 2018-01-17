<?php

class News extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    private function load_data() {
        $data['setting'] = $this->lib_mod->detail('setting', array('id' => 1));
        $data['category_news'] = $this->lib_mod->load_all('category', '', array('status' => 1, 'parent' => 0), '', '', array('sort' => 'desc'));
        $data['courses_right'] = $this->lib_mod->load_all('courses', '', array('status' => 1, 'hot' => 1), 8, '', array('sort' => 'desc'));
        $data['courses_top'] = $this->lib_mod->load_all('courses', '', array('status' => 1), '', '', array('sort' => 'desc'));

        return $data;
    }

    public function index($id = 0) {
        $data = $this->data;
        $user_id = $this->session->userdata('user_id');
        if (isset($user_id)) {
            $data['student'] = $this->lib_mod->load_all('student', '', array('id' => $user_id), '', '', '');
        }
        $data['id'] = $id;
        $data['group_courses'] = $this->lib_mod->load_all('group_courses', 'id,name,slug', array('status' => 1), 6, '', array('sort' => 'asc'));
        $data['courses'] = $this->lib_mod->load_all('courses', '', array('status' => 1, 'group_courses_id' => $id), '', '', array('sort' => 'desc'));
        $data['rates'] = $this->lib_mod->load_all('rate', '', '', '', '', array('name' => 'desc'), 'name');
        $data['title'] = 'Tri ân học viên - lakita.vn';
        switch ($id) {
            case 0: {
                    $data['content'] = 'news/index';
                    break;
                }
            case 6: {
                    $user_id = $this->session->userdata('user_id');
                    if (!isset($user_id))
                        die;
                    $data['content'] = 'news/news6';
                    $this->load->helper('cookie');
                    set_cookie('read_news_6', 'yes', 92536000);
                    break;
                }
        }
        $this->load->view('template', $data);
    }

    public function action_rgt() {
        $post = $this->input->post();
        $name = $this->input->post('name');
        $tel = $this->input->post('tel');
        if ($name != '' && $tel != '') {
            $user_id = $this->session->userdata('user_id');
            $courses_id = $this->lib_mod->detail('student_courses', array('student_id' => $user_id, 'status' => 1, 'trial_learn' => 0));
            if (count($courses_id)) {
                foreach ($courses_id as $value) {
                    if (!in_array($value['courses_id'], array(37, 10, 41, 16)))
                        continue;
                    $mycourses[] = $this->lib_mod->detail('courses', array('id' => $value['courses_id']))[0]['name'];
                }
            }

            //call to mol
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
            $param1 = array(
                'matrix' => 'lakita.vn',
                'course_code' => 'EM100',
                'price_purchase' => '599000',
                'name' => htmlspecialchars($this->input->post('name')),
                'phone' => $this->input->post('tel'),
                'email' => 'NO_PARAM@gmail.com',
                'tinh' => 'NO_PARAM',
                'quan' => 'NO_PARAM',
                'dia_chi' => 'NO_PARAM',
                'course' => 'Xoáy môn Excel 599K, khóa học mà khách đã mua: ' . json_encode($mycourses, JSON_UNESCAPED_UNICODE),
            );
            $restClient->post($uri, $param1);
           
            echo 1;
            die;
        }
    }
    
    function view_all_news($id = 2){
        
        $data = $this->data;
        $data['id'] = $id;
        $user_id = $this->session->userdata('user_id');
        if (isset($user_id)) {
            $data['student'] = $this->lib_mod->load_all('student', '', array('id' => $user_id), '', '', '');
        }
        
        $this->load->library('pagination');
        $per_page = 10;
        $total = count($this->lib_mod->load_all('news', '', array('status' => 1), '', '', '',''));

        $data['news'] = $this->lib_mod->load_all('news', '', array('status' => 1), $per_page, $this->uri->segment(3), array('id' => 'desc'),'');
        
        $base_url               = site_url('news/view_all_news/');
        $config['base_url']     = $base_url;
        $config['per_page']     = $per_page;
        $config['total_rows']   = $total;
        $config['uri_segment']  = 3;
        $this->pagination->initialize($config);
        $data['paging']         = $this->pagination->create_links();
        $data['total'] = $total;
        
        $data['title'] = 'Tin tức' . ' - lakita.vn';

        $data['content'] = 'news/view_all';
        $this->load->view('template', $data);
    }

    function view_news($page){
        $flag = explode('-', $page);
        $id = end($flag);

        $data = $this->data;
        $data['id'] = $id;
        $user_id = $this->session->userdata('user_id');
        if (isset($user_id)) {
            $data['student'] = $this->lib_mod->load_all('student', '', array('id' => $user_id), '', '', '');
        }
        
        $news = $this->lib_mod->load_all('news', '', array('id' => $id), '', '', '');
               
        $data['course'] = $this->lib_mod->load_all('courses', '', array('status' => 1), 3, '', array('sort' => 'DESC'), '');
        $data['interesting'] = $this->lib_mod->load_all('news', '', array('menu_parent' => 11,'status' => 1), 5, '', array('create_date' => 'DESC'), '');
        $data['create_date'] = $news[0]['create_date'];
        $data['description'] = $news[0]['description'];
        $data['content1'] = $news[0]['content'];
        $data['title'] = $news[0]['title'];
        $data['page'] = $page;
        $data['content'] = 'news/detail';
        $this->load->view('template', $data);
    }
    
}
