<?php

session_start();
include("php/functions.php");
$user_data = check_login();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/about.css">

    <title>About</title>
</head>

<body>
    <center>
        <div class="chapter" id="epilogue">
            <h1 class="title">Epilogue</h1>
            <p class="dialogue-left">oh, hello there! my name is <a class="name" href="#">memphis</a></p>
            <p class="dialogue-right">hey! i am <?php echo $user_data['username']; ?></p>
        </div>
        <img src="images/memphis/<?php echo rand(0, 4) ?>.jpg" alt="png">
    </center>
</body>

</html>