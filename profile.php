<?php

session_start();

include("php/functions.php");

$user_data = check_login();

$error = init();
function init()
{
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/profile.css">

    <title>Profile - <?php echo $user_data['username']; ?></title>
</head>

<body>
    <main>
        <p>UUID: <?php echo $user_data['uuid'] ?></p>
        <p>Username: <?php echo $user_data['username'] ?> <a href="change-username.php">change</a></p>
        <p>Email: <?php echo $user_data['email'] ?> <a href="change-email.php">change</a></p>
        <p>Password: <?php echo $user_data['password'] ?> <a href="change-password.php">change</a></p>
        <p>Creation-Date: <?php echo $user_data['creation_date'] ?></p>
        <p>PFP: <a href="change-pfp.php">change</a></p>
        <?php

        if (file_exists("userdata/pfp/" . $user_data['uuid'] . ".jpg"))
            echo "penis";
        else
            echo "not penis";

        ?>
        <br>
        <a style="color: red;" href="logout.php">log out</a>
        <br><br><br><br>
        <a style="color: red;" href="delete-account.php">delete account</a>
    </main>
</body>

</html>