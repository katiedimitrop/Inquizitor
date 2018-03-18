<?php
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 18-Mar-18
 * Time: 8:36 AM
 */

    session_start();
    $dbuser = 'master5';
    $dbpass = 'master123';
    $dbhost = 'projectdatabase3.cpvnf88ap5ww.eu-west-2.rds.amazonaws.com';
    $dbname = "projectdatabase3";

    $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to Connect to '$dbhost'");

    $error = 0;

    foreach ($_SESSION["answerArray"] as $index=>$value)
    {
        $sql = "INSERT INTO Answer (teamName, questionNumber, answerText) VALUES ('" . $_SESSION['teamName'] . "', '" . $index . "','" . $value ."')";
        if(!($mysqli -> query($sql)))
        {
            $error = 1;
        }
    }
    if($error == 0)
    {
        header("Location: playUser.php");
        exit;
    }
    else
    {
        echo "Something went wrong with one of the queries";
    }
