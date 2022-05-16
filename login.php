<?php

$error = init();

function init()
{
    include("dist/php/connection.php");

    if ($_SERVER["REQUEST_METHOD"] != "POST")
        return;

    $email = prepare_input($_POST["email"]);
    $password = prepare_input($_POST["password"]);

    if (empty($email) or empty($password))
        return "Please fill out every field";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        return "E-Mail is invalid";

    $query = "select * from users where email = '$email'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
    if ($count == 0)
        return "Email and password doesn't match";

    $data = mysqli_fetch_assoc($result);
    if ($data['password'] != $password)
        return "Email and password doesn't match";

    return;
}

function prepare_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/styles.css">
    <link rel="stylesheet" href="dist/css/form.css">

    <title>Login</title>
</head>

<body>
    <div class="form">
        <h1 class="title">Login</h1>
        <form action="login.php" method="post" autocomplete="off">
            <div class="row">
                <input class="input-style-a" name="email" type="email" placeholder="E-Mail">
            </div>
            <div class="row">
                <input class="input-style-a" name="password" type="password" placeholder="Password">
            </div>
            <p class="error"> <?php echo $error ?></p>
            <div class="row">
                <button class="button-style-a button" type="submit">Login</button>
            </div>
        </form>
        <p class="redirect">No Account? <a class="ahref-style-a" href="register.php">Register</a></p>
    </div>
</body>

<script src="js/login.js"></script>

</html>