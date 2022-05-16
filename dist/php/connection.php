<?php

$db_host = "localhost";
$db_user = "web381";
$db_password = "GVVvczzl";
$db_name = "usr_web381_2";

$con = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if(!$con)
    die("ERROR: Failed to connect to MySQL database!");

?>
