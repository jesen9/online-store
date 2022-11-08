<?php
$all = array();
$from="-";
$to="-";
if(isset($_POST['send']))
{
    $from = $_POST['tglm'];
    $to = $_POST['tgls'];
    $ambil = $connect->query("SELECT*FROM pembelian a left join pelanggan b on a.id_pelanggan = b.id_pelanggan where tanggal_pembelian between '$from' and '$to'");
    while($col = $ambil->fetch_assoc())
    {
        $all[]=$col;
    }

    // echo "<pre>";
    // print_r($all);
    // echo "</pre>";
}

?>







<h2>Purchase Report</h2>
<p>From <?php echo $from ?> to <?php echo $to ?> </p>
<hr>

<form action="" method="post">
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="">From</label>
                <input type="date" class="form-control" name="tglm" value="<?php echo $from ?>">
            </div>
        </div>
        <div class="col-md-5">
            <label for="">To</label>
            <input type="date" class="form-control" name="tgls" value="<?php echo $to ?>">
        </div>
        <div class="col-md-2">
            <label for="">&nbsp;</label> <br>
            <button class="btn btn-primary" name="send">View</button>
        </div>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Customer</th>
            <th>Date</th>
            <th>Status</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php $total=0; ?>
        <?php foreach ($all as $key => $value): ?>
        <?php $total += $value['total_pembelian']; ?>
        <tr>
            <td><?php echo $key+1; ?></td>
            <td><?php echo $value['nama_pelanggan']; ?></td>
            <td><?php echo $value['tanggal_pembelian']; ?></td>
            <td><?php echo $value['status_pembelian']; ?></td>
            <td>Rp. <?php echo number_format($value['total_pembelian']); ?></td>            
        </tr>
        <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4">Total</th>
            <th>Rp. <?php echo number_format($total) ?></th>
        </tr>
    </tfoot>
</table>