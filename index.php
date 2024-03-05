<?php
session_start();
//koneksi  ke database
include 'koneksi.php';

?>

<html>
<head>
<title>Erwin Store</title>
<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<?php include 'menu.php'; ?>
<div class="container-fluid" style="background-color: #0195DA; color:#FFFFFF; display:flex; align-items:center; justify-content:space-between; padding:0 250px;">
    <img src="admin/assets/img/market.png" alt="..." style="width:500px;">
    <div class="tittle" style="width:500px;">
        <h1>PROMO SUPER BESAR ERWIN STORE</h1>
        <p>Dapatkan Kemudahan Berbelanja Barang Kebutuhan Pokok Anda Secara Online dengan Erwin Store, Tempatnya untuk Menemukan Kualitas Terbaik dan Harga yang Terjangkau untuk Setiap Produk yang Anda Butuhkan dalam Kehidupan Sehari-hari!</p>
    </div>
</div>
<div class="container-fluid" style="display:flex; justify-content:center; align-items:center; background-color:#B3DFF4;">
    <div class="container" style="display:flex; justify-content:space-between; align-items:center;">
        <!-- <h2><b>Promo Geratis Ongkir</b></h2> -->
        <img src="admin/assets/img/diskon.png" alt="">
        <img src="admin/assets/img/25.png" alt="">
        <img src="admin/assets/img/free.png" alt="">
    </div>
</div>
<section class="konten">
<div class="container">
    <h1>Produk Terbaru</h1>
    <div class="row">

        <?php $ambil = $koneksi->query("SELECT * FROM produk");?>
        <?php while($perproduk = $ambil->fetch_assoc()){?>
        <div class="col-md-3">
            <div class="thumbnail">
                <img style="max-height: 200px;" src="foto_produk/<?php echo $perproduk['foto_produk'];?>" alt="" class="img-thumbnail">
                <div class="caption">
                    <h3><?php echo $perproduk['nama_produk'];?></h3>
                    <h5>Rp. <?php echo number_format($perproduk['harga_produk']);?>,00</h5>
                    <a style="width: 70%;" href="beli.php?id=<?php echo $perproduk['id_produk'];?> " class="btn btn-success">Beli <i class="fa fa-shopping-cart"></i></a>
                    <a style="width: 25%;" href="detail.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-default">Detail</a>
                </div>
            </div>
        </div>
        <?php 
        } 
        ?>
    
    </div>
</div>

</section>
<script src="admin/assets/js/bootstrap.min.js"></script>
</body>
</html>

<?php 
include 'footer.php';
?>