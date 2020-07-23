<?php
session_start();
require('DatabaseConnectivity.php');

$id=$_GET['id'];
$imageName = mysqli_fetch_assoc(mysqli_query($con,"SELECT Photo FROM user_data where ID=$id"));
$img =$imageName["Photo"];
$deleteQuery = "DELETE FROM user_data WHERE ID=$id";
$result=mysqli_query($con,$deleteQuery);
if($result)
	{
		if($img)
		{
			unlink("Uploads/$img");
		}
		header('location:admin.php');
		echo "Data deleted successfully.";
		exit();
	}
	else
	{
		die("Deletion of value was unsuccessful.".mysqli_error($con));
	}
mysqli_close($con);
session_destroy();
?>
