<?php
session_start();
include 'connect.php';
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

    <section class="content">
        <div class="container">
        <h2>Transaction Details</h2>

<?php 
$ambil = $connect->query("SELECT*FROM pembelian JOIN pelanggan
    ON pembelian.id_pelanggan = pelanggan.id_pelanggan
    WHERE pembelian.id_pembelian = '$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<!-- <h1>data org yg beli $detail</h1>
<pre><?php print_r($detail) ?></pre>

<h1>data org yg login di session</h1>
<pre><?php print_r($_SESSION) ?></pre> -->

<!-- pelanggan yg beli != pelanggan yg login, redirect to history.php, bcs has no right to see other's receent purchases -->
<?php
$idpelanggan_beli = $detail['id_pelanggan'];
$idpelanggan_login = $_SESSION['pelanggan']['id_pelanggan'];

if($idpelanggan_beli !== $idpelanggan_login)
{
    echo "<script>location='history.php'</script>";
    exit();
}

?>


<strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>


<div class="row">
    <div class="col-md-4">
        <h3>Transaction</h3>
        <strong>Transaction No. : <?php echo $detail['id_pembelian'] ?></strong> <br>
        Date: <?php echo $detail['tanggal_pembelian'] ?> <br>
        Total: Rp. <?php echo number_format($detail['total_pembelian']) ?>
    </div>
    <div class="col-md-4">
        <h3>Customer Details</h3>
        <strong><?php echo $detail['nama_pelanggan'] ?></strong> <br>
        <p>
            <?php echo $detail['telepon_pelanggan']; ?> <br>
            <?php echo $detail['email_pelanggan']; ?>
        </p>
    </div>
    <div class="col-md-4">
        <h3>Courier</h3>
        <strong><?php echo $detail['courier'] ?></strong> <br>
        Ongkos kirim: Rp. <?php echo number_format($detail['tarif']) ?> <br>
        Alamat: <?php echo $detail['alamat_pengiriman'] ?>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Berat</th>
            <th>Jumlah</th>
            <th>Subberat</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1 ?>
        <?php $ambil = $connect->query("SELECT*FROM pembelian_produk WHERE id_pembelian = '$_GET[id]'"); ?>
        <?php while($col = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $col['nama']; ?></td>
            <td>Rp. <?php echo number_format($col['harga']); ?></td>
            <td><?php echo number_format($col['berat']); ?> g</td>
            <td><?php echo $col['jumlah']; ?></td>
            <td><?php echo number_format($col['subberat']); ?> g</td>
            <td>Rp. <?php echo number_format($col['subharga']); ?></td>
            
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>

<div class="row">
    <div class="col-md-7">
        <div class="alert alert-info">
            <p>
                Please make a payment of Rp. <?php echo number_format($detail['total_pembelian']); ?> to <br>
                <strong>BANK MANDIRI 137-001088-3276, John Doe.</strong>
            </p>
            <p>Go to <a href="history.php"><strong>Shopping History</strong></a> to confirm payment.</p>
        </div>
    </div>
</div>



        </div>
    </section>




</body>
</html>