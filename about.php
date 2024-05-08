<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Library Management System</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f7f7f7;
  }

  .container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  h1 {
    text-align: center;
    color: #333;
  }

  p {
    line-height: 1.6;
    color: #666;
  }

  .button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
  }

  .button:hover {
    background-color: #0056b3;
  }
</style>
</head>
<body>
<?php
    include "config/_nav.php"
    ?>
<div class="container">
  <h1>About Library Management System</h1>
  <p>Welcome to our Library Management System! Our system is designed to help libraries efficiently manage their collections, patrons, and administrative tasks.</p>
  <p>Key features of our system include:</p>
  <ul>
    <li>Efficient cataloging and organization of library materials</li>
    <li>User-friendly interface for both librarians and patrons</li>
    <li>Flexible borrowing and returning system with automatic reminders</li>
    <li>Comprehensive reporting and analytics tools for library administrators</li>
  </ul>
  <p>For any inquiries or assistance, please feel free to contact us.</p>
  <p><a href="#" class="button">Contact Us</a></p>
</div>



</body>
<?php
include "footer.php"
?>
</html>
