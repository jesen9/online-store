<?php
session_start();
include 'connect.php';

if(!isset($_SESSION['pelanggan']) or empty($_SESSION['pelanggan']))
{
    echo "<script>alert('Please Log in.')</script>";
    echo "<script>location='login.php'</script>";
    exit();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
        <!-- navbar -->
        <?php include 'menu.php' ?>

        <!-- <pre><?php print_r($_SESSION) ?></pre> -->
    <section class="riwayat">
        <div class="container">
            <h3><?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>'s Shopping History</h3>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $num=1 ?>
                    <?php
                    $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];

                    $ambil = $connect->query("SELECT*FROM pembelian where id_pelanggan='$id_pelanggan'");
                    while($col = $ambil->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $num ?></td>
                        <td><?php echo $col['tanggal_pembelian'] ?></td>
                        <td>
                            <?php echo $col['status_pembelian'] ?>
                            <br>
                            <?php if(!empty($col['resi_pengiriman'])): ?>
                            Resi: <?php echo $col['resi_pengiriman']; ?>
                            <?php endif ?>
                        </td>
                        <td>Rp. <?php echo number_format($col['total_pembelian']) ?></td>
                        <td>
                            <a href="nota.php?id=<?php echo $col['id_pembelian'] ?>" class="btn btn-info">Details</a>
                            <?php if($col['status_pembelian']=="Pending"): ?>
                            <a href="pembayaran.php?id=<?php echo $col['id_pembelian'] ?>" class="btn btn-success">
                                Payment
                            </a>
                            <?php else: ?>
                            <a href="lihat_pembayaran.php?id=<?php echo $col['id_pembelian'] ?>" class="btn btn-warning">
                                View Payment
                            </a>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php $num++ ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>

</body>
</html>