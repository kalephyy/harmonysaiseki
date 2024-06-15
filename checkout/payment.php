<?php
session_start();
include "../koneksi.php";
function rupiah($angka) {
    $hasil_rupiah = "Rp " . number_format($angka, 2, ",", ".");
    return $hasil_rupiah;
}

if(isset($_SESSION['keranjang'])) {
    $keranjang = $_SESSION['keranjang'];
}
?>

<!DOCTYPE html>
<html lang="en" style="overflow-x: hidden;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/image/logo.jpg" type="image/x-icon">
    <title>Payment</title>
    <link href="style.css" rel="stylesheet">
    <style>
        .title {
            text-align: center;
        }
        .form {
            text-align: left;
        }
        .product-container {
            display: flex;
            flex-direction: column;
        }
        .product {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 5px 0;
        }
        .checkbox-label {
            display: flex;
            align-items: center;
        }
        .checkbox-label input {
            margin-right: 11px;
        }
        .total-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }
        .harga {
            width: 100px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="form-container" id="login-form">
        <p class="title">Payment</p>
        <form class="form" action="proses_pay.php" method="post">
            <a href="../chart.php" style="color:white;">&lt; Kembali</a>
            <br>
            <label for="products">__________________________________________</label>
            <br>
            <br>    
            <label>My Order's</label>
            <div class="product-container">
                <br>
                <?php
               // Pastikan mengambil quantity dari formulir POST
                if(isset($_POST['quantity']) && is_array($_POST['quantity']) && !empty($_POST['quantity'])) {
                    $quantities = $_POST['quantity'];
                    foreach ($quantities as $id_produk => $quantity) {
                        $_SESSION['payment'][$id_produk]['quantity'] = $quantity;
                        // Query untuk mengambil data produk berdasarkan $id_produk
                        $query = "SELECT id, menu, harga FROM menu WHERE id = $id_produk";
                        $result = mysqli_query($koneksi, $query);

                        if ($result && $row = mysqli_fetch_assoc($result)) {
                            $nama_produk = $row['menu'];
                            $harga_produk = $row['harga'];
                            echo '<div class="product">';
                            echo '<div class="checkbox-label">';
                            echo '<input type="checkbox" class="product-checkbox" name="products[]" value="' . $id_produk . '" required>';
                            echo '<label for="products">' . $nama_produk . '</label>';
                            echo '</div>';
                            echo '<label class="harga">Rp <span>' . number_format($harga_produk, 2, ",", ".") . '</span></label>';
                            echo '<label class="jumlah">' . $quantity . '</label>';
                            echo '</div>';
                        }
                    }
                }
                // ...
                ?>
            </div>
            <label for="products">__________________________________________</label>
            <br>
            <br>
            <!-- ... (kode sebelumnya) -->
            <div class="total-container">
                <label>Total: <span id="total">Rp 0</span></label>
            </div>
            <label for="products">__________________________________________</label>
            <br>
            <br>
            <label>Payment Method</label>
            <div class="">
                <input type="radio" id="Card" name="interest" value="Card" style="margin-right: 5px;" required>
                <img src="../assets/image/card.png" width="125px">
                <input type="radio" id="Cash" name="interest" value="Cash" style="margin-right: 5px;" required>
                <label for="cash">Cash</label>
            </div>
            <br>
            <input type="hidden" name="payment_method" id="payment_method" value="">
            <button type="submit" class="sign" id="checkout-form" name="pay" value="Pay">Pay</button>
        </form> 
    </div>

    <script>
        // Fungsi untuk menghitung total harga dan mengupdate label "Total"
        function hitungTotalHarga() {
            var checkboxes = document.querySelectorAll('.product-checkbox');
            var totalHarga = 0;

            checkboxes.forEach(function (checkbox) {
                if (checkbox.checked) {
                    var productElement = checkbox.closest('.product');
                    var hargaElement = productElement.querySelector('.harga span');
                    var harga = parseFloat(hargaElement.textContent.replace('Rp ', ''));
                    var jumlahElement = productElement.querySelector('.jumlah');
                    var jumlah = parseInt(jumlahElement.textContent);

                    totalHarga += harga * jumlah;
                }
            });

            document.getElementById('total').textContent = 'Rp ' + totalHarga.toFixed(3).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        }

        // Tambahkan event listener untuk setiap checkbox
        var checkboxes = document.querySelectorAll('.product-checkbox');
        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', hitungTotalHarga);
        });

        // Hitung total harga saat halaman dimuat
        hitungTotalHarga();

        // Fungsi untuk mengupdate input hidden payment_method
        function updatePaymentMethod() {
            var paymentMethod = document.querySelector('input[name="interest"]:checked');
            if (paymentMethod) {
                document.getElementById('payment_method').value = paymentMethod.value;
            }
        }

        // Tambahkan event listener untuk input metode pembayaran
        var paymentInputs = document.querySelectorAll('input[name="interest"]');
        paymentInputs.forEach(function (input) {
            input.addEventListener('change', updatePaymentMethod);
        });

        // Hitung total harga saat halaman dimuat
        hitungTotalHarga();
        updatePaymentMethod();
    </script>
</body>
</html>
