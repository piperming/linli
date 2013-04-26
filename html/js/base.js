$(document).ready(function(){
    $('.main_mune').click(function(){

    });
    $('#close_mune').click(function(){
        var left = $('.left');
        if(left.css('display') == 'none'){
            left.show();
            $('.right_box').css('margin-left' , '220px');
            $(this).removeClass('closed').addClass('close');
        }else{
            left.hide();
            $('.right_box').css('margin-left' , '0');
            $(this).removeClass('close').addClass('closed');
        }
    });
});

/*
 * 关闭弹出层
 */
$('#close_btn').live('click' , function(){
        $.unblockUI({
            fadeOut:200
        });
});