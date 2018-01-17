$(function(){
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
            $('.searchIcon').click(
                    function () {
                        $("#searchForm").submit();
                    }
            );
    /*****************************************************SEARCH (HÉT)**********************************************/
    
});