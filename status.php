<!DOCTYPE html>
<html lang="en">
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
    <link href="css/bootstrap2.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">


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
    .text-container1{
		position: relative;
		border: 1px solid;
		border-radius: 11px;
		box-shadow: 0 2px 4px black;
		left: 7px;
		}

		.containers{
			display: inline-block;
		}

		.text-container1 button {
			border: none; /* Menghilangkan border */
			outline: none; /* Menghilangkan outline/fokus ring */
			background: none; /* Menghilangkan latar belakang */
			padding: 1; /* Menghilangkan padding */
			cursor: pointer; /* Mengubah kursor menjadi tangan saat dihover */
		}

		.text-container1:active {
			transform: scale(0.9); /* Perkecil tombol saat diklik */
		}
    .navbar-text:hover{
            background-color: #E0E0E0; 
            padding: 0rem;
            margin-top: -15px;
            max-height: 45px;
        }

    .navbar-text:active{
            background-color: #E0E0E0; 
            padding: 0rem;
            margin-top: -15px;
            max-height: 45px;
        }

        .btn-outline-primary:hover {
            background-color: blue;
            color: white;
            border-color: blue;
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

					<div style="align-items: center; text-align: center; font-weight: bold;">
					<a href="./">
					<img src="logo.png" ><p style="font-size: 10px; color: white; font-family: sans-serif;">HARMONY SAISEKI </p></a>	</div>			</div>
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
		
   <form action="cek_status_order.php" method="post" class="form-inline" style="padding-left: 15px; margin-top:100px;">
    <label class="my-1 mr-2" for="input_transaksi"><h3>Transaction No</h3></label>
    <input type="text" name="kode_transaksi" class="custom-select my-1 mr-sm-2" id="input_transaksi" placeholder="Masukkan Kode Transaksi" style="height: 40px;" required>
    <button type="submit" class="btn btn-outline-primary" style="border-color: blue; margin-top:10px;"><b>Check Order</b></button>
</form>

</body>
  <!-- <div class="col-sm-10">
    <input type="text" name="menu" class="form-control" id="inputalamat3" placeholder="Masukkan Nama Menu"></input>
  </div> -->
  <script src="admin/script.js" crossorigin="anonymous"></script>
</html>
