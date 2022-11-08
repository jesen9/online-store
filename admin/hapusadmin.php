<?php
$ambil = $connect->query("SELECT * FROM admin where id_admin='$_GET[id]'");
$col = $ambil->fetch_assoc();


$connect->query("DELETE FROM admin where id_admin='$_GET[id]'");

echo "<script>alert('Admin Successfully Removed');</script>";
echo "<script>location='index.php?halaman=manageadmin';</script>";



?>