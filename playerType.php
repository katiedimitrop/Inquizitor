<?php
/**
 * Created by PhpStorm.
 * User: mihne
 * Date: 22-Mar-18
 * Time: 2:04 PM
 */
session_start();
$_SESSION['isLeader'] = $_POST['isLeader'];
$_SESSION['sessionId'] = $_POST['sessionKey'];

if($_SESSION['isLeader'] == 0) :
header("Location: getArrayForPlayers.php");
exit;
else:
    echo $_POST['sessionKey'];
    echo '<br>';
    echo $_SESSION['sessionKey'];
    echo '<br>';
?>
<!DOCTYPE html>
<html lang="en" >


<head>
    <title>innQUIZitor</title>
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
</div>
        <div class="form">

            <div id="sessionKey">
                <h1>Please enter the name of your team</h1>

                <form action="/getArrayForPlayers.php" method="post">

                    <div class="field-wrap">
                        <label>
                            Team Name<span class="req">*</span>
                        </label>
                        <input type="text"required name="teamName" autocomplete="off" />
                    </div>

                    <button type="submit" class="button button-block"/>Enter the Quiz</button>


                </form>
            </div>

            <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

            <script  src="js/index.js"></script>
        </div>

</body>

</html>
<?php
    endif;
    ?>