<?php
session_start();
if ($_SESSION['flag'] == false || $_SESSION['flag'] == null) {
    session_unset();
    session_destroy();
    header('Location: error.php');
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <!-- Theme Made By www.w3schools.com - No Copyright -->
        <title>About us</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Online Shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactus.php">Contact Us</a>
                    </li>
                    <li>
                        <a class="nav-link" href="logoff.php" onclick="return confirm('Are you sure you want to Sign Out?')">Sign Out</a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>


    <div class="row" style="margin-top: 8%">
        <div class="col">
            <div class="container text-center">
                <img src="images/avatar1.jpg" class="rounded-circle" alt="Bird" width="300" height="300">
                <h3 style="font-family: 'Calibri Light'">Edrissa sumareh</h3>
                <a href="contactus.php">
                    <button type="button" class="btn btn-dark">Contact Us!</button>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="container text-center">

                <img src="images/avatar2.jpg" class="rounded-circle" alt="Bird" width="300" height="300">
                <h3 style="font-family: 'Calibri Light'">Saqlain mahin</h3>
                <a href="contactus.php">
                    <button type="button" class="btn btn-dark">Contact Us!</button>
                </a>
            </div>
        </div>

    </div>
    </body>
    </html>

    <!-- Footer -->
    <footer class="py-5 bg-dark" style="margin-top: 10%">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy;Idris Website 2018</p>
        </div>
    </footer>

    <?php
}
?>
