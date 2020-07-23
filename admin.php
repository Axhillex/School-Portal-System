<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
	<title>Admin Page</title>
</head>
<body>
<span style="margin-left:1800px;"><a href="logout.php">Logout</a></span>
<h1>Your Data</h1>
<?php
$admid=$_GET['id'];
require 'DatabaseConnectivity.php';
$result = mysqli_query($con, "SELECT Photo, ID, Name, Address, Phonenumber FROM user_data WHERE ID=$admid");
?>
<table id="myTable" class="display table" style="width:100%;">
	<thead>
		<tr>
			<th>Photo</th>
			<th>Id</th>
			<th>Name</th>
			<th>Address</th>
			<th>PhoneNumber</th>
		</tr>
	</thead>
	<tbody>
		<?php
		while($row=mysqli_fetch_assoc($result))
		{
		?>
		<tr>
			<td style="height:200px;width:200px;"><img src="Uploads/<?php echo $row["Photo"]?>" style="height:100%;width:100%;"></td>
			<td><?php echo $row["ID"]?></td>
			<td><?php echo $row["Name"]?></td>
			<td><?php echo $row["Address"]?></td>
			<td><?php echo $row["Phonenumber"]?></td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>

<h1>Teachers Table</h1>
<?php
require 'DatabaseConnectivity.php';
$result = mysqli_query($con, "SELECT Photo, ID, Name, Address, Phonenumber, Salary, Department FROM user_data WHERE Role_Type='tch'");
?>
<table id="myTable" class="display table" style="width:100%;">
	<thead>
		<tr>
			<th>Photo</th>
			<th>Id</th>
			<th>Name</th>
			<th>Address</th>
			<th>PhoneNumber</th>
			<th>Salary</th>
			<th>Department</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php
		while($row=mysqli_fetch_assoc($result))
		{
		?>
		<tr>
			<td style="height:200px;width:200px;"><img src="Uploads/<?php echo $row["Photo"]?>" style="height:100%;width:100%;"></td>
			<td><?php echo $row["ID"]?></td>
			<td><?php echo $row["Name"]?></td>
			<td><?php echo $row["Address"]?></td>
			<td><?php echo $row["Phonenumber"]?></td>
			<td><?php echo $row["Salary"]?></td>
			<td><?php echo $row["Department"]?></td>
			<td><a href="edit_teacher.php?id=<?php echo $row["ID"]; ?>">EDIT</a>
			<td><a href="delete.php?id=<?php echo $row["ID"]; ?>">DELETE</a>
		</tr>
		<?php
		}
		?>
		<tr style="colspan=9;">
			<td><a href="add_teacher.php">ADD</a></td>
		</tr>
	</tbody>
</table>
<br/>
<h1>Students Table</h1>
<?php
require 'DatabaseConnectivity.php';
$result = mysqli_query($con, "SELECT Photo, ID, Name, Address, Phonenumber, Course FROM user_data WHERE Role_Type='std'");
?>
<table id="myTable" class="display table" style="width:100%;">
	<thead>
		<tr>
			<th>Photo</th>
			<th>ID</th>
			<th>NAME</th>
			<th>ADDRESS</th>
			<th>PHONENUMBER</th>
			<th>Course</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php
		while($row=mysqli_fetch_assoc($result))
		{
		?>
		<tr>
			<td style="height:200px;width:200px;"><img src="Uploads/<?php echo $row["Photo"]?>" style="height:100%;width:100%;"></td>
			<td><?php echo $row["ID"]?></td>
			<td><?php echo $row["Name"]?></td>
			<td><?php echo $row["Address"]?></td>
			<td><?php echo $row["Phonenumber"]?></td>
			<td><?php echo $row["Course"]?></td>
			<td><a href="edit_student.php?id=<?php echo $row["ID"]; ?>">EDIT</a>
			<td><a href="delete.php?id=<?php echo $row["ID"]; ?>">DELETE</a>
		</tr>
		<?php
		}
		?>
		<tr style="colspan=9;">
			<td><a href="add_student.php">ADD</a></td>
		</tr>
	</tbody>
</table>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="script.js"></script>
</body>
</html>
		