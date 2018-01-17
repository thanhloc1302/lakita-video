<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    function login_page() {
        $user_id = $this->session->userdata('user_id');
        if (isset($user_id)) {
            $this->_check_exist_login($user_id, false);
            redirect(base_url() . 'khoa-hoc/xem-tat-ca.html');
        }
        $data = $this->data;
        $data['content'] = 'template/login_page';
        $data['title'] = 'Đăng nhập';
        $this->load->view('template', $data);
    }

    function index($page = '') {
        //==========================================================TRANG CHỦ =======================================================
        if (empty($page)) {
            
        } else {
            $name = str_replace('.html', '', $page);
            $flag = explode('-', $name);
            $flag = end($flag);
            if (empty($flag)) {
                redirect(site_url());
            }
            $sub_flag = intval(substr($flag, 0, 1));
            $id = intval(substr($flag, 1));

            //================================= CHI TIẾT KHÓA HỌC ============================================
            if ($sub_flag == 2) {
                
            }
            //============================MUA KHÓA HỌC=================================================
            else if ($sub_flag == 3) {
                
            }

            //==============================================TRANG HỌC ============================================
            else if ($sub_flag == 4) {
                $user_id = $this->session->userdata('user_id');
                if (!isset($user_id)) {
                    $this->session->set_userdata('last_page', current_url());
                    redirect('https://lakita.vn/userid');
                }
               
                //thông tin bài học hiện tại
                $curr_learn = $this->lib_mod->detail('learn', array('id' => $id));
                if (count($curr_learn) == 0) {
                    echo '<script> alert("Video không tồn tại");</script>';
                    die;
                    exit;
                }

                // $course_slug = $this->lib_mod->load_all('courses', 'slug', array("id" => $curr_learn[0]['courses_id']), '1', '', array("sort" => 'asc'));
                //kiểm tra xem học viên đã mua khóa học chưa
                /*
                 * quà tặng khóa yoga
                 */
                if ($curr_learn[0]['courses_id'] == 83 && time() < 1516501814) {
                    
                } else {
                    $student_courses = $this->lib_mod->detail('student_courses', array('courses_id' => $curr_learn[0]['courses_id'], 'student_id' => $user_id, 'status' => 1));
                    if (!isset($student_courses[0])) {
                        echo '<script> alert("Xin lỗi, bạn chưa mua khóa học này!");</script>';
                        die;
                        exit;
                    }
                }

                $trial_learn_view = $this->session->tempdata('is_trial_view');
                if (isset($trial_learn_view)) {
                    $this->session->unset_tempdata('is_trial_view');
                }

                /* =====================================HỌC THỬ===================================== */
//                if ($student_courses[0]['cod'] != '') {
//                    $cod = $this->lib_mod->detail('cod_course', array('cod' => $student_courses[0]['cod']));
//                    if (count($cod) && $cod[0]['trial_learn'] == 1) {
//                        if ((time() - $cod[0]['time']) > (7 * 3600 * 24)) {
//                            echo '<script> alert("Bạn đã hết quyền học thử!"); </script>';
//                            echo "<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
//                            die;
//                        } else {
//                            if ($curr_learn[0]['trial_learn'] == 0) {
//                                echo '<script>alert("Bạn không có quyền học thử bài này"); </script>';
//                                echo "<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
//                                die;
//                            }
//                        }
//                    }
//                }
                /* =====================================HỌC THỬ (HẾT)===================================== */
                $data = $this->data;
                $course = $this->lib_mod->detail('courses', array('id' => $curr_learn[0]['courses_id']));
                //học thử contact cc
                if ($student_courses[0]['trial_learn'] == 1 && !in_array($id, [269, 270, 271, 272, 273, 274, 275])) {
                    $this->session->set_tempdata('curr_course_id', $course[0]['id'], 3600 * 12);
                    echo '<script> alert("Xin lỗi, bạn cần mua khóa học để học được bài này!"); location.href="https://lakita.vn/mua-khoa-hoc.html"; </script>';
                    die;
                    exit;
                }
                if ($student_courses[0]['trial_learn'] == 1)
                    $data['trial_learn'] = 1;
                else
                    $data['trial_learn'] = 0;

                //tên khóa học
                $data['curr_course'] = $course;
                $data['course_name'] = $course[0]['name'];
                $data['course_id'] = $course[0]['id'];

                //tổng số bài học
                $data['total_video'] = count($this->lib_mod->detail('learn', array('courses_id' => $course[0]['id'], 'status' => 1)));

                //thông tin giảng viên
                $firs_courses = array_filter(explode(',', $course[0]['speaker_id']));
                $firs_courses = str_replace('-', '', $firs_courses[0]);
                $data['speaker'] = $this->lib_mod->detail('speaker', array('id' => $firs_courses));

                //tổng số bài đã học
                $data['count_all_learn'] = count($this->lib_mod->detail('student_learn', array('student_id' => $user_id, 'courseID' => $course[0]['id'])));

                $data['learn_note'] = $this->lib_mod->detail('learn_note', array('student_id' => $user_id, 'learn_id' => $id));
                $data['comment'] = $this->lib_mod->load_all('comment', '', array('courses_id' => $curr_learn[0]['courses_id'], 'learn_id' => $id, 'parent' => ''), 4, '', array('createdate' => 'desc'));
                $data['page'] = 1;
                $total_cmt = count($this->lib_mod->load_all('comment', '', array('courses_id' => $curr_learn[0]['courses_id'], 'learn_id' => $id, 'parent' => ''), '', '', array('createdate' => 'desc')));
                $data['pages'] = ceil($total_cmt / 4);
                //danh sách bài học
                $data['chapter'] = $this->lib_mod->load_all('chapter', '', array("courses_id" => $curr_learn[0]['courses_id'], 'status' => 1), '', '', array("sort" => 'asc'));
                foreach ($data['chapter'] as $key => $value) {
                    $data['all_learn'][$key] = $this->get_course_learn($value['id'], $user_id);
                }
                $data['curr_learn'] = $curr_learn;

                $data['curr_id'] = $id;
                if (!empty($curr_learn[0]['image_share'])) {
                    $data['image'] = 'https://lakita.vn/' . $curr_learn[0]['image_share'];
                } else {
                    $data['image'] = 'https://lakita.vn/' . $curr_learn[0]['thumbnail'];
                }
                $data['title'] = $curr_learn[0]['name'] . ' - lakita.vn';
                $data['meta_title'] = $curr_learn[0]['title'];
                $data['meta_description'] = $curr_learn[0]['description'];
                //$data['meta_keyword'] = $curr_learn[0]['keyword'];
                $data['learn'] = 1;

                $data['learn_slug'] = base_url() . $curr_learn[0]['slug'] . '-4' . $curr_learn[0]['id'] . '.html';

                //cập nhật bài đã học
                $learned = $this->lib_mod->count('student_learn', array('student_id' => $user_id, 'learn_id' => $curr_learn[0]['id']));
                if ($learned == 0) {
                    $this->lib_mod->insert('student_learn', array('student_id' => $user_id, 'learn_id' => $curr_learn[0]['id'], 'status' => 0, 'courseID' => $course[0]['id'], 'time' => time()));
                }
                $data['love_course'] = $this->lib_mod->detail('love', array('user_id' => $user_id, 'course_id' => $course[0]['id']));
                $data['student'] = $this->lib_mod->detail('student', array('id' => $user_id));
                $data['content'] = 'student/learn';

                $data['is_learing'] = 1;
                $this->load->view('template', $data);
            } elseif ($sub_flag == 5) {

                //thông tin bài học hiện tại
                $curr_learn = $this->lib_mod->detail('learn', array('id' => $id));
                $course = $this->lib_mod->detail('courses', array('id' => $curr_learn[0]['courses_id']));
                if (count($curr_learn) == 0) {
                    echo '<script> alert("Video không tồn tại");</script>';
                    die;
                    exit;
                }
                if ($curr_learn[0]['trial_learn'] == 0) {
                    $this->session->set_tempdata('curr_course_id', $course[0]['id'], 3600 * 12);
                    echo '<script> alert("Bạn không có quyền học thử bài này! Vui lòng mua khóa học để học tiếp!"); location.href="https://lakita.vn/mua-khoa-hoc.html"; </script>';
                    die;
                    exit;
                }

                $data = $this->data;

                //tên khóa học
                $data['course_name'] = $course[0]['name'];
                $data['course_id'] = $course[0]['id'];
                $data['curr_course'] = $course;
                $this->session->set_tempdata('curr_course_id', $course[0]['id'], 3600 * 12);
                //tổng số bài học
                $data['total_video'] = count($this->lib_mod->detail('learn', array('courses_id' => $course[0]['id'], 'status' => 1)));

                //thông tin giảng viên
                $firs_courses = array_filter(explode(',', $course[0]['speaker_id']));
                $firs_courses = str_replace('-', '', $firs_courses[0]);
                $data['speaker'] = $this->lib_mod->detail('speaker', array('id' => $firs_courses));

                //danh sách bài học
                $data['chapter'] = $this->lib_mod->load_all('chapter', '', array("courses_id" => $curr_learn[0]['courses_id'], 'status' => 1), '', '', array("sort" => 'asc'));
                foreach ($data['chapter'] as $key => $value) {
                    $data['all_learn'][$key] = $this->get_course_learn($value['id'], 3916);
                }
                $data['curr_learn'] = $curr_learn;
                $data['curr_id'] = $id;
                $data['title'] = $curr_learn[0]['name'] . ' - lakita.vn';
                $data['meta_title'] = $curr_learn[0]['title'];
                $data['meta_description'] = $curr_learn[0]['description'];
                $data['content'] = 'student/trial_learn';

                $this->session->set_tempdata('is_trial_view', 'yes', 3600 * 24);
                $this->load->view('template', $data);
            } elseif ($sub_flag == 6) {
                $user_id = $this->session->userdata('user_id');
                if (!isset($user_id)) {
                    echo '<script> alert("Bạn phải đăng nhập để học thử!"); </script>';
                    echo "<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
                    die;
                    exit;
                }
                //thông tin bài học hiện tại
                $curr_learn = $this->lib_mod->detail('learn', array('id' => $id));
                $course = $this->lib_mod->detail('courses', array('id' => $curr_learn[0]['courses_id']));
                if (count($curr_learn) == 0) {
                    echo '<script> alert("Video không tồn tại");</script>';
                    die;
                    exit;
                }

                $id_trial_learn = $this->session->tempdata('id_trial');
                if (!isset($id_trial_learn)) {
                    echo '<script> alert("Bạn đã hết 10 phút cho lần học thử này, vui lòng quay lại vào lần học thử tiếp theo hoặc mua khóa học để học tiếp!"); </script>';
                    echo "<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
                    die;
                    exit;
                }
                $this->load->model('learn_trial_model');
                //Kiểm tra hạn 7 ngày
                $input1 = array();
                $input1['where'] = array('student_id' => $user_id);
                $input1['order'] = array('time_start' => 'ASC');
                $firt_learn = $this->learn_trial_model->load_all($input1);
                if (empty($firt_learn)) { //chưa học thử lần nào thì insert
                    $insert = array('student_id' => $user_id, 'datetime' => date("d/m/Y", time()),
                        'time_start' => time(), 'id_trial' => $id_trial_learn);
                    $this->learn_trial_model->insert($insert);
                } else {
                    if (time() - $firt_learn[0]['time_start'] - 5 * 24 * 3600 > 0) {
                        echo '<script> alert("Bạn đã hết hạn học thử trong 5 ngày, vui lòng mua khóa học để học tiếp!"); </script>';
                        echo "<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
                        die;
                        exit;
                    }
                    // Kiểm tra 3 lần trong 1 ngày
                    else {
                        $input2 = array();
                        $input2['where'] = array('student_id' => $user_id, 'datetime' => date("d/m/Y", time()));
                        $sum_day = $this->learn_trial_model->load_all($input2);
                        if (count($sum_day) > 1) {
                            echo '<script> alert("Bạn đã hết 10 phút cho lần học thử hôm nay, vui lòng quay lại vào hôm sau hoặc mua khóa học để học tiếp!"); </script>';
                            die;
                            exit;
                        } else {
                            //Kiểm tra 10 phút
                            $input3 = array();
                            $input3['where'] = array('id_trial' => $id_trial_learn);
                            $id_trial_exist = $this->learn_trial_model->load_all($input3);
                            if (empty($id_trial_exist)) { // truy cập lần đầu thì insert dữ liệu
                                $this->learn_trial_model->insert(array('student_id' => $user_id,
                                    'datetime' => date("d/m/Y", time()), 'time_start' => time(), 'id_trial' => $id_trial_learn));
                            } else { // Nếu không thì kiểm tra 5'
                                if (time() - $id_trial_exist[0]['time_start'] - 10 * 60 > 0) {
                                    echo '<script> alert("Bạn đã hết 10 phút cho lần học thử này, vui lòng quay lại vào lần học thử tiếp theo hoặc mua khóa học để học tiếp!"); </script>';
                                    die;
                                    exit;
                                }
                            }
                        }
                    }
                }
                $input = array();
                $input['where'] = array('id_trial' => $id_trial_learn);
                $input['order'] = array('time_start' => 'DESC');
                $remain_time = $this->learn_trial_model->load_all($input);
                $this->load->vars(array('remain_time' => $remain_time[0]['time_start']));

                $data = $this->data;
                //tên khóa học
                $data['course_name'] = $course[0]['name'];
                $data['course_id'] = $course[0]['id'];
                $data['curr_course'] = $course;
                $this->session->set_tempdata('curr_course_id', $course[0]['id'], 3600 * 12);
                //tổng số bài học
                $data['total_video'] = count($this->lib_mod->detail('learn', array('courses_id' => $course[0]['id'], 'status' => 1)));

                //thông tin giảng viên
                $firs_courses = array_filter(explode(',', $course[0]['speaker_id']));
                $firs_courses = str_replace('-', '', $firs_courses[0]);
                $data['speaker'] = $this->lib_mod->detail('speaker', array('id' => $firs_courses));

                //danh sách bài học
                $data['chapter'] = $this->lib_mod->load_all('chapter', '', array("courses_id" => $curr_learn[0]['courses_id'], 'status' => 1), '', '', array("sort" => 'asc'));
                foreach ($data['chapter'] as $key => $value) {
                    $data['all_learn'][$key] = $this->get_course_learn($value['id'], 3916);
                }
                $data['curr_learn'] = $curr_learn;
                $data['curr_id'] = $id;
                $data['title'] = $curr_learn[0]['name'] . ' - lakita.vn';
                $data['meta_title'] = $curr_learn[0]['title'];
                $data['meta_description'] = $curr_learn[0]['description'];
                $data['content'] = 'student/trial_learn_5';
                $data['id_trial_learn'] = $id_trial_learn;
                $this->load->view('template', $data);
            } else if ($sub_flag == 7) { // ============ TRANG THÔNG TIN KHÓA HỌC KHI NGƯỜI DÙNG ĐÃ MUA, ĐĂNG NHẬP ======================
                $user_id = $this->session->userdata('user_id');
                $data = $this->data;
                $this->load->model('student_model');
                $this->load->model('courses_model');
                $this->load->model('comment_model');

                $inputStudent = [];
                $inputStudent['select'] = 'id_fb, name, thumbnail';
                $inputStudent['where'] = array('id' => $user_id);
                $data['student'] = $this->student_model->load_all($inputStudent);

                $data['curr_learn'][0] = array('id' => 0, 'courses_id' => $id);

                $inputCourse = [];
                $inputCourse['select'] = 'slug';
                $inputCourse['where'] = array('id' => $id);
                $course = $this->courses_model->load_all($inputCourse);
                $data['learn_slug'] = base_url() . $course[0]['slug'] . '-7' . $id . '.html';

                $videoDemoArr = [
                    '37' => '784', //excel 2010
                    '41' => '435', // 99 tuyet chieu
                    '65' => '497', // 99 thu thuat van phong
                    '67' => '591', // excel a-z
                    '39' => '366', // 18 thu thuat
                    '16' => '175', //excel ke toan
                    '69' => '647', //thu thuat excel
                    '68' => '635', //ke toan (Nhung)
                    '66' => '513', //ke toan Elink
                    '10' => '160', //excel 2007
                    '71' => '696', //báo cáo tài chính elink
                    '72' => '724', //xác định chi phí
                    '73' => '726', //báo cáo tài chính nhungpt
                    '74' => '788', //quyết toán thuế
                    '77' => '872', //quyết toán thuế ThơĐT
                    '78' => '953', //trọn bộ kế toán thuế từ a đến z
                    '80' => '1012', // giám đốc vè quản lý TrungHQ
                    '81' => '1086',
                    '82' => '1087'
                ];
                if (array_key_exists($id, $videoDemoArr)) {
                    $data['id_video_demo'] = $videoDemoArr[$id];
                    $this->session->set_tempdata('is_playable', $videoDemoArr[$id], 3600);
                } else {
                    $data['id_video_demo'] = 0;
                }
                $this->session->set_tempdata('is_trial_view', 'yes', 3600);
                $data['chapter'] = $this->lib_mod->load_all('chapter', '', array("courses_id" => $id, 'status' => 1), '', '', array("sort" => 'asc'));
                foreach ($data['chapter'] as $key => $value) {
                    $data['all_learn'][$key] = $this->get_course_learn($value['id'], $user_id);
                }
                $input_comment['where'] = array('courses_id' => $id, 'parent' => '0');
                $data['total_cmt'] = count($this->comment_model->load_all($input_comment));
                $input_comment['limit'] = array(4, 0);
                $input_comment['order'] = array('createdate' => 'desc');
                $data['comment'] = $this->comment_model->load_all($input_comment);
                $data['page'] = 1;
                $data['pages'] = ceil($data['total_cmt'] / 4);
                $data['curr_learn'] = array(0 => array('id' => '0', 'courses_id' => $id));
                $data['title'] = 'Tổng quan khóa học';
                $data['content'] = 'course/detail/detail_bought';
                $this->load->view('template', $data);
            } else {
                show_404();
                exit;
            }
        }
    }

    private function get_course_learn($chapter_id, $student_id) {
        return $this->lib_mod->load_all_join('learn', 'learn.*, student_learn.status as learn_status,student_learn.student_id', 'learn.chapter_id = \'' . $chapter_id . '\' and learn.status = 1 and (student_learn.student_id = \'' . $student_id . '\' or student_learn.student_id is null)', array('student_learn' => array('learn.id = student_learn.learn_id and student_learn.student_id=' . $student_id, 'left')), '', '', '', array('sort' => 'asc'));
    }

    private function find_first_lesson($courseID) {
        $learn_first = $this->lib_mod->load_all('learn', '', array("courses_id" => $courseID, 'status' => 1), '', '', array("sort" => 'asc'));
        return isset($learn_first[0]) ? (base_url() . $learn_first[0]['slug'] . '-4' . $learn_first[0]['id'] . '.html') : '';
    }

    private function find_first_lesson_trial_learn($courseID) {
        $learn_first = $this->lib_mod->load_all('learn', '', array("courses_id" => $courseID, 'status' => 1), '', '', array("sort" => 'asc'));
        return isset($learn_first[0]) ? (base_url() . $learn_first[0]['slug'] . '-6' . $learn_first[0]['id'] . '.html') : '';
    }

    private function find_first_lesson_id($courseID) {
        $learn_first = $this->lib_mod->load_all('learn', '', array("courses_id" => $courseID, 'status' => 1), '', '', array("sort" => 'asc'));
        return isset($learn_first[0]) ? $learn_first[0]['id'] : 0;
    }

}
