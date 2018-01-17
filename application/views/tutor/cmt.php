<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/course_purchase.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/style.bootstrap8.lakita.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>plugin/ckeditor/ckeditor.js"></script>
<div class="header">
    <?php $this->load->view('home/navbar'); ?>
    <div class="row">
        <div class="col-md-6  my-row-1">
            <h1> <strong>DANH SÁCH CÁC CÂU HỎI CỦA HỌC VIÊN </strong></h1>
        </div>
        <div class="col-md-6 searchBox">
<!--            <form action="<?php echo base_url(); ?>course/search" method="post" id="searchForm">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <label for="exampleInputEmail1" class="sr-only">Search</label>
                        <input type="text" class="form-control" id="key_word" name="key_word" value="Tìm các khóa học bạn quan tâm...">
                        <img class="searchIcon"src="<?php echo base_url(); ?>styles/v2.0/img/icon_seach.png" />
                    </div>
                </div>
            </form>-->
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div id="list_cmt">
                <?php
                foreach ($student_ids as $key => $value) {
                    $comment = $this->lib_mod->load_all_where_in('comment', '', array('parent' => '', 'student_id' => $value['student_id']), array('courses_id' => [37, 10, 41, 65, 67, 39, 16, 69]), '', '', array('createdate' => 'desc'));
                    if (isset($comment[0])) {
                        foreach ($comment as $key => $cmt1) {
                            $student = $this->lib_mod->detail('student', array('id' => $cmt1['student_id']));
                            if (isset($student[0])) {
                                if ($cmt1['courses_id'] != 0 && $cmt1['learn_id'] != 0) {
                                    $learn = $this->lib_mod->detail('learn', array('id' => $cmt1['learn_id']));
                                   if( isset($learn[0]))
                                    $learn_slug = base_url().$learn[0]['slug'].'-4'.$learn[0]['id'].'.html';
                                   else $learn_slug= '';
                                    $course = $this->lib_mod->detail('courses', array('id' => $cmt1['courses_id']));
                                    $course_name = $course[0]['name'];
                                }
                                ?>
                                <div class="row margintop10">
                                    <div class="col-md-2 text-right">
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
                                        <?php echo ' - '. $student[0]['email'] . ' - '. $student[0]['phone'] . ' - ';?>
                                    </div>
                                    <div class="col-md-10">
                                        <span> <span class="lakita"> <?php echo $student[0]['name']; ?> </span> &nbsp;&nbsp;&nbsp; bình luận lúc 
                                            <?php echo date('H:i:s d/m/Y', $cmt1['createdate']); ?>,
                                            <?php if ($cmt1['courses_id'] != 0 && $cmt1['learn_id'] != 0) { ?>
                                                trong khóa học "<?php echo $course_name; ?>", tại <a href="<?php echo $learn_slug; ?>">  bài <?php echo isset($learn[0]) ? $learn[0]['sort'] : ''; ?> </a>
                                            <?php } ?>
                                        </span>

                                        <p>
                                            <?php echo ($cmt1['content']); ?>
                                        </p>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                        <hr>
                        <?php
                    }
                }
                ?> 
            </div>
        </div>
    </div>
</div>

<style>
    #list_cmt *{
        font-family: RobotoCondensed-Regular;
        font-size: 16px;
    }
    #list_cmt ul, #list_cmt ol{
    list-style-type: initial;
}
#list_cmt em{
    font-style: italic;
}

</style>
