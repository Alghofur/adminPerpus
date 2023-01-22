<?php 
    if(isset($_POST['tambah'])) {
        $nim = htmlspecialchars($_POST['nim']);
        $nama = htmlspecialchars($_POST['nama_anggota']);
        $tempat_lahir = htmlspecialchars($_POST['tempat_lahir']);
        $tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);
        $jk = htmlspecialchars($_POST['jk']);
        $prodi = htmlspecialchars($_POST['prodi']);
    
        if(empty($nim && $nama && $tempat_lahir && $tgl_lahir && $jk && $prodi)) {
            echo "<script>alert('Pastikan anda sudah mengisi semua formulir.');window.location='?p=buku';</script>";
        }
    
        $sql = $koneksi->query("INSERT INTO anggota VALUES (null, '$nim', '$nama', '$tempat_lahir', '$tgl_lahir', '$jk', '$prodi')") or die(mysqli_error($koneksi));
        if($sql) {
            echo "<script>alert('Data Berhasil Ditambahkan.');window.location='?p=anggota';</script>";
        } else {
            echo "<script>alert('Data Gagal Ditambahkan.')</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Buku</title>
</head>
<body>
  
</body>
</html>