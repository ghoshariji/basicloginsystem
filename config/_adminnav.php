<?php
session_start();
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
} else {
    echo "Not found session";
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
    <div>
        <ul style="list-style-type: none; margin: 0; padding: 0; background-color: #333; overflow: hidden;">
            <li style="float: left;"><a href="/abhijit/admin.php" style="display: block; color: white; text-align: center; padding: 14px 16px; text-decoration: none;">Home</a></li>
            <li style="float: left;"><a href="/abhijit/upload.php" style="display: block; color: white; text-align: center; padding: 14px 16px; text-decoration: none;">Upload Book</a></li>
            <li style="float: left;"><a href="/abhijit/adminorder.php" style="display: block; color: white; text-align: center; padding: 14px 16px; text-decoration: none;">Order Details</a></li>
            <li style="float: left;"><a href="login.php" style="display: block; color: white; text-align: center; padding: 14px 16px; text-decoration: none;">Logout</a></li>
            <li style="float: right;"><a href="#" style="display: block; color: white; text-align: center; padding: 14px 16px; text-decoration: none;">Hello <?php echo $email; ?></a></li>
        </ul>
    </div>
</body>

</html>