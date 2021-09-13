$(document).ready(function () {

    //appear
    $('.appear:in-viewport').addClass('animated fadeIn');
    $('.appear-blur:in-viewport').addClass('appeared-blur');

    $(window).scroll(function () {
        $('.appear:in-viewport').addClass('animated fadeIn');
        $('.appear-blur:in-viewport').addClass('appeared-blur');
        $('.grow:in-viewport').addClass('grown');
    });

    //top button
    //doc:
    //http://api.jquery.com/scrolltop/
    //http://api.jquery.com/animate/
    $("#top").click(function () {
        $("body, html").animate({
            scrollTop: 0
        }, 800);
        return false;
    });

    //smooth scrolling
    $('a[href^="#"]').click(function () {
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top - 40
        }, 2000);
        return false;
    });
    
    //hover and click
    function animationClick(trigger, element, animation) {
        element = $(element);
        trigger = $(trigger);
        trigger.click(
            function () {
                element.addClass('animated ' + animation);
                //wait for animation to finish before removing classes
                window.setTimeout(function () {
                    element.removeClass('animated ' + animation);
                }, 2000);

            });
    }

    function animationHover(trigger, element, animation) {
        element = $(element);
        trigger = $(trigger);
        trigger.hover(
            function () {
                element.addClass('animated ' + animation);
            },
            function () {
                //wait for animation to finish before removing classes
                window.setTimeout(function () {
                    element.removeClass('animated ' + animation);
                }, 2000);
            });
    }
});
