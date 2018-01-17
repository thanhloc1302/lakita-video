<?php $this->load->view('mobile/navbar'); ?>
<div class="container">
    <div class="row" style="font-family: RobotoCondensed-Regular; overflow: hidden">
        <div class="col-xs-12">
            <h3> KẾT QUẢ TÌM KIẾM </h3>
            <div class="listCourse">
                <div class="container">
                    <div class="row">
                        <?php $this->load->view('template/list_course') ?>
                    </div>
                </div>
            </div>
            <link type="text/css" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/home.css?ver=<?php echo _VER_CACHED_ ?>" />
            <div class="Testimonials">
                <div class="testimonial"> <strong>  CẢM NHẬN HỌC VIÊN </strong> </div>
                <p class="testimonial2"> Những nhận xét của các học viên khi tham gia khóa học lại Lakita </p>
                <div class="container">
                    <?php $this->load->view('mobile/home/testimonial'); ?>
                </div>
            </div>
        </div>
    </div>
</div>