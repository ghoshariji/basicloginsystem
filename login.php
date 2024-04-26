<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "config/_dbconfig.php";
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        echo "";
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

<style>
    .body_section{
        height: 80%;
        width: 100%;
    }
    .from1{
        height: 43vh;
        width: 40vh;
    }
    .div1{
        background-image: url(/basicloginsystem/photos/3d-rendering-classic-interior.jpg);
        min-height: 380px;
        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        /* filter: blur(8px);
        -webkit-filter: blur(8px); */
    }
    
</style>

</head>

<body class="body_section" style="font-family: Arial, sans-serif; background-color: gray; margin: 0; padding: 0;">
        
    
    <div class="div1" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        
        <form class="from1" action="/basicloginsystem/login.php" method="post" style="background-color: #fff; border-radius: 5px; box-shadow: 5px 10px 10px rgba(0, 0, 0, 0.5); padding: 20px;">
            <b style="display: flex; justify-content: center; align-items: center; font-size: 20px;">Please Login To Continue</b>
            <input type="text" name="email" placeholder="Enter email" style="width: 90%; padding: 15px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px; position: relative; top: 2rem;" required>
            <input type="password" name="password" placeholder="Enter password" style="width: 90%; padding: 15px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px; position: relative; top: 3rem;" required>
            <div style="display: flex; justify-content: center; align-items: center; position: relative; top: 6rem;"><button type="submit" style="width: 50%; padding: 10px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Login</button></div>
            <a href="/basicloginsystem/signup.php" style="display: flex; justify-content: center; align-items: center; position: relative; top: 7rem;">Don't have an account? Go to signup</a>
        </form>
    </div>
</body>

</html>