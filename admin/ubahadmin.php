<h2>Edit Staff Information</h2>
<?php
$ambil = $connect->query("SELECT * FROM `admin` where id_admin='$_GET[id]'");
$col = $ambil->fetch_assoc();

// echo"<pre>";
// print_r($col);
// echo "</pre>";
?>

<form action="" method="post">

    <div class="from-group">
        <label for="">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $col['username']; ?>">
    </div>
    <div class="from-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo $col['nama_lengkap']; ?>">
    </div>
    <div class="from-group">
        <label for="">Gender</label>
        <select class="form-control" name="gender">

        <option value="Male" <?php if($col['admin_gender']=="Male"){echo "selected";} ?> >Male</option>
        <option value="Female" <?php if($col['admin_gender']=="Female"){echo "selected";} ?> >Female</option>
            
        </select>
    </div>
    <div class="from-group">
        <label for="">Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo $col['admin_email']; ?>">
    </div>
    <div class="from-group">
        <label for="">Phone</label>
        <input type="text" class="form-control" name="phone" value="<?php echo $col['admin_phone']; ?>">
    </div>
    <div class="from-group">
        <label for="">Address</label>
        <textarea name="address" class="form-control">
            <?php echo $col['admin_address']; ?>
        </textarea>
    </div>

    <button class="btn btn-primary" name="save">Save</button>
</form>

<?php 
if(isset($_POST['save']))
{
    $connect->query("UPDATE `admin` set username='$_POST[username]', nama_lengkap='$_POST[name]', admin_gender='$_POST[gender]', admin_address='$_POST[address]', admin_phone='$_POST[phone]', admin_email='$_POST[email]' where id_admin='$_GET[id]'");
    
    echo "<script>alert('Admin information saved.');</script>";
    echo "<script>location='index.php?halaman=manageadmin';</script>";
}
?>
