<?php
include '../connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body>
        
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Forgot Password</h1>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Please enter your email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <button class="btn btn-primary" name="reset">Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <?php 
    if(isset($_POST["reset"]))
    {
        $email = $_POST['email'];

        $ambil = $connect->query("SELECT*FROM staff where staff_email='$email'");

        $match = $ambil->num_rows;

        $name = $ambil->fetch_assoc();
        
        if($match==1)
        {
            $newpass = md5($email);
            $nphash = md5($newpass);
            $connect->query("UPDATE staff set staff_password='$nphash' where staff_email='$email'");
            echo "<div class='alert alert-danger container'>
            <h3>Hi, <strong>".$name['staff_name']."</strong></h3>
            <p>This is your new password: <strong>".$newpass."</strong></p>
            <h5><strong>DO NOT SHARE YOUR PASSWORD!</strong></h5>
            <p>Please log in and go to <strong>Profile</strong> > <strong>Change Password</strong> immediately.</p><br>
            <a href='login.php' class='btn btn-primary btn-lg'>Log In</a>
            </div>";
            
        }
        else
        {
            echo "<div class='alert alert-danger container'>No account with such email found!</div>";
        }
    }
    ?>

</body>
</html>