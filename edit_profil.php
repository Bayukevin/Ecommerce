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

// Update user profile
if (isset($_POST['simpan'])) {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $email_pelanggan = $_POST['email_pelanggan'];
    $telephon_pelanggan = $_POST['telephon_pelanggan'];
    $alamat_pelanggan = $_POST['alamat_pelanggan'];

    // Check if a file was uploaded
    if ($_FILES['foto']['name']) {
        $foto_name = $_FILES['foto']['name'];
        $foto_tmp = $_FILES['foto']['tmp_name'];
        $foto_size = $_FILES['foto']['size'];
        $foto_error = $_FILES['foto']['error'];

        // Get file extension
        $foto_ext = strtolower(pathinfo($foto_name, PATHINFO_EXTENSION));

        // Allowed extensions
        $allowed = array('jpg', 'jpeg', 'png');

        // Check if extension is allowed
        if (in_array($foto_ext, $allowed)) {
            // Generate unique filename
            $foto_new_name = uniqid('', true) . '.' . $foto_ext;

            // Destination path for uploaded file
            $foto_dest = 'profil/' . $foto_new_name;

            // Move uploaded file to destination
            if (move_uploaded_file($foto_tmp, $foto_dest)) {
                // Update user profile with new photo
                $koneksi->query("UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', email_pelanggan='$email_pelanggan', telephon_pelanggan='$telephon_pelanggan', alamat_pelanggan='$alamat_pelanggan', foto_pelanggan='$foto_dest' WHERE id_pelanggan='$id_pelanggan'");
                echo "<script>alert('Profil berhasil diperbarui');</script>";
                echo "<script>window.location='profil.php';</script>";
                exit;
            } else {
                echo "<script>alert('Gagal mengunggah foto');</script>";
            }
        } else {
            echo "<script>alert('Ekstensi file tidak diizinkan');</script>";
        }
    } else {
        // Update user profile without changing the photo
        $koneksi->query("UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', email_pelanggan='$email_pelanggan', telephon_pelanggan='$telephon_pelanggan', alamat_pelanggan='$alamat_pelanggan' WHERE id_pelanggan='$id_pelanggan'");
        echo "<script>alert('Profil berhasil diperbarui');</script>";
        echo "<script>window.location='profil.php';</script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profil</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php include 'menu.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2>Edit Profil</h2>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama_pelanggan" value="<?php echo $profil['nama_pelanggan']; ?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email_pelanggan" value="<?php echo $profil['email_pelanggan']; ?>">
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" class="form-control" name="telephon_pelanggan" value="<?php echo $profil['telephon_pelanggan']; ?>">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat_pelanggan"><?php echo $profil['alamat_pelanggan']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Ganti Foto</label>
                    <input type="file" class="form-control" name="foto">
                </div>
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
