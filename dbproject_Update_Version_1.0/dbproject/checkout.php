<?php

include "connection.php";
session_start();
$user_id = $_SESSION['userid'];

$sql = "select * from shoppingcart where userid = $user_id";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Query failed" . mysqli_error($connection));
}

$total = 0;
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

    <style>
        thead {
            /*background-color: black;*/
        }

        a {
            color: white;
        }

        a:hover {
            color: #EF3B3A;
            text-decoration: none;
        }

        button {
            background-color: black;
            color: white;
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

        .back a {
            color: #444444;
            font-size: 13px;
            text-decoration: none;
        }

    </style>

    <title>Checkout</title>
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
                    <a class="nav-link" href="checkout.php?id=<?= 1 ?>">Add Shipping Details</a>
                </li>
                <li>
                    <a class="nav-link" href="logoff.php" onclick="return confirm('Are you sure you want to Sign Out?')">Sign Out</a>
                </li>


            </ul>
        </div>
    </div>
</nav>

<?php
if (isset($_GET['id'])) {
    ?>

    <br><br><br>
    <div class="container">
        <h1>Shipping Information</h1>
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <p>Please enter your information</p>
                </div>
                <form id="Login" action="thankyou.php">

                    <div class="form-group">
                        <input type="name" class="form-control" id="inputname" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="inputNumber" placeholder="PhoneNumber" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email Address" required>
                    </div>

                    <div class="form-group">
                        <div style="height: 100px">
                            <textarea class="form-control" id="address" name="address"
                                      placeholder="Please enter your complete address here..." rows="15"
                                      style="height: 100px" required></textarea>
                        </div>
                    </div>
                    <button class="btn btn-dark">Submit</button>

                </form>
            </div>
        </div>
    </div>

    <?php
} else {
    ?>

    <table class="table table-bordered table-dark" style="margin-top: 10% ;">
        <thead class="bg-dark">
        <tr>
            <td>
                UserID
            </td>
            <td>
                Item Name
            </td>
            <td>
                Item Quantity
            </td>
            <td>
                Item Price
            </td>
            <td>
                Subtotal
            </td>


        </tr>
        </thead>
        <?php
        while ($row = mysqli_fetch_array($result)) {

        $userid = $row["userid"];
        $itemname = $row["itemname"];
        $itemqty = $row["itemqty"];
        $itemprice = $row["itemprice"];

        ?>
        <tr>
            <td>
                <?php echo "$userid"; ?>
            </td>
            <td>
                <?php echo "$itemname"; ?>
            </td>

            <td>
                <?php echo "$itemqty"; ?>

            </td>

            <td>
                <?php echo "$itemprice"; ?>
            </td>

            <td>
                <?php
                $subtotal = $itemqty * $itemprice;
                $total = $total + $subtotal;
                echo $subtotal;
                ?>
            </td>

            <?php
            }
            ?>

            </td>
        </tr>
        </tbody>

    </table>
    <?php
    $tax = $total * 0.05;

    ?>
    <h2 style="font-family: 'Calibri Light'">Total: $<?php echo $total; ?></h2>
    <h2 style="font-family: 'Calibri Light'">Tax for your cart: $<?php echo $tax; ?></h2>
    <h2 style="font-family: 'Calibri Light'">Grand-Total(tax included): $<?php echo $total + $tax; ?></h2>


    <?php
}
?>

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy;Idris Website 2018</p>
    </div>
</footer>

</body>
</html>
