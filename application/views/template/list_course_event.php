<?php
$i=1;
foreach ($courses as $key => $value) {
    $firs_courses = array_filter(explode(',', $value['speaker_id']));
    $firs_courses = str_replace('-', '', $firs_courses[0]);
    $speaker = $this->lib_mod->detail('speaker', array('id' => $firs_courses));
    ?>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 one_course">
        <a href="<?php echo base_url() . $value['slug'] . '-2' . $value['id']; ?>.html" title="<?php echo $value['name']; ?>">
            <div class="img-course"> 
                <img src="<?php echo 'https://lakita.vn/' . $value['image']; ?>" alt="<?php echo $value['name']; ?>, học excel cơ bản, hoc excel co ban, excel kế toán, excel ke toan, làm chủ hóa đơn chứng từ, lam chu hoa don chung tu, lập báo cáo tài chính, lap bao cao tai chinh" 
                     title="<?php echo $value['name']; ?>" class="img-responsive imgcourse"/> 
                <?php
                if (!$this->agent->is_mobile()) {
                    ?>
                    <!-- them dungtran --> 
                    <figure class="bginfo">
                        <button type="button">
                            <strong>XEM CHI TIẾT</strong>
                        </button>
                        <p>Giá: <strong><?php echo number_format(str_replace('.', '', $value['price_root']), 0, ',', '.') . " đ"; ?> </strong></p>
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
            <p class="courseName"><?php echo $value['name']; ?></p>
        </a>
        <p class="teacher"><?php echo $speaker[0]['name']; ?></p>
        <p class="price" style="text-decoration: line-through red; font-size: 15px; margin-bottom: 0px; color:#888888"> <?php echo number_format(str_replace('.', '', $value['price_root_2']), 0, ',', '.') . " đ"; ?></p>
         <p class="price">  <?php echo number_format(str_replace('.', '', $value['price_root']), 0, ',', '.') . " đ"; ?></p>
    </div>
    <?php
    if($i%3==0) echo '<div class="clearfix visible-md-block visible-lg-block"></div>';
    if($i%2==0) echo '<div class="clearfix visible-sm-block"></div>';
    $i++;
}
?>
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