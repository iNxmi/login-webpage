<?php
session_start();

include("dist/php/functions.php");
include("dist/php/connection.php");

$user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/styles.css">
    <link rel="stylesheet" href="dist/css/form.css">

    <title>Welcome to Nami</title>
</head>

<body>
    <h1><?php echo $user_data['username'];   ?></h1>
</body>

</html>