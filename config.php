<!-- $host = 'localhost';
$user = 'root';
$password = '';
$db = 'web_saya';
$conn = mysqli_connect($host, $user, $password, $db);
if (!$conn) {
    die("Maaf Koneksi Gagal: " . mysqli_connect_error());
}else {
    echo "Koneksi Berhasil";
}
mysqli_close($conn); -->

<?php 
 
$server = "localhost";
$user = "root";
$pass = "";
$database = "web_saya";
 
$koneksi = mysqli_connect($server, $user, $pass, $database);
 
if (!$koneksi) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
 
?>