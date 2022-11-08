<h2>Add Staff</h2>

<form action="" method="post">

    <div class="from-group">
        <label for="">Username</label>
        <input type="text" class="form-control" name="username" required>
    </div>
    <div class="from-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="from-group">
        <label for="">Gender</label>
        <select class="form-control" name="gender" required>

        <option value="" selected disabled>Select gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
            
        </select>
    </div>
    <div class="from-group">
        <label for="">Phone</label>
        <input type="text" class="form-control" name="phone" required>
    </div>
    <div class="from-group">
        <label for="">Email</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    <div class="from-group">
        <label for="">Address</label>
        <textarea class="form-control" name="address" rows="10" required></textarea>
    </div>
    <div class="from-group">
        <label for="">Password</label>
        <input type="password" class="form-control" name="pass" required>
    </div>
    <div class="from-group">
        <label for="">Confirm password</label>
        <input type="password" class="form-control" name="repass" required>
    </div>

    <button class="btn btn-primary" name="save">Save</button>
</form>

<?php 
if(isset($_POST['save']))
{
    $pass = md5($_POST['pass']);
    $repass = md5($_POST['repass']);

    if($pass == $repass)
    {
        $connect->query("INSERT INTO staff (staff_username, staff_name, staff_gender, staff_address, staff_phone, staff_email, staff_password) VALUES ('$_POST[username]', '$_POST[name]', '$_POST[gender]', '$_POST[address]', '$_POST[phone]', '$_POST[email]', '$pass')");
        echo "<div class='alert alert-info'>Staff added.</div>";
        echo "<script>location='index.php?halaman=managestaff'</script>";
    }
    else if($pass !== $repass)
    {
        echo "<div class='alert alert-danger'>Confirmed password does not match password. Please retry.</div>";
    }
    
}
?>

