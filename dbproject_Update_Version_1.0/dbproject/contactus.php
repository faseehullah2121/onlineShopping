<?php

session_start();
if ($_SESSION['flag'] == false || $_SESSION['flag'] == null) {
    session_unset();
    session_destroy();
    header('Location: error.php');
} else {

    ?>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->


    <html>
    <head>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
              id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        <style>
            body#LoginForm {
                background-image: url("https://hdwallsource.com/img/2014/9/blur-26347-27038-hd-wallpapers.jpg");
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
                padding: 10px;
            }

            .form-heading {
                color: #fff;
                font-size: 23px;
            }

            .panel h2 {
                color: #444444;
                font-size: 18px;
                margin: 0 0 8px 0;
            }

            .panel p {
                color: #777777;
                font-size: 14px;
                margin-bottom: 30px;
                line-height: 24px;
            }

            .login-form .form-control {
                background: #f7f7f7 none repeat scroll 0 0;
                border: 1px solid #d4d4d4;
                border-radius: 4px;
                font-size: 14px;
                height: 50px;
                line-height: 50px;
            }

            .main-div {
                background: #ffffff none repeat scroll 0 0;
                border-radius: 2px;
                margin: 10px auto 30px;
                max-width: 38%;
                padding: 50px 70px 70px 71px;
            }

            .login-form .form-group {
                margin-bottom: 10px;
            }

            .login-form {
                text-align: center;
            }

            .forgot a {
                color: #777777;
                font-size: 14px;
                text-decoration: underline;
            }

            .login-form .btn.btn-primary {
                background: #f0ad4e none repeat scroll 0 0;
                border-color: #f0ad4e;
                color: #ffffff;
                font-size: 14px;
                width: 100%;
                height: 50px;
                line-height: 50px;
                padding: 0;
            }

            .forgot {
                text-align: left;
                margin-bottom: 30px;
            }

            .botto-text {
                color: #ffffff;
                font-size: 14px;
                margin: auto;
            }

            .login-form .btn.btn-primary.reset {
                background: #ff9900 none repeat scroll 0 0;
            }

            .back {
                text-align: left;
                margin-top: 10px;
            }

            .back a {
                color: #444444;
                font-size: 13px;
                text-decoration: none;
            }

        </style>
        <title>Contact US</title>
    </head>
    <body id="LoginForm">
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

    <div class="container">
        <h1 class="form-heading">Contact Us</h1>
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2>Contact Us</h2>
                    <p>Please enter your name and email</p>
                </div>
                <form id="Login">

                    <div class="form-group">
                        <input type="name" class="form-control" id="inputname" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <div style="height: 100px">
                            <textarea class="form-control" id="message" name="message"
                                      placeholder="Please enter your message here..." rows="15"
                                      style="height: 100px"></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark" style="padding-left: 20% ; padding-right: 20%">Submit
                    </button>

                </form>
            </div>
        </div>
    </div>
    </div>

    </body>
    </html>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy;Idris Website 2018</p>
        </div>
    </footer>

    <?php
}
?>
