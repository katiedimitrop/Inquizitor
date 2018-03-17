<?php
# starting the session
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

  <link rel="stylesheet" href="styles/hostPage.css">

</head>

<body>
     <div class="topnav">
       <a href="contactPage.html">Contact</a>
       <a href="loginPage.html">Log in</a>
       <a href="connectPage.html">Connect</a>
       <a href="hostPage.php">Host</a>
       <a href="create-page.html">Create</a>
       <a href="index.html">Home</a>
       <img id="logo2" width="5%" height="5%" src="images\Logo2.png"/>
       <header href="#">InnQUIZitor</header>
     </div>

</body>

<?php

# connecting to the database

$dbuser = 'master5';
$dbpass = 'master123';
$dbhost = 'projectdatabase3.cpvnf88ap5ww.eu-west-2.rds.amazonaws.com';
$dbname = "projectdatabase3";

$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to Connect to '$dbhost'");

# storing the session variable in a variable
$result = $_SESSION['result'];

# storing the session variable in a variable
$quizIndex = $_SESSION['quizIndex'];
#displaying the questions

if ($quizIndex == 0) :
  # Updating quiz question
  $quizIndex = $quizIndex + 1;
  $_SESSION['quizIndex'] = $quizIndex;
?>
<div class="form">
  <div id="nextQuestion">
    <h1>
      <?php echo "Session key placeHolder"; echo session_id(); ?>
    </h1>

    <form action="/Inquizitor/playMaster.php" method="post">
      <button type="submit" class="button button-block"/>Begin Quiz</button>
    </form>
</div>
<?php elseif($quizIndex == sizeof($result)) : ?>
<div class="form">
  <div id="nextQuestion">
    <h1>
      <?php echo "Press to Finish Quiz" ?>
    </h1>

    <form action="/Inquizitor/playMaster.php" method="post">
      <button type="submit" class="button button-block"/>Finish Quiz</button>
    </form>
</div>
<?php else:
  # Updating quiz question
  $quizIndex = $quizIndex + 1;
  $_SESSION['quizIndex'] = $quizIndex;
?>
<div class="form">
  <div id="nextQuestion">
    <h1>
      <?php echo "Question "; echo ($quizIndex); echo ": ";  echo implode($result[$quizIndex - 1]); ?>
    </h1>

    <form action="/Inquizitor/playMaster.php" method="post">
      <button type="submit" class="button button-block"/>Next Question</button>
    </form>
</div>
<?php endif; ?>
</html>
