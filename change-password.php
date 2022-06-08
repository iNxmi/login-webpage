<?php

session_start();
include("php/functions.php");
$user_data = check_login();

$error = init($user_data);
function init($user_data)
{
    if ($_SERVER["REQUEST_METHOD"] != "POST")
        return;

    $new_password = prepare_input($_POST['new-password']);
    $new_password_repeat = prepare_input($_POST['new-password-repeat']);
    $password = prepare_input($_POST['password']);

    if (empty($new_password) or empty($new_password_repeat) or empty($password))
        return "Please fill out every field";

    $val_pass = validate_password($password);
    if ($val_pass != null)
        return $val_pass;

    if ($new_password != $new_password_repeat)
        return "Passwords don't match!";

    if (!password_verify($password, $user_data['password']))
        return "wrong password!";

    include("php/connection.php");
    $uuid = $user_data["uuid"];
    $password_hash = hash_password($new_password);
    $query = "UPDATE users SET password = '$password_hash' WHERE uuid = '$uuid'";
    mysqli_query($con, $query);

    header("Location: profile.php");

    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Change Password - <?php echo $user_data['username'] ?></title>
</head>

<body>
    <center>
        <h1>change password</h1>
        <hr>
        <form action="change-password.php" method="post">
            <input class="input-style-a" type="password" name="new-password" placeholder="new password">
            <br>
            <input class="input-style-a" type="password" name="new-password-repeat" placeholder="new password repeat">
            <br>
            <input class="input-style-a" type="password" name="password" placeholder="password">
            <br>
            <p style="color: red;"><?php echo $error ?></p>
            <br>
            <button class="button-style-a" type="submit">change</button>
        </form>
        <hr>
        <p>nami inc.</p>
    </center>
</body>

</html>