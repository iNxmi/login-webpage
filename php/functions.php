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

function validate_username($username)
{
    if (strlen($username) < 3 or strlen($username) > 16)
        return "Username has to be 3-16 characters";

    if (str_contains($username, " "))
        return "There can't be spaces in your username";

    return;
}

function validate_password($password)
{
    if (strlen($password) < 6 or strlen($password) > 64)
        return "Password has to be 6-64 characters";

    if (str_contains($password, " "))
        return "There can't be spaces in your password";

    return;
}

function validate_email($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        return "E-Mail is invalid";

    return;
}

function prepare_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

function hash_password($password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}
