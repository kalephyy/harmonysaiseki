<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HARMONY SAISEKI DINNER</title>
	<link rel="icon" href="../logo.png">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<?php		
		if(isset($_GET['id'])){
			include "koneksi.php";

			$id = $_GET['id']; // id menu

			// cek id karyawan apakah ada di table menu
			$query_cek = "SELECT * FROM menu WHERE id=".$id;
			$result_cek = mysqli_query($koneksi,$query_cek);

			//mengecek apakah ada error ketika menjalankan query
			if(!$result_cek	){
				die ("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
			
			// jika query tidak ada yg error
			}else{ 
				// jika data tidak ada
				if(mysqli_num_rows($result_cek) == 0){
					echo "data Out of Stock";
				}else{
					$data = mysqli_fetch_array($result_cek);
	?>	
					<div class="container mt-5">
					<form action="proses_edit.php" method="post">
					<div class="form-group row">
					<label for="inputnama3" class="col-sm-2 col-form-label">ID:</label>
					<div class="col-sm-10">
						<input type="number" name="id" class="form-control" id="inputnama3" value="<?= $data['id'] ?>" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="inputalamat3" class="col-sm-2 col-form-label">Nama Menu:</label>
					<div class="col-sm-10">
						<input type="text" name="menu" class="form-control" id="inputalamat3" value="<?= $data['menu']; ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="inputnama3" class="col-sm-2 col-form-label">Harga:</label>
					<div class="col-sm-10">
						<input type="number" name="harga" class="form-control" id="inputnama3" value="<?= $data['harga'] ?>">
					</div>
				</div>
				<p>
					<label for="tipe">Tipe:</label>
					<select name="tipe" id="tipe" class="col-sm-10 offset-sm-2" style="left: 5px; top: -31px;">
						<option value="tipe" hidden>Atur Tipe</option>
						<option value="Food" <?= ($data['tipe'] === 'Food') ? 'selected' : '' ?>>Food</option>
						<option value="Drink" <?= ($data['tipe'] === 'Drink') ? 'selected' : '' ?>>Drink</option>
					</select>
				</p>
				<p>
					<label for="statuss">Status:</label>
					<select name="statuss" id="statuss" class="col-sm-10 offset-sm-2" style="left: 5px; top: -31px;">
						<option value="status" hidden>Atur Status</option>
						<option value="Available" <?= ($data['statuss'] === 'Available') ? 'selected' : '' ?>>Available</option>
						<option value="Out of Stock" <?= ($data['statuss'] === 'Out of Stock') ? 'selected' : '' ?>>Out of Stock</option>
					</select>
				</p>
					<div class="form-group row">
						<div class="col-sm-10  offset-sm-2">
						<input type="submit" name="submit" value="Update" class="btn btn-success">
						<input type="reset" name="reset" class="btn btn-danger">
						<a href="./" name="kembali" class="btn btn-primary">Kembali</a>
						</div>
					</div>
					</form>
	<?php
				}
			}
		}else{
			echo 'tidak dapat menampilkan form edit menu <a href="./">klik disini</a> untuk kembali';
		}
	?>
	<script src="script.js" crossorigin="anonymous"></script>
</body>
</html>