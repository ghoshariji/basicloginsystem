 <?php
    $alert = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include "config/_dbconfig.php";
        if (isset($_SESSION["email"])) {
            $username = $_SESSION["email"];
        }
        $bookname = $_POST["bookname"];
        $price = $_POST["price"];
        $submitdate = $_POST["date"];
        // saving into the database
        $sql = "INSERT INTO `abhijit`.`bookmodel` (`username`, `bookname`, `price`, `submitdate`) VALUES ('$username', '$bookname', '$price', '$submitdate')";

        if ($conn->query($sql) === TRUE) {
            $alert = true;
        }
    }
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
     </style>
 </head>

 <body>
     <?php
        include "config/_nav.php"
        ?>

     <div style="max-width: 400px; margin: 20px auto;">
         <div style="max-width: 400px; margin: 20px auto; background-color: #f9f9f9; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
             <img src="https://via.placeholder.com/400x200" alt="Default Image" style="width: 100%; display: block;">
             <div style="padding: 20px;">
                 <h2 style="margin-top: 0; margin-bottom: 10px;">Bengali Book</h2>
                 <p>This is a Bengali Book </p>
                 <button id="openModalBtn" style="display: block; width: 100%; background-color: #007bff; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 5px; margin-top: 10px;">Issue Now</button>
             </div>
         </div>
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
                 <input type="date" id="email" name="date" required><br><br>
                 <button type="submit" style="background-color: #007bff; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 5px;">Submit</button>
                 <?php
                    if ($alert)
                        echo "Submitted succesfullt";
                    ?>
             </form>
         </div>
     </div>

     <script>
         var modal = document.getElementById("myModal");
         var btn = document.getElementById("openModalBtn");
         var span = document.getElementsByClassName("close")[0];
         btn.onclick = function() {
             modal.style.display = "block";
         }
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

 </body>

 </html>