/*backgrounds parallax*/
function parallax() {
    window.onscroll = function() {
        let innerDeep = document.querySelector('.parallax--inner_deep'),
            inner = document.querySelector('.parallax--inner'),
            left_background = document.querySelector('.parallax--background__left'),
            right_background = document.querySelector('.parallax--background__right'),
            left_foreground = document.querySelector('.parallax--foreground_left'),
            right_foreground = document.querySelector('.parallax--foreground_right');

        let speed = 5,
            speed2 = 4,
            speed3 = .4,
            speed4 = 1.2;
        // scrolled = $(window).scrollTop();

        // document.body.style.backgroundPosition = (-window.pageXOffset/speed)+"px "+(-window.pageYOffset/speed)+"px";
        inner.style.backgroundPosition = "center " + (-window.pageYOffset/speed2) + "px";
        innerDeep.style.backgroundPosition = "center " + (-window.pageYOffset/speed) + "px";
        left_background.style.top = 0 - (window.pageYOffset * speed3) + 'px';
        right_background.style.top = 0 - (window.pageYOffset * speed3) + 'px';
        left_foreground.style.top = 0 - (window.pageYOffset * speed4) + 'px';
        right_foreground.style.top = 0 - (window.pageYOffset * speed4) + 'px';

    }
}

jQuery(document).ready(function($){

    if ($(window).width() >= 768) {
        parallax();
    }else{
        $(window).resize( function(){
            if ($(window).width() >= 768) {
                parallax();
            }
        });
    }
});
/*backgrounds parallax end*/