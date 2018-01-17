<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Studying extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    function load_data() {
        $data['setting'] = $this->lib_mod->detail('setting', array('id' => 1));
        return $data;
    }

    function index() {
        $user_id = $this->session->userdata('user_id');
        if (!isset($user_id)) {
            redirect(base_url());
        } else {
            $this->load->library('pagination');
            $per_page = 15;
            $total = $this->lib_mod->count('exercise', array('student_id' => $user_id));



            $data = $this->data;
            $data['student'] = $this->lib_mod->detail('student', array('id' => $user_id));
            $courses_id = $this->lib_mod->detail('student_courses', array('student_id' => $user_id, 'status' => 1));
            if (count($courses_id)) {
                foreach ($courses_id as $key => $value) {
                    $mycourses[$key] = $this->lib_mod->load_all('courses', 'id, name', array('id' => $value['courses_id']), '', '', '', '')[0];
                }
            }
            $data['exes'] = $this->lib_mod->load_all('exercise', '', array('student_id' => $user_id), $per_page, $this->uri->segment(4), array('time' => 'desc'), '');
            $base_url = site_url('student2/studying/index/');
            $config['base_url'] = $base_url;
            $config['per_page'] = $per_page;
            $config['total_rows'] = $total;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['paging'] = $this->pagination->create_links();
            $data['total'] = $total;

            $data['courses'] = $mycourses;
            $data['title'] = 'Tiến độ học tập - lakita.vn';
            $data['bai'] = $this->lib_mod->load_all('learn', 'id, name', '', '', '', '', '');
            $data['bai_chua'] = $this->lib_mod->load_all('exercise_repair', '', '', '', '', '', '');
            $data['content'] = 'student/studying';
            $this->load->view('template', $data);
        }
    }

    function action_upload() {
        $user_id = $this->session->userdata('user_id');
        //  if ($this->input->post("ok") == 'Upload') {
        //$config['upload_path'] = '/home/lakita.com.vn/public_html/data/source/student/upload_exercise';
        //$dir = '/home/lakita.com.vn/public_html/data/source/student/upload_exercise/'. $user_id;
        $dir = '/home/lakita.com.vn/public_html/data/source/student/upload_exercise/' . $user_id;

        //kiem tra folder co to tai khong
        if (!file_exists($dir) && !is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $config['upload_path'] = $dir;
        $config['allowed_types'] = '*';
        $config['max_size'] = '90000';
        $this->load->library("upload", $config);
        if ($this->upload->do_upload("excel")) {
            $check = $this->upload->data();
            $data['file_name'] = $check['file_name'];
            $data['full_path'] = $user_id . '/' . $check['file_name'];
            $data['file_size'] = $check['file_size'];
            $data['time'] = time();
            $data['course_id'] = $courses_id = $this->input->post('course_id_input');
            $data['learn_id'] = $learn_id = $this->input->post('learn_id_input');
            $data['note'] = $this->input->post('note');
            $data['student_id'] = $user_id;
            $this->lib_mod->insert('exercise', $data);

            //từ chỗ này là up xong bt nó gửi email liền nà :3
            $courses = $this->lib_mod->detail('courses', array('id' => $courses_id));
            $learn = $this->lib_mod->detail('learn', array('id' => $learn_id));

            //mẫu gửi mail khi có học viên nộp bài

            $this->load->library("email");
            $this->email->from('cskh@lakita.vn', "lakita.vn");
            $emailTo = 'lakitavn@gmail.com, chuyenpn@lakita.vn, ngoccongtt1@gmail.com, huynhdaihai@gmail.com, hoanhung1991@gmail.com, tund@bkindex.com';

            $this->email->to($emailTo);
            $this->email->subject('Có học viên đã đăng bài tập mới ở trang lakita');
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
                                  Có bài tập học viên mới đăng ở khóa học <strong>' . $courses[0]['name'] . '</strong> tại bài <strong>' . $learn[0]['sort'] . '</strong>

    Click vào đây để chữa bài <a href="http://quantri.lakita.vn/exercise"> VÀO NGAY </a> <br>
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
            echo 'Tải bài tập lên thành công. Trợ giảng sẽ chấm bài và nhận xét bài làm của bạn tại <a href="https://lakita.vn/bai-tap-luyen-tap.html"> đây! </a>';
            //     echo "<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
            die;
        } else {
            echo $this->upload->display_errors();
            //   echo "<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
            die;
        }
//        } else {
//            echo 'Có lõi xảy ra, vui lòng liên hệ ban quản trị!';
//       //     echo "<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
//            die;
//        }
    }

    function load_learn() {
        $course_id = $this->input->post('course_id_input');
        if ($course_id == 0)
            echo '<option value="0"> Chọn bài học </option>';
        else {
            $learn = $this->lib_mod->load_all('learn', 'id, name', array('courses_id' => $course_id, 'status' => 1), '', '', array('sort' => 'asc'), '');
            $str = '';
            foreach ($learn as $key => $value) {
                $str .= '<option value="' . $value['id'] . '"> Bài ' . ($key + 1) . ' - ' . $value['name'] . '</option>';
            }
            echo $str;
        }
    }

    function load_learn_search() {
        $course_id = $this->input->post('course_id_input1');
        if ($course_id == 0)
            echo '<option value="0"> Chọn bài học </option>';
        else {
            $learn = $this->lib_mod->load_all('learn', 'id, name', array('courses_id' => $course_id, 'status' => 1), '', '', array('sort' => 'asc'), '');
            $str = '<option value="0"> Tất cả các bài học </option>';
            foreach ($learn as $key => $value) {
                $str .= '<option value="' . $value['id'] . '" ' . ' <?php if( isset($_GET[' . '"learn_id_input1"' . ']) && $_GET[' . '"learn_id_input1"' . '] ==$value[' . "id" . '] ){ echo ' . '"selected=' . '"selected"' . '"' . ';} ?>  ' . ' Bài ' . ($key + 1) . ' - ' . $value['name'] . '</option>';
            }
            echo $str;
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
        $file = base64_decode($filename);
        $file_path = '/home/lakita.com.vn/public_html/data/source/student/upload_exercise/' . $file;
        if (!is_file($file_path)) {
            echo '<script>alert("Không tìm thấy file!"); </script>';
            echo "<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
        }
        $this->load->helper('download');
        force_download($file_path, NULL);
    }

    function download2($filename) {
        if (!isset($filename) && empty($filename)) {
            redirect(site_url());
        }
        $user_id = $this->session->userdata('user_id');
        if (!isset($user_id)) {
            die('Xin lỗi, bạn không có quyền truy cập vào khu vực này!');
        }
        $file = base64_decode($filename);
        $file_path = '/home/lakita.com.vn/public_html/data/source/student/repair_exercise/' . $file;
        if (!is_file($file_path)) {
            echo '<script>alert("Không tìm thấy file!"); </script>';
            echo "<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
        }
        $this->load->helper('download');
        force_download($file_path, NULL);
    }

    function search($course_id_input = '0', $learn_id_input = '0') {


        $user_id = $this->session->userdata('user_id');
        if ($this->input->get('course_id_input1')) {
            $learn_id_input = $this->input->get('learn_id_input1');
            $course_id_input = $this->input->get('course_id_input1');
        }

        if ($course_id_input == '0' && $learn_id_input == '0') {
            redirect(base_url('student2/studying/index'));
        }

        if ($learn_id_input == '0') {
            $search = array('student_id' => $user_id, 'course_id' => $course_id_input);
        } else {
            $search = array('student_id' => $user_id, 'course_id' => $course_id_input, 'learn_id' => $learn_id_input);
        }

        $this->load->library('pagination');
        $per_page = 15;
        $total = $this->lib_mod->count('exercise', $search);



        $data = $this->data;
        $data['student'] = $this->lib_mod->detail('student', array('id' => $user_id));
        $courses_id = $this->lib_mod->detail('student_courses', array('student_id' => $user_id, 'status' => 1));

        if (count($courses_id)) {
            foreach ($courses_id as $key => $value) {
                $mycourses[$key] = $this->lib_mod->load_all('courses', 'id, name', array('id' => $value['courses_id']), '', '', '', '')[0];
            }
        }



        $data['exes'] = $this->lib_mod->load_all('exercise', '', $search, $per_page, $this->uri->segment(6), array('time' => 'desc'), '');
        $base_url = site_url('student2/studying/search/' . $course_id_input . '/' . $learn_id_input);
        $config['base_url'] = $base_url;
        $config['per_page'] = $per_page;
        $config['total_rows'] = $total;
        $config['uri_segment'] = 6;
        $this->pagination->initialize($config);
        $data['paging'] = $this->pagination->create_links();
        $data['total'] = $total;

        $data['courses'] = $mycourses;
        $data['title'] = 'Tiến độ học tập - lakita.vn';
        $data['bai'] = $this->lib_mod->load_all('learn', 'id, name', '', '', '', '', '');
        $data['bai_chua'] = $this->lib_mod->load_all('exercise_repair', '', '', '', '', '', '');
        $data['content'] = 'student/studying';
        $this->load->view('template', $data);
    }

}
