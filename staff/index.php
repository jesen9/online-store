<?php
session_start();
$connect = new mysqli("localhost","root","","onlinestoredb");

if(!isset($_SESSION['staff']))
{
    echo "<script>alert('You must log in first');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}

?>




<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Store Staff</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Staff</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li><a href="index.php"><i class="fa fa-dashboard "></i> Home</a></li>
                    <li><a href="index.php?halaman=category"><i class="fa fa-tag"></i> Categories</a></li>
                    <li><a href="index.php?halaman=produk"><i class="fa fa-wrench"></i> Manage Products</a></li>
                    <li><a href="index.php?halaman=pembelian"><i class="fa fa-shopping-cart"></i> Payment/Purchase Info</a></li>
                    <li><a href="index.php?halaman=laporan_pembelian"><i class="fa fa-file"></i> Sales Report</a></li>
                    <li><a href="index.php?halaman=logout"><i class="fa fa-sign-out"></i> Log Out</a></li>
                     
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php 
                if(isset($_GET['halaman']))
                {
                    if($_GET['halaman']=="produk")
                    {
                        include 'produk.php';
                    }
                    else if($_GET['halaman']=="pembelian")
                    {
                        include 'pembelian.php';
                    }
                    else if($_GET['halaman']=="detail")
                    {
                        include 'detail.php';
                    }
                    else if($_GET['halaman']=="tambahproduk")
                    {
                        include 'tambahproduk.php';
                    }
                    else if($_GET['halaman']=="hapusproduk")
                    {
                        include 'hapusproduk.php';
                    }
                    else if($_GET['halaman']=="ubahproduk")
                    {
                        include 'ubahproduk.php';
                    }
                    else if($_GET['halaman']=="logout")
                    {
                        include 'logout.php';
                    }
                    else if($_GET['halaman']=="pembayaran")
                    {
                        include 'pembayaran.php';
                    }
                    else if($_GET['halaman']=="laporan_pembelian")
                    {
                        include 'laporan_pembelian.php';
                    }
                    else if($_GET['halaman']=="category")
                    {
                        include 'category.php';
                    }
                    else if($_GET['halaman']=="addcategory")
                    {
                        include 'addcategory.php';
                    }
                    else if($_GET['halaman']=="changepassStf")
                    {
                        include 'changepassStf.php';
                    }
                }
                else
                {
                    include 'home.php';
                }
                ?>      
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
