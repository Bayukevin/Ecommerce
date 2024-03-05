<?php
// Include koneksi ke database
include "../koneksi.php";

// Cek apakah parameter id_kategori telah diterima
if (isset($_GET['id_kategori'])) {
    $id_kategori = $_GET['id_kategori'];

    // Hapus data kategori berdasarkan id_kategori
    $query = "DELETE FROM kategori WHERE id_kategori = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id_kategori);

    // Eksekusi query
    if ($stmt->execute()) {
        // Redirect ke halaman kategori setelah berhasil hapus
        header("Location: index.php?halaman=kategori");
        exit;
    } else {
        echo "Terjadi kesalahan saat menghapus kategori. Silakan coba lagi.";
    }
    $stmt->close();
} else {
    echo "Parameter id_kategori tidak ditemukan.";
    exit;
}
?>
