	<?php
    session_start();
    ?>

<!DOCTYPE html>
<!--The material design css and js master files from:
    https://getmdl.io/started/index.html-->
<link rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet"
      href="https://code.getmdl.io/1.3.0/material.indigo-orange.min.css" />
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

<!--external script to handle input-->
<script src="create-page.js"></script>

<!--Viewport so mobile devices render correctly-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>

<head>
  <link href="styles\styles.css" rel="stylesheet" type="text/css">
  <style>
 .demo-list-item {
                   width: 300px;
                   display: block;
                   margin: 0 auto;
                 }
 .mdl-textfield {
                  width: 300px;
                }
  </style>
  

</head>

<body>
<div class="topnav">
    <a href="contactPage.php">Contact</a>
    <a href="Logout.php">Log out</a>
	<a href="connectPage.php">Connect</a>
    <a href="hostPage.php">Host</a>
    <a href="create-page.php">Create</a>
    <a href="index.php">Home</a>
    <img id="logo2" width="5%" height="5%" src="images\Logo2.png"/>
    <header href="#">InnQUIZitor</header>
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

<!-- Simple list -->
<ul class="demo-list-item mdl-list">
  <li><h3>Enter quiz title:</h3></li>
  <!-- Floating Multiline Textfield to take user-created title-->
  <li class="mdl-list__item">
   <span class="mdl-list__item-primary-content">
   <span class="mdl-list__item-primary-content">
  <form action="#">
  <div class="mdl-textfield mdl-js-textfield">
    <textarea class="mdl-textfield__input" type="text" rows= "3" id="title">
    </textarea>
    <label class="mdl-textfield__label" for="title">Quiz title...</label>
  </div>
  </form>
  </span>
  </span>
  </li>

  <li><h4>Question 1:</h4></li>
  <li class="mdl-list__item">
   <span class="mdl-list__item-primary-content">
   <span class="mdl-list__item-primary-content">
  <form action="#">
  <div class="mdl-textfield mdl-js-textfield">
    <textarea class="mdl-textfield__input" type="text" rows= "3" id="q1">
    </textarea>
    <label class="mdl-textfield__label" for="q1">Question #1...</label>
  </div>
  </form>
  </span>
  </span>
 </li>

 <li class="mdl-list__item">
  <span class="mdl-list__item-primary-content">
  <span class="mdl-list__item-primary-content">

  <!-- Simple Textfield to take user-created answer-->
  <form action="#">
  <div class="mdl-textfield mdl-js-textfield">
   <input class="mdl-textfield__input" type="text" id="a1">
   <label class="mdl-textfield__label" for="question1">Answer #1...</label>
  </div>
  </form>
  </span>
  </span>
 </li>
 <li><h4>Question 2:</h4></li>
 <li class="mdl-list__item">
  <span class="mdl-list__item-primary-content">
  <span class="mdl-list__item-primary-content">

  <!-- Floating Multiline Textfield to take user-created question-->
  <form action="#">
  <div class="mdl-textfield mdl-js-textfield">
    <textarea class="mdl-textfield__input" type="text" rows= "3" id="q2">
    </textarea>
    <label class="mdl-textfield__label" for="sample5">Question #2...</label>
  </div>
  </form>
  </span>
  </span>
 </li>

 <li class="mdl-list__item">
  <span class="mdl-list__item-primary-content">
  <span class="mdl-list__item-primary-content">

  <!-- Simple Textfield to take user-created answer-->
  <form action="#">
  <div class="mdl-textfield mdl-js-textfield">
   <input class="mdl-textfield__input" type="text" id="a2">
   <label class="mdl-textfield__label" for="question1">Answer #2...</label>
  </div>
  </form>
  </span>
  </span>
 </li>
 <li><h4>Question 3:</h4></li>
 <li class="mdl-list__item">
  <span class="mdl-list__item-primary-content">
  <span class="mdl-list__item-primary-content">

  <!-- Floating Multiline Textfield to take user-created question-->
  <form action="#">
  <div class="mdl-textfield mdl-js-textfield">
    <textarea class="mdl-textfield__input" type="text" rows= "3" id="q3">
    </textarea>
    <label class="mdl-textfield__label" for="q3">Question #3...</label>
  </div>
  </form>
  </span>
  </span>
 </li>

 <li class="mdl-list__item">
  <span class="mdl-list__item-primary-content">
  <span class="mdl-list__item-primary-content">

  <!-- Simple Textfield to take user-created answer-->
  <form action="#">
  <div class="mdl-textfield mdl-js-textfield">
   <input class="mdl-textfield__input" type="text" id="a3">
   <label class="mdl-textfield__label" for="question1">Answer #3...</label>
  </div>
  </form>
  </span>
  </span>
 </li>

 <li><h4>Question 4:</h4></li>
 <li class="mdl-list__item">
  <span class="mdl-list__item-primary-content">
  <span class="mdl-list__item-primary-content">

  <!-- Floating Multiline Textfield to take user-created question-->
  <form action="#">
  <div class="mdl-textfield mdl-js-textfield">
    <textarea class="mdl-textfield__input" type="text" rows= "3" id="q4">
    </textarea>
    <label class="mdl-textfield__label" for="sample5">Question #4...</label>
  </div>
  </form>
  </span>
  </span>
 </li>

 <li class="mdl-list__item">
  <span class="mdl-list__item-primary-content">
  <span class="mdl-list__item-primary-content">

  <!-- Simple Textfield to take user-created answer-->
  <form action="#">
  <div class="mdl-textfield mdl-js-textfield">
   <input class="mdl-textfield__input" type="text" id="a4">
   <label class="mdl-textfield__label" for="a4">Answer #4...</label>
  </div>
  </form>
  </span>
  </span>
 </li>

 <li><h4>Question 5:</h4></li>
 <li class="mdl-list__item">
  <span class="mdl-list__item-primary-content">
  <span class="mdl-list__item-primary-content">

  <!-- Floating Multiline Textfield to take user-created question-->
  <form action="#">
  <div class="mdl-textfield mdl-js-textfield">
    <textarea class="mdl-textfield__input" type="text" rows= "3" id="q5">
    </textarea>
    <label class="mdl-textfield__label" for="q5">Question #5...</label>
  </div>
  </form>
  </span>
  </span>
 </li>

 <li class="mdl-list__item">
  <span class="mdl-list__item-primary-content">
  <span class="mdl-list__item-primary-content">

  <!-- Simple Textfield to take user-created answer-->
  <form action="#">
  <div class="mdl-textfield mdl-js-textfield">
   <input class="mdl-textfield__input" type="text" id="a5">
   <label class="mdl-textfield__label" for="a5">Answer #5...</label>
  </div>
  </form>
  </span>
  </span>
 </li>

<li><h4>Question 6:</h4></li>

 <li class="mdl-list__item">
  <span class="mdl-list__item-primary-content">
  <span class="mdl-list__item-primary-content">
 <!-- Floating Multiline Textfield to take user-created question-->
 <form action="#">
 <div class="mdl-textfield mdl-js-textfield">
   <textarea class="mdl-textfield__input" type="text" rows= "3" id="q6">
   </textarea>
   <label class="mdl-textfield__label" for="q6">Question #6...</label>
 </div>
 </form>
 </span>
 </span>
</li>

<li class="mdl-list__item">
 <span class="mdl-list__item-primary-content">
 <span class="mdl-list__item-primary-content">

 <!-- Simple Textfield to take user-created answer-->
 <form action="#">
 <div class="mdl-textfield mdl-js-textfield">
  <input class="mdl-textfield__input" type="text" id="a6">
  <label class="mdl-textfield__label" for="q6">Answer #6...</label>
 </div>
 </form>
 </span>
 </span>
</li>

<li><h4>Question 7:</h4></li>

<!-- Floating Multiline Textfield to take user-created question-->
<li class="mdl-list__item">
 <span class="mdl-list__item-primary-content">
 <span class="mdl-list__item-primary-content">
<form action="#">
<div class="mdl-textfield mdl-js-textfield">
  <textarea class="mdl-textfield__input" type="text" rows= "3" id="q7">
  </textarea>
  <label class="mdl-textfield__label" for="q7">Question #7...</label>
</div>
</form>
</span>
</span>
</li>

<li class="mdl-list__item">
<span class="mdl-list__item-primary-content">
<span class="mdl-list__item-primary-content">

<!-- Simple Textfield to take user-created answer-->
<form action="#">
<div class="mdl-textfield mdl-js-textfield">
 <input class="mdl-textfield__input" type="text" id="a7">
 <label class="mdl-textfield__label" for="a7">Answer #7...</label>
</div>
</form>
</span>
</span>
</li>

<li><h4>Question 8:</h4></li>

<!-- Floating Multiline Textfield to take user-created question-->
<li class="mdl-list__item">
 <span class="mdl-list__item-primary-content">
 <span class="mdl-list__item-primary-content">
<form action="#">
<div class="mdl-textfield mdl-js-textfield">
  <textarea class="mdl-textfield__input" type="text" rows= "3" id="q8">
  </textarea>
  <label class="mdl-textfield__label" for="q85">Question #8...</label>
</div>
</form>
</span>
</span>
</li>

<li class="mdl-list__item">
<span class="mdl-list__item-primary-content">
<span class="mdl-list__item-primary-content">

<!-- Simple Textfield to take user-created answer-->
<form action="#">
<div class="mdl-textfield mdl-js-textfield">
 <input class="mdl-textfield__input" type="text" id="a8">
 <label class="mdl-textfield__label" for="a8">Answer #8...</label>
</div>
</form>
</span>
</span>
</li>

<li><h4>Question 9:</h4></li>
<li class="mdl-list__item">
 <span class="mdl-list__item-primary-content">
 <span class="mdl-list__item-primary-content">
<!-- Floating Multiline Textfield to take user-created question-->
<form action="#">
<div class="mdl-textfield mdl-js-textfield">
  <textarea class="mdl-textfield__input" type="text" rows= "3" id="q9">
  </textarea>
  <label class="mdl-textfield__label" for="q9">Question #9...</label>
</div>
</form>
</span>
</span>
</li>

<li class="mdl-list__item">
<span class="mdl-list__item-primary-content">
<span class="mdl-list__item-primary-content">

<!-- Simple Textfield to take user-created answer-->
<form action="#">
<div class="mdl-textfield mdl-js-textfield">
 <input class="mdl-textfield__input" type="text" id="a9">
 <label class="mdl-textfield__label" for="a9">Answer #9...</label>
</div>
</form>
</span>
</span>
</li>

<li><h4>Question 10:</h4></li>

<li class="mdl-list__item">
 <span class="mdl-list__item-primary-content">
 <span class="mdl-list__item-primary-content">
<!-- Floating Multiline Textfield to take user-created question-->
<form action="#">
<div class="mdl-textfield mdl-js-textfield">
  <textarea class="mdl-textfield__input" type="text" rows= "3" id="q10">
  </textarea>
  <label class="mdl-textfield__label" for="q10">Question #10...</label>
</div>
</form>
</span>
</span>
</li>

<li class="mdl-list__item">
<span class="mdl-list__item-primary-content">
<span class="mdl-list__item-primary-content">

<!-- Simple Textfield to take user-created answer-->
<form action="#">
<div class="mdl-textfield mdl-js-textfield">
 <input class="mdl-textfield__input" type="text" id="a10">
 <label class="mdl-textfield__label" for="a10">Answer #10...</label>
</div>
</form>
</span>
</span>
</li>
<!-- Button to generate more textfields/areas-->
 <li>
  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
   More Questions
  </button>
 </li>

<!--Button to submit answers-->
 <li>
  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="button" onclick="submitQuiz()">
   Submit
  </button>
 </li>

</ul>
<p id = "demo"> </p>
<p id = "demo1"> </p>
<p id = "demo2"> </p>
</body>
</html>