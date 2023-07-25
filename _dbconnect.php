<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "inotes";

$conn = mysqli_connect($servername, $username, $password, $database);

if($conn)
{
  // echo 'dbconnect successful<br>';

}
else{
    die("connection failed:".mysqli_connect_error());
}
?>