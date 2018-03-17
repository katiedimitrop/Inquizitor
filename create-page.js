var userId = 1;

//express and express validatoe modules must be installed
var express = require('express');

//Create an express application object
var app = express();

//Path of this script
var path = require('path');

//For form handling
var bodyParser = require('body-parser');

//Create array to hold questions
var questions = new Array(10);

//Create array to hold answers
var answers = new Array(10);

//Obtain id of last Quiz and last question that was inserted
var quizPK = 0 ;
var questionPK = 0;

app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static(__dirname + '/images'));

//Import functions for validating and sanitizing
const { body,validationResult } = require('express-validator/check');
const { sanitizeBody } = require('express-validator/filter')

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

//start server on port and print log comment
app.listen(8000, function()
{
  console.log('Create quiz app listening on port 8000!');
});

//Send the default form the first time user requests it
app.get('/', function(req, res)
{
  res.sendFile(path.join(__dirname + '/create-page.html'));
});

//Receive data submitted by user in POST request
app.post('/', function(req, res)
{
  //console.log(req.body.quiz_title+' inserted');
  //Insert a Quiz into the Quiz table, idQuiz column holds the users number of
  //quizzes Name holds the title of the quizzes

  var sql = 'INSERT INTO Quiz (Name,User_idUser) VALUES ('+'\''+ req.body.quiz_title+'\','+userId+');';
    //Query the database
    con.query(sql, function (err, result)
    {
      if (err) throw err;
      console.log("1 quiz inserted");
    });

    var sql = 'SELECT idQuiz FROM Quiz ORDER BY idQuiz DESC LIMIT  1;';
    //Query the database
    con.query(sql, function (err, result)
    {
      if(err)
      {
        throw err;
      }
      else
      {
        setIdQuiz(result[0].idQuiz);
      }
    });

    //We need to set it seperately as the function that retrieves this value
    //is asynchronous
    function setIdQuiz(value)
    {
      quizPK = value;
      console.log(quizPK);
    }
    var sql = 'SELECT idQuestion FROM Question ORDER BY idQuestion DESC LIMIT  1;';
    //Query the database
    con.query(sql, function (err, result)
    {
      if(err)
      {
        throw err;
      }
      else
      {
        setIdQuestion(result[0].idQuestion);
      }
    });
    //We need to set it seperately as the function that retrieves this value
    //is asynchronous
    function setIdQuestion(value)
    {
      questionPK = value + 1;
      console.log(questionPK);
    }

    questionPK = 131;
    quizPK = 43;
    //We want to use the next available index
    questions = [req.body.q1,req.body.q2,req.body.q3,req.body.q4,req.body.q5,req.body.q6,req.body.q7,req.body.q8,req.body.q9,req.body.q10]
    answers = [req.body.a1,req.body.a2,req.body.a3,req.body.a4,req.body.a5,req.body.a6,req.body.a7,req.body.a8,req.body.a9,req.body.a10]
    for (var questionId = 0;questionId < 10; questionId++)
    {
      //Insert a question
      var sql = 'INSERT INTO Question (Quiz_idQuiz,questionText) VALUES ('+quizPK+',\''+questions[questionId]+'\');';
      //Query the database
      con.query(sql, function (err, result)
      {
        if (err) throw err;
        console.log("1 question inserted");
      });

      //Insert an answer
      var sql = 'INSERT INTO Answer (answerText,isTrue,Question_idQuestion) VALUES (\''+answers[questionId]+'\',1 ,'+questionPK+');';
      //Query the database
      con.query(sql, function (err, result)
      {
        if (err) throw err;
        console.log("1 answer inserted");
      });
      questionPK++;
      }//for

  res.redirect('/');
  con.end();

});
