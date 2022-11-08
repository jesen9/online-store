<?php
session_start();
$id_produk = $_GET['id'];


if(isset($_SESSION['cart'][$id_produk]))
{
    $_SESSION['cart'][$id_produk]+=1;
}
else
{
    $_SESSION['cart'][$id_produk] = 1;
}

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

echo "<script>alert('Product added to cart.')</script>";
echo "<script>location='index.php'</script>";
?>