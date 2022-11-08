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
            $id = $_SESSION['staff']['id_staff'];
            
            if($np == $cnp)
            {
                $grab = $connect->query("SELECT*FROM staff where staff_password='$op'");
                $match = $grab->num_rows;
                if($match==1)
                {
                    $connect->query("UPDATE staff set staff_password='$np' where id_staff='$id'");
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
