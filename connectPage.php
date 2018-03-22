	<?php
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en" >


<head>
  <link rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet"
      href="https://code.getmdl.io/1.3.0/material.indigo-orange.min.css" />
  <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>


  <link rel="stylesheet" href="styles/connectPageStyle.css">

  <link rel="stylesheet" href="styles/loginPageStyle.css">


</head>

<body>
     <div class="topnav">
       <a href="contactPage.php">Contact</a>
		<a href="Logout.php">Log out</a>
		<a href="connectPage.php">Connect</a>
		<a href="hostPage.php">Host</a>
		<a href="node">Create</a>
		<a href="index.php">Home</a>
       <img id="logo2" width="5%" height="5%" src="images/Logo2.png"/>
       <header href="#">InnQUIZitor</header>
       <a id="welcome" style="font-size:20px;">
	 <?php
     #
     #  Someone needs to add an input field (preferably on this page but it could also be implemented on getArrayForPlayers.php)
     #  which takes the TeamName and sends it over to another script so it can be saved in the database, in the Connection Table, alongside the QuizID
     #
     #
     #
     #
     #
     #

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

    <div class="form">

    <div id="sessionKey">
          <h1>Join a session!</h1>




          <form action="/playerType.php" method="post">
              <label class="container">Leader
                  <input type="radio" checked="checked" name="isLeader" value="1">
                  <span class="checkmark"></span>
              </label>
              <label class="container">Member
                  <input type="radio"  name="isLeader" value="1>
                  <span class="checkmark"></span>
              </label>
            <div class="field-wrap">
              <label>
                Session Key<span class="req">*</span>
              </label>
              <input type="text"required name="sessionKey" autocomplete="off" />
            </div>

          <button  type="submit" class="button button-block"/>Join Session</button>

					<!--<script>
				function myFunction()
				{
					alert("Please do no consume alcohol if you are intending to drive or are under the legal drinking age");
					exit();
				}
					</script> -->
          </form>
    </div>
    </div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <script  src="js/index.js"></script>


</body>

</html>
