$(function () {

    /*============================= ĐĂNG KÝ - ĐĂNG NHẬP =================================*/
    $("#menu_register").click(function () {
        $("#show_modal").click();
        $("a#tab_register").click();
        return false;
    });
    $("#menu_login").click(function () {
        $("#show_modal").click();
        $("a#tab_login").click();
        return false;
    });
    /*============================= ĐĂNG KÝ - ĐĂNG NHẬP (HẾT) =================================*/

    /*============================== menu header ===========================================*/
    

    $(".commingsoon").click(function () {
        alert("Bạn chưa có thông báo mới");
        return false;
    });
  /* Add slideDown animation to Bootstrap dropdown when expanding.*/
    $('.dropdown').on('show.bs.dropdown', function () {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
    });

    /* Add slideUp animation to Bootstrap dropdown when collapsing.*/
    $('.dropdown').on('hide.bs.dropdown', function () {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
    });
   

});

