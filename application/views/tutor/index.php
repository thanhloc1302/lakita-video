<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/course_purchase.css?ver=<?php echo _VER_CACHED_ ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/style.bootstrap8.lakita.css?ver=<?php echo _VER_CACHED_ ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/datepicker.css" />

<script type="text/javascript" src="<?php echo base_url(); ?>plugin/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>styles/v2.0/js/bootstrap-datepicker.js"></script>

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
            <div class="col-md-10 col-md-offset-2">
            <a href="<?php echo base_url(); ?>tro-giang.html" class="btn btn-success"> comment</a>
            <a href="<?php echo base_url(); ?>tutor/report_comment" class="btn btn-warning"> báo cáo</a>
            </div>
            <div class="col-md-12" >

                <form id="formcustom" action="tutor/index2" method="get" class="form-horizontal">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Hiển thị:</label>
                        <select name="status" class="col-sm-10">
                            <option value="1" <?php if ($status == 1) { ?>selected="selected"<?php } ?>>Tất cả</option>
                            <option value="2" <?php if ($status == 2) { ?>selected="selected"<?php } ?>>Chưa trả lời</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Khóa học:</label>
                        <select name="course" class="col-sm-10">
                            <option value="0" selected="selected">Tất cả</option>
                            <?php
                            foreach ($courses_tutor as $key7 => $value7) {
                                ?>
                                <option  
                                <?php if ($course_picked == $value7['id']) { ?>
                                        selected="selected"  
                                    <?php } ?>
                                    value="<?php echo $value7['id']; ?>"> <?php echo $value7['id'].' - '.$value7['name']; ?>  </option> 
                                    <?php
                                }
                                ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Loại bình luận:</label>
                        <select name="type" class="col-sm-10">
                            <option <?php if ($type == 0) echo 'selected' ?> value="0" >Tất cả</option>
                            <option <?php if ($type == 2) echo 'selected' ?> value="2">Hỏi chuyên môn</option>
                            <option <?php if ($type == 5) echo 'selected' ?> value="5">Hỏi kỹ thuật</option>
                            <option <?php if ($type == 3) echo 'selected' ?> value="3">Khen</option>
                            <option <?php if ($type == 4) echo 'selected' ?> value="4">Chê</option>
                            <option <?php if ($type == 1) echo 'selected' ?> value="1">Khác</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Từ ngày:</label>
                        <input type='text' name="start_date" class="col-sm-10" id='datepicker1' data-date-format="dd-mm-yyyy" value="<?php if ($start_date != 0) echo date('d-m-Y', $start_date); ?>" />
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Đến Ngày:</label>
                        <input type='text' name="end_date" class="col-sm-10" id='datepicker2' data-date-format="dd-mm-yyyy" value="<?php if ($end_date != 0) echo date('d-m-Y', $end_date); ?>" />
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10" style="padding:0px">
                            <button type="submit" class="btn btn-success">Lọc</button>
                        </div>
                    </div>


                </form>
            </div>

            <div class="col-md-11 col-xs-offset-2" style="margin-bottom: 20px;">
                <strong><h1>Tổng số comments: <?php echo $tong_cmt; ?></h1></strong>
            </div>


        </div>
        <div id="list_cmt">
            <?php $this->load->view('tutor/load_cmt2'); ?>
            <?php echo $paging ?>
        </div>
    </div>
</div>

<?php $this->load->view('tutor/action_comment'); ?>
<style>
    #list_cmt *{
        font-family: RobotoCondensed-Regular;
        font-size: 16px;
    }

</style>
<script type="text/javascript">
    $(function () {
        $('#datepicker1').datepicker();
    });
    $(function () {
        $('#datepicker2').datepicker();
    });

    $(".type_cmt").change(function () {
        var type = $(this).val();
        var id_cmt = $(this).attr('code');
        jQuery.ajax({
            type: "POST",
            url: 'tutor/update_type',
            data: {
                id_cmt: id_cmt,
                type: type
            },
            dataType: "text",
            scriptCharset: "utf-8",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            success: function (response) {
                console.log(response);
            }
        });
    });


</script>
