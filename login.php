<?php
session_start();
require 'DatabaseConnectivity.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;

$sql = "SELECT * FROM user_data WHERE Username LIKE '$username' and Password LIKE '$password'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		if ($row['Role_Type'] == "adm") {
			header("Location: admin.php?id='" . $row["ID"] . "'");
			exit();
		} elseif ($row['Role_Type'] == "tch") {
			header("Location: teacher.php?id='" . $row["ID"] . "'");
			exit();
		} else {
			header("Location: student.php?id='" . $row["ID"] . "'");
			exit();
		}
	}
} else {
	$_SESSION['loginmessage'] = "Username or Password is Wrong.  Login Unsuccessful.";
	header('Location:home.php');
	exit;
}

mysqli_close($con);
?>