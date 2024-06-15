<!DOCTYPE html>
<head>
<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="logo.png">
		<title>Harmony Saiseki Dinning</title>
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="css/owl.carousel.css" rel="stylesheet">
		<link href="css/owl.theme.default.min.css"  rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script src="js/ie-emulation-modes-warning.js"></script>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <style>
        .out-table{
            display: flex;
        }

        .out-table p{
            display: block;
        }
    </style>
</head>
<body style="margin-left:45px; margin-right:45px;">
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
<?php
// Include koneksi ke database
include 'koneksi.php';

if (isset($_POST['kode_transaksi'])) {
    $kode_transaksi = $_POST['kode_transaksi'];

    // Query untuk mencari informasi transaksi berdasarkan kode_transaksi
    $query = "SELECT * FROM transaksi WHERE no_transaksi = '$kode_transaksi'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Gagal menjalankan kueri: " . mysqli_error($koneksi));
    }

    // Periksa apakah kode transaksi ditemukan
    if (mysqli_num_rows($result) > 0) {
        // Kode transaksi ditemukan, tampilkan informasi transaksi
        $subtotal = 0;
        $no = 1;

        // Mendefinisikan teks No Transaksi dan Status di luar tabel
        $no_transaksi = "";
        $status = "";


        function rupiah($angka) {
            $hasil_rupiah = "Rp " . number_format($angka, 2, ",", ".");
            return $hasil_rupiah;
          }
          
        while($row = mysqli_fetch_assoc($result)){
            $nama_menu = $row["nama"];
            $jumlah = $row["jumlah"];
            $harga = $row["harga"];
            $sub_total = $harga * $jumlah;
            $subtotal += $sub_total;

            // Mengisi teks No Transaksi dan Status
            $no_transaksi = $row["no_transaksi"];
            $status = $row["statuss"];

            $metode_pembayaran = $row["metode"];
        }

        // Tampilkan teks No Transaksi dan Status di atas tabel
        echo '<div class="out-table" style="margin-top:100px;">';
        echo '<h3><p>No Transaksi</p>  <p style="background-color:#f4e1e5; width:75px; color:#c93458; padding:2px; font-size:25px;">'. $no_transaksi .'</p> </h3>';
        echo '<h3 style="margin-left:65vh;"><p>Status</p> <p style="background-color:#f4e1e5; color:#c93458; padding:2px; font-size:25px;">'. $status .'</p> </h3>';
        echo '</div>';
?>
       <table border="1" class="table" style="margin-top: 15px;">
        <thead class="thead-dark" style="background-color:black; color:white;">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Menu</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Sub Total</th>
            </tr>
        </thead>
        <tbody>
<?php
        $no = 1;
        $total = 0;
        mysqli_data_seek($result, 0); 
        while($row = mysqli_fetch_assoc($result)){
            $nama_menu = $row["nama"];
            $jumlah = $row["jumlah"];
            $harga = $row["harga"];
            $sub_total = $harga * $jumlah;
            $total += $sub_total; // untuk nambahin sub total ke total

            echo '
                <tr>
                    <td>'.$no++.'</td>
                    <td>'.$nama_menu.'</td>
                    <td>'.$jumlah.'</td>
                    <td>'.rupiah($harga).'</td>
                    <td>'.rupiah($sub_total).'</td>
                </tr>';
        }
?>
            <tr>
                <td colspan="3"></td>
                <td><b>Total :</b></td>
                <td><b><?php echo rupiah($total); ?></b></td>
            </tr>
        </tbody>
    </table>
        
        <div class="out-table">
            <h3><p>Metode Pembayaran</p>  <p style="background-color:#f4e1e5; width:58px; color:#c93458; padding:2px; font-size:25px;">
            <?php echo ($metode_pembayaran); ?></p></h3>
        </div>
<?php
    } else {
        // Jika Kode transaksi tidak ditemukan
        echo '<div class="alert alert-primary" role="alert" style="margin-top:120px; background-color:#C4E4FF; color:#1C1678;">
        Error 404 | Kode Transaksi tidak ditemukan!
      </div>';
    }
}
?>
</body>
</html>
