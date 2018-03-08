<!DOCTYPE html>
<html lang="en" >


<head>
  <link rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet"
      href="https://code.getmdl.io/1.3.0/material.indigo-orange.min.css" />
  <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

  <link rel="stylesheet" href="styles/styles.css">

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

</body>

<?php
# connecting to the database

$dbuser = 'master5';
$dbpass = 'master123';
$dbhost = 'projectdatabase3.cpvnf88ap5ww.eu-west-2.rds.amazonaws.com';

$connect = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
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

?>

</html>
