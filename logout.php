<?php

session_start();

unset($_SESSION['uuid']);

header("Location: login.php");

die();

?>