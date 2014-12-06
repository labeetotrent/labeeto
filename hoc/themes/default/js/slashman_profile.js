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
    /* SAVE FROM LEFT */
    $('#about-save').click(function(){
        var about = $(this).parent().parent().parent().find('.edit textarea').val();
        var infoBlock = $(this).parent().parent().parent();
        var replaceText = $(this).parent().parent().parent().find('.view');
        $.post( Yii.app.createUrl('ajax/userUpdateAbout'),
            {
                about: about
            }).done(function(response){
                $(replaceText).text(about);
                hideInfoBlock(infoBlock);
            });
    });
    $('#education-save').click(function(){
        var education = $(this).parent().parent().parent().find('.value.edit select').val();
        var replaceWith = $(this).parent().parent().parent().find('.value.edit select option:selected').text();
        var infoBlock = $(this).parent().parent().parent();
        var replaceText = $(this).parent().parent().parent().find('.value.view');
        $.post( Yii.app.createUrl('ajax/userUpdateEducation'),
            {
                education: education
            }).done(function(response){
                $(replaceText).text(replaceWith);
                hideInfoBlock(infoBlock);
            });
    });
    $('#religion-save').click(function(){
        var religion = $(this).parent().parent().parent().find('.value.edit select').val();
        var replaceWith = $(this).parent().parent().parent().find('.value.edit select option:selected').text();
        var infoBlock = $(this).parent().parent().parent();
        var replaceText = $(this).parent().parent().parent().find('.value.view');
        $.post( Yii.app.createUrl('ajax/userUpdateReligion'),
            {
                religion: religion
            }).done(function(response){
                $(replaceText).text(replaceWith);
                hideInfoBlock(infoBlock);
            });
    });
    $('#ethnicity-save').click(function(){
        var ethnicity = $(this).parent().parent().parent().find('.value.edit select').val();
        var replaceWith = $(this).parent().parent().parent().find('.value.edit select option:selected').text();
        var infoBlock = $(this).parent().parent().parent();
        var replaceText = $(this).parent().parent().parent().find('.value.view');
        $.post( Yii.app.createUrl('ajax/userUpdateEthnicity'),
            {
                ethnicity: ethnicity
            }).done(function(response){
                $(replaceText).text(replaceWith);
                hideInfoBlock(infoBlock);
            });
    });
    $('#height-save').click(function(){
        var height = $(this).parent().parent().parent().find('.value.edit select[name=feet]').val() + '.' + $(this).parent().parent().parent().find('.value.edit select[name=inches]').val();
        var infoBlock = $(this).parent().parent().parent();
        var replaceText = $(this).parent().parent().parent().find('.value.view');
        $.post( Yii.app.createUrl('ajax/userUpdateHeight'),
            {
                height: height
            }).done(function(response){
                $(replaceText).text(height + ' FEET');
                hideInfoBlock(infoBlock);
            });
    });
    $('#children-save').click(function(){
        var children = $(this).parent().parent().parent().find('.value.edit select').val();
        var replaceWith = $(this).parent().parent().parent().find('.value.edit select option:selected').text();
        var infoBlock = $(this).parent().parent().parent();
        var replaceText = $(this).parent().parent().parent().find('.value.view');
        $.post( Yii.app.createUrl('ajax/userUpdateChildren'),
            {
                children: children
            }).done(function(response){
                $(replaceText).text(replaceWith);
                hideInfoBlock(infoBlock);
            });
    });
    $('#passion-save').click(function(){
        var passion = $(this).parent().parent().parent().find('.value.edit input').val();
        var infoBlock = $(this).parent().parent().parent();
        var replaceText = $(this).parent().parent().parent().find('.value.view');
        $.post( Yii.app.createUrl('ajax/userUpdatePassion'),
            {
                passion: passion
            }).done(function(response){
                $(replaceText).text(passion);
                hideInfoBlock(infoBlock);
            });
    });
    $('#gym-save').click(function(){
        var gym = $(this).parent().parent().parent().find('.value.edit input').val();
        var infoBlock = $(this).parent().parent().parent();
        var replaceText = $(this).parent().parent().parent().find('.value.view');
        $.post( Yii.app.createUrl('ajax/userUpdateGym'),
            {
                gym: gym
            }).done(function(response){
                $(replaceText).text(gym);
                hideInfoBlock(infoBlock);
            });
    });

    /* ADD NEW CUSTOM QUESTION */

    $('#custom-create').click(function(){
        var question = $(this).parent().parent().parent().find('input').val();
        var answer = $(this).parent().parent().parent().find('textarea').val();
        if(question !== '' && answer !== '')
        {
            $.post( Yii.app.createUrl('ajax/createCustomQuestion'),
                {
                    question: question,
                    answer: answer
                }).done(function(response){
                    $('.left-custom > div:last').after(response);
                });
        }
    });

    /* SAVE CUSTOM QUESTION */

    $('.custom-save').click(function(){
        var infoBlock = $(this).parent().parent().parent();
        var questionId = $(this).parent().parent().parent().attr('question-id');
        var answer = $(this).parent().parent().parent().find('textarea').val();
        var replaceText = $(this).parent().parent().parent().find('.value.view');

        $.post( Yii.app.createUrl('ajax/userUpdateCustom'),
            {
                questionId: questionId,
                answer: answer
            }).done(function(response){
                $(replaceText).text(answer);
                hideInfoBlock(infoBlock);
            });
    });

    /* AVATAR UPLOAD */
    $(document).on({
        mouseenter: function () {
            $('.avatar-upload-popover').animate({
                opacity: 1
            }, 500);
        },
        mouseleave: function () {
            $('.avatar-upload-popover').animate({
                opacity: 0
            }, 500);
        }
    }, '.avatar-container');
    /* PHOTO UPLOAD */
    $('#add-photo-button').click(function(){
        $('#public_photo').modal('show');
    });
    $('#add-private-photo-button').click(function(){
        $('#private_photo').modal('show');
    });
    /* VIDEO UPLOAD */
    $('#add-video-button').click(function(){
        $('#UploadVideo').modal('show');
    });

    /* SET PROFILE IMAGE */

    $(document).on({
        mouseenter: function () {
            $(this).find('.set-profile').animate({
                opacity: 1
            }, 500);
        },
        mouseleave: function () {
            $(this).find('.set-profile').animate({
                opacity: 0
            }, 500);
        }
    }, '.photo-container');

    $(document).on('click', '.set-profile i', function(){
        $.post( Yii.app.createUrl('ajax/setAvatar'),
            {
                photoId: $(this).attr('photo-id')
            }).done(function(response){
                response = JSON.parse(response);
                if(response.result == 'OK')
                {
                    $('img.avatar-image').attr('src','/uploads/avatar/' + response.photo + '?' + Math.random());
                }
            });
    });

    /* GYMS */
    $('#gym').autocomplete({
        serviceUrl:'/ajax/gymAutocomplete'
    });
    $('#passion').autocomplete({
        serviceUrl:'/ajax/passionAutocomplete'
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
        hideInfoBlock(infoBlock);
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

    $('.photo').fancybox({
        nextEffect	: 'fade',
        prevEffect	: 'fade'
    });
});

function hideInfoBlock(infoBlock)
{
    $(infoBlock).find('.edit-buttons').hide();
    infoBlock.find('.edit').hide();
    infoBlock.find('.view').show();
    infoBlock.find('i').show();
}