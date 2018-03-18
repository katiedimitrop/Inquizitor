<?php
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 18-Mar-18
 * Time: 9:06 AM
 */

session_start();
$dbuser = 'master5';
$dbpass = 'master123';
$dbhost = 'projectdatabase3.cpvnf88ap5ww.eu-west-2.rds.amazonaws.com';

$connect = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
# mysql_select_db($dbname) or die("Could not open the db '$dbname'");

# accessing the quizmasters quiz

# query will select all questions from Question table
$questionQuery = "SELECT fk_Question_Quiz_idx FROM Question";

# storing the results of the query
$result = mysqli_query($connect, $questionQuery);

# Transferring result to play.php
$_SESSION['result'] = $result;

#Insert empty answers into the database
for($index = 1; $index <= sizeof($result); $index++)
{
    $sql = "INSERT INTO teamAnswer (teamName, questionNumber, answerText) VALUES ('" . $_SESSION['teamName'] . "', '" . $index . "','')";
    if(!($mysqli -> query($sql)))
    {
        $error = 1;
    }
}

# close connection
mysqli_close($connect);
#check for errors
if($error == 0)
{
    header("Location: playUser.php");
    exit;
}
else
{
    echo "Something went wrong with one of the queries";
}
exit;