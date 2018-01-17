<?php

class Teacher extends MY_Controller {

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

    public function index() {
        $data = $this->data;
        $data['title'] = 'Trở thành giảng viên - lakita.vn';
        $user_id = $this->session->userdata('user_id');
        if (isset($user_id)) {
            $data['student'] = $this->lib_mod->load_all('student', '', array('id' => $user_id), '', '', '');
        }
        $data['content'] = 'teacher/index';
        $this->load->view('template', $data);
    }

    public function action_rgt() {
        $send_mail = $this->session->tempdata('send_mail');
        if (isset($send_mail)) {
            die;
            exit;
        } else {
            $this->session->set_tempdata('send_mail', '1', 3600);
        }

        $post = $this->input->post();
        if ($post['name'] != '' && isset($post['lakita-1']) && $post['lakita-1'] == 'lakita-v') {
            $post['time'] = time();

            $this->load->library("email");
            $this->email->from('cskh@lakita.vn', "lakita.vn");
            //  $this->email->reply_to('mrtrinh89@gmail.com', "lakita.vn");
            $emailTo = 'lakitavn@gmail.com, chuyenpn@lakita.vn, ngoccongtt1@gmail.com, linhnd@lakita.vn, trinhnv@bkindex.com, tund@bkindex.com';
            $this->email->to($emailTo);
            $this->email->subject('Có giảng viên đăng ký hợp tác ở trang lakita');
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
                                  Hiện có 1 giảng viên đăng ký hợp tác giảng dạy cùng lakita, thông tin như sau: 
                                  <pre>
                                    ' . json_encode($post, JSON_UNESCAPED_UNICODE) . '                            
                                  </pre>

                                    <h4> IP: ' . $this->input->ip_address() . '</h4>

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
        echo '<script> alert("Đơn đăng ký của giảng viên đã được xử lý thành công, nhân viên CSKH sẽ liên hệ anh/chị trong thời gian sớm nhất. Trân trọng."); '
        . 'location.assign("' . base_url() . '"); </script>';
    }

}
