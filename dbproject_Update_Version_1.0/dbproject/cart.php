<?php

require_once("connection.php");
session_start();
if ($_SESSION['flag'] == false || $_SESSION['flag'] == null)
{
    session_unset();
    session_destroy();
    header('Location: error.php');
}
else{
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
    <script src="cart.js"></script>
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

    </style>

    <title>Cart</title>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Your Cart</a>
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
                    <a class="nav-link" href="cart.php?save_cart=<?= 1 ?>" onclick="return confirm('Are you sure you want to save your cart?')">Save
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="checkout.php" onclick="return confirm('Are you sure you want to checkout?')">Check out
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="logoff.php" onclick="return confirm('Are you sure you want to Sign Out?')">Sign Out</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<h1>.</h1>

<p>.</p>
<p>.</p>

<?php
if (isset($_REQUEST['del'])) {
    echo "in del";
    echo $itemname = $_REQUEST['itemname'];
    $user_id = $_SESSION['userid'];

    setcookie($itemname, "");
    $query = "delete from shoppingcart where itemname = '$itemname' AND userid = $user_id";
    $result = mysqli_query($conn, $query);
    header("location:cart.php");
}

if (isset($_GET['save_cart'])) {
    $user_id = $_SESSION['userid'];

    foreach ($_COOKIE as $key => $val) {
        $itemid = $val;
        $itemquantity = 1;
        $query11 = "select * from catalog where itemid = $itemid";
        $result11 = mysqli_query($conn, $query11);
        if ($result11) {
            while ($row1 = mysqli_fetch_array($result11)) {
                $itemname = $row1['itemname'];
                $itemprice = $row1['itemprice'];

                $count = 0;
                $query11 = "select * from shoppingcart ";
                $result11 = mysqli_query($conn, $query11);
                if ($result11) {
                    while ($row11 = mysqli_fetch_array($result11)) {
                        $db_itemname = $row11['itemname'];
                        $db_userid = $row11['userid'];


                        if ($itemname == $db_itemname && $user_id == $db_userid) {
                            $count++;
                        }
                    }//end_while
                }
                if ($count == 0) {
                    $query2 = "insert into shoppingcart values ('$user_id','$itemname','$itemquantity','$itemprice')";
                    $result2 = mysqli_query($conn, $query2);
                    setcookie($itemname, "");

                }


            }//end_while
        }
    }//end_foreach

    ?>

    <table class="table table-bordered table-dark">
        <thead class="bg-dark">
        <tr>

            <td>
                Item Name
            </td>
            <td>
                Item Quantity
            </td>
            <td>
                Price
            </td>
            <td>
                Subtotal
            </td>
            <td>
                Change Quantity
            </td>
            <td>

            </td>

        </tr>
        </thead>
        <?php
        $user_id = $_SESSION['userid'];
        $count = 0;

        $query11 = "select * from shoppingcart where userid = $user_id";
        $result11 = mysqli_query($conn, $query11);
        if ($result11) {
            while ($row11 = mysqli_fetch_array($result11)) {
                $name = $row11['itemname'];
                $qty = $row11['itemqty'];
                $price = $row11['itemprice']; ?>
                <tr>

                    <td>
                        <?= $name ?>
                    </td>

                    <td id="qty<?= $count ?>">
                        <?= $qty; ?>

                    </td>

                    <td>
                        <?= $price ?>
                    </td>

                    <td id="price<?= $count ?>">
                        <?= $price ?>
                    </td>

                    <td>
                        <button onclick="itemadded('qty'+<?= $count ?>,'price'+<?= $count ?>,<?= $price ?>)">+</button>
                        <button onclick="itemdeleted('qty'+<?= $count ?>,'price'+<?= $count ?>,<?= $price ?>)"
                                style="padding-left: 4%;padding-right: 4%;">-
                        </button>
                    </td>
                    <td>
                        <form action="cart.php" method="post">
                            <input type="hidden" name="itemname" value="<?= $name ?>">
                            <button name="del" value="del">Delete</button>
                        </form>
                    </td>
                </tr>
                </tbody>
                <?php $count++;
            }//end_while
        }
        ?>

    </table>

    <?php

}//end_main_if

else {

    ?>
    <table class="table table-bordered table-dark">
        <thead class="bg-dark">
        <tr>

            <td>
                Item Name
            </td>
            <td>
                Item Quantity
            </td>
            <td>
                Price
            </td>
            <td>
                Subtotal
            </td>
            <td>
                Change Quantity
            </td>
            <td>

            </td>

        </tr>
        </thead>

        <?php
        $user_id = $_SESSION['userid'];

        $count = 0;

        foreach ($_COOKIE

                 as $k => $v) {
        $count++;

        $itemid = $v;
        $itemquantity = $v;
        $query1 = "select * from catalog where itemid = $itemid";
        $result1 = mysqli_query($conn, $query1);

        if ($result1)
        while ($row1 = mysqli_fetch_array($result1)){
        $itemname = $row1['itemname'];
        $itemprice = $row1['itemprice'];

        $query01 = "select * from shoppingcart ";
        $result01 = mysqli_query($conn, $query01);
        $row01 = mysqli_fetch_array($result01);
        $qty = $row01['itemqty'];

        ?>

        <tbody>
        <tr>

            <td>
                <?= $itemname ?>

            </td>
            <td id="qty<?= $count ?>">
                <?= $qty; ?>

            </td>
            <td>
                <?= $itemprice ?>
            </td>
            <td id="price<?= $count ?>">
                <?= $itemprice ?>
            </td>
            <td>
                <button onclick="itemadded('qty'+<?= $count ?>,'price'+<?= $count ?>,<?= $itemprice ?>)">+</button>
                <button onclick="itemdeleted('qty'+<?= $count ?>,'price'+<?= $count ?>,<?= $itemprice ?>)"
                        style="padding-left: 4%;padding-right: 4%;">-
                </button>
            </td>
            <td>
                <form action="cart.php" method="post">
                    <input type="hidden" name="itemname" value="<?= $itemname ?>">
                    <button name="del" value="del">Delete</button>
                </form>
            </td>

        </tr>


        <?php
        }//end_while

        }//end_Foreach


        $user_id = $_SESSION['userid'];
        $count = 0;

        $query11 = "select * from shoppingcart where userid = $user_id";
        $result11 = mysqli_query($conn, $query11);
        if ($result11) {
        while ($row11 = mysqli_fetch_array($result11)) {
        $name = $row11['itemname'];
        $qty = $row11['itemqty'];
        $price = $row11['itemprice']; ?>
        <tr>

            <td>
                <?= $name ?>
            </td>

            <td id="qty<?= $count ?>">
                <?= $qty; ?>

            </td>

            <td>
                <?= $price ?>
            </td>

            <td id="price<?= $count ?>">
                <?= $price ?>
            </td>

            <td>
                <button onclick="itemadded('qty'+<?= $count ?>,'price'+<?= $count ?>,<?= $price ?>)">+</button>
                <button onclick="itemdeleted('qty'+<?= $count ?>,'price'+<?= $count ?>,<?= $price ?>)"
                        style="padding-left: 4%;padding-right: 4%;">-
                </button>
            </td>
            <td>
                <form action="cart.php" method="post">
                    <input type="hidden" name="itemname" value="<?= $name ?>">
                    <button name="del" value="del">Delete</button>
                </form>
            </td>
        </tr>
        </tbody>
    <?php
    $count++;
    }//end_while

    }

    ?>

    </table>

    <!-- Footer -->
    <footer class="py-5 bg-dark" style="margin-top: 15%">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy;Idris Website 2018</p>
        </div>
    </footer>

    <?php
}
}
?>


</body>
</html>
