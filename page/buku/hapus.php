<?php 
include "../../config.php";
// menangkap id_buku di url
global $conn;
$id_buku = $_GET["id"];

$conn->query("DELETE FROM buku WHERE id_buku = $id_buku") or die(mysqli_error($conn));
echo "
<script>alert('Data Berhasil Dihapus.');
    document.location.href = 'buku.php';
</script>";

?>