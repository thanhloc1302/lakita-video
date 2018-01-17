<?php
$this->load->helper('cookie');
set_cookie('read_news_3', 'yes', 92536000);
?>
<!--    <script src="<?php echo base_url(); ?>styles/v2.0/js/home.js"></script>-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/view_all.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>styles/v2.0/js/view_all.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>styles/v2.0/js/login.min.js"></script>
<?php if (!$this->agent->is_mobile()) { ?>
    <div class="header">
        <?php $this->load->view('home/navbar'); ?>
        <div class="row">
            <div class="col-md-6  my-row-1">
                <h1> <strong> [Lakita.vn] Giới thiệu chương trình  "45 ngày đồng hành cùng bạn" của Lakita </strong></h1>
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

<div class="container" style="font-family: Roboto; font-size: 16px; text-align: justify ">
    <div class="row">
        <div class="col-md-10 col-md-push-1 margintop45">
            <p> Bạn  <?php echo $user_name = $this->session->userdata('user_name'); ?> thân mến </p>
            <p> Lakita xin giới thiệu đến bạn <?php echo $user_name; ?> một chương trình học Excel mới tại Lakita cho năm 2017, 
                đó là chương trình <strong> “45 ngày đồng hành cùng bạn”. </strong>
            </p>
            <p> Theo kinh nghiệm của Lakita trong thời gian hoạt động của mình, 
                nếu để học viên tự học thì việc học kéo dài, 
                học trước quên sau vì nhiều học viên không chịu thực hành. 
                Do đó không mang lại hiệu quả thực sự cho học viên nên bên Lakita đề xuất chương trình học <strong> “45 ngày đồng hành cùng bạn” </strong> nhằm nâng cao hiệu quả khóa học cho bạn, 
                và đặc biệt là chỉ với mức chi phí rất nhỏ chỉ <strong style="font-size: 25px" class="lakita"> 599.000 VND </strong> vì bạn là các học viên thân thiết của Lakita. </p>
            <p>
                Chương trình này là chương đào tạo chuyên sâu trong vòng 45 ngày liên tục mà tại đó bạn <?php echo $user_name; ?> sẽ được:
            </p>
            <ul class="list">
                <li class="paddingleft42">
                    <i class="fa fa-check-square lakita" aria-hidden="true"></i> Sắp xếp lộ trình học tập trực tuyến riêng cho từng cá nhân.
                </li>
                <li class="paddingleft42">
                    <i class="fa fa-check-square lakita" aria-hidden="true"></i> Được trợ giảng, giảng viên trực tiếp thúc đẩy bạn học tập, làm bài.
                </li>
                <li class="paddingleft42">
                    <i class="fa fa-check-square lakita" aria-hidden="true"></i> Báo cáo tiến độ học tập hàng tuần.
                </li>
                <li class="paddingleft42">
                    <i class="fa fa-check-square lakita" aria-hidden="true"></i> Chấm điểm và giải đáp các bài tập bài kiểm tra.
                </li>
                <li class="paddingleft42">
                    <i class="fa fa-check-square lakita" aria-hidden="true"></i> Gia sư online về khóa học qua Skype, hỗ trợ 24/7.
                </li>
                <li class="paddingleft42">
                    <i class="fa fa-check-square lakita" aria-hidden="true"></i> Tư vấn giải pháp Excel phục vụ công việc quản lý, quản trị và hỗ trợ tạo biểu mẫu theo yêu cầu.
                </li>
                <li class="paddingleft42">
                    <i class="fa fa-check-square lakita" aria-hidden="true"></i> Được nhận các các ưu đãi sớm nhất và lớn nhất tại Lakita.vn.
                </li>
            </ul>
            <p> Sau khi kết thúc khóa học, bạn <?php echo $user_name; ?> sẽ làm được những việc sau: </p>
            <ul class="list">
                <li class="paddingleft42">
                    <i class="fa fa-check-square lakita" aria-hidden="true"></i> Có thể làm chủ được công cụ Excel nhằm áp dụng trong công việc của mình.
                    <ul class="list">
                        <li class="paddingleft42">
                            <i class="fa fa-plus-circle lakita" aria-hidden="true"></i> Làm đẹp, bôi mầu cho các file Excel của mình.
                        </li>
                        <li class="paddingleft42">
                            <i class="fa fa-plus-circle lakita" aria-hidden="true"></i> Sử dụng được các công cụ tiện ích tuyệt vời của excel.
                        </li>
                         <li class="paddingleft42">
                            <i class="fa fa-plus-circle lakita" aria-hidden="true"></i> Làm chủ được hệ thống các hàm trong Excel.
                        </li>
                         <li class="paddingleft42">
                            <i class="fa fa-plus-circle lakita" aria-hidden="true"></i> Đặc biệt là biết cách tìm kiếm thông tin theo ý mình trong môi trường mạng.
                        </li>
                    </ul>
                </li>
                <li class="paddingleft42">
                    <i class="fa fa-check-square lakita" aria-hidden="true"></i> Có thể tạo biểu mẫu, tùy chính biểu mẫu phục vụ cho công việc của mình
                </li>
                <li class="paddingleft42">
                    <i class="fa fa-check-square lakita" aria-hidden="true"></i> Cấp chứng nhận hoàn thành khóa hoc cho học viên của LAKITA.
                </li>
                <li class="paddingleft42">
                    <i class="fa fa-check-square lakita" aria-hidden="true"></i> Nhận được sự hỗ trợ của Lakita.vn trong quá trình làm việc trọn đời.
                </li>
            </ul>
            <p>
                Để đạt được tất cả những điều trên bạn <?php echo $user_name; ?> chỉ cần cài phần mềm Skype (Hoàn toàn miễn phí và download trên mạng được), 
                có máy tính cá nhân, mạng internet và máy tính có cài đặt Excel và quan trọng nhất, 
                bạn <?php echo $user_name; ?> 
                <strong>thực sự muốn cải thiện khả năng sử dụng </strong> 
                Excel hiện tại và chỉ cần <strong> bỏ ra chưa đến 01 giờ/ngày </strong> trong vòng 45 ngày để học tập cùng Lakita.
            </p>
            <p> Để đăng ký, bạn  <?php echo $user_name; ?> vui lòng để lại thông tin Họ tên, Số điện thoại bằng cách điền vào 2 ô dưới dây: </p>
            <div class="row margintop22">
                <div class="col-md-8">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Họ và tên</label>
                        <input type="text" class="form-control" id="name" placeholder="Họ tên">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Số điện thoại</label>
                        <input type="tel" class="form-control" id="tel" placeholder="Điện thoại">
                    </div>
                    <button class="btn btn-success btn-rgt">Đăng ký</button>

                </div>
            </div>
            <p class="margintop22"> Chúc bạn <?php echo $user_name; ?> một ngày làm việc hiệu quả, có nhiều niềm vui!! </p>
            <p>
                P/s: Nếu có bất kỳ vấn đề khó khăn gì, bạn <?php echo $user_name; ?> có thể liên hệ đến Lakita qua hotline 1900 6361 95 nhé.
            </p>
            <p class="text-right"> Trân trọng </p>
            <p class="text-right"> <strong> Lakita team. </strong> </p>
        </div>
    </div>
</div>
</div>
</div>
</div>

<style>
    ul.list li{    margin: 5px;}
</style>
<script>
    $(".btn-rgt").click(
            function () {
                var name = $("#name").val();
                var tel = $("#tel").val();
                jQuery.ajax({
                    type: "POST",
                    url: 'news/action_rgt',
                    data: {
                        name: name,
                        tel: tel
                    },
                    dataType: "text",
                    scriptCharset: "utf-8",
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    beforeSend: function (xhr)
                    {
                        xhr.setRequestHeader("Ajax-Request", "true");
                        $(".popup-wrapper").show();
                    },
                    success: function (response)
                    {
                        console.log(response);

                        if (response == 1)
                        {
                            alert("Bạn đã đăng ký thành công, chúng tôi sẽ liên lạc với bạn sau.");
                            //location.replace(resultArr[1]);
                        } else
                        {
                            alert("Có lỗi xảy ra, vui lòng đăng ký lại");
                        }
                        return false;
                    },
                    complete: function () {
                        $(".popup-wrapper").hide();
                    }
                });
            }
    );
</script>