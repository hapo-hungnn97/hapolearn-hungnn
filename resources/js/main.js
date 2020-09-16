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

    let errorLogin = $('.input-error-login').val();
    let errorRegister = $('.input-error-register').val();
    if (errorLogin === 'error') {
        $('#signModal').modal('show');
    }
    if (errorRegister === 'error') {
        $('#signModal').modal('show');
        $('.modal-title-register').trigger("click");
    }

    $('.btn-take-course, .btn-more').click(function () {
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

        let url = $('.route').val();
        let userId = $('.user-id').val();
        let courseId = $('.cour-id').val();

        $.ajax({
            type: "POST",
            url: url,
            data: { "user_id": userId, "course_id": courseId, },
            success: function () {
                location.reload();
            }
        });
    });

    $('a[data-toggle="tab"]').on('show.bs.tab', function () {
        localStorage.setItem('activeTab', $(this).attr('href'));
    });
    let activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        $('a[href="' + activeTab + '"]').tab('show');
    }

    let fiveStar = $('.five-star-val').val();
    let fourStar = $('.four-star-val').val();
    let threeStar = $('.three-star-val').val();
    let twoStar = $('.two-star-val').val();
    let oneStar = $('.one-star-val').val();

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
        let reviewId = $(this).attr('reviewId');
        $('.cmt-txt-' + reviewId).addClass('d-none');
        $('.cmt-form-' + reviewId).removeClass('d-none');
    });

    $('.action-delete').click(function () {
        $('.more-action').hide();
        let reviewId = $(this).attr('reviewId');
        $('.account-review-' + reviewId).addClass('d-none');
        $('.account-review-' + reviewId).next().addClass('d-none');
    });

    $('.btn-return').click(function () {
        let reviewId = $(this).attr('reviewId');
        $('.cmt-txt-' + reviewId).removeClass('d-none');
        $('.cmt-form-' + reviewId).addClass('d-none');
    });

    $('.btn-filter').click(function () {
        $('.fil').toggle();
    });

    $('.filter-new').click(function () {
        if ($('.filter-new').hasClass('acti')) {
            $('.filter-new').removeClass('acti');
        } else {
            $(this).addClass('acti');
            $('.filter-old').removeClass('acti');
            $('.status').val('new');
        }
    });

    $('.filter-old').click(function () {
        if ($('.filter-old').hasClass('acti')) {
            $('.filter-old').removeClass('acti');
        } else {
            $(this).addClass('acti');
            $('.filter-new').removeClass('acti');
            $('.status').val('old');
        }
    })

    $('select[name="learner"]').change(function () {
        $('select[name="times"], select[name="lesson"], select[name="review"]').val('');
    });

    $('select[name="times"]').change(function () {
        $('select[name="learner"], select[name="lesson"], select[name="review"]').val('');
    });

    $('select[name="lesson"]').change(function () {
        $('select[name="times"], select[name="learner"], select[name="review"]').val('');
    });

    $('select[name="review"]').change(function () {
        $('select[name="times"], select[name="lesson"], select[name="learner"]').val('');
    });
});
