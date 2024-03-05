<?php
session_start();
include 'koneksi.php';

// Check if user is logged in, if not redirect to login page
if (!isset($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan login terlebih dahulu');</script>";
    echo "<script>window.location='login.php';</script>";
    exit;
}

// Retrieve user data from session
$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
$query = "SELECT * FROM pelanggan WHERE id_pelanggan = $id_pelanggan";
$result = $koneksi->query($query);
$profil = $result->fetch_assoc();

// Check if user has a profile picture, if not use default picture
if ($profil['foto_pelanggan'] == NULL) {
    $foto_pelanggan = 'profil/default.png';
} else {
    $foto_pelanggan = $profil['foto_pelanggan'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil Pelanggan</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php include 'menu.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="display:flex; flex-direction:column; align-items:center; border:2px solid #000000; margin-top:30px; padding-bottom:30px;">
            <h2>Profil</h2>
            <div>
                <img src="<?php echo $foto_pelanggan; ?>" alt="Foto Pelanggan" class="img-responsive" style="max-width: 200px; max-height: 200px; border-radius:100%;">
            </div><br>
            <table class="table">
                <tr>
                    <th>Nama Pelanggan</th>
                    <td><?php echo $profil['nama_pelanggan']; ?></td>
                </tr>
                <tr>
                    <th>Email Pelanggan</th>
                    <td><?php echo $profil['email_pelanggan']; ?></td>
                </tr>
                <tr>
                    <th>Telepon Pelanggan</th>
                    <td><?php echo $profil['telephon_pelanggan']; ?></td>
                </tr>
                <tr>
                    <th>Alamat Pelanggan</th>
                    <td><?php echo $profil['alamat_pelanggan']; ?></td>
                </tr>
            </table>
            <a href="edit_profil.php?id=<?php echo $profil['id_pelanggan']; ?>" class="btn btn-primary">Edit Profil</a>
        </div>
    </div>
</div>

</body>
</html>
