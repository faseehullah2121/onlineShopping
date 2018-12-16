<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Products</title>
</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: ahtas
 * Date: 12/2/2018
 * Time: 1:26 AM
 */
require_once("connection.php");
session_start();
$count = 0;
if ($_SESSION['flag'] == false || $_SESSION['flag'] == null) {
    session_unset();
    session_destroy();
    header('Location: error.php');
} else {

//Add to Cart
    if (isset($_POST['submit'])) {

        $product_name = $_POST['p_name'];
        $product_id = $_POST['p_id'];
        $user_id = $_SESSION['userid'];

        $count = 0;
        $query1 = "select * from shoppingcart where userid = $user_id ";
        $result1 = mysqli_query($conn, $query1);
        if ($result1) {
            while ($row1 = mysqli_fetch_array($result1)) {
                $db_itemname = $row1['itemname'];
                if ($db_itemname == $product_name) {
                    $count++;
                }
            }
        }

        if ($count == 0) {
            setcookie($product_name, $product_id);
        }


    }
    ?>


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
                        <a class="nav-link" href="#">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactus.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-dark" style="margin-top: -7%" onclick="alert('First of all, Kindly save your cart to avoid any kind of inconvenience')">
                            <a class="nav-link" href="cart.php">View Cart</a>
                        </button>
                    </li>
                    <li>
                        <a class="nav-link" href="logoff.php" onclick="return confirm('Are you sure you want to Sign Out?')">Sign Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->

    <div class="container" style="margin-top: 5% ;">

        <div class="row">

            <?php

            $query = "select * from catalog";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                echo "no records:";
            } else {
                while ($row = mysqli_fetch_array($result)) {
                    $id = $row['itemid'];
                    $name = $row['itemname'];
                    $description = $row['itemdescription'];
                    $quantity = $row['itemquantity'];
                    $price = $row['itemprice'];
                    $img = $row['itempictpath'];

                    ?>

                    <div class="col-lg-4">
                        <div class="card mt-4">
                            <img class="card-img-top img-fluid" src="<?= $img ?>" alt="item_pic"
                                 style="width:100% ; height: 200px;">
                            <div class="card-body">
                                <h3 class="card-title"><?= $name ?></h3>
                                <h4><?= "Rs." . $price ?></h4>
                                <h5>Description:</h5>
                                <p class="card-text"><?= $description ?></p>
                                <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                                4.0 stars
                            </div>
                            <div class="card-footer">
                                <form action="products.php" method="post">
                                    <input type="hidden" name="p_id" value="<?= $id ?>">
                                    <input type="hidden" name="p_name" value="<?= $name ?>">
                                    <button class="btn btn-dark" name="submit" onclick="return confirm('Are you sure you want to add this product to your cart?')">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php

                }
            }
            ?>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy;Idris Website 2018</p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <?php
}

?>

</body>
</html>