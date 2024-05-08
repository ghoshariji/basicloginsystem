<?php
// session_start(); // Start the session

$alert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "config/_dbconfig.php";

    // Check if email is set in the session
    if (isset($_SESSION["email"])) {
        $email = $_SESSION["email"];

        $bookname = $_POST["bookname"];
        $price = $_POST["price"];
        $submitdate = $_POST["date"];

        // saving into the database
        $sql = "INSERT INTO `libray`.`bookmodel` (`username`, `bookname`, `price`, `submitdate`) VALUES ('$email', '$bookname', '$price', '$submitdate')";

        if ($conn->query($sql) === TRUE) {
            $alert = true;
        } else {
            // Handle the case where the query execution fails
            echo "Error: " . $conn->error;
        }
    } else {
        // Handle the case where email is not set in the session
        echo "Email not found in session.";
    }
}

// Array of book details
$books = array(
    array("name" => "Bengali Book", "description" => "This is a Bengali Book","image" => "https://picsum.photos/200/300"),
    array("name" => "English Book", "description" => "This is an English Book","image" => "https://picsum.photos/200/300"),
    array("name" => "Java Book", "description" => "This is a Java Book","image" => "https://picsum.photos/200/300"),
    array("name" => "PHP Book", "description" => "This is a PHP Book","image" => "https://picsum.photos/200/300"),
    array("name" => "HTML Book", "description" => "This is an HTML Book","image" => "https://picsum.photos/200/300"),
    array("name" => "CSS Book", "description" => "This is a CSS Book","image" => "https://picsum.photos/200/300"),
    array("name" => "C# Book", "description" => "This is a C# Book","image" => "https://picsum.photos/200/300"),
    array("name" => "ExpressJS Book", "description" => "This is an ExpressJS Book","image" => "https://picsum.photos/200/300"),
    array("name" => "MongoDb Book", "description" => "This is a MongoDb Book","image" => "https://picsum.photos/200/300")
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 5px;
        }

        /* Close button styles */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .allmodal {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .book-container {
            max-width: 400px;
            margin: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .book-container img {
            width: 100%;
            display: block;
        }

        .book-container h2 {
            margin-top: 0;
            margin-bottom: 10px;
        }

        .book-container p {
            margin-top: 0;
        }

        .book-container button {
            display: block;
            width: 100%;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 10px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php
    include "config/_nav.php";
    ?>

    <div class="allmodal">
        <?php foreach ($books as $book) : ?>
            <div class="book-container">
                <img src="<?php echo $book['image']; ?>" alt="Default Image">
                <div style="padding: 20px;">
                    <h2><?php echo $book['name']; ?></h2>
                    <p><?php echo $book['description']; ?></p>
                    <button class="openModalBtn" style="display: block; width: 100%;">Issue Now</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Fill your Book details</h2>
            <form id="modalForm" action="/abhijit/welcome.php" method="post">
                <label for="name">Book Name:</label><br>
                <input type="text" id="name" name="bookname" required><br><br>
                <label for="price">Enter the Price:</label><br>
                <input type="text" id="price" name="price" required><br><br>
                <label for="date">Enter the return Date:</label><br>
                <input type="date" id="date" name="date" required><br><br>
                <button type="submit" style="background-color: #007bff; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 5px;">Submit</button>
                <?php
                if ($alert)
                    echo "Submitted successfully";
                ?>
            </form>
        </div>
    </div>

    <script>
        var modal = document.getElementById("myModal");
        var btns = document.querySelectorAll(".openModalBtn");
        var span = document.getElementsByClassName("close")[0];

        btns.forEach(function(btn) {
            btn.onclick = function() {
                modal.style.display = "block";
            }
        });

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        // document.getElementById("modalForm").addEventListener("submit", function(event) {
        //     event.preventDefault();
        //     this.submit();
        // });

    </script>

    <?php
    include "footer.php"
    ?>
</body>

</html>
