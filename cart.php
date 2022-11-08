<?php 
session_start();

// echo "<pre>";
// print_r($_SESSION['cart']);
// echo "</pre>";

include 'connect.php';

if(empty($_SESSION['cart']) or !isset($_SESSION['cart']))
{
    echo "<script>alert('Cart is empty.')</script>";
    echo "<script>location='index.php'</script>";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
    
<?php include 'menu.php' ?>

    <section class="content">
        <div class="container">
            <h1>Cart</h1>
            <hr>
            <table class="table table-bordered">
                <thread>
                    <tr>
                        <th>No</th>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Sum</th>
                        <th>Action</th>
                    </tr>
                </thread>
                <tbody>
                    <?php $num=1 ?>
                    <?php foreach ($_SESSION['cart'] as $id_produk => $jumlah): ?>
                        <!-- tampilkan produk -->
                    <?php 
                    $ambil = $connect->query("SELECT*FROM produk where id_produk='$id_produk'");
                    $col = $ambil->fetch_assoc();
                    $subharga = $col['harga_produk']*$jumlah;
                    ?>    
                    <tr>
                        <td><?php echo $num ?></td>
                        <td><?php echo $col['nama_produk'] ?></td>
                        <td>Rp. <?php echo number_format($col['harga_produk']) ?></td>
                        <td><?php echo $jumlah ?></td>
                        <td>Rp. <?php echo number_format($subharga) ?></td>
                        <td>
                            <a href="hapuscart.php?id=<?php echo $id_produk ?>" class="btn btn-danger">Remove</a>
                        </td>
                    </tr>
                    <?php $num++ ?>
                    <?php endforeach ?>
                </tbody>
            </table>

            <a href="index.php" class="btn btn-default">Continue Shopping</a>
            <a href="checkout.php" class="btn btn-primary">Checkout</a>
        </div>

    </section>


</body>
</html>