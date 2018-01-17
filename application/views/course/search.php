<!--    <script src="<?php echo base_url(); ?>styles/v2.0/js/home.js"></script>-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/view_all.css?ver=<?php echo _VER_CACHED_ ?>" />
<script src="<?php echo base_url(); ?>styles/v2.0/js/view_all.min.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<script src="<?php echo base_url(); ?>styles/v2.0/js/login.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<?php
if ($this->agent->is_mobile())
    $this->load->view('mobile/search_mobile');
else {
    ?>
    <div class="header">
        <?php $this->load->view('home/navbar'); ?>
<!--        <div class="row">
            <div class="col-md-6  my-row-1">
                <h1> <strong>KẾT QUẢ TÌM KIẾM </strong></h1>
                <p> với từ khóa "<?php echo $keyword;?>" </p>
            </div>
            <div class="col-md-6 searchBox">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <form action="<?php echo base_url(); ?>tim-kiem.html" method="post" id="searchForm">
                            <label for="exampleInputEmail1" class="sr-only">Search</label>
                            <input type="text" class="form-control" id="key_word" name="key_word" value="Tìm các khóa học bạn quan tâm...">
                            <img alt="học excel, hoc excel, học excel cơ bản, tự học excel" title="học excel, hoc excel, học excel cơ bản, tự học excel" class="searchIcon"src="<?php echo base_url(); ?>styles/v2.0/img/icon_seach.png" />
                        </form>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
    <div class="allCourses hidden-sm hidden-xs">
        <ul class="nav nav-pills">
            <li class="active"><a>KẾT QUẢ TÌM KIẾM</a></li>
            <?php
            foreach ($group_courses as $key => $value) {
                ?>
                <li><a href="<?php echo base_url() . 'nhom-khoa-hoc/' . $value['slug'] . '-'.$value['id'] .'.html'; ?>"><?php echo $value['name']; ?> </a></li>
            <?php }
            ?>
        </ul>
    </div>
    <div class="listCourse">
        <div class="container">
            <div class="row">
                <?php $this->load->view('template/list_course') ?>
            </div>
        </div>
    </div>
    <div class="container">
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
                        <div class="col-md-2 col-md-offset-1 paddingtop15">
                            <img alt="học excel, hoc excel, học excel cơ bản, tự học excel" title="học excel, hoc excel, học excel cơ bản, tự học excel" class="img-responsive img-circle avatar" src="<?php echo 'https://lakita.vn/' . $value['thumbnail']; ?>">
                        </div>
                        <div class="col-md-9">
                            <p class="name"> <?php echo $value['name']; ?> </p>
                            <p class="org">  <?php echo $value['org']; ?> </p>
                            <div class="row content2">
                                <div class="col-md-0-5">
                                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                                </div>
                                <div class="col-md-11">
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
    <?php
} 



