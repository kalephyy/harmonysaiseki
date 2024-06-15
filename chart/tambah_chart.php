<?php
				include "../koneksi.php";

				$id = $_GET["id"];

				$sql = "SELECT * FROM 'menu' WHERE 'id' =".$id;
				$query = mysqli_query($con,$sql);
				$hasil = mysqli_fetch_object($query);

				$_SESSION["chart"][$id] = [
				"nama" => $hasil->menu,	
				"harga" => $hasil->harga,
				"jumlah" => 1

				];

				header ( "location: ../chart.php");
		?>
