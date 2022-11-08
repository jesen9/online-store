<?php
session_start();
$connect = new mysqli("localhost","root","","onlinestoredb");
// if(isset($_SESSION['admin']))
// {
//     echo "<script>location='../admin/index.php'</script>";
// }
if(isset($_SESSION['staff']))
{
    echo "<script>location='index.php'</script>";
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Store and Admin Login</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2>Staff/Admin Log in</h2>

                <h5>( Log yourself in to get access )</h5>
                <br />
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>    Enter Details To Log In </strong>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <br />
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <input type="text" class="form-control" name="user" placeholder="Email or Username">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="pass" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="remember" id="remember" >Remember Me
                                </label>
                                <!-- <span class="pull-right">
                                    <a href="#">Forget password ? </a>
                                </span> -->
                            </div>
                            <button class="btn btn-primary" name="login">Login Now</button>
                            <hr />
                            Forgot password?<a href="../admin/forgotpassadm.php"> Click here for admin</a>, and<a href="forgotpassstf.php"> click here for staff. </a>
                        </form>


                        <?php

                        if(isset($_POST['login']))
                        {
                            $pass = md5($_POST['pass']);
                            $user = $_POST['user'];
                            // if($_POST["remember"]=='1' || $_POST["remember"]=='on')
                            // {
                            //     $hour = time() + 3600 * 24 * 30;
                            //     setcookie('username', $user, $hour);
                            //     setcookie('password', $pass, $hour);
                            // }
                            
                            $ambil = $connect->query("SELECT*FROM `admin` where username='$user' or admin_email='$user'");
                            $match = $ambil->num_rows;
                            $test = $ambil->fetch_assoc();

                            if($match==1)
                            {
                                if($test['password']==$pass)
                                {
                                    $_SESSION['admin'] = $test;
                                    echo "<div class='alert alert-info'>Logged in as admin.</div>";
                                    echo "<script>location='../admin/index.php';</script>"; 
                                }
                                else
                                {
                                    echo "<div class='alert alert-danger'>Incorrect password.</div>";
                                }
                                                               
                            }
                            else
                            {
                                $take = $connect->query("SELECT*FROM `staff` where staff_username='$user' or staff_email='$user'");
                                $cocok = $take->num_rows;
                                $testt = $take->fetch_assoc();
                                if($cocok==1)
                                {
                                    if($testt['staff_password']==$pass)
                                    {
                                        $_SESSION['staff'] = $testt;
                                        echo "<div class='alert alert-info'>Logged in as staff.</div>";
                                        // echo "<script>location='index.php';</script>";
                                        echo "<script>location='../staff/index.php';</script>";
                                    }
                                    
                                }                                

                                echo "<div class='alert alert-danger'>Login Failed</div>";
                                echo "<meta http.equiv='refresh' content='1;url=login.php'>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

                        
                        

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>