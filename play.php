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
       <a href="node">Create</a>
       <a href="index.html">Home</a>
       <img id="logo2" width="5%" height="5%" src="images/Logo2.png"/>
       <header href="#">InnQUIZitor</header>
     </div>

</body>

<?php
# starting the session
session_start();

# connecting to the database

$dbuser = 'master5';
$dbpass = 'master123';
$dbhost = 'projectdatabase3.cpvnf88ap5ww.eu-west-2.rds.amazonaws.com';

$connect = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");


# displaying the questions
if (mysqli_num_rows($_SESSION['result']) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($_SESSION['result'])) {
        echo "Question: " . $row["fk_Question_Quiz_idx"]. "<br>";
    }
} else {
    echo "0 results";
}

# testing out session variables
print_r($_SESSION['result']);

?>

</html>
