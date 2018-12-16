<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>SignUp</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: ahtas
 * Date: 12/1/2018
 * Time: 2:39 AM
 */
require_once("connection.php");

if (isset($_POST['submit'])) {
    //Checking for duplicate ID or UserName

    $query = "select id from login";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    if (!isset($row['id'])) {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        $query = "insert into login values ('$id','$username','$password','$firstname','$lastname')";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo "ERROR!!" . mysqli_error($conn);
        } else {
            header("location:login.php");
        }

    } else {
        $query1 = "select * from login";
        $result1 = mysqli_query($conn, $query1);
        while ($row1 = mysqli_fetch_array($result1)) {

            $id = $row1['id'];
            $username = $row1['username'];
            if ($id == $_POST['id']) {
                echo "<h2>Error:This id already exists</h2>";
                ?>


                <div class="card" style="border: 1px solid black ; margin-left: 200px ; margin-right: 200px">
                    <div class="card-body">
                        <form action="register.php" method="POST">
                            <h1 style="text-align: center">Registration Form</h1>
                            <br>
                            ID:<br> <input type="number" name="id" placeholder="Enter ID...." class="form-control"> <br>
                            UserName:<br> <input type="text" name="username" value="<?= $_POST['username']; ?>"
                                                 placeholder="Enter UserName...." class="form-control"> <br>
                            Password:<br> <input type="password" name="password" value="<?= $_POST['password']; ?>"
                                                 placeholder="Enter Password...." class="form-control"> <br>
                            First Name:<br> <input type="text" name="firstname" value="<?= $_POST['firstname']; ?>"
                                                   placeholder="Enter First Name...." class="form-control"> <br>
                            Last Name:<br> <input type="text" name="lastname" value="<?= $_POST['lastname']; ?>"
                                                  placeholder="Enter Last Name(optional)...." class="form-control"> <br>
                            <br>
                            <button type="submit" name="submit" value="submit" class="btn btn-dark" style="float: left">
                                Sumbit
                            </button>
                            <p style="float: right">Click <a href="login.php">here</a> to login yourself</p>
                        </form>
                    </div>
                </div>


                <?php

                break;
            } elseif ($username == $_POST['username']) {
                echo "<h2>Error:This username already exists</h2>";
                ?>


                <div class="card" style="border: 1px solid black ; margin-left: 200px ; margin-right: 200px">
                    <div class="card-body">
                        <form action="register.php" method="POST">
                            <h1 style="text-align: center">Registration Form</h1>
                            <br>
                            ID:<br> <input type="number" name="id" value="<?= $_POST['id']; ?>"
                                           placeholder="Enter ID...." class="form-control"> <br>
                            UserName:<br> <input type="text" name="username" placeholder="Enter UserName...."
                                                 class="form-control"> <br>
                            Password:<br> <input type="password" name="password" value="<?= $_POST['password']; ?>"
                                                 placeholder="Enter Password...." class="form-control"> <br>
                            First Name:<br> <input type="text" name="firstname" value="<?= $_POST['firstname']; ?>"
                                                   placeholder="Enter First Name...." class="form-control"> <br>
                            Last Name:<br> <input type="text" name="lastname" value="<?= $_POST['lastname']; ?>"
                                                  placeholder="Enter Last Name(optional)...." class="form-control"> <br>
                            <br>
                            <button type="submit" name="submit" value="submit" class="btn btn-dark" style="float: left">
                                Sumbit
                            </button>
                            <p style="float: right">Click <a href="login.php">here</a> to login yourself</p>
                        </form>
                    </div>
                </div>


                <?php
                break;
            } else {
                $id = $_POST['id'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];

                $query = "insert into login values ('$id','$username','$password','$firstname','$lastname')";
                $result = mysqli_query($conn, $query);
                if (!$result) {
                    echo "ERROR!!" . mysqli_error($conn);
                } else {
                    header("location:login.php");
                }

            }

        }
    }

}

?>
</body>
</html>