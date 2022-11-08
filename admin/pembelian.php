<h2>Data Pembelian</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Customer Name</th>
            <th>Date</th>
            <th>Status</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1 ?>
        <?php $ambil = $connect->query("SELECT*FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan"); ?>
        <?php while($col = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $col['nama_pelanggan']; ?></td>
            <td><?php echo $col['tanggal_pembelian']; ?></td>
            <td><?php echo $col['status_pembelian']; ?></td>
            <td>Rp. <?php echo number_format($col['total_pembelian']); ?></td>
            <td>
                <a href="index.php?halaman=detail&id=<?php echo $col['id_pembelian']; ?>" class="btn-info btn">details</a>

                <?php if($col['status_pembelian']!=="Pending"): ?>
                    <a href="index.php?halaman=pembayaran&id=<?php echo $col['id_pembelian'] ?>" class="btn btn-success">View Payment</a>
                <?php endif ?>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>