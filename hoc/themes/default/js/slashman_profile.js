$(document).ready(function(){
    $('.container-element .videos').click(function(){
        $('#videos-tab').show();
        $('#photos-tab').hide();
        $('#private-photos-tab').hide();
    });
    $('.container-element .photos').click(function(){
        $('#videos-tab').hide();
        $('#private-photos-tab').hide();
        $('#photos-tab').show();
    });
    $('.container-element .private').click(function(){
        $('#videos-tab').hide();
        $('#photos-tab').hide();
        $('#private-photos-tab').show();
    });
    $('.profile-left').on({
        mouseenter: function () {
            $(this).find('i').animate({
                opacity: 1
            }, 500);
        },
        mouseleave: function () {
            $(this).find('i').animate({
                opacity: 0
            }, 500);
        }
    }, '.info-block');

    $('.slider').noUiSlider({
        start: [50],
        range: {
            'min': 0,
            'max': 100
        }
    });
});