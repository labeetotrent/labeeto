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
    $(document).on({
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
    }, '.info-block, .profile-description, .looking-for-stripe');

    $('.slider').noUiSlider({
        start: [50],
        range: {
            'min': 0,
            'max': 100
        }
    });


    /* EDIT BUTTONS */
    $('.description-edit-icon').click(function(){
        var block = $(this).parent().parent();
        $(this).parent().hide();
        block.find('.view').hide();
        block.find('.edit').show();
        $('.description-edit-buttons').show();
    });
    $('.description-edit-buttons .btn-cancel-st').click(function(){
        var block = $(this).parent().parent().parent();
        $('.description-edit-buttons').hide();
        $('.description-edit-icon').parent().show();
        block.find('.edit').hide();
        block.find('.view').show();
    });
    $('.info-block .edit-info-block').click(function(){
        var infoBlock = $(this).parent().parent().parent();

        infoBlock.find('.edit-buttons').show();
        infoBlock.find('.view').hide();
        infoBlock.find('.edit').show();
        $(this).hide();
    });
    $('.info-block .btn-cancel-st').click(function(){
        var infoBlock = $(this).parent().parent().parent();

        $(this).parent().parent().hide();
        infoBlock.find('.edit').hide();
        infoBlock.find('.view').show();
        infoBlock.find('i').show();
    });
    $('.left-custom .new-question .custom-question-btn').click(function(){
        var infoBlock = $(this).parent().parent();

        infoBlock.find('.view').hide();
        infoBlock.find('.edit').show();
    });
    $('.left-custom .new-question .btn-cancel-st').click(function(){
        var infoBlock = $(this).parent().parent().parent().parent();

        infoBlock.find('.edit').hide();
        infoBlock.find('.view').show();
    });
});