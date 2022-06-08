<?php

session_start();
include("php/functions.php");
$user_data = check_login();

$command;
$output;
$retval = "0";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $command = trim($_POST["cmd"]);

    exec($command, $output, $retval);
    $output = implode("\n", $output);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/command.css">

    <title>Command</title>
</head>

<body>
    <center>
        <form action="command.php" method="post">
            <input class="input-style-a" name="cmd" type="text" placeholder="command">
            <button class="button-style-a" type="submit">Run</button>
        </form>
        <p>Command: '<?php echo $command; ?>'</p>
        <textarea class="textarea-style-a" name="console" id="console" cols="30" rows="10" readonly><?php echo $output ?></textarea>
        <p>Retval: <?php echo $retval; ?></p>
    </center>
</body>

</html>