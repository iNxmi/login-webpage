<?php

session_start();
include("php/functions.php");
$user_data = check_login();

$error = init($user_data);
function init($user_data)
{
    if ($_SERVER["REQUEST_METHOD"] != "POST")
        return;

    $new_username = prepare_input($_POST['new-username']);
    $password = prepare_input($_POST['password']);

    if (empty($new_username) or empty($password))
        return "Please fill out every field";

    $val_usrn = validate_username($new_username);
    if ($val_usrn != null)
        return $val_usrn;

    include("php/connection.php");
    $query = "select * from users where username = '$new_username'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
    if ($count != 0)
        return "Username is already in use";

    if (!password_verify($password, $user_data['password']))
        return "wrong password!";

    $uuid = $user_data["uuid"];
    $query = "UPDATE users SET username = '$new_username' WHERE uuid = '$uuid'";
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
    <title>Change Username - <?php echo $user_data['username'] ?></title>
</head>

<body>
    <center>
        <h1>change username</h1>
        <hr>
        <form action="change-username.php" method="post">
            <input class="input-style-a" type="text" name="new-username" placeholder="new username">
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