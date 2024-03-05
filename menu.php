<nav class="navbar sticky-top navbar-default" style="background-color: #0195DA;">
    <a class="navbar-brand" href="index.php" style="color: #FFFFFF;"><b>ERWIN STORE</b></a>

    <div class="container" style="display:flex;">
        <ul class="nav navbar-nav">
            <li><a href="index.php" style="color: #FFFFFF;">Home</a></li>
            <!-- <li><a href="keranjang.php" style="color: #FFFFFF;">Keranjang</a></li> -->
            <?php if (isset($_SESSION["pelanggan"])) : ?>
                <li><a href="logout.php" style="color: #FFFFFF;">Logout</a></li>
                <li><a href="riwayat.php" style="color: #FFFFFF;">Riwayat Belanja</a></li>
            <?php else : ?>
                <li><a href="login.php" style="color: #FFFFFF;">Login</a></li>
                <li><a href="daftar.php" style="color: #FFFFFF;">Daftar</a></li>
            <?php endif ?>
            <li><a href="checkout.php" style="color: #FFFFFF;">Checkout</a></li>

        </ul>
        <form action="pencarian.php" method="GET" class="navbar-form navbar-center">
            <input type="text" class="form-control" name="keyword">
            <button class="btn bnt-prymary">Cari</button>
        </form>
        <div style="display:flex; align-items:center; margin-left:auto;">
            <div style="width:30px; height:30px; background-color:#FFFFFF; border-radius:100%; display:flex; align-items:center; justify-content:center; margin-right:20px;">
                <a href="keranjang.php" style="color: #0195DA;"><i class="fa fa-shopping-cart"></i></a>
            </div>
            <div style="width:30px; height:30px; background-color:#FFFFFF; border-radius:100%; display:flex; align-items:center; justify-content:center;">
                <a href="profil.php" style="color: #0195DA;"><i class="fa fa-user"></i></a>
            </div>
        </div>
    </div>
</nav>