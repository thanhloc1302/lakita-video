$(function () {
    var contentWidthFooter = $('div.footer').innerWidth();
    $('div.footer div.row').css({"width": contentWidthFooter});
    $(window).resize(function () {
        var contentWidthFooter = $('div.footer').innerWidth();
        $('div.footer div.row').css({"width": contentWidthFooter});
    });
});