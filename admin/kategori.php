<h1>Data Kategori</h1>
<hr>

<?php 
$semuadata = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap=$ambil->fetch_assoc())
{
    $semuadata[] = $tiap;
}

//echo "<pre>";
//print_r($semuadata);
//echo "</pre>";
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
<tbody>
    <?php foreach ($semuadata as $key => $value): ?>
    <tr>
        <td><?php echo $key+1 ?></td>
        <td><?php echo $value["nama_kategori"] ?></td>
        <td>
            <a href="index.php?halaman=edit_kategori&id_kategori=<?php echo $value['id_kategori']; ?>" class="btn btn-warning btn-sm">Ubah</a>
            <a href="hapus_kategori.php?id_kategori=<?php echo $value['id_kategori']; ?>" class="btn btn-danger btn-sm">Hapus</a>

        </td>
    </tr>
    <?php endforeach ?>
</tbody>
</table>

<a href="index.php?halaman=tambah_kategori" class="btn btn-default ">Tambah Data</a>