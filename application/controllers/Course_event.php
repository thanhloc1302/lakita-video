<?php
/*
 * Created by ChuyenPN 09/2016
 *
 *
 */

class Course extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function view_all($id = 11) {
        $data = $this->data;
        $user_id = $this->session->userdata('user_id');
        if (isset($user_id)) {
            $data['student'] = $this->lib_mod->load_all('student', '', array('id' => $user_id), '', '', '');
        }
        $data['id'] = $id;
        $data['group_courses'] = $this->lib_mod->load_all('group_courses', 'id,name,slug', array('status' => 1), 6, '', array('sort' => 'asc'));
        $data['courses'] = $this->lib_mod->load_all('courses', '', array('status' => 1, 'group_courses_id' => $id), '', '', array('sort' => 'desc'));
        $data['rates'] = $this->lib_mod->load_all('rate', '', '', '', '', array('name' => 'desc'), 'name');
        $group_course_name = $this->lib_mod->detail('group_courses', array('id' => $id));
        $data['title'] = $group_course_name[0]['name'] . ' - lakita.vn';
        $data['group_course_name'] = $group_course_name[0]['name'];
        $data['content'] = 'course/view_all';
        $this->load->view('template', $data);
    }

    function view_group_course($page) {
        $name = str_replace('.html', '', $page);
        $flag = explode('-', $name);
        $id = end($flag);
        if (empty($flag)) {
            redirect(site_url());
        }
        $data = $this->data;
        $user_id = $this->session->userdata('user_id');
        if (isset($user_id)) {
            $data['student'] = $this->lib_mod->load_all('student', '', array('id' => $user_id), '', '', '');
        }
        $data['id'] = $id;
        $data['group_courses'] = $this->lib_mod->load_all('group_courses', 'id,name,slug', array('status' => 1), 6, '', array('sort' => 'asc'));
        $data['courses'] = $this->lib_mod->load_all('courses', '', array('status' => 1, 'group_courses_id' => $id), '', '', array('sort' => 'desc'));
        $data['rates'] = $this->lib_mod->load_all('rate', '', '', '', '', array('name' => 'desc'), 'name');
        $group_course_name = $this->lib_mod->detail('group_courses', array('id' => $id));
        $data['title'] = $group_course_name[0]['name'] . ' - lakita.vn';
        $data['group_course_name'] = $group_course_name[0]['name'];
        $data['content'] = 'course/view_all';
        $this->load->view('template', $data);
    }

    function search() {
        $data = $this->data;
        $user_id = $this->session->userdata('user_id');
        if (isset($user_id)) {
            $data['student'] = $this->lib_mod->load_all('student', '', array('id' => $user_id), '', '', '');
        }
        $data['group_courses'] = $this->lib_mod->load_all('group_courses', 'id,name,slug', array('status' => 1), 5, '', array('sort' => 'asc'));
        $key_word = $this->lib_mod->make_url(trim($this->input->post('key_word')));
        $data['courses'] = $this->lib_mod->load_courses($key_word);
        $data['rates'] = $this->lib_mod->load_all('rate', '', '', '', '', array('name' => 'desc'), 'name');
        $data['title'] = 'Tìm các khóa học bạn quan tâm - lakita.vn';
        $data['keyword'] = $key_word;
        $data['content'] = 'course/search';
        $this->load->view('template', $data);
    }

    function purchase() {
        $data = $this->data;
        $user_id = $this->session->userdata('user_id');
        if (isset($user_id)) {
            $data['student'] = $this->lib_mod->load_all('student', '', array('id' => $user_id), '', '', '');
            $data['solansai'] = count($this->lib_mod->load_all('lichsunapthe', 'id', array('card_amount' => 0, 'user_id' => $user_id), '', '', ''));
        }
        $courseID = $this->session->tempdata('curr_course_id');
        if (!isset($courseID))
            redirect(base_url());
        else {
            $data['curr_courses'] = $this->lib_mod->detail('courses', array('id' => $courseID));
        }
        $data['title'] = 'Mua khóa học - lakita.vn';
        $data['content'] = 'course/purchase';
        $this->load->view('template', $data);
    }

    function purchase_by_cod() {
        $submit = $this->input->post('submit_form');
        if ($submit == 'purchase_by_cod') {
            $param['name'] = $this->input->post('name');
            $param['email'] = $this->input->post('email');
            $param['phone'] = $this->input->post('phone');
            $param['tinh'] = $this->input->post('tinh');
            $param['quan'] = $this->input->post('quan');
            $param['dia_chi'] = $this->input->post('dia_chi');
            $param['courseID'] = $this->session->tempdata('curr_course_id');
            if ($param['name'] == '' || $param['email'] == '' || $param['phone'] == '' || $param['quan'] == '' || $param['dia_chi'] == '') {
                die;
                exit;
            }
            if (!preg_match("/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/i", $param['email'])) {
                die;
                exit;
            }
            if (!preg_match("/^[0-9]{10,11}$/i", $param['phone'])) {
                die;
                exit;
            }
//            $user_ip_exist = $this->session->tempdata('user_ip');
//            $user_register_count = $this->session->tempdata('user_register_count');
//            if (isset($user_ip_exist) && $user_ip_exist == $this->getUserIP() && isset($user_register_count) && $user_register_count >= 3) {
//
//                die;
//                exit;
//            }
            $param['time'] = time();
            $courseID = $this->session->tempdata('curr_course_id');
            $priceVouched = $this->session->userdata('priceVouched');
            $course = $this->lib_mod->detail('courses', array('id' => $courseID));
            $param['price'] = 315000;
            if ($param['name'] != NULL) {
                $this->session->set_tempdata('temp_cod_name', $param['name'], 1800);
                $this->session->set_tempdata('temp_cod_quan', $param['quan'], 1800);
                $this->session->set_tempdata('temp_cod_tinh', $param['tinh'], 1800);
                $this->session->set_tempdata('temp_cod_dia_chi', $param['dia_chi'], 1800);
                $this->session->set_tempdata('temp_cod_phone', $param['phone'], 1800);
                $this->session->set_tempdata('temp_cod_email', $param['email'], 1800);
//                if (!isset($user_ip_exist)) {
//                    $user_ip = $this->getUserIP();
//                    $this->session->set_tempdata('user_ip', $user_ip, 1800 * 6);
//                    $this->session->set_tempdata('user_register_count', 1, 1800 * 6);
//                } else {
//                    $this->session->set_tempdata('user_register_count', $this->session->tempdata('user_register_count') + 1, 1800 * 6);
//                }
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
                $mobile = $this->agent->is_mobile() ? 'Mobile_' : '';

                $course_cod = $this->find_course_code($course[0]['id']);
                $param1 = array(
                    'matrix' => 'lakita.vn',
                    'course_code' => $course_cod,
                    'price_purchase' => $param['price'],
                    'name' => htmlspecialchars($this->input->post('name')),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'tinh' => htmlspecialchars($this->input->post('tinh')),
                    'quan' => htmlspecialchars($this->input->post('quan')),
                    'dia_chi' => htmlspecialchars($this->input->post('dia_chi')),
                    'course' => $mobile . $param['price'] . 'đ -' . $course[0]['name'],
                );
                $restClient->post($uri, $param1);
                $this->lib_mod->insert('purchase', $param);
                /*                 * ***************************xóa session tránh ddos************************* */
                //unset($_SESSION['curr_course_purchase']);
                $voucherName = $this->session->tempdata('voucherName');
                if (isset($voucherName)) {
                    $voucher = $this->lib_mod->load_all('coupon', 'merchantID', array('name' => $voucherName), '', '', '');
                    if ($voucher[0]['merchantID'] != 0) {
                        $param2 = array(
                            'voucher' => $voucherName,
                            'time' => time(),
                            'courseID' => $courseID,
                            'price' => $this->session->tempdata('priceVouched'),
                            'merchantID' => $voucher[0]['merchantID'],
                            'method' => 1,
                            'email' => $this->input->post('email')
                        );
                        $this->lib_mod->insert('use_voucher', $param2);
                    }
                }
                echo '104';
                die;
            }
            die;
        } else {

            die;
        }
    }

    function purchase_direct() {
        $submit = $this->input->post('submit_form');
        if ($submit == 'purchase_by_direct') {
            $param['name'] = $this->input->post('name');
            $param['phone'] = $this->input->post('phone');
            $param['courseID'] = $this->session->tempdata('curr_course_id');
            if ($param['name'] == '' || $param['phone'] == '') {
                die;
                exit;
            }
            if (!preg_match("/^[0-9]{10,11}$/i", $param['phone'])) {
                die;
                exit;
            }
//            $user_ip_exist = $this->session->tempdata('user_ip');
//            $user_register_count = $this->session->tempdata('user_register_count');
//            if (isset($user_ip_exist) && $user_ip_exist == $this->getUserIP() && isset($user_register_count) && $user_register_count >= 3) {
//                die;
//                exit;
//            }
            $param['time'] = time();
            $courseID = $this->session->tempdata('curr_course_id');
            $priceVouched = $this->session->userdata('priceVouched');
            $course = $this->lib_mod->detail('courses', array('id' => $courseID));
            $param['price'] = isset($priceVouched) ? $priceVouched : str_replace('.', '', $course[0]['price_root']);
            if ($param['name'] != NULL) {
                $this->session->set_tempdata('temp_cod_name', $param['name'], 1800);
                $this->session->set_tempdata('temp_cod_phone', $param['phone'], 1800);
//                if (!isset($user_ip_exist)) {
//                    $user_ip = $this->getUserIP();
//                    $this->session->set_tempdata('user_ip', $user_ip, 1800 * 6);
//                    $this->session->set_tempdata('user_register_count', 1, 1800 * 6);
//                } else {
//                    $this->session->set_tempdata('user_register_count', $this->session->tempdata('user_register_count') + 1, 1800 * 6);
//                }
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
                $mobile = $this->agent->is_mobile() ? 'Mobile_' : '';

                $course_cod = $this->find_course_code($course[0]['id']);
                $param1 = array(
                    'payment_method_rgt' => '4',
                    'matrix' => 'lakita.vn',
                    'course_code' => $course_cod,
                    'price_purchase' => $param['price'],
                    'name' => ($this->input->post('name')),
                    'phone' => $this->input->post('phone'),
                    'course' => $mobile . $param['price'] . '-' . $course[0]['name'],
                    'email' => 'NO_PARAM@gmail.com',
                    'tinh' => 'NO_PARAM',
                    'quan' => 'NO_PARAM',
                    'dia_chi' => 'NO_PARAM'
                );
                $restClient->post($uri, $param1);
                $this->lib_mod->insert('purchase', $param);
                /* =============================== xóa session tránh ddos************************* */
                //unset($_SESSION['curr_course_purchase']);
                $voucherName = $this->session->tempdata('voucherName');
                if (isset($voucherName)) {
                    $voucher = $this->lib_mod->load_all('coupon', 'merchantID', array('name' => $voucherName), '', '', '');
                    if ($voucher[0]['merchantID'] != 0) {
                        $param2 = array(
                            'voucher' => $voucherName,
                            'time' => time(),
                            'courseID' => $courseID,
                            'price' => $this->session->tempdata('priceVouched'),
                            'merchantID' => $voucher[0]['merchantID'],
                            'method' => 2,
                            'email' => $param['name'] . 'đ -' . $param['phone']
                        );
                        $this->lib_mod->insert('use_voucher', $param2);
                    }
                }
                echo '104';
                die;
            }

            die;
        } else {

            die;
        }
    }

    function purchase_transfer() {
        $submit = $this->input->post('submit_form');
        if ($submit == 'purchase_by_transfer') {
            $param['name'] = $this->input->post('name');
            $param['phone'] = $this->input->post('phone');
            $param['courseID'] = $this->session->tempdata('curr_course_id');
            if ($param['name'] == '' || $param['phone'] == '') {
                die;
                exit;
            }
            if (!preg_match("/^[0-9]{10,11}$/i", $param['phone'])) {
                die;
                exit;
            }
//            $user_ip_exist = $this->session->tempdata('user_ip');
//            $user_register_count = $this->session->tempdata('user_register_count');
//            if (isset($user_ip_exist) && $user_ip_exist == $this->getUserIP() && isset($user_register_count) && $user_register_count >= 3) {
//                die;
//                exit;
//            }
            $param['time'] = time();
            $courseID = $this->session->tempdata('curr_course_id');
            $priceVouched = $this->session->userdata('priceVouched');
            $course = $this->lib_mod->detail('courses', array('id' => $courseID));
            $param['price'] = isset($priceVouched) ? $priceVouched : str_replace('.', '', $course[0]['price_root']);
            if ($param['name'] != NULL) {
                $this->session->set_tempdata('temp_cod_name', $param['name'], 1800);
                $this->session->set_tempdata('temp_cod_phone', $param['phone'], 1800);
//                if (!isset($user_ip_exist)) {
//                    $user_ip = $this->getUserIP();
//                    $this->session->set_tempdata('user_ip', $user_ip, 1800 * 6);
//                    $this->session->set_tempdata('user_register_count', 1, 1800 * 6);
//                } else {
//                    $this->session->set_tempdata('user_register_count', $this->session->tempdata('user_register_count') + 1, 1800 * 6);
//                }
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
                $mobile = $this->agent->is_mobile() ? 'Mobile_' : '';

                $course_cod = $this->find_course_code($course[0]['id']);
                $param1 = array(
                    'payment_method_rgt' => '2',
                    'matrix' => 'lakita.vn',
                    'course_code' => $course_cod,
                    'price_purchase' => $param['price'],
                    'name' => ($this->input->post('name')),
                    'phone' => $this->input->post('phone'),
                    'course' => $mobile . $param['price'] . '-' . $course[0]['name'],
                    'email' => 'NO_PARAM@gmail.com',
                    'tinh' => 'NO_PARAM',
                    'quan' => 'NO_PARAM',
                    'dia_chi' => 'NO_PARAM'
                );
                $restClient->post($uri, $param1);
                $this->lib_mod->insert('purchase', $param);
                /* =============================== xóa session tránh ddos************************* */
                //unset($_SESSION['curr_course_purchase']);
                $voucherName = $this->session->tempdata('voucherName');
                if (isset($voucherName)) {
                    $voucher = $this->lib_mod->load_all('coupon', 'merchantID', array('name' => $voucherName), '', '', '');
                    if ($voucher[0]['merchantID'] != 0) {
                        $param2 = array(
                            'voucher' => $voucherName,
                            'time' => time(),
                            'courseID' => $courseID,
                            'price' => $this->session->tempdata('priceVouched'),
                            'merchantID' => $voucher[0]['merchantID'],
                            'method' => 3,
                            'email' => $param['name'] . 'đ -' . $param['phone']
                        );
                        $this->lib_mod->insert('use_voucher', $param2);
                    }
                }
                echo '104';
                die;
            }
            die;
        } else {

            die;
        }
    }

    function purchase_by_mobile_cash() {
        $courseID = $this->session->tempdata('curr_course_id');
        if (!isset($courseID)) {
            echo 'Đã có lỗi xảy ra, vui lòng liên hệ với ban quản trị!';
            die;
        }
        //echo $this->input->post('NLNapThe');
        if ($this->input->post('NLNapThe') != '') {
            require_once 'plugin/nganluong.php';
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
                $student = $this->lib_mod->load_all('student', '', array('id' => $user_id), '', '', '');
                $balance = $student[0]['balance'];
                $courseID = $this->session->tempdata('curr_course_id');
                $priceVouched = $this->session->userdata('priceVouched');
                $pricefinal = isset($priceVouched) ? $priceVouched : str_replace('.', '', $this->lib_mod->load_all('courses', '', array('id' => $courseID), '', '', '')[0]['price_root']);
                $sodu = $rs->card_amount - $pricefinal;
                if ($sodu < 0) {
                    $data1['balance'] = $rs->card_amount + $balance;
                } else {
                    $voucherName = $this->session->tempdata('voucherName');
                    if (isset($voucherName)) {
                        $voucher = $this->lib_mod->load_all('coupon', 'merchantID', array('name' => $voucherName), '', '', '');
                        if ($voucher[0]['merchantID'] != 0) {
                            $param2 = array(
                                'voucher' => $voucherName,
                                'time' => time(),
                                'courseID' => $courseID,
                                'price' => $this->session->tempdata('priceVouched'),
                                'merchantID' => $voucher[0]['merchantID'],
                                'method' => 4,
                                'userID' => $user_id
                            );
                            $this->lib_mod->insert('use_voucher', $param2);
                        }
                    }
                    $data1['balance'] = $rs->card_amount - $pricefinal + $balance;
                    $this->lib_mod->insert('student_courses', array('student_id' => $user_id, 'courses_id' => $courseID, 'status' => 1, 'create_date' => time(), 'thanhtien' => $pricefinal));
                    $this->lib_mod->insert('lichsunapthe', $data);
                    $this->lib_mod->update('student', array('id' => $user_id), $data1);
                    $first_learn = $this->find_first_course('', $courseID);
                    echo '<script> alert("Chúc mừng bạn đã mua khóa học thành công! '
                    . 'Bạn sẽ được chuyển đến trang chi tiết khóa học để học ngay! ");'
                    . 'location.replace("' . $first_learn . '")'
                    . '</script>';
                }
                if ($sodu < 0) {
                    $this->lib_mod->update('student', array('id' => $user_id), $data1);
                    $this->lib_mod->insert('lichsunapthe', $data);
                    echo '<script>alert("Bạn đã nạp thành công ' . $rs->card_amount . ' vào trong tài khoản. '
                    . 'Số tiền bạn nạp không đủ để mua khóa học, vì vậy số tiền nạp sẽ được '
                    . 'cộng vào số dư tài khoản lakita của bạn");</script>'; //$total_results;
                }
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
                echo '<script>alert("Lỗi :' . $rs->error_message . '"); </script>';
                echo "<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
            }
        }
    }

    function purchase_by_atm() {
        $nlpayment = $this->input->post('nlpayment');
        if ($nlpayment != '') {
            $userID = $this->session->userdata('user_id');
            if (!isset($userID)) {
                echo 'Đã có lỗi xảy ra, vui lòng liên hệ với ban quản trị!';
                die;
            }
            $course_ID = $this->session->tempdata('curr_course_id');
            $courseID = $this->lib_mod->detail('courses', array('id' => $course_ID));
            require_once 'plugin/nganluong.php';
            $nlcheckout = new NL_CheckOutV3(MERCHANT_ID, MERCHANT_PASS, RECEIVER, URL_API);
            $priceVouched = $this->session->userdata('priceVouched');
            $total_amount = 315000;
            $array_items[0] = array('item_name1' => 'Product name',
                'item_quantity1' => 1,
                'item_amount1' => $total_amount,
                'item_url1' => 'http://nganluong.vn/');
            $array_items = array();
            $payment_method = $this->input->post('option_payment');
            $bank_code = $this->input->post('bankcode');
            $order_code = "macode_" . time();
            $payment_type = '';
            $discount_amount = 0;
            $order_description = '';
            $tax_amount = 0;
            $fee_shipping = 0;
            $return_url = base_url() . 'course/atm_success';
            $cancel_url = urlencode(base_url());
            $student = $this->lib_mod->detail('student', array('id' => $userID));
            $buyer_fullname = $student[0]['name'];
            $buyer_email = $student[0]['email'];
            $buyer_mobile = $student[0]['phone'];
            $buyer_address = 'lakita';
            if ($payment_method != '' && $buyer_email != "" && $buyer_mobile != "" && $buyer_fullname != "" && filter_var($buyer_email, FILTER_VALIDATE_EMAIL)) {
                if ($payment_method == "VISA") {
                    $nl_result = $nlcheckout->VisaCheckout($order_code, $total_amount, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items, $bank_code);
                } elseif ($payment_method == "NL") {
                    $nl_result = $nlcheckout->NLCheckout($order_code, $total_amount, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items);
                } elseif ($payment_method == "ATM_ONLINE" && $bank_code != '') {
                    $nl_result = $nlcheckout->BankCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items);
                } elseif ($payment_method == "NH_OFFLINE") {
                    $nl_result = $nlcheckout->officeBankCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items);
                } elseif ($payment_method == "ATM_OFFLINE") {
                    $nl_result = $nlcheckout->BankOfflineCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items);
                } elseif ($payment_method == "IB_ONLINE") {
                    $nl_result = $nlcheckout->IBCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items);
                }
                if ($bank_code == '') {
                    echo '<script> alert("Mời bạn nhập đầy đủ thông tin!");  </script>';
                    $student = $this->lib_mod->load_all('student', '', array('id' => $this->session->userdata('user_id')), '', '', '');
                    if ($student[0]['phone'] == '' || $student[0]['email'] == '' || $student[0]['name'] == '') {
                        $this->lib_mod->update('student', array('id' => $this->session->userdata('user_id')), array('name' => $buyer_fullname, 'phone' => $buyer_mobile, 'email' => $buyer_email));
                    }
                } else {
                    if ($nl_result->error_code == '00') {
                        $this->session->set_userdata('courseID', $courseID[0]['id']);
                        //Cập nhât order với token  $nl_result->token để sử dụng check hoàn thành sau này
                        ?>
                        <script type="text/javascript">
                            window.location.replace("<?php echo(string) $nl_result->checkout_url; ?>");
                        </script>
                        <?php
                    } else {
                        echo $nl_result->error_message;
                    }
                }
            } else {
                echo '<script> alert("Mời bạn nhập đầy đủ thông tin");  </script>';
            }
        } else {
            echo "";
        }
    }

    function purchase_by_lakita_balance() {
        // $course_purchased = $this->session->tempdata('curr_course_purchase');
        $submit = $this->input->post('submit_form');
        if ($submit == 'purchase_by_lakita') {
            $user_id = $this->session->userdata('user_id');
            if (!isset($user_id)) {
                die;
                exit;
            } else {

                $student = $this->lib_mod->detail('student', array('id' => $user_id));
                $balance = $student[0]['balance'];
                $courseID = $this->session->tempdata('curr_course_id');
                $priceVouched = $this->session->userdata('priceVouched');
                $pricefinal = isset($priceVouched) ? $priceVouched : str_replace('.', '', $this->lib_mod->detail('courses', array('id' => $courseID))[0]['price_root']);
                $sodu = $balance - $pricefinal;
                if ($sodu < 0) {
                    echo 0;
                    die;
                } else {
                    $this->lib_mod->update('student', array('id' => $user_id), array('balance' => $sodu));
                    $this->lib_mod->insert('student_courses', array('student_id' => $user_id, 'courses_id' => $courseID, 'create_date' => time(), 'status' => 1));
                    echo $this->find_first_course('', $courseID);
                    die;
                }
            }
        } else {
            die;
            exit;
        }
    }

    function atm_success() {
        require_once 'plugin/nganluong.php';
        $nlcheckout = new NL_CheckOutV3(MERCHANT_ID, MERCHANT_PASS, RECEIVER, URL_API);
        $nl_result = $nlcheckout->GetTransactionDetail($this->input->get('token'));
        if ($nl_result) {
            $nl_errorcode = (string) $nl_result->error_code;
            $nl_transaction_status = (string) $nl_result->transaction_status;
            if ($nl_errorcode == '00') {
                if ($nl_transaction_status == '00') {
                    $token = $this->lib_mod->detail('atm', array('token' => $this->input->get('token')));
                    if (count($token) == 0) {
                        $user_id = $this->session->userdata('user_id');
                        $courseID = $this->session->tempdata('curr_course_id');
                        /*                         * ***** Tính điểm cho voucher giới thiệu ***************** */
                        $voucherName = $this->session->tempdata('voucherName');
                        if (isset($voucherName)) {
                            $voucher = $this->lib_mod->load_all('coupon', 'merchantID', array('name' => $voucherName), '', '', '');
                            if ($voucher[0]['merchantID'] != 0) {
                                $param2 = array(
                                    'voucher' => $voucherName,
                                    'time' => time(),
                                    'courseID' => $courseID,
                                    'price' => $this->session->tempdata('priceVouched'),
                                    'merchantID' => $voucher[0]['merchantID'],
                                    'method' => 6,
                                    'userID' => $user_id
                                );
                                $this->lib_mod->insert('use_voucher', $param2);
                            }
                        }
                        $this->lib_mod->insert('atm', array('token' => $this->input->get('token'), 'time' => time(), 'user_id' => $user_id, 'money' => $nl_result->total_amount));

                        $enrolled_user_statuses = $this->lib_mod->detail('student_courses', array('student_id' => $user_id, 'courses_id' => $courseID));
                        if (!count($enrolled_user_statuses)) {
                            $this->lib_mod->insert('student_courses', array('student_id' => $user_id, 'courses_id' => $courseID, 'status' => 1, 'create_date' => time()));
                        } else {
                            if ($enrolled_user_statuses[0]['trial_learn'] == 1) {
                                $this->lib_mod->update('student_courses', array('student_id' => $user_id, 'courses_id' => $courseID), array('trial_learn' => '0', 'status' => 1, 'create_date' => time()));
                                $this->lib_mod->update('student', array('id' => $user_id), array('status' => 1));
                            }
                        }
                        $first_learn = $this->find_first_course('', $courseID);
                        echo '<script> alert("Chúc mừng bạn đã mua khóa học thành công! '
                        . 'Bạn sẽ được chuyển đến trang chi tiết khóa học để học ngay! ");'
                        . 'location.replace("' . $first_learn . '")'
                        . '</script>';
                    } else {
                        echo 'đường dẫn sai!';
                        die;
                    }
                }
            } else {
                echo $nlcheckout->GetErrorMessage($nl_errorcode);
            }
        }
    }

    function purchase_success_cod() {
        $data = $this->data;
        $user_id = $this->session->userdata('user_id');
        if (isset($user_id)) {
            $data['student'] = $this->lib_mod->load_all('student', '', array('id' => $user_id), '', '', '');
        }
        $courseID = $this->session->tempdata('curr_course_id');
        if (!isset($courseID))
            redirect(base_url());
        else {
            $data['curr_courses'] = $this->lib_mod->detail('courses', array('id' => $courseID));
        }
        $data['other_courses'] = $this->lib_mod->load_all('courses', '', array('status' => 1, 'id !=' => $courseID), 8, '', array('sort' => 'desc'));
        $data['title'] = 'Mua khóa học - lakita.vn';
        $data['content'] = 'course/purchase_success_cod';
        $this->load->view('template', $data);
    }

    function vote() {
        $param['vote_star_number'] = $this->input->post('vote_star_number');
        $param['vote_description'] = htmlspecialchars($this->input->post('vote_description'));
        $param['vote_user_name'] = htmlspecialchars($this->input->post('vote_user_name'));
        $param['userID'] = htmlspecialchars($this->input->post('vote_user_id'));
        $param['courseID'] = htmlspecialchars($this->input->post('vote_course_id'));
        $param['time'] = time();
        $this->lib_mod->insert('vote', $param);
        echo 1;
    }

    function reload_vote() {
        $data['vote'] = $this->lib_mod->load_all('vote', '', array('courseID' => $this->session->tempdata('curr_course_id')), '', '', array('time' => 'desc'));
        $this->load->view('course/detail/reload_vote', $data);
    }

    //============================ CÁC HÀM PHỤ TRỢ =============================================

    function applyVoucher() {
        $courseID = $this->session->tempdata('curr_course_id');
        $coupon = strtoupper(trim($this->input->post('coupon')));
        $data = $this->lib_mod->detail('coupon', array('name' => $coupon));
        if (count($data)) {
            if ($data[0]['courseID'] == $courseID) {
                $this->session->set_tempdata('voucherName', $coupon, 1800);
                $course = $this->lib_mod->detail('courses', array('id' => $courseID));
                $priceVouched = str_replace('.', '', $course[0]['price_root']) - $data[0]['money'];
                $this->session->set_tempdata('priceVouched', $priceVouched, 1800);
                $this->session->set_tempdata('courseVouched', $courseID, 1800);
                echo $priceVouched . '-' . $data[0]['money'];
                die;
            } else if ($data[0]['courseID'] == 999) {
                $this->session->set_tempdata('voucherName', $coupon, 1800);
                $course = $this->lib_mod->detail('courses', array('id' => $courseID));
                $priceVouched = 249000;
                $this->session->set_tempdata('priceVouched', $priceVouched, 1800);
                $this->session->set_tempdata('courseVouched', $courseID, 1800);
                echo $priceVouched . '-' . (str_replace('.', '', $course[0]['price_root']) - 249000);
                die;
            } else if ($data[0]['courseID'] == 960) {
                $this->session->set_tempdata('voucherName', $coupon, 1800);
                $course = $this->lib_mod->detail('courses', array('id' => $courseID));
                $priceVouched = (str_replace('.', '', $course[0]['price_root'])) * 0.4;
                $this->session->set_tempdata('priceVouched', $priceVouched, 1800);
                $this->session->set_tempdata('courseVouched', $courseID, 1800);
                echo $priceVouched . '-' . (str_replace('.', '', $course[0]['price_root']) - $priceVouched);
                die;
            } else if ($data[0]['courseID'] == 900 && $this->agent->is_mobile()) {
                $this->session->set_tempdata('voucherName', $coupon, 1800);
                $course = $this->lib_mod->detail('courses', array('id' => $courseID));
                $priceVouched = (str_replace('.', '', $course[0]['price_root'])) * 0.5;
                $this->session->set_tempdata('priceVouched', $priceVouched, 1800);
                $this->session->set_tempdata('courseVouched', $courseID, 1800);
                echo $priceVouched . '-' . (str_replace('.', '', $course[0]['price_root']) - $priceVouched);
                die;
            } else {
                echo 1;
                die;
            }
        } else {
            echo 0;
            die;
        }
    }

    function download($filename) {
        if (!isset($filename) && empty($filename)) {
            redirect(site_url());
        }
        $user_id = $this->session->userdata('user_id');
        if (!isset($user_id)) {
            die('Xin lỗi, bạn không có quyền truy cập vào khu vực này!');
        }
        echo $file = base64_decode($filename);
        $file_path = '/home/lakita.com.vn/public_html/' . $file;
        if (!is_file($file_path)) {
            die('Không tìm thấy file');
        }
        $is_downloadable = $this->session->tempdata('is_downloadable');
        if (isset($is_downloadable)) {
            $learn_id = $this->lib_mod->load_all_like('learn', 'id', array('attach_file' => $file), '', '', '');
            if (isset($learn_id[0])) {
                foreach ($learn_id as $key => $value) {
                    if ($value['id'] == $is_downloadable) {
                        $this->load->helper('download');
                        force_download($file_path, NULL);
                        die;
                    }
                }
            } else {
                echo 3;
                die;
            }
        } else {
            die('Xin lỗi, bạn không có quyền truy cập vào khu vực này!');
        }
    }

    function save_note() {
        $learn_id = htmlspecialchars(trim($this->input->post('learn_id')));
        $learn_note = htmlspecialchars(nl2br(trim($this->input->post('learn_note'))));
        $user_id = $this->session->userdata('user_id');
        if (isset($learn_id) && isset($learn_note) && isset($user_id)) {
            $note_exist = $this->lib_mod->count('learn_note', array('student_id' => $user_id, 'learn_id' => $learn_id));
            if ($note_exist) {
                $this->lib_mod->update('learn_note', array('student_id' => $user_id, 'learn_id' => $learn_id), array('note' => $learn_note));
            } else {
                $this->lib_mod->insert('learn_note', array('student_id' => $user_id, 'learn_id' => $learn_id, 'note' => $learn_note));
            }
            echo 1;
        }
    }

    function comment($url='') {

        // id trợ giảng lakita 4909 3073
        $learn_id = htmlspecialchars(trim($this->input->post('learn_id')));
        $courses_id = htmlspecialchars(trim($this->input->post('courses_id')));
        $parent = htmlspecialchars(trim($this->input->post('parent')));
        $content = strip_tags(trim($this->input->post('content')));
        $user_id = $this->session->userdata('user_id');
        $url = $this->input->post('url');
        
        if ( !empty($url) && $parent != '' && ($user_id == '4909' || $user_id == '3073' || $user_id == '2626') ) {
            // nếu trợ giảng lakita trả lời thì ...

            $idparent = $this->lib_mod->detail('comment',  array('id' => $parent));
            $idstudent = $this->lib_mod->detail('comment', array('id' => $idparent[0]['id']));
            $emailstudent = $this->lib_mod->detail('student', array('id' => $idstudent[0]['student_id']));
            
            
            
            if (isset($learn_id) && isset($courses_id) && isset($content) && isset($user_id)) {
                $this->lib_mod->insert('comment', array('student_id' => $user_id, 'learn_id' => $learn_id, 'courses_id' => $courses_id, 'parent' => $parent, 'content' => $content, 'createdate' => time(), 'status' => 0));
                echo 1;
            }
            
            $courses = $this->lib_mod->detail('courses', array('id' => $courses_id));
            $learn = $this->lib_mod->detail('learn', array('id' => $learn_id));
           
            //mẫu gửi email cho học viên khi bình luận của học viên được trả lời
            
            $this->load->library("email");
            $this->email->from('cskh@lakita.vn', "lakita.vn");
            $emailTo = $emailstudent[0]['email'];
            
            $this->email->to($emailTo);
            $this->email->subject('Bình luận của bạn đã được trả lời ở trang lakita');
            $this->email->message('<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="font-family:Tahoma,Arial;background-color:#f5f5f5;padding:50px 0">
    <tbody>
        <tr>
            <td width="100%" valign="top" style="padding-top:20px">
                <table width="682" border="0" cellpadding="0" cellspacing="0" align="center" style="border:1px solid #dedede">
                    <tbody>
                        <tr>
                            <td align="center" bgcolor="#fff" style="padding-top:24px;color:#41a85f">
                                <div>
                                    <h1>Lakita.vn</h1>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" bgcolor="#fff" style="padding:20px 0;color:#fff">
                                <div style="background:url(https://ci5.googleusercontent.com/proxy/4m60zPgaWAWgWKNJAa1ktQJn85UQojWCUDCGZ83QUL3JPTIOOd8ZiF0eawcIHb0m5m0E3dboQL-yF_XHAz_H8HDFXWvLOrds-rUeZcWHNgLW3Q=s0-d-e1-ft#http://kyna.vn/media/images/layout_v2/cod_shipping_intro.png);min-height:30px;width:549px">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" bgcolor="#41a85f" style="padding:6px 0">
                                <table style="color:#fff;font-size:11.91px">
                                    <tbody><tr>
                                            <td align="center" style="padding:3px 20px;border-right:1px solid #fff">
                                                <a href="https://lakita.vn/nhom-khoa-hoc/nang-cao-nang-luc-van-phong.html" style="text-decoration:none;color:#fff" target="_blank">Nâng cao năng lực văn phòng</a>
                                            </td>
                                            <td align="center" style="padding:3px 20px;border-right:1px solid #fff">
                                                <a href="https://lakita.vn/nhom-khoa-hoc/cong-nghe-thong-tin.html" style="text-decoration:none;color:#fff" target="_blank">Công nghệ thông tin</a>
                                            </td>
                                            <td align="center" style="padding:3px 20px;border-right:1px solid #fff">
                                                <a href="https://lakita.vn/nhom-khoa-hoc/khoi-nghiep.html" style="text-decoration:none;color:#fff" target="_blank">Khởi nghiệp</a>
                                            </td>
                                            <td align="center" style="padding:3px 20px;border-right:1px solid #fff">
                                                <a href="https://lakita.vn/nhom-khoa-hoc/suc-khoe.html" style="text-decoration:none;color:#fff" target="_blank">Sức khỏe</a>
                                            </td>
                                            <td align="center" style="padding:3px 20px;border-right:1px solid #fff">
                                                <a href="https://lakita.vn/nhom-khoa-hoc/kinh-doanh.html" style="text-decoration:none;color:#fff" target="_blank">Kinh doanh</a>
                                            </td>
                                            <td align="center" style="padding:3px 20px">
                                                <a href="https://lakita.vn/nhom-khoa-hoc/phat-trien-ca-nhan.html" style="text-decoration:none;color:#fff" target="_blank">Phát triển cá nhân </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:42px 26px 50px 26px;line-height:1.3em;background-color:#fff;color:#666;font-size:13px;text-align:justify">
                                <div>
                                    Bình luận của bạn ở khóa học ' . $courses[0]['name'] . ' tại bài ' . $learn[0]['sort'] . ' đã được trả lời.
<br> Nội dung: <br>' . $content . '                                    
Click vào đây để xem trả lời <a href="'.$url.'"> VÀO NGAY </a> <br>
                                    Thân mến,<br><br>
                                    Lakita.vn            </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" style="padding:20px 22px;border:1px solid #ddd;border-width:1px 0" bgcolor="#EAEAEA">
                                <table style="width:100%;font-size:13px;line-height:1.38;font-family:Tahoma" border="0">
                                    <tbody><tr>
                                            <td style="width:460px">
                                                <div style="color:#727272">
                                                    © 2016 - Bản quyền của Công Ty Cổ Phần Giáo Dục Lakita<br>
                                                    LIÊN HỆ:<br>
                                                    Hà Nội: Phòng 701 CT1 - Chung cư Skylight - Ngõ Hòa Bình 6 - 125D Minh Khai - Q. Hai Bà Trưng<br>
                                                    TP. HCM: Số 185-187 Hoàng Văn Thụ, P8, Q.Phú Nhuận, TP.HCM (Trường trung cấp Bách Khoa, Đối diện trung tâm White Place)
                                                </div>
                                            </td>
                                            <td>
                                                <div style="font-size:14px;text-align:right;margin-bottom:13px"><strong>Follow us</strong></div>
                                                <div style="text-align:right">
                                                    <a href="https://www.facebook.com/Lakitavn-872893369492994" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://email.kyna.vn/wf/click?upn%3DsTOece2eeLZO9tXRFrRSKCyyqgN0q-2BQjVAbvTHmhUUTx2v5FUvolR-2BNxB35NnCAS_Q8YsDWij4AtnHEQzQettwQFUQJNiNdMbKozie8JvA7WQ5mZSVxiIVuv5eDkcYMLar1xCGexIPcjhjTtQ24c4RmqCUTUlky-2Bncb6XmjSXY6kWfpjurX1MbXHmoyvC3fr-2BczYnTgrbANPW3IQHr0yto9L-2BlCMGeoWip6WxgPZLhoMQ6qlTYwDJ5lybanqGsHu9wTpubbEnN7Uh0r232ngQzw-3D-3D&amp;source=gmail&amp;ust=1469173733044000&amp;usg=AFQjCNFxzJmR10VQLsWpCjgDZ5P7jqT6dQ"><img src="https://ci6.googleusercontent.com/proxy/7bzJtLThBaeN4-_hQj0XaaBezT4P1klVQJciaTq8GwOfssN8K251vJWYvSEmXRS42EKxllXVwvjyTFagQ_TA-R0PMjpXIJD36vZ2mruDuJB7Kg=s0-d-e1-ft#http://kyna.vn/media/images/layout_v2/ico_facebook_26x26.png" class="CToWUd"></a>
                                                    <a href="#"><img src="https://ci5.googleusercontent.com/proxy/VErKdonx8SmXFsitviX1WUq7YzstTPYIBf5_ARRiaodUC7knozd3LvMZm7yaFYbUv1B4Ovf2u3_UTLWRGllQKGfGpdU6P7MjjNQM3KVUFxdv=s0-d-e1-ft#http://kyna.vn/media/images/layout_v2/ico_twitter_26x26.png" class="CToWUd"></a>
                                                    <a href="#"><img src="https://ci6.googleusercontent.com/proxy/TnGXUOlzTi6hs6Z3Ro-72KMG2r5ALqv-IiBr1ORzmjk6YrzBSlC-MOlhrcCxGAhfbA0A-65GmPVjpTS1HGyGVUj6anQL9b8Yk4h0VkHhshasJww=s0-d-e1-ft#http://kyna.vn/media/images/layout_v2/ico_pinterest_26x26.png" class="CToWUd"></a>
                                                    <a href="#" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://email.kyna.vn/wf/click?upn%3Dc8DO3Li0ri7wGG898iEFgz24cb-2FAWkeFlXW2geFTc38U9OQ8rb5Gc7V0cXwmpGXYMGNJiUYZxImDtu7ZN-2Buw4A-3D-3D_Q8YsDWij4AtnHEQzQettwQFUQJNiNdMbKozie8JvA7WQ5mZSVxiIVuv5eDkcYMLaxSZAHGFZ5b5bmmG-2F8s3sri5bYdXyxprJCPpva6AdNqMzCPdSmUexoZ40dp3tE0nWvUP9VJl5zh7sAuxC6z9-2B-2BKp57fJvqqg8uoLg5ba5QEO1tXO-2FRilB-2FJyTyaoaGUAXsss5hD-2FxR6alz1HLx2D1GA-3D-3D&amp;source=gmail&amp;ust=1469173733044000&amp;usg=AFQjCNHlAVMv6ydRRnl6QiXkY-0rB5XR_A"><img src="https://ci5.googleusercontent.com/proxy/iVP4D-YZCtHzU1D3_Zc8i01vi4h4Mg1Fm42gb8IvTUNMI0tORP9m1uWyGkUzojmeXf58-0BSJoBtnzqAlCSm9Jzhwf161sDrHktZNksmvaTrEC-A7w=s0-d-e1-ft#http://kyna.vn/media/images/layout_v2/ico_google-plus_26x26.png" class="CToWUd"></a>
                                                    <a href="#" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://email.kyna.vn/wf/click?upn%3DsTOece2eeLZO9tXRFrRSKPwtRiKgMMe6AqajJb5VuSkdoK4v-2Ft2Yil6qN3bKXwhf83dVFjfSVCGYv47aiWe-2BxA-3D-3D_Q8YsDWij4AtnHEQzQettwQFUQJNiNdMbKozie8JvA7WQ5mZSVxiIVuv5eDkcYMLaNV8ux9sutbDioYScRw31m1baCnScRqy9cvNcBa2PcDCUgxthg10G3wauhjuwq8MrwNprEf-2Fp10bF56YxWIP5G9csw16pvL3ZqMm1nTWSCDmHhpzDDEsW0Q1KFKvjPrfn4Xszfp3dVDcfI9x46649fA-3D-3D&amp;source=gmail&amp;ust=1469173733045000&amp;usg=AFQjCNHwdEh78kMIBBTIlV9e8SDdhmL9nQ"><img src="https://ci3.googleusercontent.com/proxy/qj6QoaTnI_fO_fXvppN_nFktwbwoYujCsTnxxKBEdJudbWORMQt823hP5S-HdgSf0c1QDbOxMr5OCO-Am1o2M9nngShNRomB5cCHJlT3E6Gt=s0-d-e1-ft#http://kyna.vn/media/images/layout_v2/ico_youtube_26x26.png" class="CToWUd"></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>');
            $this->email->send();
            $this->email->clear(TRUE);
            
            if ($courses_id == 0 || $learn_id == 0 || $parent != ''){
                die;
            }
        } else {

            //nếu học viên comment thì ...
            if (isset($learn_id) && isset($courses_id) && isset($content) && isset($user_id)) {
                $this->lib_mod->insert('comment', array('student_id' => $user_id, 'learn_id' => $learn_id, 'courses_id' => $courses_id, 'parent' => $parent, 'content' => $content, 'createdate' => time(), 'status' => 0));
                echo 1;
            }
            if ($courses_id == 0 || $learn_id == 0 || $parent != ''){
            die;}
            

            $courses = $this->lib_mod->detail('courses', array('id' => $courses_id));
            $learn = $this->lib_mod->detail('learn', array('id' => $learn_id));

            
            $this->load->library("email");
            $this->email->from('cskh@lakita.vn', "lakita.vn");
            $emailTo = 'lakitavn@gmail.com, chuyenpn@lakita.vn, ngoccongtt1@gmail.com, huynhdaihai@gmail.com, trinhnv@bkindex.com, tund@bkindex.com';
            $this->email->to($emailTo);
            $this->email->subject('Có thảo luận mới ở trang lakita');
            $this->email->message('<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="font-family:Tahoma,Arial;background-color:#f5f5f5;padding:50px 0">
    <tbody>
        <tr>
            <td width="100%" valign="top" style="padding-top:20px">
                <table width="682" border="0" cellpadding="0" cellspacing="0" align="center" style="border:1px solid #dedede">
                    <tbody>
                        <tr>
                            <td align="center" bgcolor="#fff" style="padding-top:24px;color:#41a85f">
                                <div>
                                    <h1>Lakita.vn</h1>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" bgcolor="#fff" style="padding:20px 0;color:#fff">
                                <div style="background:url(https://ci5.googleusercontent.com/proxy/4m60zPgaWAWgWKNJAa1ktQJn85UQojWCUDCGZ83QUL3JPTIOOd8ZiF0eawcIHb0m5m0E3dboQL-yF_XHAz_H8HDFXWvLOrds-rUeZcWHNgLW3Q=s0-d-e1-ft#http://kyna.vn/media/images/layout_v2/cod_shipping_intro.png);min-height:30px;width:549px">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" bgcolor="#41a85f" style="padding:6px 0">
                                <table style="color:#fff;font-size:11.91px">
                                    <tbody><tr>
                                            <td align="center" style="padding:3px 20px;border-right:1px solid #fff">
                                                <a href="https://lakita.vn/nhom-khoa-hoc/nang-cao-nang-luc-van-phong.html" style="text-decoration:none;color:#fff" target="_blank">Nâng cao năng lực văn phòng</a>
                                            </td>
                                            <td align="center" style="padding:3px 20px;border-right:1px solid #fff">
                                                <a href="https://lakita.vn/nhom-khoa-hoc/cong-nghe-thong-tin.html" style="text-decoration:none;color:#fff" target="_blank">Công nghệ thông tin</a>
                                            </td>
                                            <td align="center" style="padding:3px 20px;border-right:1px solid #fff">
                                                <a href="https://lakita.vn/nhom-khoa-hoc/khoi-nghiep.html" style="text-decoration:none;color:#fff" target="_blank">Khởi nghiệp</a>
                                            </td>
                                            <td align="center" style="padding:3px 20px;border-right:1px solid #fff">
                                                <a href="https://lakita.vn/nhom-khoa-hoc/suc-khoe.html" style="text-decoration:none;color:#fff" target="_blank">Sức khỏe</a>
                                            </td>
                                            <td align="center" style="padding:3px 20px;border-right:1px solid #fff">
                                                <a href="https://lakita.vn/nhom-khoa-hoc/kinh-doanh.html" style="text-decoration:none;color:#fff" target="_blank">Kinh doanh</a>
                                            </td>
                                            <td align="center" style="padding:3px 20px">
                                                <a href="https://lakita.vn/nhom-khoa-hoc/phat-trien-ca-nhan.html" style="text-decoration:none;color:#fff" target="_blank">Phát triển cá nhân </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:42px 26px 50px 26px;line-height:1.3em;background-color:#fff;color:#666;font-size:13px;text-align:justify">
                                <div>
                                  Có bình luận mới ở khóa học ' . $courses[0]['name'] . ' tại bài' . $learn[0]['sort'] . '
<br> Nội dung: <br>' . $content . '
    Click vào đây để trả lời <a href="https://lakita.vn/tro-giang.html"> VÀO NGAY </a> <br>
                                    Thân mến,<br><br>
                                    Lakita.vn            </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" style="padding:20px 22px;border:1px solid #ddd;border-width:1px 0" bgcolor="#EAEAEA">
                                <table style="width:100%;font-size:13px;line-height:1.38;font-family:Tahoma" border="0">
                                    <tbody><tr>
                                            <td style="width:460px">
                                                <div style="color:#727272">
                                                    © 2016 - Bản quyền của Công Ty Cổ Phần Giáo Dục Lakita<br>
                                                    LIÊN HỆ:<br>
                                                    Hà Nội: Phòng 701 CT1 - Chung cư Skylight - Ngõ Hòa Bình 6 - 125D Minh Khai - Q. Hai Bà Trưng<br>
                                                    TP. HCM: Số 185-187 Hoàng Văn Thụ, P8, Q.Phú Nhuận, TP.HCM (Trường trung cấp Bách Khoa, Đối diện trung tâm White Place)
                                                </div>
                                            </td>
                                            <td>
                                                <div style="font-size:14px;text-align:right;margin-bottom:13px"><strong>Follow us</strong></div>
                                                <div style="text-align:right">
                                                    <a href="https://www.facebook.com/Lakitavn-872893369492994" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://email.kyna.vn/wf/click?upn%3DsTOece2eeLZO9tXRFrRSKCyyqgN0q-2BQjVAbvTHmhUUTx2v5FUvolR-2BNxB35NnCAS_Q8YsDWij4AtnHEQzQettwQFUQJNiNdMbKozie8JvA7WQ5mZSVxiIVuv5eDkcYMLar1xCGexIPcjhjTtQ24c4RmqCUTUlky-2Bncb6XmjSXY6kWfpjurX1MbXHmoyvC3fr-2BczYnTgrbANPW3IQHr0yto9L-2BlCMGeoWip6WxgPZLhoMQ6qlTYwDJ5lybanqGsHu9wTpubbEnN7Uh0r232ngQzw-3D-3D&amp;source=gmail&amp;ust=1469173733044000&amp;usg=AFQjCNFxzJmR10VQLsWpCjgDZ5P7jqT6dQ"><img src="https://ci6.googleusercontent.com/proxy/7bzJtLThBaeN4-_hQj0XaaBezT4P1klVQJciaTq8GwOfssN8K251vJWYvSEmXRS42EKxllXVwvjyTFagQ_TA-R0PMjpXIJD36vZ2mruDuJB7Kg=s0-d-e1-ft#http://kyna.vn/media/images/layout_v2/ico_facebook_26x26.png" class="CToWUd"></a>
                                                    <a href="#"><img src="https://ci5.googleusercontent.com/proxy/VErKdonx8SmXFsitviX1WUq7YzstTPYIBf5_ARRiaodUC7knozd3LvMZm7yaFYbUv1B4Ovf2u3_UTLWRGllQKGfGpdU6P7MjjNQM3KVUFxdv=s0-d-e1-ft#http://kyna.vn/media/images/layout_v2/ico_twitter_26x26.png" class="CToWUd"></a>
                                                    <a href="#"><img src="https://ci6.googleusercontent.com/proxy/TnGXUOlzTi6hs6Z3Ro-72KMG2r5ALqv-IiBr1ORzmjk6YrzBSlC-MOlhrcCxGAhfbA0A-65GmPVjpTS1HGyGVUj6anQL9b8Yk4h0VkHhshasJww=s0-d-e1-ft#http://kyna.vn/media/images/layout_v2/ico_pinterest_26x26.png" class="CToWUd"></a>
                                                    <a href="#" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://email.kyna.vn/wf/click?upn%3Dc8DO3Li0ri7wGG898iEFgz24cb-2FAWkeFlXW2geFTc38U9OQ8rb5Gc7V0cXwmpGXYMGNJiUYZxImDtu7ZN-2Buw4A-3D-3D_Q8YsDWij4AtnHEQzQettwQFUQJNiNdMbKozie8JvA7WQ5mZSVxiIVuv5eDkcYMLaxSZAHGFZ5b5bmmG-2F8s3sri5bYdXyxprJCPpva6AdNqMzCPdSmUexoZ40dp3tE0nWvUP9VJl5zh7sAuxC6z9-2B-2BKp57fJvqqg8uoLg5ba5QEO1tXO-2FRilB-2FJyTyaoaGUAXsss5hD-2FxR6alz1HLx2D1GA-3D-3D&amp;source=gmail&amp;ust=1469173733044000&amp;usg=AFQjCNHlAVMv6ydRRnl6QiXkY-0rB5XR_A"><img src="https://ci5.googleusercontent.com/proxy/iVP4D-YZCtHzU1D3_Zc8i01vi4h4Mg1Fm42gb8IvTUNMI0tORP9m1uWyGkUzojmeXf58-0BSJoBtnzqAlCSm9Jzhwf161sDrHktZNksmvaTrEC-A7w=s0-d-e1-ft#http://kyna.vn/media/images/layout_v2/ico_google-plus_26x26.png" class="CToWUd"></a>
                                                    <a href="#" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://email.kyna.vn/wf/click?upn%3DsTOece2eeLZO9tXRFrRSKPwtRiKgMMe6AqajJb5VuSkdoK4v-2Ft2Yil6qN3bKXwhf83dVFjfSVCGYv47aiWe-2BxA-3D-3D_Q8YsDWij4AtnHEQzQettwQFUQJNiNdMbKozie8JvA7WQ5mZSVxiIVuv5eDkcYMLaNV8ux9sutbDioYScRw31m1baCnScRqy9cvNcBa2PcDCUgxthg10G3wauhjuwq8MrwNprEf-2Fp10bF56YxWIP5G9csw16pvL3ZqMm1nTWSCDmHhpzDDEsW0Q1KFKvjPrfn4Xszfp3dVDcfI9x46649fA-3D-3D&amp;source=gmail&amp;ust=1469173733045000&amp;usg=AFQjCNHwdEh78kMIBBTIlV9e8SDdhmL9nQ"><img src="https://ci3.googleusercontent.com/proxy/qj6QoaTnI_fO_fXvppN_nFktwbwoYujCsTnxxKBEdJudbWORMQt823hP5S-HdgSf0c1QDbOxMr5OCO-Am1o2M9nngShNRomB5cCHJlT3E6Gt=s0-d-e1-ft#http://kyna.vn/media/images/layout_v2/ico_youtube_26x26.png" class="CToWUd"></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>');
            $this->email->send();
            $this->email->clear(TRUE);
        }
    }

    function reload_comment() {
        $learn_id = trim($this->input->post('learn_id'));
        $courses_id = trim($this->input->post('courses_id'));
        $data['comment'] = $this->lib_mod->load_all('comment', '', array('courses_id' => $courses_id, 'learn_id' => $learn_id, 'parent' => ''), '', '', array('createdate' => 'desc'));
        $this->load->view('course/load_cmt', $data);
    }

    function repair_comment() {
        $learn_id = htmlspecialchars(trim($this->input->post('learn_id')));
        $courses_id = htmlspecialchars(trim($this->input->post('courses_id')));
        $cmtid_repair = htmlspecialchars(trim($this->input->post('cmtid_repair')));
        $content = str_replace('<script>', '', (nl2br(trim($this->input->post('content')))));
        $user_id = $this->session->userdata('user_id');
        if (isset($learn_id) && isset($courses_id) && isset($content) && isset($user_id)) {
            $this->lib_mod->repair_cmt('comment', array('student_id' => $user_id, 'learn_id' => $learn_id, 'courses_id' => $courses_id, 'id' => $cmtid_repair), array('content' => $content));
            echo 1;
        }
        if ($courses_id == 0 || $learn_id == 0 || $cmtid_repair != '')
            die;
    }

    function del_comment() {
        $cmtid = $this->input->get('cmtid');
        $duong_dan = $this->input->get('url');
        $this->lib_mod->del_cmt($cmtid);
        header('Location:' . $duong_dan);
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
            $learn_first = $this->lib_mod->load_all('learn', '', array("courses_id" => $courseID, 'status' => 1), '', '', array("sort" => 'asc'));
            return isset($learn_first[0]) ? (base_url() . $learn_first[0]['slug'] . '-4' . $learn_first[0]['id'] . '.html') : '';
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

}
