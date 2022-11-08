<?php 
session_start();
include 'connect.php';

$id_pembelian = $_GET['id'];

$ambil = $connect->query("SELECT*FROM pembayaran left join pembelian on pembayaran.id_pembelian = pembelian.id_pembelian where pembelian.id_pembelian='$id_pembelian'");
$detbay = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detbay);
// echo "</pre>";

if(empty($detbay))
{
    echo "<script>alert('No payment info.')</script>";
    echo "<script>location='history.php'</script>";
    exit();
}


if($_SESSION['pelanggan']['id_pelanggan']!==$detbay['id_pelanggan'])
{
    echo "<script>alert('Illegal action.')</script>";
    echo "<script>location='history.php'</script>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Payment</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
    <!-- navbar -->
    <?php include 'menu.php' ?>
    <div class="container">
        <h3>View Payment</h3>
        <div class="col-md-6">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <td><?php echo $detbay['nama'] ?></td>
                </tr>
                <tr>
                    <th>Bank</th>
                    <td><?php echo $detbay['bank'] ?></td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td><?php echo $detbay['tanggal'] ?></td>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td>Rp. <?php echo number_format($detbay['jumlah']) ?></td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <img src="receipt/<?php echo $detbay['bukti'] ?>" alt="" class="img-responsive">
        </div>
    </div>
</body>
</html>