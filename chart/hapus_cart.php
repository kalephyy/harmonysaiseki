<?php
session_start();

// Check if the product ID is provided in the URL
if (isset($_GET['id'])) {
    $id_produk = $_GET['id'];

    // Check if the product exists in the cart
    if (isset($_SESSION['keranjang'][$id_produk])) {
        // Remove the product from the cart
        unset($_SESSION['keranjang'][$id_produk]);

        // Redirect back to the chart page
        header('Location: ../chart.php');
    }
}
?>
