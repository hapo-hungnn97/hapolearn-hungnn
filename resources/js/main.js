$(document).ready(function () {
    $('.modal-title-login').click(function () {
        $('#register').hide();
        $('#login').show();
        $('.modal-title-register').css({ 'color': '#B2D235', 'background': '#FFFFFF' });
        $('.modal-title-login').css({ 'color': '#FFFFFF', 'background': '#B2D235' });
    });

    $('.modal-title-register').click(function () {
        $('#login').hide();
        $('#register').removeClass('d-none');
        $('#register').show();
        $('.modal-title-login').css({ 'color': '#B2D235', 'background': '#FFFFFF' });
        $('.modal-title-register').css({ 'color': '#FFFFFF', 'background': '#B2D235' });
    });

    $('.header-button').click(function () {
        $('.icon').toggleClass('fa-times');
        $('.icon').toggleClass('fa-bars');
    });

    $('.messenger').click(function () {
        $('.toggle-class').toggle();
    });

    $('.close').click(function () {
        $('.toggle-class').hide();
    });

    $('.slide-block').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        prevArrow: $('.prev'),
        nextArrow: $('.next'),
        responsive: [
            {
                breakpoint: 980,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
        ]
    });

    $('[data-toggle="tooltip"]').tooltip();

    $('.logout').click(function () {
        $('.form-logout').submit();
    });

    var errorLogin = $('.input-error-login').val();
    var errorRegister = $('.input-error-register').val();
    if (errorLogin === 'error') {
        $('#signModal').modal('show');
    }
    if (errorRegister === 'error') {
        $('#signModal').modal('show');
        $('.modal-title-register').trigger("click");
    }

    $('.btn-take-course').click(function () {
        $('.course_id').val(
            $(this).next().val()
        );
    });
});
