<?php
    session_start();
    ?>
<!DOCTYPE html>
<link rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet"
      href="https://code.getmdl.io/1.3.0/material.indigo-orange.min.css" />
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<!--Viewport so mobile devices render correctly-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
<head>
  <!--<link href="styles\styles.css" rel="stylesheet" type="text/css">-->
    <title>innQUIZitor</title>
  <style>
  html {
     background-color: #1565C0;
  }
  /* Style the top navigation bar */
  .topnav {
      overflow:hidden;
      background-color: #212121;
  }
  /* Style the topnav links */
  .topnav a {
      font-family: 'Roboto', sans-serif;
      float: right;
      display: block;
      color: #FFC107;
      text-align: center;
      padding: 16px 16px;
      text-decoration: none;
  }
  /*.topnav img {
      float: left;
      padding: 5px 0px 5px 5px;
  }*/
  .topnav header {
      font-family: 'Roboto', sans-serif;
      font-size: 270%;
      color: white;
      float: left;
      text-align: center;
      padding: 17px 10px;
  }
  /* Change color on hover */
  .topnav a:hover {
      background-color: #ddd;
      color: black;
  }
  hr.style13 {
    width:50%;
  	height: 10px;
  	border: 0;
  	box-shadow: 0 10px 10px -10px #1565C0 inset;
  }
  h3 {
    position: relative;
    width:800px;
    color:white;
  }
  .submitButton {
    width:300px;
    color: #FFC107;
    font-size: 30px;
    font-family:'Roboto';
    display:inline-block;
   }
   .addButton {
     width:300px;
     color: #FFC107;
     font-size: 30px;
     font-family:'Roboto';
     display:inline-block;
    }
  .quiz_title{
    color:#FFC107;
  }
  * { box-sizing:border-box; }
/* basic stylings ------------------------------------------ */
/* css from:https://codepen.io/sevilayha/pen/IdGKH*/
body 				 { }
.container 		{
  background: #13232f;
  font-family:'Roboto';
  width:800px;
  margin:30px auto 0;
  display:block;
  padding:10px 50px 50px;
  border: 10px outset #FFC107;
}
 h2 		 {
  text-align:center;
  margin-bottom:50px;
}
h2 small {
  font-weight:normal;
  color:#888;
  display:block;
}
.footer 	{ text-align:center; }
.footer a  { color:#53B2C8; }
/* form starting stylings ------------------------------- */
.group 			  {
  position:relative;
  margin-bottom:45px;
}
input 				{
  color:white;
  font-size:18px;
  padding:10px 10px 10px 5px;
  display:block;
  width:700px;
  border:none;
  background:#13232f;
  border-bottom:1px solid #757575;
}
input:focus 		{ outline:none; }
/* LABEL ======================================= */
label 				 {
  color: grey;
  font-size:18px;
  font-weight:normal;
  position:absolute;
  pointer-events:none;
  left:5px;
  top:10px;
  transition:0.2s ease all;
  -moz-transition:0.2s ease all;
  -webkit-transition:0.2s ease all;
}
/* active state */
input:focus ~ label, input:valid ~ label 		{
  top:-20px;
  font-size:14px;
  color:#5264AE;
}
/* BOTTOM BARS ================================= */
.bar 	{ position:relative; display:block; width:300px; }
.bar:before, .bar:after 	{
  content:'';
  height:2px;
  width:0;
  bottom:1px;
  position:absolute;
  background:#5264AE;
  transition:0.2s ease all;
  -moz-transition:0.2s ease all;
  -webkit-transition:0.2s ease all;
}
.bar:before {
  left:50%;
}
.bar:after {
  right:50%;
}
/* active state */
input:focus ~ .bar:before, input:focus ~ .bar:after {
  width:50%;
}
/* HIGHLIGHTER ================================== */
.highlight {
  position:absolute;
  height:60%;
  width:100px;
  top:25%;
  left:0;
  pointer-events:none;
  opacity:0.5;
}
/* active state */
input:focus ~ .highlight {
  -webkit-animation:inputHighlighter 0.3s ease;
  -moz-animation:inputHighlighter 0.3s ease;
  animation:inputHighlighter 0.3s ease;
}
/* ANIMATIONS ================ */
@-webkit-keyframes inputHighlighter {
	from { background:#5264AE; }
  to 	{ width:0; background:transparent; }
}
@-moz-keyframes inputHighlighter {
	from { background:#5264AE; }
  to 	{ width:0; background:transparent; }
}
@keyframes inputHighlighter {
	from { background:#5264AE; }
  to 	{ width:0; background:transparent; }
}
  </style>
</head>
<script>
function readCookie(name) {
	var cookiename = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++)
	{
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(cookiename) == 0) return c.substring(cookiename.length,c.length);
	}
	return null;
}
//document.write(readCookie('idUser'));
var userId = readCookie('idUser');
/*document.cookie = "username=John Doe";*/
</script>
<body onload="readCookie()">
<div class="topnav">
  <a href="contactPage.php">Contact</a>
  <a href="Logout.php">Log out</a>
	<a href="connectPage.php">Connect</a>
  <a href="hostPage.php">Host</a>
  <a href="node">Create</a>
  <a href="index.php">Home</a>
  <!--<img id="logo2" width="5%" height="5%" src="images/Logo2.png"/>-->
  <header href="#">InnQUIZitor</header>
</div>
<a id="welcome" style="font-size:20px;">
<?php
require_once('config.php');
$mysqli = new mysqli($database_host, $database_user, $database_pass, $database_name);
if($mysqli->connect_error)
{
die("Connection failed: ". $mysqli->connect_error);
}
$email = $_SESSION['email'];
//$firstname = $_SESSION['firstname'];
$sel = "SELECT firstname FROM User WHERE email = '$email'";
//echo $sel;
if($result = $mysqli->query($sel))
  {
    while($row = $result->fetch_assoc())
    {
    echo 'Welcome ' . $row['firstname'] . '!';
    //exit;
    break;
    }
  }
 ?></a>
</div>
<div class="container" >
<form method ="post" >
  <div id = "dynamicInput">
  <input type="hidden" name="userid" id="hiddenInput" />
  <input type="hidden" name="noOfQ"  id="hiddenQ" />
  <br>
   <h3>Enter a title for your quiz:</h3>
    <br>
    <div class = "group">
     <input id="quiz_title" type="text" name="quiz_title" required>
    </div>
    <br>
    <div class="group">
      <input id="q1" type="text" name="q1" height="500px" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Question 1:</label>
    </div>
    <div class="group">
      <input id="a1" type="text" name="a1" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Answer 1:</label>
    </div>
    <div class="group">
      <input id="q2" type="text" name="q2" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Question 2:</label>
    </div>
    <div class="group">
      <input id="a2" type="text" name="a2" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Answer 2:</label>
    </div>
    <div class="group">
      <input id="q3" type="text" name="q3" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Question 3:</label>
    </div>
    <div class="group">
      <input id="a3" type="text" name="a3" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Answer 3:</label>
    </div>
    <div class="group">
      <input id="q4" type="text" name="q4" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Question 4:</label>
    </div>
    <div class="group">
      <input id="a4" type="text" name="a4" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Answer 4:</label>
    </div>
    <div class="group">
      <input id="q5" type="text" name="q5" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Question 5:</label>
    </div>
    <div class="group">
      <input id="a5" type="text" name="a5" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Answer 5:</label>
    </div>
    <div class="group">
      <input id="q6" type="text" name="q6" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Question 6:</label>
    </div>
    <div class="group">
      <input id="a6" type="text" name="a6" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Answer 6:</label>
    </div>
    <div class="group">
      <input id="q7" type="text" name="q7" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Question 7:</label>
    </div>
    <div class="group">
      <input id="a7" type="text" name="a7" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Answer 7:</label>
    </div>
    <div class="group">
      <input id="q8" type="text" name="q8" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Question 8:</label>
    </div>
    <div class="group">
      <input id="a8" type="text" name="a8" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Answer 8:</label>
    </div>
    <div class="group">
      <input id="q9" type="text" name="q9" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Question 9:</label>
    </div>
    <div class="group">
      <input id="a9" type="text" name="a9" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Answer 9:</label>
    </div>
    <div class="group">
      <input id="q10" type="text" name="q10" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Question 10:</label>
    </div>
    <div class="group">
      <input id="a10" type="text" name="a10" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Answer 10:</label>
    </div>
</div>
<div class ="group">
  <input type="submit" class="submitButton" value="Submit">
  <input type="button" class="addButton" value ="+" onClick="addInput('dynamicInput');">
</div>
<p id="demo" name="demo"></p>
</form>
<script>
//Number of questions on page
var counter = 10;
//Limit of questions per quiz
var limit = 50;
/* Scripting to handle cookies. Target the hidden element and insert in it the
userId so that node.js can retrieve it.*/
//Default values for testing purposes
var userId =1
//document.write(''+userId);
var input = document.getElementById('hiddenInput');
var questionNo = document.getElementById('hiddenQ');
input.value = userId.toString();
// Scripting to implement dynamically adding questions
/*
 Called when user hits the button to add a question. If user has reached the
limit of 50 questions per page alert them and do nothing. Else add another
question and answer input field.
*/
function addInput(divName){
     if (counter == limit)  {
          alert("Reached limit of " + counter + " questions.");
     }//if
     else {
          //Add a question field
          //Our new div should be a div of class group
          var newdiv = document.createElement('div');
          newdiv.setAttribute("id", "questionAnswerPair");
          newdiv.innerHTML = '<div class="group">'+'<input id=\"q'+(counter +1)+'\" type=\"text\" name=\"q'+(counter+1)
          +'\" required>'+
          '<span class=\"highlight\"></span>'+
          '<span class=\"bar\"></span>'+
          '<label>Question '+(counter+1)+':</label></div>' +'<div class="group">'+'<input id=\"a'+(counter+1)+'\" type=\"text\" name=\"a'+(counter+1)
          +'\" required>'+
          '<span class=\"highlight\"></span>'+
          '<span class=\"bar\"></span>'+
          '<label>Answer '+(counter+1)+':</label>';
          document.getElementById(divName).appendChild(newdiv);
          counter = counter + 1;
          questionNo.value = counter.toString();
          //Number of question/answer pairs has increased by 1
     }//else
}
</script>
</body>
</html>
