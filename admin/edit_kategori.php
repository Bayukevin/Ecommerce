<?php
// Include koneksi ke database
include "../koneksi.php";

// Inisialisasi variabel error
$error = '';

// Cek apakah parameter id_kategori telah diterima
if (isset($_GET['id_kategori'])) {
    $id_kategori = $_GET['id_kategori'];

    // Ambil data kategori berdasarkan id_kategori
    $query = "SELECT * FROM kategori WHERE id_kategori = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id_kategori);
    $stmt->execute();
    $result = $stmt->get_result();
    $kategori = $result->fetch_assoc();

    // Cek apakah kategori ditemukan
    if (!$kategori) {
        echo "Kategori tidak ditemukan.";
        exit;
    }

    // Jika form disubmit, update data kategori
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil nilai dari form dan bersihkan dari input yang tidak diinginkan
        $nama_kategori = htmlspecialchars(trim($_POST["nama_kategori"]));

        // Validasi jika nama kategori kosong
        if (empty($nama_kategori)) {
            $error = "Nama kategori tidak boleh kosong.";
        } else {
            // Query untuk memperbarui kategori di database menggunakan prepared statement
            $query_update = "UPDATE kategori SET nama_kategori = ? WHERE id_kategori = ?";
            $stmt_update = $koneksi->prepare($query_update);
            $stmt_update->bind_param("si", $nama_kategori, $id_kategori);

            // Eksekusi query
            if ($stmt_update->execute()) {
                // Redirect ke halaman kategori setelah berhasil update
                header("Location: index.php?halaman=kategori");
                exit;
            } else {
                // Jika terjadi kesalahan saat eksekusi query
                $error = "Terjadi kesalahan saat mengupdate kategori. Silakan coba lagi.";
            }
            $stmt_update->close();
        }
    }
} else {
    echo "Parameter id_kategori tidak ditemukan.";
    exit;
}
?>
<h2>Edit Kategori</h2>
<hr>
<!-- Form edit kategori -->
<form method="POST">
    <div class="form-group">
        <label>Nama Kategori</label>
        <input type="text" class="form-control" name="nama_kategori" value="<?php echo $kategori['nama_kategori']; ?>">
    </div>
    <!-- Tampilkan pesan error jika ada -->
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="index.php?halaman=kategori" class="btn btn-danger">Batal</a>
</form>
