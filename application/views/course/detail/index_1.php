<!--    <script src="<?php echo base_url(); ?>styles/v2.0/js/home.js"></script>-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/course_detail.css" />
<script src="<?php echo base_url(); ?>styles/v2.0/js/course_detail.min.js"></script>
<script src="<?php echo base_url(); ?>styles/v2.0/js/login.js"></script>
<div class="header">
    <?php $this->load->view('home/navbar'); ?>
    <div class="row">
        <div class="col-md-6  my-row-1">
            <h1> <strong>KHÓA HỌC VĂN PHÒNG </strong></h1>
            <p> Khóa học hữu ích cho các bạn làm văn phòng </p>
        </div>
        <div class="col-md-6 searchBox">
            <form action="<?php echo base_url(); ?>tim-kiem.html" method="post" id="searchForm">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <label for="exampleInputEmail1" class="sr-only">Search</label>
                        <input type="text" class="form-control" id="key_word" name="key_word" value="Tìm các khóa học bạn quan tâm...">
                        <img class="searchIcon"src="<?php echo base_url(); ?>styles/v2.0/img/icon_seach.png" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="course-summary paddingbottom30">
    <div class="container">
        <div class="dir"> <img src="<?php echo base_url(); ?>styles/v2.0/img/course-detail/excel.png">
            <a href=""> Trang chủ </a> / 
            <a href="course/view_all"> Các khóa học </a> / 
            <a href="course/view_all/<?php echo $group_courses[0]['id']; ?>"> <?php echo $group_courses[0]['name']; ?> </a> / 
            <a href="<?php echo substr($_SERVER['REQUEST_URI'], 1); ?>"> <?php echo $curr_courses[0]['name']; ?> </a>
        </div>
        <div class="row">
            <div class="col-md-7 bgwhite">
                <p class="course-name paddingtop10">
                    <?php echo $curr_courses[0]['name']; ?>
                </p>
                <p class="course-vote"> Đánh giá khóa học &nbsp;
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    <span class="colorlakita">(<?php echo count($vote); ?>)</span> &nbsp;&nbsp;&nbsp;Mời bạn đánh giá khóa học này &nbsp; <a href="#click_to_vote" data-toggle="modal"> 
                        <span class="colorlakita"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> (<?php echo count($vote); ?>)</span> 
                    </a> 
                </p>
                <div style="width:615px; height:350px">
                    <div class="js-video widescreen">
                        <input type="hidden" id="lakitaid" value="<?php echo md5(time()) . '$&((_GNSDADFHGD@!$^&%#' . time() . ')*&^%$@' . time() . '#' . $id_video_demo . '#' . time() . '_+1357$*^())!%*$$&' . md5('lakita.vn') . '+135+1357$*^())!%*$$7$*^())!%*$$+1+1357$*^())!%*$$357$*^())!%*$$'; ?>" /><div id="mediaspace"></div>
                        <script type="text/javascript" src="<?php echo base_url(); ?>plugin/jwplayer/jwplayer.js"></script>
                        <script type="text/javascript" src="<?php echo base_url(); ?>plugin/jwplayer/jwplayer.html5.js"></script>
                        <script type="text/javascript">jwplayer.key = "N8zhkmYvvRwOhz4aTGkySoEri4x+9pQwR7GHIQ=="</script>
                        <script src="<?php echo base_url(); ?>styles/v2.0/js/lktlayer.min.js"></script>
                    </div>
                </div>
                <div class="row require">
                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                        <p class="lakita textunderline">Yêu cầu khóa học </p>
                        <p class="marginbottom5"> <i class="fa fa-check" aria-hidden="true" class="lakita"></i> <strong>Máy tính hoặc điện thoại có kết nối internet </strong></p>
                        <p> <i class="fa fa-check" aria-hidden="true" class="lakita"></i> <strong> Có Microsoft Excel 2007 trở lên </strong></p>
                    </div>
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                        <?php if (isset($love_course)) {
                            ?>
                            <p class="love_link">
                                <?php if (!count($love_course)) { ?>
                                    <i class="fa fa-heart-o red" aria-hidden="true"></i>  Tôi thích khóa học này
                                <?php } else { ?>
                                    <i class="fa fa-heart red" aria-hidden="true"></i>  Tôi thích khóa học này
                                <?php } ?>
                            </p>                        
                            <?php
                        } else {
                            ?>
                            <p class="love_link_no_login"> <i class="fa fa-heart-o red" aria-hidden="true"></i> Tôi thích khóa học này </p>
                        <?php } ?>

                        <?php echo $curr_courses[0]['shareFB']; ?>

                    </div>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-1 bgwhite">
                <div class="row course-detail paddingtop15">
                    <div class="col-md-3">
                        Thời gian 
                    </div>
                    <div class="col-md-9">
                        <i class="fa fa-calendar lakita" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;
                        <strong> <?php echo date('d/m/Y', $curr_courses[0]['time_release']); ?>  </strong>
                    </div>
                </div>
                <div class="row course-detail">
                    <div class="col-md-3">
                        Giảng viên 
                    </div>
                    <div class="col-md-9">
                        <i class="fa fa-user lakita" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;
                        <strong> <?php echo $speaker_detail[0]['name']; ?> </strong>
                    </div>
                </div>
                <div class="row course-detail">
                    <div class="col-md-3">
                        Số bài học 
                    </div>
                    <div class="col-md-9">
                        <i class="fa fa-list-alt lakita" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;
                        <strong> 
                            <?php
                            /* =============================================tổng số bài học (càn sửa lại sau)============================================= */
                            $total_lesson = 0;
                            foreach ($chapter as $key => $value) {
                                $learn = $this->lib_mod->load_all('learn', '', array('status' => 1, 'chapter_id' => $value['id']), '', '', array('sort' => 'asc'));
                                if (isset($learn) && count($learn)) {
                                    $total_lesson+=count($learn);
                                }
                            }
                            echo $total_lesson;
                            /* =============================================tổng số bài học (càn sửa lại sau - hết)============================================= */
                            ?> bài học </strong>
                    </div>
                </div>
                <div class="row course-detail">
                    <div class="col-md-3">
                        Giải đáp 
                    </div>
                    <div class="col-md-9">
                        <i class="fa fa-clock-o lakita" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;
                        <strong> trong 68 giờ </strong>
                    </div>
                </div>
                <div class="row course-detail">
                    <div class="col-md-3">
                        Bài viết 
                    </div>
                    <div class="col-md-9">
                        <i class="fa fa-pencil-square-o lakita" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;
                        <strong> 50 bài viết chuyên môn/năm </strong>
                    </div>
                </div>
                <?php
                $user_id = $this->session->userdata('user_id');
                if (!isset($user_id) || !isset($first_lesson)) {
                    ?>
                    <div class="course-detail price colorlakita">
                        <?php
                        $temp = $this->session->tempdata('priceVouched');
                        $price_root = isset($temp) ? $temp : $curr_courses[0]['price_root'];
                        echo number_format(str_replace('.', '', $price_root));
                        ?> VNĐ
                    </div>
                    <div class="course-detail">
                        <?php if (!isset($temp)) { ?>
                            <div class="voucher">
                                <p> Nhập mã voucher giảm giá (nếu có) </p>
                                <div class="voucher-input" ><input type="text" name="voucher" placeholder="Mã voucher" id="coupon"/> <span class="go" id="voucher1"> &nbsp; GO  </span></div>
                            </div>
                        <?php } ?>
                        <div> 
                            <a class="btn btn-success btn-purchase" href="mua-khoa-hoc.html">  MUA KHÓA HỌC </a>       
                        </div>
                    </div>
                    <?php //$this->load->view('course/detail/purchase_modal'); ?>
                    <?php
                } else {
                    ?>
                    <div class="course-detail">
                        <div class="marginbottom10 text-center"> 
                            <a class="btn btn-success btn-purchase" href="<?php echo $first_lesson; ?>">  HỌC NGAY </a>       
                        </div>
                    </div>
                    <?php
                }
                ?>

                <!--                <div class="course-detail paddingtop15 paddingbottom10">
                                    <p> <strong> Tùy chọn giao hàng </strong> </p>
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <select> <option> Tỉnh/Thành Phố </option> </select>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <select> <option> Quận/Huyện </option> </select>
                                        </div>
                                    </div>
                                </div> -->
                <div class="paddingtop15 paddingbottom28">
                    <div class="row">
                        <div class="col-md-5">
                            <p> <strong> Được giao hàng bởi </strong> </p>
                            <img src="<?php echo base_url(); ?>styles/v2.0/img/course-detail/viettel-post.png" />
                        </div>
                        <div class="col-md-7">
                            <img src="<?php echo base_url(); ?>styles/v2.0/img/course-detail/satisfied.png" class="img-responsive" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="outline">
    <div class="tab">
        <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs paddingleft90" role="tablist">
                <li role="presentation" class="active">
                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Về khóa học</a>
                </li>
                <li role="presentation">
                    <a href="#gv" aria-controls="tab" role="tab" data-toggle="tab">Giảng viên</a>
                </li>
                <li role="presentation">
                    <a href="#vote" aria-controls="tab" role="tab" data-toggle="tab">Nhận xét và đánh giá</a>
                </li>
                <!--                <li role="presentation">
                                    <a href="#course-other" aria-controls="tab" role="tab" data-toggle="tab">Khóa học khác</a>
                                </li>-->
            </ul>

            <!-- Tab panes -->
            <div class="tab-content displayinlineblock">
                <div role="tabpanel" class="tab-pane active bgwhite" id="home">
                    <div class="container">
                        <div class="col-md-6 col-md-offset-1">
<!--                             <h4 class="lakita margintop45 title" > <i class="fa fa-toggle-on" aria-hidden="true"></i> Phát triển ứng dụng Mobile (IOS) </h4>
                            
                            <div class="about-course">
                                <p class="textunderline textuppercase"> <strong> Lợi ích từ khóa học </strong></p>
                                <ul class="marginleft30">
                                    <li>
                                        Nắm được các kiến thức cơ bản , các API của apple hỗ trợ , cũng như customize các thư viện của Apple và opensource.
                                    </li>
                                    <li> Khả năng nghiên cứu các công nghệ mới (iOS 9 và iOS 10 ) của Apple. </li>
                                    <li> Được đào tạo theo quy trình làm việc của công ty Nhật .</li>
                                    <li> Phát triển các sản phẩm về App Mobile.</li>
                                    <li> Có khả năng làm việc với các thư viện C/C++ , Image Processing , OpenGL trên iOS.</li>
                                    <li> Giới thiệu việc làm tới các Doanh nghiệp đối tác.</li>
                                </ul>
                            </div>

                            <div class="about-course">
                                <p class="textunderline textuppercase"> <strong> Đối tượng mục tiêu </strong></p>
                                <ul class="marginleft30">
                                    <li>
                                        Sinh viên yêu thích công nghệ.
                                    </li>
                                    <li> Các tester cần test ứng dụng Mobile.</li>
                                    <li> Các LTV muốn chuyển từ App, Web lên Mobile.</li>
                                </ul>
                            </div>-->
                            <?php echo $curr_courses[0]['content']; ?>
                        </div>
                        <?php $this->load->view('course/detail/course_outline'); ?>
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="gv">
                    <div class="container">
                        <div class="col-md-6 col-md-offset-1">
                            <h4 class="lakita margintop45 title fontRoboto" > <i class="fa fa-toggle-on" aria-hidden="true"></i> Giảng viên </h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div> <img src="<?php echo 'https://lakita.vn/' . $speaker_detail[0]['image']; ?>" class="img-responsive img-circle" />  </div>
                                    <h4 class="fontRobotoBold margintop20 textuppercase"> <?php echo $speaker_detail[0]['name']; ?> </h4>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <i class="fa fa-envelope lakita" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-md-10">
                                            <p> <?php echo $speaker_detail[0]['name']; ?> </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <i class="fa fa-facebook lakita" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-md-10">
                                            <p> <?php echo $speaker_detail[0]['name']; ?> </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <i class="fa fa-twitter lakita" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-md-10">
                                            <p> <?php echo $speaker_detail[0]['name']; ?> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
<!--                               <p>Kế toán tổng hợp tại chi nhánh công ty TNHH thực phẩm và giải khát "Cánh diều xanh", thuộc tập đoàn IPP liên Thái Bình Dương </p>
                                    <p class="fontsize18"> <strong> Chứng chỉ </strong> </p>
<p> <i class="fa fa-check" aria-hidden="true"></i> &nbsp; Chứng chỉ kế toán quốc tế CAT - Kế toán tổng hợp tại chi nhánh công ty TNHH thực phẩm và giải khát "Cánh diều xanh", thuộc tập đoàn IPP liên Thái Bình Dương </p>
                                    <p> <i class="fa fa-check" aria-hidden="true"></i> &nbsp; 4 năm ở vị trí kế toán tổng hợp kiêm phụ trách toàn bộ mảng thuế. </p>
                                    -->
                                    <?php echo $speaker_detail[0]['description']; ?>
                                </div>
                            </div>
                        </div>
                        <?php $this->load->view('course/detail/course_outline'); ?>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="vote">
                    <div class="container">
                        <div class="col-md-6 col-md-offset-1">
                            <h4 class="lakita margintop45 title fontRoboto" > <i class="fa fa-toggle-on" aria-hidden="true"></i> Đánh giá & nhận xét về khóa học </h4>
                            <div class="vote_hidden">
                                <div class="row">
                                    <div class="col-md-8"> Xin vui lòng cho chúng tôi biết về trải nghiệm của bạn với khóa học này!  </div>
                                    <div class="col-md-4 text-right"> (dấu * là bắt buộc)</div>
                                </div>
                                <p> Đánh giá sản phẩm này* &nbsp;
                                    <span class="vote_icon_area">
                                        <i class="fa fa-star-o red fontsize18 vote_icon" aria-hidden="true" value="1"></i>
                                        <i class="fa fa-star-o red fontsize18 vote_icon" aria-hidden="true" value="2"></i>
                                        <i class="fa fa-star-o red fontsize18 vote_icon" aria-hidden="true" value="3"></i>
                                        <i class="fa fa-star-o red fontsize18 vote_icon" aria-hidden="true" value="4"></i>
                                        <i class="fa fa-star-o red fontsize18 vote_icon" aria-hidden="true" value="5"></i>
                                    </span>
                                    &nbsp;&nbsp;
                                    <img class="vote_image" src="<?php echo base_url(); ?>styles/v2.0/img/course-detail/click-to-vote.png" style="margin-right: -4px;"/>
                                    <input type="hidden" name="vote_star_number" id="vote_star_number_2" value="0" />
                                <div class="row">
                                    <div class="col-md-8"> <strong> Mô tả đánh giá*  </strong> </div>
                                    <div class="col-md-4 text-right"> Ký tự còn lại <span class="letter_remaining"> 2500 </span> </div>
                                </div>
                                <div class="form-group margintop10">
                                    <label for="comment" class="sr-only">Comment:</label>
                                    <textarea class="form-control" rows="5" id="vote_description_2" name="vote_description_2" placeholder="Nhập mô tả tại đây"></textarea>
                                </div>
                                <p> <strong> Đánh giá bởi </strong></p>
                                <div class="row">
                                    <div class="col-md-1">
                                        <?php
                                        $user_id = $this->session->userdata('user_id');
                                        if (!isset($user_id)) {
                                            ?>
                                            <i class="fa fa-user fa-3x" aria-hidden="true"></i>
                                        <?php } else { ?>
                                            <img src="<?php
                                            if (isset($student[0]['id_fb']) && !empty($student[0]['id_fb']))
                                                echo 'https://graph.facebook.com/' . $student[0]['id_fb'] . '/picture?type=large';
                                            else {
                                                if (isset($student[0]['thumbnail']) && !empty($student[0]['thumbnail']))
                                                    echo 'https://lakita.vn/' . $student[0]['thumbnail'];
                                                else
                                                    echo base_url() . 'styles/images/people/110/user.png';
                                            }
                                            ?>" alt="" class="img-circle height-30 width-30" />
                                             <?php } ?>
                                    </div>
                                    <div class="col-md-10">
                                        <?php
                                        if (isset($user_id)) {
                                            ?>
                                            <input type="text" class="form-control padding-10" disabled name="vote_user_name_2" id="vote_user_name_2" value="<?php echo $student[0]['name']; ?>" />
                                            <input type="hidden" value="<?php echo $student[0]['id']; ?>" name="vote_user_id" id="vote_user_id_2"/>

                                            <?php
                                        } else {
                                            ?>
                                            <input type="text" class="form-control padding-10" required="required" name="vote_user_name_2" id="vote_user_name_2" placeholder="Nhập tên của bạn để hiện thị cho người khác thấy" />
                                            <input type="hidden" value="0" name="vote_user_id" id="vote_user_id_2" />

                                        <?php } ?>
                                        <input type="hidden" value="<?php echo $curr_id; ?>" id="vote_course_id_2" />
                                    </div>
                                </div>
                                <button class="btn btn-success pull-right margintop10 vote_submit_btn_2"> Gửi đánh giá <i class="fa fa-star" aria-hidden="true"></i> </button>
                            </div>
                            <div class="clearfix"></div>
                            <hr/>
                            <p> <strong> Học viên nhận xét sản phẩm này </strong></p>
                            <div class="row">
                                <div class="col-md-6 text-right">
                                    <p> Hải lòng tuyệt đối </p>
                                    <p> Hơn cả mong đợi </p>
                                    <p> Hài lòng </p>
                                    <p> Dưới trung bình </p>
                                    <p> Thất vọng </p>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <i class="fa fa-star red" aria-hidden="true"></i>
                                        <i class="fa fa-star red" aria-hidden="true"></i>
                                        <i class="fa fa-star red" aria-hidden="true"></i>
                                        <i class="fa fa-star red" aria-hidden="true"></i>
                                        <i class="fa fa-star red" aria-hidden="true"></i>
                                        &nbsp;&nbsp; <?php echo $vote_5; ?>
                                    </p>
                                    <p>
                                        <i class="fa fa-star red" aria-hidden="true"></i>
                                        <i class="fa fa-star red" aria-hidden="true"></i>
                                        <i class="fa fa-star red" aria-hidden="true"></i>
                                        <i class="fa fa-star red" aria-hidden="true"></i>
                                        <i class="fa fa-star-o red" aria-hidden="true"></i>
                                        &nbsp;&nbsp; <?php echo $vote_4; ?>
                                    </p>
                                    <p>
                                        <i class="fa fa-star red" aria-hidden="true"></i>
                                        <i class="fa fa-star red" aria-hidden="true"></i>
                                        <i class="fa fa-star red" aria-hidden="true"></i>
                                        <i class="fa fa-star-o red" aria-hidden="true"></i>
                                        <i class="fa fa-star-o red" aria-hidden="true"></i>
                                        &nbsp;&nbsp; <?php echo $vote_3; ?>
                                    </p>
                                    <p>
                                        <i class="fa fa-star red" aria-hidden="true"></i>
                                        <i class="fa fa-star red" aria-hidden="true"></i>
                                        <i class="fa fa-star-o red" aria-hidden="true"></i>
                                        <i class="fa fa-star-o red" aria-hidden="true"></i>
                                        <i class="fa fa-star-o red" aria-hidden="true"></i>
                                        &nbsp;&nbsp; <?php echo $vote_2; ?>
                                    </p>
                                    <p>
                                        <i class="fa fa-star red" aria-hidden="true"></i>
                                        <i class="fa fa-star-o red" aria-hidden="true"></i>
                                        <i class="fa fa-star-o red" aria-hidden="true"></i>
                                        <i class="fa fa-star-o red" aria-hidden="true"></i>
                                        <i class="fa fa-star-o red" aria-hidden="true"></i>
                                        &nbsp;&nbsp; <?php echo $vote_1; ?>
                                    </p>
                                </div>
                            </div>
                            <hr/>
                            <div class="reload_vote">
                                <div class="row marginbottom15">
                                    <div class="col-md-3"> <strong> Nhận xét (<?php echo count($vote); ?>) </strong></div>
                                    <!--                                <div class="col-md-9"> Sắp xếp theo
                                                                        <select class="form-control">
                                                                            <option> Ngày tạo </option>
                                                                        </select>
                                                                        <ul class="nextCourse">
                                                                            <li> &lt; </li>
                                                                            <li class="active">1</li>
                                                                            <li >2</li>
                                                                            <li >3</li>
                                                                            <li >4</li>
                                                                            <li >5</li>
                                                                            <li> &gt; </li>
                                                                        </ul>
                                                                    </div>-->
                                </div>
                                <?php foreach ($vote as $value) { ?>
                                    <div class="row marginbottom15">
                                        <div class="col-md-2">
                                            <a href="#">
                                                <?php if ($value['userID'] > 0) { ?>
                                                    <img src="<?php
                                                    $student = $this->lib_mod->detail('student', array('id' => $value['userID']));
                                                    if (isset($student[0]['id_fb']) && !empty($student[0]['id_fb']))
                                                        echo 'https://graph.facebook.com/' . $student[0]['id_fb'] . '/picture?type=large';
                                                    else {
                                                        if (isset($student[0]['thumbnail']) && !empty($student[0]['thumbnail']))
                                                            echo 'https://lakita.vn/' . $student[0]['thumbnail'];
                                                        else
                                                            echo base_url() . 'styles/images/people/110/user.png';
                                                    }
                                                    ?>" alt="" class="img-circle" style="width: 50px; height: 50px;" />
                                                     <?php } else { ?>
                                                    <img alt="64x64" class="media-object img-circle" data-src="holder.js/64x64" src="https://lakita.vn/styles/images/people/110/user.png" data-holder-rendered="true" style="width: 50px; height: 50px;">
                                                <?php } ?>
                                            </a>
                                        </div>
                                        <div class="col-md-10">
                                            <span> <strong><?php echo $value['vote_user_name']; ?></strong> &nbsp; &nbsp;<?php echo date('H:i:s d/m/Y', $value['time']); ?></span>
                                            <p>
                                                <?php echo $value['vote_description']; ?>
                                            </p>
        <!--                                    <p> <i class="fa fa-reply" aria-hidden="true"></i> Trả lời (0)
                                                | <i class="fa fa-share-alt" aria-hidden="true"></i> Chia sẻ
                                                | <i class="fa fa-thumbs-up" aria-hidden="true"></i> Thích (1) </p>-->
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php $this->load->view('course/detail/course_outline'); ?>
                    </div>
                </div>

                <!--                <div role="tabpanel" class="tab-pane" id="course-other">
                                    <div class="container">
                                        <div class="col-md-6 col-md-offset-1">
                                            <h4 class="lakita margintop45 title fontRoboto" > <i class="fa fa-toggle-on" aria-hidden="true"></i> Khóa học khác </h4>
                                            <div class="row listCourse">
                <?php
                foreach ($other_courses as $key => $value) {
                    $firs_courses = array_filter(explode(',', $value['speaker_id']));
                    $firs_courses = str_replace('-', '', $firs_courses[0]);
                    $speaker = $this->lib_mod->detail('speaker', array('id' => $firs_courses));
                    ?>
                                                                        <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12" style="height:290px">
                                                                            <a href="<?php echo base_url() . $value['slug'] . '-2' . $value['id']; ?>.html" title="<?php echo $value['name']; ?>">
                                                                                <div> <img src="<?php echo 'https://lakita.vn/' . $value['image']; ?>" alt="<?php echo $value['name']; ?>" class="img-responsive"> </div>
                                                                                <p class="courseName"><?php echo $value['name']; ?></p>
                                                                            </a>
                                                                            <p class="teacher"><?php echo $speaker[0]['name']; ?></p>
                                                                            <p class="price"> <?php echo number_format(str_replace('.', '', $value['price_root']), 0, ',', '.') . " VNĐ"; ?></p>
                                                                        </div>
                <?php } ?>
                                            </div>
                                        </div>
                <?php $this->load->view('course/detail/course_outline'); ?>
                                    </div>
                                </div>-->
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="TestimonialHighlight">
        <div class="testimonial"><span class="circle"></span> CẢM NHẬN HỌC VIÊN <span class="circle"></span></div>
        <div class="carousel slide hidden-sm hidden-xs" id="carousel-example-generic1" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php
                $i = 0;
                for ($i = 0; $i < count($rates); $i++) {
                    ?>
                    <li data-target="#carousel-example-generic1" data-slide-to="<?php echo $i; ?>" class="<?php echo ($i == 0) ? 'active' : ''; ?>"></li>
                <?php } ?>
            </ol>

            <div class="carousel-inner" role="listbox">
                <?php
                $i = 0;
                foreach ($rates as $key => $value) {
                    echo ' <div class="item ' . (($i++ == 0) ? 'active' : '') . '">
                             <div class="row">';
                    ?>
                    <div class="col-md-3 paddingtop15">
                        <img class="img-responsive avatar" src="<?php echo 'https://lakita.vn/' . $value['thumbnail']; ?>">
                    </div>
                    <div class="col-md-9">
                        <p class="name"> <?php echo $value['name']; ?> </p>
                        <p class="org">  <?php echo $value['org']; ?> </p>
                        <div class="row content2">
                            <div class="col-md-0-5">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-11">
                                <strong>
                                    <?php echo $value['description']; ?>
                                </strong>
                            </div>
                            <div class="col-md-0-5">
                                <i class="fa fa-quote-right" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</div>
</div>
<div id="fb-root"></div>
<script>(function (d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id))
                                    return;
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=315347858825221";
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>
<?php $this->load->view('course/detail/vote_modal'); ?>
</div>




