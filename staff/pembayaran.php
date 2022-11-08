<h2>Payment Information</h2>

<?php 

$id_pembelian = $_GET['id'];


$ambil = $connect->query("SELECT*FROM pembayaran where id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detail);
// echo "</pre>";

?>

<div class="row">
    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Name</th>
                <td><?php echo $detail['nama'] ?></td>
            </tr>
            <tr>
                <th>Bank</th>
                <td><?php echo $detail['bank'] ?></td>
            </tr>
            <tr>
                <th>Amount</th>
                <td>Rp. <?php echo number_format($detail['jumlah']) ?></td>
            </tr>
            <tr>
                <th>Date</th>
                <td><?php echo $detail['tanggal'] ?></td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <img src="../receipt/<?php echo $detail['bukti'] ?>" alt="" class="img-responsive">
    </div>
</div>

<form action="" method="post">
    <div class="form-group">
        <label for="">No Resi Pengiriman</label>
        <input type="text" class="form-control" name="resi" required>
    </div>
    <div class="form-group">
        <label for="">Status</label>
        <select class="form-control" name="status" required>
            <option value="" disabled selected>Choose Status</option>
            <option value="Paid">Paid</option>
            <option value="Shipped">Shipped</option>
            <option value="Cancelled">Cancelled</option>
        </select>
    </div>
    <button class="btn btn-primary" name="proses">Process</button>
</form>

<?php
if(isset($_POST['proses']))
{
    $resi = $_POST['resi'];
    $status = $_POST['status'];
    $connect->query("UPDATE pembelian set resi_pengiriman='$resi', status_pembelian='$status' where id_pembelian='$id_pembelian'");

    echo "<script>alert('Payment Information updated.')</script>";
    echo "<script>location='index.php?halaman=pembelian'</script>";
}
?>