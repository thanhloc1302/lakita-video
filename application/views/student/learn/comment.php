<!--============================thảo luận ================================================-->
<div class="row gr1-row-4" data-step="4" data-intro="Bạn có thể để lại comment ở đây">
    <div class="row gr1-row4-1">
        <p><i class="fa fa-comments" aria-hidden="true"></i></i><b> Thảo luận</b></p>
    </div>
    <div class="row gr1-row4-2">
        <div class="col-md-2">
            <img src="<?php
            if (!empty($student[0]['thumbnail'])) {
                echo 'https://lakita.vn/' . $student[0]['thumbnail'];
            } else {
                if (!empty($student[0]['id_fb'])) {
                    echo 'https://graph.facebook.com/' . $student[0]['id_fb'] . '/picture?type=large';
                } else {
                    echo 'https://lakita.vn/' . 'styles/images/people/110/user.png';
                }
            }
            ?>" alt="" class="img-circle img-responsive avatar" />
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label for="">Tiêu đề</label>
                <input type="text" class="form-control" id="content_cmt" style="padding: 23px 12px;" placeholder="Nhập nội dung tiêu đề cần thảo luận">
            </div>
            <textarea style="width:100%" name="editor1" class="form-control" rows="5" cols="120" required placeholder="Thảo luận về những thắc mắc, khó khăn khi bạn xem video bài giảng. Không đăng thảo luận không liên quan đến chủ đề học. Cảm ơn bạn!"></textarea>
            <script>
                CKEDITOR.replace('editor1', {width: '567px', height: '200px'});
                CKEDITOR.add;
            </script>
            <div class="input-group-btn1 text-center margintop10">
                <button class="btn btn-primary my-btn" id="save_cmt">Đăng thảo luận</button>

            </div>
        </div>
    </div>
</div>
<hr style="margin: 20px 15px; width: 95%;">


<div id="list_cmt">
    <?php $this->load->view('course/load_cmt'); ?>
</div>
<div class="col-md-offset-1">
    <a href="#" class="load_more_cmt">Tải bình luận cũ hơn</a>
</div>
<!--============================thảo luận (hết) ==========================================-->