<!--    <script src="<?php echo base_url(); ?>styles/v2.0/js/home.js"></script>-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/view_all.css?ver=<?php echo _VER_CACHED_ ?>" />
<script type="text/javascript" src="<?php echo base_url(); ?>styles/v2.0/js/view_all.min.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<?php if (!$this->agent->is_mobile()) { ?>
    <div class="header">
        <?php $this->load->view('home/navbar'); ?>
        <div class="row">
            <div class="col-md-6  my-row-1">
                <h1> <strong>TRI ÂN HỌC VIÊN 2016 </strong></h1>
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
        </div>
    </div>

    <?php
} else {
    ?>
    <?php $this->load->view('mobile/navbar'); ?>
    <div class="container" style="margin-top: -22px; overflow: hidden">
        <div class="row searchBox" style="background: url(http://lakita.com.vn/styles/v2.0/img/banner-1.jpg); padding-top: 9px; height: 70px">
            <div class="col-md-12">
                <label for="exampleInputEmail1" class="sr-only">Search</label>
                <form action="<?php echo base_url(); ?>tim-kiem.html" method="post" id="searchForm">
                    <input type="text" class="form-control" id="key_word" name="key_word" value="Tìm các khóa học bạn quan tâm...">
                    <img alt="học excel cơ bản, excel cho kế toán, tự học excel" class="searchIcon"src="<?php echo base_url(); ?>styles/v2.0/img/icon_seach.png" style="width:25px; top:10px"/>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<div class="container hidden-sm hidden-xs">

    <div class="content" style="width: 100%; margin: 0 auto;">
       
        <div class="avatar" >
            <img  style="width: 100%;" src="https://lakita.vn//data/source/emailMarketing/FULL-Tet.png">
        </div>
        <div class="content1" style=" background-color: #f1f1f1; padding:20px 20px;">
            <p style="font-family: RobotoCondensed-Regular; font-size: 16px; line-height: 30px;">Kính gửi quý khách hàng thân mến!<br>
                Nhân dịp chào xuân 2017, Hệ thống học trực tuyến Lakita xin gửi đến quý khác hàng lời chúc sức khỏe và thành công trên mọi lĩnh vực. Chúng tôi cám ơn quý khác hàng đã tin tưởng và sử dụng dịch vụ của Lakita.<br>
                Lakita là hệ thống học trực tuyến chuyên cung cấp video bài giảng, học hỏi kĩ năng mới để làm chủ tương lai. Với slogan "LAKITA CÙNG BẠN VƯƠN XA" chúng tôi cam kết sẽ mang đến cho các bạn những bài học ngày càng chất lượng hơn, phục vụ nhu cầu của đông đảo người dùng.
            </p>
            <p style="font-family: RobotoCondensed-Regular; font-size: 16px; line-height: 30px;font-weight: bold;">
                Để tri ân khách hàng, hệ thống học trực tuyến Lakita xin tặng anh/chị một chương mới của khóa Excel mà bạn đang theo học. 
                Anh chị vui lòng trả lời một số câu hỏi để nhận ưu đãi từ "CHƯƠNG TRÌNH TRI ÂN HỌC VIÊN 2016".
            </p>

            <p style="font-family: RobotoCondensed-Regular; font-size: 16px; line-height: 30px;">
                Cảm ơn anh chị đã quan tâm đến Lakita, quà tri ân của bạn sẽ được gửi tới email của bạn trong thời gian sớm nhất.<br>
                Trân trọng!  </p>
        </div>
        <div class="content2">
            <div class="check">
                <div class="info" style="color: #31a36b; font-family: RobotoCondensed-Regular;width: 50%; float: left;">
                    <p style="margin-left: 100px; margin-top: 30px;     font-size: 16px;">Nhận thêm chương mới khóa học </p>
                </div>
                <div class="ardess" style="float: left;">
                    <img src="https://lakita.vn//data/source/emailMarketing/Shape-1.png" style=" margin-top: -9px;">
                    <a href="https://goo.gl/forms/Ek6to50A9JsT01262" style="background-color: #31a36b;color: white;font-family: RobotoCondensed-Regular; font-size: 28px; font-weight: bold; border: none; padding: 10px 30px; text-decoration: none; margin-top: 13px; display: inline-block;">TẠI ĐÂY</a>
                </div>
                <div style="clear:both"></div>
            </div>
            <div class="note">
                <p style="text-align: center; margin-bottom: 10px; font-style: italic; font-family: RobotoCondensed-Regular; font-size: 13px;"></p>
            </div>
        </div>

        <div style="text-align: center; font-size: 18px; background-color: #31a36b; color: white; font-family: RobotoCondensed-Regular; padding: 12px 48px; font-weight: bold;"><p>KHÓA HỌC NHIỀU NGƯỜI HỌC NHẤT TẠI LAKITA</p></div>

        <div style="text-align: center; font-size: 21px; font-family: RobotoCondensed-Regular; padding-top: 31px; font-weight: bold">LÀM CHỦ KIẾN THỨC VÀ XỬ LÝ TÌNH HUỐNG VỀ HÓA ĐƠN</div>

        <div class="content3" style="margin-top: 20px">
            <div style="float: left; width: 50%"><img src="https://lakita.vn//data/source/emailMarketing/Hoa-Don-Chi-Nhung.png" alt="" style="margin-left: 51px;"></div>
            <div style="float:left; width: 50%">
                <h1 style="font-family: RobotoCondensed-Regular; color: #9faebd; font-size: 19px; margin-left: 16px">LẬP HÓA ĐƠN GẶP SAI SÓT ĐỪNG LO ĐÃ CÓ LAKITA</h1>
                <p style="margin-left: 18px; font-family: RobotoCondensed-Regular;margin-right: 25px; margin-top: 10px;font-size: 16px;">Xem những video hướng dẫn ngắn để nhanh chóng hiểu đúng, đủ về các nội dung liên quan đến chứng từ đầu vào, chứng từ đầu ra của doanh nghiệp. Được chia sẻ các kinh nghiệm xử lý sai sót thường gặp, tiếp đội kiểm tra thuế về hóa đơn chứng từ... Và được cung cấp các biểu mẫu liên quan.</p>
                <a href="https://lakita.vn/lam-chu-kien-thuc-va-xu-ly-tinh-huong-ve-hoa-don-268.html" style="font-family: RobotoCondensed-Regular; margin-top: 20px;margin-left: 18px;font-weight: bold; padding: 11px 45px; border: none;background-color: #31a36b;color: white; text-decoration: none; display: inline-block;">HỌC THỬ NGAY</a>
            </div>
        </div>
        <div style="clear:both"></div>
        <p style="color: #343f4b; font-family: RobotoCondensed-Regular; font-size: 20px;font-weight: bold; margin-left: 51px;margin-top: 20px;">EXCEL TỪ CƠ BẢN TỚI NÂNG CAO</p>

        <div class="content4" style="margin-top: 20px;"  >
            <div style="float:left; width: 50% ;margin-bottom: 40px;">
                <h1 style="font-family: RobotoCondensed-Regular;margin-left: 51px; color: #9faebd; font-size: 19px;">EXCEL TỪ A ĐẾN Z CÁI TÊN NÓI LÊN TẤT CẢ</h1>
                <p style="margin-left: 51px;font-family: RobotoCondensed-Regular;margin-right: 20px; margin-top: 10px;font-size: 16px;">Học Excel từng bước, từng bước với hệ thống bài giảng chuyên nghiệp được nghiên cứu và tổng hợp từ bộ giáo trình quốc tế có hàng triệu học viên. Hình thức giảng dạy Cầm tay chỉ việc đơn giản dễ hiểu. Hệ thống bài tập thực tiễn, thực hành không giới hạn với sự hỗ trợ 24/7 của đội ngũ giảng viên, trợ giảng.</p>
                <a href="https://lakita.vn/hoc-excel-co-ban-excel-tu-a-z-267.html" style="font-family: RobotoCondensed-Regular; margin-left: 51px;margin-top: 10px;font-weight: bold; padding: 11px 45px; border: none;background-color: #31a36b;color: white; text-decoration: none; display: inline-block;">HỌC THỬ NGAY</a>
            </div>

            <div style="float: left; width: 50%"><img src="https://lakita.vn//data/source/emailMarketing/Excel-A-z.png" alt="" ></div>
        </div>
        <div style="clear:both"></div>
    </div>
</div>
</div>
</div>
</div>

