//Create array to hold questions
//var questions[10] =  [];

function takeInput()
{
  //Array not working so far..
  /*for (questionId = 1; questionId <= 10; questionId++)
  {
    //Create string that refers to Id
    var question = "q"+ questionId;

    //Insert new question into array
    questions[questionId - 1] = document.getElementById("question").value;

    //var answer1 = document.getElementById("a1").value;
  }*/
  //Takes input of first text area and displays on screen when submit is pressed
  var question1 = document.getElementById("q1").value;
  window.alert(question1);
}
