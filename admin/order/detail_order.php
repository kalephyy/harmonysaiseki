<?php
include "koneksi.php";
session_start();

if (isset($_GET['no_transaksi'])) {
    $no_transaksi = $_GET['no_transaksi'];
    $query = "SELECT * FROM transaksi WHERE no_transaksi = '$no_transaksi'";
    $result = mysqli_query($koneksi, $query);
} else {
    header("location: ./");
    exit;
}
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
        .text-container1 {
            position: relative;
            border: 1px solid;
            border-radius: 11px;
            box-shadow: 0 2px 4px black;
            left: 7px;
        }

        .containers {
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

        .carousel-inner img {
            height: 366px
        }

        .navbar-text:hover {
            background-color: #E0E0E0;
            padding: 0rem;
            margin-top: -15px;
            max-height: 45px;
        }

        .navbar-text:active {
            background-color: #E0E0E0;
            padding: 0rem;
            margin-top: -15px;
            max-height: 45px;
        }
    </style>
</head>
<body style="margin-left:45px; margin-right:45px; margin-top:25px;">

<h3>Order Details</h3>
<a href="./" class="btn btn-outline-primary">< Order</a>
<table border="1" class="table" style="margin-top: 15px;">
    <thead class="thead-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Menu</th>
            <th scope="col">Status</th>
            <th scope="col">Quantity</th>
            <th scope="col">Harga</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (mysqli_num_rows($result) == 0) {
            echo '
                <tr>
                    <td colspan="7">Tidak Ada Data</td>
                </tr>';
        } else {
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $sub_total = $row["jumlah"] * $row['harga'];

                echo '
                    <tr>
                        <td>' . $no++ . '</td>
                        <td>' . $row["nama"] . '</td>
                        <td>' . $row["statuss"] . '</td>
                        <td>' . $row["jumlah"] . '</td>
                        <td>' . $row["harga"] . '</td>
                        <td>' . $sub_total . '</td>';
                        ?>
                       <td>
                        <a href="ubah_proses.php?id=<?= $row["id"] ?>&status=reject">
                            <button type="button" class="btn btn-primary btn-sm">Reject</button>
                        </a>
                        |
                        <a href="ubah_proses.php?id=<?= $row["id"] ?>&status=pending">
                            <button type="button" class="btn btn-light btn-sm">Pending</button>
                        </a>
                        |
                        <a href="ubah_proses.php?id=<?= $row["id"] ?>&status=ready">
                            <button type="button" class="btn btn-success btn-sm">Ready</button>
                        </a>
                    </td>

                    <?php
                    echo '</tr>';
            }
        }
        ?>
    </tbody>
</table>
</body>
</html>
