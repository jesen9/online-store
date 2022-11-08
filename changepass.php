<?php
session_start();
include 'connect.php';

if(!isset($_SESSION['pelanggan']) or empty($_SESSION['pelanggan']))
{
    echo "<script>alert('Please Log in.')</script>";
    echo "<script>location='login.php'</script>";
    exit();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
        <!-- navbar -->
        <?php include 'menu.php' ?>
        <form action="" method="post" class="container">
            <h1>Change Password</h1>
                        
            <div class="form-group">
                <label for="">Enter old password:</label>
                <input type="password" class="form-control" name="op" required>
            </div>
            <div class="form-group">
                <label for="">Enter new password:</label>
                <input type="password" class="form-control" name="np" required>
            </div>
            <div class="form-group">
                <label for="">Confirm new password:</label>
                <input type="password" class="form-control" name="cnp" required>
            </div>

            <button class="btn btn-primary btn-lg" name="confirm">Confirm</button>

        </form>
        <?php
        if(isset($_POST['confirm']))
        {
            $op = md5($_POST['op']);
            $np = md5($_POST['np']);
            $cnp = md5($_POST['cnp']);
            $id = $_SESSION['pelanggan']['id_pelanggan'];
            
            if($np == $cnp)
            {
                $grab = $connect->query("SELECT*FROM pelanggan where password_pelanggan='$op'");
                $match = $grab->num_rows;
                if($match==1)
                {
                    $connect->query("UPDATE pelanggan set password_pelanggan='$np' where id_pelanggan='$id'");
                    echo "<script>alert('Changes have been made. Please log in again.')</script>";
                    session_start();
                    session_destroy();
                    echo "<script>location='login.php'</script>";
                }
                else
                {
                    echo "<div class='alert alert-danger container'>Incorrect password!</div>";
                }
            }
            else
            {                
                echo "<div class='alert alert-danger container'>Confirmed password does not match password!</div>";
            }
            
        }
        ?>



</body>
</html>