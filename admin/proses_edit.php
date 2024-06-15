<?php
if(isset($_POST['id'])){
    include "koneksi.php";
    $id_menu        = $_POST['id'];
    $menu_menu      = $_POST['menu'];
    $harga_menu     = $_POST['harga'];
    $tipe_menu      = $_POST['tipe'];
    $statuss_menu   = $_POST['statuss'];

    $query = "UPDATE menu SET menu='".$menu_menu."', harga='".$harga_menu."', tipe='".$tipe_menu."',
    statuss='".$statuss_menu."' WHERE id=".$id_menu;
    $result = mysqli_query($koneksi, $query);

    // mengecek apakah ada error ketika menjalankan query
    if(!$result){
        die ("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    } else {
        // apabila edit data berhasil, maka redirect ke halaman lihat_data.php
        header("Location:./"); 
    }

} else {
    echo "Form edit menu harus di isi";
}
?>
