<h2>Add Product</h2>

<form action="" method="post" enctype="multipart/form-data">
    <div class="from-group">
        <label for="">Category</label>
        <select class="form-control" name="id_kategori" required>
            <option disabled selected value="">Choose category</option>
            <?php 
            $ambil = $connect->query("SELECT*FROM kategori");
            while ($col = $ambil->fetch_assoc()){
            ?>
            <option value="<?php echo $col['id_kategori'] ?>">
                <?php echo $col['nama_kategori'] ?>
            </option>
            <?php } ?>
        </select>
    </div>
    <div class="from-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="nama" required>
    </div>
    <div class="from-group">
        <label for="">Price</label>
        <input type="number" class="form-control" name="harga" required min="10000">
    </div>
    <div class="from-group">
        <label for="">Weight(grams)</label>
        <input type="number" class="form-control" name="berat" required>
    </div>
    <div class="from-group">
        <label for="">Stock</label>
        <input type="number" class="form-control" name="stock" required min="0">
    </div>
    <div class="from-group">
        <label for="">Description</label>
        <textarea class="form-control" name="deskripsi" rows="10" required></textarea>
    </div>
    <div class="from-group">
        <label for="">Photo</label>
        <input type="file" class="form-control" name="foto" required>
    </div>
    <button class="btn btn-primary" name="save">Save</button>
</form>

<?php 
if(isset($_POST['save']))
{
    $nama = $_FILES['foto']['name'];
    $loc = $_FILES['foto']['tmp_name'];
    move_uploaded_file($loc, "../foto_produk/".$nama);
    $connect->query("INSERT INTO produk (id_kategori, nama_produk, harga_produk, berat_produk, foto_produk, deskripsi_produk, stok_produk) VALUES ('$_POST[id_kategori]', '$_POST[nama]', '$_POST[harga]', '$_POST[berat]', '$nama', '$_POST[deskripsi]', $_POST[stock])");
    echo "<div class='alert alert-info'>Data saved</div>";
    echo "<script>location='index.php?halaman=produk'</script>";
}
?>

