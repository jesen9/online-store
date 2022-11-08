<?php
$ambil = $connect->query("SELECT * FROM staff where id_staff='$_GET[id]'");
$col = $ambil->fetch_assoc();


$connect->query("DELETE FROM staff where id_staff='$_GET[id]'");

echo "<script>alert('Staff Successfully Removed');</script>";
echo "<script>location='index.php?halaman=managestaff';</script>";



?>