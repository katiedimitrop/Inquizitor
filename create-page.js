//File system
var fs = require('fs');

var http = require('http');
var url = require('url');
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
var userId = 0;

app.use(express.static(path.join(__dirname, 'public')));
app.use(bodyParser.urlencoded({ extended: true }));



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


//Invoking php through the shell interface
var exec = require("child_process").exec;
app.get('/', function(req, res)
{
  exec("php create-page.php", function (error, stdout, stderr) {res.send(stdout);});
  //Find id of last quiz inserted
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

  //Find id of last question
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
    questionPK = value;
    console.log(questionPK);
  }
});

//Receive data submitted by user in POST request
app.post('/', function(req, res)
{
  userId = req.body.userid;
  console.log(userId);
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

  ++quizPK;
  //Insert a quiz into the database
  var sql = 'INSERT INTO Quiz (idQuiz,Name,User_idUser) VALUES ('+quizPK+',\"'+ req.body.quiz_title+'\",'+userId+');';
    //Query the database
    con.query(sql, function (err, result)
    {
      if (err) throw err;
      console.log('Inserted quiz no'+quizPK);
    });


    //Take values from form
    questions = [req.body.q1,req.body.q2,req.body.q3,req.body.q4,req.body.q5,req.body.q6,req.body.q7,req.body.q8,req.body.q9,req.body.q10]
    answers = [req.body.a1,req.body.a2,req.body.a3,req.body.a4,req.body.a5,req.body.a6,req.body.a7,req.body.a8,req.body.a9,req.body.a10]
    for (var questionId = 0;questionId < 10; questionId++)
    {
      //Insert a question
      ++questionPK;

      var sql = 'INSERT INTO Question (idQuestion,Quiz_idQuiz,questionText) VALUES ('+questionPK+','+quizPK+',\"'+questions[questionId]+'\");';
      //Query the database
      con.query(sql, function (err, result)
      {
        if (err) throw err;
        //Insert a question into the next available place
        console.log('Inserted question');
      });

      var sql = 'INSERT INTO Answer (idAnswer,answerText,isTrue,Question_idQuestion) VALUES ('+questionPK+',\"'+answers[questionId]+'\",1 ,'+questionPK+');';
      //Query the database
      con.query(sql, function (err, result)
      {
        if (err) throw err;
        console.log('Inserted answer');
      });
    }//for*/

  res.redirect('/');

});//app.post
