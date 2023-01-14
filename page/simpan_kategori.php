<?php
    include "../config.php";
    $nama_kategori=$_POST["nama_kategori"];
    $query=mysqli_query($koneksi, "insert into kategori values(null, '$nama_kategori')");
    header('location:data_kategori.php')
?>