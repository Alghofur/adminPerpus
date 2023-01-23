<?php 
include "../../config.php";
// menangkap id_buku di url
global $conn;
$id_anggota = $_GET["id"];

$conn->query("DELETE FROM anggota WHERE id_anggota = $id_anggota") or die(mysqli_error($conn));
echo "
<script>alert('Data Berhasil Dihapus.');
    document.location.href = 'anggota.php';
</script>";

?>