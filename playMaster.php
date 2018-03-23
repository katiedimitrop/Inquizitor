<?php
# starting the session
session_start();
?>

<!DOCTYPE html>
<html lang="en" >


<head>
    <title>innQUIZitor</title>
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
       <a href="contactPage.php">Contact</a>
       <a href="loginPage.php">Log in</a>
       <a href="connectPage.php">Connect</a>
       <a href="hostPage.php">Host</a>
       <a href="node">Create</a>
       <a href="index.php">Home</a>
       <img id="logo2" width="5%" height="5%" src="images/Logo2.png"/>
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

#$finishQuiz = 0;
#$_SESSION['finishQuiz'] = $finishQuiz;

echo $quizIndex;
echo "<br>";
echo sizeof($result);


?>

<?php if($quizIndex == sizeof($result) + 1) :
  #$finishQuiz = 1;
  #$_SESSION['finishQuiz'] = $finishQuiz;
?>
<div class="form">
  <div id="nextQuestion">
    <h1>
      <?php echo "Press to Finish Quiz" ?>
    </h1>

    <form action="/generateScoreboard.php" method="post">
      <button type="submit" class="button button-block"/>Finish Quiz and Generate Scoreboard</button>
    </form>
</div>
<?php else:
  # Updating quiz question
  $quizIndex = $quizIndex + 1;
  $_SESSION['quizIndex'] = $quizIndex;
  $updateQuestionQuery = "UPDATE projectdatabase3.Sessions SET CurrentQuestion=".$quizIndex." WHERE sessionId=" . $_SESSION['sessionId'];
  $yes = mysqli_query($connect, $updateQuestionQuery);
?>
<div class="form">
  <div id="nextQuestion">
    <h1>
      <?php echo "Question "; echo ($quizIndex -1); echo ": ";  echo implode($result[$quizIndex - 2]); ?>
    </h1>

    <form action="/playMaster.php" method="post">
      <button type="submit" class="button button-block"/>Next Question</button>
    </form>
</div>
<?php endif;
mysqli_close($connect);
?>
</html>
