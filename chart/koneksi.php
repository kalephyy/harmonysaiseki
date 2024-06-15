<?php
  $host = "localhost";  // alamat server
  $user = "root"; // username database
  $pass = ""; // password database
  $nama_db = "restaurant"; //nama database
  
  $koneksi = mysqli_connect($host,$user,$pass,$nama_db); //pastikan urutan nya seperti ini, jangan tertukar

  if (!$koneksi) {
      // Jika koneksi gagal, tampilkan pesan kesalahan
      die("Koneksi dengan database gagal: " . mysqli_connect_error());
  } else {
      // Jika koneksi berhasil, bisa tambahkan tindakan tambahan jika diperlukan
      // Misalnya, aktifkan mode UTF-8 untuk koneksi
      mysqli_set_charset($koneksi, "utf8");
      // Atau lakukan tindakan lainnya
      // ...
  }
  ?>