<!-- navbar -->
<nav class="navbar navbar-default">
    <div class="container">
        <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="checkout.php">Checkout</a></li>
            <?php if(isset($_SESSION['pelanggan'])): ?>
                <li><a href="history.php">Shopping History</a></li>
                <li><a href="logout.php">Log Out</a></li>
                <li><a href="profile.php"><?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?></a></li>
            <?php else: ?>
                <li><a href="login.php">Log In</a></li>
                <li><a href="signUp.php">Sign Up</a></li>
            <?php endif ?>
            
            
        </ul>

        <form action="search.php" class="navbar-form navbar-right" method="get">
            <input type="text" class="form-control" name="keyword" placeholder="Search for categories, products, etc.">
            <button class="btn btn-primary">Search</button>
        </form>
    </div>
</nav>