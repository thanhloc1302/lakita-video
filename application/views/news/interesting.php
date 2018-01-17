<div class="panel panel-success" style="margin-top:15px">
  <div class="panel-heading">
    <h2 class="panel-title"><strong>Có thể bạn quan tâm</strong></h2>
  </div>
  <div class="panel-body">
    <?php
$i =1;
foreach ($interesting as $key => $value) {
    ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin:10px 0px 10px 0px">
        <a href="<?php echo base_url() . 'tin-tuc/' . $value['slug'] . '-' . $value['id']; ?>.html" title="<?php echo $value['name']; ?>">
            <div class="col-md-4" style="padding: 0px">
                <img src="<?php echo 'https://lakita.vn/' . $value['image_share']; ?>" alt="<?php echo $value['name']; ?>" 
                     title="<?php echo $value['name']; ?>" class="img-responsive "/> 
            </div>
            <div class="col-md-8">
                <h4><strong><?php echo $value['name']; ?></strong></h4>
                <h5><?php echo date('H:i d/m/Y', $value['create_date']); ?>&nbsp;&nbsp;<i class="fa fa-comment-o" aria-hidden="true">&nbsp;</i><?php echo rand(10,100) ?>&nbsp;&nbsp;<i class="fa fa-share" aria-hidden="true"></i>&nbsp;<?php echo rand(10,100) ?></h5> 
            </div>     
        </a>  
    </div>
    
    <?php
} ?>
  </div>
</div>
    

<div class="panel panel-success">
  <div class="panel-heading">
    <h2 class="panel-title"><strong>Khóa học nổi bật</strong></h2>
  </div>
  <div class="panel-body">
    <?php 
foreach ($course as $key => $value) {
    $firs_courses = array_filter(explode(',', $value['speaker_id']));
    $firs_courses = str_replace('-', '', $firs_courses[0]);
    $speaker = $this->lib_mod->detail('speaker', array('id' => $firs_courses));
    ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="text-align: center">
        <a href="<?php echo base_url() . $value['slug'] . '-2' . $value['id']; ?>.html" title="<?php echo $value['name']; ?>">
            <div class="img-course" > 
                <img src="<?php echo 'https://lakita.vn/' . $value['image']; ?>" alt="<?php echo $value['name']; ?>, học excel cơ bản, hoc excel co ban, excel kế toán, excel ke toan, làm chủ hóa đơn chứng từ, lam chu hoa don chung tu, lập báo cáo tài chính, lap bao cao tai chinh" 
                     title="<?php echo $value['name']; ?>" class="img-responsive "/> 
                     <?php
                     if (!$this->agent->is_mobile()) {
                         ?>
                    <!-- them dungtran --> 
                    <figure class="bginfo">
                        <button type="button">
                            <strong>XEM CHI TIẾT</strong>
                        </button>                
                        <p>Giá: <strong><?php
                                echo number_format(str_replace('.', '', $value['price_root2']), 0, ',', '.') . " đ";
                                ?> </strong></p>
                        <p id="some-lessons" class="fontOpenSans">
                            Số bài học: 
                            <strong>
        <?php
        //======================cần sửa lại ==============================
        echo count($this->lib_mod->detail('learn', array('courses_id' => $value['id'], 'status' => 1)));
        ?>
                            </strong>
                        </p>
                    </figure>
    <?php } ?>
            </div>
            <h4 class="courseName"><?php echo $value['name']; ?></h4>
        </a>
        <b class="teacher"><?php echo $speaker[0]['name']; ?></b>

        <p class="price2"> <?php echo number_format(str_replace('.', '', $value['price_root2']), 0, ',', '.') . " đ"; ?></p>
        <hr>
    </div>
    <?php
    if ($i % 3 == 0)
        echo '<div class="clearfix visible-md-block visible-lg-block"></div>';
    if ($i % 2 == 0)
        echo '<div class="clearfix visible-sm-block"></div>';
    $i++;
}
?>
  </div>
</div>




<?php
if (!$this->agent->is_mobile()) {
    ?>
    <script>
        /************************hover ảnh***************************/
        $('.img-course').mouseenter(function () {
            $(this).find(".bginfo").css('display', 'block');
        }).mouseleave(function () {
            $(this).find(".bginfo").css('display', 'none');
        });
    </script>
    <style>

        /************************ dungtranit thêm ************************************/
        .img-course{
            position: relative;
        }
        .bginfo {
            display: none;
            overflow: hidden;
            background-color: rgba(41,141,73,0.7);
            padding: 25px 20px 0;
            font-size: 12px;
            color: #000;
            line-height: 16px;
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width:100%;
            filter: alpha(opacity=0);
            pointer-events: none;
            color: #fff;
        }
        .bginfo button {
            font-family: RobotoCondensed-Bold;
            width: 170px;
            height: 40px;
            border: 2px solid #fff;
            border-radius: 25px;
            margin-top: 64px;
            background-color: rgba(255,255,255,0);
            font-size: 22px;
        }
        .bginfo #some-lessons {
            margin-top: 0px;
            font-size: 20px;
        }
        .bginfo p {
            font-size: 23px;
            margin-top: 30px;
        }
    </style>
    <!--them dungtran (hết)-->
    <?php
}
?>
<style>
    /*    @media (max-width: 350px){
            .one_course {
                height: 350px !important;
            }
        }*/
    #price_temp:before{
        border-bottom: 2px solid red;
        position: absolute;
        content: "";
        height: 50%;
        width: 59px;
    }

    @media (min-width:1200px){
        .imgcourse{
            width: 351px;
            height: 255px;
            object-fit: cover;
        }
    }

</style>