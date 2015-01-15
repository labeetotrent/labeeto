/**
 * Created by slashman on 15.01.15.
 */
var BOSH_SERVICE = '/http-bind';
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
    }
    connection.addHandler(onMessage, null, 'message', null, null,  null);
    connection.addHandler(on_subscription_request, null, "presence", "subscribe");
    connection.send($pres());
}
function on_subscription_request(stanza)
{
    if(stanza.getAttribute("type") == "subscribe")
    {
        // Send a 'subscribed' notification back to accept the incoming
        // subscription request
        connection.send($pres({ to: "friend@example.com", type: "subscribed" }));
    }
    return true;
}

function onMessage(message)
{
    var to = message.getAttribute('to');
    var from = message.getAttribute('from');
    var type = message.getAttribute('type');
    var elems = message.getElementsByTagName('body');

    if (type == "chat" && elems.length > 0) {
        var body = elems[0];

        console.log('ECHOBOT: I got a message from ' + from + ': ' +
        Strophe.getText(body));

        var reply = $msg({to: from, from: to, type: 'chat'})
            .cnode(Strophe.copyElement(body));
        connection.send(reply.tree());

        console.log('ECHOBOT: I sent ' + from + ': ' + Strophe.getText(body));
    }

    // we must return true to keep the handler alive.
    // returning false would remove it after it finishes.
    return true;
}
$.bind('beforeunload', function(){
    connection.pause();
    connection._requests = new Array();
});