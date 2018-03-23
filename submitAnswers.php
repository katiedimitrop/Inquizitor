<?php
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 18-Mar-18
 * Time: 8:36 AM
 */
    #Start the session
    session_start();
    #Connect to the database
    $dbuser = 'master5';
    $dbpass = 'master123';
    $dbhost = 'projectdatabase3.cpvnf88ap5ww.eu-west-2.rds.amazonaws.com';
    $dbname = "projectdatabase3";

    $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to Connect to '$dbhost'");

    $error = 0;
    #Update the values of all the answers in the table according to the array
    foreach ($_SESSION["answerArray"] as $index=>$value)
    {
        $sql = "UPDATE projectdatabase3.teamAnswer SET answerText='".$value." WHERE teamName='" . $_SESSION['teamName'] . "' AND questionNumber=" . $index;
        if(!($mysqli -> query($sql)))
        {
            $error = 1;
        }
    }

    #Redirect if the queries were successful, otherwise echo an error
    if($error == 0)
    {
        header("Location: playUser.php");
        exit;
    }
    else
    {
        echo "Something went wrong with one of the queries";
    }
