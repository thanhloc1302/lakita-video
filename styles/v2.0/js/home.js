$(
        function () {

            $("#back_to_login").click(function(){
                $("a#tab_login").click();
            });
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
            $("a#link_register").click(function () {
                $("a#tab_register").click();
                return false;
            });
            $("a#link_login").click(function () {
                $("a#tab_login").click();
                return false;
            });
            $("a#link_forgetpassword").click(function () {
                $("a#tab_forgetpassword").click();
                return false;
            });
            // $('#myModal3').modal({show: true});
            $('.carousel').carousel({
                interval: 10000
            });
            // $('div.header div.item img').css({"width":window.innerWidth});
            var contentHeight = $('div.TestimonialHighlight').innerHeight();
            var contentWidth = $('div.TestimonialHighlight').innerWidth();
            $('div.content').css({"height": contentHeight, "width": contentWidth});


           
            $(window).resize(function () {
                var contentHeight = $('div.TestimonialHighlight').innerHeight();
                var contentWidth = $('div.TestimonialHighlight').innerWidth();
                $('div.content').css({"height": contentHeight, "width": contentWidth});
            });
            
            


/*****************************************************SEARCH**********************************************/
            $("input#key_word").on({
                focus: function () {
                    $(this).val('');
                },
                blur: function () {
                    if ($(this).val() == '')
                        $(this).val('Tìm các khóa học bạn quan tâm...');
                }
            });
            $('.text-header .searchIcon').click(
                    function () {
                        $("#searchForm").submit();
                    }
            );
    /*****************************************************SEARCH (HÉT)**********************************************/
        });