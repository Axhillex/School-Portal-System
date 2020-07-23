<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
header("Location:home.php");
session_destroy();
exit;
?>