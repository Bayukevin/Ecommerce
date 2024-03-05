<?php
$host     = "localhost";
$user     = "root"; 
$password = ""; 
$database = "ecommerce"; 

$koneksi = new mysqli($host, $user, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
}
?>
