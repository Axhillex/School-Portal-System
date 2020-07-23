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
				$_SESSION['status']="sucess";
				header('location:home.php');
				exit();
			}
			else
			{
				$_SESSION['status']="error";
				$_SESSION['error']=die(mysqli_error($con));
				header('location:student_register.php');
				exit();
			}		
		} 	
		else 
		{  
			echo "Sorry, there was a problem uploading your file."; 
		} 
	} 
	else
	{
		echo "File is not an image.";
		header('Location:student_register.php');
		exit();
    }
	
}
elseif(isset($_POST['submit_tch']))
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
				$_SESSION['status']="sucess";
				header('location:home.php');
				exit();
			}
			else
			{
				$_SESSION['status']="error";
				$_SESSION['error']=die(mysqli_error($con));
				session_destroy();
				header('location:teacher_register.php');
				exit();
			}		
		} 	
		else 
		{  
			echo "Sorry, there was a problem uploading your file."; 
		} 
	} 
	else
	{
        echo "File is not an image.";
		header('Location:teacher_register.php');
		exit();
    }
	
}
else
{
	$check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check !== false) {
   	 	$insertQuery="insert into user_data(Name,Address,Phonenumber,Username,Password,Role_type) values('$name','$address','$phonenumber','$username','$password','adm')";
		if(move_uploaded_file($_FILES['photo']['tmp_name'], $target)) 
		{ 
			$result=mysqli_query($con,$insertQuery);
			if($result)
			{
				$_SESSION['status']="sucess";
				header('location:home.php');
				exit();
			}
			else
			{
				$_SESSION['status']="error";
				$_SESSION['error']=die(mysqli_error($con));
				session_destroy();
				header('location:admin_register.php');
				exit();
			}		
		} 	
		else 
		{  
			echo "Sorry, there was a problem uploading your file."; 
		} 
	} else {
        echo "File is not an image.";
		header('Location:admin_register.php');
		exit();
    }
}
mysqli_close($con);
session_destroy();
?>
