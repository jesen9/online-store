<h1>Admin</h1>
<a href="index.php?halaman=addadmin" class="btn btn-primary btn-lg"><i class="fa fa-plus"></i> Add Admin</a>
<hr>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Username</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1 ?>
        <?php $ambil = $connect->query("SELECT*FROM `admin`"); ?>
        <?php while($col = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $col['nama_lengkap']; ?></td>
            <td><?php echo $col['username']; ?></td>
            <td><?php echo $col['admin_gender']; ?></td>
            <td><?php echo $col['admin_address']; ?></td>
            <td><?php echo $col['admin_email']; ?></td>
            <td><?php echo $col['admin_phone']; ?></td>
            <td>
                <a href="index.php?halaman=hapusadmin&id=<?php echo $col['id_admin']; ?>" class="btn-danger btn">Remove</a>
                <a href="index.php?halaman=ubahadmin&id=<?php echo $col['id_admin']; ?>" class="btn-warning btn">Edit</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>