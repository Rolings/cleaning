$(document).ready(function () {

    const isCookiesPage = window.location.pathname.includes("cookies");

    if (!localStorage.getItem('cookieConsent') && !isCookiesPage) {
        $('#cookie-accept-modal').modal('show');
    }

    $('#acceptCookies').click(function() {
        localStorage.setItem('cookieConsent', 'accepted');
        $('#cookie-accept-modal').modal('hide');
    });

    $('#declineCookies').click(function() {
        localStorage.setItem('cookieConsent', 'declined');
        $('#cookie-accept-modal').modal('hide');
    });

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });

    $('#phone').mask('+1 (000) 000-0000');

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




