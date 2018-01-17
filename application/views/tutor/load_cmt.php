<?php
if (isset($comment[0]))
    foreach ($comment as $key => $cmt1) {
        $comment2 = $this->lib_mod->load_all('comment', '', array('parent' => $cmt1['id']), '', '', array('createdate' => 'asc'));
        $student = $this->lib_mod->detail('student', array('id' => $cmt1['student_id']));
        if (isset($student[0])) {
            if($cmt1['courses_id'] != 0 && $cmt1['learn_id'] != 0) {
                $learn = $this->lib_mod->detail('learn', array('id'=>$cmt1['learn_id']));
                $learn_slug = base_url().$learn[0]['slug'].'-4'.$learn[0]['id'].'.html';
                $learn_name = $learn[0]['name'];
                $course = $this->lib_mod->detail('courses', array('id'=>$cmt1['courses_id']));
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
                </div>
                <div class="col-md-10">
                    <span> <span class="lakita"> <?php echo $student[0]['name']; ?> </span> &nbsp;&nbsp;&nbsp; bình luận lúc 
                        <?php echo date('H:i:s d/m/Y', $cmt1['createdate']); ?>,
                    <?php  if($cmt1['courses_id'] != 0 && $cmt1['learn_id'] != 0) { ?>
                      trong khóa học "<?php echo $course_name; ?>", tại <a href="<?php echo $learn_slug; ?>">  bài <?php echo $learn[0]['sort']; ?> </a>
                    <?php }?>
                    </span>
                    
                    <p>
                        <?php echo ($cmt1['content']); ?>
                    </p>
                    <b><a href="javascript:void(0);" class="reply_parent" parentid="<?php echo $cmt1['id']; ?>" code="1">Trả lời</a></b>
                    <div style="display:none" class="rep_box" id ="rep_box_<?php echo $cmt1['id']; ?>">
                        <div class="form-group">
                            <div class="input-group input-group2">
                                <!-- /btn-group -->
                                <textarea name="editor_<?php echo $cmt1['id']; ?>" id="editor_<?php echo $cmt1['id']; ?>" class="form-control share-text" required placeholder="Nhập dữ liệu..." style="height: 36px;"></textarea>
                                <script>
                                    CKEDITOR.replace('editor_<?php echo $cmt1['id']; ?>', {width: '555px'});
                                    CKEDITOR.add;
                                </script>
                                <div class="text-center margintop10">
                                    <button class="btn btn-primary" url="<?php echo $learn_slug; ?>" course_id="<?php echo $cmt1['courses_id']; ?>" learn_id="<?php echo $cmt1['learn_id']; ?>" value='<?php echo $cmt1['id']; ?>' id="save_rep_<?php echo $cmt1['id']; ?>">Trả lời</button>
                                </div>
                            </div>
                            <!-- /input-group -->
                        </div>
                    </div>
                    
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
                    <b><a class="del_cmt" href="course/del_comment?cmtid=<?php echo $cmt1['id']; ?>&url=<?php echo $url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>"> Xóa </a></b>
                    <div style="display: inline">
                        <select>
                            <option <?php if($cmt1['type'] == 1){echo'selected';} ?> value="1">bình thường</option>
                            <option <?php if($cmt1['type'] == 2){echo'selected';} ?> value="2">hỏi</option>
                            <option <?php if($cmt1['type'] == 3){echo'selected';} ?> value="3">khen</option>
                            <option <?php if($cmt1['type'] == 4){echo'selected';} ?> value="4">chê</option>
                            <option <?php if($cmt1['type'] == 5){echo'selected';} ?> value="5">khác</option>
                        </select>
                    </div>
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
                                if($student2[0]['id'] == 3073 || $student2[0]['id'] == 4909) echo '<strong>'.$student2[0]['name'].'</strong>';
                                else echo $student2[0]['name']; ?> 
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
                    <b><a class="del_cmt" href="course/del_comment?cmtid=<?php echo $cmt2['id']; ?>&url=<?php echo $url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>"> Xóa </a></b>
                    <div style="display: inline">
                        <select>
                            <input type="checkbox" name="vehicle" value="Bike">I have a bike
<input type="checkbox" name="vehicle" value="Car">I have a car 
                        </select>
                    </div>
                        </div>
                    </div>
                    <?php
                }
            }
        ?>
        <hr>
        <?php
    } 
    ?>

                
                
