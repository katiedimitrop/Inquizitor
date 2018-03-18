<?php
/**
 * Created by PhpStorm.
 * User: mihne
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

# close connection
mysqli_close($connect);
header("Location: playUser.php");
exit;