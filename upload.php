<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
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
    <?php include "config/_adminnav.php"; ?>

    <h1>Contact Messages</h1>

    <?php
    // Include database configuration
    include "config/_dbconfig.php";

    // Fetch data from contact model
    $sql = "SELECT * FROM contact";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Name</th><th>Email</th><th>Message</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["message"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No contact messages available.";
    }
    ?>

</body>


<?php
include "footer.php"
?>
</html>
