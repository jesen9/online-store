<?php
session_start();
include 'connect.php';

if(!isset($_SESSION['pelanggan']) or empty($_SESSION['pelanggan']))
{
    echo "<script>alert('Please Log in.')</script>";
    echo "<script>location='login.php'</script>";
    exit();
}

//get id_pembelian from url
$idpem = $_GET['id'];
$ambil = $connect->query("SELECT*FROM pembelian where id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

//get id_pelanggan yg beli
$id_pelanggan_beli = $detpem['id_pelanggan'];
$id_pelanggan_login = $_SESSION['pelanggan']['id_pelanggan'];

if($id_pelanggan_login !== $id_pelanggan_beli)
{
    echo "<script>alert('Don\'t be naughty!')</script>";
    echo "<script>location='history.php'</script>";
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
        <div class="container">
            <h2>Payment Confirmation</h2>
            <p>Send your payment receipt here</p>
            <div class="alert alert-info">Total tagihan Anda <strong>Rp. <?php echo number_format($detpem['total_pembelian']) ?></strong></div>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Name of Depositor</label>
                    <input type="text" class="form-control" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="">Bank</label>
                    <input type="text" class="form-control" name="bank" required>
                </div>
                <div class="form-group">
                    <label for="">Amount</label>
                    <input type="number" class="form-control" name="jumlah" min="1" required>
                </div>
                <div class="form-group">
                    <label for="">Receipt Photo</label>
                    <input type="file" class="form-control" name="bukti" required>
                    <p class="text-danger">Receipt photo must be in JPG format and 2MB max</p>
                </div>
                <button class="btn btn-primary" name="send">Send</button>
            </form>
        </div>
    
<?php
if(isset($_POST['send']))
{
    $namabukti = md5($_FILES['bukti']['name']).'.'.pathinfo($_FILES['bukti']['name'],PATHINFO_EXTENSION);
    $lokasibukti = $_FILES['bukti']["tmp_name"];
    $fixedname = date("YmdHis").$namabukti;
    move_uploaded_file($lokasibukti, "receipt/$fixedname");

    $nama = $_POST['nama'];
    $bank = $_POST['bank'];
    $jumlah = $_POST['jumlah'];
    $tanggal = date("Y-m-d");

    //simpan pembayaran
    $connect->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti) values ('$idpem', '$nama', '$bank', '$jumlah', '$tanggal', '$fixedname')");

    //update payment status
    $connect->query("UPDATE pembelian set status_pembelian='Payment receipt sent' where id_pembelian='$idpem'");
    echo "<script>alert('Thank you. Your receipt will be processed shortly.')</script>";
    echo "<script>location='history.php'</script>";
}
?>


</body>
</html>
