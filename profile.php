<?php

session_start();

include("php/connection.php");
include("php/functions.php");

$user_data = check_login($con);

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
        <div class="change-information">
            <div class="form">
                <h2 class="title">Username</h2>
                <form action="profile.php" method="post" autocomplete="off">
                    <div>
                        <input class="input-style-a" name="new-username" type="text" placeholder="New Username">
                    </div>
                    <div>
                        <input class="input-style-a" name="password" type="password" placeholder="Password">
                    </div>
                    <input name="type" type="hidden" value="username">
                    <div>
                        <button class="button-style-a button" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="form">
                <h2 class="title">E-Mail</h2>
                <form action="profile.php" method="post" autocomplete="off">
                    <div>
                        <input class="input-style-a" name="new-email" type="text" placeholder="New E-Mail">
                    </div>
                    <div>
                        <input class="input-style-a" name="password" type="password" placeholder="Password">
                    </div>
                    <input name="type" type="hidden" value="email">
                    <div>
                        <button class="button-style-a button" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="form">
                <h2 class="title">Password</h2>
                <form action="profile.php" method="post" autocomplete="off">
                    <div>
                        <input class="input-style-a" name="new-password" type="text" placeholder="New Password">
                    </div>
                    <div>
                        <input class="input-style-a" name="new-password" type="text" placeholder="New Password-Repeat">
                    </div>
                    <div>
                        <input class="input-style-a" name="password" type="password" placeholder="Current Password">
                    </div>
                    <input name="type" type="hidden" value="password">
                    <div>
                        <button class="button-style-a button" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>