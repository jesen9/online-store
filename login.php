<?php
session_start();
include 'connect.php';

if(isset($_SESSION['pelanggan']))
{
    echo "<script>location='index.php'</script>";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Login</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
        <!-- navbar -->
        <?php include 'menu.php' ?>
        
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Login</h1>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <!-- <div class="form-group">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="remember" id="remember" value="1"> Remember Me
                                </label>
                            </div> -->
                            <button class="btn btn-primary" name="login">Login</button>
                            <a href="forgotpass.php" class="pull-right">Forgot password?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
    if(isset($_POST["login"]))
    {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        
        // if($_POST['remember']=='1' || $_POST['remember']=='on')
        // {
        //     $hour = time() + 3600 * 24 * 30;
        //     setcookie('email', $email, $hour);

        // }
        
        // var_dump($hashed_password);
        $ambil = $connect->query("SELECT*FROM pelanggan where email_pelanggan='$email' and password_pelanggan='$password'");

        $match = $ambil->num_rows;

        if($match==1)
        {
            $acc = $ambil->fetch_assoc();
            $_SESSION['pelanggan'] = $acc;
            // echo "<script>alert('Login success.')</script>";
            if(isset($_SESSION['cart']) or !empty($_SESSION['cart']))
            {
                echo "<script>location='checkout.php'</script>";
            }
            else
            {
                echo "<script>location='index.php'</script>";
            }
            
        }
        else
        {
            echo "<script>alert('Incorrect email or password!.')</script>";
            echo "<script>location='login.php</script>";
        }
    }
    ?>

</body>
</html>