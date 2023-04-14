<?php

include "loggers.php";
session_start();
unset($_SESSION['LoginUser']);
session_destroy();
header("location:../login/login.php");

// $log = "User ($_SESSION'$username']) Loged out in to their account succesfull";
// logger($log);
?>