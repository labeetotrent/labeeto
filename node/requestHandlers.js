var querystring = require("querystring");
var mysql = require('mysql');
var util = require('util');



function dialogs(response, postData) {

    var connection = mysql.createConnection({
        host     : 'localhost',
        user     : 'root',
        password : '884088',
        database : 'labeeto'
    });
    connection.connect();

    console.log("Request handler 'dialogs' was called.");
    response.writeHead(200, {"Content-Type": "application/json", "Access-Control-Allow-Origin": "*"});

    var myId = querystring.parse(postData).myId;

    if(typeof myId !== 'undefined')
    {
        connection.query('SELECT * FROM (SELECT MAX(created) AS created, CASE user_from WHEN ' + myId + ' THEN user_to ELSE user_from END AS userid, (SELECT message FROM chat WHERE userid = user_from OR userid = user_to ORDER BY created DESC LIMIT 1) lastMessage , (SELECT COUNT(*) FROM chat WHERE user_to = userid OR user_from =userid) as totalMessages, (SELECT COUNT(*) FROM chat WHERE is_read = 0 AND (user_to = ' + myId + ' AND user_from = userid)) as unreadMessages FROM chat GROUP BY userid ORDER BY created DESC) dialogs LEFT OUTER JOIN (SELECT id,username,photo,address FROM users) users ON dialogs.userid = users.id', function(err, rows) {
            //response.write(JSON.stringify(rows));
            var oldRows = JSON.stringify(rows);

            function refresh(connection, oldRows, response)
            {
                connection.query('SELECT * FROM (SELECT MAX(created) AS created, CASE user_from WHEN ' + myId + ' THEN user_to ELSE user_from END AS userid, (SELECT message FROM chat WHERE userid = user_from OR userid = user_to ORDER BY created DESC LIMIT 1) lastMessage , (SELECT COUNT(*) FROM chat WHERE user_to = userid OR user_from =userid) as totalMessages, (SELECT COUNT(*) FROM chat WHERE is_read = 0 AND (user_to = ' + myId + ' AND user_from = userid)) as unreadMessages FROM chat GROUP BY userid ORDER BY created DESC) dialogs LEFT OUTER JOIN (SELECT id,username,photo,address FROM users) users ON dialogs.userid = users.id', function(err, newRows) {
                    //response.write(JSON.stringify(rows));
                    if(JSON.stringify(newRows) !== oldRows)
                    {
                        response.write(JSON.stringify(newRows));
                        response.end();
                        return 0;
                    }
                    else
                    {
                        setTimeout(function() {
                            refresh(connection, oldRows, response);
                        }, 1000);
                    }
                });
            }

            refresh(connection, oldRows, response);
        });
    }
    else
    {
        response.end();
    }
}
function messages(response, postData) {

    var connection = mysql.createConnection({
        host     : 'localhost',
        user     : 'root',
        password : '884088',
        database : 'labeeto'
    });
    connection.connect();

    console.log("Request handler 'dialogs' was called.");
    response.writeHead(200, {"Content-Type": "application/json", "Access-Control-Allow-Origin": "*"});

    var myId = querystring.parse(postData).myId;
    var toId = querystring.parse(postData).toId;

    if(typeof myId !== 'undefined' && typeof toId !== 'undefined')
    {
        function refresh(connection, response, myId, toId)
        {
            connection.query('SELECT c.id as id, c.user_from as user_from, c.user_to as user_to, c.is_read as is_read, c.message as message, c.created as created, u.photo as photo, u.username as username FROM chat c LEFT OUTER JOIN users u ON u.id = c.user_from WHERE user_from = ' + toId + ' AND user_to = ' + myId + ' AND is_read = 0', function(err, rows) {
                if(rows.length > 0)
                {
                    response.write(JSON.stringify(rows));
                    response.end();
                    connection.query('UPDATE chat SET is_read = 1 WHERE user_from = ' + toId + ' AND user_to = ' + myId + ' AND is_read = 0');
                    return 0;
                }
                else
                {
                    setTimeout(function() {
                        refresh(connection, response, myId, toId);
                    }, 1000);
                }
            });
        }

        refresh(connection, response, myId, toId);
    }
    else
    {
        response.end();
    }
}

exports.dialogs = dialogs;
exports.messages = messages;