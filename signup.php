<html>
<body>
<?php
  //example of validation form found on w3schools updated 
  // to the requirements.
	//echo "this page bloody works";
	//echo "<br/>";
  require_once('config.php');
  $mysqli = new mysqli($database_host, $database_user, $database_pass, $database_name);
  if($mysqli->connect_error)
  {
     die("Connection failed: ". $mysqli->connect_error);
  }

  $firstname = $lastname =$password = $email = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $pass = $_POST['password'];
      $email = $_POST['email'];
    

        $sql = "INSERT INTO User (firstname,lastname,password,email) "

              . "VALUES ('".$firstname."', '".$lastname."','".$pass."','".$email."')";
        if ($mysqli->query($sql))
        {
          header("Location: loginPage.html"); 
		  exit;
        }
        else 
        {
        	echo "User could not be added to the database!";
       	}
     	//}
    }
    $mysqli->close();
    
		die();

/*
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
if (empty($_POST["firstname"]))
{
$firstnameErr = "First name is required ";
echo $firstnameErr;
echo "<br/>";
} else
{
$firstname = $_POST["firstname"];
// check if name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$firstname))
{
$firstnameErr = "Only letters and white space allowed ";
echo $firstnameErr;
echo "<br/>";
}
}
if (empty($_POST["lastname"]))
{
$lastnameErr = "Last name is required ";
echo $lastnameErr;
echo "<br/>";
} else
{
$lastname = $_POST["lastname"];
// check if name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$lastname))
{
$lastnameErr = "Only letters and white space allowed ";
echo $lastnameErr;
echo "<br/>";
}
}
if (empty($_POST["email"]))
{
$emailErr = "Email is required <br>";
echo $emailErr;
echo "<br/>";
} else
{
$email = $_POST["email"];
// check if e-mail address is well-formed
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
$emailErr = "Invalid email format ";
echo $emailErr;
echo "<br/>";
}
}

if (empty($_POST["password"]))
{
$passwordErr = "Name is required ";
echo $passwordErr;
echo "<br/>";
} else
{
$password = $_POST["password"];
// check if name only contains letters and whitespace
if (strlen($_POST["password"]) <= '8')
{
$passwordErr = "Your Password Must Contain At Least 8 Characters!";
}
elseif(!preg_match("#[0-9]+#",$password))
{
$passwordErr = "Your Password Must Contain At Least 1 Number!";
}
elseif(!preg_match("#[A-Z]+#",$password))
{
$passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
}
elseif(!preg_match("#[a-z]+#",$password))
{
$passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
}
else
{
$cpasswordErr = "Please Check You've Entered Or Confirmed Your Password!";
}
}

if($passwordErr == "" && $emailErr == "" && $firstnameErr == "" && $lastnameErr == "")
{ */
// $sel = "SELECT email FROM User";
/*
 if($result = $mysqli->query($sel))
 {
   while($row = $result->fetch_assoc())
   {
     if($email == $row["email"])
       echo "You are already registered";
   }
 }
 else
 {*/
/*$idValue = 0;
$idValue = $mysqli->query("SELECT MAX(idUser) FROM User") + 1;
$idValue = $idValue + 1;
//echo $idValue;
*/
//$_SESSION["firstname"] = $firstname;
 ?>
    </body>
</html>
