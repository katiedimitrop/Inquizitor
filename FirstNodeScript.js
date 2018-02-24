//Write Hello world if someone e.q a web browser tries to access this computer on port 8080
//Include http module
var http = require('http');

//Create server
http.createServer(function (req, res) {
    res.writeHead(200, {'Content-Type': 'text/html'});
    res.end('Hello World!');
}).listen(8080);
