<?php

class Guest extends MY_Controller {

    function cod() {
        $this->load->view('guest/cod');
    }

    function login_fb() {
        header('Location: https://lakita.vn/plugin/01.php');
    }

    // đoạn này check email có tồn tại thật hay không
    var $timeout = 10;

    function _is_valid_email($email = "") {
        return preg_match('/^[.\w-]+@([\w-]+\.)+[a-zA-Z]{2,6}$/', $email);
    }

    function execute($email = "") {
        if (!$this->_is_valid_email($email)) {
            return false;
        }

        $host = substr(strstr($email, '@'), 1);


        $host .= ".";

        if (getmxrr($host, $mxhosts[0], $mxhosts[1]) == true) {
            array_multisort($mxhosts[1], $mxhosts[0]);
        } else {
            $mxhosts[0] = $host;
            $mxhosts[1] = 10;
        }
        //if (DEBUG_OK) { print_r ($mxhosts); }

        $port = 25;
        $localhost = $_SERVER['HTTP_HOST'];
        $sender = 'info@' . $localhost;

        $result = false;
        $id = 0;
        while (!$result && $id < count($mxhosts[0])) {
            if (function_exists("fsockopen")) {
                //	if (DEBUG_OK) { print_r ($id . " " . $mxhosts[0][$id]); }
                if ($connection = fsockopen($mxhosts[0][$id], $port, $errno, $error, $this->timeout)) {
                    fputs($connection, "HELO $localhost\r\n"); // 250
                    $data = fgets($connection, 1024);
                    $response = substr($data, 0, 1);
                    //if (DEBUG_OK) { print_r ($data); }

                    if ($response == '2') { // 200, 250 etc.
                        fputs($connection, "MAIL FROM:<$sender>\r\n");
                        $data = fgets($connection, 1024);
                        $response = substr($data, 0, 1);
                        //if (DEBUG_OK) { print_r ($data); }

                        if ($response == '2') { // 200, 250 etc.
                            fputs($connection, "RCPT TO:<$email>\r\n");
                            $data = fgets($connection, 1024);
                            $response = substr($data, 0, 1);
                            //if (DEBUG_OK) { print_r ($data); }

                            if ($response == '2') { // 200, 250 etc.
                                fputs($connection, "data\r\n");
                                $data = fgets($connection, 1024);
                                $response = substr($data, 0, 1);
                                //if (DEBUG_OK) { print_r ($data); }

                                if ($response == '2') { // 200, 250 etc.
                                    $result = true;
                                }
                            }
                        }
                    }

                    fputs($connection, "QUIT\r\n");
                    fclose($connection);
                    if ($result) {
                        return true;
                    }
                }
            } else {
                break;
            }
            $id++;
        }
        return false;
    }

    // hết kiểm tra

    function action_login() {
      //  $this->load->helper('form');
        $email = trim($this->input->post('login_email'));
        $login_redirect = trim($this->input->post('login_redirect'));
        $password = md5(md5($this->input->post('login_password')));

        //ghi nhớ khi người dùng mua khóa học đăng nhập
        $redirect_type = $this->input->post('redirect_type');
        if (isset($redirect_type))
            $this->session->set_tempdata('redirect_type', $redirect_type, 300);
        $error = 1;
        if (!empty($email) && !empty($password)) {
            $member = $this->lib_mod->detail('student', array('email' => $email, 'password' => $password));
            if (count($member)) {

                $this->_check_exist_login($member[0]['id']);

                $this->session->set_tempdata('UserIDTemp', $member[0]['id'], 60);
                $this->session->set_userdata('id_fb', $member[0]['id_fb']);
                $this->session->set_userdata('user_id', $member[0]['id']);
                $this->session->set_userdata('user_name', $member[0]['name']);
                $this->session->set_userdata('login_redirect', $login_redirect);
                $student = $this->lib_mod->load_all('student', '', array('id' => $this->session->userdata('user_id')), '', '', '');
                if ($this->input->post('is_remember') == '1') {
                    $this->load->helper('cookie');
                    $randStr = sha1(md5($student[0]['id_fb'] . $student[0]['password'] . $this->session->userdata('user_id') . $this->session->userdata('user_name') . '6f12d7e322d7e0424952150ab~!@#`>?:"<'));
                    $year = 92536000;
                    set_cookie('357a466f0c8940e87378a641479e9ff8d9770318', $randStr, $year);
                    $this->lib_mod->update('student', array('email' => $email), array('temp_pass' => $randStr));
                }

                $tutor = array('2626', '5844', '4909', '3073', '7252', '7346', '7949', '7950', '7951');
                if (in_array($member[0]['id'], $tutor)) {
                    echo 'tutor';
                } else {
                    echo 1;
                }
                die;
            } else {
                echo 'Địa chỉ Email hoặc Mật khẩu không đúng ';
                die;
            }
        } else {
            echo 'Bạn phải nhập địa chỉ Email và Mật khẩu';
            die;
        }
    }

    function action_register() {
        $username = trim($this->input->post('signup_name'));
        $email = trim($this->input->post('signup_email'));
        $phone = trim($this->input->post('signup_phone'));
        $password = trim($this->input->post('signup_password'));
        $repassword = trim($this->input->post('signup_repassword'));

        $success = 1;
        $error = 1;

        if ($username == '' || $email == '' || $phone == '' || $password == '' || $repassword == '') {
            $error = 'Vui lòng điền đầy đủ thông tin vào các trường!';
            $success = 0;
        }
        if (strlen($password) < 6 || strlen($repassword) < 6) {
            $error = 'Mật khẩu phải trên 6 kí tự';
            $success = 0;
        }
        if (!preg_match("/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/i", $email)) {
            $error = 'Email không hợp lệ!';
            $success = 0;
        }
        if (!preg_match("/^[0-9]{10,11}$/i", $phone)) {
            $error = 'Số điện thoại không hợp lệ!';
            $success = 0;
        }
        if ($password != $repassword) {
            $error = 'Mật khẩu xác nhận chưa chính xác';
            $success = 0;
        }

        if (!$this->execute($email)) {
            $error = 'Email không tồn tại, mời bạn nhập email chính xác để tư vấn tuyển sinh có thể liên hệ !!';
            $success = 0;
        }

        $user_id = $this->session->userdata('user_id');
        if (!isset($user_id) || empty($user_id)) {
            $acc_exist = $this->lib_mod->count('student', array('email' => $email));
            if ($acc_exist) {
                $error = 'Email của bạn đã được đăng ký, vui lòng chọn đăng nhập.';
                $success = 0;
            }
        }

        $student = array(
            'name' => htmlspecialchars($username),
            'email' => htmlspecialchars($email),
            'phone' => $phone,
            'password' => md5(md5($password)),
            'createdate' => time(),
            'balance' => 0,
            'contact_cc_call' => 1
        );

        if ($success == 1) {
            $student_id = $this->lib_mod->insert_return_id('student', $student, 'id');
//            $this->lib_mod->insert('student_courses', array('student_id' => $student_id, 'courses_id' => 37, 'create_date' => time(), 'status' => 1, 'trial_learn' => 1));
            $this->session->set_userdata('user_id', $student_id);
            $this->session->set_userdata('user_name', $student['name']);

            $this->_call_to_mol(0, $student_id, $username, $email, $phone);
        }

        echo $error;
    }

    function forgetPassword() {
        $email = $this->input->post('forget_email');
        if ($email != '') {
            $student = $this->lib_mod->load_all('student', '', array('email' => $email), '', '', '');
            if (count($student) == 0) {
                echo '0';
                die;
            } else {
                $randstr = substr(sha1(rand() . time()), 0, 8);
                $this->lib_mod->update('student', array('email' => $email), array('forgetPassword' => $randstr));

                $this->load->library("email");
                $this->email->from('cskh@lakita.vn', "lakita.vn");
                $emailTo = $email;
                $this->session->set_tempdata('emailed', $email, 1800);
                $this->email->to($emailTo);
                $this->email->subject('Quên mật khẩu');
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
                                    <b>' . $student[0]['name'] . '</b> thân mến, <br><br>
                                    Bạn đã yêu cầu lấy lại mật khẩu. Mã xác nhận của bạn là <span style="font-size:18px;font-weight:bold"> ' . $randstr . ' </span>
                                    <p>Nếu bạn cần hỗ trợ, hãy liên hệ với Lakita.vn qua email <a href="#" target="_blank">cskh@lakita.vn</a> hoặc số điện thoại hỗ trợ khách hàng: 1900 6361 95.</p><br>

                                    <p>Chúc bạn một ngày thật nhiệt huyết!</p><br>

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
                $check = $this->email->send();
                $this->email->clear(TRUE);
                echo '1';
                die;
            }
        }
    }

    function sendCodeForget() {
        $code_forget = $this->input->post('code_forget');
        $student = $this->lib_mod->load_all('student', '', array('forgetPassword' => $code_forget), '', '', '');
        if (count($student) > 0) {
            $password = $this->input->post('password_forget');
            $re_password = $this->input->post('re_password_forget');
            if ($password == $re_password && strlen($re_password) >= 6) {
                $data['password'] = md5(md5($password));
                $data['forgetPassword'] = '';
                $this->lib_mod->update('student', array("forgetPassword" => $code_forget), $data);
                echo '1_Tạo mật khẩu mới thành công!';
            } else {
                echo '0_Mật khẩu xác nhận không đúng!';
            }
        } else {
            echo '0_Mã xác thực không đúng. Vui lòng kiểm tra lại!';
            die;
        }
    }

    /*
     * hàm đăng nhập qua google+ (không phải fb) ---- không được xóa
     */

    function login_via_fb() {
        $protect = $this->input->post('protect');
        if ($protect != 'WVmYEKbFEj6WVmYEKbFEj@%%#^%$##@#WVmYEKbFEj67R5HwEp7o67R5HwEp7o7R5HwEp7o') {
            die;
            exit;
        }
        $email = $this->input->post('email');
        $name = $this->input->post('name');
        $id = $this->input->post('id');

        $student = $this->lib_mod->detail('student', array('email' => $email));
        if (count($student)) {
            if ($student[0]['phone'] == '') {
                $this->session->set_tempdata('temp_type_login', 'old', 1800);
                $this->session->set_tempdata('temp_user_id', $student[0]['id'], 1800);
                $this->session->set_tempdata('temp_user_name', $student[0]['name'], 1800);
                $this->session->set_tempdata('temp_id_fb', $student[0]['id_fb'], 1800);
                echo 'fbrequire';
            } else {
                $this->_check_exist_login($student[0]['id'], false);
                $this->session->set_userdata('user_id', $student[0]['id']);
                $this->session->set_userdata('user_name', $student[0]['name']);
                $this->session->set_userdata('id_fb', $student[0]['id_fb']);
                echo 'success';
            }
        } else {
            $this->session->set_tempdata('temp_name', $name, 1800);
            $this->session->set_tempdata('temp_id_fb', $id, 1800);
            $this->session->set_tempdata('temp_email', $email, 1800);
            $this->session->set_tempdata('temp_type_login', 'new', 1800);
            echo 'fbrequire';
        }
    }

    function login_via_fb2() {
        $this->load->model('facebook_model');
        $info = $this->facebook_model->getUserInfo();
        if ($info['email'] == '') {
            echo 'Bạn cần cập nhập địa chỉ email của mình vào facbook! Chi tiết liên hệ 1900 6361 95';
            die;
        }
        $email = $info['email'];
        $name = $info['name'];
        $id = $info['id'];

        $student = $this->lib_mod->detail('student', array('email' => $email));
        if (count($student)) {
            if ($id != $student[0]['id_fb']) {
                $this->lib_mod->update('student', array('email' => $email), array('id_fb' => $id));
            }

            if ($student[0]['phone'] == '') {
                $this->session->set_tempdata('temp_type_login', 'old', 1800);
                $this->session->set_tempdata('temp_user_id', $student[0]['id'], 1800);
                $this->session->set_tempdata('temp_user_name', $student[0]['name'], 1800);
                $this->session->set_tempdata('temp_id_fb', $student[0]['id_fb'], 1800);
                redirect('demo' . base_url() . 'guest/fbrequire');
            } else {

                $this->_check_exist_login($student[0]['id'], false);

                $this->session->set_userdata('user_id', $student[0]['id']);
                $this->session->set_userdata('user_name', $student[0]['name']);
                $this->session->set_userdata('id_fb', $student[0]['id_fb']);
                redirect(base_url() . 'khoa-hoc-cua-toi.html');
            }
        } else {
            $this->session->set_tempdata('temp_name', $name, 1800);
            $this->session->set_tempdata('temp_id_fb', $id, 1800);
            $this->session->set_tempdata('temp_email', $email, 1800);
            $this->session->set_tempdata('temp_type_login', 'new', 1800);
            redirect(base_url() . 'guest/fbrequire');
        }
    }

    function fbrequire() {
        $this->load->view('guest/fbrequire');
    }

    function login_via_fb_new() {
        $check_permission = $this->session->tempdata('phone_number');
        if (!isset($check_permission)) {
            redirect(base_url());
            die;
        }
        $student = array(
            'id_fb' => $this->session->tempdata('temp_id_fb'),
            'name' => $this->session->tempdata('temp_name'),
            'createdate' => time(),
            'email' => $this->session->tempdata('temp_email'),
            'phone' => $this->session->tempdata('phone_number'),
            'balance' => 0,
            'contact_cc_call' => 1
        );
        $student_id = $this->lib_mod->insert_return_id('student', $student, 'id');
//        $this->lib_mod->insert('student_courses', array('student_id' => $student_id, 'courses_id' => 37, 'create_date' => time(), 'status' => 1, 'trial_learn' => 1));
        // $this->lib_mod->insert('student_courses', array('student_id' => $student_id, 'courses_id' => 39, 'create_date' => time(), 'status' => 1));
        $this->session->set_userdata('user_id', $student_id);
        $this->session->set_userdata('user_name', $this->session->tempdata('temp_name'));
        $this->session->set_userdata('id_fb', $this->session->tempdata('temp_id_fb'));

        $this->_call_to_mol(0, $student_id, $this->session->tempdata('temp_name'), $this->session->tempdata('temp_email'), $this->session->tempdata('phone_number'));

        $this->session->unset_tempdata('temp_name');
        $this->session->unset_tempdata('temp_id_fb');
        $this->session->unset_tempdata('temp_email');
        $this->session->unset_tempdata('temp_type_login');
        redirect(base_url() . 'khoa-hoc-cua-toi.html');
    }

    function login_via_fb_old() {
        $check_permission = $this->session->tempdata('phone_number');
        if (!isset($check_permission)) {
            redirect(base_url());
            die;
        }
        $user_id = $this->session->tempdata('temp_user_id');
        $user_name = $this->session->tempdata('temp_user_name');
        $student = array(
            'phone' => $this->session->tempdata('phone_number')
        );
        $this->lib_mod->update('student', array('id' => $user_id), $student);

        $this->_check_exist_login($user_id, false);

        $this->session->set_userdata('user_id', $user_id);
        $this->session->set_userdata('user_name', $user_name);
        $this->session->set_userdata('id_fb', $this->session->tempdata('temp_id_fb'));
        $this->session->unset_tempdata('temp_user_id');
        $this->session->unset_tempdata('temp_id_fb');
        $this->session->unset_tempdata('temp_user_name');
        $this->session->unset_tempdata('temp_type_login');
        redirect(base_url() . 'khoa-hoc-cua-toi.html');
    }

    private function _call_to_mol($is_call, $id, $name, $email, $phone) {
        /*         * ********************************* bắn contact sang MOL ************************************** */
        if (!$is_call && file_get_contents('http://mol.lakita.vn/duplicate_phone_lakita/index/' . $phone) == 0) {
            $student_course = $this->lib_mod->load_all('student_courses', 'courses_id', array('student_id' => $id, 'courses_id !=' => '39'), '', '', '');
            if (!count($student_course)) {
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
                $uri = "contact_collection_api/add_contact_lakita";
                $param1 = array(
                    'contact_cc' => 1,
                    'name' => $name,
                    'phone' => $phone,
                    'email' => $email,
                    'id_camp_landingpage' => '767'
                );
                $restClient->post($uri, $param1);
                $this->lib_mod->update('student', array('id' => $id), array('contact_cc_call' => 1));
            }
        }
        /*         * ********************************* bắn contact sang MOL (hết) ************************************** */
    }

}
