<link type="text/css" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/v2.0/css/teacher.css?ver=<?php echo _VER_CACHED_ ?>" />
<div id="main_to_nhat_bao_toan_bo_luon">
    <!--menu top-->
    <!--    <div id="menu_top">
            <img class="img img-responsive hidden-sm hidden-xs" style="width: 100%" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/menutop.png">
    
        </div>-->
    <?php
    if ($this->agent->is_mobile())
        $this->load->view('mobile/navbar');
    else {
        ?>
        <div class="header">
            <?php $this->load->view('home/navbar-teacher'); ?>
        </div>
    <?php } ?>
    <!--form đăng ký-->
    <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="teacher/action_rgt" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Bảng đăng ký Giảng viên/ Đối tác Nội dung</h4>
                    </div>
                    <div class="modal-body">

                        <!--form dang ky-->  
                        <div style="padding: 20px; background-color: #f8f8f8">
                            <div class="xam">
                                <p>Xin chào</p>
                                <p>Chúng tôi rất vui khi bạn quyết định ra nhập cộng đồng Giảng viên và Đối tác Nội dung của Lakita.</p>
                                <p>Để bắt đầu, xin vui lòng cung cấp cho chúng tôi các thông tin như bên dưới. bạn sẽ nhận được email xác nhận sau khi gửi thành công. Chúng tôi sẽ xem xét hồ sơ và phản hổi cho bạn trong vòng 3 ngày làm việc.</p>
                                <p>Cảm ơn và rất mong được hợp tác với bạn.</p>
                                <p class="font40" style="color: black">Thông tin liên hệ</p>
                            </div>
                            <hr>
                            <div id="formdk">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="ten">Tên</label>
                                        <input type="text" class="form-control" id="ten" name="name" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="ho">Họ và Chữ lót</label>
                                        <input type="text" class="form-control" id="ho" name="sir_name"  placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="chuc">Chức vụ hiện tại</label>
                                        <input type="text" class="form-control" id="chuc" name="position"  placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="congty">Công ty hiện tại</label>
                                        <input type="text" class="form-control" id="congty" name="org"  placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"  placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="phone">Điện thoại liên hệ</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="city">Thành phố hiện tại</label>
                                        <input type="text" class="form-control" id="city" name="city" placeholder="">
                                    </div>
                                </div>
                                <p class="font40">Kinh nghiệm bản thân</p>
                                <hr>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="lamviec">Kinh nghiệm làm việc</label>
                                        <select class="form-control" name="exp_work">
                                            <option value="0">-----------</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="giangday">Kinh nghiệm giảng dạy</label>
                                        <select class="form-control" name="exp_teach">
                                            <option value="0">-----------</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 25px;">
                                    <label for="chuyenmongiangday">Chuyên môn dự định giảng dạy</label><span class="xam"> (tối đa 1000 chứ)</span>
                                    <textarea class="form-control" rows="3" name="technique"></textarea>
                                </div>
                                <p class="font40">Kinh nghiệm e-learning</p>
                                <hr>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <p>Bạn đã từng giảng dạy e-learning chưa?</p>
                                    <div class="clearfix candong1"></div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="teach_elearning" id="optionsRadios1" value="1">
                                            Đã từng
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="teach_elearning" id="optionsRadios2" value="0">
                                            Chưa từng
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <p>Bạn có thể tự quay phim bài giảng không?</p>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="self_record_video" id="optionsRadios3" value="1">
                                            Có thể
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="self_record_video" id="optionsRadios4" value="0">
                                            Không thể
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <p>Bạn có biết tự cắt ghép phim không?</p>
                                    <div class="clearfix candong2"></div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="self_join_video" id="self_join_video" value="1">
                                            Có biết
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="self_join_video" id="self_join_video" value="0">
                                            Không biết
                                        </label>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <p style="margin-top: 25px" class="font40">Thỏa thuận sử dụng dịch vụ</p>
                                <hr>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        <input type="hidden" name="lakita-1" value="lakita-v" />
                                        Tôi đồng ý với các điều khoản giảng viên và đối tác nội dung của Lakita.
                                    </label>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                        <button type="submit" class="btn btn-primary" style="background-color: #ca1f25; background-image: none; border: none;">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--page noi dung-->
    <div id="page_hien_thi">
        <div id="header">
            <div class="col-lg-6 col-lg-offset-6 col-md-6 col-md-offset-6 col-sm-12 col-xs-12 intro1">
                <b id="hoptac">HỢP TÁC GIẢNG VIÊN GIẢNG DẠY CÙNG LAKITA</b>
                <p id="gioithieulakita">Giới thiệu về lakita: Lakita là hệ thống học trực tuyến đào tạo kĩ năng, chuyên môn về kế toán, năng lực văn phòng, hành chính nhân sự, công nghệ thông tin... đáp ứng nhu cầu phổ biến của nhân viên văn phòng, học sinh, sinh viên ở Việt Nam. Tại lakita, chúng tôi hướng đến việc xây dựng một nền tảng chuyên nghiệp về đào tạo các kĩ năng trên dành cho bất cứ ai muốn lan tỏa kiến thức, truyền đạt kinh nghiệm khơi nguồn cảm hứng trong các lĩnh vực liên quan đến năng lực văn phòng , kế toán, hành chính nhân sự, công nghệ thông tin. Với sứ mệnh là cầu nối giữa giảng viên và học viên, chúng tôi tin rằng kiến thức và kĩ năng tốt hơn sẽ cho ra đời những thương hiệu và doanh nghiệp tốt hơn từ đó tạo ra những giá trị lớn hơn cho người tiêu dùng.</p>

                <button type="button" class="btdangky" data-toggle="modal" data-target=".bs-example-modal-lg">
                    TRỞ THÀNH GIẢNG VIÊN CỦA CHÚNG TÔI
                </button>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--dành cho giảng viên chuyên gia-->
        <div id="trothanhgv">
            <b style="font-size: 40px">Dành cho Giảng viên / Chuyên gia</b>
            <p class="xam fontlonhon1500">Tại sao nên dạy học với chúng tôi</p>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 margintop30px">
                <div>
                    <img style="display: block;margin-left: auto;margin-right: auto" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/icon1.png">
                </div>
                <div>
                    <b class="xam textmargintop10px can2ben30px">Chia sẻ có hệ thống</b>
                    <p class="margin3em xam fontlonhon1500">Chia sẻ là một điều tuyệt vời, bạn lan tỏa tri thức quý báu cho cộng đồng. Hơn thế, chia sẻ cũng là cách để bạn hệ thống lại kiến thức, tổng hợp kinh nghiệm và kỹ năng làm việc của mình. Tạo ra mô hình, vẽ lại quy trình, viết nên những case-studies hay, cho phép nhiều người áp dụng vào thực tế trong nhiều tình huống khác nhau, cũng là cơ hội để thử thách những điều bạn biết</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 margintop30px">
                <div>
                    <img style="display: block;margin-left: auto;margin-right: auto" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/icon2.png">
                </div>
                <div>
                    <b class="xam textmargintop10px can2ben30px">Truyền cảm hứng</b>
                    <p class="margin3em xam fontlonhon1500 margintop40px2">Với nền tảng E-learning của Lakita, bạn sẽ có thể lan tỏa tri thức tới hàng nghìn học viên trên khắp mọi vùng miền đất nước. nhờ đó, mỗi lần trao tri thức chính là một lần bạn trao đi nguồn cảm hứng, đem đến sự khác biệt và cùng Lakita nâng tầm tri thức và kỹ năng làm việc của Việt Nam</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 margintop30px">
                <div>
                    <img style="display: block;margin-left: auto;margin-right: auto" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/icon3.png">
                </div>
                <div>
                    <b class="xam  textmargintop10px can2ben30px">Chia sẻ thu nhập</b>
                    <p class="margin3em xam fontlonhon1500 margintop40px3">Kiến thức, kinh nghiệm, kỹ năng của bạn thực sự có giá trị. Và điều này không chủ mang nghĩa bóng, ý chúng tôi bao gồm cả giá trị hữu hình. Nghĩa là, bằng việc chia sẻ tri thức có hệ thống và quy mô, bạn có thể hoàn thành 2 việc cùng một lúc: tạo ra giá trị hữu ích cho cộng đồng và mang lại thu nhập thụ động cho chính bạn.</p>
                </div>
            </div>

            <div class="clearfix"></div>



            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2"><hr style="border-top: 1px solid #a6a7a7;"></div>
            <div class="clearfix"></div>
            <b style="font-size: 40px">Dành cho Đối tác Nội dung</b>
            <p class="xam fontlonhon1500">Bạn có phải là trường học, trung tâm hay nhà xuất bản?</p>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 margintop30px">
                <div>
                    <img style="display: block;margin-left: auto;margin-right: auto" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/icon4.png">
                </div>
                <div>
                    <b class="xam  textmargintop10px can2ben30px">Mở rộng quy mô lớp học</b>
                    <p class="margin3em xam margintop40px1 fontlonhon1500">Với sức mạnh của nội dung số và khả năng tiếp cận không giới hạn, Lakita giúp giới thiệu lớp học offline của bạn đến với nhiều học viên tiềm năng hơn bằng các hình thức như học thử trước khi đăng ký, làm quen với giảng viên, live-stream các buổi học, hay thậm chí là tạo ra các nội dung độc lập, hữu ích xung quanh khóa học để tuyển sinh, bán chéo hoặc bán thêm.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 margintop30px">
                <div>
                    <img style="display: block;margin-left: auto;margin-right: auto" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/icon5.png">
                </div>
                <div>
                    <b class="xam  textmargintop10px can2ben30px">Hoàn thiện trải nghiệm đa kênh</b>
                    <p class="margin3em xam fontlonhon1500">Là cánh tay nối dài của lớp học offline, bạn có thể tạo ra trải nghiệm đa kênh toàn diện chỉ dành cho học viên của mình bằng việc tận dụng môi trường số để tạo ra cộng đồng trực tuyến theo lớp học, nơi giao lưu hỏi đáp giữa giảng viên và học viên, phân phối tài liệu học tập hoặc chia sẻ các nội dung tham khảo sau khóa học.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 margintop30px">
                <div>
                    <img style="display: block;margin-left: auto;margin-right: auto" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/icon6.png">
                </div>
                <div>
                    <b class="xam  textmargintop10px can2ben30px">Luồng doanh thu mới từ nội dung</b>
                    <p class="margin3em xam fontlonhon1500">Không chỉ là khóa học, đó còn có thể là chuỗi video hội thảo, báo cáo thị trường hằng tháng, những biểu mẫu hữu ích hay tài liệu chất lượng. Bạn có thể tạo ra một luồng doanh thu mới từ những nội dung như vậy, để từ đó có thể giúp bạn tái đầu tư cho những nội dung chất lượng, có ích cho cả mảng kinh doanh cả online lẫn offline.</p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">

                <button type="button" class="btdangky" data-toggle="modal" data-target=".bs-example-modal-lg" style="margin: 35px 0px 35px;">
                    <span>TRỞ THÀNH GIẢNG VIÊN CỦA CHÚNG TÔI</span>
                </button>


            </div>
        </div>
        <div class="clearfix"></div>

        <!--nhận xét đánh giá của giảng viên-->
        <div id="nhanxetdanhgia">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margintop30px" style="text-align: center">
                <p style="font-size: 40px">Nhận xét và Đánh giá</p>
                <p class="xam margintop-10px marginbot50 can2ben30px" >Giảng viên và Đối tác nói gì về chúng tôi ?</p>
            </div>
            <div>
                <div class="tab-content col-ls-9 col-lg-offset-1 col-md-9 col-md-offset-1 col-sm-12 col-xs-12">
                    <div class="tab-pane active" id="home">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="textcangiua">
                                <p class="hidden-sm hidden-xs fontlonhon1500 font20a">Th.S</p>
                                <p class="margintop-10px" style="font-size: 25px"><span class="hidden-lg hidden-md">Th.S </span>Nguyễn Danh Tú</p>
                                <p class="margintop-10px fontlonhon1500 font20a">Nhà sáng lập BKINDEX GROUP</p>
                            </div>
                            <p class="margintop30px font20a fontlonhon1500">"Mục đích của tôi từ ngày đầu đi dạy đến giờ vẫn luôn là chia sẻ càng nhiều càng tốt, với nhiều người nhất có thể. Tuy nhiên, dù cố gắng thế nào, tôi cùng không thể tiếp cận được với hàng nghìn người ở khắp mọi vùng miền để chia sẻ kiến thức. Và Lakita đã trở thành cầu nối giúp tôi thực hiện mong ước bấy lâu nay"</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <img class="img img-responsive anhcangiua avatogv" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/avagv1.png">
                        </div>
                    </div>
                    <div class="tab-pane" id="profile">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <p class="hidden-sm hidden-xs fontlonhon1500 font20a">Giảng viên</p>
                            <p class="margintop-10px" style="font-size: 25px"><span class="hidden-lg hidden-md"></span>Phạm Thị Nhung</p>
                            <p class="margintop-10px fontlonhon1500 font20a">
                                Kế toán tổng hợp tại chi nhánh công ty TNHH Dịch vụ Thực phẩm và Giải khát Cánh Diều Xanh, 
                                thuộc tập đoàn Tập đoàn Liên Thái Bình Dương (Imex Pan Pacific Group).</p>
                            <p class="margintop30px font20a fontlonhon1500">
                                "
                                Tôi đã làm việc với Lakita gần 2 năm nay, và hoàn toàn hài lòng. 
                                Lakita với một đội ngũ nhân viên nhiệt tình và đầy tâm huyết. 
                                Họ đã rất hiểu và nắm bắt được yêu cầu cũng như mong đợi của học viên và giảng viên 
                                Khi làm việc với Lakita tôi tin tưởng giao phó mọi nhiệm vụ từ khâu ý tưởng, đến khi thực hiện chương trình giáo án.
                                "
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <img class="img img-responsive anhcangiua avatogv" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/nhungpt.png">
                        </div>
                    </div>
                    <div class="tab-pane" id="messages">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <p class="hidden-sm hidden-xs fontlonhon1500 font20a">Giảng viên </p>
                            <p class="margintop-10px" style="font-size: 25px"><span class="hidden-lg hidden-md"> </span>Đinh Hồng Lĩnh</p>
                            <p class="margintop-10px fontlonhon1500 font20a">	Trưởng phòng công nghệ thông tin, Tổ hợp công nghệ giáo dục TOPICA</p>
                            <p class="margintop30px font20a fontlonhon1500">
                                "
                                Lakita có 1 đặc điểm mà mình vô cùng nể phục là chuyên nghiệp. Khi mình làm việc với Lakita mình có 
                                1 niềm tin rất là vững chắc và chắc chắn Lakita là 1 đơn vị uy tín để mình gắn bó lâu dài.
                                Và chính phong cách làm việc chuyên nghiệp của Lakita đã giúp công việc, khóa học online của mình phát triển rất là thuận lợi.
                                Cám ơn Lakita! Những người bạn những người cộng sự tuyệt vời.
                                "</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <img class="img img-responsive anhcangiua avatogv" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/linhdh.png">
                        </div>
                    </div>
                </div>
                <!-- Nav tabs -->
                <div class="col-lg-1 col-md-2 col-sm-12 col-xs-12 margintop-10px" >
                    <ul class="nav nav-tabs batapavagv cantop10px" role="tablist" style="border: none">
                        <li class="active">
                            <a href="#home" role="tab" data-toggle="tab" class="vitrirelative" style="background-color: #1c1f25;border: none;">
                                <img class="img img-responsive vitriabsolute" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/avanhogv1.png">
                                <img id="tab1" style="opacity: 0"  class="img img-responsive filter vitriabsolute" onclick="bat1()" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/filter.png">
                            </a>
                        </li>
                        <li>
                            <a href="#profile" role="tab" data-toggle="tab" class="vitrirelative" style="background-color: #1c1f25;border: none; position: relative">
                                <img class="img img-responsive vitriabsolute" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/avanhogv2.png">
                                <img id="tab2" class="img img-responsive filter vitriabsolute" onclick="bat2()" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/filter.png">
                            </a>
                        </li>          
                        <li>
                            <a href="#messages" role="tab" data-toggle="tab" class="vitrirelative" style="background-color: #1c1f25;border: none; position: relative">
                                <img class="img img-responsive vitriabsolute" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/avanhogv3.png">
                                <img id="tab3" class="img img-responsive filter vitriabsolute" onclick="bat3()" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/filter.png">
                            </a>
                        </li>  
                    </ul>
                </div>  
            </div>
        </div>

        <div class="clearfix"></div>

        <!--Quy trình tạo khóa học-->
        <div id="quytrinhtaokhoahoc">
            <div style="text-align: center">
                <p class="can2ben30px" style="font-size: 40px; padding-top: 40px">Quy trình Tạo khóa học</p>
                <p class="xam can2ben30px fontlonhon1500">Chia sẻ tri thức không hề dễ dàng. Chúng tôi làm mọi thứ đơn giản nhất có thể</p>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-2 col-md-2 col-sm-4 nenxam">
                <img class="img img-responsive anhcangiua margintop30px" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/icon7.png">
                <span class="glyphicon glyphicon-chevron-right hidden-sm hidden-xs iconmuiten" aria-hidden="true"></span>
                <p class="textgiua margintop10px quytrinh">Đăng ký</p>
                <p class="textgiua can2ben15px fontlonhon1500">Đăng ký để bật tính năng Giảng viên / Đối tác nội dung. Rất đơn giản, bạn chỉ cần cung cấp một số thông tin, chúng tôi sẽ phản hồi trong vòng 3 ngày làm việc.</p>

            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 nenxam">
                <img class="img img-responsive anhcangiua margintop30px" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/icon8.png">
                <span class="glyphicon glyphicon-chevron-right hidden-sm hidden-xs iconmuiten" aria-hidden="true"></span>
                <p class="textgiua margintop10px quytrinh">Soạn bài</p>
                <p class="textgiua can2ben15px fontlonhon1500">Chia sẻ những gì bạn biết. Truyền đạt những điều bạn đam mê. Hãy bắt đầu với những chủ đề ưa thích của bạn và soạn bài dựa trên kinh nghiệm đó.</p>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 nenxam">
                <img class="img img-responsive anhcangiua margintop30px" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/icon9.png">
                <span class="glyphicon glyphicon-chevron-right hidden-sm hidden-xs iconmuiten" aria-hidden="true"></span>
                <p class="textgiua margintop10px quytrinh">Làm phim</p>
                <p class="textgiua can2ben15px fontlonhon1500">Videos chiếm đến 90% thời lượng nội dung số. Vì vậy bạn nên biết cách quay phim và làm phim. Hoặc ít nhất là biết diễn tự nhiên trước ống kính. Phần còn lại, chúng tôi có thể giúp.</p>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 nenxam">
                <img class="img img-responsive anhcangiua margintop30px" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/icon10.png">
                <span class="glyphicon glyphicon-chevron-right hidden-sm hidden-xs iconmuiten" aria-hidden="true"></span>
                <p class="textgiua margintop10px quytrinh">Tạo khóa học</p>
                <p class="textgiua can2ben15px fontlonhon1500">Dễ dàng tải lên các video bài giảng, hội thảo, nội dung, hình ảnh, câu hỏi, tài liệu để tạo khóa học nền tảng của Lakita.</p>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 nenxam">
                <img class="img img-responsive anhcangiua margintop30px" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/icon11.png">
                <span class="glyphicon glyphicon-chevron-right hidden-sm hidden-xs iconmuiten" aria-hidden="true"></span>
                <p class="textgiua margintop10px quytrinh">Xuất bản</p>
                <p class="textgiua can2ben15px fontlonhon1500">Sau khi được phê duyệt, nội dung của bạn sẽ được xuất bản và truy cập trên mọi thiết bị, ở bất kỳ đâu. Chúng tôi sẽ lo các vấn đề hạ tầng, thanh toán, quy trình. Bạn chỉ cần chăm sóc học viên và chăm chút nội dung của mình.</p>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 nenxam">
                <img class="img img-responsive anhcangiua margintop30px" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/icon12.png">
                <span style="color:#f3f1f1" class="glyphicon glyphicon-chevron-right hidden-sm hidden-xs iconmuiten" aria-hidden="true"></span>
                <p class="textgiua margintop10px quytrinh">Thu nhập</p>
                <p class="textgiua can2ben15px fontlonhon1500">Tạo ra nguồn thu nhập mới, xây dựng thương hiệu cá nhân, trong khi vẫn truyền cảm hứng và chia sẻ tri thức có thể giúp thay đổi cuộc sống của biết bao người.</p>
            </div>
            <div class="clearfix" style="padding-bottom: 50px"></div>
        </div>


        <!--Tất cả tính năng-->
        <div id="tatcatinhnang">
            <div class="col-lg-6 col-md-5 col-sm-12 col-xs-12 " style="padding-top: 30px; background-color: #1e7546; color: #FFF;">
                <ul style="list-style-type: none" role="tablist">
                    <li role="presentation">
                        <p style="font-size: 35px">Tất cả Tính năng</p>
                        <p class="margintop-10px margintop-8px" style="font-size: 20px">Công cụ và công nghệ cần thiết cho việc chia sẻ.</p>
                    </li>
                    <li role="presentation" class="active">
                        <a class="font20 chutrang" href="#tinhnang2" aria-controls="tinhnang2" role="tab" data-toggle="tab">Những công cụ đơn giản để tạo nội dung</a>
                        <p class="fontlonhon1500">Không cần phải có kinh nghiệm thiết kế hay lập trình</p>
                    </li>
                    <li role="presentation">
                        <a class="font20 chutrang" href="#tinhnang3" aria-controls="tinhnang3" role="tab" data-toggle="tab">Tích hợp các dịch vụ dễ dàng</a>
                        <p class="fontlonhon1500">Dễ dàng tích hợp các dịch vụ video (Yutube, Vimeo, Wistia) và tài liệu (Slideshare, Scrbd).</p>
                    </li>
                    <li role="presentation">
                        <a class="font20 chutrang" href="#tinhnang4" aria-controls="tinhnang4" role="tab" data-toggle="tab">Chủ động quản lý khóa học</a>
                        <p class="fontlonhon1500">Quản lý nội dung khóa học, tương tác với học viên bằng những công cụ dễ sử dụng.</p>
                    </li>
                    <li role="presentation">
                        <a class="font20 chutrang" href="#tinhnang5" aria-controls="tinhnang5" role="tab" data-toggle="tab">Thống kê Doanh số và Thu nhập</a>
                        <p class="fontlonhon1500">Thống kê chi tiết, minh bạch về số lượt học, lượt mua, doanh thu, thu nhập.</p>
                    </li>
                    <li role="presentation">
                        <a class="font20 chutrang" href="#tinhnang6" aria-controls="tinhnang6" role="tab" data-toggle="tab">Đội hỗ trợ tận tâm</a>
                        <p class="fontlonhon1500">Sẵn sàng để trả lời và hỗ trợ giảng viên, đối tác 24 giờ x 7 ngày.</p>
                    </li>
                    <li role="presentation">
                        <a class="font20 chutrang" href="#tinhnang7" aria-controls="tinhnang7" role="tab" data-toggle="tab">Gặp gỡ những người cùng đam mê</a>
                        <p class="fontlonhon1500">Chia sẻ kinh nghiệm và học hỏi lẫn nhau từ cộng đồng giảng viên và đối tác.</p>
                    </li>
                    <li>
                        <button type="button" class="btdangky margintop30px" data-toggle="modal" data-target=".bs-example-modal-lg" style="background-color: #1e7546; border: 1px solid #FFF;">
                            TRỞ THÀNH GIẢNG VIÊN CỦA CHÚNG TÔI
                        </button>
                    </li>
                </ul>
            </div>
            <div id="anhtinhnang" class="col-lg-6 col-md-7 hidden-sm hidden-xs" style="padding: 30px 0 0 0;background-color: #1e7546; padding-right: 0px;float: right">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tinhnang2">
                        <img class="img img-responsive anhtn"  src="<?php echo base_url(); ?>styles/v2.0/img/teacher/tinhnang1.png">
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tinhnang3">
                        <img class="img img-responsive anhtn" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/tinhnang2.png">
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tinhnang4">
                        <img class="img img-responsive anhtn" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/tinhnang3.png">
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tinhnang5">
                        <img class="img img-responsive anhtn" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/tinhnang1.png">
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tinhnang6">
                        <img class="img img-responsive anhtn" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/tinhnang2.png">
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tinhnang7">
                        <img class="img img-responsive anhtn" src="<?php echo base_url(); ?>styles/v2.0/img/teacher/tinhnang3.png">
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <!--footer-->
        <div id="footer">
            <b class="paddingtop40 font40">Bạn đã sẵn sàng ?</b>
            <p class="xam fontlonhon1500">Bắt đầu xẻ chia tri thức ngay hôm nay.</p>

            <button type="button" class=" btdangky margintop40px" data-toggle="modal" data-target=".bs-example-modal-lg" style="padding: 13px 40px;">
                Đăng ký ngay
            </button>


        </div>
    </div> 
</div>

<script>
    function bat1() {
        document.getElementById('tab1').style.opacity = 0;
        document.getElementById('tab2').style.opacity = 1;
        document.getElementById('tab3').style.opacity = 1;
    }

    function bat2() {
        document.getElementById('tab1').style.opacity = 1;
        document.getElementById('tab2').style.opacity = 0;
        document.getElementById('tab3').style.opacity = 1;
    }

    function bat3() {
        document.getElementById('tab1').style.opacity = 1;
        document.getElementById('tab2').style.opacity = 1;
        document.getElementById('tab3').style.opacity = 0;
    }
</script>
