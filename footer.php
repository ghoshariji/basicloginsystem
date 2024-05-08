<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Common Footer</title>
    <style>
        /* Footer styles */
        footer {
            background-color: #000;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            position: static; /* Change from 'absolute' to 'fixed' */
            bottom: 0;
            width: 100%;
        }

        /* Body padding to prevent content from being hidden under the footer */
        body {
            padding-bottom: 60px; /* Adjust the value to match the height of your footer */
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            footer {
                position: static; /* Change from 'static' to 'fixed' */
            }
        }
    </style>
</head>

<body>
    <!-- Content -->
    <div>
        <!-- <p>This is the content.</p> -->
    </div>
    <!-- End Content -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2024 Your Library. All rights reserved.</p>
            <p>Contact: contact@yourlibrary.com</p>
        </div>
    </footer>
    <!-- End Footer -->
</body>

</html>
