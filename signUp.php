<?php include 'connect.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
                        <h3 class="panel-title">Sign Up</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3">Name</label>
                                <div class="col-md-7">
                                    <input type="text" name="nama" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Email</label>
                                <div class="col-md-7">
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Address</label>
                                <div class="col-md-7">
                                    <textarea name="alamat" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Telp/HP</label>
                                <div class="col-md-7">
                                    <input type="text" name="telepon" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Password</label>
                                <div class="col-md-7">
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Confirm password</label>
                                <div class="col-md-7">
                                    <input type="password" name="repassword" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-7 col-md-offset-3">
                                    <button class="btn btn-primary" name=signUp>Sign Up</button>
                                </div>
                            </div>
                        </form>
                        <?php

                        if(isset($_POST['signUp']))
                        {
                            $nama = $_POST['nama'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $repassword = $_POST['repassword'];
                            $alamat = $_POST['alamat'];
                            $telepon = $_POST['telepon'];
                            $hashed = md5($password);
                            
                            if($password == $repassword)
                            {
                                $ambil = $connect->query("SELECT*FROM pelanggan where email_pelanggan='$email'");
                                $match = $ambil->num_rows;
                                if($match==1)
                                {
                                    echo "<script>alert('Email is already used in another account.')</script>";
                                    echo "<script>location='signUp.php'</script>";
                                }
                                else
                                {
                                    $connect->query("INSERT INTO pelanggan(email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan, alamat_pelanggan) values ('$email', '$hashed', '$nama', '$telepon', '$alamat')");
                                    echo "<script>alert('Register success, please check your email and log in.')</script>";
                                    echo "<script>location='login.php'</script>";
                                }
                            }
                            else
                            {
                                echo "<div class='alert alert-danger'>Confirmed password does not match password!</div>";
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