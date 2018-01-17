<div class="">
    <div class="modal fade" id="modal_course_love" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title"> &nbsp; &nbsp; &nbsp;SẢN PHẨM YÊU THÍCH </h3>
                </div>
                <div class="modal-body">
                    <div class="row listCourse" style="margin-top: 0px">
                        <?php
                        $i = 0;
                        foreach ($courses_love as $key => $value) {
                            $firs_courses = array_filter(explode(',', $value['speaker_id']));
                            $firs_courses = str_replace('-', '', $firs_courses[0]);
                            $speaker = $this->lib_mod->detail('speaker', array('id' => $firs_courses));
                            ?>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="height:330px">
                                <a href="<?php echo base_url() . $value['slug'] . '-2' . $value['id']; ?>.html" title="<?php echo $value['name']; ?>">
                                    <div> <img src="<?php echo 'https://lakita.vn/' . $value['image']; ?>" alt="<?php echo $value['name']; ?>, học excel cơ bản, excel cho kế toán, tự học excel" title="<?php echo $value['name']; ?>" class="img-responsive"> </div>
                                    <p class="courseName"><?php echo $value['name']; ?></p>
                                </a>
                                <p class="teacher"><?php echo $speaker[0]['name']; ?></p>
                                <p class="text-center"> <strong><?php echo number_format(str_replace('.', '', $value['price_root']), 0, ',', '.') . " VNĐ"; ?></strong></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    #modal_course_love{
        font-family: RobotoCondensed-Regular;
    }
    #modal_course_love .modal-header{
        background-color: #e4e4e4;
        color: #000;
    }
    #modal_course_love .close{
        opacity: 1;
    }
</style>