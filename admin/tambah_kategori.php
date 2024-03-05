<?php
// Include koneksi ke database
include "../koneksi.php";


// Inisialisasi variabel error
$error = '';

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $nama_kategori = $_POST["nama_kategori"];

    // Validasi jika nama kategori kosong
    if (empty($nama_kategori)) {
        $error = "Nama kategori tidak boleh kosong.";
    } else {
        // Jika tidak ada error, tambahkan kategori ke database
        $query = "INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')";
        if ($koneksi->query($query)) {
            // Redirect ke halaman kategori setelah berhasil tambah
            header("Location: index.php?halaman=kategori");
            exit;
        } else {
            // Jika terjadi kesalahan saat eksekusi query
            $error = "Terjadi kesalahan. Silakan coba lagi.";
        }
    }
}
?>
        <h2>Tambah Kategori</h2>
        <hr>
        <!-- Form tambah kategori -->
        <form method="POST">
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" class="form-control" name="nama_kategori">
            </div>
            <!-- Tampilkan pesan error jika ada -->
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php?halaman=kategori" class="btn btn-danger">Batal</a>
        </form>

