<?php if (!$this->agent->is_mobile()) { ?>
    <header>
        <div class="row header-row-1">
            <div class="col-md-5">
                <a href="https://lakita.vn/khoa-hoc-cua-toi.html" class="back"><i class="fa fa-reply" aria-hidden="true"></i> Trở lại  </a>
            </div>
            <div class="col-md-6">

            </div>
            <div class="col-md-1" id="ring">
                <i class="fa fa-bell" aria-hidden="true"></i>
            </div>
        </div>
        <div class="row header-row-2">
            <h3> <?php echo $course_name; ?></h3>
            <div class="row">
                <div class="col-md-3">
                    <p id="head-text1">Tổng số <?php echo $total_video; ?> bài học</p>
                    <p id="head-text1">Bạn đã hoàn thành:</p>
                </div>
                <div class="col-md-6">
                    <p id="head-text2"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $count_all_learn; ?>/ <?php echo $total_video; ?> </p>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar"
                             aria-valuenow="<?php echo 100 * $count_all_learn / $total_video; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo 100 * $count_all_learn / $total_video; ?>%">
                            <?php echo round(100 * $count_all_learn / $total_video); ?>%
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php } else { ?>
    <?php $this->load->view('mobile/navbar'); ?>
<?php } ?>

