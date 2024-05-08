<?php
$alert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "config/_dbconfig.php";
        $email = $_SESSION["email"];
        $bookname = $_POST["bookname"];
        $price = $_POST["price"];
        $submitdate = $_POST["date"];
        $sql = "INSERT INTO `libray`.`bookmodel` (`username`, `bookname`, `price`, `submitdate`) VALUES ('$email', '$bookname', '$price', '$submitdate')";

        if ($conn->query($sql) === TRUE) {
            $alert = true;
        } else {
            echo "Error: " . $conn->error;
        }
}
$books = array(
    array("name" => "Bengali Book", "description" => "This is a Bengali Book", "image" => "https://picsum.photos/200/300"),
    array("name" => "English Book", "description" => "This is an English Book", "image" => "https://picsum.photos/200/300"),
    array("name" => "Java Book", "description" => "This is a Java Book", "image" => "https://picsum.photos/200/300"),
    array("name" => "PHP Book", "description" => "This is a PHP Book", "image" => "https://picsum.photos/200/300"),
    array("name" => "HTML Book", "description" => "This is an HTML Book", "image" => "https://picsum.photos/200/300"),
    array("name" => "CSS Book", "description" => "This is a CSS Book", "image" => "https://picsum.photos/200/300"),
    array("name" => "C# Book", "description" => "This is a C# Book", "image" => "https://picsum.photos/200/300"),
    array("name" => "ExpressJS Book", "description" => "This is an ExpressJS Book", "image" => "https://picsum.photos/200/300"),
    array("name" => "MongoDb Book", "description" => "This is a MongoDb Book", "image" => "https://picsum.photos/200/300")
);
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <style>
        /* General styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        /* Book styles */
        .book-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .book-container {
            flex: 0 0 calc(33.33% - 20px);
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
        }

        .book-container:hover {
            transform: translateY(-5px);
        }

        .book-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 2px solid #f2f2f2;
        }

        .book-details {
            padding: 20px;
        }

        .book-title {
            margin-top: 0;
            margin-bottom: 10px;
            text-align: center;
            font-size: 1.2rem;
        }

        .book-description {
            text-align: center;
            color: #666;
        }

        .book-button {
            display: block;
            width: 100%;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            border: none;
            border-radius: 0 0 10px 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .book-button:hover {
            background-color: #0056b3;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
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

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php include "config/_nav.php" ?>
    <div class="container">
        <h1>Your Library</h1>
        <div class="book-section">
            <?php foreach ($books as $book) : ?>
                <div class="book-container">
                    <img src="<?php echo $book['image']; ?>" alt="<?php echo $book['name']; ?>" class="book-image">
                    <div class="book-details">
                        <h2 class="book-title"><?php echo $book['name']; ?></h2>
                        <p class="book-description"><?php echo $book['description']; ?></p>
                        <button class="book-button" onclick="openModal('<?php echo $book['name']; ?>')">Issue Now</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="modalBookTitle">Fill your Book details</h2>
            <form id="modalForm" action="/abhijit/welcome.php" method="post">
                <label for="name">Book Name:</label><br>
                <input type="text" id="name" name="bookname" required><br><br>
                <label for="name">Registered Email:</label><br>
                <input type="email" id="email" name="email" required><br><br>
                <label for="price">Enter the Price:</label><br>
                <input type="text" id="price" name="price" required><br><br>
                <label for="date">Enter the return Date:</label><br>
                <input type="date" id="date" name="date" required><br><br>
                <button type="submit" style="background-color: #007bff; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 5px;">Submit</button>
                <?php if ($alert) echo "Submitted successfully"; ?>
            </form>
        </div>
    </div>

    <script>
        function openModal(bookName) {
            var modal = document.getElementById("myModal");
            var modalBookTitle = document.getElementById("modalBookTitle");
            modal.style.display = "block";
            modalBookTitle.textContent = "Issue " + bookName;
        }

        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }
    </script>
    <?php include "footer.php" ?>
</body>

</html>