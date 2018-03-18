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
$questionQuery = "SELECT questionText FROM projectdatabase3.Question WHERE quizId=".$_SESSION['quizId'];

$correct_array = array();
# storing the results of the query
$result = mysqli_query($connect, $questionQuery);

while ($row = mysqli_fetch_array($result, MYSQL_NUM)){
    $correct_array[] = $row;
}

for