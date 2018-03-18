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

</head>

<body>
     <div class="topnav">
       <a href="contactPage.php">Contact</a>
		<a href="Logout.php">Log out</a>
		<a href="connectPage.php">Connect</a>
		<a href="hostPage.php">Host</a>
		<a href="create-page.php">Create</a>
		<a href="index.php">Home</a>
       <img id="logo2" width="5%" height="5%" src="images\Logo2.png"/>
       <header href="#">InnQUIZitor</header>
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

    <div class="form">

    <div id="sessionKey">
          <h1>Join a session!</h1>
          <div class="container">
            <ul>
            <li>
              <input type="radio" name="isLeader" value=1 checked> Team Leader<br>
            </li>
            <li>
              <input type="radio" name="isLeader" value=0> Team Member<br>
            </li>
            </ul>
          </div>
          <form action="/getArrayForPlayers.php" method="post">

            <div class="field-wrap">
              <label>
                Session Key<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" />
            </div>

          <button type="submit" class="button button-block"/>Join Session</button>

          </form>
    </div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <script  src="js/index.js"></script>


</body>

</html>
