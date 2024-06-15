<?php
	include "koneksi.php";
	$query = "DELETE FROM menu WHERE id=".$_GET['id'];
	$result = mysqli_query($koneksi, $query);

	//mengecek apakah ada error ketika menjalankan query
	if(!$result){
		die ("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
	}else{
		header("Location:./");
	}
?>