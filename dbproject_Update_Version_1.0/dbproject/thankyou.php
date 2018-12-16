<?php
session_start();
require_once ("connection.php");
if ($_SESSION['flag'] == false || $_SESSION['flag'] == null) {
    session_unset();
    session_destroy();
    header('Location: error.php');
} else {

    $user_id = $_SESSION['userid'];

    $query = "delete from shoppingcart where userid = $user_id";
    $result = mysqli_query($conn,$query);
    if(!$result){
        echo "error in deleting";
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Thank you!</title>


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <style>


            html,
            body {
                width: 100%;
                height: 100%;
            }

            body {
                font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif';
            }

            hr {
                max-width: 100px;
                margin: 25px auto 0;
                border-width: 1px;
                border-color: rgba(34, 34, 34, 0.1);
            }

            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                font-family: 'Catamaran', 'Helvetica', 'Arial', 'sans-serif';
                font-weight: 200;
                letter-spacing: 1px;
            }

            p {
                font-size: 18px;
                line-height: 1.5;
                margin-bottom: 20px;
            }

            section {
                padding: 100px 0;
            }

            section h2 {
                font-size: 50px;
            }

            #mainNav .navbar-nav > li > a {
                font-size: 11px;
                font-family: 'Lato', 'Helvetica', 'Arial', 'sans-serif';
                letter-spacing: 2px;
                text-transform: uppercase;
            }

            #mainNav .navbar-nav > li > a,
            #mainNav .navbar-nav > li > a:focus {
                color: #222222;
            }

            #mainNav .navbar-nav > li > a:hover,
            #mainNav .navbar-nav > li > a:focus:hover {
                color: #fdcc52;
            }

            @media (min-width: 992px) {
                #mainNav {
                    border-color: transparent;
                    background-color: transparent;
                }

                #mainNav .navbar-brand {
                    /*color: fade(white, 70%);*/
                }

                #mainNav .navbar-brand:hover, #mainNav .navbar-brand:focus {
                    color: white;
                }

                #mainNav .navbar-nav > li > a,
                #mainNav .navbar-nav > li > a:focus {
                    color: rgba(255, 255, 255, 0.7);
                }

                #mainNav .navbar-nav > li > a:hover,
                #mainNav .navbar-nav > li > a:focus:hover {
                    color: white;
                }

                #mainNav.navbar-shrink .navbar-nav > li > a,
                #mainNav.navbar-shrink .navbar-nav > li > a:focus {
                    color: #222222;
                }

                #mainNav.navbar-shrink .navbar-nav > li > a:hover,
                #mainNav.navbar-shrink .navbar-nav > li > a:focus:hover {
                    color: #fdcc52;
                }
            }

            header.masthead {
                position: relative;
                width: 100%;
                padding-top: 150px;
                padding-bottom: 100px;
                color: white;
                background: url("images/bg-pattern.png"), #7b4397;
                background: url("images/bg-pattern.png"), -webkit-gradient(linear, right top, left top, from(#7b4397), to(#dc2430));
                background: url("images/bg-pattern.png"), linear-gradient(to left, #7b4397, #dc2430);
            }

            header.masthead .header-content {
                max-width: 500px;
                margin-bottom: 100px;
                text-align: center;
            }

            header.masthead .header-content h1 {
                font-size: 30px;
            }

            header.masthead .device-container .screen img {
                border-radius: 3px;
            }

            @media (min-width: 992px) {
                header.masthead {
                    height: 100vh;
                    min-height: 775px;
                    padding-top: 0;
                    padding-bottom: 0;
                }

                header.masthead .header-content {
                    margin-bottom: 0;
                    text-align: left;
                }

                header.masthead .header-content h1 {
                    font-size: 50px;
                }

            }

            section.download h2 {
                font-size: 50px;
                margin-top: 0;
            }

            section.download .badges .badge-link img {
                height: 60px;
            }

            @media (min-width: 768px) {
                section.download h2 {
                    font-size: 70px;
                }
            }

            section.features .section-heading h2 {
                margin-top: 0;
            }

            section.features .section-heading p {
                margin-bottom: 0;
            }

            section.features .feature-item h3 {
                font-size: 30px;
            }

            section.features .feature-item i {
                font-size: 80px;
                display: block;
                margin-bottom: 15px;
                background: -webkit-gradient(linear, right top, left top, from(#7b4397), to(#dc2430));
                background: linear-gradient(to left, #7b4397, #dc2430);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            section.cta .cta-content h2 {
                font-size: 50px;
                max-width: 450px;
                margin-top: 0;
                margin-bottom: 25px;
                color: white;
            }

            @media (min-width: 768px) {
                section.cta .cta-content h2 {
                    font-size: 80px;
                }
            }

            section.contact h2 {
                margin-top: 0;
                margin-bottom: 25px;
            }

            section.contact h2 i {
                color: #dd4b39;
            }

            section.contact ul.list-social li a {
                font-size: 40px;
                line-height: 80px;
                display: block;
                width: 80px;
                height: 80px;
                color: white;
                border-radius: 100%;
            }

            section.contact ul.list-social li.social-twitter a {
                background-color: #1da1f2;
            }

            section.contact ul.list-social li.social-twitter a:hover {
                background-color: #0d95e8;
            }

            section.contact ul.list-social li.social-facebook a {
                background-color: #3b5998;
            }

            section.contact ul.list-social li.social-facebook a:hover {
                background-color: #344e86;
            }

            section.contact ul.list-social li.social-google-plus a {
                background-color: #dd4b39;
            }

            section.contact ul.list-social li.social-google-plus a:hover {
                background-color: #d73925;
            }

            footer {
                padding: 25px 0;
                text-align: center;
                color: rgba(255, 255, 255, 0.3);
                background-color: #222222;
            }

            footer p {
                font-size: 12px;
                margin: 0;
            }

            footer ul {
                margin-bottom: 0;
            }

            footer ul li a {
                font-size: 12px;
                color: rgba(255, 255, 255, 0.3);
            }

            footer ul li a:hover, footer ul li a:focus, footer ul li a:active, footer ul li a.active {
                text-decoration: none;
            }

            .btn-outline {
                color: white;
                border: 1px solid;
                border-color: white;
            }

            .btn-outline:hover, .btn-outline:focus, .btn-outline:active, .btn-outline.active {
                color: white;
                border-color: #fdcc52;
                background-color: #fdcc52;
            }

            .btn {
                border-radius: 300px;
                font-family: 'Lato', 'Helvetica', 'Arial', 'sans-serif';
                letter-spacing: 2px;
                text-transform: uppercase;
            }

            .btn-xl {
                font-size: 11px;
                padding: 15px 45px;
            }

        </style>
        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
              rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

        <link rel="stylesheet" href="device-mockups/device-mockups.min.css">

        <title>ThankYou</title>

    </head>

    <body id="page-top">

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


    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-7 my-auto">
                    <div class="header-content mx-auto">
                        <h1 class="mb-5">Thank you for your order!</h1>
                        <a href="home.php" class="btn btn-outline btn-xl js-scroll-trigger">Continue Shopping?</a>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy;Idris Website 2018</p>
        </div>
    </footer>

    </body>

    </html>


    <?php
}
?>
