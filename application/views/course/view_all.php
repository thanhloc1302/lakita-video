<!--    <script src="<?php echo base_url(); ?>styles/v2.0/js/home.js"></script>-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/view_all.css?ver=<?php echo _VER_CACHED_ ?>" />
<script type="text/javascript" src="<?php echo base_url(); ?>styles/v2.0/js/view_all.min.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>styles/v2.0/js/login.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<?php if (!$this->agent->is_mobile()) { ?>
    <div class="header">
        <?php $this->load->view('home/navbar'); ?>
<!--        <div class="row">
            <div class="col-md-6  my-row-1">
                <h1> <strong>CÁC KHÓA HỌC HÀNG ĐẦU CỦA LAKITA </strong></h1>
                <h1> <?php echo $group_course_name; ?> </h1>
            </div>
            <div class="col-md-6 searchBox">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <label for="exampleInputEmail1" class="sr-only">Search</label>
                        <form action="<?php echo base_url(); ?>tim-kiem.html" method="post" id="searchForm">
                            <input type="text" class="form-control" id="key_word" name="key_word" value="Tìm các khóa học bạn quan tâm...">
                            <img alt="học excel cơ bản, excel cho kế toán, tự học excel" class="searchIcon"src="<?php echo base_url(); ?>styles/v2.0/img/icon_seach.png" />
                        </form>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
    <div class="allCourses">
        <ul class="nav nav-pills">
            <?php
            foreach ($group_courses as $key => $value) {
                ?>
                <li <?php if ($id == $value['id']) echo 'class="active"'; ?>>
                    <a href="<?php echo base_url() . 'nhom-khoa-hoc/' . $value['slug'] . '-'.$value['id'] .'.html'; ?>" class="fontsize16"><?php echo $value['name']; ?> </a>
                </li>
            <?php }
            ?>
        </ul>
    </div>
    <?php
}
else {
    ?>
    <?php $this->load->view('mobile/navbar'); ?>
   
<?php } ?>
<div class="listCourse">
    <div class="container">
        <div class="row">
            <?php $this->load->view('template/list_course'); ?>          
        </div>
        <div>
            <!--            <ul class="nextCourse">
                            <li> &lt; </li>
                            <li class="active">1</li>
                            <li >2</li>
                            <li >3</li>
                            <li >4</li>
                            <li >5</li>
                            <li> &gt; </li>
                        </ul>-->
        </div>
    </div>
</div>
<div class="container hidden-sm hidden-xs">
    <div class="TestimonialHighlight">
        <div class="testimonial"><span class="circle"></span> CẢM NHẬN HỌC VIÊN <span class="circle"></span></div>
        <div class="carousel slide hidden-sm hidden-xs" id="carousel-example-generic1" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php
                $i = 0;
                for ($i = 0; $i < count($rates); $i++) {
                    ?>
                    <li data-target="#carousel-example-generic1" data-slide-to="<?php echo $i; ?>" class="<?php echo ($i == 0) ? 'active' : ''; ?>"></li>
                <?php } ?>
            </ol>

            <div class="carousel-inner" role="listbox">
                <?php
                $i = 0;
                foreach ($rates as $key => $value) {
                    echo ' <div class="item ' . (($i++ == 0) ? 'active' : '') . '">
                             <div class="row">';
                    ?>
                    <div class="col-md-3 paddingtop15">
                        <img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" class="img-responsive avatar" src="<?php echo 'https://lakita.vn/' . $value['thumbnail']; ?>">
                    </div>
                    <div class="col-md-9">
                        <p class="name"> <?php echo $value['name']; ?> </p>
                        <p class="org">  <?php echo $value['org']; ?> </p>
                        <div class="row content2">
                            <div class="col-md-0-5">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-11" style="max-height: 118px; overflow: auto;">
                                <strong>
                                    <?php echo $value['description']; ?>
                                </strong>
                            </div>
                            <div class="col-md-0-5">
                                <i class="fa fa-quote-right" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</div>
</div>
<?php if ($this->agent->is_mobile()) { ?>
    <link type="text/css" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/home.css?ver=<?php echo _VER_CACHED_ ?>" />
    <div class="Testimonials">
        <div class="testimonial"> <strong>  CẢM NHẬN HỌC VIÊN </strong> </div>
        <p class="testimonial2"> Những nhận xét của các học viên khi tham gia khóa học lại Lakita </p>
        <div class="container">
            <?php $this->load->view('mobile/home/testimonial'); ?>
        </div>
    </div>
<?php } ?>
</div>
<script>
    $('.carousel').carousel({
        interval: 15000
    });
</script>


