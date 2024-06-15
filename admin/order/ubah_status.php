<?php
include "koneksi.php";
session_start();

if (isset($_GET['no_transaksi'])) {
    $no_transaksi = $_GET['no_transaksi'];

    $query = "UPDATE transaksi SET stats = (CASE WHEN stats = 'Unpaid' THEN 'Paid' ELSE 'Unpaid' END) WHERE no_transaksi = '$no_transaksi'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    }

    // Redirect kembali ke halaman detail_order.php
    header("location: ./?no_transaksi=$no_transaksi");
    exit;
} else {
    header("./");
    exit;
}
?>
