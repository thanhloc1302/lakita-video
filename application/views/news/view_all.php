<!-- trang chi tiết khóa học (mua khóa học) view/course/detail/index-->

<!--    <script src="<?php echo base_url(); ?>styles/v2.0/js/home.js"></script>-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/course_detail.css?ver=<?php echo _VER_CACHED_ ?>" />
<script src="<?php echo base_url(); ?>styles/v2.0/js/course_detail.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<?php

    ?>
    <div class="header">
        <?php 
        if ($this->agent->is_mobile()){
            $this->load->view('mobile/navbar');
        }else{
            $this->load->view('home/navbar'); 
        }?>
        <div class="row">
            <div class="col-md-6  my-row-1">
                <p class="group_course"> <?php echo $title; ?> </p>
            </div>
            <div class="col-md-6 searchBox">
                <form action="<?php echo base_url(); ?>tim-kiem.html" method="post" id="searchForm">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8">
                            <label for="exampleInputEmail1" class="sr-only">Search</label>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input type="text" class="form-control" id="key_word" name="key_word" value="Tìm các khóa học bạn quan tâm...">
                            <img alt="học excel, hoc excel, học excel cơ bản, tự học excel" title="học excel, hoc excel, học excel cơ bản, tự học excel" class="searchIcon" src="<?php echo base_url(); ?>styles/v2.0/img/icon_seach.png" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="course-summary paddingbottom30">
        <div class="container">
            <div class="dir"> <img alt="học excel, hoc excel, học excel cơ bản, tự học excel" title="học excel, hoc excel, học excel cơ bản, tự học excel" src="<?php echo base_url(); ?>styles/v2.0/img/course-detail/excel.png">
                <a href="https://lakita.vn"> Trang chủ </a> / 
                <a href="<?php echo base_url(); ?>tin-tuc.html"> Tin tức </a> 
            </div>
        </div>
    </div>

    <div class=" course-summary outline">
        <div class="container">
            <div class="row" style="background-color: #FFF">
                <?php
                foreach ($news as $key => $value) {
                    ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 one_course" style="margin-top: 25px">
                        <a href="<?php echo base_url() . 'tin-tuc/' . $value['slug'].'-' . $value['id']; ?>.html" title="<?php echo $value['name']; ?>">
                            <div class="img-course col-lg-3 col-md-3 col-sm-3 col-xs-3"> 
                                <img src="<?php echo base_url() . $value['image_share'];  ?>" alt="<?php echo $value['name'];  ?>" 
                                     title="<?php echo $value['name']; ?>" class="img-responsive imgcourse"/> 
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                <h3><?php echo $value['name']; ?></h3>
                                <p><?php echo date('H:i d/m/Y', $value['create_date']); ?></p>
                                <?php
                                echo $value['description'];
                                ?>
                            </div>
                        </a>              
                    </div>
                    <?php
                }
                ?>
            </div>
            <div style="float: right;display: block">
                <?php echo $paging ?>
            </div>
        </div>
    </div>








