<?php
	include "koneksi.php";
	session_start();

?>
<!DOCTYPE html>
<html style="overflow-x:hidden;">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">	
	<link rel="shortcut icon" href="../..\assets\image\logo.jpg" type="image/x-icon">
	<title>Bags Restaurant</title>
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
			border: none; 
			outline: none; 
			background: none; 
			padding: 1; 
			cursor: pointer; 
		}

		.text-container1:active {
			transform: scale(0.9); 
		}
		.carousel-inner img{
        height: 366px
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
	</style>
</head>
<body style="margin-left:45px; margin-right:45px; margin-top:25px;">
<a href="../" class="btn btn-outline-primary">< Back</a>
	<table border="1" class="table" style="margin-top: 15px;">
		<thead class="thead-dark">
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Nomer Pesanan</th>
				<th scope="col">Status Pesanan</th>
				<th scope="col">Status Bayar</th>
				<th scope="col">Metode Bayar</th>
				<th scope="col">Order Time</th>
				<th scope="col">Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$query = "SELECT DISTINCT no_transaksi, statuss, stats, metode, order_time FROM transaksi";
				$result = mysqli_query($koneksi, $query);

				// Mengecek apakah ada error ketika menjalankan query
				if (!$result) {
					die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
				}

				if (mysqli_num_rows($result) == 0) {
					echo '
						<tr>
							<td colspan="5">Tidak Ada Data</td>
						</tr>';
				} else {
					$no = 1;
					while ($row = mysqli_fetch_assoc($result)) {
						echo '
							<tr>
								<td>'.$no++.'</td>
								<td>' . $row["no_transaksi"] . '</td>
								<td>' . $row["statuss"] . '</td>
								<td>' . ($row["stats"] ?: 'Unpaid') . '</td>
								<td>' . $row["metode"] . '</td>
								<td>' . $row["order_time"] . '</td>';
								?>

								<td>
								<a href="detail_order.php?no_transaksi=<?= $row["no_transaksi"] ?>">
									<button type="button" class="btn btn-primary btn-sm"><b>Detail</b></button>
								</a>
								|
								<a href="ubah_status.php?no_transaksi=<?= $row["no_transaksi"] ?>">
									<button type="button" class="btn btn-danger btn-sm" id="paidBtn_<?= $row["no_transaksi"] ?>">
										<?php echo ($row["stats"] == 'Paid') ? '<b>Unpaid</b>' : '<b>Paid</b>'; ?>
									</button>
								</a>
							</td>
						<?php
						echo '</tr>';
					}
				}

				function rupiah($angka) {
					$hasil_rupiah = "Rp " . number_format($angka, 2, ",", ".");
					return $hasil_rupiah;
				  }
				  
				?>
				</table>

		</tbody>
	<script src="script.js" crossorigin="anonymous"></script>
	<script>
    // Menambahkan event listener untuk setiap tombol "Paid"
    <?php
    $query = "SELECT DISTINCT no_transaksi, stats FROM transaksi";
    $result = mysqli_query($koneksi, $query);
    
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            document.getElementById("paidBtn_<?php echo $row["no_transaksi"]; ?>").addEventListener("click", function () {
                // Mengubah teks tombol berdasarkan status bayar saat ini
                var currentStatus = "<?php echo $row["stats"]; ?>";
                var newStatus = currentStatus === "Paid" ? "Unpaid" : "Paid";
                this.innerText = newStatus;
            });
    <?php
        }
    }
    ?>
</script>

</body>
</html>
