<?php
///**
// * Created by PhpStorm.
// * User: ahtas
// * Date: 12/1/2018
// * Time: 2:27 AM
// */
require_once("connection.php");

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

    <title>Registration</title>
</head>
<body>

<div class="card" style="border: 1px solid black ; margin-left: 200px ; margin-right: 200px">
    <div class="card-body">
        <form action="register.php" method="POST">
            <h1 style="text-align: center">Registration Form</h1>
            <br>
            ID:<br> <input type="number" name="id" placeholder="Enter ID...." class="form-control" required> <br>
            UserName:<br> <input type="text" name="username" placeholder="Enter UserName...." class="form-control"
                                 required> <br>
            Password:<br> <input type="password" name="password" placeholder="Enter Password...." class="form-control"
                                 required> <br>
            First Name:<br> <input type="text" name="firstname" placeholder="Enter First Name...." class="form-control"
                                   required> <br>
            Last Name:<br> <input type="text" name="lastname" placeholder="Enter Last Name(optional)...."
                                  class="form-control"> <br>
            <br>
            <button type="submit" name="submit" value="submit" class="btn btn-dark" style="float: left">Sumbit</button>
            <p style="float: right">Click <a href="login.php">here</a> to login yourself</p>
        </form>
    </div>
</div>

</body>
</html>
