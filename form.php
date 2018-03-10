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
  echo "this is working haha";

  $passwordErr = $emailErr = "";
  $password = $email = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST")
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

    if($passwordErr == "" && $emailErr == "")
    {
      $pass = $_POST['password'];
      $email = $_POST['email'];
      // $group = 0;
      $sel = "SELECT email FROM form WHERE password = '$pass'";

      if($result = $mysqli->query($sel))
      {
        while($row = $result->fetch_assoc())
        {
          if($email == $row["email"])
            echo "Redirect";
        }
      }
    $mysqli->close();
   }

  }
 ?>
    </body>
</html>
