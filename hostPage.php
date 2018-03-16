<?php
# starting the Session
session_start();
?>

<!DOCTYPE html>
<html lang="en" >


<head>
  <link rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet"
      href="https://code.getmdl.io/1.3.0/material.indigo-orange.min.css" />
  <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

   <link rel='stylesheet prefetch' href='https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-pink.min.css'>
  <link rel='stylesheet prefetch' href='https://cdn.rawgit.com/kybarg/mdl-selectfield/mdl-menu-implementation/mdl-selectfield.min.css'>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

  <link rel="stylesheet" href="styles/hostPage.css">

</head>

<body>
     <div class="topnav">
       <a href="contactPage.html">Contact</a>
       <a href="loginPage.html">Log in</a>
       <a href="connectPage.html">Connect</a>
       <a href="hostPage.html">Host</a>
       <a href="create-page.html">Create</a>
       <a href="index.html">Home</a>
       <img id="logo2" width="5%" height="5%" src="images\Logo2.png"/>
       <header href="#">InnQUIZitor</header>
     </div>

     <div class="form">

      <div id="hostQuiz">
          <h1>Host a quiz!</h1>

          <!--<h2>Pick a quiz to host!</h2>-->

          <form action="/Inquizitor/playTest.php" method="post">

            <div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label">
              <select class="mdl-selectfield__select" id="quizDropdown" name="quizDropdown">
                <option value=""></option>
                <option value="1">Quiz 1</option>
                <option value="2">Quiz 2</option>
                <option value="3">Quiz 3</option>
                <option value="4">Quiz 4</option>
                <option value="5">Quiz 5</option>
              </select>

              <label class="mdl-selectfield__label" for="quizDropdown">Quiz list</label>
          </div>

          <button type="submit" class="button button-block">Start Quiz</button>

          </form>
    </div>


    <script  src="js/index.js"></script>
    <script src='https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js'></script>
        <script src='https://cdn.rawgit.com/kybarg/mdl-selectfield/mdl-menu-implementation/mdl-selectfield.min.js'></script>

</body>

<?php

# connecting to the database

$dbuser = 'master5';
$dbpass = 'master123';
$dbhost = 'projectdatabase3.cpvnf88ap5ww.eu-west-2.rds.amazonaws.com';
$dbname = "projectdatabase3";

$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to Connect to '$dbhost'");
# mysql_select_db($dbname) or die("Could not open the db '$dbname'");

# query will select all questions from Question table
$questionQuery = "SELECT questionText FROM projectdatabase3.Question";

$result_array = array();
# storing the results of the query
$result = mysqli_query($connect, $questionQuery);

while ($row = mysqli_fetch_array($result, MYSQL_NUM)){
  $result_array[] = $row;
}

# Initial value for quiz array index
$quizIndex = 0;
# Transferring result to play.php
$_SESSION['quizIndex'] = $quizIndex;

# Transferring result to play.php
$_SESSION['result'] = $result_array;

# close connection
mysqli_close($connect);

?>

</html>