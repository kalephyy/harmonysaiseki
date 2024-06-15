<?php
session_start();
// untuk label jumlah order keranjang
$id_produk = $_GET['id'];
if (isset($_SESSION['keranjang'][$id_produk])) {
    $_SESSION['keranjang'][$id_produk]++;
} else {
    $_SESSION['keranjang'][$id_produk] = 1;
}


// Redirect ke menu page
header('Location: ');
?>
