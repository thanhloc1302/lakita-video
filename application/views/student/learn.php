<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/style.bootstrap12.lakita.css?ver=<?php echo _VER_CACHED_ ?>" />
<script type="text/javascript" src="<?php echo base_url(); ?>plugin/ckeditor/ckeditor.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>styles/v2.0/js/swfobject.js?ver=<?php echo _VER_CACHED_ ?>" ></script>
<?php $this->load->view('student/learn/header') ?>
<div class="row" <?php
if ($this->agent->is_mobile()) {
    echo 'style="margin-top: -20px;"';
}
?>>
    <div class="col-md-8 col-xs-12 col-sm-12" style="font-size: 16px">
        <?php $this->load->view('student/learn/player') ?>
        <?php if (!$this->agent->is_mobile()) { ?>
            <div class="row gr1-row-2">
                <div class="col-md-5 gr1-col-1">
                    <p><i class="fa fa-toggle-on" aria-hidden="true"></i><strong> Giảng viên</strong></p>
                </div>
                <div class="col-md-3 gr1-col-2">
                    <img src="<?php echo 'https://lakita.vn/'; ?>styles/v2.0/dungtt/img/bootstrap/12/gr2-img2.png"> &nbsp;&nbsp;
                    <a class="love_link">
                        <?php if (!count($love_course)) { ?>
                            <i class="fa fa-heart-o red" aria-hidden="true"></i>  Tôi thích khóa học này
                        <?php } else { ?>
                            <i class="fa fa-heart red" aria-hidden="true"></i>  Tôi thích khóa học này
                        <?php } ?>
                    </a> &nbsp;&nbsp;
                    <img src="<?php echo 'https://lakita.vn/'; ?>styles/v2.0/dungtt/img/bootstrap/12/gr2-img2.png">
                </div>
                <div class="col-md-2 gr1-col-3">
                    <a ><strong>Đánh giá &nbsp;&nbsp;</strong></a>
                    <i class="fa fa-star-o vote_icon_click" aria-hidden="true" style="color: red;"></i>
                    <i class="fa fa-star-o vote_icon_click" aria-hidden="true" style="color: red;"></i>
                    <i class="fa fa-star-o vote_icon_click" aria-hidden="true" style="color: red;"></i>
                    <i class="fa fa-star-o vote_icon_click" aria-hidden="true" style="color: red;"></i>
                    <i class="fa fa-star-o vote_icon_click" aria-hidden="true" style="color: red;"></i>
                    <a href="#click_to_vote" data-toggle="modal" class="hidden vote_link"> 
                    </a> 
                </div>
                <div class="col-md-2 gr1-col-4">
                    <img src="<?php echo 'https://lakita.vn/'; ?>styles/v2.0/dungtt/img/bootstrap/12/gr2-img3.png">
                    <a> Nhấn vào đây để đánh giá  </a>
                </div>
            </div>
            <hr style="margin-top: 0px; width: 93%;">
            <div class="row gr1-row-3">
                <div class="col-md-3">
                    <img src="<?php echo 'https://lakita.vn/' . $speaker[0]['image']; ?>" class="avatar img-responsive" style="width: 50px;">
                    <strong> <?php echo $speaker[0]['name']; ?> </strong>
                </div>
                <div class="col-md-3">
                    <p><i class="fa fa-envelope" aria-hidden="true" style="color: green;"></i><i style="font-style: normal;"> <?php echo $speaker[0]['name']; ?></i></p>
                </div>
                <div class="col-md-2">
                    <p><i class="fa fa-facebook" aria-hidden="true" style="color: green;"></i><i style="font-style: normal;"> <?php echo $speaker[0]['name']; ?></i></p>
                </div>
                <div class="col-md-4">
                    <p><i class="fa fa-twitter" aria-hidden="true" style="color: green;"></i><i style="font-style: normal;"> <?php echo $speaker[0]['name']; ?></i></p>
                </div>
            </div>
            <hr style="margin-top: 20px; width: 93%;">
            <?php $this->load->view('student/learn/comment') ?>
        <?php } ?>
    </div>
    <?php if (!$this->agent->is_mobile()) { ?>
        <div class="col-md-4">
            <div role="tabpanel" class="panel">
                <?php $this->load->view('student/learn/navtab') ?>
                <div class="tab-content">
                    <?php $this->load->view('student/learn/list_learn') ?>
                    <?php $this->load->view('student/learn/document') ?>
                    <?php $this->load->view('student/learn/note') ?>
                    <?php $this->load->view('student/learn/exercise') ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php if ($this->agent->is_mobile()) { ?>
    <div class="row">
        <div class="col-xs-12">
            <div role="tabpanel" class="panel">
                <?php $this->load->view('student/learn/navtab') ?>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="dsbaihoc">
                        <?php foreach ($chapter as $key => $value) { ?>
                            <p class="category"><?php echo $value['name']; ?></p>
                            <ul class="sidebar-block list-group list-group-menu list-group-minimal">
                                <?php
                                foreach ($all_learn[$key] as $key2 => $lvalue) {
                                    ?>
                                    <li id = "scroll<?php echo $lvalue['sort']; ?>" class="list-group-item <?php if ($curr_id == $lvalue['id']) echo 'active'; ?>">
                                        <a 
                                        <?php if ($trial_learn == 1 && !in_array($lvalue['id'], [269, 270, 271, 272, 273, 274, 275])) { ?>
                                                style="text-decoration: none;"
                                                <?php
                                            } else {
                                                ?>
                                                href="<?php echo base_url() . $lvalue['slug'] . '-4' . $lvalue['id']; ?>.html" 
                                            <?php } ?>
                                            title="<?php echo $lvalue['name']; ?>"><?php
                                                if (!isset($lvalue['learn_status'])) {
                                                    echo "<i class='fa fa-circle-o'></i>";
                                                } else {
                                                    switch ($lvalue['learn_status']) {
                                                        case 0:
                                                            echo "<i class='fa fa-check-circle lakita'></i>";
                                                            break;
                                                        default:
                                                            echo "<i class='fa fa-circle-o lakita'></i>";
                                                            break;
                                                    }
                                                }
                                                ?>
                                                <?php echo 'Bài ' . $lvalue['sort'] . ': ' . $lvalue['name']; ?>
                                            <span class="badge"><?php echo $lvalue['length']; ?></span>
                                        </a></li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="taitailieu">
                        <?php
                        if ($trial_learn == 1) {
                            echo '<p class="margintop10"> Bạn cần đăng ký khóa học để tải tài liệu! </p>';
                        } else {
                            if (isset($curr_learn[0])) {
                                $attach_file = array_filter(explode('@', $curr_learn[0]['attach_file']));
                                if (count($attach_file)) {
                                    $attach_desc = array_filter(explode('@', $curr_learn[0]['attach_desc']));
                                    ?>
                                    <ul class="sidebar-block list-group list-group-menu list-group-minimal">
                                        <?php
                                        foreach ($attach_file as $fkey => $file) {
                                            $filename = explode('/', $file);
                                            $filename = end($filename);
                                            ?>
                                            <li class="list-group-item">
                                                <a href="<?php echo 'https://lakita.vn/' . 'tai-ve.html/' . str_replace("=", "", base64_encode($file)); ?>">
                                                    <i class="fa fa-file-text"></i>&nbsp;&nbsp;
                                                    <?php
                                                    if (!empty($attach_desc[$fkey])) {
                                                        echo $attach_desc[$fkey];
                                                    } else {
                                                        echo $filename;
                                                    }
                                                    ?>
                                                    <span class="badge"><i class="fa fa-download"></i></span>
                                                </a>
                                                <?php $this->session->set_tempdata('is_downloadable', $curr_id, 3600); ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } else { ?>
                                    <p class="category">Không có file đính kèm</p>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="ghichu">
                        <?php
                        if ($trial_learn == 1) {
                            echo '<p class="margintop10"> Bạn cần đăng ký khóa học để viết ghi chú! </p>';
                        } else {
                            ?>
                            <div class="form-group" style="height:200px !important; margin-top: 10px;">
                                <textarea id="learn_note" rows="18" style="height:200px !important;color: #858585;" class="form-control" placeholder="Ghi chú của bạn"><?php if (isset($learn_note[0])) echo preg_replace("/<br[^>]*>\s*\r*\n*/is", "\n", $learn_note[0]['note']); ?></textarea>

                            </div>
                            <br>
                            <button class="btn btn-primary pull-right" type="button" id="save_note">Lưu ghi chú <i class="fa fa-plus"></i></button>
                        <?php } ?>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="nopbai">
                        <?php
                        if ($trial_learn == 1) {
                            echo '<p class="margintop10"> Bạn cần đăng ký khóa học để nộp bài tập! </p>';
                        } else {
                            ?>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<div>
    <?php $this->load->view('course/detail/vote_modal'); ?>
</div>

<script src="<?php echo base_url(); ?>styles/v2.0/js/learn.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<script src="<?php echo base_url(); ?>styles/v2.0/js/lktlayer.min.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<?php $this->load->view('student/action_comment'); ?>
<?php
if ($trial_learn == 1) {
    $this->session->set_tempdata('curr_course_id', $course_id, 3600 * 12);
    ?>
    <a href="<?php echo 'https://lakita.vn/' . $curr_course[0]['slug'] . '-3' . $curr_course[0]['id']; ?>.html">
        <img src="https://lakita.vn/styles/v2.0/img/event/hoc-thu.gif" class="img-responsive" style="position: fixed; bottom: 0; z-index: 100000000000;" />
    </a>
    <?php
}