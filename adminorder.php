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
    // require the navabr 
    include "config/_adminnav.php";
    // require the database connection
    include "config/_dbconfig.php";
    // fetch data
    $sql = "SELECT * FROM `bookmodel`";
    // check if the connection ok -> then do -> data fetch
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<h1>User all details</h1>";
        echo "<table>";
        echo "<tr><th>username</th><th>bookname</th><th>price</th><th>Submitdate</th><th>Status</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["username"] . "</td><td>" . $row["bookname"] . "</td><td>" . $row["price"] . "</td> <td>" . $row["submitdate"] . "</td><td>  
            <form method='post' action='/abhijit/adminorder.php'>
            <button type='submit' name='approve'>Approved</button>
        </form></td></tr>";
        }
        echo "</table>";
    } else {
        echo "No data available";
    }
    ?>

</body>

</html>