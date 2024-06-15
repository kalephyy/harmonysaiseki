<!DOCTYPE html>
<html>
<head>
    <link href="style.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/image/logo.jpg" type="image/x-icon">
    <title>Harmony Saiseki Dinning</title>
    <link rel="icon" href="../logo.png">
    <style>
         body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
<?php
session_start();
include '../koneksi.php'; 

if (isset($_POST['pay'])) {
    // Mendapatkan metode pembayaran dari form
    $metode_pembayaran = isset($_POST['interest']) ? $_POST['interest'] : '';

    // Mendapatkan keranjang produk dari session
    $produk_dipilih = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();

    // Mengambil nomor transaksi terakhir untuk menentukan nomor transaksi selanjutnya
    $next_transaction_number = 'P0001'; // Nomor transaksi default jika belum ada transaksi sebelumnya
    $get_last_transaction_query = "SELECT MAX(id) AS last_id FROM transaksi";
    $get_last_transaction_result = mysqli_query($koneksi, $get_last_transaction_query);

    if ($get_last_transaction_result && $last_transaction = mysqli_fetch_assoc($get_last_transaction_result)) {
        $last_id = $last_transaction['last_id'];
        if ($last_id !== null) {
            $last_number = intval(substr($last_id, 1));
            $next_number = $last_number + 1;
            $next_transaction_number = 'P' . str_pad($next_number, 4, '0', STR_PAD_LEFT);
        }
    }

    // Array untuk menampung detail transaksi
    $detail_transaksi = array();
    $order_time = date('Y-m-d H:i:s');

    // Iterasi untuk setiap produk yang dibeli
    foreach ($produk_dipilih as $id_produk => $quantity) {
        // Mendapatkan informasi produk dari database
        $produk_query = "SELECT menu, harga FROM menu WHERE id = $id_produk";
        $produk_result = mysqli_query($koneksi, $produk_query);

        if ($produk_result && $produk_row = mysqli_fetch_assoc($produk_result)) {
            $nama_produk = $produk_row['menu'];
            $harga_produk = $produk_row['harga'];

            // Menambahkan detail transaksi ke dalam array
            $detail_transaksi[] = "('$next_transaction_number', '$nama_produk', $harga_produk, $quantity, '$metode_pembayaran', 'Pending', '$order_time')";
        }
    }

    // Insert detail transaksi ke dalam database
    if (!empty($detail_transaksi)) {
        $insert_detail_query = "INSERT INTO transaksi (no_transaksi, nama, harga, jumlah, metode, statuss, order_time) VALUES " . implode(", ", $detail_transaksi);
        $insert_detail_result = mysqli_query($koneksi, $insert_detail_query);

        if ($insert_detail_result) {
            // Hapus keranjang dari session setelah transaksi berhasil
            unset($_SESSION['keranjang']);
            unset($_SESSION['payment']); 

            // Tampilkan pesan sukses
            ?>
            <center>
            <div class="notifications-container" style="align-items:center;">
                <div class="success">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="succes-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="success-prompt-wrap">
                            <p class="success-prompt-heading" style="text-align:left;">Order completed</p>
                            <div class="success-prompt-prompt">
                                <p style="text-align:left;">Kode Order Anda adalah: <?php echo $next_transaction_number; ?></p>
                                <p style="text-align:left;">Waktu Order anda: <?php echo $order_time; ?></p>
                            </div>
                            <div class="success-button-container">
                                <a type="button" class="success-button-main" href="../status.php">View status</a>
                                <a type="button" class="success-button-secondary" href="../index.php">Dismiss</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </center>
            <?php
        } else {
            echo '<div>';
            echo '<center>';
            echo "Gagal menambahkan detail transaksi ";
            echo '<br>';
            echo '<br>';
            echo '<a type="button" href="../chart.php" class="success-button-secondary" >Kembali?</a>';
            echo '</center>';
            echo '</div>';
        }
    } else {
        echo "<center>Detail transaksi kosong.</center>";
    }
} else {
    echo "Form pembayaran tidak disubmit.";
}
?>
</body>
</html>
