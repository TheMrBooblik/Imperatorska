$(function() {
    var d=300;
    $('#navigation a').each(function(){
        $(this).stop().animate({
            'marginTop':'-50px'
        },d+=150);
    });

    $('#navigation > li').hover(
    function () {
        $('a',$(this)).stop().animate({
            'marginTop':'-2px'
        },200);
    },
    function () {
        $('a',$(this)).stop().animate({
            'marginTop':'-50px'
        },200);
    }
);
});
$(document).ready(function(){

    $(function (){
		$("#back-top").hide();

		$(window).scroll(function (){
			if ($(this).scrollTop() > 700){
				$("#back-top").fadeIn();
			} else{
				$("#back-top").fadeOut();
			}
		});

		$("#back-top a").click(function (){
			$("body,html").animate({
				scrollTop:0
			}, 800);
			return false;
		});
	});
});
