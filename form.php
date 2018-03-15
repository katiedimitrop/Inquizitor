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
  //echo "this is working haha";

  //$passwordErr = $emailErr = "";
  //$password = $email = "";

  /*if ($_SERVER["REQUEST_METHOD"] == "POST")
  {

    if (empty($_POST["email"]))
    {
      $emailErr = "Email is required <br>";
      echo $emailErr;
      echo "<br/>";
    } else
      {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
          $emailErr = "Invalid email format ";
          echo $emailErr;
          echo "<br/>";
        }
      }

    if (empty($_POST["password"]))
    {
      $passwordErr = "Password is required ";
      echo $passwordErr;
      echo "<br/>";
    }
*/
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    	$email = $_POST['email'];
    	$pass = $_POST['password'];
    	echo $email;
    	echo '<br>';
    	echo $pass;
    	echo '<br>'
    	echo 'this thing should work';
    	echo '<br>'
    }
    else
    {
    	echo 'this is not working';
    }
    
    //echo $email;
     // $group = 0;
    $_SESSION["email"] = $email;  
    $sel = "SELECT password FROM User WHERE email ='".$email."' ";
    echo $sel;
    echo '<br>';
    echo $email;
    if($result = $mysqli->query($sel))
    {
    	echo 'ba ej nesimtit x2';
      while($row = $result->fetch_assoc())
      {
      	echo 'bleh';
        if($pass == $row["password"])
        {
					echo 'dc nu mergi';
          header("Location: index.php");           																										
					exit();
				}
      }
    }
    else
    {
			echo 'alo';
		}
    $mysqli->close();
    echo 'it inished';
 ?>
    </body>
</html>
