
//Quiz id is users last quizId + 1
var quizId = 1;

//Username does not Change
var userName = 'katie';

//Get quizTitle
var quizTitle = 'My first quiz';

//Create array to hold questions
var questions = new Array(10);

//Create array to hold answers
var answers = new Array(10);

//Keep track of which question and answers being inserted
var questionId = 1;

var answerId = 1;

//question type will initially be same for all questions
var qType = 1;

function takeInput()
{
  //Get title of quiz
  quizTitle = (document.getElementById("title").value);
  //Get questions and answers
  for (questionId = 1; questionId <= 10; questionId++)
  {
    //Insert new question into array
    questions[questionId - 1] = (document.getElementById("q"+questionId).value);

    //Insert new answer into array
    answers[questionId - 1] = (document.getElementById("a"+questionId).value);
  }
}

//Nodes mysql module must be installled for this to work
//Write Hello world if someone e.q a web browser tries to access this computer on port 8080
//Include http module
var http = require('http');

//Create server
http.createServer(function (req, res) {
    res.writeHead(200, {'Content-Type': 'text/html'});
    res.end('Hello World!');
}).listen(8080);

//Connect to database
var mysql = require('mysql');
var con = mysql.createConnection({
  host: "projectdatabase3.cpvnf88ap5ww.eu-west-2.rds.amazonaws.com",
  user: "master4",
  password:"master123",
  database: "projectdatabase3"
                                 });
//Create a connection object, this has methods to query a database
con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");

  //Insert a Quiz into the Quiz table, idQuiz column holds the users number of
  //quizzes Name holds the title of the quizzes
  var sql = "INSERT INTO Quiz (idQuiz,Name) VALUES (1,'Test Quiz')";

  //Query the database
  con.query(sql, function (err, result) {
    if (err) throw err;
    console.log("1 record inserted");
                                        });
  //Insert Questions for that quiz
  var sql = "INSERT INTO Question (idQuestion,questionText,type) VALUES (1,'Who was the first US president?',1)";

  //Query the database
  con.query(sql, function (err, result) {
    if (err) throw err;
    console.log("1 record inserted");
                                         });
  //Insert Answers to those questions
  var sql = "INSERT INTO Answer (idAnswer,answerText,isTrue) VALUES (1,'George Washington',1)";

  //Query the database
  con.query(sql, function (err, result) {
    if (err) throw err;
    console.log("1 record inserted");
                                        });

                           });
  /*var sql = "INSERT INTO Question(idQuestion,questionText,type) VALUES (questionId,qText,qId)";

  var sql = "INSERT INTO Answer(idAnswer,answerText,isTrue) VALUES (answerId,aText,1);"
*/

  //Change users latest quiz id variable
                          //con.connect*/
//End connection


/*
//Output title on screen
function outputTitle()
{
  document.getElementById("demo").innerHTML = quizTitle;
}

//Output list on screen after defining a paragraphs in the html with
//corresponding ids
function outputQuestions()
{
  document.getElementById("demo1").innerHTML = questions;
}

//Output list on screen after defining a paragraph in the html with
//corresponding id
function outputAnswers()
{
  document.getElementById("demo2").innerHTML = answers;
}*/
