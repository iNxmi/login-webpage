<?php

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "nami";

$con = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if(!$con)
    die("ERROR: Failed to connect to MySQL database!");

?>
