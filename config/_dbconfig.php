<?php
$server = "127.0.0.1:3308";
$username = "root";
$password = "1234";
$database = "abhijit";
$conn = mysqli_connect($server, $username, $password, $database);
if ($conn) {
    // echo "Success";
} else {
    die(mysqli_connect_error());
}
?>