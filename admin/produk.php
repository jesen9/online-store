<h1>Product Details</h1>

<a href="index.php?halaman=tambahproduk" class="btn btn-primary btn-lg"><i class="fa fa-plus"></i> Add Product</a>
<hr>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Category</th>
            <th>Name</th>
            <th>Price</th>
            <th>Weight(grams)</th>
            <th>Stock</th>
            <th>Photo</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1 ?>
        <?php $ambil = $connect->query("SELECT * FROM produk a join kategori b on a.id_kategori = b.id_kategori"); ?>
        <?php while($col = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $col['nama_kategori']; ?></td>
            <td><?php echo $col['nama_produk']; ?></td>           
            <td>Rp. <?php echo number_format($col['harga_produk']); ?></td>
            <td><?php echo $col['berat_produk']; ?></td>
            <td><?php echo $col['stok_produk']; ?></td>
            <td>
                <img src="../foto_produk/<?php echo $col['foto_produk']; ?>" width="100">
            </td>
            <td><?php echo $col['deskripsi_produk']; ?></td>
            <td>
                <a href="index.php?halaman=hapusproduk&id=<?php echo $col['id_produk']; ?>" class="btn-danger btn">Remove</a>
                <a href="index.php?halaman=ubahproduk&id=<?php echo $col['id_produk']; ?>" class="btn-warning btn">Edit</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>
