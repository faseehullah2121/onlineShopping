<?php
/**
 * Created by PhpStorm.
 * User: ahtas
 * Date: 12/6/2018
 * Time: 2:24 AM
 */
require_once("connection.php");
if (isset($_REQUEST['del'])) {
    echo "in del";
    echo $itemname = $_REQUEST['itemname'];
    setcookie($itemname, "");
    $query = "delete from shoppingcart where itemname = '$itemname'";
    $result = mysqli_query($conn, $query);
    header("location:cart.php?save_cart=1");
}