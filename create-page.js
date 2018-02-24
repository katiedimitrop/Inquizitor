/*Quiz id is users last quizId + 1
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
*/

//Connect to database
var mysql = require('mysql');
var con = mysql.createConnection({
  host: "projectdatabase3.cpvnf88ap5ww.eu-west-2.rds.amazonaws.com",
  user: "master4",
  password:"master123"
                                 });
con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
                          });
  //Insert a quiz, a question and an Answer
  /*con.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
    var sql = "INSERT INTO Quiz(idQuiz,Name) VALUES (quizId,quizTitle)";
    //qText
    var sql = "INSERT INTO Question(idQuestion,questionText,type) VALUES (questionId,'Who was the first US president?',1)";
    //aText
    var sql = "INSERT INTO Answer(idAnswer,answerText,isTrue) VALUES (answerId,'George Washington',1);"
    con.query(sql, function (err, result) {
      if (err) throw err;
      console.log("1 record inserted");
                                           });//con.query
  //Change users latest quiz id variable
});//con.connect*/
//}//takeInput


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
