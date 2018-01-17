<?php

class Student extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    function load_data() {
        $data['setting'] = $this->lib_mod->detail('setting', array('id' => 1));
        //$data['category_news'] = $this->lib_mod->load_all('category_3s', '', array('status' => 1, 'type_id' => 4, 'parent' => 0), '', '', array('sort' => 'desc'));
        //$data['courses_right'] = $this->lib_mod->load_all('courses', '', array('status' => 1, 'hot' => 1), 8, '', array('sort' => 'desc'));
        //$data['courses_top'] = $this->lib_mod->load_all('courses', '', array('status' => 1), '', '', array('sort' => 'desc'));
        //$data['group_courses'] = $this->lib_mod->load_all('group_courses', 'id,name,slug', array('status' => 1), '', '', array('sort' => 'asc'));
        return $data;
    }

    function index() {
        $user_id = $this->session->userdata('user_id');
        if (!isset($user_id)) {
            redirect(base_url());
        } else {
            $data = $this->data;
            $data['title'] = 'Khóa học của tôi - lakita.vn';
            $data['student'] = $this->lib_mod->detail('student', array('id' => $user_id));
//            $data['banner_main'] = $this->lib_mod->load_all('banner', '', array('status' => 1, 'type_id' => 0), 1, '', array('sort' => 'desc'));
//            $data['banner_1'] = $this->lib_mod->load_all('banner', '', array('status' => 1, 'type_id' => 1), 1, '', array('sort' => 'desc'));
//            $data['banner_2'] = $this->lib_mod->load_all('banner', '', array('status' => 1, 'type_id' => 2), 2, '', array('sort' => 'desc'));
            $courses_id = $this->lib_mod->detail('student_courses', array('student_id' => $user_id, 'status' => 1));
            //quà tặng noel khóa yoga văn phòng
            $courses_id[] = array(
                'courses_id' => 83,
                'create_date' => 1513759010,
                'status' => 1,
                'cod' => '',
                'trial_learn' => 0,
                'gift' => 'yes'
            );
            if (count($courses_id)) {

                foreach ($courses_id as $key => $value) {
                    $mycourses[$key] = $this->lib_mod->detail('courses', array('id' => $value['courses_id']));
                    $mycourses[$key]['cod'] = $value['cod'];
                    $mycourses[$key]['date_join_course'] = $value['create_date'];
                    $mycourses[$key]['trial_learn'] = $value['trial_learn'];
                    if (isset($value['gift'])) {
                        $mycourses[$key]['gift'] = 'yes';
                    }
                }
//                if($user_id == 2626) {
//                                echo '<pre>';
//                                print_r($mycourses);
//                                die;
//                            }
                foreach ($mycourses as $key => $value) {
                    if (isset($value[0])) {
                        $mycourses[$key] = $value[0];
                        if (isset($value['gift'])) {
                            $mycourses[$key]['gift'] = 'yes';
                        }

                        //tống số bài học
                        $mycourses[$key]['total_video'] = count($this->lib_mod->detail('learn', array('courses_id' => $value[0]['id'], 'status' => 1)));

                        //học thử hay học thật
                        $cod_special = $this->lib_mod->detail('special_cod', array('cod' => $value['cod']));
                        if (count($cod_special)) {
                            $mycourses[$key]['is_trial_learn'] = 0;
                            $mycourses[$key]['trial_learn'] = 0;
                        } else {
                            $mycourses[$key]['is_trial_learn'] = $this->is_trial_learn($value['cod']);
                            $mycourses[$key]['trial_learn'] = $value['trial_learn'];
                        }
                        //ngày tham gia
                        $mycourses[$key]['date_join_course'] = $value['date_join_course'];

                        //nhóm khóa học
                        $group_courses = $this->lib_mod->detail('group_courses', array("id" => $value[0]['group_courses_id']));
                        $mycourses[$key]['group_course_name'] = $group_courses[0]['name'];

                        //video đầu tiên của khóa học
                        if (count($cod_special)) {
                            $mycourses[$key]['first_course'] = $this->find_first_course('', $value[0]['id']);
                        } else {
                            $mycourses[$key]['first_course'] = $this->find_first_course($value['cod'], $value[0]['id']);
                        }
                        //thông tin giảng viên
                        $firs_courses = array_filter(explode(',', $value[0]['speaker_id']));
                        if (isset($firs_courses[0])) {
                            $firs_courses = str_replace('-', '', $firs_courses[0]);
                            $mycourses[$key]['speaker'] = $this->lib_mod->detail('speaker', array('id' => $firs_courses));
                        }

                        //tổng số bài đã học
                        $mycourses[$key]['count_all_learn'] = count($this->lib_mod->detail('student_learn', array('student_id' => $user_id, 'courseID' => $value[0]['id'])));

                        //tổng số bình luận
                        $mycourses[$key]['total_cmt'] = count($this->lib_mod->detail('comment', array('courses_id' => $value[0]['id'])));
                    }
                }
                $data['courses'] = $mycourses;
                foreach ($mycourses as $value) {
                    $ids[] = isset($value['id']) ? $value['id'] : 0;
                }
            } else {
                $data['courses'] = [];
                $ids = [];
            }
            $other_courses_temp = $this->lib_mod->get_other_courses('courses', '', array('status' => 1), $ids, 12, '', array('sort' => 'desc'));
            foreach ($other_courses_temp as $key => $value) {
                $other_courses[$key] = $value;
                $firs_courses = array_filter(explode(',', $value['speaker_id']));
                $firs_courses = str_replace('-', '', $firs_courses[0]);
                $speaker = $this->lib_mod->detail('speaker', array('id' => $firs_courses));
                $other_courses[$key]['speaker_name'] = $speaker[0]['name'];
            }
            $data['other_courses'] = isset($other_courses) ? $other_courses : [];
            $data['content'] = 'student/index';
            $this->load->view('template', $data);
        }
    }

//nạp tiền vào tài khoản
    function charge() {
        $user_id = $this->session->userdata('user_id');
        if (!isset($user_id)) {
            redirect(base_url());
        } else {
            $data = $this->data;
            $data['title'] = 'Nạp tiền vào tài khoản - lakita.vn';
            $data['student'] = $this->lib_mod->load_all('student', '', array('id' => $user_id), '', '', '');
            $data['solansai'] = count($this->lib_mod->load_all('lichsunapthe', 'id', array('card_amount' => 0, 'user_id' => $user_id), '', '', ''));
            $data['content'] = 'student/charge';
            $this->load->view('template', $data);
        }
    }

    function activecod() {
        $user_id = $this->session->userdata('user_id');
        if (!isset($user_id)) {
            $this->session->set_userdata('last_page', base_url('kich-hoat-khoa-hoc.html'));
            redirect(base_url('dang-nhap.html'));
        } else {
            $wrong_input_cod = $this->lib_mod->detail('student', array('id' => $user_id));
            $wrong_input_cod = $wrong_input_cod[0]['wrong_input_cod'];
//            if ($wrong_input_cod > 4) {
//                echo '<script> alert("Bạn đã quá số lần nhập sai mã kích hoạt. Vui lòng liên hệ ban quản trị!");</script>';
//                echo "<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
//                exit;
//            } else {
            $data = $this->data;
            $data['title'] = 'Kích hoạt khóa học của bạn - lakita.vn';
            $data['student'] = $this->lib_mod->load_all('student', '', array('id' => $user_id), '', '', '');
            $data['content'] = 'student/activecod';
            $this->load->view('template', $data);
            //}
        }
    }

    function active_special_cod() {
        $user_id = $this->session->userdata('user_id');
        if (!isset($user_id)) {
            redirect(base_url());
        } else {
            $wrong_input_cod = $this->lib_mod->detail('student', array('id' => $user_id));
            $wrong_input_cod = $wrong_input_cod[0]['wrong_input_cod'];
            if ($wrong_input_cod > 4) {
                echo '<script> alert("Bạn đã quá số lần nhập sai mã kích hoạt. Vui lòng liên hệ ban quản trị!");</script>';
                echo "<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
                exit;
            } else {
                $courses = $this->lib_mod->load_all('student_courses', 'courses_id', array('student_id' => $user_id), '', '', '', '');
                if (!empty($courses)) {
                    foreach ($courses as $value) {
                        $courses_id[] = $value['courses_id'];
                    }
                }
                $courses_not_purchase = $this->lib_mod->load_all_wheres('courses', '*', array('status' => 1), array('id' => array(37, 41, 65, 67, 39, 16, 69, 68, 66, 10, 71, 72, 73)), array('id' => $courses_id), '', '', array('sort' => 'desc'));
                $data = $this->data;
                $data['title'] = 'Kích hoạt khóa học của bạn - lakita.vn';
                $data['student'] = $this->lib_mod->load_all('student', '', array('id' => $user_id), '', '', '');
                $data['content'] = 'student/active_special_cod';
                $data['courses'] = $courses_not_purchase;
                $this->load->view('template', $data);
            }
        }
    }

    function user_info() {
        $user_id = $this->session->userdata('user_id');
        if (!isset($user_id)) {
            redirect(base_url());
        } else {
            $data = $this->data;
            $data['title'] = 'Thông tin tài khoản - lakita.vn';
            $data['student'] = $this->lib_mod->detail('student', array('id' => $user_id));
            $data['content'] = 'student/user_info';
            $this->load->view('template', $data);
        }
    }

    function update_user_info() {
        $user_id = $this->session->userdata('user_id');
        if (!isset($user_id) || empty($user_id)) {
            redirect(site_url());
        }
        $this->session->set_flashdata('type_submit', $this->input->post('type_submit'));
        $student = $this->lib_mod->detail('student', array("id" => $user_id));
        if (!isset($student[0]))
            redirect(site_url());
        $name = trim($this->input->post('name'));
        if (empty($name))
            $name = $student[0]['name'];
        $address = trim($this->input->post('address'));
        if (empty($address))
            $address = $student[0]['address'];
        $phone = trim($this->input->post('phone'));
        if (empty($phone))
            $phone = $student[0]['phone'];
        $birthday = trim($this->input->post('birthday'));
        if (empty($birthday))
            $birthday = $student[0]['birthday'];
        $job = trim($this->input->post('job'));
        if (empty($job))
            $job = $student[0]['job'];
        $gender = $this->input->post('gender');
        $data = array(
            'name' => $name,
            'address' => $address,
            'phone' => $phone,
            'gender' => $gender,
            'birthday' => $birthday,
            'job' => $job
        );

        $oldpassword = trim($this->input->post('oldpassword'));
        $password = trim($this->input->post('password'));
        $re_password = trim($this->input->post('re_password'));
        if (!empty($password) || !empty($re_password)) {
            if ($student[0]['password'] != '') {
                if (md5(md5($oldpassword)) != $student[0]['password'])
                    $error = 'Mật khẩu cũ không đúng, vui lòng kiểm tra lại!';
            }

            if (strlen($password) < 6 || strlen($re_password) < 6) {
                $error = 'Mật khẩu phải trên 6 kí tự';
            }

            if ($password != $re_password) {
                $error = 'Mật khẩu xác nhận chưa khớp';
            }
            $data['password'] = md5(md5($password));
        }
        if (empty($error)) {
            if (!empty($_FILES['thumbnail']['name'])) {
                $image_news_path = '/home/lakita.com.vn/public_html/data/source/student';
                $image_thumb = $this->lib_mod->action_upload($image_news_path, 'thumbnail');
                $data['thumbnail'] = 'data/source/student/' . $image_thumb['file_name'];
                $this->session->unset_userdata('thumbnail');
                $this->session->set_userdata('thumbnail', $data['thumbnail']);
            }
            $this->lib_mod->update('student', array("id" => $user_id), $data);
            $this->session->unset_userdata('name');
            $this->session->set_userdata('name', $name);
            $this->session->set_flashdata('success', 'Cập nhật tài khoản thành công!');
            redirect(base_url() . 'student/user_info');
        } else {
            $this->session->set_flashdata('error', $error);
            redirect(base_url() . 'student/user_info');
        }
    }

    function history_transaction() {
        $user_id = $this->session->userdata('user_id');
        if (!isset($user_id)) {
            redirect(base_url());
        } else {
            $data = $this->data;
            $data['title'] = 'Lịch sử thanh toán - lakita.vn';
            $data['student'] = $this->lib_mod->detail('student', array("id" => $user_id));
            $data['student_courses'] = $this->lib_mod->load_all('student_courses', '', array("student_id" => $user_id), '', '', array('id' => 'asc'));
            $data['napthe'] = $this->lib_mod->load_all('lichsunapthe', '', array("user_id" => $user_id), '', '', array('id' => 'asc'));
            $data['student_courses_time'] = $this->lib_mod->load_all('student_courses', 'create_date', array("student_id" => $user_id), '', '', array('id' => 'asc'));
            $data['napthe_time'] = $this->lib_mod->load_all('lichsunapthe', 'ngaynap', array("user_id" => $user_id), '', '', array('id' => 'asc'));
            $data['content'] = 'student/history_transaction';
            $this->load->view('template', $data);
        }
    }

    function logout() {
        $this->lib_mod->update('student', array('id' => $this->session->userdata('user_id')), array('temp_pass' => 0));
        $this->lib_mod->update('watching_time', array('student_id' => $this->session->userdata('user_id')), array('time' => 0));
        $this->load->helper('cookie');
        if (get_cookie('357a466f0c8940e87378a641479e9ff8d9770318') != NULL)
            delete_cookie('357a466f0c8940e87378a641479e9ff8d9770318');
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('courses');
        $this->session->sess_destroy();
        session_destroy();
        redirect(site_url());
    }

    //====================================================CÁC HÀM HỖ TRỢ =========================================================
    //XỬ LÝ NẠP TIỀN VÀO TK 

    function naptienvaotaikhoan() {
        require_once 'plugin/nganluong.php';
        if ($this->input->post('NLNapThe') != '') {
            $sopin = $this->input->post('txtSoPin');
            $soseri = $this->input->post('txtSoSeri');
            $type_card = $this->input->post('select_method');
            if ($soseri == "") {
                echo '<script>alert("Vui lòng nhập Số Seri");</script>';
                echo "<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
                exit();
            }
            if ($sopin == "") {
                echo '<script>alert("Vui lòng nhập Mã Thẻ");</script>';
                echo "<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
                exit();
            }
            $arytype = array(92 => 'VMS', 93 => 'VNP', 107 => 'VIETTEL', 121 => 'VCOIN', 120 => 'GATE');
            //Tiến hành kết nối thanh toán Thẻ cào.
            $call = new MobiCard();
            $rs = new Result();
            $coin1 = rand(10, 999);
            $coin2 = rand(0, 999);
            $coin3 = rand(0, 999);
            $coin4 = rand(0, 999);
            $ref_code = $coin4 + $coin3 * 1000 + $coin2 * 1000000 + $coin1 * 100000000;
            $rs = $call->CardPay($sopin, $soseri, $type_card, $ref_code, "", "", "");
            if ($rs->error_code == '00') {
                $user_id = $this->session->userdata('user_id');
                $data['user_id'] = $user_id;
                $data['error_code'] = $rs->error_code;
                $data['merchant_id'] = $rs->merchant_id;
                $data['merchant_account'] = $rs->merchant_account;
                $data['pin_card'] = $rs->pin_card;
                $data['card_serial'] = $rs->card_serial;
                $data['type_card'] = $rs->type_card;
                $data['ref_code'] = $ref_code;
                $data['client_fullname'] = $rs->client_fullname;
                $data['client_email'] = $rs->client_email;
                $data['client_mobile'] = $rs->client_mobile;
                $data['card_amount'] = $rs->card_amount;
                $data['transaction_amount'] = $rs->card_amount;
                $data['transaction_id'] = $rs->transaction_id;
                $data['ngaynap'] = time();
                $balance = $this->lib_mod->load_all('student', 'balance', array('id' => $user_id), '', '', '');
                $data1['balance'] = $rs->card_amount + $balance[0]['balance'];
                $this->lib_mod->update('student', array('id' => $user_id), $data1);
                $this->lib_mod->insert('lichsunapthe', $data);
                echo '<script>alert("Bạn đã nạp thành công ' . $rs->card_amount . ' vào trong tài khoản.");'
                . 'location.assign("' . base_url() . 'student");'
                . '</script>'; //$total_results;
            } else {
                $user_id = $this->session->userdata('user_id');
                $data['user_id'] = $this->session->userdata('user_id');
                $data['error_code'] = $rs->error_code;
                $data['merchant_id'] = $rs->merchant_id;
                $data['merchant_account'] = $rs->merchant_account;
                $data['pin_card'] = $rs->pin_card;
                $data['card_serial'] = $rs->card_serial;
                $data['type_card'] = $rs->type_card;
                $data['ref_code'] = $ref_code;
                $data['client_fullname'] = $rs->client_fullname;
                $data['client_email'] = $rs->client_email;
                $data['client_mobile'] = $rs->client_mobile;
                $data['card_amount'] = $rs->card_amount;
                $data['transaction_amount'] = $rs->card_amount;
                $data['transaction_id'] = $rs->transaction_id;
                $data['ngaynap'] = time();
                $this->lib_mod->insert('lichsunapthe', $data);
                echo '<script>alert("Lỗi :' . $rs->error_message . '");</script>';
                echo "<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
            }
        }
    }

    //xử lý khi khách hàng kích hoạt khóa học
    function action_activecod() {
        $user_id = $this->session->userdata('user_id');
        if (!isset($user_id)) {
            echo '0_Bạn phải đăng nhập để kích hoạt tài khoản!';
            die;
        } else {
            $data = $this->input->post();
            $cod_cod = trim($data['cod_cod']);
            $invite_code = trim($data['invite_code']);
            if (!empty($data['invite_code'])) {
                $invite_code = htmlentities(trim($data['invite_code']));
            } else {
                $invite_code = '';
            }

            $check_cod = $this->lib_mod->detail('cod_course', array('cod' => $cod_cod));
            $cod_isset = FALSE;
            if (!empty($check_cod)) {
                $cod_isset = TRUE;
            }


            $submit_cod = $this->input->post('submit_cod');
            $wrong_input_cod = $this->lib_mod->detail('student', array('id' => $user_id));
            $wrong_input_cod = $wrong_input_cod[0]['wrong_input_cod'];
            if ($submit_cod == 'submit_cod' && $cod_isset == TRUE) {
                $error = 1;
                if (!empty($cod_cod)) {
                    //người dùng đã nhập mã cod
                    $courses = $this->lib_mod->detail('cod_course', array('cod' => $cod_cod));
                    $courses_cod = $this->find_course_code($courses[0]['course_id']);
                    if (count($courses)) {
                        //tồn tại mã cod
                        if ($courses[0]['status'] == 0) {
                            //mã cod chưa đc kích hoạt
                            $enrolled_user_statuses = $this->lib_mod->detail('student_courses', array('student_id' => $user_id, 'courses_id' => $courses[0]['course_id']));
                            if (!count($enrolled_user_statuses)) { //khách hàng chưa kích hoạt khóa học bao giờ
                                $this->lib_mod->insert('student_courses', array('student_id' => $user_id, 'courses_id' => $courses[0]['course_id'],
                                    'status' => 1, 'cod' => $cod_cod, 'create_date' => time()));
                                if ($courses[0]['combo_course_id'] != 0) {
                                    $multiCourses = explode(',', $courses[0]['combo_course_id']);
                                    foreach ($multiCourses as $value_course_id) {
                                        $this->lib_mod->insert('student_courses', array('student_id' => $user_id, 'courses_id' => $value_course_id,
                                            'status' => 1, 'cod' => $cod_cod, 'create_date' => time()));
                                    }
                                }
                                //tặng khách hàng L8 khóa 18 thủ thuật excel
//                                $courses_purchase = $this->lib_mod->detail('student_courses', array('student_id' => $user_id));
//                                $has_bonus = false;
//                                foreach ($courses_purchase as $value) {
//                                    if ($value['courses_id'] == 39) {
//                                        $has_bonus = true;
//                                        break;
//                                    }
//                                }
//                                if (!$has_bonus) {
//                                    $this->lib_mod->insert('student_courses', array('student_id' => $user_id, 'courses_id' => 39,
//                                        'status' => 1, 'create_date' => time()));
//                                }
                                $this->lib_mod->update('cod_course', array('cod' => $cod_cod), array('status' => 1));
                                $this->lib_mod->update('student', array('id' => $user_id), array('status' => 1));

                                //cộng tiền vào tài khoản khi kích hoạt                                
                                if ($invite_code != '') {
                                    $this->invite_success($user_id, $invite_code, $courses[0]['course_id']);
                                } else {
                                    $this->invite_success($user_id, '', $courses[0]['course_id']);
                                }

                                $this->lib_mod->update('student', array('id' => $user_id), array('wrong_input_cod' => 0));

                                $course_details = $this->lib_mod->detail('courses', array('id' => $courses[0]['course_id']));
                                $first_learn = $this->find_first_course($cod_cod, $courses[0]['course_id']);
                                $error = '1_' . $first_learn . '_' . $course_details[0]['name'];
                                //cộng tiền hết
                                //bắn contact khi kích hoạt thành cônng
//                                 crm ( sdt, mã khóa)
//                                cskh( sdt, mkh )
//                                require_once 'plugin/Rest_Client.php';
//                                $config = array(
//                                    'server' => 'http://192.168.0.111:8089/CRM_GIT/',
//                                    'api_key' => '12345678',
//                                    'api_name' => 'lakita-key',
//                                );
//                                $restClient = new Rest_Client($config);
//                                $uri = "contact_api/update_contact_active_lakita";
//                                
//                                $phone = $this->lib_mod->load_all('student', 'phone', array('id' => $user_id), '', '', '');
//                                $param1 = array(
//                                    'phone' => $phone[0]['phone'],
//                                    'course_code' => $courses_cod    
//                                );
//                                                            
//                                $test =  $restClient->post($uri, $param1);   
                                //end bắn contact 
                                //bắn contact sang cskh
//                                $config = array(
//                                    'server' => 'http://192.168.0.111:8089/CRM_GIT/',
//                                    'api_key' => '12345678',
//                                    'api_name' => 'lakita-key',
//                                );
//                                $restClient = new Rest_Client($config);
//                                $uri = "contact_api/update_contact_active_lakita";
//                                
//                                $phone = $this->lib_mod->load_all('student', 'phone', array('id' => $user_id), '', '', '');
//                                $param1 = array(
//                                    'phone' => $phone[0]['phone'],
//                                    'course_code' => $courses_cod    
//                                );
//                                                            
//                                $test =  $restClient->post($uri, $param1); 
                                //end bắn contact sang cskh
                            } else {
                                if ($enrolled_user_statuses[0]['trial_learn'] == 1) {
                                    $this->lib_mod->update('student_courses', array('student_id' => $user_id, 'courses_id' => $courses[0]['course_id']), array('trial_learn' => '0', 'status' => 1, 'cod' => $cod_cod, 'create_date' => time()));
                                    $this->lib_mod->update('cod_course', array('cod' => $cod_cod), array('status' => 1));
                                    $this->lib_mod->update('student', array('id' => $user_id), array('status' => 1));
                                    //tặng khách hàng L8 khóa 18 thủ thuật excel
                                    $courses_purchase = $this->lib_mod->detail('student_courses', array('student_id' => $user_id));
                                    $has_bonus = false;
                                    foreach ($courses_purchase as $value) {
                                        if ($value['courses_id'] == 39) {
                                            $has_bonus = true;
                                            break;
                                        }
                                    }
                                    if (!$has_bonus) {
                                        $this->lib_mod->insert('student_courses', array('student_id' => $user_id, 'courses_id' => 39,
                                            'status' => 1, 'create_date' => time()));
                                    }
                                    $this->lib_mod->update('student', array('id' => $user_id), array('wrong_input_cod' => 0));
                                    $first_learn = $this->find_first_course('', $courses[0]['course_id']);
                                    $course_details = $this->lib_mod->detail('courses', array('id' => $courses[0]['course_id']));
                                    $error = '1_' . $first_learn . '_' . $course_details[0]['name'];
                                } else
                                    $error = "0_Bạn đã kích hoạt khóa học này rồi";
                                //khách hàng đã kích hoạt khóa học rồi!
                            }
                        }
                        else if ($courses[0]['status'] == 1) {
                            //mã đã đc kích hoạt
                            $error = '0_Xin lỗi, mã kích hoạt này đã được sử dụng';
                        } else {
                            $error = '0_Có lỗi xảy ra khi kích hoạt';
                        }
                    } else {
                        $special_cod = $this->lib_mod->detail('special_cod', array('cod' => $cod_cod));
                        if (count($special_cod)) {
                            if ($special_cod[0]['status'] == 0) {
                                $this->session->set_userdata('special_cod', $cod_cod);
                                $error = '99_special_cod';
                            } else if ($special_cod[0]['status'] == 1) {
                                //mã đã đc kích hoạt
                                $error = '0_Xin lỗi, mã kích hoạt này đã được sử dụng';
                            } else {
                                $error = '0_Có lỗi xảy ra khi kích hoạt';
                            }
                        } else {
                            $this->lib_mod->update('student', array('id' => $user_id), array('wrong_input_cod' => $wrong_input_cod + 1));
                            $error = '0_Mã kích hoạt không tồn tại. Xin hãy nhập mã khác.';
                        }
                    }
                } else {
                    $error = '0_Bạn phải nhập mã kích hoạt';
                }
                echo $error;
            } else {
                $this->lib_mod->update('student', array('id' => $user_id), array('wrong_input_cod' => $wrong_input_cod + 1));
                if ($wrong_input_cod > 4) {
                    echo '0_Bạn đã quá số lần nhập sai mã kích hoạt. Vui lòng liên hệ ban quản trị!';
                    die;
                } else {
                    echo '0_Mã kích hoạt không tồn tại. Xin nhập mã khác';
                    die;
                }
            }
        }
    }

    /* ===================================== kích hoạt khóa học đặc biệt (dành cho khách VIP) ============================ */

    function action_active_special_cod() {
        $user_id = $this->session->userdata('user_id');
        if (!isset($user_id)) {
            echo 'Bạn phải đăng nhập để kích hoạt tài khoản!';
            die;
        } else {
            $cour_id = $this->input->post('course_id');
            if ($cour_id != '') {
                $cod_cod = $this->session->userdata('special_cod');
                $special_cod = $this->lib_mod->detail('special_cod', array('cod' => $cod_cod));
                if (count($special_cod)) {
                    if ($special_cod[0]['status'] == 0) {
                        $this->lib_mod->insert('student_courses', array('student_id' => $user_id, 'courses_id' => $cour_id,
                            'status' => 1, 'cod' => $cod_cod, 'create_date' => time()));
                        $this->lib_mod->update('special_cod', array('cod' => $cod_cod), array('status' => 1, 'time' => time()));
                        $this->lib_mod->update('student', array('id' => $user_id), array('status' => 1));
                        $course_details = $this->lib_mod->detail('courses', array('id' => $cour_id));
                        $first_learn = $this->find_first_course('', $cour_id);
                        echo '<script> 
                            alert("Chúc mừng bạn đã kích hoạt thành công khóa học ' . $course_details[0]['name'] . ', chúng tôi sẽ đưa bạn đến trang khóa học để học ngay!");
                            location.assign("' . $first_learn . '"); </script>';
                    } else {
                        echo 'Xin lỗi, mã kích hoạt đã được sử dụng!';
                        die;
                    }
                } else {
                    echo 'có lỗi xảy ra!';
                    die;
                }
            }
        }
    }

    /* =============================================tổng số bài học ============================================= */

    private function count_total_video($courseID) {
        $chapter = $this->lib_mod->detail('chapter', array("courses_id" => $courseID, 'status' => 1));
        $total_lesson = 0;
        foreach ($chapter as $value) {
            $learn = $this->lib_mod->detail('learn', array('status' => 1, 'chapter_id' => $value['id']));
            if (isset($learn) && count($learn)) {
                $total_lesson += count($learn);
            }
        }
        return $total_lesson;
    }

    /* =============================HỌC THỬ=============================== */

    private function is_trial_learn($cod) {
        $trial = false;
        if ($cod != '') {
            $cod = $this->lib_mod->detail('cod_course', array('cod' => $cod));
            if (isset($cod[0]['trial_learn']) && $cod[0]['trial_learn'] == 1) {
                $trial = true;
            }
        }
        return $trial;
    }

    /* ==================================== video đầu tiên của khóa học ===================================== */

    private function find_first_course($cod_input, $courseID) {

        if ($cod_input != '') {
            $cod = $this->lib_mod->detail('cod_course', array('cod' => $cod_input));
            //học thử
            if (count($cod) && $cod[0]['trial_learn'] == 1) {
                $chapter = $this->lib_mod->load_all('chapter', '', array("courses_id" => $courseID, 'status' => 1), '', '', array("sort" => 'asc'));
                foreach ($chapter as $key1 => $value1) {
                    $learn = $this->lib_mod->detail('learn', array('status' => 1, 'chapter_id' => $value1['id']));
                    foreach ($learn as $value2) {
                        $learn_first = $this->lib_mod->detail('learn', array('id' => $value2['id']));
                        if ($learn_first[0]['trial_learn'] == 1) {
                            return isset($learn_first[0]) ? base_url() . $learn_first[0]['slug'] . '-4' . $learn_first[0]['id'] . '.html' : '';
                        }
                    }
                }
            } else if (count($cod) && $cod[0]['trial_learn'] == 0) {
                $learn_first = $this->lib_mod->load_all('learn', '', array("courses_id" => $courseID, 'status' => 1), '', '', array("sort" => 'asc'));
                return isset($learn_first[0]) ? base_url() . $learn_first[0]['slug'] . '-4' . $learn_first[0]['id'] . '.html' : '';
            } else {
                return '';
            }
        } else {
            $chapter_id = $this->lib_mod->load_all('chapter', 'id', array("courses_id" => $courseID, 'status' => 1), 1, 0, array("sort" => 'asc'));
            //print_r($chapter_id);
            $learn_first = $this->lib_mod->load_all('learn', 'id, slug', array("chapter_id" => $chapter_id[0]['id'], 'status' => 1), 1, 0, array("sort" => 'asc'));
            // print_r($learn_first);
            return isset($learn_first[0]) ? (base_url() . $learn_first[0]['slug'] . '-4' . $learn_first[0]['id'] . '.html') : '';
        }
    }

    function save_love() {
        $courses_id = $this->input->post('courses_id');
        $user_id = $this->session->userdata('user_id');
        if (!isset($user_id)) {
            echo 'Bạn không có quyền truy cập vào trang này!';
            die;
            exit;
        }
        $all_course = $this->lib_mod->load_all('courses', 'id', '', '', '', '');
        $is_valid = false;
        foreach ($all_course as $value) {
            if ($value['id'] == $courses_id) {
                $is_valid = true;
                break;
            }
        }
        if ($is_valid) {
            $exist = $this->lib_mod->detail('love', array('user_id' => $user_id, 'course_id' => $courses_id));
            if (count($exist) == 0) {
                $this->lib_mod->insert('love', array('user_id' => $user_id, 'course_id' => $courses_id));
                echo 1;
                die;
            } else {
                echo 'Khóa học này đã có trong danh sách yêu thích của bạn!';
                die;
            }
        } else {
            echo 'Đã có lỗi xảy ra, vui lòng thử lại sau!';
            die;
            exit;
        }
    }

    private function find_course_code($cod) {
        $course_cod = '';
        switch ($cod) {
            case 10: {
                    $course_cod = 'E110';
                    break;
                }
            case 16: {
                    $course_cod = 'E300';
                    break;
                }
            case 37: {
                    $course_cod = 'E100';
                    break;
                }
            case 41 : {
                    $course_cod = 'E200';
                    break;
                }
            case 67: {
                    $course_cod = 'E400';
                    break;
                }
            case 66 : {
                    $course_cod = 'KT100';
                    break;
                }
            case 68 : {
                    $course_cod = 'KT200';
                    break;
                }
            case 71 : {
                    $course_cod = 'KT300';
                    break;
                }
            case 73 : {
                    $course_cod = 'KT400';
                    break;
                }
            case 72 : {
                    $course_cod = 'KT500';
                    break;
                }
            case 74: {
                    $course_cod = 'KT600';
                    break;
                }
            default : {
                    $course_cod = 'L999';
                    break;
                }
        }
        return $course_cod;
    }

    function invite_success($user_id, $invite_code, $course_id) {
        $course = $course_id;
        $price = $this->lib_mod->load_all('courses', 'price_root2', array('id' => $course), '', '', '', '');
        $price = str_replace('.', '', $price[0]);
        $price = $price['price_root2'];

        if (isset($user_id) && !empty($user_id)) {
            $user = $user_id;
            $user_balance = $this->lib_mod->load_all('student', 'balance', array('id' => $user), '', '', '', '');
            $user_balance = (int) $user_balance[0]['balance'];
            $this->lib_mod->update('student', array('id' => $user), array('balance' => $user_balance + $price * 5 / 100));
        }
        if (isset($invite_code) && !empty($invite_code)) {
            $user_invite = substr($invite_code, 4, strlen($invite_code) - 4);
            if ($user_id != $user_invite) {
                $user_invite_balance = $this->lib_mod->load_all('student', 'balance', array('id' => $user_invite), '', '', '', '');
                $user_invite_balance = (int) $user_invite_balance[0]['balance'];
                $this->lib_mod->update('student', array('id' => $user_invite), array('balance' => ($user_invite_balance + $price * 10 / 100)));

                //thông báo khi có người dùng mã kích hoạt của bạn
                $information['student_id'] = $user_invite;
                $information['type'] = 'invite';
                $information['url'] = base_url() . 'thong-tin-tai-khoan.html';
                $information['time'] = time();
                $information['creator'] = $user_id;
                $information['value'] = $price * 10 / 100;
                $this->lib_mod->insert('notification', $information);
            }
        }
    }

    function watching_time() {
        $student_current_id = $this->input->post('student_current_id');
        $browerInfo = $this->input->post('info');
        $token = $this->session->userdata('token');
        $date = time();
        $check_student_id = $this->lib_mod->load_all('watching_time', 'student_id', array('student_id' => $student_current_id), '', '', '');
        if (!empty($check_student_id)) {
            $this->lib_mod->update('watching_time', array('student_id' => $student_current_id), array('time' => $date, 'ip' => $this->_getUserIP(), 'token' => $token, 'info' => $browerInfo));
        } else {
            $this->lib_mod->insert('watching_time', array('student_id' => $student_current_id, 'time' => $date, 'ip' => $this->_getUserIP(),
                'token' => $token, 'info' => $browerInfo));
        }
    }

    function num_noti() {
        $user_id = $this->input->post('student_id');
        $this->load->helper('cookie');
        $last_read_noti = get_cookie('date_read_noti');

        $have_news = $this->lib_mod->count_in('notification', 'student_id', array(0, $user_id), array('time >' => $last_read_noti, 'time <=' => time()));

        echo $have_news;
    }

    function read_noti() {
        $this->load->helper('cookie');
        set_cookie('date_read_noti', time(), 92536000);
        echo 'đã tạo cookie mới';
    }

    function check_noti_current() {
        $student_id = $this->input->post('student_id');
        $time_start_check = time() - 5;
        $time_end_check = time();
        $check = $this->lib_mod->load_all('notification', '', array('student_id' => $student_id, 'time >' => $time_start_check, 'time <' => $time_end_check), '', '', array('time' => 'DESC'), '');

        echo '1' . ' ' . $check[0]['type'] . ' ' . $check[0]['url'];
    }

}
