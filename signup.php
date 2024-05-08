<?php
$alert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "config/_dbconfig.php";
    $name = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $about = $_POST["about"];
    $isAdmin = 0;
    if (empty($name) || empty($email) || empty($password) || empty($about)) {
        echo "All field required";
    }
    $sql = "insert into `libray`.`user` (`name`,`email`,`password`,`about`,`isAdmin`) values('$name','$email','$password','$about','$isAdmin')";
    if ($conn->query($sql) === TRUE) {
        $alert = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="/abhijit/signup.php" method="post">
        <input type="text" name="username" placeholder="Enter name">
        <input type="email" name="email" placeholder="Enter email">
        <input type="text" name="password" placeholder="Enter password">
        <input type="text" name="about" placeholder="Enter about">
        <button type="submit">Submit</button>
        <a href="/abhijit/login.php">Already have an account ? go to login </a>
        <?php
        if ($alert) {
            echo "Signup complete";
        }
        ?>
    </form>


</body>

</html>