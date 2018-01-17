<?php $this->load->view('mobile/navbar'); ?>
<div class="container" style="margin-top: -10px; overflow: hidden; font-family: RobotoCondensed-Regular;">
    <div class="row method">
        <div class="col-xs-12 purchase-info">
            <p style="font-size: 20px;"> <strong> Đặt mua khóa học thành công. Cảm ơn bạn đã đặt mua khóa học trên Lakita! </strong> </p>
            <p class="info-title">                      
                <strong>Thông tin đặt mua khóa học</strong>                 
            </p>
            <p> <strong> <?php echo $this->session->tempdata('temp_cod_name'); ?></strong> </p>
            <p> Địa chỉ: <strong> <?php echo $this->session->tempdata('temp_cod_dia_chi'); ?> </strong></p>
            <p> Điện thoại: <strong> <?php echo $this->session->tempdata('temp_cod_phone'); ?> </strong></p>
            <p> Email xác nhận: <strong> <?php echo $this->session->tempdata('temp_cod_email'); ?> </strong></p>
            <hr />
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <p class="lakita"> <strong> Khóa học </strong></p>
            <div>
                <img src="<?php echo 'https://lakita.vn/' . $curr_courses[0]['image']; ?>" alt="<?php echo $curr_courses[0]['name']; ?>" class="img-responsive" />
            </div>
            <p class="lakita margintop10"> <strong> <?php echo $curr_courses[0]['name']; ?></strong></p>
            <!--            <div>
                            <p> <strong> <?php
            $temp = $this->session->tempdata('priceVouched');
            if ($curr_courses[0]['time_start_sale'] < time() && $curr_courses[0]['time_end_sale'] > time() & $curr_courses[0]['time_start_sale'] != 0 & $curr_courses[0]['time_start_sale'] != 0) {
                $price_root = isset($temp) ? $temp : $curr_courses[0]['price_sale'];
            } else {
                $price_root = isset($temp) ? $temp : $curr_courses[0]['price_root2'];
            }
            echo number_format(str_replace('.', '', $price_root));
            ?> VNĐ</strong></p>
                        </div> -->
            <p> Được giao hàng bởi <img src="<?php echo base_url(); ?>styles/v2.0/img/course-purchase/viettel-post.png" /></p>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="row">
                <div class="col-xs-6 paddingright0">
                    <p> TỔNG CỘNG:</p>
                    <p> KHUYẾN MÃI: </p>
                    <p> PHÍ VẬN CHUYỂN: </p>
                    <hr>
                    <p> <strong> TỔNG THANH TOÁN: </strong></p>
                </div>
                <div class="col-xs-6 paddingleft0">
                    <p> <?php
                        echo number_format(str_replace('.', '', $curr_courses[0]['price_root2']));
                        ?> VNĐ </p>
                    <p>   <?php
                        if ($curr_courses[0]['time_start_sale'] < time() && $curr_courses[0]['time_end_sale'] > time() & $curr_courses[0]['time_start_sale'] != 0 & $curr_courses[0]['time_start_sale'] != 0) {
                            echo number_format(str_replace('.', '', (isset($temp) ? ( str_replace('.', '', $curr_courses[0]['price_root2']) - $temp) : ( str_replace('.', '', $curr_courses[0]['price_root2']) - str_replace('.', '', $curr_courses[0]['price_sale'])))));
                        } else {
                            echo number_format(str_replace('.', '', (isset($temp) ? ( str_replace('.', '', $curr_courses[0]['price_root2']) - $temp) : 0)));
                        }
                        ?> VNĐ </p>
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
                        ?>  VNĐ </strong></p>
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <h3 class="margintop45 marginbottom35 fontRoboto"> CÓ THỂ BẠN QUAN TÂM</h3>
    <div class="fontsize16">
        <div class="row listCourse">
            <?php
            foreach ($other_courses as $key => $value) {
                $firs_courses = array_filter(explode(',', $value['speaker_id']));
                $firs_courses = str_replace('-', '', $firs_courses[0]);
                $speaker = $this->lib_mod->detail('speaker', array('id' => $firs_courses));
                ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <a href="<?php echo base_url() . $value['slug'] . '-2' . $value['id']; ?>.html" title="<?php echo $value['name']; ?>">
                        <div> <img src="<?php echo 'https://lakita.vn/' . $value['image']; ?>" alt="<?php echo $value['name']; ?>" class="img-responsive"> </div>
                        <p class="courseName"><?php echo $value['name']; ?></p>
                    </a>
                    <p class="teacher"><?php echo $speaker[0]['name']; ?></p>
                    <p class="price"> <?php
            if ($curr_courses[0]['time_start_sale'] < time() && $curr_courses[0]['time_end_sale'] > time() & $curr_courses[0]['time_start_sale'] != 0 & $curr_courses[0]['time_start_sale'] != 0) {
                echo number_format(str_replace('.', '', $value['price_sale']), 0, ',', '.') . " đ";
            } else {
                echo number_format(str_replace('.', '', $value['price_root2']), 0, ',', '.') . " đ";
            }
                ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
</div>

<style>
    .method .purchase-info {
        border: none;
        padding: initial;
        font-size: 16px;
        padding-left: 15px;
        padding-top: 15px;
    }
    .info-title{    
        width: 130%;
        margin-left: -6%;
        padding-left: 5% !important;
    }
    @media (min-width: 767px){
        .listCourse > div {height: 405px}
    }
</style>