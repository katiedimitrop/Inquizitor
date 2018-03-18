<?php
	 session_start();
?>
<html>
<body>
<?php
  //example of validation form found on w3schools updated
  // to the requirements.
  require_once('config.php');
  $mysqli = new mysqli($database_host, $database_user, $database_pass, $database_name);
  if($mysqli->connect_error)
  {
     die("Connection failed: ". $mysqli->connect_error);
  }


      $email = $_POST['email'];
      $pass = $_POST['password'];


      $_SESSION["email"] = $email;

			$sel = "SELECT password, idUser FROM User WHERE email = '$email'";
      if($result = $mysqli->query($sel))
      {
        while($row = $result->fetch_assoc())
        {
          if($pass == $row["password"])
			{
			$idUser = $row['idUser'];
			setcookie('idUser', $idUser, time() + 86400 , "/");
            header("Location: index.php");
			exit;
			}
        }
      }

    $mysqli->close();

 ?>
    </body>
</html>