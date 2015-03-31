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
        messageForm('show');

        $('.messages-header').show();
        $('.new-message-to').hide();


        $.get( Yii.app.createUrl('im/getMessages'),
            {
                to: userId,
                offset: 0
            })
            .done(function(response){
                response = JSON.parse(response);
                $('.messages').html(response.messages);

                $('.messages-header .avatar img').attr('src',Yii.app.baseUrl + '/uploads/avatar/' + response.user.photo);
                $('.messages-header .nickname').html('<a href="' + Yii.app.createUrl('user/detail', {id: response.user.id}) + '">' + response.user.username + '</a>');
                $('.messages-header .address').text(response.user.address);

                scrollMessages();
            });
    });

    $(document).on('click', '.send-message-button', function(){
        //sendMessage();
        xmppSendMessage();
    });

    $('.message-textarea textarea').keydown(function (e) {
        if (!e.shiftKey && e.keyCode == 13) {
            e.preventDefault();
            //sendMessage();
            xmppSendMessage();
        }
    });

    $(document).on('click', '#new-message', function(){
        $('.messages-header').hide();
        $('.new-message-to').show();
        messageForm('hide');
        $('.messages').html('');
        $('.dialog').removeClass('active');
        $('#to-input').focus();
    });

    $('#to-input').autocomplete({
        serviceUrl: Yii.app.createUrl('im/userAutocomplete'),
        doStrong: false,
        appendTo: '.new-message-to',
        width: 'full',
        zIndex: 99,
        noHeight: true,
        onSelect: function(suggestion) {
            var html = $($.parseHTML(suggestion.value));

            var userName = $(html).attr('user-name');
            var userId = $(html).attr('user-id');
            messageForm('show');

            $(this).val(userName);
            $('#toId').val(userId);

            if($('.dialogs .dialog[user-id=' + userId + ']').length > 0)
            {
                $('.dialogs .dialog[user-id=' + userId + ']:first').trigger('click');
                $(this).val('');
            }
        }
    });

    $(document).on('click', '.new-message-to .cancel-new', function(){
        $('#to-input').val('');
        $('.dialogs .dialog:first').trigger('click');
        messageForm('show');
    });
    //monitorDialogs();
    //monitorMessages();
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


function drawNew(id)
{
    $.get(
        Yii.app.createUrl('im/getUserInfo'),
        {
            id: id
        }
    )
    .done(function(response) {
            response = JSON.parse(response);

            $('.messages-header .avatar a').attr('href', Yii.app.createUrl('/user/detail', {id: response.id}));
            $('.messages-header .avatar a img').attr('src', Yii.app.baseUrl + '/uploads/avatar/' + response.photo);
            $('.messages-header .nickname').html('<a href="' + Yii.app.createUrl('/user/detail', {id: response.id}) + '">' + response.name + '</a>');
            $('.messages-header .address').text(response.address);

            $('.dialogs .dialog').removeClass('active');
            $('.dialogs').prepend(response.dialog);
            $('.dialogs .dialog:first').addClass('active');

            $('.new-message-to').hide();
            $('.messages-header').show();
    });
}

function messageForm(option)
{
    if(option == 'show')
        $('.message-form').fadeIn(200);
    else
        $('.message-form').fadeOut(200);
}


function monitorDialogs()
{
    $.ajax({
        type: "POST",
        url: 'http://91.203.194.185:8888/dialogs',
        async: true,
        cache: false,
        data: {myId: myId},
        success: function(data){
            if(data != '')
                updateDialogs(data);

            setTimeout("monitorDialogs()",1000);
        },
        error: function(XMLHttpRequest,textStatus,errorThrown) {
            console.log("POLL ERROR: "+textStatus + " "+ errorThrown );
            setTimeout("monitorDialogs()",1000);
        }
    });
}

function updateDialogs(data)
{
    $.post( Yii.app.createUrl('im/getDialogs'),
        {
            content: data
        })
        .done(function(response){
            var activeDialog = $('.dialogs .dialog.active').attr('user-id'); //@todo Сохранение активности
            $('.dialogs').html(response);
            $('.dialogs .dialog[user-id=' + activeDialog + ']').addClass('active');
        });
}
function monitorMessages()
{
    $.ajax({
        type: "POST",
        url: 'http://91.203.194.185:8888/messages',
        async: true,
        cache: false,
        data: {myId: myId, toId: $('#toId').val()},
        success: function(data){
            if(data != '')
                updateMessages(data);

            setTimeout("monitorMessages()",1000);
        },
        error: function(XMLHttpRequest,textStatus,errorThrown) {
            console.log("POLL ERROR: "+textStatus + " "+ errorThrown );
            setTimeout("monitorMessages()",1000);
        }
    });
}
function updateMessages(data)
{
    $.post( Yii.app.createUrl('im/appendMessages'),
        {
            content: data
        })
        .done(function(response){
            $('.messages').append(response);
            scrollMessages(false);
        });
}