$(document).ready(function () {
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });

    function toggleNavbarMethod() {
        if ($(window).width() > 992) {
            $('.navbar .dropdown').on('mouseover', function () {
                $('.dropdown-toggle', this).trigger('click');
            }).on('mouseout', function () {
                $('.dropdown-toggle', this).trigger('click').blur();
            });
        } else {
            $('.navbar .dropdown').off('mouseover').off('mouseout');
        }
    }


    // Testimonials carousel
    $(".testimonials-carousel").owlCarousel({
        autoplay: true,
        dots: true,
        loop: true,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });

    toggleNavbarMethod();
    $(window).resize(toggleNavbarMethod);
});




