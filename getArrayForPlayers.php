<?php
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 18-Mar-18
 * Time: 9:06 AM
 */

session_start();
#Set the quizId
$_SESSION["sessionId"] = $_POST["sessionKey"];


#Someone needs to make a decrypt function to separate the quizId from the uniquely generated sessionID
#Also, someone needs to make the function that generates the sessionID
$_SESSION["quizId"] = decrypt($_SESSION["sessionId"]);

$dbuser = 'master5';
$dbpass = 'master123';
$dbhost = 'projectdatabase3.cpvnf88ap5ww.eu-west-2.rds.amazonaws.com';

$connect = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
# mysql_select_db($dbname) or die("Could not open the db '$dbname'");

# accessing the quizmasters quiz

# query will select all questions from Question table
$questionQuery = "SELECT questionText FROM projectdatabase3.Question";

# storing the results of the query
$result = mysqli_query($connect, $questionQuery);

# Transferring result to play.php
$_SESSION['result'] = $result;

#Insert empty answers into the database
for($index = 1; $index < sizeof($result); $index++)
{
    $sql = "INSERT INTO teamAnswer (teamName, questionNumber, answerText) VALUES ('" . $_SESSION['teamName'] . "', '" . $index . "','')";
    if(!($mysqli -> query($sql)))
    {
        $error = 1;
    }
}


$connectionQuery = "INSERT INTO Connection (quizId, teamName) VALUES ('" . $_SESSION['quidId'] . "', '" . $_SESSION['teamName'] . "','')";


# close connection
mysqli_close($connect);
#check for errors
if($error == 0)
{
    header("Location: playUser.php");
    #exit;
}
else
{
    echo "Something went wrong with one of the queries";
}
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

    <link rel="stylesheet" href="styles/loginPageStyle.css">

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
