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

  <link rel="stylesheet" href="styles/hostPage.css">

</head>

<?php

#
#
#   Add a function to create a 'preferably' unique sessionID and encrypt it in some way
#   The sessionID then needs to be outputted on this page so that the Quiz Master can share it with the players
#   Also, put the sessionID in a Session Variable and into the database, in the Connection table
#   with the values (quizId, '', sessionId) --> these
#
#
#
#


$dbuser = 'master5';
$dbpass = 'master123';
$dbhost = 'projectdatabase3.cpvnf88ap5ww.eu-west-2.rds.amazonaws.com';
$dbname = "projectdatabase3";

$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to Connect to '$dbhost'");
# mysql_select_db($dbname) or die("Could not open the db '$dbname'");
# Gets id from dropdown of previous page
$quizID = $_POST['quizDropdown'];
# Gets array of quiz Ids for user
$quizIds_array = $_SESSION['quidIds_array'];
# query will select all questions from Question table
$questionQuery = "SELECT questionText FROM projectdatabase3.Question WHERE idQuiz = '".$_SESSION['quizId']."'";

$result_array = array();
# storing the results of the query
$result = mysqli_query($connect, $questionQuery);

while ($row = mysqli_fetch_array($result, MYSQL_NUM)){
    $result_array[] = $row;
}

# Gets id from dropdown of previous page
$quizID = $_POST['quizDropdown'];
# Gets array of quiz Ids for user
$quizIds_array = $_SESSION['quidIds_array'];
# Uses id frop dropdown to access correct quiz id from array
echo "\nQuiz to display is"; echo implode($quizIds_array[$quizID]);

# Initial value for quiz array index
$quizIndex = 0;
# Transferring index to playMaster.php
$_SESSION['quizIndex'] = $quizIndex;

# Transferring result to playMaster.php
$_SESSION['result'] = $result_array;

$_SESSION['quizIndex'] = 1;

# testing encryption
var_dump($encrypted);

# close connection
mysqli_close($connect);

?>

<body>
     <div class="topnav">
       <a href="contactPage.html">Contact</a>
       <a href="loginPage.html">Log in</a>
       <a href="connectPage.html">Connect</a>
       <a href="hostPage.php">Host</a>
       <a href="node">Create</a>
       <a href="index.php">Home</a>
       <img id="logo2" width="5%" height="5%" src="images\Logo2.png"/>
       <header href="#">InnQUIZitor</header>
     </div>

     <div class="form">
         <div id="nextQuestion">
             <h1>
                 <?php echo "Session key placeHolder "; echo session_id(); echo "\n"; echo "Quiz id"; echo $_POST['quizDropdown']; ?>
             </h1>

             <form action="/playMaster.php" method="post">
                 <button type="submit" class="button button-block"/>Begin Quiz</button>
             </form>
         </div>
     </div>

</body>

</html>
