<?php

session_start();
include("php/functions.php");
$user_data = check_login();

$error = init($user_data);
function init($user_data)
{
    if ($_SERVER["REQUEST_METHOD"] != "POST")
        return;

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
    <title>Change PFP - <?php echo $user_data['username'] ?></title>
</head>

<body>
    <center>
        <form action="change-pfp.php" method="post">
            <input class="input-style-a"type="file">
            <br>
            <input class="input-style-a"type="password" placeholder="password">
            <p style="color: red;"><?php echo $error ?></p>
            <br>
            <button class="button-style-a" type="submit">Submit</button>
        </form>
    </center>
</body>

</html>