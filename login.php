<?php
session_start();

$error = init();
function init()
{
    if ($_SERVER["REQUEST_METHOD"] != "POST")
        return;

    $nOm = strtolower(prepare_input($_POST["email"]));
    $password = hash("sha256", prepare_input($_POST["password"]));

    if (empty($nOm) or empty($password))
        return "Please fill out every field";

    if (filter_var($nOm, FILTER_VALIDATE_EMAIL))
        $query = "select * from users where email = '$nOm' limit 1";
    else
        $query = "select * from users where username = '$nOm' limit 1";

    include("php/connection.php");

    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
    if ($count == 0)
        return "Email and password doesn't match";

    $user_data = mysqli_fetch_assoc($result);
    if ($user_data['password'] != $password)
        return "Email and password doesn't match";

    $_SESSION['uuid'] = $user_data['uuid'];
    header("Location: index.php");
    die();
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
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/form.css">

    <title>Login</title>
</head>

<body>
    <div class="form">
        <h1 class="title">Login</h1>
        <form action="login.php" method="post" autocomplete="off">
            <div class="row">
                <input class="input-style-a" name="email" type="text" placeholder="Username or E-Mail">
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

</html>