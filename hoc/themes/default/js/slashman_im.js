/**
 * Created by slashman on 19.12.14.
 */
$(document).ready(function(){
    scrollMessages();
    hideCurrentBadge();

    $(document).on({
        mouseenter: function () {
            $(this).addClass('hovered', 500);
        },
        mouseleave: function () {
            $(this).removeClass('hovered', 500);
        }
    }, '.dialog');
    $(document).on('click', '.dialog', function(){
        var userId = $(this).attr('user-id');

        $('#toId').val(userId);
        $('.dialog').removeClass('active');
        $(this).addClass('active');
        $('.messages').html('<i class="fa fa-spin fa-refresh"></i>');
        $(this).find('.messages-count').fadeOut(500);


        $.get( Yii.app.createUrl('im/getMessages'),
            {
                to: userId,
                offset: 0
            })
            .done(function(response){
                response = JSON.parse(response);
                $('.messages').html(response.messages);

                $('.messages-header .avatar img').attr('src',Yii.app.baseUrl + '/uploads/avatar/' + response.user.photo);
                $('.messages-header .nickname').text(response.user.username);
                $('.messages-header .address').text(response.user.address);

                scrollMessages();
            });
    });

    $(document).on('click', '.send-message-button', function(){
        sendMessage();
    });

    $('.message-textarea textarea').keydown(function (e) {
        if (!e.shiftKey && e.keyCode == 13) {
            e.preventDefault();
            sendMessage();
        }
    });
});

function scrollMessages(animate)
{
    if(typeof animate == 'undefined')
        animate = false;

    var wtf    = $('.messages');
    var height = wtf[0].scrollHeight;

    if(!animate)
    {
        wtf.scrollTop(height);
    }
    else
    {
        $(".messages").animate({ scrollTop: height }, 100);
    }
}

function hideCurrentBadge()
{
    $.get( Yii.app.createUrl('im/readMessages'),
        {
            to: $('.dialog.active').attr('user-id')
        })
        .done(function(response){
            $('.dialog.active').find('.messages-count').fadeOut(500);
        });
}

function sendMessage()
{
    var message = $('.message-textarea textarea').val();
    var to = $('#toId').val();

    $.post( Yii.app.createUrl('im/sendMessage'),
        {
            to: to,
            message: message
        })
        .done(function(response){
            $('.message-textarea textarea').val('');
            $('.messages .message').after(response);
            $('.messages .message:last').fadeIn(300);
            scrollMessages(true);
        });
}