<?php
include "koneksi.php";
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $statuss = "";

    // fungsi ini untuk nentuin status nyesuain tombol yang di klik
    if (isset($_GET['status'])) {
        $status = $_GET['status'];
        if ($status === 'reject') {
            $statuss = 'Rejected';
        } elseif ($status === 'pending') {
            $statuss = 'Pending';
        } elseif ($status === 'ready') {
            $statuss = 'Ready';
        }

        $query = "UPDATE transaksi SET statuss = '$statuss' WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
        }
    }

    header("location: {$_SERVER['HTTP_REFERER']}");
    exit;
} else {
    header("./");
    exit;
}
?>
