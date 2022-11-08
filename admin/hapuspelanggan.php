<?php
$ambil = $connect->query("SELECT * FROM pelanggan where id_pelanggan='$_GET[id]'");
$col = $ambil->fetch_assoc();


$connect->query("DELETE FROM pelanggan where id_pelanggan='$_GET[id]'");

echo "<script>alert('Client Successfully Removed');</script>";
echo "<script>location='index.php?halaman=pelanggan';</script>";



?>