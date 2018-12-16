<?php
/**
 * Created by PhpStorm.
 * User: ahtas
 * Date: 12/1/2018
 * Time: 2:50 AM
 */

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Document</title>
    <style>
        .login-page {
            width: 360px;
            padding: 8% 0 0;
            margin: auto;
        }

        .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        .form input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .form button {
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #4CAF50;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            /*-webkit-transition: all 0.3 ease;*/
            /*transition: all 0.3 ease;*/
            cursor: pointer;
        }

        .form button:hover, .form button:active, .form button:focus {
            background: #43A047;
        }

        .form .message {
            margin: 15px 0 0;
            color: #b3b3b3;
            font-size: 12px;
        }

        .form .message a {
            color: #4CAF50;
            text-decoration: none;
        }

        .form .register-form {
            display: none;
        }

        .container {
            position: relative;
            z-index: 1;
            max-width: 300px;
            margin: 0 auto;
        }

        .container:before, .container:after {
            content: "";
            display: block;
            clear: both;
        }

        .container .info {
            margin: 50px auto;
            text-align: center;
        }

        .container .info h1 {
            margin: 0 0 15px;
            padding: 0;
            font-size: 36px;
            font-weight: 300;
            color: #1a1a1a;
        }

        .container .info span {
            color: #4d4d4d;
            font-size: 12px;
        }

        .container .info span a {
            color: #000000;
            text-decoration: none;
        }

        .container .info span .fa {
            color: #EF3B3A;
        }

        body {
            background: #4d4d4d; /* fallback for old browsers */
            /*background: -webkit-linear-gradient(right, black);*/
            /*background: -moz-linear-gradient(right, black);*/
            /*background: -o-linear-gradient(right, black);*/
            /*background: linear-gradient(to left, black);*/
            font-family: "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>
    <title>Login Page</title>
</head>
<body>

<?php
require_once("connection.php");
session_start();

if (isset($_REQUEST['submit'])) {
    $login_username = $_REQUEST['username'];
    $login_password = $_REQUEST['password'];

    $query = "select * from login";
    $result = mysqli_query($conn, $query);

    $count = 0;
    if (!$result) {
        echo "no records:";
    } else {
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $username = $row['username'];
            $password = $row['password'];


            if ($login_username != $username || $login_password != $password) {
                $count++;

            } else {
                $_SESSION["userid"] = $id;
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;
                $_SESSION["flag"] = true;
                header("location:home.php");
            }
        }//end_while

        if ($count != 0) {
            echo "invalid";

            ?>


            <nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top" style="margin-bottom: 10%">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarResponsive"
                            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="home.php">Invalid username or password
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <?php
        }
    }


}

?>

<div class="container" style="margin-top: 5%">
    <div class="login-page">
        <div class="form">
            <form class="login-form">
                <input type="text" name="username" placeholder="username"/>
                <input type="password" name="password" placeholder="password"/>
                <button style="background-color: #4d4d4d" type="submit" name="submit" onclick="alert('Logging In')">
                    Login
                </button>
                <br>
                <br>
                <p>Click <a href="registration.php">here</a> to register yourself </p>
            </form>
        </div>
    </div>
</div>

</body>
</html>



