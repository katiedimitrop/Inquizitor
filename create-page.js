//Quiz id is users last quizId + 1
var quizId = 1;

//Username does not Change
var userName = 'katie';

//Get quizTitle
var quizTitle = null;

//Create array to hold questions
var questions = new Array(10);

//Create array to hold answers
var answers = new Array(10);

//Keep track of which question and answeris being insered
var questionId = 1;

var askId = 1;

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


  /*//Connect to database
  var mysql = require('mysql');
  var con = mysql.createConnection({
    host: "projecttest2.cpvnf88ap5ww.eu-west-2.rds.amazonaws.com",
    user "master",
    password:"master123",
    database:"mydb"
                                   });
  //Insert a quiz, a question and an Answer
  con.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
    var sql = "INSERT INTO Quiz(idQuiz,Name) VALUES (quizId,quizTitle)";
    //var sql = "INSERT INTO Question(idQuestion,questionText,type) VALUES (questionId,qText,qType)";
    //var sql = "INSERT INTO Answer(idAnswer,answerText,isTrue) VALUES (answerId,aText,true);"
    con.query(sql, function (err, result) {
      if (err) throw err;
      console.log("1 record inserted");

  //Change users latest quiz id variable
                                          });
                             });*/
}//takeInput


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
