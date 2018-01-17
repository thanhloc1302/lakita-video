<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/course_purchase.css?ver=<?php echo _VER_CACHED_ ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/style.bootstrap8.lakita.css?ver=<?php echo _VER_CACHED_ ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/datepicker.css" />

<script type="text/javascript" src="<?php echo base_url(); ?>plugin/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>styles/v2.0/js/bootstrap-datepicker.js"></script>

<div class="header">
    <?php $this->load->view('home/navbar'); ?>
    <div class="row">
        <div class="col-md-6  my-row-1">
            <h1> <strong>Báo cáo trợ giảng </strong></h1>
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
        <div class="col-md-12">
            <div class="col-md-10 col-md-offset-2">
                <a href="<?php echo base_url(); ?>tro-giang.html" class="btn btn-success"> comment</a>
                <a href="<?php echo base_url(); ?>tutor/report_comment" class="btn btn-warning"> báo cáo</a>
            </div>
            <div class="col-md-12" style="margin-top: 15px; margin-bottom: 15px">
                <form action="tutor/result_report_comment" method="post" class="form-inline" role="form">
                    <div class="form-group">
                        <select class="selectpicker" name="courseID[]" id="courseID" multiple title="Chọn khóa học">
                            <option value="0">Tất cả</option>
                            <?php
                            foreach ($courses as $key => $cour) {
                                ?>
                                <option value="<?php echo $cour['id']; ?>"><?php echo $cour['course_code'] . ' - ' . $cour['name']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="selectpicker" name="type[]" id="courseID" multiple title="Loại">
                            <option value="0">Tất cả</option>
                            <option value="2">Hỏi chuyên môn</option>
                            <option value="5">Hỏi kỹ thuật</option>
                            <option value="3">Khen</option>
                            <option value="4">Chê</option>
                            <option value="1">Khác</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type='text' name="start_date" class="form-control" id='datepicker1' data-date-format="dd-mm-yyyy" placeholder="Ngày bắt đầu" value="<?php if(!empty($start_date)) echo $start_date; ?>" />
                    </div>
                    <div class="form-group">
                        <input type='text' name="end_date" class="form-control" id='datepicker2' data-date-format="dd-mm-yyyy" placeholder="Ngày kết thúc" />
                    </div>
                    <button type="submit" class="btn btn-default">Xác nhận</button>
                </form>
            </div>
        </div>

    </div>
</div>
<?php if (isset($comments)) { ?>
    <table class="table table-bordered table-hover">
        <thead style="background-color: #167f34; color: #FFF; font-weight: bold">
            <?php $a = array_slice($comments, 0, 1); ?>
        <td>
            Mã khóa học
        </td>
        <td>
            Số bình luận theo khóa
        </td>
        <?php if (array_key_exists('type_2', $a[0]['type'])) { ?>
            <td>
                Hỏi chuyên môn
            </td>
            <td>
                Hỏi chuyên môn chưa trả lời
            </td>
            <td>
                Hỏi chuyên môn đã trả lời
            </td>
            <td>
                Hỏi chuyên môn /khóa 
            </td>
            <td>
                Hỏi chuyên môn /tất cả 
            </td>
        <?php } ?>
        <?php if (array_key_exists('type_5', $a[0]['type'])) { ?>
            <td>
                Hỏi kỹ thuật
            </td>
            <td>
                Hỏi kỹ thuật chưa rep
            </td>
            <td>
                Hỏi kỹ thuật đã trả lời
            </td>
            <td>
                Hỏi kỹ thuật /khóa 
            </td>
            <td>
                Hỏi kỹ thuật /tất cả 
            </td>
        <?php } ?>
        <?php if (array_key_exists('type_3', $a[0]['type'])) { ?>
            <td>
                Khen
            </td>
            <td>
                Khen chưa trả lời
            </td>
            <td>
                Khen đã trả lời
            </td>
            <td>
                Khen /khóa 
            </td>
            <td>
                Khen /tất cả 
            </td>
        <?php } ?>
        <?php if (array_key_exists('type_4', $a[0]['type'])) { ?>
            <td>
                Chê
            </td>
            <td>
                Chê chưa trả lời
            </td>
            <td>
                Chê đã trả lời
            </td>
            <td>
                Chê /khóa 
            </td>
            <td>
                Chê /tất cả 
            </td>
        <?php } ?>
        <?php if (array_key_exists('type_1', $a[0]['type'])) { ?>
            <td>
                Khác
            </td>
            <td>
                Khác chưa trả lời
            </td>
            <td>
                Khác đã trả lời
            </td>
            <td>
                Khác /khóa 
            </td>
            <td>
                Khác /tất cả 
            </td>
        <?php } ?>
    </thead>
    <tbody>
        <?php foreach ($comments as $value) { ?>
            <tr>
                <td>
                    <?php echo $value['course_code']; ?>
                </td>
                <td style="background-color: red; color: #FFF; font-weight: bold">
                    <?php echo $value['num_course_comments']; ?>
                </td>
                <?php if (array_key_exists('type_2', $value['type'])) { ?>
                    <td>
                        <?php echo $value['type']['type_2']; ?>
                    </td>
                    <td>
                        <?php echo $value['type']['type_2_no_rep']; ?>
                    </td>
                    <td>
                        <?php echo $value['type']['type_2_reped']; ?>
                    </td>
                    <td style="background-color: red; color: #FFF; font-weight: bold">
                        <?php
                        if ($value['num_course_comments'] != '0') {
                            echo round($value['type']['type_2'] / $value['num_course_comments'] * 100, 2) . '%';
                        } else {
                            echo '0%';
                        }
                        ?>
                    </td>
                    <td style="background-color: red; color: #FFF; font-weight: bold">
                    <?php echo round($value['type']['type_2'] / $num_all_comments * 100, 2) . '%'; ?>
                    </td>
                    <?php } ?>
                    <?php if (array_key_exists('type_5', $value['type'])) { ?>
                    <td>
                        <?php echo $value['type']['type_5']; ?>
                    </td>
                    <td>
                        <?php echo $value['type']['type_5_no_rep']; ?>
                    </td>
                    <td>
                        <?php echo $value['type']['type_5_reped']; ?>
                    </td>
                    <td style="background-color: red; color: #FFF; font-weight: bold">
                        <?php
                        if ($value['num_course_comments'] != '0') {
                            echo round($value['type']['type_5'] / $value['num_course_comments'] * 100, 2) . '%';
                        } else {
                            echo '0%';
                        }
                        ?>
                    </td>
                    <td style="background-color: red; color: #FFF; font-weight: bold">
                        <?php echo round($value['type']['type_5'] / $num_all_comments * 100, 2) . '%'; ?>
                    </td>
        <?php } ?>
                    <?php if (array_key_exists('type_3', $value['type'])) { ?>
                    <td>
            <?php echo $value['type']['type_3']; ?>
                    </td>
                    <td>
            <?php echo $value['type']['type_3_no_rep']; ?>
                    </td>
                    <td>
                        <?php echo $value['type']['type_3_reped']; ?>
                    </td>
                    <td style="background-color: red; color: #FFF; font-weight: bold">
                        <?php
                        if ($value['num_course_comments'] != '0') {
                            echo round($value['type']['type_3'] / $value['num_course_comments'] * 100, 2) . '%';
                        } else {
                            echo '0%';
                        }
                        ?>
                    </td>
                    <td style="background-color: red; color: #FFF; font-weight: bold">
            <?php echo round($value['type']['type_3'] / $num_all_comments * 100, 2) . '%'; ?>
                    </td>
                    <?php } ?>
        <?php if (array_key_exists('type_4', $value['type'])) { ?>
                    <td>
                        <?php echo $value['type']['type_4']; ?>
                    </td>
                    <td>
                        <?php echo $value['type']['type_4_no_rep']; ?>
                    </td>
                    <td>
                        <?php echo $value['type']['type_4_reped']; ?>
                    </td>
                    <td style="background-color: red; color: #FFF; font-weight: bold">
                        <?php
                        if ($value['num_course_comments'] != '0') {
                            echo round($value['type']['type_4'] / $value['num_course_comments'] * 100, 2) . '%';
                        } else {
                            echo '0%';
                        }
                        ?>
                    </td>
                    <td style="background-color: red; color: #FFF; font-weight: bold">
                        <?php echo round($value['type']['type_4'] / $num_all_comments * 100, 2) . '%'; ?>
                    </td>
                    <?php } ?>
                    <?php if (array_key_exists('type_1', $value['type'])) { ?>
                    <td>
                        <?php echo $value['type']['type_1']; ?>
                    </td>
                    <td>
                        <?php echo $value['type']['type_1_no_rep']; ?>
                    </td>
                    <td>
            <?php echo $value['type']['type_1_reped']; ?>
                    </td>
                    <td style="background-color: red; color: #FFF; font-weight: bold">
                    <?php
                    if ($value['num_course_comments'] != '0') {
                        echo round($value['type']['type_1'] / $value['num_course_comments'] * 100, 2) . '%';
                    } else {
                        echo '0%';
                    }
                    ?>
                    </td>
                    <td style="background-color: red; color: #FFF; font-weight: bold">
            <?php echo round($value['type']['type_1'] / $num_all_comments * 100, 2) . '%'; ?>
                    </td>             
        <?php } ?>
            </tr>
    <?php } ?>
    </tbody>
    </table>




<?php } ?>

<script type="text/javascript">
    $(function () {
        $('#datepicker1').datepicker();
    });
    $(function () {
        $('#datepicker2').datepicker();
    });



</script>
