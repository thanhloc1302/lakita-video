
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand text-center" href="<?php echo 'https://lakita.vn/'; ?>"> <img
                    src="https://crm2.lakita.vn/style/img/logo5.png"
                    class="logo-navbar img-responsive"> </a>

            <!--Button đóng mở slide menu-->
            <button id="btn-menu-silde"><span></span><span></span><span></span></button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form action="<?php echo base_url('tim-kiem.html'); ?>" method="GET" class="navbar-form navbar-left">
                <div class="input-group search">
                    <input type="text" class="form-control" name="key_word" placeholder="Tìm kiếm các khóa học bạn quan tâm..."
                    <?php echo isset($_GET['key_word']) ? 'value="' . $_GET['key_word'] . '"' : '' ?>
                           />
                    <span class="input-group-btn">
                        <input class="btn btn-default" type="submit" value="Tìm kiếm"/> 
                    </span>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">

                <li class="li-active dropdown-notification">
                    <span class="notification btn ">
                        &nbsp;&nbsp;&nbsp;          <i class="fa fa-bell" aria-hidden="true"></i> <sup><span
                                class="badge">4</span></sup>

                    </span>
                    <button type="button" class="btn btn-default navbar-btn active-khoa-hoc"><a href="">
                            <i class="fa fa-unlock-alt" aria-hidden="true"></i> &nbsp; Kích hoạt khóa học </a>
                    </button>
                    <div class="content-notification">
                        <a href="#"><i class="fa fa-id-card" aria-hidden="true"></i>&nbsp;&nbsp;
                            Khóa học của tôi</a>
                        <a href="#"><i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;&nbsp;Lịch sử giao
                            dịch</a>
                        <a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i>
                            &nbsp;&nbsp;Thông tin cá nhân</a>
                        <a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i>
                            &nbsp;&nbsp;Đăng xuất</a>
                    </div>


                </li>
                <li>
                    <div class="dropdown">
                        <div class="dropdown-content">
                            <a href="#"><i class="fa fa-id-card" aria-hidden="true"></i>&nbsp;&nbsp;
                                Khóa học của tôi</a>
                            <a href="#"><i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;&nbsp;Lịch sử giao
                                dịch</a>
                            <a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i>
                                &nbsp;&nbsp;Thông tin cá nhân</a>
                            <a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i>
                                &nbsp;&nbsp;Đăng xuất</a>
                        </div>
                    </div>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>



<!--Các menu trên mobie-->
<div id="mySidenav" class="sidenav">
    <hr>
    <a href="<?php echo 'https://lakita.vn/'; ?>khoa-hoc-cua-toi.html">
        <i class="fa fa-pencil-square-o fa-fw" aria-hidden="true"></i> &nbsp;&nbsp;
        Khóa học của tôi
    </a>
    <hr>
    <a href="<?php echo 'https://lakita.vn/'; ?>kich-hoat-khoa-hoc.html">
        <i class="fa fa-compress fa-fw" aria-hidden="true"></i>
        &nbsp;&nbsp; Kích hoạt khóa học 
    </a>
    <hr>
    <a href="<?php echo 'https://lakita.vn/'; ?>nap-tien-vao-tai-khoan.html">
        <i class="fa fa-usd fa-fw" aria-hidden="true"></i>
        &nbsp;&nbsp; Nạp tiền vào tài khoản 
    </a>
    <hr>
    <a href="<?php echo 'https://lakita.vn/'; ?>thong-tin-tai-khoan.html">
        <i class="fa fa-user fa-fw" aria-hidden="true"></i>
        &nbsp;&nbsp;Tài khoản
    </a>
    <hr>
    <a href="https://lakita.vn/student/logout">
        <i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>
        &nbsp;&nbsp;Đăng xuất
    </a>
</div><!--Kết thúc menu trên mobie-->


<div class="container-fluid"> <!--Body Content-->
    <!-- Set up your HTML -->
    <div>
        <div class="owl-carousel owl-theme slider">
            <div class="img-slider">
                <a href="https://lakita.vn/combo-qua-khung-dip-giang-sinh.html" target="_blank">
                    <picture>
                        <source srcset="styles/v2.0/img/banner/banner-tet-ipad.png" media="(max-width: 700px)">
                        <source srcset="styles/v2.0/img/banner/banner-tet-mobile.png" media="(max-width: 450px)">
                        <img srcset="styles/v2.0/img/banner/banner-tet.png">
                    </picture>
<!--                    <img class="img-rounded" src="styles/v2.0/img/banner/banner-tet.png"/>-->
                </a> 
            </div>
            <div class="img-slider">
                <a href="<?php echo base_url('dich-vu-excel.html'); ?>" target="_blank">
                    <picture>
                        <source srcset="styles/v2.0/img/banner/dich-vu-excel-ipad.png" media="(max-width: 700px)">
                        <source srcset="styles/v2.0/img/banner/dich-vu-excel-mobile.png" media="(max-width: 450px)">
                        <img srcset="styles/v2.0/img/banner/dich-vu-excel.png">
                    </picture>
<!--                    <img class="img-rounded" src="styles/v2.0/img/banner/dich-vu-excel.png"/>-->
                </a>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo 'https://lakita.vn/'; ?>styles/v2.0/js/navbar.js?ver=<?php echo _VER_CACHED_ ?>"></script>
<script type="text/javascript" src="<?php echo 'https://lakita.vn/'; ?>styles/v2.0/js/notification.js?ver=<?php echo _VER_CACHED_ ?>"></script>
