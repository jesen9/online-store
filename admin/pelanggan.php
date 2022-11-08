<h2>Clients</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1 ?>
        <?php $ambil = $connect->query("SELECT*FROM pelanggan"); ?>
        <?php while($col = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $col['nama_pelanggan']; ?></td>
            <td><?php echo $col['email_pelanggan']; ?></td>
            <td><?php echo $col['telepon_pelanggan']; ?></td>
            <td>
                <a href="index.php?halaman=hapuspelanggan&id=<?php echo $col['id_pelanggan']; ?>" class="btn-danger btn">Remove</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>