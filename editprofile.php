<?php 
session_start();
include 'connect.php'; 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

        <!-- navbar -->
        <?php include 'menu.php' ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Profile</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3">Name</label>
                                <div class="col-md-7">
                                    <input type="text" name="nama" class="form-control" required value="<?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Email</label>
                                <div class="col-md-7">
                                    <input type="email" name="email" class="form-control" required value="<?php echo $_SESSION['pelanggan']['email_pelanggan'] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Address</label>
                                <div class="col-md-7">
                                    <textarea name="alamat" class="form-control" required>
                                    <?php echo $_SESSION['pelanggan']['alamat_pelanggan'] ?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Telp/HP</label>
                                <div class="col-md-7">
                                    <input type="text" name="telepon" class="form-control" required value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Password</label>
                                <div class="col-md-7">
                                    <input type="password" name="password" class="form-control" placeholder="Please enter your password to save changes." required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-7 col-md-offset-3">
                                    <button class="btn btn-primary" name=save>Save</button>
                                </div>
                            </div>
                        </form>
                        <?php

                        if(isset($_POST['save']))
                        {
                            // $nama = $_POST['nama'];
                            // $email = $_POST['email'];
                            $password = $_POST['password'];
                            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                            // $alamat = $_POST['alamat'];
                            // $telepon = $_POST['telepon'];
                            $id = $_SESSION['pelanggan']['id_pelanggan'];
                            // echo $_SESSION['pelanggan']['id_pelanggan'];
                            
                            
                            if(password_verify($password, $hashed_password))
                            {
                                $connect->query("UPDATE pelanggan set email_pelanggan='$_POST[email]', nama_pelanggan='$_POST[nama]', telepon_pelanggan='$_POST[telepon]', alamat_pelanggan='$_POST[alamat]' where id_pelanggan='$id'");
                                echo "<script>alert('Changes have been made. Please log out and log in again to view changes.')</script>";
                                echo "<script>location='login.php'</script>";
                            }
                            else
                            {
                                echo "<div class='alert alert-danger'>Incorrect password!</div>";
                            }
                            
                        }


                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>