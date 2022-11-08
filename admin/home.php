<h2>Welcome <?php echo $_SESSION['admin']['nama_lengkap'] ?></h2>
<pre><?php print_r($_SESSION['admin']); ?></pre>
<a href="index.php?halaman=changepassadm" class="btn btn-danger btn-lg">Change password</a>