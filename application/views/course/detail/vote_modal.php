<div class="modal fade" id="click_to_vote">
    <div class="modal-dialog">
        <div class="modal-content bgwhite">
            <div class="modal-header" style="background-color: #E4E4E4;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <p class="lakita fontRoboto" > <i class="fa fa-toggle-on" aria-hidden="true"></i> Đánh giá & nhận xét về khóa học </p>
            </div>
            <div class="modal-body">
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
                    <input type="hidden" name="vote_star_number" id="vote_star_number" value="0" />
                <div class="row">
                    <div class="col-md-8"> <strong> Mô tả đánh giá*  </strong> </div>
                    <div class="col-md-4 text-right"> Ký tự còn lại <span class="letter_remaining"> 2500 </span> </div>
                </div>
                <div class="form-group margintop10">
                    <label for="comment" class="sr-only">Comment:</label>
                    <textarea class="form-control" rows="5" id="vote_description" name="vote_description" required="required" placeholder="Nhập mô tả tại đây"></textarea>
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
                            <input type="text" class="form-control padding-10" disabled name="vote_user_name" id="vote_user_name" value="<?php echo $student[0]['name']; ?>" />
                            <input type="hidden" value="<?php echo $student[0]['id']; ?>" name="vote_user_id" id="vote_user_id"/>
                            
                            <?php
                        } else {
                            ?>
                            <input type="text" class="form-control padding-10" required="required" name="vote_user_name" id="vote_user_name" placeholder="Nhập tên của bạn để hiện thị cho người khác thấy" />
                            <input type="hidden" value="0" name="vote_user_id" id="vote_user_id" />
                            
                        <?php } 
                        $vote_course_id = $this->session->tempdata('curr_course_id');
                        if(isset($vote_course_id)) echo '<input type="hidden" name="vote_course_id" id="vote_course_id" value="'.$vote_course_id.'"';
                        else echo '<input type="hidden" name="vote_course_id" id="vote_course_id" value="'.$course_id.'"';
                        ?>
                            
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button class="btn btn-success vote_submit_btn"> Gửi đánh giá <i class="fa fa-star white" aria-hidden="true"></i> </button>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>styles/v2.0/js/vote.js?ver=<?php echo _VER_CACHED_ ?>"></script>