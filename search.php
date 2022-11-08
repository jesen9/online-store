<?php 
session_start();
include 'connect.php';
?>
<?php
$keyword = $_GET['keyword'];
// echo $keyword;

$all = array();
$ambil = $connect->query("SELECT*FROM produk a join kategori b on a.id_kategori = b.id_kategori where nama_produk like '%$keyword%' or deskripsi_produk like '%$keyword%' or nama_kategori like '%$keyword%' ");
while ($col = $ambil->fetch_assoc())
{
    $all[] = $col;
}

// echo "<pre>";
// print_r($all);
// echo "</pre>";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
        <!-- navbar -->
        <?php include 'menu.php' ?>
    <div class="container">
        <h3>Search Results for "<?php echo $keyword ?>"</h3>

        <?php if(empty($all)): ?>
            <div class="alert alert-danger">No product found for <strong><?php echo $keyword ?></strong>.</div>
        <?php endif ?>

        <div class="row">
            <?php $ambil = $connect->query("SELECT*FROM produk a join kategori b on a.id_kategori = b.id_kategori where nama_produk like '%$keyword%' or deskripsi_produk like '%$keyword%' or nama_kategori like '%$keyword%' "); ?>
            <?php while ($col = $ambil->fetch_assoc()){?>
            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="foto_produk/<?php echo $col['foto_produk'] ?>" alt="">
                    <div class="caption">
                        <h3><?php echo $col['nama_produk'] ?></h3>
                        <h5>Rp. <?php echo number_format($col['harga_produk']) ?></h5>

                        <?php if($col['stok_produk']<1): ?>
                        <a class="btn btn-primary" disabled>Out of Stock!</a>
                        <?php else: ?>
                        <a href="buy.php?id=<?php echo $col['id_produk'] ?>" class="btn btn-primary">Buy</a>
                        <?php endif ?>

                        <a href="detail.php?id=<?php echo $col['id_produk'] ?>" class="btn btn-default">Details</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>