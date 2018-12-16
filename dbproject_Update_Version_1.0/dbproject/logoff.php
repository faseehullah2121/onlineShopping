<?php
/**
 * Created by PhpStorm.
 * User: ahtas
 * Date: 12/1/2018
 * Time: 11:35 PM
 */

require_once("connection.php");
session_start();

echo "<br>userid=>" . $user_id = $_SESSION['userid'];

foreach ($_COOKIE as $key => $val) {
    echo "<br>itemid=>" . $itemid = $val;
    $itemquantity = 1;
    $query11 = "select * from catalog where itemid = $itemid";
    $result11 = mysqli_query($conn, $query11);
    if ($result11) {
        while ($row1 = mysqli_fetch_array($result11)) {
            echo "<br>itemname=>" . $itemname = $row1['itemname'];
            echo "<br>itemprice=>" . $itemprice = $row1['itemprice'];

            $count = 0;
            $query11 = "select * from shoppingcart where userid = $user_id ";
            $result11 = mysqli_query($conn, $query11);
            if ($result11) {
                while ($row11 = mysqli_fetch_array($result11)) {
                    echo "<br>db_itemname=>" . $db_itemname = $row11['itemname'];
                    echo "<br>db_userid=>" . $db_userid = $row11['userid'];


                    if ($itemname == $db_itemname && $user_id == $db_userid) {
                        $count++;
                    }
                }//end_while
            }
            if ($count == 0) {
                $query2 = "insert into shoppingcart values ('$user_id','$itemname','$itemquantity','$itemprice')";
                $result2 = mysqli_query($conn, $query2);
            }

        }//end_while
    }
}//end_foreach

session_destroy();
foreach ($_COOKIE as $key => $val) {
    setcookie($key, "");
}
header("location:login.php");