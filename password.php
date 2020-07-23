<!DOCTYPE html>
<html>
<head>
<title>Password Change</title>
</head>
<body>
<?php 
    session_start();
    if(isset($_SESSION['message'])) 
    { 
        echo $_SESSION['message']; 
    } 
    session_destroy();
?>
<h3>CHANGE PASSWORD</h3>
<form method="post" action="">
Current Password:<br>
<input type="password" name="currentPassword">
<br>
New Password:<br>
<input type="password" name="newPassword">
<br>
Confirm Password:<br>
<input type="password" name="confirmPassword">
<br><br>
<input type="submit">
</form>
</body>
</html>

<?php
session_start();
require('DatabaseConnectivity.php');
$uid = $_GET['id'];
if(count($_POST)>0) 
{
    $result = mysqli_query($con, "SELECT * FROM user_data WHERE ID =$uid");
    $row=mysqli_fetch_assoc($result);
    $newpassword = md5($_POST["newPassword"]);
    if(md5($_POST["currentPassword"]) == $row["Password"] && $_POST["newPassword"] == $_POST["confirmPassword"] ) 
    {
        $sql ="UPDATE user_data set Password = '$newpassword' WHERE ID = $uid";
        mysqli_query($con,$sql);
        $_SESSION['message'] = "Password Changed Sucessfully";
        header('Location: '.$_SERVER['PHP_SELF']."?id=".$uid);
        exit();
    }
    else
    {
        $_SESSION['message'] = "Password is not correct";
        header('Location: '.$_SERVER['PHP_SELF']."?id=".$uid);
        exit();
    }
}
?>