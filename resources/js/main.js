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
        $('.course-id').val(
            $(this).next().val()
        );
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.btn-take').click(function () {
        $('.btn-take').addClass('d-none');

        var userId = $('.user-id').val();
        var courseId = $('.cour-id').val();

        $.ajax({
            type: "POST",
            url: "/user-course",
            data: { "user_id": userId, "course_id": courseId, },
        });
    });

    $('a[data-toggle="tab"]').on('show.bs.tab', function () {
        localStorage.setItem('activeTab', $(this).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        console.log(activeTab);
        $('a[href="' + activeTab + '"]').tab('show');
    }

    var fiveStar = $('.five-star-val').val();
    var fourStar = $('.four-star-val').val();
    var threeStar = $('.three-star-val').val();
    var twoStar = $('.two-star-val').val();
    var oneStar = $('.one-star-val').val();

    $('.five-star').width(fiveStar);
    $('.four-star').width(fourStar);
    $('.three-star').width(threeStar);
    $('.two-star').width(twoStar);
    $('.one-star').width(oneStar);

    $('.more').click(function () {
        $('.more-action').not($(this).prev()).hide();
        $(this).prev().toggle();
    });

    $('.action-edit').click(function () {
        $('.more-action').hide();
        var reviewId = $(this).attr('reviewId');
        $('.cmt-txt-' + reviewId).addClass('d-none');
        $('.cmt-form-' + reviewId).removeClass('d-none');
    });

    $('.action-delete').click(function () {
        $('.more-action').hide();
        var reviewId = $(this).attr('reviewId');
        $('.account-review-' + reviewId).addClass('d-none');

        $.ajax({
            type: "DELETE",
            url: "/" + reviewId + "/review",
            success: function () {
                location.reload();
            }
        });
    });

    $('.btn-return').click(function () {
        var reviewId = $(this).attr('reviewId');
        $('.cmt-txt-' + reviewId).removeClass('d-none');
        $('.cmt-form-' + reviewId).addClass('d-none');
    });

    $('.btn-edit').click(function () {
        var reviewId = $(this).attr('reviewId');
        var formData = $('.form-edit-cmt').serializeArray();

        $.ajax({
            type: "PUT",
            url: "/" + reviewId + "/update-review",
            data: formData,
            success: function () {
                location.reload();
            }
        });
    });
});
