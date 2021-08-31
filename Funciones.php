<?php
$dbname = 'social';
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';

$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if($connection->connect_error) die("Fatal error");
echo "Se conectó chido";

?>