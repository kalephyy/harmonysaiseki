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
	<link rel="icon" href="../logo.png">
	<title>HARMONY SAISEKI (ADMIN)</title>
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

	<a href="tambah.php" class="btn btn-outline-primary">< tambah data</a>
	<a href="order/" class="btn btn-outline-warning" style="margin-left:10px;"> Cek Order ></a>
	<table border="1" class="table" style="margin-top: 15px;">
		<thead class="thead-dark">
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Nama</th>
				<th scope="col">Harga</th>
				<th scope="col">Tipe</th>
				<th scope="col">Status</th>
				<th scope="col">Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$query 	= "SELECT * FROM menu";
				$result = mysqli_query($koneksi,$query);

				//mengecek apakah ada error ketika menjalankan query
				if(!$result){
					die ("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
				}

				if(mysqli_num_rows($result) == 0){
						echo '
							<tr>
								<td colspan="5">Tidak Ada Data</td>
							</tr>';
				}else{

					$no = 1;
					while($row = mysqli_fetch_assoc($result)){
						echo '
							<tr>
								<td>'.$no++.'</td>
								<td>'.$row["menu"].'</td>
								<td>'.rupiah($row["harga"]).'</td>
								<td>'.$row["tipe"].'</td>
								<td>'.$row["statuss"].'</td>
								<td>
									<a href="edit_data.php?id='.$row["id"].'">
									<button type="button" class="btn btn-primary">Edit</button></a>
								|
									<a href="hapus_data.php?id='.$row["id"].'">	
									<button type="button" class="btn btn-danger">Hapus</button></button></a>
								</td>
							</tr>';
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
</body>
</html>