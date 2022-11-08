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
    <title>Profile</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
        <!-- navbar -->
        <?php include 'menu.php' ?>
        <div class="container">
            <h1>Profile</h1>
                        
            <div class="form-group">
                <label for="">Name:</label>
                <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email:</label>
                <input type="email" readonly value="<?php echo $_SESSION['pelanggan']['email_pelanggan'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Telephone:</label>
                <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Main Address:</label>
                <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['alamat_pelanggan'] ?>" class="form-control">
            </div>
           
            <a href="editprofile.php" class="btn btn-primary btn-lg">Edit</a>
            <div class="pull-right">
                <a href="changepass.php">Change Password</a>
            </div>
            


        </div>
    
</body>
</html>