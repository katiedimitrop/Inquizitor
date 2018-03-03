<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'projectdatabase3.cpvnf88ap5ww.eu-west-2.rds.amazonaws.com');
define('DB_USERNAME', 'master2');
define('DB_PASSWORD', 'master123');
define('DB_NAME', 'projectdatabase3');
 
/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
?>