<?php
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$con = mysqli_connect('localhost', 'root', '', 'iater03');
// Check connection

if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
   