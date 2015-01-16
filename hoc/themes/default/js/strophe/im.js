/**
 * Created by slashman on 15.01.15.
 */
var BOSH_SERVICE = '/http-bind/';
var connection = null;

$(document).ready(function () {
    connection = new Strophe.Connection(BOSH_SERVICE);

    connection.connect(xmppUser,
        xmppPass,
        onConnect);
});

function onConnect(status)
{
    if (status == Strophe.Status.CONNECTING) {
        console.log('Strophe is connecting.');
    } else if (status == Strophe.Status.CONNFAIL) {
        console.log('Strophe failed to connect.');
        $('#connect').get(0).value = 'connect';
    } else if (status == Strophe.Status.DISCONNECTING) {
        console.log('Strophe is disconnecting.');
    } else if (status == Strophe.Status.DISCONNECTED) {
        console.log('Strophe is disconnected.');
        $('#connect').get(0).value = 'connect';
    } else if (status == Strophe.Status.CONNECTED) {
        console.log('Strophe is connected.');
        console.log('ECHOBOT: Send a message to ' + connection.jid +
        ' to talk to me.');

        connection.addHandler(onMessage, null, 'message', null, null,  null);
        connection.send($pres());
    }
}

function onMessage(msg) {
    var to = msg.getAttribute('to');
    var from = msg.getAttribute('from');
    var type = msg.getAttribute('type');
    var elems = msg.getElementsByTagName('body');

    if (type == "chat" && elems.length > 0) {
        var body = elems[0];

        if(stripXmppName(from) == userId) //Если сообщение от текущего пользователя
        {
            renderMessage(from, body.textContent, 'incoming');
        }
        else
        {
            //@todo От другого пользователя
        }
    }
    return true;
}

function xmppSendMessage()
{
    var message = $('.message-textarea textarea').val();
    var to = $('#toId').val();

    $.post( Yii.app.createUrl('im/sendMessage'),
        {
            to: to,
            message: message
        }).done(function(response){
            var msg = $msg({to: xmppDomainName(userId), from: connection.jid, type: 'chat'}).c('body').t(message);
            connection.send(msg.tree());
        });

    renderMessage(xmppName(userId), message, 'out');
    scrollMessages(true);
}

function xmppName(id)
{
    return id + '@zhilin.skib6.ru';
}

function xmppDomainName(id)
{
    return id + '@zhilin.skib6.ru';
}

function stripXmppName(name)
{
    return name.substr(0,name.indexOf('@'));
}

function renderMessage(xmppId, message, type)
{
    $.post(
        Yii.app.createUrl('im/ajaxGetXmppUser'),
        {id: xmppId}
    ).done(
        function(response){
            response = JSON.parse(response);
            var messageBlock = '';

            if(type == 'incoming')
                messageBlock = '<div class="col-md-12 message"><div class="col-md-2 avatar"><img src="' + response.user.avatar + '" class="img-circle img-responsive"/></div><div class="col-md-10"><div class="row message-info"><span class="nickname">' + response.user.username + '</span><span class="date">' + response.date + '</span></div><div class="row message-content">' + message + '</div></div></div>';
            else {
                $('.message-textarea textarea').val('');
                messageBlock = '<div class="col-md-12 message my"><div class="col-md-10"><div class="row message-info"><span class="date">' + response.date + '</span><span class="nickname">ME</span></div><div class="row message-content">' + message + '</div></div><div class="col-md-2 avatar"><img src="' + response.user.avatar + '" class="img-circle img-responsive"/></div></div>';
            }

            $('.messages').append(messageBlock);
        }
    );
}
$(window).unload(function(){
    this.connection.options.sync = true; // Switch to using synchronous requests since this is typically called onUnload.
    this.connection.flush();
    this.connection.disconnect();
});