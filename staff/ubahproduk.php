<h2>Ubah Produk</h2>
<?php
$ambil = $connect->query("SELECT * FROM produk where id_produk='$_GET[id]'");
$col = $ambil->fetch_assoc();

// echo"<pre>";
// print_r($col);
// echo "</pre>";
?>

<?php
$catdata = array();
$ambil = $connect->query("SELECT*FROM kategori");
while($each = $ambil->fetch_assoc())
{
    $catdata[] = $each;
}

// echo"<pre>";
// print_r($catdata);
// echo "</pre>";

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="from-group">
        <label for="">Category</label>
        <select class="form-control" name="id_kategori" required>
            <?php foreach($catdata as $key => $value): ?>
            <option value="<?php echo $value['id_kategori'] ?>" <?php if($col['id_kategori']==$value['id_kategori']){echo "selected";} ?> >
                <?php echo $value['nama_kategori'] ?>
            </option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="from-group">
        <label for="">Product Name</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $col['nama_produk']; ?>">
    </div>
    <div class="from-group">
        <label for="">Price</label>
        <input type="number" class="form-control" name="harga" value="<?php echo $col['harga_produk']; ?>">
    </div>
    <div class="from-group">
        <label for="">Weight(grams)</label>
        <input type="number" class="form-control" name="berat" value="<?php echo $col['berat_produk']; ?>">
    </div>
    <div class="from-group">
        <label for="">Stock</label>
        <input type="number" class="form-control" name="stock" value="<?php echo $col['stok_produk']; ?>">
    </div>
    <div class="from-group">
        <label for="">Description</label>
        <textarea name="deskripsi" class="form-control">
            <?php echo $col['deskripsi_produk']; ?>
        </textarea>
    </div>
    <div class="from-group">
        <img src="../foto_produk/<?php echo $col['foto_produk']; ?>" width="200" alt="">
    </div>
    <div class="from-group">
        <label for="">Change Picture</label>
        <input type="file" class="form-control" name="foto">
    </div>

    <button class="btn btn-primary" name="save">Save</button>
</form>

<?php 
if(isset($_POST['save']))
{
    $namafoto = $_FILES['foto']['name'];
    $loc = $_FILES['foto']['tmp_name'];

    if(!empty($loc))
    {
        move_uploaded_file($loc, "../foto_produk/$namafoto");

        $connect->query("UPDATE produk set id_kategori='$_POST[id_kategori]', nama_produk='$_POST[nama]', harga_produk='$_POST[harga]', berat_produk='$_POST[berat]', foto_produk='$namafoto', deskripsi_produk='$_POST[deskripsi]' where id_produk='$_GET[id]'");

    }
    else
    {
        $connect->query("UPDATE produk set id_kategori='$_POST[id_kategori]', nama_produk='$_POST[nama]', harga_produk='$_POST[harga]', berat_produk='$_POST[berat]', stok_produk='$_POST[stock]', deskripsi_produk='$_POST[deskripsi]' where id_produk='$_GET[id]'");
    } 
    echo "<script>alert('Product information saved.');</script>";
    echo "<script>location='index.php?halaman=produk';</script>";
}
?>
