<?php
session_start();
include 'connect.php';

// if not logged in, redirect to login.php
if(!isset($_SESSION['pelanggan']))
{
    echo "<script>alert('Please Log In.')</script>";
    echo "<script>location='login.php'</script>";
}
if(empty($_SESSION['cart']) or !isset($_SESSION['cart']))
{
    echo "<script>alert('Cart is empty.')</script>";
    echo "<script>location='index.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
        <!-- navbar -->
        <?php include 'menu.php' ?>

<!-- <pre>
    <?php print_r($_SESSION['pelanggan']) ?>
</pre> -->

<section class="content">
    <div class="container">
        <h1>Checkout</h1>
        <hr>
        <table class="table table-bordered">
            <thread>
                <tr>
                    <th>No</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Sum</th>
                </tr>
            </thread>
            <tbody>
                <?php $num=1 ?>
                <?php $totalbelanja=0 ?>
                <?php foreach ($_SESSION['cart'] as $id_produk => $jumlah): ?>
                    <!-- tampilkan produk -->
                <?php 
                $ambil = $connect->query("SELECT*FROM produk where id_produk='$id_produk'");
                $col = $ambil->fetch_assoc();
                $subharga = $col['harga_produk']*$jumlah;
                ?>    
                <tr>
                    <td><?php echo $num ?></td>
                    <td><?php echo $col['nama_produk'] ?></td>
                    <td>Rp. <?php echo number_format($col['harga_produk']) ?></td>
                    <td><?php echo $jumlah ?></td>
                    <td>Rp. <?php echo number_format($subharga) ?></td>
                    
                </tr>
                <?php $num++ ?>
                <?php $totalbelanja+=$subharga ?>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total</th>
                    <th>Rp. <?php echo number_format($totalbelanja) ?></th>
                </tr>
            </tfoot>
        </table>

        <form action="" method="post">
            
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                    <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan'] ?>" class="form-control">
                </div>
                </div>
                <div class="col-md-4">
                    <select class="form-control" name="id_ongkir" required>
                        <option disabled selected value="">Choose courier</option>
                        <?php 
                        $ambil = $connect->query("SELECT*FROM ongkir");
                        while ($perongkir = $ambil->fetch_assoc()){
                        ?>
                        <option value="<?php echo $perongkir['id_ongkir'] ?>">
                            <?php echo $perongkir['courier'] ?> - 
                            Rp. <?php echo number_format($perongkir['tarif']) ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="">Shipping Address</label>
                <textarea name="alamat_pengiriman" class="form-control" placeholder="Enter shipping address(with postal code)"></textarea>
            </div>
            <button class="btn btn-primary" name="checkout">Checkout</button>
        </form>

        <?php
        if(isset($_POST['checkout']))
        {
            $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
            $id_ongkir = $_POST['id_ongkir'];
            $tanggal_pembelian = date("Y-m-d");
            $alamat_pengiriman = $_POST['alamat_pengiriman'];

            $ambil = $connect->query("SELECT*FROM ongkir where id_ongkir='$id_ongkir'");
            $arrayongkir = $ambil->fetch_assoc();
            $courier = $arrayongkir['courier'];
            $tarif = $arrayongkir['tarif'];

            $total_pembelian = $totalbelanja + $tarif;

            //store data to table
            $connect->query("INSERT INTO pembelian(id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian, courier, tarif, alamat_pengiriman) values ('$id_pelanggan', '$id_ongkir', '$tanggal_pembelian', '$total_pembelian', '$courier', '$tarif', '$alamat_pengiriman')");

            //get id_pembelian
            $id_pembelian_barusan = $connect->insert_id;
            foreach($_SESSION['cart'] as $id_produk => $jumlah)
            {
                //get product data based on id_produk
                $ambil = $connect->query("SELECT*FROM produk where id_produk='$id_produk'");
                $perproduk = $ambil->fetch_assoc();

                $nama = $perproduk['nama_produk'];
                $harga = $perproduk['harga_produk'];
                $berat = $perproduk['berat_produk'];

                $subberat = $perproduk['berat_produk']*$jumlah;
                $subharga = $perproduk['harga_produk']*$jumlah;

                $connect->query("INSERT INTO pembelian_produk(id_pembelian, id_produk, nama, harga, berat, subberat, subharga, jumlah) values ('$id_pembelian_barusan', '$id_produk', '$nama', '$harga','$berat','$subberat','$subharga','$jumlah')");

                //update stock with js
                $connect->query("UPDATE produk set stok_produk=stok_produk - $jumlah where id_produk='$id_produk'");
            }

            //empty cart after checkout
            unset($_SESSION['cart']);

            //redirect to nota
            echo "<script>alert('Purchase success.')</script>";
            echo "<script>location='nota.php?id=$id_pembelian_barusan'</script>";


        }
        ?>

    </div>

</section>

<!-- <pre><?php print_r($_SESSION['pelanggan']) ?></pre>
<pre><?php print_r($_SESSION['cart']) ?></pre> -->




</body>
</html>