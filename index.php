	<?php
    session_start();
    ?>

<!DOCTYPE html>
<!--The material design css and js master files from:
    https://getmdl.io/started/index.html-->
<link rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet"
      href="https://code.getmdl.io/1.3.0/material.indigo-orange.min.css" />
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

<html>
  <head>
  <link href="styles\styles.css" rel="stylesheet" type="text/css">


 </head>
     <div class="topnav">
       <a href="contactPage.php">Contact</a>
       <a href="Logout.php">Log out</a>
       <a href="connectPage.php">Connect</a>
       <a href="hostPage.php">Host</a>
       <a href="node">Create</a>
       <a href="index.php">Home</a>
       <img id="logo2" width="5%" height="5%" src="images\Logo2.png"/>
       <header>InnQUIZitor</header>
       <a id="welcome" style="font-size:20px;">
	 <?php
	require_once('config.php');
	$mysqli = new mysqli($database_host, $database_user, $database_pass, $database_name);
	if($mysqli->connect_error)
	{
		die("Connection failed: ". $mysqli->connect_error);
	}

    $email = $_SESSION['email'];
    //$firstname = $_SESSION['firstname'];
	$sel = "SELECT firstname FROM User WHERE email = '$email'";
	//echo $sel;
	if($result = $mysqli->query($sel))
      {
        while($row = $result->fetch_assoc())
        {
				echo 'Welcome ' . $row['firstname'] . '!';
				//exit;
				break;
        }
      }
     ?></a>
     </div>

    <svg class="logo" width="300" height="200">
     <img id="logo" width="30%" height="30%" src="images\Logo.png"/>
       <!--Sorry, your browser doesn't support svg graphics.-->
    </svg>

    <h1 id="title" style="font-size:100px;">Inn<a id="QUIZ">QUIZ</a>itor </h1>

    <h2 id="description" > PUB QUIZZES MADE SIMPLE </h2>

    <a href="create-page.html">
       <button id="button1" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
        CREATE A QUIZ
       </button>
    </a>
    <a href="hostPage.html">
       <button id="button2" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
        HOST A SESSION
       </button>
    </a>
    <a href="connectPage.html">
       <button id="button3" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
        CONNECT TO A SESSION
       </button>
    </a>


  </body>
</html>
