<?php
/**
 * Created by PhpStorm.
 * User: ahtas
 * Date: 12/1/2018
 * Time: 2:27 AM
 */
$server_name = "localhost";
$DB_User = "root";
$DB_Password = "";
$DB_Name = "dbproject";
$conn = mysqli_connect($server_name, $DB_User, $DB_Password, $DB_Name);
if (!$conn) {
    die("Connection Failed!" . mysqli_connect_error());
} else {
//    echo "Connected Successfully:";
}

?>