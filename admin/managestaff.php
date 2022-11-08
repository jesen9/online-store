<h1>Staff</h1>
<a href="index.php?halaman=addstaff" class="btn btn-primary btn-lg"><i class="fa fa-plus"></i> Add Staff</a>
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
        <?php $ambil = $connect->query("SELECT*FROM staff"); ?>
        <?php while($col = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $col['staff_name']; ?></td>
            <td><?php echo $col['staff_username']; ?></td>
            <td><?php echo $col['staff_gender']; ?></td>
            <td><?php echo $col['staff_address']; ?></td>
            <td><?php echo $col['staff_email']; ?></td>
            <td><?php echo $col['staff_phone']; ?></td>
            <td>
                <a href="index.php?halaman=hapusstaff&id=<?php echo $col['id_staff']; ?>" class="btn-danger btn">Remove</a>
                <a href="index.php?halaman=ubahstaff&id=<?php echo $col['id_staff']; ?>" class="btn-warning btn">Edit</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>