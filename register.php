<?php
$error = init();

function init()
{
    if ($_SERVER["REQUEST_METHOD"] != "POST")
        return;

    include("php/functions.php");
    $username = prepare_input($_POST["username"]);
    $email = strtolower(prepare_input($_POST["email"]));
    $password = prepare_input($_POST["password"]);
    $password_repeat = prepare_input($_POST["password-repeat"]);

    if (empty($username) or empty($email) or empty($password) or empty($password_repeat))
        return "Please fill out every field";

    $val_usrn = validate_username($username);
    if ($val_usrn != null)
        return $val_usrn;

    $val_email = validate_email($email);
    if ($val_email != null)
        return $val_email;

    $val_pass = validate_password($password);
    if ($val_pass != null)
        return $val_pass;

    if ($password != $password_repeat)
        return "Passwords don't match";

    include("php/connection.php");

    $query = "select * from users where username = '$username'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
    if ($count != 0)
        return "Username is already in use";

    $query = "select * from users where email = '$email'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
    if ($count != 0)
        return "Email is already in use";

    $password_hash = hash_password($password);
    $uuid = md5(microtime(true));
    $query = "insert into users (uuid, username, email, password) values ('$uuid', '$username', '$email', '$password_hash')";
    mysqli_query($con, $query);

    header("Location: login.php");
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
    <link rel="stylesheet" href="css/form.css">

    <title>Register</title>
</head>

<body>
    <div class="form">
        <h1 class="title">Register</h1>
        <form action="register.php" method="post" autocomplete="off">
            <div class="row">
                <input class="input-style-a" name="username" type="text" placeholder="Username">
            </div>
            <div class="row">
                <input class="input-style-a" name="email" type="text" placeholder="E-Mail">
            </div>
            <div class="row">
                <input class="input-style-a" name="password" type="password" placeholder="Password">
            </div>
            <div class="row">
                <input class="input-style-a" name="password-repeat" type="password" placeholder="Repeat Password">
            </div>
            <p class="error"><?php echo $error ?></p>
            <div class="row">
                <button class="button-style-a button" type="submit">Register</button>
            </div>
        </form>
        <p class="redirect">Got an account? <a class="ahref-style-a" href="login.php">Login</a></p>
    </div>
</body>

</html>