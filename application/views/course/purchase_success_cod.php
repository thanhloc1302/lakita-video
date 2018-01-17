
<!--    <script src="<?php echo base_url(); ?>styles/v2.0/js/home.js"></script>-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/course_purchase.css?ver=<?php echo _VER_CACHED_ ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/style.bootstrap8.lakita.css?ver=<?php echo _VER_CACHED_ ?>" />
<script src="<?php echo base_url(); ?>styles/v2.0/js/course_purchase.min.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<?php
if ($this->agent->is_mobile())
    $this->load->view('mobile/mobile_purchase_success');
else {
    ?>
    <div class="header">
        <?php $this->load->view('home/navbar'); ?>
<!--        <div class="row">
            <div class="col-md-6  my-row-1">
                <h1> <strong> ĐẶT MUA KHÓA HỌC THÀNH CÔNG </strong></h1>
                <p> Cảm ơn bạn đã mua khóa học trên Lakita </p>
            </div>
            <div class="col-md-6 searchBox">
            </div>
        </div>-->
    </div>
    <div class="row method margintop10">
        <div class="col-md-offset-1 col-md-10 purchase-info">
            <p class="info-title">                      
                <strong>Thông tin đặt mua khóa học</strong>                 
            </p>
            <div class="purchase-info-cod col-md-10">
                <p> <strong> <?php echo $this->session->tempdata('temp_cod_name'); ?></strong> </p>
                <div class="row">
                    <div class="col-md-2">
                        <p> Địa chỉ: </p>
                        <p> Điện thoại: </p>
                        <p> Email xác nhận: </p>
                    </div>
                    <div class="col-md-10">
                        <p> <strong> <?php echo $this->session->tempdata('temp_cod_dia_chi'); ?> </strong></p>
                        <p> <strong> <?php echo $this->session->tempdata('temp_cod_phone'); ?> </strong></p>
                        <p> <strong> <?php echo $this->session->tempdata('temp_cod_email'); ?> </strong></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo 'https://lakita.vn/' . $curr_courses[0]['image']; ?>" alt="<?php echo $curr_courses[0]['name']; ?>" class="img-responsive" />
                    </div>
                    <div class="col-md-7">
                        <p class="lakita"> <strong> Khóa học </strong></p>
                        <h1 class="lakita" style="font-size: 20px;"> <strong> <?php echo $curr_courses[0]['name']; ?></strong></h1>
                        <p> Được giao hàng bởi <img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo base_url(); ?>styles/v2.0/img/course-purchase/viettel-post.png" /></p>
                    </div>
                    <div class="col-md-2">
                        <p></p>
                        <p> <strong> <?php
                                $temp = $this->session->tempdata('priceVouched');
                                echo number_format(str_replace('.', '', $curr_courses[0]['price_root2']));
                                ?> VNĐ</strong></p>
                    </div>                     
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-7">
                        <a href="<?php echo base_url(); ?>khoa-hoc/xem-tat-ca.html" class="btn btn-default btn-lg"> <i class="fa fa-reply" aria-hidden="true"></i> Quay trở lại </a>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-6 paddingright0">
                                <p> TỔNG CỘNG</p>
                                <p> KHUYẾN MÃI </p>
                                <p> PHÍ VẬN CHUYỂN </p>
                                <hr>
                                <p> <strong> TỔNG THANH TOÁN </strong></p>
                            </div>
                            <div class="col-md-6 paddingleft0">
                                <p> <?php
                                    echo number_format(str_replace('.', '', $curr_courses[0]['price_root2']));
                                    ?> VNĐ 
                                </p>
                                <p>  
                                    <?php
                                    if ($curr_courses[0]['time_start_sale'] < time() && $curr_courses[0]['time_end_sale'] > time() & $curr_courses[0]['time_start_sale'] != 0 & $curr_courses[0]['time_start_sale'] != 0) {
                                        echo number_format(str_replace('.', '', (isset($temp) ? ( str_replace('.', '', $curr_courses[0]['price_root2']) - $temp) : ( str_replace('.', '', $curr_courses[0]['price_root2']) - str_replace('.', '', $curr_courses[0]['price_sale'])))));
                                    } else {
                                        echo number_format(str_replace('.', '', (isset($temp) ? ( str_replace('.', '', $curr_courses[0]['price_root2']) - $temp) : 0)));
                                    }
                                    ?> VNĐ 
                                </p>
                                <p> 0 VNĐ</p>
                                <hr>
                                <p> <strong> <?php
//                                        $priceVouched = isset($temp) ? $temp : $curr_courses[0]['price_root'];
//                                        $priceVouched2 = isset($temp) ? $temp : $curr_courses[0]['price_root2'];
//                                        
//                                            echo number_format(str_replace('.', '', $priceVouched2));
                                        if (isset($temp)) {
                                            echo number_format(str_replace('.', '', $temp));
                                        } else {
                                            if ($curr_courses[0]['time_start_sale'] < time() && $curr_courses[0]['time_end_sale'] > time() & $curr_courses[0]['time_start_sale'] != 0 & $curr_courses[0]['time_start_sale'] != 0) {
                                                echo number_format(str_replace('.', '', $curr_courses[0]['price_sale']));
                                            } else {
                                                echo number_format(str_replace('.', '', $curr_courses[0]['price_root2']));
                                            }
                                        }
                                        ?> VNĐ </strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <h3 class="text-center margintop45 marginbottom35 fontRoboto"> CÓ THỂ BẠN QUAN TÂM</h3>
    <div class="container fontsize15">
        <div class="row listCourse">
            <?php
            foreach ($other_courses as $key => $value) {
                $firs_courses = array_filter(explode(',', $value['speaker_id']));
                $firs_courses = str_replace('-', '', $firs_courses[0]);
                $speaker = $this->lib_mod->detail('speaker', array('id' => $firs_courses));
                ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="height:405px">
                    <a href="<?php echo base_url() . $value['slug'] . '-2' . $value['id']; ?>.html" title="<?php echo $value['name']; ?>">
                        <div> <img alt="học excel cơ bản, excel cho kế toán, tự học excel" title="học excel cơ bản, excel cho kế toán, tự học excel" src="<?php echo 'https://lakita.vn/' . $value['image']; ?>" alt="<?php echo $value['name']; ?>" style="width:360px;height: 260px"> </div>
                        <p class="courseName" style="height:48px; margin-top: 20px"><?php echo $value['name']; ?></p>
                    </a>
                    <p class="teacher"><?php echo $speaker[0]['name']; ?></p>


                    <p class="price"> <?php echo number_format(str_replace('.', '', $value['price_root2']), 0, ',', '.') . " đ"; ?></p>


                </div>
    <?php } ?>
        </div>
    </div>
    </div>
    <?php
}


