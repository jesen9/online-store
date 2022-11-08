<?php
$ambil = $connect->query("SELECT * FROM produk where id_produk='$_GET[id]'");
$col = $ambil->fetch_assoc();
$fotoproduk = $col['foto_produk'];
if(file_exists("../foto_produk/$fotoproduk"))
{
    unlink("../foto_produk/$fotoproduk");
}

$connect->query("DELETE FROM produk where id_produk='$_GET[id]'");

echo "<script>alert('Product Successfully Removed');</script>";
echo "<script>location='index.php?halaman=produk';</script>";



?>