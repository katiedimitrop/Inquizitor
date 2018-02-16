//Create array to hold questions
var questions = new Array(10);

//Create array to hold answers
var answers = new Array(10);
function takeInput()
{
  for (questionId = 1; questionId <= 10; questionId++)
  {
    //Insert new question into array
    questions[questionId - 1] = (document.getElementById("q"+questionId).value);

    //Insert new answer into array
    answers[questionId - 1] = (document.getElementById("a"+questionId).value);
  }
}

//Output list on screen after defining a paragraphs in the html with
//corresponding ids
function outputQuestions()
{
  document.getElementById("demo").innerHTML = questions;
}

//Output list on screen after defining a paragraph in the html with
//corresponding id
function outputAnswers()
{
  document.getElementById("demo2").innerHTML = answers;
}

//Connect to database
var mysql = require('mysql');
var con = mysql.createConnection({
  host: "",
  user "master",
  password:"master123",
  database:"mydb"
});
