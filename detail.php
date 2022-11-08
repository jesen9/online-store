<?php session_start(); ?>
<?php include 'connect.php'; ?>
<?php
$id_produk= $_GET['id'];

$ambil = $connect->query("SELECT*FROM produk where id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detail);
// echo "</pre>"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>
            <!-- navbar -->
            <?php include 'menu.php' ?>

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="foto_produk/<?php echo $detail['foto_produk'] ?>" alt="" class="img-responsive">
            </div>
            <div class="col-md-6">
                <h2><?php echo $detail['nama_produk'] ?></h2>
                <h4>Rp. <?php echo number_format($detail['harga_produk']) ?></h4>

                <h5>Stock: <?php echo $detail['stok_produk'] ?></h5>

                <form method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="number" min="1" class="form-control" name="jumlah" max="<?php echo $detail['stok_produk'] ?>">
                            <div class="input-group-btn">
                                <?php if($detail['stok_produk']<1): ?>
                                <button class="btn btn-primary" name="oos" disabled>Out of stock!</button>
                                <?php else: ?>
                                <button class="btn btn-primary" name="beli">Buy</button>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </form>

                <?php 
                if(isset($_POST['beli']))
                {
                    $jumlah = $_POST['jumlah'];
                    $_SESSION['cart'][$id_produk] = $jumlah;

                    echo "<script>alert('Product added to cart.')</script>";
                    echo "<script>location='cart.php'</script>";
                }
                ?>

                <p><?php echo $detail['deskripsi_produk'] ?></p>
            </div>
        </div>
    </div>

</section>



</body>
</html>