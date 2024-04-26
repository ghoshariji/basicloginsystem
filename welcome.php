<!-- <?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include "config/_dbconfig.php";
    session_start();
   if(isset($_SESSION["email"])){
    $email = $_SESSION["email"];
   }
   $username = $_POST["username"];
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
    <?php
    include "config/_nav.php"
    ?>

    <body style="font-family: Arial, sans-serif; margin: 0; padding: 0;">
    <form action="/abhijit/welcome.php" method="post">
        <div style="max-width: 400px; margin: 20px auto; background-color: #f9f9f9; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <img src="https://via.placeholder.com/400x200" alt="Default Image" style="width: 100%; display: block;">
            <div style="padding: 20px;">
                <h2 style="margin-top: 0; margin-bottom: 10px;">Title</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non neque elit. </p>
                <a href="#" style="display: inline-block; background-color: #007bff; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 5px; margin-top: 10px;">Button</a>
            </div>
        </div>
        </form>
    </body>

</body>

</html> -->



<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
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
    </style>
</head>

<body>
    <?php
    include "config/_nav.php"
    ?>

    <div style="max-width: 400px; margin: 20px auto;">
        <button id="openModalBtn" style="display: block; width: 100%; background-color: #007bff; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 5px; margin-top: 10px;">Open Modal</button>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Title</h2>
            <form id="modalForm" action="bookdetail.php" method="post">
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" required><br>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required><br><br>
                <button type="submit" style="background-color: #007bff; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 5px;">Submit</button>
            </form>
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("openModalBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Submit form when the modal form is submitted
        document.getElementById("modalForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent the default form submission
            // You can add any additional data to be sent with the form submission here
            this.submit(); // Submit the form
        });
    </script>

</body>

</html>
