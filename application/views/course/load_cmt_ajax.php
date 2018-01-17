<?php if(isset($page) && !empty($page)){ ?>
<input type="hidden" class="pagenum" value="<?php echo $page ?>" /><input type="hidden" class="total-page" value="<?php echo $pages ?>" />
<?php } ?>
<?php

if (isset($comment[0]))
    foreach ($comment as $key => $cmt1) {
        $comment2 = $this->lib_mod->load_all('comment', '', array('parent' => $cmt1['id']), '', '', array('createdate' => 'asc'));
        $student = $this->lib_mod->detail('student', array('id' => $cmt1['student_id']));
        if (isset($student[0])) {
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
                </div>
                <div class="col-md-10">
                    <span> <span class="lakita"> <?php echo $student[0]['name']; ?> </span> &nbsp;&nbsp;&nbsp; bình luận lúc 
                        <?php echo date('H:i:s d/m/Y', $cmt1['createdate']); ?></span>
                    <p>
                        <?php echo $cmt1['content']; ?>
                    </p>
                    <b><a href="javascript:void(0);" class="reply_parent" parentid="<?php echo $cmt1['id']; ?>" code="1">Trả lời </a></b>
                    <div style="display:none" class="rep_box" id ="rep_box_<?php echo $cmt1['id']; ?>">
                        <div class="form-group">
                            <div class="input-group input-group2">
                                <!-- /btn-group -->
                                <textarea name="editor_<?php echo $cmt1['id']; ?>" id="editor_<?php echo $cmt1['id']; ?>" style="height: 36px;" class="form-control share-text" required placeholder="Nhập dữ liệu..." ></textarea>
                                <script>
                                    CKEDITOR.replace('editor_<?php echo $cmt1['id']; ?>', {width: '555px'});
                                    CKEDITOR.add;
                                </script>
                                <div class="text-center margintop10">
                                    <button class="btn btn-primary"  value='<?php echo $cmt1['id']; ?>' id="save_rep_<?php echo $cmt1['id']; ?>">Trả lời</button>
                                </div>
                            </div>
                            <!-- /input-group -->
                        </div>
                    </div>

                    <?php if ($cmt1['student_id'] == $this->session->userdata('user_id')) { ?>
                        <span>&nbsp;</span>
                        <b><a href="javascript:void(0);" class="repair_cmt" cmtid="<?php echo $cmt1['id']; ?>" code="2"> Sửa </a></b>
                        <div style="display:none" class="repair_box" id ="repair_box_<?php echo $cmt1['id']; ?>">
                            <div class="form-group">
                                <div class="input-group input-group2">
                                    <!-- /btn-group -->

                                    <textarea name="repair_editor_<?php echo $cmt1['id']; ?>" id="repair_editor_<?php echo $cmt1['id']; ?>" style="height: 36px;" class="form-control share-text" required ><?php echo $cmt1['content']; ?></textarea>
                                    <script>
                                        CKEDITOR.replace('repair_editor_<?php echo $cmt1['id']; ?>', {width: '555px'});
                                        CKEDITOR.add;
                                    </script>
                                    <div class="text-center margintop10">
                                        <button class="btn btn-primary" value='<?php echo $cmt1['id']; ?>' id="save_repair_<?php echo $cmt1['id']; ?>">Sửa</button>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>
                        </div>

                        <span>&nbsp;</span>
                        <b><a class="del_cmt" href="course/del_comment?cmtid=<?php echo $cmt1['id']; ?>&url=<?php echo $url = (!empty($_SERVER['HTTPS'])) ? "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] : "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>"> Xóa </a></b>

                    <?php } ?>
                </div>
            </div>
            <?php
        }
        if (isset($comment2[0]))
            foreach ($comment2 as $key => $cmt2) {
                $student2 = $this->lib_mod->detail('student', array('id' => $cmt2['student_id']));
                if (isset($student2[0])) {
                    ?>
                    <div class="row margintop10">
                        <div class="col-md-2 text-right marginleft25 paddingright0">
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
                        <div class="col-md-9">
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
                                <?php echo $cmt2['content']; ?>
                            </p>
                        </div>

                        <?php if ($cmt2['student_id'] == $this->session->userdata('user_id')) { ?>
                            <div class="col-md-9 col-md-offset-2">
                                <span>&nbsp;</span>
                                <b><a href="javascript:void(0);" class="repair_cmt" cmtid="<?php echo $cmt2['id']; ?>" code="2"> Sửa </a></b>
                                <div style="display:none" class="repair_box" id ="repair_box_<?php echo $cmt2['id']; ?>">
                                    <div class="form-group">
                                        <div class="input-group input-group2">
                                            <!-- /btn-group -->

                                            <textarea name="repair_editor_<?php echo $cmt2['id']; ?>" id="repair_editor_<?php echo $cmt2['id']; ?>" style="height: 36px;" class="form-control share-text" required ><?php echo $cmt2['content']; ?></textarea>
                                            <script>
                                                CKEDITOR.replace('repair_editor_<?php echo $cmt2['id']; ?>', {width: '555px'});
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
                                <b><a class="del_cmt" href="course/del_comment?cmtid=<?php echo $cmt2['id']; ?>&url=<?php echo $url = (!empty($_SERVER['HTTPS'])) ? "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] : "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>" > Xóa </a></b>

                            </div>
                        <?php } ?>


                    </div>


                    <?php
                }
            }
        ?>
        <hr>
        <?php
    } 
