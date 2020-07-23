<?php
session_start();
require('Databaseconnectivity.php');

$name=$_POST['name'];
$address=$_POST['address'];
$phonenumber=$_POST['phonenumber'];
$username=$_POST['username'];
$password=md5($_POST['password']);
$currentDirectory=getcwd();
$uploadDirectory="Uploads/";
$target = $uploadDirectory . basename( $_FILES['photo']['name']); 
$pic = ($_FILES['photo']["name"]);
$imageFileType = strtolower(pathinfo($pic,PATHINFO_EXTENSION));

if(isset($_POST['submit_std']))
{
	$check = getimagesize($_FILES['photo']["tmp_name"]);
	if($check !== false) 
	{
		$course=$_POST['course'];
		$insertQuery="insert into user_data(Name, Address, Phonenumber, Photo, Course, Username, Password, Role_Type) values('$name','$address','$phonenumber','$pic','$course','$username','$password','std')";
		if(move_uploaded_file($_FILES['photo']['tmp_name'], $target)) 
		{ 
			$result=mysqli_query($con,$insertQuery);
			if($result)
			{
				header('location:admin.php');
				exit();
			}
			else
			{
				$_SESSION['imger'] ="Sorry, there was a problem uploading your file."; 
				header('location:admin.php');
				exit();
			}		
		} 	
		else 
		{  
			$_SESSION['imger'] ="Sorry, there was a problem uploading your file."; 
		} 
	} 
	else
	{
		$_SESSION['imger'] ="File is not an image.";
		header('Location:admin.php');
		exit();
    }
	
}
else
{
	$check = getimagesize($_FILES["photo"]["tmp_name"]);
	if($check !== false)
	{
		$department=$_POST['department'];
		$salary=$_POST['salary'];
		$insertQuery="insert into user_data (Name,Address,Phonenumber,Photo,Salary,Department,Username,Password,Role_Type) values('$name','$address','$phonenumber','$pic','$salary','$department','$username','$password','tch')";
		if(move_uploaded_file($_FILES['photo']['tmp_name'], $target)) 
		{ 
			$result=mysqli_query($con,$insertQuery);
			if($result)
			{
				header('location:admin.php');
				exit();
			}
			else
				{$_SESSION['imger'] ="Sorry, there was a problem uploading your file."; 
				session_destroy();
				header('location:admin.php');
				exit();
			}		
		} 	
		else 
		{  
			$_SESSION['imger'] ="Sorry, there was a problem uploading your file."; 
		} 
	} 
	else
	{
        $_SESSION['imger'] ="File is not an image.";
		header('Location:admin.php');
		exit();
    }
	
}
mysqli_close($con);
session_destroy();
?>