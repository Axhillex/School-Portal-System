<?php
    session_start();
    if(isset($_SESSION['loginmessage']))
    {
        echo $_SESSION['loginmessage'];
    }
    if(isset($_SESSION['status']))
    {
    echo $_SESSION['status'];
    }
    session_destroy();
?>

<html>
    <head>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <title>Login</title>
    </head>
    <body style="margin-left:20px;">
        <div class="row">
            <div class="form-group">
                <h1>Login</h1>
            </div>
        </div>
        <form name="form_login" action="login.php" method="POST">
        <div class="row">
            <div class="form-group">
                <label>Username:</label> 
                <input class="form-control" type="text" name="username">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>Password:</label> 
                <input class="form-control" type="password" name="password">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <input class="form-control" type="submit" name="submit" value="Submit">
            </div>
        </div>
        </form>
        <div class="row">
            <div class="form-group">
                <h1>Register from down here</h1>
            </div>
        </div>
        <form  name="form_register" action="" method="POST">
        <div class="row">
            <div class="form-group">
                <label>Registration Type:</label> 
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <select class="form-control" name="registertype">
                    <option value="radmin">Admin</option>
                    <option value="rteacher">Teacher</option>
                    <option value="rstudent">Student</option>
                </select>
            </div>
        </div> 
        <div class="row">
            <div class="form-group">
                <input class="form-control" type="submit" name="register" value="Register">
            </div>
        </div>
                </form>
            </div>
        </div>
    </body>
</html>
<?php
    if(isset($_POST['register'])){
        $rtype=$_POST['registertype'];
        if($rtype =="radmin")
        {
            header('Location:admin_register.php');
            exit();
        }
        elseif($rtype =="rteacher")
        {
            header('Location:teacher_register.php');
            exit();
        }
        else
        {
            header('Location:student_register.php');
            exit();
        }
    }
?>