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
            to: userId,
            message: message
        }).done(function(response){
            response = JSON.parse(response);
            var msg = $msg({to: xmppDomainName(userId), from: connection.jid, type: 'chat'}).c('body').t(response.message);
            connection.send(msg.tree());
            renderMessage(xmppName(userId), response.message, 'out');
        });

}

function xmppName(id)
{
    return id + '@labeeto.com';
}

function xmppDomainName(id)
{
    return id + '@labeeto.com';
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
            {
                myApp.addMessage({
                    // Message text
                    text: message,
                    // Random message type
                    type: 'received',
                    // Avatar and name:
                    avatar: response.user.avatar,
                    name: response.user.username,
                    // Day
                    day: !conversationStarted ? 'Today' : false,
                    time: !conversationStarted ? (new Date()).getHours() + ':' + (new Date()).getMinutes() : false
                });
            }
            else {
                $('.message-textarea textarea').val('');
                myApp.addMessage({
                    // Message text
                    text: message,
                    // Random message type
                    type: 'sent',
                    // Avatar and name:
                    //avatar: response.user.avatar,
                    name: 'ME',
                    // Day
                    day: !conversationStarted ? 'Today' : false,
                    time: !conversationStarted ? (new Date()).getHours() + ':' + (new Date()).getMinutes() : false
                });
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
