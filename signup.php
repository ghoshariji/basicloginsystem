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
    $sql = "insert into `abhijit`.`user` (`name`,`email`,`password`,`about`,`isAdmin`) values('$name','$email','$password','$about','$isAdmin')";
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
    <title>Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <!-- <?php require 'config/_nav.php' ?> -->
    <form action="/basicloginsystem/signup.php" method="post">
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