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

  <link rel="stylesheet" href="styles/loginPageStyle.css">

</head>

<body>
     <div class="topnav">
       <a href="contactPage.html">Contact</a>
       <a href="loginPage.html">Log in</a>
       <a href="connectPage.html">Connect</a>
       <a href="hostPage.html">Host</a>
       <a href="node">Create</a>
       <a href="index.html">Home</a>
       <img id="logo2" width="5%" height="5%" src="images/Logo2.png"/>
       <header href="#">InnQUIZitor</header>
     </div>



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

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $_SESSION["answerArray"][$quizIndex] = $_POST["answer"];
}

#$finishQuiz = $_SESSION['finishQuiz'];
$updateQuestionQueryStatement = "SELECT CurrentQuestion FROM projectdatabase3.Sessions WHERE sessionId=" . $_SESSION['sessionId'];
$currentQuestionQuery = mysqli_query($connect, $updateQuestionQueryStatement);
$row = mysqli_fetch_array($currentQuestionQuery, MYSQLI_NUM);
echo "The next lines are for the current question" . "<br>";
echo implode($row);
echo "<br>";
if($quizIndex < implode($row))
{
    $quizIndex = $quizIndex + 1;
    $_SESSION['quizIndex'] = $quizIndex;
}

echo $quizIndex;
echo "<br>";
echo (sizeof($result) + 1);
echo "<br>";
echo implode($result[0]);
?>


<?php if($quizIndex == sizeof($result) + 1) :
# Tell the user that quiz has finished and give him a button to go and check the scoreboard?>
<div class="form">
  <div id="nextQuestion">
    <h1>
      <?php echo "Quiz is finished! Submit your answers and then check out the quiz scores when they are available" ?>
    </h1>
      <div id="submitAnswers">
          <form action="/submitAnswers.php" method="post">
              <button type="submit" class="button button-block">Submit answers</button>
          </form>
      </div>
    <form action=<?php echo "/".$_SESSION["sessionID"] . ".html"?> method="post">
      <button type="submit" class="button button-block"/>Display quiz scores</button>
    </form>
</div>
<?php else: ?>
    <div class="form">
        <h1>
            <?php echo "Question "; echo ($quizIndex -1); echo ": ";  echo implode($result[$quizIndex - 2]); ?>
        </h1>
        <?php
if($_SESSION['isLeader'] == 1):
    #Only show the save answer buttons and the text field if the player is a team leader?>

    <div id="saveAnswer">

          <form action="/playUser.php" method="post">
            <div class="field-wrap">
              <label>
                Enter your answer here
              </label>
              <input type="text" name="answer" autocomplete="off"/>
            </div>

          <button type="submit" class="button button-block"/>Save Answer</button>
          </form>
    </div>



<?php endif; #give the user a button to go to the next question?>


        <div id="nextQuestion">

            <form action="/playUser.php" method="post">
                <button type="submit" class="button button-block"/>Next Question</button>
            </form>
        </div>
    </div>
<?php endif; ?>


</body>
</html>
