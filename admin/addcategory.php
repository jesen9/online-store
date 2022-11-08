<h2>Add Category</h2>

<form action="" method="post">

    <div class="from-group">
        <label for="">New category</label>
        <input type="text" class="form-control" name="category">
    </div>

    <button class="btn btn-primary" name="save">Save</button>
</form>

<?php 
if(isset($_POST['save']))
{
    $connect->query("INSERT INTO kategori (nama_kategori) VALUES ('$_POST[category]')");
    echo "<div class='alert alert-info'>Data saved</div>";
    echo "<script>location='index.php?halaman=category'</script>";
}
?>

