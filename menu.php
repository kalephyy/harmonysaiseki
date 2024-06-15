<!DOCTYPE html>
<html lang="en">
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
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php
    include "koneksi.php";
    ?>
</head>
<body id="page-top" style="background-color: black;">
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
    <div class="intro-heading" style="font-size: 50px; color: white;">Harmony Saiseki Dinning</div>
</div>
</div>
<!-- Header -->
<header class="headers" style="background-image: url(carrot.png);">
    <div class="container">
        <div class="intro-text" style="font-size: 50px; color: white; font-family:sans-serif; text-align:center; margin-top:-140px;">Our Menus</div>
    </div>
</header>


<section id="about" class="light-bg" style="background-color: black;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title" >
                    <h2 style="color: white; margin-bottom:30px;">You may like one of our dishes</h2>
                </div>
            </div>
        </div>

        <?php
        function rupiah($angka) {
            $hasil_rupiah = "Rp" . number_format($angka, 2, ",", ".");
            return $hasil_rupiah;
        }

        $query = "SELECT * FROM menu";
        $sql = "SELECT * FROM menu ORDER BY id DESC";
        $result = mysqli_query($koneksi, $query);
        $cardsPerRow = 4;
        $cardCounter = 0;

        echo '<div class="container my-3">';
        echo '<div class="row">';
        ?>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $path_file = $row['nama_berkas'];
            $nama_menu = $row['menu'];
            $harga_menu = $row['harga'];
            $tipe_menu = $row['tipe'];
            $statuss_menu = ($row['statuss'] === 'Available') ? 'Available' : 'Out of Stock';
            $class = ($row['statuss'] === 'Available') ? 'badge badge-success' : 'badge badge-danger';
            $isAvailable = ($row['statuss'] === 'Available');
            ?>

            <div class="col-md-3">
                <div class="card" style="margin-top: 23px; text-align:left; width: 22rem; border-radius:15px;">
                    <div style="max-width: 100%; height: 150px; overflow: hidden;">
                        <img class="card-img-top" style="width: 100%; height: 100%; object-fit: cover; border-top-left-radius: 15px; border-top-right-radius: 15px; border-bottom-left-radius: 0; border-bottom-right-radius: 0;" src="<?php echo $path_file; ?>" alt="Card image cap">
                    </div>

                    <div class="card-body" style="background-color: white; border-radius:15px;">
                        <h5 class="card-title" style="font-weight: 15px; font-size:18px; color:#AD5A06; font-family:sans-serif;"><?php echo $nama_menu; ?></h5>
                        <p class="card-text" style="font-weight: bold; color:black; font-family:sans-serif;"><?php echo rupiah($harga_menu); ?></p>
                        <label type="button" class="badge badge-info" style="border:none; font-size: 12px; padding: 5px 8px;"><?php echo $tipe_menu; ?></label>&nbsp;
                        <label type="button" id="statuss" class="<?php echo $class; ?>" style="border:none; font-size: 12px; padding: 5px 8px;"><?php echo $statuss_menu; ?></label><br>

                        <?php
                        if ($isAvailable) {
                            // Menggunakan AJAX untuk menambahkan ke keranjang tanpa refresh halaman
                            echo '<button class="btn btn-primary btn" style="margin-top:5px; color:white; background-color:#AD5A06; width:190px; border-radius:10px;" onclick="addToCart(' . $row['id'] . ', this)">Tambah ke pesanan</button>';
                        } else {
                            echo '<button type="button" class="btn" style="margin-top:5px; background-color:#E88928; color:white; width:190px; border-radius:10px;" disabled>Tambah ke pesanan</button>';
                        }
                        ?>

                    </div>
                </div>
            </div>
        <?php
        }
        ?>

        </div>
    </div>

    <div style="display: flex; justify-content: center; align-items: center; margin-top: 50px;">
        <a href="./chart.php" style=" background-color: #AD5A06; color:white; border-radius:50px; padding: 15px 30px; font-size: 18px; border: none; outline: none; transition: transform 0.3s ease;">
            Continue
        </a>
    </div>

	<footer>
        <div class="container text-center" style="margin-top: 0px;">
            <img src="logo.png"  style="margin-right: 0px;"><p  style="margin-right: 0px;">HARMONY SAISEKI </p>
        </div>
    </footer>

    <p id="back-top">
        <a href="#top"><i class="fa fa-angle-up"></i></a>
    </p>

  

    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>
    <script src="js/theme-scripts.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

    <script>
        // Fungsi untuk menambahkan ke keranjang menggunakan AJAX
        function addToCart(id, button) {
            // Kirim data ke server menggunakan AJAX
            $.ajax({
                url: 'chart/beli.php',
                type: 'GET',
                data: {id: id},
                success: function(response) {
                    // Tampilkan pesan berhasil atau apapun yang ingin ditampilkan
                    alert('Berhasil ditambahkan ke keranjang!');
                    // Ubah tampilan tombol
                    button.innerHTML = 'Berhasil ditambahkan';
                    button.style.backgroundColor = 'white';
                    button.style.color = '#AD5A06';
                    button.style.width = '190px';
                    button.style.border = '2px solid #AD5A06';
                    button.style.borderRadius = '10px';
                    button.style.textAlign = 'left';
                    button.style.paddingLeft = '20px';
                    // Matikan event klik agar tidak memuat ulang halaman
                    button.onclick = null;
                },
                error: function(xhr, status, error) {
                    // Tampilkan pesan error jika terjadi kesalahan
                    console.error(error);
					button.innerHTML = 'Berhasil ditambahkan';
                    button.style.backgroundColor = 'white';
                    button.style.color = '#AD5A06';
                    button.style.width = '190px';
                    button.style.border = '2px solid #AD5A06';
                    button.style.borderRadius = '10px';
                    button.style.textAlign = 'left';
                    button.style.paddingLeft = '20px';
                    // Matikan event klik agar tidak memuat ulang halaman
                    button.onclick = null;
                }
            });
        }
    </script>

</body>
</html>
