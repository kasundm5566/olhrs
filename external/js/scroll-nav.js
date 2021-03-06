//jQuery to collapse the navbar on scroll
$(window).scroll(function () {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("nav-collapse");
    }
});

$(document).ready(function () {
    // Every time the window is scrolled
    $(window).scroll(function () {
        // Check the location of each desired element
        $(".dynamic-section").each(function (i) {
            var bottom_of_object = $(this).offset().top;
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            // If the object is completely visible in the window, fade it it
            if (bottom_of_window > bottom_of_object) {
                $(this).animate({'opacity': '1'}, 500);
            }
        });
    });
});

$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 2000, 'easeInOutExpo');
        event.preventDefault();
    });
});