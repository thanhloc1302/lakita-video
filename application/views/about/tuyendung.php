<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/course_detail.css?ver=<?php echo _VER_CACHED_ ?>" />
<script src="<?php echo base_url(); ?>styles/v2.0/js/login.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<?php
if ($this->agent->is_mobile())
    $this->load->view('mobile/navbar');
else {
    ?>
    <div class="header">
        <?php $this->load->view('home/navbar'); ?>
        <div class="row">
            <div class="col-md-6  my-row-1">
                <p class="group_course"> Thông tin tuyển dụng </p>
                <h2 style="font-size: 18px; font-family: OpenSans-Bold; line-height: 26px;"> <strong>  </h2> </strong>
            </div>
            <div class="col-md-6 searchBox">
                <form action="<?php echo base_url(); ?>tim-kiem.html" method="post" id="searchForm">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8">
                            <label for="exampleInputEmail1" class="sr-only">Search</label>
                            <input type="text" class="form-control" id="key_word" name="key_word" value="Tìm các khóa học bạn quan tâm...">
                            <img alt="học excel, hoc excel, học excel cơ bản, tự học excel" title="học excel, hoc excel, học excel cơ bản, tự học excel" class="searchIcon"src="<?php echo base_url(); ?>styles/v2.0/img/icon_seach.png" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php }
?>
<?php if ($tuyendung == 0) { ?>
    <div class="container tuyendung">

        <table class="table tbl_career">
            <thead>
                <tr>
                    <th>VỊ TRÍ ĐANG TUYỂN</th>
                    <th class="text-center">Số lượng</th>
                    <th class="text-center">Hạn chót nộp</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3">Marketing</td>
                </tr>
                <tr>
                    <td><a href="<?php echo base_url(); ?>tuyendung/tuyen-02-digital-marketing.html">Digital Marketing</a></td>
                    <td class="text-center">2</td>
                    <td class="text-center">30/03/2017</td>
                </tr>
                <tr>
                    <td><a href="<?php echo base_url(); ?>tuyendung/tuyen-08-thuc-tap-digital-marketing.html">Innership Digital Marketing - Thực tập viên Digital Marketing</a></td>
                    <td class="text-center">8</td>
                    <td class="text-center">31/12/2016</td>
                </tr>

                <tr>
                    <td colspan="3">Customer Service</td>
                </tr>
                <tr>
                    <td><a href="<?php echo base_url(); ?>tuyendung/tuyen-02-telesale.html">Telesales Staff - NV Telesales</a></td>
                    <td class="text-center">3</td>
                    <td class="text-center">30/03/2017</td>
                </tr>
                <tr>
                    <td colspan="3">BackOffice</td>
                </tr>
                <tr>
                    <td><a > Accounting, Administration, Human Resources - Kế toán, Hành Chính, Nhân Sự </a></td>
                    <td class="text-center">1</td>
                    <td class="text-center">31/12/2016</td>
                </tr>

                <tr>
                    <td colspan="3">Partner Relations Coordinator</td>
                </tr>
                <tr>
                    <td><a href="<?php echo base_url(); ?>tuyendung/Partner-Relations-Coordinator.html">Partner Relations Coordinator - Chuyên viên phát triển đối tác</a></td>
                    <td class="text-center">1</td>
                    <td class="text-center">31/12/2016</td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
}
if ($tuyendung != 0) {
    ?>
    <div class="container">
        <div class="col-lg-3">
            <table class="table tbl_career">
                <thead>
                    <tr>
                        <th>VỊ TRÍ ĐANG TUYỂN</th>
                        <th class="text-center">Hạn chót nộp</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3">Marketing</td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo base_url(); ?>tuyendung/tuyen-02-digital-marketing.html">Digital Marketing</a></td>

                        <td class="text-center">30/03/2017</td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo base_url(); ?>tuyendung/tuyen-08-thuc-tap-digital-marketing.html">Innership Digital Marketing - Thực tập viên Digital Marketing</a></td>

                        <td class="text-center">31/12/2016</td>
                    </tr>

                    <tr>
                        <td colspan="3">Customer Service</td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo base_url(); ?>tuyendung/tuyen-02-telesale.html">Telesales Staff - NV Telesales</a></td>

                        <td class="text-center">30/03/2017</td>
                    </tr>
                    <tr>
                        <td><a >Accounting, Administration, Human Resources - Kế toán, Hành Chính, Nhân Sự </a></td>
                        <td class="text-center">31/12/2016</td>
                    </tr>

                    <tr>
                        <td colspan="3">Partner Relations Coordinator</td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo base_url(); ?>tuyendung/Partner-Relations-Coordinator.html">Partner Relations Coordinator - Chuyên viên phát triển đối tác</a></td>
                        <td class="text-center">31/12/2016</td>
                    </tr>    
                </tbody>
            </table>
        </div>
        <div class="col-lg-9 tuyendung">
            <?php if ($tuyendung == 5) { ?>
                <div class="container lakitabg">
                    <h1 class="lakitabgheader"> Tuyển 02 Telesale </h1>
                    <h3>MÔ TẢ CÔNG VIỆC: </h3>
                    <p>- Chốt đơn đăng ký mua sản phẩm theo danh sách được cung cấp</p>
                    <p>- Tư vấn và thuyết phục học viên đăng ký học các chương trình đào tạo trực tuyến ngắn hạn/dài hạn của công ty</p>
                    <p>- Tham gia các dự án giúp tăng tỷ lệ chốt đơn đăng ký</p>
                    <h3> YÊU CẦU: </h3>
                    <p>- Có kinh nghiệm TeleSale</p>
                    <p>- Thích kinh doanh</p>
                    <p>- Có tinh thần trách nhiệm với công việc được giao.</p>
                    <p>- Chăm chỉ, ham học hỏi, chủ động trong công việc, có khả năng chịu áp lực công việc</p>
                    <p>- Tuân thủ các nội quy, quy định của công ty.</p>
                    <p>- Thích làm việc đội nhóm.</p>
                    <p>-  Thích startup, khởi nghiệp</p>
                    <p>- Có thể làm việc Fulltime hoặc Partime</p>
                    <p>- Yêu cầu có Laptop để phục vụ cho công việc</p>
                    <p>- Thu nhập = Lương 3 triệu/tháng + % Doanh số (COM)</p>
                    <h3>QUYỀN LỢI:</h3>
                    <p>- Được đào tạo quy trình bán hàng: 6 bước, 32 chiêu thức và 12 nguyên lý</p>
                    <p>- Hưởng mức thu nhập KHỦNG theo năng lực (xx triệu/tháng)</p>
                    <p>- Làm việc trong môi trường trẻ, năng động, thân thiện</p>
                    <p>- Được đào tạo quy trình bán hàng</p>
                    <p>- Được đào tạo về tin học thực tiễn phục vụ công việc</p>
                    <p>- Được hưởng các chế độ đãi ngộ của Công ty.</p>
                    <p>- Có khả năng phát huy năng lực bản thân</p>
                    <p class="lakitabgfooter"> Hạn chót nhận CV 30/03/2017 về: trinhnv@lakita.vn; ĐT: 0948-467-389. Địa chỉ: 701 CT1 skylight 125 D Minh Khai
                    </p>

                </div>
                <?php
            }
            if ($tuyendung == 1) {
                ?>
                <div class="container lakitabg">
                    <h1 class="lakitabgheader"> Tuyển 02 MARKETING</h1>
                    <h2>  01 MARKETING VẬN HÀNH </h2>
                    <h3>Bạn sẽ làm gì? </h3>
                    <p>1. Nghiên cứu đối tượng và nhu cầu của họ với dòng sản phẩm vận hành</p>
                    <p>2. Thỏa sức sáng tạo, sáng tác nội dung chia sẻ, quảng cáo</p>
                    <p>3. Xây dựng kế hoạch/ chiến dịch quảng cáo: Vận hành kênh, thực hiện mục tiêu trên kênh</p>
                    <p>4. Đưa giải pháp, công não, cải tiến phương pháp làm trên kênh vận hành</p>
                    <p>5. Ra quyết định chi tiêu Marketing trên kênh vận hành </p>
                    <hr>
                    <h2>  01 MARKETING PHÁT TRIỂN </h2>
                    <h3>Bạn sẽ làm gì? </h3>
                    <p>1. Tìm kiếm, phát triển Kênh Marketing mới: Thông trận</p>
                    <p>2. Sáng tạo phương pháp làm Marketing mới</p>
                    <p>3. Nghiên cứu, cập nhật công nghệ mới của kênh quảng cáo</p>
                    <p>4. Nghiên cứu sản phẩm mới, nhu cầu của khách hàng để đưa ra thị trường</p>
                    <p>5. Ra quyết định Marketing trong trận phát triển </p>
                </div>   
                <h3>QUYỀN LỢI:</h3>
                <p>1. Được thỏa sức sáng tạo, mọi việc khác có Lakita lo</p>
                <p>2. Được làm việc với Ekip trẻ năng động, nhiệt huyết, tâm huyết với công nghệ và giáo dục</p>
                <p>3. Được hưởng Cơ chế linh hoạt với Startup, đánh giá công trạng hàng tháng, được thưởng lớn khi đạt, vượt mục tiêu đề ra. </p>
                <!--<p>- Được đào tạo về Facebook ads</p>
                <p>- Được đào tạo về Email marketing Getresponse</p>
                <p>- Được đào tạo về tin học thực tiễn phục vụ công việc</p>
                <p>- Được đào tạo về kỹ năng làm việc trên môi trường mạng</p>-->
                <p>4. Được làm hết mình, xoáy tốc độ để lên Level Marketing trong thời gian ngắn nhất.</p>
                <p>5. Cơ hội được làm trưởng phòng Marketing của Startup</p>
                <p> 6. Cơ hội được nằm trong đội ngũ Key Person của Startup (Xét theo cống hiến với tổ chức) </p>
                <p class="lakitabgfooter"> Đăng ký tại địa chỉ: <a href="http://bit.ly/2gAnAE2" class="form-contact"> http://bit.ly/2gAnAE2 </a>. Hạn chót nhận CV 30/03/2017 về: trinhnv@lakita.vn; ĐT: 0948-467-389. Địa chỉ: 701 nhà CT1, tòa nhà skylight, ngõ Hòa Bình 6, 125D Minh Khai, Hai Bà Trưng, Hà Nội
                </p>  
                <?php
            }
            if ($tuyendung == 2) {
                ?>
                <div class="container lakitabg">
                    <h1 class="lakitabgheader" style="padding-left: 163px;"> Tuyển 08 thực tập DIGITAL MARKETING </h1>
                    <h3>MÔ TẢ CÔNG VIỆC: </h3>
                    <p>- Học việc sản xuất nội dung (CopyWritting) cho các Khoá học/Chương trình đào tạo ngắn hạn.</p>
                    <p>- Học việc về chạy số (Facebook Ads, Email Marketing, SEO, Google Ads…)</p>
                    <p>- Phát triển fanpage chăm sóc cộng đồng.</p>
                    <h3> YÊU CẦU: </h3>
                    <p>- Sinh viên năm cuối hoặc mới ra trường các Trường ĐH, Cao Đẳng các ngành liên quan đến Marketing, IT, Toán Tin và yêu thích làm việc trực tuyến.</p>
                    <p>- Định hướng làm việc về SEO, Marketing online và phát triển cộng đồng mạng.</p>
                    <p>- Có tinh thần trách nhiệm với công việc được giao.</p>
                    <p>- Chăm chỉ, ham học hỏi, chủ động trong công việc, có khả năng chịu áp lực công việc</p>
                    <p>- Tuân thủ các nội quy, quy định của công ty.</p>
                    <p>- Thích làm việc đội nhóm.</p>
                    <p>- Thích startup, khởi nghiệp</p>
                    <p>- Có thể làm việc Fulltime hoặc Partime</p>
                    <p>- ƯU TIÊN SỐNG NỘI TÂM, LÀM VIỆC ĐỘC LẬP, ĐÃ TỪNG CHƠI MỘT MÔN NGHỆ THUẬT NÀO ĐÓ. </p>
                    <p>- Yêu cầu có Laptop để phục vụ cho công việc</p>
                    <p>- Thu nhập: Thương Lượng (Tùy theo năng lực)</p>
                    <h3>QUYỀN LỢI:</h3>
                    <p>- Học và làm việc trong môi trường năng động, thân thiện. </p>
                    <p>- Được đào tạo quy trình Marketing Online, Digital Marketing.</p>
                    <p>- Được đào tạo về Facebook ads</p>
                    <p>- Được đào tạo về Email marketing Getresponse</p>
                    <p>- Được đào tạo về tin học thực tiễn phục vụ công việc</p>
                    <p>- Được đào tạo về kỹ năng làm việc trên môi trường mạng</p>
                    <p>- Có khả năng phát huy năng lực bản thân.</p>
                    <p>- -Cơ hội được tham gia các dự án tầm cỡ về Marketing Online.</p>
                    <p class="lakitabgfooter"> Hạn chót nhận CV 31/12/2016 về: trinhnv@bkindex.com; hotline: 0948-467-389. Địa chỉ: 701 CT1 skylight 125 D Minh Khai
                    </p>  
                </div> 
                <?php
            }
            if ($tuyendung == 3) {
                ?>
                <div class="container lakitabg">
                    <h1 class="lakitabgheader" style="padding-left: 163px;"> Partner Relations Coordinator </h1>
                    <h3>MÔ TẢ CÔNG VIỆC: </h3>
                    <p>- Tìm kiếm giảng viên/chuyên gia cho các môn học thuộc các nghành nghề của nền tảng học trực tuyến lakita.vn.</p>
                    <p>- Tư vấn, thuyết phục giảng viên/chuyên gia tham gia xây dựng, hợp tác phát triển nội dung cho khóa học.</p>
                    <p>- Tương tác, chăm sóc giảng viên/chuyên gia.</p>
                    <p> -	Phối hợp với các bộ phận liên quan hoàn thành các giai đoạn trong quá trình sản xuất nội dung và bán hàng.</p>
                    <p> -	Báo cáo thu nhập, và trả thu nhập định kỳ cho giảng viên/chuyên gia về tình hình triển khai các khóa học Online</p>
                    <h3> YÊU CẦU: </h3>
                    <p>- Tốt nghiệp các Trường ĐH, Cao Đẳng các ngành liên quan đến Marketing, IT, Toán Tin, truyền thông, sự kiện yêu thích làm việc cộng đồng.</p>
                    <p>- Có tinh thần trách nhiệm với công việc được giao.</p>
                    <p>- Chăm chỉ, ham học hỏi, chủ động trong công việc, có khả năng chịu áp lực công việc</p>
                    <p>- Tuân thủ các nội quy, quy định của công ty.</p>
                    <p>- Thích làm việc đội nhóm.</p>
                    <p>- Thích startup, khởi nghiệp</p>
                    <p>- Có thể làm việc Fulltime</p>
                    <p>- Yêu cầu có Laptop để phục vụ cho công việc</p>
                    <p>- Thu nhập: Thương Lượng (Tùy theo năng lực)</p>
                    <h3>QUYỀN LỢI:</h3>
                    <p>- Làm việc trong môi trường năng động, thân thiện. </p>
                    <p>- Được đào tạo quy trình chăm sóc đối tác.</p>
                    <p>- Được đào tạo về tin học thực tiễn phục vụ công việc.</p>
                    <p>- Được đào tạo về kỹ năng làm việc trên môi trường mạng.</p>
                    <p>- Được hưởng các chế độ đãi ngộ của Công ty.</p>
                    <p>- Có khả năng phát huy năng lực bản thân.</p>
                    <p>- Cơ hội được nhận vào làm chính thức tại công ty</p>
                    <p class="lakitabgfooter"> Hạn chót nhận CV 31/12/2016 về: trinhnv@bkindex.com; hotline: 0948-467-389. Địa chỉ: 701 CT1 skylight 125 D Minh Khai
                    </p>  
                </div> 
                <?php
            }
            echo '</div></div>';
        }
        ?>
        <style>
            body, h1, h2, h3, h4, h5, h6, h7, a, button, p, span, div {
                font-family: RobotoCondensed-Regular;
            }
            .lakitabgheader {
                background-color: #106d2c;
                margin-left: -20px;
                height: 60px;
                line-height: 60px;
                padding-left: 283px;
                color: white;
                text-transform: uppercase;
            }
            .lakitabgfooter {
                padding: 10px;
                background-color: #106d2c;
                margin-left: -20px;
                line-height: 28px;
                color: white;
                padding-left: 30px;
            }
            div.tuyendung p {
                font-size: 16px;
            }
            .form-contact, .form-contact:hover{
                color: #f77c76;
            }
        </style>