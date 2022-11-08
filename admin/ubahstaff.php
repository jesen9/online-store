<h2>Edit Staff Information</h2>
<?php
$ambil = $connect->query("SELECT * FROM staff where id_staff='$_GET[id]'");
$col = $ambil->fetch_assoc();

// echo"<pre>";
// print_r($col);
// echo "</pre>";
?>

<form action="" method="post">

    <div class="from-group">
        <label for="">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $col['staff_username']; ?>">
    </div>
    <div class="from-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo $col['staff_name']; ?>">
    </div>
    <div class="from-group">
        <label for="">Gender</label>
        <select class="form-control" name="gender">

        <option value="Male" <?php if($col['staff_gender']=="Male"){echo "selected";} ?> >Male</option>
        <option value="Female" <?php if($col['staff_gender']=="Female"){echo "selected";} ?> >Female</option>
            
        </select>
    </div>
    <div class="from-group">
        <label for="">Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo $col['staff_email']; ?>">
    </div>
    <div class="from-group">
        <label for="">Phone</label>
        <input type="text" class="form-control" name="phone" value="<?php echo $col['staff_phone']; ?>">
    </div>
    <div class="from-group">
        <label for="">Address</label>
        <textarea name="address" class="form-control">
            <?php echo $col['staff_address']; ?>
        </textarea>
    </div>

    <button class="btn btn-primary" name="save">Save</button>
</form>

<?php 
if(isset($_POST['save']))
{
    $connect->query("UPDATE staff set staff_username='$_POST[username]', staff_name='$_POST[name]', staff_gender='$_POST[gender]', staff_address='$_POST[address]', staff_phone='$_POST[phone]', staff_email='$_POST[email]' where id_staff='$_GET[id]'");
    
    echo "<script>alert('Staff information saved.');</script>";
    echo "<script>location='index.php?halaman=managestaff';</script>";
}
?>
