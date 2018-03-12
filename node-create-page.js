// Load the http module to create an http server.
var http = require('http');

/*userid does not change
var userId = 1;

//var questionId;

//Create array to hold questions
var questions = new Array(10);

//Create array to hold answers
var answers = new Array(10);*/

dbConnection();
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
    <title>Create your own quiz!</title> \
  </head> \
  <body> \
  <form name="myQuiz" action="/" method="post">\
  <ul style="list-style: none;" >\
    <li><input type="text" name="1"> <br>\
    <br>\
    <li><input type="text" name="2"> <br>\
    <br>\
    <li><input type="text" name="3"> <br>\
    <br>\
    <li><input type="text" name="4"> <br>\
    <br>\
    <li><input type="text" name="5"> <br>\
    <br>\
    <li><input type="text" name="6"> <br>\
    <br>\
    <li><input type="text" name="7"> <br>\
    <br>\
    <li><input type="text" name="8"> <br>\
    <br>\
    <li><input type="text" name="9">  <br>\
    <br>\
    <li><input type="text" name="10"> <br> \
    <br>\
    <li><input type="text" name="11"> <br> \
    <br>\
    <li><span id="result"></span> <br>\
    <br>\
    <li><input type="submit" value="Submit"> \
  </ul>\
  </form> \
  </body>\
  </html>';

  //respond
  res.setHeader('Content-Type', 'text/html');
  res.writeHead(200);
  res.end(form);

  }//GET

  else if(req.method == 'POST')
  {
   //read form data
   req.on('data', function(chunk)
   {

     //grab form data as string
     var formdata = chunk.toString();

     //grab A and B values
     //var title = eval(formdata.split("&")[0]);
     //var question = eval(formdata.split("&")[1]);

     //var result = calc(a,b);
     var result = 'hello';
     //console.log(chunk.toString());
     //console.log(a);
     //console.log(b);
     //console.log(result);

     //fill in the result and form values
     form = '<!doctype html> \
           <html lang="en"> \
            <head> \
             <meta charset="UTF-8">  \
             <title>Create your own quiz!</title> \
           </head> \
           <body> \
            <form name="myQuiz" action="/" method="post">\
            <input type="text" name="A" value="hey"> + \
            <input type="text" name="B" value="now"> = \
           <span id="result">'+result+'</span> \
          <br> \
          <input type="submit" value="Submit"> \
          </form> \
         </body> \
          </html>';

   //respond
   res.setHeader('Content-Type', 'text/html');
   res.writeHead(200);
   res.end(form);

  });//req.on read form data

 }//POST
 else {
        res.writeHead(200);
        res.end();
       };//Neither GET or post

};//handler

/*js functions running only in Node.JS
function calc(a,b){
 return  Number(a)+Number(b);;
}*/
function dbConnection()
{
  //Nodes mysql module must be installled for this to work

  //Connect to database
  var mysql = require('mysql');
  var con = mysql.createConnection(
  {
    host: "projectdatabase3.cpvnf88ap5ww.eu-west-2.rds.amazonaws.com",
    user: "master4",
    password:"master123",
    database: "projectdatabase3"
  });

  //Create a connection object, this has methods to query a database
  con.connect(function(err)
  {
    if (err) throw err;
    console.log("Connected!");

  });
}

// Create a server that invokes the `handler` function upon receiving a request
http.createServer(handler).listen(8000, function(err)
{
  if(err){
   console.log('Error starting http server');
        }
  else {
   console.log("Server running at http://127.0.0.1:8000/ or http://localhost:8000/");
       };
});//Server
