

<!DOCTYPE html>
<html style="overflow-x: hidden;">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="logo.png">
    <title>Harmony Saiseki Dining</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap2.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.default.min.css"  rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="checkout/style.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
<!-- Navigation -->
		<nav class="navbar navbar-default navbar-fixed-top" style="text-align: center;">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header page-scroll">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a href="./">
					<img src="logo.png" ><p style="font-size: 10px; color: white; font-family: sans-serif;">HARMONY SAISEKI </p></a>	</div>	
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li>
							<a class="page-scroll" href="#about">About</a>
						</li>
						<li>
							<a class="page-scroll" href="./chart.php">Booking</a>
						</li>
						<li>
							<a class="page-scroll" href="./menu.php">Menu</a>
						</li>
						<li>
							<a class="page-scroll" href="./status.php">Status</a>
						</li>
					
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
<div style="margin-top: 80px; margin-bottom: 20px;text-align: center; font-family: f; background-color: black;">
</div>
<form action="./checkout/proses_pay.php" method="post">

<?php
session_start();
include "koneksi.php";

if (empty($_SESSION['keranjang'])) {
    echo <<<HTML
    <div class="alert alert-primary" role="alert" style="background-color:; color:; font-size:15px; text-align:center;">Kamu belum booking apapun, <a href="./menu.php">booking sekarang!</a></div>
HTML;
} else {
    // Hitung jumlah produk (kartu) dalam keranjang
    $total_menu = count($_SESSION['keranjang']);

    echo '<h3 style="margin-left:100px; margin-top:10px;">&nbsp;</h3>';
    echo '<h3 style="margin-left:90px; margin-top:10px; font-size:30px;">&nbsp;Selected Menu</h3>';
    echo '<h3 style="margin-left:90px; margin-top:10px;">&nbsp;You have ' . $total_menu . ' menu(s) in your reservation</h3>';

    echo '<div class="row">';
        // Mengatur jumlah maksimal kartu per baris
        $max_cards_per_row = 2;
        $card_count = 0;
    
    // Loop through the products in the cart
    foreach ($_SESSION['keranjang'] as $id_produk => $jumlah_produk) {
        // Query to fetch product details by ID
        $query = "SELECT id, menu, harga, tipe, statuss, nama_berkas FROM menu WHERE id = $id_produk";
        $result = mysqli_query($koneksi, $query);

        if ($result && $row = mysqli_fetch_assoc($result)) {
            $id_produk = $row['id'];
            $nama_produk = $row['menu'];
            $path_file = $row['nama_berkas'];
            $tipe_menu = $row['tipe'];
            $harga_produk = $row['harga'];
            $statuss_menu = ($row['statuss'] === 'Available') ? 'Available' : 'Out of Stock';
            $class = ($row['statuss'] === 'Available') ? 'badge badge-success' : 'badge badge-danger';
            
            // Membuat kartu produk
            echo '<div class="" style="margin-bottom: 20px; margin-top:35px;margin-left:110px;width:240px;">'; // Menggunakan col-md-6 untuk 2 kartu per baris
            echo '<div class="card" style="text-align:left; border-radius:15px;">';
            echo '<div style="max-width: 240px; height: 150px; overflow: hidden;">';
            echo '<img class="card-img-top" style="width: 100%; height: 100%; object-fit: cover; border-top-left-radius: 15px; border-top-right-radius: 15px; border-bottom-left-radius: 0; border-bottom-right-radius: 0;" src="' . $path_file . '" alt="Card image cap">';
            echo '</div>';
            echo '<div class="card-body">';
            echo '<h5 class="card-title" style="font-weight: 15px; font-size:18px; color:#AD5A06; font-family:sans-serif;">' . $nama_produk . '</h5>';
            echo '<p class="card-text" style="font-weight: bold; color:black; font-family:sans-serif;">' . rupiah($harga_produk) . '</p>';
            echo '<label type="button" class="badge badge-info" style="border:none; font-size: 12px; padding: 5px 8px;">' . $tipe_menu . '</label>&nbsp;';
            echo '<label type="button" id="statuss" class="' . $class . '" style="border:none; font-size: 12px; padding: 5px 8px;">' . $statuss_menu . '</label><br>';
            echo '<p class="card-text">Quantity</p>';
            echo '<input type="number" name="quantity[' . $id_produk . ']" style="width: 210px;" value="' . $jumlah_produk . '">';
            echo '<a href="chart/hapus_cart.php?id=' . $id_produk . '" class="btn btn-danger btn" role="button" style="margin-top:15px;">Remove <b>⨯</b></a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

                // Menambahkan counter
                $card_count++;
                if ($card_count % $max_cards_per_row == 0) {
                    echo '</div>'; // Menutup baris (row) setelah mencapai jumlah kartu maksimal per baris
                    echo '<div class="row">'; // Membuka baris (row) baru untuk kartu berikutnya
                }
        }
    }

    echo '</div>'; // Menutup baris (row) produk di keranjang
    echo '<br>';

    // Menampilkan kotak pembayaran
    echo '<div class="form-container" id="login-form" style=" position: fixed;
    top: 0; /* Set top to 0 to align with the first item */
    left: 60%; /* Center horizontally */
    transform: translateX(-20%); /* Move left by 50% of its own width */
    background-color: white;
    margin-top:140px;
    background-color:#272C2F;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 1000; ">
';
    echo '<p class="title">Payment</p>';
    echo '<label for="products">_____________________________________________________________________________________________</label>';
    echo '<br>';
    echo '<label>My Order\'s</label>';
    echo '<div class="product-container">';
    
    // Menampilkan produk yang dipilih dalam kotak pembayaran
    
    foreach ($_SESSION['keranjang'] as $id_produk => $jumlah_produk) {
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
            echo '<label class="jumlah">' . $jumlah_produk . '</label>';
            echo '</div>';
        }
    }
    
    echo '</div>'; // Menutup product-container
    echo '<br>';
    echo '<label for="products">_____________________________________________________________________________________________</label>';
    echo '<div class="total-container">';
    echo '<label>Total: <span id="total">Rp 0</span></label>';
    echo '</div>';
    echo '<br>';
    echo '<label>Payment Method</label>';
    echo '<div>';
    echo '<input type="radio" id="Card" name="interest" value="Card" style="margin-right: 10px;" required>';
    echo '<label for="Card"><img src="images/card.png" width="125px"></label>';
    echo '<input type="radio" id="Cash" name="interest" value="Cash" style="margin-right: 5px; margin-left:10px;" required>';
    echo '<label for="Cash">Cash</label>';
    echo '</div>';
    echo '<br>';
    echo '<input type="hidden" name="payment_method" id="payment_method" value="">';
    echo '<button type="submit" class="btn btn-primary" name="pay" value="Pay">Pay</button>';
    echo '</div>'; // Menutup payment-container
}
?>
    
</form>
    
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

    // Tambahkan event listener untuk setiap input quantity
    var quantityInputs = document.querySelectorAll('input[type="number"]');
    quantityInputs.forEach(function (input) {
        input.addEventListener('input', function () {
            hitungTotalHarga(); // Panggil fungsi hitungTotalHarga saat nilai quantity berubah

            // Update jumlah produk di kotak pembayaran
            var productId = input.getAttribute('name').replace('quantity[', '').replace(']', '');
            var productContainer = document.querySelector('.product-container');
            var product = productContainer.querySelector('[value="' + productId + '"]');
            var jumlahElement = product.closest('.product').querySelector('.jumlah');
            jumlahElement.textContent = input.value; // Update nilai jumlah produk
        });
    });

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

    // Panggil fungsi untuk menghitung total harga saat halaman dimuat
    hitungTotalHarga();
    updatePaymentMethod();
</script>

</body>
</html>
<?php


function rupiah($angka) {
    $hasil_rupiah = "Rp " . number_format($angka, 2, ",", ".");
    return $hasil_rupiah;
}
?>      