<?php
include "koneksi.php"; // Sambungkan ke database

if (isset($_POST['submit'])) {
    $id_menu = $_POST['id'];
    $nama_menu = $_POST['menu'];
    $harga_menu = $_POST['harga'];
    $tipe_menu = $_POST['tipe'];
    $statuss_menu = $_POST['statuss'];

    $jumlahBerkas = count($_FILES['berkas']['name']);

    // Validasi ekstensi file untuk .png, .jpg , .jpeg , .gif
    // selain ekstensi itu maka dinyatakan tidak valid yang akan dibaca variable $ekstensiBerkas
    $ekstensiValid = ['png', 'jpg', 'jpeg', 'gif'];
    
    // Tentukan lokasi file yang akan dipindahkan
    $dirUpload = "upload/";
     
    // menggunakan perulangan for untuk memanggil multiple berkas
    for ($i = 0; $i < $jumlahBerkas; $i++) {
        $namaFile = $_FILES['berkas']['name'][$i];
        $namaSementara = $_FILES['berkas']['tmp_name'][$i];
    
        // Validasi ukuran file
        // kb = 1024 , mb = 1024 * 1024
        // 2 dan 10 adalah untuk 2mb dan 10kb
        $maxSize = 2 * 1024 * 1024; // 2MB
        $minSize = 10 * 1024;       // 10KB
    
        $ekstensiBerkas = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
        
        if (!in_array($ekstensiBerkas, $ekstensiValid)) {
            echo "Hanya diperbolehkan mengunggah berkas dengan ekstensi .png, .jpg, .jpeg, atau .gif untuk berkas $namaFile.<br>";
            echo "=============================== <br/>";
            continue; // fungsi continue adalah untuk lanjut memeriksa ke berkas berikutnya
        }
    
        $ukuranFile = $_FILES['berkas']['size'][$i];
        if ($ukuranFile < $minSize || $ukuranFile > $maxSize) {
            echo "Ukuran berkas $namaFile harus antara 10KB dan 2MB.<br>";
            continue;
        } 
    
        // Pindahkan file
        $terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);
    
        if ($terupload) {
            // Jika sudah berhasil, lakukan insert data ke dalam database (termasuk nama berkas)
            $path_file = $dirUpload . $namaFile;
            $query_menu = "INSERT INTO menu (id, menu, harga, tipe, statuss, nama_berkas) VALUES ('$id_menu', '$nama_menu', '$harga_menu', '$tipe_menu', '$statuss_menu', '$path_file')";
            $result_menu = mysqli_query($koneksi, $query_menu);
    
            if (!$result_menu) {
                die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
            } else {
                // apabila tambah data berhasil
                echo "Upload berhasil! <br/>";
                echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a> <br>";
                echo "=============================== <br/>";
            }
        } else {
            echo "Upload Gagal untuk berkas $namaFile!<br>";
        }
    }
    
    // Redirect ke halaman lihat_data.php setelah selesai
    header("Location: admin/");
} else {
    echo "Form tambah menu harus diisi";
}
?>
