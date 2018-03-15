	<?php
	ob_start();
    session_start();
    if(!session_is_registered(email)){
    header("location: index.html");
    }
    ?>

<!DOCTYPE html>

<html>
  <head>
 </head>
  <body>
	 <?php
	require_once('config.php');
	$mysqli = new mysqli($database_host, $database_user, $database_pass, $database_name);
	if($mysqli->connect_error)
	{
		die("Connection failed: ". $mysqli->connect_error);
	}	
    session_start();
	$query = mysql_query('SELECT firstname FROM User WHERE email = ' . $_SESSION['email'] . ';'); 
	$_SESSION["myfirstname"] = $query;
	$result = $mysqli->query($query);
	$row = $result->fetch_assoc();
    echo 'welcome ' . $row['firstname'] . '!';  
?>
     
  </body>
</html>
