
<?php
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 18-Mar-18
 * Time: 9:06 AM
 */

session_start();
#Set the quizId

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $_SESSION["teamName"] = $_POST['teamName'];
}
$_SESSION["quizId"] = substr($_SESSION['sessionId'],3);


$dbuser = 'master5';
$dbpass = 'master123';
$dbhost = 'projectdatabase3.cpvnf88ap5ww.eu-west-2.rds.amazonaws.com';

$connect = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
# mysql_select_db($dbname) or die("Could not open the db '$dbname'");

# accessing the quizmasters quiz

# query will select all questions from Question table
$questionQuery = "SELECT questionText FROM projectdatabase3.Question WHERE Quiz_idQuiz= '".$_SESSION['quizId']."'";

# storing the results of the query
$result = mysqli_query($connect, $questionQuery);
while ($row = mysqli_fetch_array($result, MYSQL_NUM))
{
    $result_array[] = $row;
}
# Transferring result to playUser.php
$_SESSION['result'] = $result_array;
$_SESSION['error'] = 1;
$_SESSION['quizIndex'] = 1;
#echo implode($_SESSION['result'][0]);

#Insert empty answers into the database
for($index = 0; $index < sizeof($result); $index++)
{
    $sql = "INSERT INTO projectdatabase3.teamAnswer (teamName, questionNumber, answerText, sessionId) VALUES ('" . $_SESSION['teamName'] . "', '" . $index . "','','".$_SESSION['sessionId']."')";
    if($initialiseAnswers = mysqli_query($connect, $sql))
        $_SESSION['error'] = $_SESSION['error'] + 1;
}


$connectionQuery = "INSERT INTO projectdatabase3.Teams (sessionId, teamName) VALUES ('" . $_SESSION['sessionId'] . "', '" . $_SESSION['teamName'] . "','')";
$putTeamInTeamsTable = mysqli_query($connect, $connectionQuery);

# close connection
mysqli_close($connect);
#check for errors

#if($error == 0)
#{
    header("Location: playUser.php");
    exit;
#}
#else
#{
#    echo "Something went wrong with one of the queries";
#}
?>

