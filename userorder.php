<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Orders</title>
</head>
<body>
<?php 
    // session_start(); // Start the session
    include "config/_nav.php";

    // Check if email is set in the session
    if (isset($_SESSION["email"])) {
        $email = $_SESSION["email"];

        // Include database configuration
        include "config/_dbconfig.php";

        // Query to fetch orders based on email
        $sql = "SELECT * FROM `libray`.`bookmodel` WHERE `username`='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display orders in a table format
            echo "<h1>User Orders</h1>";
            echo "<table border='1'>";
            echo "<tr><th>Book Name</th><th>Price</th><th>Submit Date</th><th>Status</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["bookname"]."</td>";
                echo "<td>".$row["price"]."</td>";
                echo "<td>".$row["submitdate"]."</td>";
                
                // Determine status based on isApproved value
                $status = ($row["isApproved"] == 0) ? "Pending" : "Issued";
                echo "<td>".$status."</td>";
                
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No orders found for this user.";
        }
    } else {
        echo "User not logged in.";
    }
?>


<?php
include "footer.php"
?>
</body>
</html>
