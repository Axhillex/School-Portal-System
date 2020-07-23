<?php
$hostname="localhost";
$username="root";
$password="";
$con=mysqli_connect($hostname,$username,$password);

$selectDb=mysqli_select_db($con,"portal_project");
?>