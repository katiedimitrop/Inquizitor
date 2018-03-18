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

   <link rel='stylesheet prefetch' href='https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-pink.min.css'>
  <link rel='stylesheet prefetch' href='https://cdn.rawgit.com/kybarg/mdl-selectfield/mdl-menu-implementation/mdl-selectfield.min.css'>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

  <link rel="stylesheet" href="styles/hostPage.css">

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

     <?php
        $userIdq = "SELECT idUser FROM User WHERE email='$email'";
	      $userIdqt = $mysqli->query($userIdq);
	      $userId = $userIdqt->fetch_assoc();
        $selectQuiz = "SELECT Name FROM projectdatabase3.Quiz WHERE User_idUser = 2";
        $getQuiz = mysqli_query($mysqli, $selectQuiz);

        $quizs_array = array();
        while ($row = mysqli_fetch_array($getQuiz, MYSQL_NUM)){
            $quizs_array[] = $row;
        }

        echo implode($quizs_array[0]);
     ?>

     <div class="form">

      <div id="hostQuiz">
          <h1>Host a quiz!</h1>

          <!--<h2>Pick a quiz to host! hello</h2>-->

          <form action="/" method="post">

            <div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label">
              <select class="mdl-selectfield__select" id="quizDropdown" name="quizDropdown">
                <?php
                for ($x = 0; $x < $quizs_array.sizeof(); $x++ ){
                   echo "<option value="; echo $x; echo '">'; echo implode($quizs_array[$x]); echo "</option>"; } ?>
                <option value="0">Quiz 1</option>

              </select>

              <label class="mdl-selectfield__label" for="quizDropdown">Quiz list</label>
          </div>

        <button type="submit" class="button button-block"/>Start Quiz</button>

          </form>
    </div>


    <script  src="js/index.js"></script>
    <script src='https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js'></script>
        <script src='https://cdn.rawgit.com/kybarg/mdl-selectfield/mdl-menu-implementation/mdl-selectfield.min.js'></script>

</body>

</html>
