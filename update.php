<?php
session_start();
require('Databaseconnectivity.php');

$id=$_SESSION["id"];
$name=$_POST['name'];
$address=$_POST['address'];
$phonenumber=$_POST['phonenumber'];
$username=$_POST['username'];
$uploadDirectory="Uploads/";
$imageName = mysqli_fetch_assoc(mysqli_query($con,"SELECT Photo FROM user_data where ID=$id"));
$img =$imageName["Photo"];
$target = $uploadDirectory . basename( $_FILES['photo']['name']); 
$pic = ($_FILES['photo']["name"]);
$imageFileType = strtolower(pathinfo($pic,PATHINFO_EXTENSION));
if(isset($_POST['submit_std']))
{
	$check = getimagesize($_FILES['photo']["tmp_name"]);
	if($check !== false) 
	{
		$course=$_POST['course'];
		$updateQuery="UPDATE user_data set Name='$name', Address='$address', Phonenumber='$phonenumber', Photo='$pic', Course='$course', Username='$username' WHERE ID=$id";
		if(move_uploaded_file($_FILES['photo']['tmp_name'], $target)) 
		{ 
			$result=mysqli_query($con,$updateQuery);
			if($result)
			{
				if($img)
				{
					unlink("Uploads/$img");
				}
				$_SESSION['status']="sucess";
				$_SESSION['sucess']="Data is updated.";
				header('location:admin.php');
				exit();
			}
			else
			{
				$_SESSION['status']="error";
				$_SESSION['error']=die(mysqli_error($con));
				session_destroy();
				header('location:admin.php');
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
		header('Location:admin.php');
		exit();
    }
	
}
else
{
	$check = getimagesize($_FILES["photo"]["tmp_name"]);
	if($check !== false)
	{
		$uploadOk = 1;
		$department=$_POST['department'];
		$salary=$_POST['salary'];
		$updateQuery="UPDATE user_data set Name='$name' ,Address='$address',Phonenumber='$phonenumber', Photo='$pic', Salary='$salary', Department='$Department' WHERE ID=$id";
		if(move_uploaded_file($_FILES['photo']['tmp_name'], $target)) 
		{ 
			$result=mysqli_query($con,$updateQuery);
			if($result)
			{	
				if($img)
				{
					unlink("Uploads/$img");
				}
				$_SESSION['status']="sucess";
				$_SESSION['sucess']="Data is updated";
				header('location:admin.php');
				exit();
			}
			else
			{
				$_SESSION['status']="error";
				$_SESSION['error']=die(mysqli_error($con));
				session_destroy();
				header('location:admin.php');
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
		header('Location:admin.php');
		exit();
    }
	
}
mysqli_close($connectivity);
session_destroy();
?>
