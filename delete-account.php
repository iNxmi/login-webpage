<?php

session_start();
include("php/functions.php");
$user_data = check_login();

$error = init($user_data);
function init($user_data)
{
    if ($_SERVER["REQUEST_METHOD"] != "POST")
        return;

    $password = prepare_input($_POST['password']);

    if (empty($password))
        return "Please fill out every field";

    if (!password_verify($password, $user_data['password']))
        return "wrong password!";

    include("php/connection.php");
    $uuid = $user_data["uuid"];
    $query = "DELETE FROM users WHERE uuid = '$uuid'";
    mysqli_query($con, $query);

    header("Location: logout.php");

    return;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Delete account - <?php echo $user_data['username'] ?></title>
</head>

<body>
    <center>
        <h1>delete account</h1>
        <hr>
        <form action="delete-account.php" method="post">
            <input class="input-style-a" type="password" name="password" placeholder="password">
            <br>
            <p style="color: red;"><?php echo $error ?></p>
            <br>
            <button class="button-style-a" type="submit">DELETE</button>
        </form>
        <hr>
        <p>nami inc.</p>
    </center>
</body>

</html>