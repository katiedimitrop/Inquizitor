// Load the http module to create an http server.
var http = require('http');

// Create a function to handle every HTTP request
function handler(req, res)
{

  var form = '';

  if(req.method == "GET")
  {

    form = '<!doctype html> \
<html lang="en"> \
<head> \
    <meta charset="UTF-8">  \
    <title>Form Calculator Add Example</title> \
</head> \
<body> \
<p>Hellooo</p>\
</body> \
</html>';

  //respond
  res.setHeader('Content-Type', 'text/html');
  res.writeHead(200);
  res.end(form);

  }
  else if(req.method == 'POST')
  {
  //respond
    res.setHeader('Content-Type', 'text/html');
    res.writeHead(200);
    res.end();
  }
  else
  {
    res.writeHead(200);
    res.end();
  };

}



// Create a server that invokes the `handler` function upon receiving a request
http.createServer(handler).listen(8000, function(err){
  if(err){
    console.log('Error starting http server');
  } else {
    console.log("Server running at http://127.0.0.1:8000/ or http://localhost:8000/");
  };
});//Create server
