<?php
$server = "localhost:4000";
$username = "root";
$password = "";
$database = "libray";
$conn = mysqli_connect($server, $username, $password, $database);
if ($conn) {
    // echo "Success";
} else {
    die(mysqli_connect_error());
}
?>