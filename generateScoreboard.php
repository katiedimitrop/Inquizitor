<?php
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 18-Mar-18
 * Time: 2:10 PM
 */

$dbuser = 'master5';
$dbpass = 'master123';
$dbhost = 'projectdatabase3.cpvnf88ap5ww.eu-west-2.rds.amazonaws.com';
$dbname = "projectdatabase3";

$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to Connect to '$dbhost'");
# mysql_select_db($dbname) or die("Could not open the db '$dbname'");

# query will select all questions from Question table


//$questionQuery = "SELECT  FROM projectdatabase3.Question WHERE quizId=".$_SESSION['quizId'];

$correct_array = array();
$workTeamAnswerArray = array();
$scoreArray = array();
# storing the results of the query

$firstQuestionQueryStatement = "SELECT idQuestion FROM projectdatabase3.Question WHERE questionText=".$_SESSION['result'][0];
$firstQuestionQuery = mysqli_query($connect, $firstQuestionQueryStatement);
$questionIdArray = mysqli_fetch_array($firstQuestionQuery,MYSQLI_NUM);
$questionId = intval($questionIdArray[0]);

$initialQuestionId = $questionId;

for($index = 0; $index < sizeof($_SESSION['result']); $index++)
{
    $answerQueryStatement = "SELECT answerText FROM projectdatabase3.Answer WHERE quizId=" . $questionId;
    $answerQuery = mysqli_query($connect, $answerQueryStatement);
    $row = mysqli_fetch_array($answerQuery, MYSQLI_NUM);
    $correct_array[$index] = $row[0];
    $questionId++;
}

#loop through all the teams in the session
#{
#   loop to fill the $workTeamAnswerArray with the answers of the current team
#   {
#       get the answer for the current question
#       check it against the correct value from $correctArray --> use a checking function
#       add score to the scoreArray for the current team;
#   }
#}
#rsort(correctArray);
#generate html table from the sorted array


