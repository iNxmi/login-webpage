<?php

function check_login()
{
    if (!isset($_SESSION['uuid'])) {
        header("Location: login.php");
        die();
    }

    $uuid = $_SESSION['uuid'];
    $query = "select * from users where uuid = '$uuid' limit 1";

    include("connection.php");

    $result = mysqli_query($con, $query);
    if (!$result)
        die();

    $user_data = mysqli_fetch_assoc($result);
    return $user_data;
}
