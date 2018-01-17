<style>
    .modal-backdrop.in{
        opacity: 0 !important
    }
    .cke{
        width: auto !important
    }
    .modal-dialog{
        margin: 0 !important;
        right: 0; bottom: 0;position: absolute; width: 100%; max-width: 700px;
    }
</style>


<table class="table table-bordered">
    <thead style="background-color:#167f34; color: #FFF; font-weight: bold">
    <td>
        ID
    </td>
    <td>
        Tên
    </td>
    <td>
        Thời gian
    </td>
    <td>
        Khóa học
    </td>
    <td>
        Bài học
    </td>
    <td>
        Nội dung
    </td>
    <td>
        Tác vụ
    </td>
    <td>
        Phân loại
    </td>

</thead>
<tbody>
    <?php
    if (isset($comment[0])) {
        foreach ($comment as $key => $cmt1) {
            $comment2 = $this->lib_mod->load_all('comment', '', array('parent' => $cmt1['id']), '', '', array('createdate' => 'asc'));
            $student = $this->lib_mod->detail('student', array('id' => $cmt1['student_id']));
            if($cmt1['courses_id'] != 0){
                $course = $this->lib_mod->detail('courses', array('id' => $cmt1['courses_id']));
                $course_name = $course[0]['name'];
                $learn_slug = base_url() . $course[0]['slug'] . '-7' . $course[0]['id'] . '.html';
            }
            if ($cmt1['courses_id'] != 0 && $cmt1['learn_id'] != 0) {
                $learn = $this->lib_mod->detail('learn', array('id' => $cmt1['learn_id']));
                if (!empty($learn)) {
                    $learn_slug = base_url() . $learn[0]['slug'] . '-4' . $learn[0]['id'] . '.html';
                    $learn_name = $learn[0]['name'];
                }
                
            }
            ?>
            <tr class="<?php
            if ($cmt1['rep'] == '0') {
                echo'warning';
            } else {
                echo 'success';
            }
            ?>" id="tr_<?php echo $cmt1['id']; ?>" >
                <td><?php echo $cmt1['id'] ?></td>
                <td><span class="lakita"> <?php
                        if (isset($student[0])) {
                            echo $student[0]['name'];
                        } else {
                            echo'Không xác định được học viên';
                        }
                        ?></span> </td> 
                <td><?php echo date('H:i:s d/m/Y', $cmt1['createdate']); ?></td>
                <?php if ($cmt1['courses_id'] != 0) { ?>
                    <td><?php echo $course_name; ?></td>
                <?php } else { ?>
                    <td> Không thể xác định khóa học </td>
                <?php } ?>
                <?php if ($cmt1['learn_id'] != 0 && !empty($learn[0])) { ?>
                    <td><a href="<?php echo $learn_slug; ?>">  bài <?php echo $learn[0]['sort']; ?> </a></td>
                <?php } else { ?>
                    <td> Không thể xác định bài học</td>
                <?php } ?>

                <td>
                    <?php echo ($cmt1['content']); ?>
                </td>
                <td>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $cmt1['id']; ?>">Trả lời </button>
                    <div class="modal fade" id="<?php echo $cmt1['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index:99999999999999">
                        <div class="modal-dialog">
                            <div class="modal-content" style="background-color:#FFF; ">
                                <div class="modal-header">
                                    <button type="button" data-dismiss="modal" style="right : 0">x</button>

                                </div>
                                <div class="modal-body" id="modal_body_<?php echo $cmt1['id'] ?>" style="max-height: 150px ; overflow: auto">
                                    <?php
                                    if (isset($comment2[0])) {
                                        foreach ($comment2 as $key => $cmt2) {
                                            $student2 = $this->lib_mod->detail('student', array('id' => $cmt2['student_id']));
                                            if (isset($student2[0])) {
                                                ?>
                                                <div class="row margintop10">
                                                    <div class="col-md-1 text-right marginleft25 paddingright0">
                                                        <img src="<?php
                                                        if (isset($student2[0]['id_fb']) && !empty($student2[0]['id_fb']))
                                                            echo 'https://graph.facebook.com/' . $student2[0]['id_fb'] . '/picture?type=large';
                                                        else {
                                                            if (isset($student2[0]['thumbnail']) && !empty($student2[0]['thumbnail']))
                                                                echo 'https://lakita.vn/' . $student2[0]['thumbnail'];
                                                            else
                                                                echo base_url() . 'styles/images/people/110/user.png';
                                                        }
                                                        ?>" alt="" class="img-circle height-30 width-30" />
                                                    </div>
                                                    <div class="col-md-11">
                                                        <span> <span class="lakita"> 
                                                                <?php
                                                                if ($student2[0]['id'] == 3073 || $student2[0]['id'] == 4909)
                                                                    echo '<strong>' . $student2[0]['name'] . '</strong>';
                                                                else
                                                                    echo $student2[0]['name'];
                                                                ?> 
                                                            </span> trả lời lúc &nbsp;
                                                            <?php echo date('H:i:s d/m/Y', $cmt2['createdate']); ?></span>
                                                        <p>
                                                            <?php echo ($cmt2['content']); ?>
                                                        </p>
                                                    </div>

                                                    <div class="col-md-9 col-md-offset-2">
                                                        <span>&nbsp;</span>
                                                        <b><a href="javascript:void(0);" class="repair_cmt" cmtid="<?php echo $cmt2['id']; ?>" code="2"> Sửa </a></b>
                                                        <div style="display:none" class="repair_box" id ="repair_box_<?php echo $cmt2['id']; ?>">
                                                            <div class="form-group">
                                                                <div class="input-group input-group2">
                                                                    <!-- /btn-group -->

                                                                    <textarea name="repair_editor_<?php echo $cmt2['id']; ?>" id="repair_editor_<?php echo $cmt2['id']; ?>" style="height: 36px;" class="form-control share-text" required ><?php echo $cmt2['content']; ?></textarea>
                                                                    <script>/* muốn css cái ô nhập text này thì thêm vào giữa 2 cái {} ở dưới*/
                                                                        CKEDITOR.replace('repair_editor_<?php echo $cmt2['id']; ?>', {});
                                                                        CKEDITOR.add;
                                                                    </script>
                                                                    <div class="text-center margintop10">
                                                                        <button class="btn btn-primary" value='<?php echo $cmt2['id']; ?>' id="save_repair_<?php echo $cmt2['id']; ?>">Sửa</button>
                                                                    </div>
                                                                </div>
                                                                <!-- /input-group -->
                                                            </div>
                                                        </div>

                                                        <span>&nbsp;</span>
                                                        <b><a clas="del_cmt" href="course/del_comment?cmtid=<?php echo $cmt2['id']; ?>&url=<?php echo $url = (!empty($_SERVER['HTTPS'])) ? "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] : "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>"> Xóa </a></b>
                                                    </div>

                                                </div>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>   
                                </div>    
                                <div class="modal-footer" style="padding : 0 0 10px 0">   
                                    <div class="rep_box" id ="rep_box_<?php echo $cmt1['id']; ?>">
                                        <div class="form-group">
                                            <div class="input-group2">
                                                <!-- /btn-group -->
                                                <div class=" col-md-10">
                                                    <textarea name="editor_<?php echo $cmt1['id']; ?>" id="editor_<?php echo $cmt1['id']; ?>" class="form-control share-text" required placeholder="Nhập dữ liệu..." style="height: 36px;"><?php $this->load->helper('cookie'); if(!is_null(get_cookie($cmt1['id']))){ echo get_cookie($cmt1['id']);} ?></textarea>
                                                    <script>
                                                        CKEDITOR.replace('editor_<?php echo $cmt1['id']; ?>', {height: '120px'});
                                                        CKEDITOR.add;
                                                    </script>
                                                </div>
                                                <div class="col-md-2" style="padding : 0;">
                                                    <button style=" float: left;" class="btn btn-primary" url="<?php echo $learn_slug; ?>" course_id="<?php echo $cmt1['courses_id']; ?>" learn_id="<?php echo $cmt1['learn_id']; ?>" value='<?php echo $cmt1['id']; ?>' id="save_rep_<?php echo $cmt1['id']; ?>">&nbsp;&nbsp;Trả lời&nbsp;&nbsp;&nbsp;</button>
                                                    <button style=" float: left; margin-left: 0; margin-top: 15px" class="btn btn-success" value='<?php echo $cmt1['id']; ?>' id="temp_rep_<?php echo $cmt1['id']; ?>">Lưu nháp</button>

                                                </div>
                                            </div>
                                            <!-- /input-group -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span>&nbsp;</span>
                    <a class="btn btn-warning del_cmt" href="course/del_comment?cmtid=<?php echo $cmt1['id']; ?>&url=<?php echo $url = (!empty($_SERVER['HTTPS'])) ? "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] : "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>"> &nbsp;&nbsp;Xóa&nbsp;&nbsp; </a>
                </td>
                <td>
                    <select class="type_cmt" <?php echo 'code="' . $cmt1['id'] . '"' ?> >
                        <option <?php
                        if ($cmt1['type'] == 2) {
                            echo'selected';
                        }
                        ?> value="2">Hỏi chuyên môn
                        </option>
                        <option <?php
                        if ($cmt1['type'] == 5) {
                            echo'selected';
                        }
                        ?> value="5">Hỏi kỹ thuật
                        </option>
                        <option <?php
                        if ($cmt1['type'] == 3) {
                            echo'selected';
                        }
                        ?> value="3">Khen
                        </option>
                        <option <?php
                        if ($cmt1['type'] == 4) {
                            echo'selected';
                        }
                        ?> value="4">Chê
                        </option>
                        <option <?php
                        if ($cmt1['type'] == 1) {
                            echo'selected';
                        }
                        ?> value="1">Khác
                        </option>
                    </select>
                </td>

            </tr>

            <?php
        }
    }
    ?>

</tbody>
</table>

