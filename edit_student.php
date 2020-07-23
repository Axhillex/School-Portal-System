<?php
session_start();
require('DatabaseConnectivity.php');
$id=$_GET['id'];

$_SESSION['id']=$id;

$result = mysqli_query($con, "SELECT * FROM user_data WHERE id=$id");
$row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html >
    <head>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <title>Registration Form</title>
    </head>
    <body style="margin-left:20px;">
        <form action="update.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="form-group">
                <label>PHOTO:</label>
                <img src="Uploads/<?php echo $row["Photo"]?>" style="height:200px;width:200px;"/><br/>
                <input class="form-control" type="file" name="photo" value="<?php echo $row["Photo"]?>" required><br/>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>NAME:</label>
                <input class="form-control" type="text" name="name" value="<?php echo $row["Name"]?>"><br/>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>ADDRESS:</label>
                <input class="form-control" type="text" name="address" value="<?php echo $row["Address"]?>"><br/>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>PHONENUMBER:</label>
                <input class="form-control" type="text" name="phonenumber" value="<?php echo $row["Phonenumber"] ?>"><br/>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>COURSE:</label>
                <input class="form-control" type="text" name="course" value="<?php echo $row["Course"]?>"><br/>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>USERNAME:</label>
                <input class="form-control" type="text" name="username" value="<?php echo $row["Username"]?>"><br/>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>SUBMIT:</label>
                <input class="form-control" type="submit" name="submit_std" value="submit">
            </div>
        </div>
        </form>     
    </body>
</html>
