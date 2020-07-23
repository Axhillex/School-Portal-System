<!DOCTYPE html>
<html>
    <head>
    <?php
        session_start();
        if(isset($_SESSION['imger']))
        {
            echo $_SESSION['imger'];
        }
        session_destroy();
    ?>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <title>Registration Form</title>
    </head>
    <body style="margin-left:20px;">
        <form action="add.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="form-group">
                <label>NAME:</label>
                <input class="form-control" type="text" name="name">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>ADDRESS:</label>
                <input class="form-control" type="text" name="address">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>PHONENUMBER:</label>
                <input class="form-control" type="text" name="phonenumber">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
            <label>PHOTO:</label>
                <input class="form-control" type="file" name="photo" required/>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>COURSE:</label>
                <input class="form-control" type="text" name="course">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>USERNAME:</label>
                <input class="form-control" type="text" name="username">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>PASSWORD:</label>
                <input class="form-control" type="password" name="password">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <input class="form-control" type="submit" name="submit_std" value="submit">
            </div>
        </div>
        </form>     
    </body>
</html>
