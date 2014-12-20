var http = require('http');
var util = require('util');
var url = require('url');
var server = require("./server");
var router = require("./router");
var requestHandlers = require("./requestHandlers");

var handle = {};
handle["/"] = requestHandlers.start;
handle["/dialogs"] = requestHandlers.dialogs;
handle["/messages"] = requestHandlers.messages;


var singer_name, currentmodif, request, response;

server.start(router.route, handle);

/*var server = http.createServer(function(req, res) {
    res.writeHead(200);
    res.end(singer_name);



    connection.query('SELECT * FROM (SELECT MAX(created) AS created, CASE user_from WHEN ' +  + ' THEN user_to ELSE user_from END AS userid, (SELECT message FROM chat WHERE userid = user_from OR userid = user_to ORDER BY created DESC LIMIT 1) lastMessage , (SELECT COUNT(*) FROM chat WHERE user_to = userid OR user_from =userid) as totalMessages, (SELECT COUNT(*) FROM chat WHERE is_read = 0 AND (user_to = ' + + ' AND user_from = userid)) as unreadMessages FROM chat GROUP BY userid ORDER BY created DESC) dialogs LEFT OUTER JOIN (SELECT id,username,photo,address FROM users) users ON dialogs.userid = users.id', function(err, rows) {
        singer_name=rows[0].message;
        currentmodif=rows[0].message;
    });
});

server.listen(8080); */