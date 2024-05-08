<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <?php
    // Require the navbar 
    include "config/_adminnav.php";
    // Require the database connection
    include "config/_dbconfig.php";

    // Check if the approve or reject button is clicked
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['approve'])) {
        // Get the ID of the order to approve
        $username = $_POST['username'];

        // Update the isApproved field to 1 (approved)
        $sql = "UPDATE `bookmodel` SET `isApproved` = 1 WHERE `username` = '$username'";
        if ($conn->query($sql) === TRUE) {
            echo "Order approved successfully.";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reject'])) {
        // Get the ID of the order to reject
        $username = $_POST['username'];

        // Update the isApproved field to 0 (rejected)
        $sql = "UPDATE `bookmodel` SET `isApproved` = 0 WHERE `username` = '$username'";
        if ($conn->query($sql) === TRUE) {
            echo "Order rejected successfully.";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    // Fetch data
    $sql = "SELECT * FROM `bookmodel`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<h1>User all details</h1>";
        echo "<table>";
        echo "<tr><th>username</th><th>bookname</th><th>price</th><th>Submitdate</th><th>Status</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["username"] . "</td><td>" . $row["bookname"] . "</td><td>" . $row["price"] . "</td> <td>" . $row["submitdate"] . "</td><td>" . (($row["isApproved"] == 1) ? "Approved" : "Pending") . "</td><td>";  
            if ($row["isApproved"] == 1) {
                // Show Reject button
                echo "<form method='post' action='/abhijit/adminorder.php'>
                <input type='hidden' name='username' value='" . $row["username"] . "'>
                <button type='submit' name='reject'>Reject</button>
                </form>";
            } else {
                // Show Approve button
                echo "<form method='post' action='/abhijit/adminorder.php'>
                <input type='hidden' name='username' value='" . $row["username"] . "'>
                <button type='submit' name='approve'>Approve</button>
                </form>";
            }
            echo "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No data available";
    }
    ?>

    <?php
    include "footer.php"
    ?>

</body>

</html>
