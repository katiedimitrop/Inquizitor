//Quiz id is users last quizId + 1
var quizId = 3;
//SELECT MAX(idQuiz FROM Quiz) + 1

//userid does not change
var userId = 1;

//Get quizTitle
var quizTitle;

//var questionId;

//Create array to hold questions
var questions = new Array(10);

//Create array to hold answers
var answers = new Array(10);

function submitQuiz()
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

  /*Nodes mysql module must be installled for this to work

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
  Insert a Quiz into the Quiz table, idQuiz column holds the users number of
  //quizzes Name holds the title of the quizzes
  var sql = 'INSERT INTO Quiz (idQuiz,Name,User_idUser) VALUES ('+quizId+',\''+ quizTitle+'\','+userId+');';
  console.log(sql);
    //Query the database
    con.query(sql, function (err, result)
    {
      if (err) throw err;
      console.log("1 quiz inserted");
    });
   */
/*  for (questionId = 1; questionId <= 10; questionId++)
    {
      //Insert Questions for that quiz
      var sql = 'INSERT INTO Question (idQuestion,Quiz_idQuiz,questionText) VALUES ( \''+questionId+'\',1,\''+questions[questionId - 1]+'\');';

      //Query the database
      con.query(sql, function (err, result)
      {
        if (err) throw err;
        console.log("question"+(questionId+1)+"inserted");
      });
    }//for
//Change users latest quiz id variable


//Close createConnection
  con.end();*/

//Display quiz title
  document.getElementById("demo").innerHTML = quizTitle;
  document.getElementById("demo1").innerHTML = questions;
  document.getElementById("demo2").innerHTML = answers;
}
