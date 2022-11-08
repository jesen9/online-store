<?php
session_start();
include 'connect.php';
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>
    
<?php include 'menu.php' ?>

    <section class="konten">
        <div class="container">
            <h1>Latest Products</h1>

            <div class="row">
                <?php $ambil = $connect->query("SELECT*FROM produk"); ?>
                <?php while($perproduk = $ambil->fetch_assoc()){ ?>

                <div class="col-md-3">
                    <div class="thumbnail">
                        <img src="foto_produk/<?php echo $perproduk['foto_produk'] ?>" alt="">
                        <div class="caption">
                            <h3><?php echo $perproduk['nama_produk'] ?></h3>
                            <h5>Rp. <?php echo number_format($perproduk['harga_produk']) ?></h5>

                            <?php if($perproduk['stok_produk']<1): ?>
                            <a class="btn btn-primary" disabled>Out of Stock!</a>
                            <?php else: ?>
                            <a href="buy.php?id=<?php echo $perproduk['id_produk'] ?>" class="btn btn-primary">Buy</a>
                            <?php endif ?>

                            <a href="detail.php?id=<?php echo $perproduk['id_produk'] ?>" class="btn btn-default">Details</a>
                        </div>
                    </div>
                </div>

                <?php } ?>



            </div>
        </div>
    </section>





</body>
</html>