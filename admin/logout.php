<?php
session_start();
session_destroy();
echo "<script>alert('Logged out.');</script>";
echo "<script>location='login.php';</script>";
?>

