<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "config/_dbconfig.php";
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        echo "Please enter both email and password.";
    } else {
        $sql = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'";
        $res = mysqli_query($conn, $sql);

        if ($res) {
            if (mysqli_num_rows($res) == 1) {
                $row = $res->fetch_assoc();
                // Start session
                session_start();
                $_SESSION["email"] = $email;
                if ($row["isAdmin"] == 1) {
                    header("Location: /abhijit/admin.php"); 
                } else {
                    header("Location: /abhijit/welcome.php"); 
                }
                exit();
            } else {
                echo "Invalid email or password. Please try again.";
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <form action="/abhijit/login.php" method="post" style="background-color: #fff; border-radius: 5px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); padding: 20px;">
            <input type="text" name="email" placeholder="Enter email" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
            <input type="password" name="password" placeholder="Enter password" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
            <button type="submit" style="width: 100%; padding: 10px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Login</button>
            <a href="/abhijit/signup.php">Don't have an account? Go to signup</a>
        </form>
    </div>
</body>

</html>