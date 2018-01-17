<?php $user_id = $this->session->userdata('user_id'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/navbar.css?ver=<?php echo _VER_CACHED_ ?>" />
<div class="navBar">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <ul>
                    <li role="presentation" class="left"> <a href="<?php echo base_url(); ?>"> TRANG CHỦ </a></li>
                    <li role="presentation" class="left dropdown group-course-li dropdown_hover"> 
                        <a href="<?php echo base_url(); ?>khoa-hoc/xem-tat-ca.html" role="button" class="dropdown-toggle" data-toggle="dropdown" id="a_dropdown_group_course"> 
                            CÁC KHÓA HỌC <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-header-1 dropdown-courses" role="menu" aria-labelledby="drop1">
                            <?php
                            $group_courses = $this->lib_mod->load_all('group_courses', 'id,name,slug', array('status' => 1), 5, '', array('sort' => 'asc'));
                            foreach ($group_courses as $value) {
                                ?>
                                <li> <a href="<?php echo base_url() . 'nhom-khoa-hoc/' . $value['slug'] . '-' . $value['id'] . '.html'; ?>"> <?php echo $value['name']; ?> </a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li role="presentation" class="left"> <a href="#footer_link"> LIÊN HỆ </a></li>
                    <li role="presentation" class="left show-more-li dropdown dropdown_hover"> 
                        <a href="" id="a_show_more" role="button" class="dropdown-toggle" data-toggle="dropdown"> THÊM <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-header-1 dropdown-courses" role="menu" aria-labelledby="drop1">
                            <li> 
                                <a> Về chúng tôi </a>
                            </li>
                            <li> 
                                <a href="<?php echo base_url(); ?>dich-vu-excel.html"> Dịch vụ excel </a>
                            </li>
                            <li> 
                                <a> Trở thành giảng viên </a>
                            </li>
                            <li> 
                                <a> Tiếp thị liên kết </a>
                            </li>
                            <li> 
                                <a> Blog </a>
                            </li>
                            <li> 
                                <a href="<?php echo base_url(); ?>tin-tuc.html"> Tin tức </a>
                            </li>
                            <li> 
                                <a> Cơ hội nghề nghiệp </a>
                            </li>
                            <li> 
                                <a> Chủ đề </a>
                            </li>
                            <li> 
                                <a> Hỗ trợ </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-md-2 height-66">
                <?php
                if (isset($user_id)) {
                    ?>
                    <a href="<?php echo base_url(); ?>khoa-hoc/xem-tat-ca.html" class="logo-link">
                    </a>
                    <?php
                } else {
                    ?>
                    <a href="" class="logo-link">
                    </a>
                    <?php
                }
                ?>
            </div>
            <div class="col-md-5">
                <ul style="min-width: 500px;">
                    <li role="presentation" class="icon-bar paddingleft56 show-more-li dropdown"> 
                        <!--                      <a href="" id="a_show_more" role="button" class="dropdown-toggle" data-toggle="dropdown">  
                                                  <i class="fa fa-bell-o" aria-hidden="true"></i> 
                                              </a>-->
                        <a href="" id="a_show_more" role="button" class="dropdown-toggle" data-toggle="dropdown">  
                            <?php
                            /* locnt xóa tạm chỗ này
                              //                            $have_news = 0;
                              //                            if (isset($user_id)) {
                              //                                if (isset($have_news4) || isset($have_news5)) {
                              //                                    if (is_null(get_cookie('read_news_4')) && is_null(get_cookie('read_news_5')) && is_null(get_cookie('read_news_5')))
                              //                                        $have_news = 3;
                              //                                    else if (!is_null(get_cookie('read_news_4')) && !is_null(get_cookie('read_news_5')) && !is_null(get_cookie('read_news_5')))
                              //                                        $have_news = 0;
                              //                                    else if (!is_null(get_cookie('read_news_4')) && is_null(get_cookie('read_news_5')) && is_null(get_cookie('read_news_5')))
                              //                                        $have_news = 2;
                              //                                    else if (is_null(get_cookie('read_news_4')) && !is_null(get_cookie('read_news_5')) && is_null(get_cookie('read_news_5')))
                              //                                        $have_news = 2;
                              //                                    else if (is_null(get_cookie('read_news_4')) && is_null(get_cookie('read_news_5')) && !is_null(get_cookie('read_news_5')))
                              //                                        $have_news = 2;
                              //                                    else
                              //                                        $have_news = 1;
                              //                                }
                              //                            }
                              hết chỗ xóa */
                            ?>
                            <i id="notification" class="fa fa-bell-o" aria-hidden="true"></i> 
                            <?php if (isset($have_news)) { ?>
                                <input id="csrf_test_name_noti" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div id="num_noti" >
                                    <span id="notification_num" class="badge">
                                        <?php echo $have_news; ?>
                                    </span>
                                </div>
                            <?php } ?>
                        </a>
                        <ul class="dropdown-menu dropdown-header-1 dropdown-courses" role="menu" aria-labelledby="drop1">

                            <?php
                            if (isset($noti)) {
                                foreach ($noti as $key1 => $value1) {
                                    if ($value1['type'] == 'comment') {
                                        ?>
                                        <li> 
                                            <a href="<?php echo $value1['url']; ?>"> 
                                                <i class="fa fa-comments fa-5x" aria-hidden="true"></i>
                                                <?php
                                                foreach ($creator_infor as $key2 => $value2) {
                                                    if ($value1['creator'] == $value2['id']) {
                                                        $a = $value2['name'];
                                                    }
                                                    echo '&nbsp;&nbsp;&nbsp; ' . $a . ' đã trả lời bình luận của bạn ';
                                                    echo date('H:i:s d/m/Y', $value1['time']);
                                                }
                                                ?>
                                            </a>
                                        </li>
                                        <?php
                                    } elseif ($value1['type'] == 'exercise') {
                                        ?>
                                        <li> 
                                            <a href="<?php echo $value1['url']; ?>"> 
                                                <i class="fa fa-book fa-5x" aria-hidden="true"></i>
                                                <?php
                                                echo '&nbsp;&nbsp;&nbsp; Giảng viên Lakita đã chữa bài tập của bạn ';
                                                echo date('H:i:s d/m/Y', $value1['time']);
                                                ?>
                                            </a>
                                        </li>
                                        <?php
                                    } elseif ($value1['type'] == 'invite') {
                                        ?>
                                        <li> 
                                            <a href="<?php echo $value1['url']; ?>"> 
                                                <i class="fa fa-gift fa-5x" aria-hidden="true"></i>
                                                <?php
                                                foreach ($creator_infor1 as $key2 => $value2) {
                                                    if ($value1['creator'] == $value2['id']) {
                                                        $b = $value2['name'];
                                                    }

                                                    echo '&nbsp;&nbsp;&nbsp; ' . $b . ' đã sử dụng mã giới thiệu của bạn';
                                                    echo ' bạn được cộng ' . $value1['value'] . ' vào tài khoản ';
                                                }
                                                ?>
                                            </a>
                                        </li>
                                        <?php
                                    } else {
                                        ?>
                                        <li> 
                                            <a href="<?php echo $value1['url']; ?>" style="width: 490px; height: auto; line-height: 22px; white-space: normal;"> 
                                                <i class="fa fa-newspaper-o fa-5x" aria-hidden="true"></i>
                                                <?php
                                                echo '&nbsp;&nbsp;&nbsp; [LAKITA.VN] Chương trình Tri ân khách hàng, Lakita gửi Tặng Miễn Phí 1 tháng học Yoga Online tại Lakita.vn (20/12-20/1).';
                                                echo date('H:i:s d/m/Y', $value1['time']);
                                                ?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                }
                            } else {
                                ?>
                                <li>
                                    <a><p>Hiện tại không có thông báo mới để hiển thị</p></a>
                                </li>
                                <?php
                            }
                            ?> 
                            <li>
                                <a style="text-align: center; background-color: #d5eadb; color: #000" href="<?php echo base_url(); ?>thong-bao.html"> 
                                    Xem những thông báo cũ hơn
                                </a>
                            </li>
                            <!--locnt-->
                        </ul>
                    </li>
                    <li role="presentation" class="icon-bar paddingleft56"> 
                        <?php $data = null; ?>
                        <a data-toggle="modal" data-target="#modal_course_love" class="pointer"> 
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                            <?php
                            if (isset($user_id)) {
                                $courses_love = $this->lib_mod->detail('love', array('user_id' => $user_id));
                                if (count($courses_love)) {
                                    ?>
                                                                <!--                                    <span class="badge">
                                    <?php echo count($courses_love); ?>
                                                                                                    </span>-->

                                    <?php
                                    $courses_detail = [];
                                    foreach ($courses_love as $key => $value) {
                                        $courses_detail[$key] = $this->lib_mod->detail('courses', array('id' => $value['course_id']))[0];
                                    }
                                    $data['courses_love'] = $courses_detail;
                                }
                            }
                            ?>
                        </a>
                    </li>


                    <?php if (isset($user_id) && !empty($user_id)) { ?>
                        <li role="presentation" class="icon-bar paddingleft35"><a href="<?php echo base_url(); ?>khoa-hoc-cua-toi.html"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Khóa học của tôi</a></li>
                    <?php } else { ?>
                        <li role="presentation" class="icon-bar paddingleft56"><a href="" class="commingsoon"> <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                    <?php } ?>

                    <?php
                    if (!isset($user_id)) {
                        ?>
                        <li role="presentation" class="icon-bar paddingleft56"> <a href="<?php echo base_url(); ?>dang-nhap.html"> ĐĂNG KÝ </a></li>
                        <li role="presentation" class="icon-bar paddingleft53"> <a href="<?php echo base_url(); ?>dang-nhap.html"> ĐĂNG NHẬP </a></li>
                        <?php
                    } else {
                        ?>
                        <li class="dropdown login-bar avatar-li dropdown_hover">
                            <a id="drop1" href="#" role="button" class="dropdown-toggle avatar" data-toggle="dropdown">
                                <img src="<?php
                                if (!empty($student[0]['thumbnail'])) {
                                    echo 'https://lakita.vn/' . $student[0]['thumbnail'];
                                } else {
                                    if (!empty($student[0]['id_fb'])) {
                                        echo 'https://graph.facebook.com/' . $student[0]['id_fb'] . '/picture?type=large';
                                    } else {
                                        echo base_url() . 'styles/images/people/110/user.png';
                                    }
                                }
                                ?>" alt="" class="img-circle avatar" />
                                &nbsp;&nbsp;&nbsp;
                                     <?php echo $student[0]['name']; ?> 
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-header-1" role="menu" aria-labelledby="drop1">
                                <li><a href="<?php echo base_url(); ?>khoa-hoc-cua-toi.html"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> &nbsp; Khóa học của tôi</a></li>
                                <li> <a href="<?php echo base_url(); ?>kich-hoat-khoa-hoc.html"> <i class="fa fa-compress" aria-hidden="true"></i> &nbsp; Kích hoạt khóa học </a></li>
                                <li> <a href="<?php echo base_url(); ?>nap-tien-vao-tai-khoan.html"> <i class="fa fa-usd" aria-hidden="true"></i> &nbsp; Nạp tiền vào tài khoản </a> </li>
                                <li> <a href="<?php echo base_url(); ?>thong-tin-tai-khoan.html"> <i class="fa fa-user" aria-hidden="true"></i> &nbsp; Tài khoản </a> </li>
                                <li> <a href="<?php echo base_url(); ?>lich-su-thanh-toan.html"> <i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp; Lịch sử thanh toán </a> </li>
                                <li> <a href="student/logout"> <i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp; Đăng xuất </a> </li>
                            </ul>
                        </li>
<?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
if ($data != null) {
    $this->load->view('template/course_love_modal', $data);
}
?>
<script src="<?php echo base_url(); ?>styles/v2.0/js/navbar.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>styles/v2.0/js/notification.js?ver=<?php echo _VER_CACHED_ ?>"></script>
