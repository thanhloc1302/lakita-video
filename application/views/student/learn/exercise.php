<div role="tabpanel" class="tab-pane" id="nopbai">
    <?php
    if ($trial_learn == 1) {
        echo '<p class="margintop10"> Bạn cần đăng ký khóa học để nộp bài tập! </p>';
    } else {
        ?>
        <!--modal de up file-->
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
                        <form class="form-horizontal" role="form" action="<?php echo 'https://lakita.vn/'; ?>student2/studying/action_upload" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
                            <div class="gr5-row-2 margintop22" role="tabpanel">
                                <div class="gr5-form">
                                    <div class="row gr5-row2-form2">
                                        <div class="col-md-3 gr5-name-form">
                                            <p><strong>Khóa học: </strong></p>
                                        </div>
                                        <div class="col-md-9">
                                            <label>Chọn file: </label>
                                            <input type="file" name="excel" size="25">
                                        </div>
                                    </div>
                                    <div class="row gr5-row2-form2 hidden">
                                        <div class="col-md-3 gr5-name-form">
                                            <p><strong>Khóa học: </strong></p>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-control" name="course_id_input">
                                                <option value="<?php echo $course_id; ?>"> <?php echo $course_name ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row gr5-row2-form2 hidden">
                                        <div class="col-md-3 gr5-name-form">
                                            <p><strong>Bài học: </strong></p>
                                        </div>
                                        <div class="col-md-9">
                                            <select  class="form-control" name="learn_id_input">
                                                <option value="<?php echo $curr_id; ?>">
                                                    <?php echo $curr_learn[0]["name"]; ?>
                                                </option>
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
    <?php } ?>
</div>