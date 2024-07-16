/*----------------------- responsive menu --------------------*/

$('.menu-item.has-sub-menu > a').on('click', function () {
    var _this = $(this).parent();

    if (_this.hasClass('open')) {

        _this.removeClass('open');
        _this.find('.responsive-menu-level-2').slideUp(200);

    } 
    
    else {

        _this.addClass('open');
        _this.find('.responsive-menu-level-2').slideDown(200);
        _this.siblings('li').children('.responsive-menu-level-2').slideUp(200);
        _this.siblings('li').removeClass('open')

    }
})

$('.menu-item-2.has-sub-menu-2 > a').on('click', function () {
    var _this1 = $(this).parent();

    if (_this1.hasClass('open')){

        _this1.removeClass('open');
        _this1.find('.responsive-menu-level-3').slideUp(200);
    }
    
    else {

        _this1.addClass('open');
        _this1.find('.responsive-menu-level-3').slideDown(200);
        _this1.siblings('li').children('.responsive-menu-level-3').slideUp(200);
        _this1.siblings('li').removeClass('open')

    }
})


/*----------------------- owl carousel slider --------------------*/

$(document).ready()
{
    var ol=$('.owl-carousel');
    ol.owlCarousel({
        items:4,
        rtl:true,
        nav:true,
        margin:25,
        loop:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            800:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
}

/*----------------------- scroll to top --------------------*/

$(document).ready(function($){
    var offset = 100;
    var speed = 250;
    var duration = 500;
	   $(window).scroll(function(){
            if ($(this).scrollTop() < offset) {
			     $('.topbutton') .fadeOut(duration);
            } else {
			     $('.topbutton') .fadeIn(duration);
            }
        });
	$('.topbutton').on('click', function(){
		$('html, body').animate({scrollTop:0}, speed);
		return false;
		});
});
