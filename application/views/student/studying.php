<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/student.css?ver=<?php echo _VER_CACHED_ ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/style.bootstrap11.lakita.css?ver=<?php echo _VER_CACHED_ ?>" />
<script src="<?php echo base_url(); ?>styles/v2.0/js/student.min.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<script src="<?php echo base_url(); ?>styles/v2.0/js/exercise.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<input type="hidden" id="base_url" value="<?php echo base_url() ?>">
<?php
if ($this->agent->is_mobile())
    $this->load->view('mobile/user_info_mobile');
else {
    ?>
    <div class="header">
        <?php $this->load->view('home/navbar'); ?>
<!--        <div class="row">
            <div class="col-md-6  my-row-1">
                <div class="row">
                    <div class="col-md-1 col-md-offset-3 margintop22">
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
                    </div>
                    <div class="col-md-6 marginleft15">
                        <h1> <strong> <?php echo $student[0]['name']; ?> </strong></h1>
                        <p> Tiến độ học tập </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 searchBox">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <form action="<?php echo base_url(); ?>tim-kiem.html" method="post" id="searchForm">
                            <label for="exampleInputEmail1" class="sr-only">Search</label>
                            <input type="text" class="form-control" id="key_word" name="key_word" value="Tìm các khóa học bạn quan tâm...">
                            <img class="searchIcon"src="<?php echo base_url(); ?>styles/v2.0/img/icon_seach.png" />
                        </form>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
    <div class="clearfix"></div>

    <!--*********************************************************DUNG TT***********************************************-->
    <div class="container" style="min-height: 700px">
        <div class="row">

            <aside class="left-sidebar">
                <div class="all-side1">

                    <!-- Single button -->
                    <div class="btn-group">
                        <button id="menu_btn" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bars fa-2x" aria-hidden="true"></i></span>
                        </button>
                        <ul  class="dropdown-menu">

                            <div class="row side-row-1"> 
                                <button type="text"><strong>QUẢN LÝ GIAO DỊCH</strong></button>
                                <ul style="margin-left: 35px;">
                                    <li><a href="khoa-hoc-cua-toi.html"><i class="fa fa-leanpub" aria-hidden="true"></i> &nbsp; <strong> Khóa học của tôi </strong> </a></li>
                                    <hr>
                                    <li ><a ><i class="fa fa-bar-chart" aria-hidden="true"></i> &nbsp;  Tiến độ học tập</a></li>
                                    <hr>
                                    <li class="active"><a href="bai-tap-luyen-tap.html"><i class="fa fa-leanpub" aria-hidden="true"></i> &nbsp; Bài tập luyện tập</a></li>
                                    <hr>
                                    <li><a href="thong-bao.html"><i class="fa fa-bell" aria-hidden="true"></i> &nbsp; Thông báo</a></li>
                                    <hr>
                                    <li><a href="nap-tien-vao-tai-khoan.html"><i class="fa fa-usd" aria-hidden="true"></i> &nbsp; Nạp tiền vào tài khoản</a></li>
                                    <hr>
                                    <li class="active_course"><a href="kich-hoat-khoa-hoc.html"><i class="fa fa-compress" aria-hidden="true"></i> &nbsp; Kích hoạt khóa học</a></li>
                                    <hr>
                                    <li><a ><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp; Đơn hàng của tôi</a></li>
                                    <hr>
                                    <li><a ><i class="fa fa-heart-o" aria-hidden="true"></i> &nbsp; Sản phẩm yêu thích</a></li>
                                    <hr>
                                    <li><a ><i class="fa fa-qrcode" aria-hidden="true"></i> &nbsp; Mã voucher (mã giảm giá)</a></li>
                                    <hr>
                                    <li><a ><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;  Địa chỉ nhận hàng</a></li>
                                </ul>
                            </div>

                            <div class="row side-row-2">
                                <button type="text"><strong>QUẢN LÝ TÀI KHOẢN</strong></button>
                                <ul style="margin-left: 35px;">
                                    <li><a href="thong-tin-tai-khoan.html"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;  Thông tin tài khoản</a></li>
                                    <hr>
                                    <li><a href="lich-su-thanh-toan.html"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp; Lịch sử thanh toán</a></li>
                                    <hr> 
                                    <li><a ><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp; Quản lý bản tin (hộp thư)</a></li>
                                    <hr>
                                    <li><a ><i class="fa fa-weixin" aria-hidden="true"></i>&nbsp;  Hỏi đáp</a></li>
                                    <hr>
                                    <li><a href="student/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp; Thoát</a></li>
                                </ul>
                            </div>

                        </ul>
                    </div>
                </div>              
            </aside>

            <div class="col-md-10 col-md-offset-1">
                <section class="group4">




                    <div class="link4">
                        <p><a href="course/view_all">Trang chủ</a> / <a href="student">Quản lý giao dịch</a> / <a> Bài tập luyện tập</a></p>
                        <p style="color: green; margin-left: 5px; font-size: 20px;"><i class="fa fa-user" aria-hidden="true"></i><strong> Tiến độ học tập</strong></p>
                    </div>


                    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#upload_file">
                        Tải bài tập bạn đã làm
                    </button>


                    <div class="modal fade" id="upload_file" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Tải bài tập</h4>
                                </div>
                                <div class="modal-body">
                                    <form id="uploadForm" class="form-horizontal" role="form" action="<?php echo base_url(); ?>student2/studying/action_upload" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
                                        <div class="gr5-row-2 margintop22" role="tabpanel">
                                            <div class="gr5-form">
                                                <div class="row gr5-row2-form2">
                                                    <div class="col-md-3 gr5-name-form">
                                                        <p><strong>File bài tập: </strong></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <label>Chọn file: </label>
                                                        <input type="file" name="excel" size="25">
                                                    </div>
                                                </div>
                                                <div class="row gr5-row2-form2">
                                                    <div class="col-md-3 gr5-name-form">
                                                        <p><strong>Khóa học: </strong></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="course_id_input">
                                                            <option value="0"> Chọn khóa học</option>
                                                            <?php foreach ($courses as $value) { ?>
                                                                <option value="<?php echo $value['id']; ?>"> <?php echo $value['name']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row gr5-row2-form2">
                                                    <div class="col-md-3 gr5-name-form">
                                                        <p><strong>Bài học: </strong></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="learn_id_input">
                                                            <option value="0"> Chọn bài học </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row gr5-row2-form2">
                                                    <div class="col-md-3 gr5-name-form">
                                                        <p><strong>Ghi chú: </strong></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control" rows="3" name="note"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group4 text-center marginbottom15">
                                                    <button id="nap" class="margintop20 type_submit" type="submit" name="ok" value="Upload">  TẢI BÀI TẬP  <i class="fa fa-sign-out" aria-hidden="true"></i>  </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="table-toolbar" style="margin-top: 30px;">
                        <div class="">
                            <form action="<?php echo base_url(); ?>student2/studying/search" method="get">



                                <div class="col-md-1 ">
                                    <p><strong>Khóa học: </strong></p>
                                </div>

                                <div class="col-md-4">
                                    <select class="form-control" name="course_id_input1">
                                        <option value="0"> Tất cả các khóa học</option>
                                        <?php foreach ($courses as $value) { ?>
                                            <option value="<?php echo $value['id']; ?>" <?php if (isset($_GET['course_id_input1']) && $_GET['course_id_input1'] == $value['id']) {
                                        echo 'selected="selected"';
                                    } ?>   > <?php echo $value['name']; ?></option>
    <?php } ?>
                                    </select>
                                </div>


                                <div class="col-md-1 ">
                                    <p><strong>Bài học: </strong></p>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" name="learn_id_input1">
                                        <option value="0" > Tất cả các bài học </option>
                                    </select>
                                </div>



                                <button class="btn purple" type="submit">

                                    <i class="fa fa-search"></i> Tìm

                                </button>
                            </form>

                        </div>
                    </div>









                    <!-- bang de up file nop bai -->
                    <div class="table-responsive" style="margin-top: 30px;">
                        <table class="table table-bordered">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ngày nộp</th>
                                    <th>Tên file</th>
                                    <th>Khóa học</th>
                                    <th>Bài học</th>
                                    <th>Ghi chú</th>
                                    <th>Tải file</th>
                                    <th>Bài chữa</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php foreach ($exes as $key => $value) { ?>
                                    <tr>
                                        <th><?php echo $value['id'] ?></th>
                                        <th><?php echo date('H:i:s d/m/Y', $value['time']); ?></th>
                                        <th><?php echo $value['file_name']; ?></th>
                                        <th><?php
                                            foreach ($courses as $khoa => $gtri) {
                                                if ($gtri['id'] == $value['course_id']) {
                                                    echo $gtri['name'];
                                                }
                                            }
                                            ?></th>
                                        <th><?php
                                            foreach ($bai as $khoa1 => $gtri1) {
                                                if ($value['learn_id'] == $gtri1['id']) {
                                                    echo $gtri1['name'];
                                                }
                                            }
                                            ?></th>
                                        <th><?php echo $value['note']; ?></th>
                                        <th><a href="<?php echo base_url() . 'student2/Studying/download/' . str_replace("=", "", base64_encode($value['full_path'])); ?>">Tải file </a></th>
                                        <th>

        <?php
        foreach ($bai_chua as $key7 => $gtri7) {
            if (($value['id'] == $gtri7['exe_id']) && (!empty($gtri7['url_bai_chua']) || !empty($gtri7['url_chua_chuan']) || !empty($gtri7['url_video']) || !empty($gtri7['note']) )) {
                ?>
                                                    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#upload_file<?php echo $value['id']; ?>">
                                                        Bài chữa
                                                    </button>
                                                    <div class="modal fade" id="upload_file<?php echo $value['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel">Tải bài chữa</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>exercise/action_upload" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
                                                                        <div class="gr5-row-2 margintop22" role="tabpanel">
                                                                            <div class="gr5-form">
                                                                                <input type="text" class="hidden" name="student_id" value="<?php echo $value['student_id']; ?>">
                                                                                <input type="text" class="hidden" name="exe_id" value="<?php echo $value['id']; ?>">
                                                                                <div class="row gr5-row2-form2">
                                                                                    <div class="col-md-3 gr5-name-form">
                                                                                        <p><strong>File bài chữa: </strong></p>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <?php
                                                                                        foreach ($bai_chua as $key4 => $gtri4) {
                                                                                            if (($value['id'] == $gtri4['exe_id']) && !empty($gtri4['url_bai_chua'])) {
                                                                                                ?>
                                                                                                <a href="<?php echo base_url() . 'student2/studying/download2/' . str_replace("=", "", base64_encode($gtri4['url_bai_chua'])); ?>">Tải file chữa bài đã chữa ở đây </a>
                    <?php }
                } ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row gr5-row2-form2">
                                                                                    <div class="col-md-3 gr5-name-form">
                                                                                        <p><strong>File đáp án: </strong></p>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                <?php
                foreach ($bai_chua as $key5 => $gtri5) {
                    if (($value['id'] == $gtri5['exe_id']) && !empty($gtri5['url_chua_chuan'])) {
                        ?>
                                                                                                <a href="<?php echo base_url() . 'student2/studying/download2/' . str_replace("=", "", base64_encode($gtri5['url_chua_chuan'])); ?>">Tải file đáp án chuẩn ở đây </a>
                                                                                            <?php }
                                                                                        } ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row gr5-row2-form2">
                                                                                    <div class="col-md-3 gr5-name-form">
                                                                                        <p><strong>Video đáp án: </strong></p>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                <?php
                foreach ($bai_chua as $key6 => $gtri6) {
                    if (($value['id'] == $gtri6['exe_id']) && !empty($gtri6['url_video'])) {
                        ?>
                                                                                                <a href="<?php echo base_url() . 'student2/studying/download2/' . str_replace("=", "", base64_encode($gtri6['url_video'])); ?>">Tải video bài chữa ở đây </a>
                                                                                                <?php }
                                                                                            } ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row gr5-row2-form2">
                                                                                    <div class="col-md-3 gr5-name-form">
                                                                                        <p><strong>Ghi chú: </strong></p>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <p><?php
                                                                            foreach ($bai_chua as $key3 => $gtri3) {
                                                                                if ($value['id'] == $gtri3['exe_id']) {
                                                                                    echo $gtri3['note'];
                                                                                }
                                                                            }
                                                                                            ?></p>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                <?php
            }
        }
        ?>


                                        </th>
                                    </tr>
    <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="btn-group pull-right">								   

                        <div class="dataTables_paginate paging_bootstrap pull-right">

    <?php echo $paging ?>

                        </div>								

                    </div>
                </section>

            </div>
        </div>
    </div>
<?php } ?>



<!--*********************************************************DUNG TT (hết)***********************************************-->

<style>
    .btn {background-image: none;}
    #upload_file .gr5-form {
        border: none;
    }
</style>