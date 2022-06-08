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
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/navbar.css">

    <script src="https://kit.fontawesome.com/8be160c30c.js" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>

    <title>Welcome to Nami</title>
</head>

<body>

    <!-- LOGOUT MODAL -->
    <!-- <div id="logout-modal" class="modal">
        <div class="modal-content">
            <h2 class="title">Logout</h2>
            <p>Do you really want to log out?</p>
            <button class="button-style-a">Log Out</button>
            <button class="button-style-b">Abort</button>
        </div>
    </div> -->

    <div id="secret">
        <video id="background-video" src="videos/index-background-video.mp4" mute loop></video>
    </div>

    <header>
        <nav class="navbar">
            <a href="index.php"><i class="fa-solid fa-house"></i></a>
            <a href="projects.php">Projects</a>
            <a href="#">Contact</a>
            <a href="about.php">About</a>
            <a href="command.php">Command</a>
            <div class="navbar-right">
                <a href="profile.php"><i class="fa-solid fa-user"></i> <?php echo $user_data['username'] ?></a>
            </div>
        </nav>
    </header>

    <main>

    </main>

    <footer>

    </footer>
</body>

</html>