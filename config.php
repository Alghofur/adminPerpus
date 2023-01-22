<?php 
 //koneksi database   
 $conn = new mysqli("localhost", "root", "", "my_web");

 if ($conn->connect_errno) {
   echo "Koneksi Gagal, silahkan coba lihat DB: " . $conn->connect_error;
   exit();
 }
 

 function query ($query){
  global $conn;
  $result = mysqli_query($conn, $query);
  $row = [];
  while ($row = mysqli_fetch_assoc($result)){
    $row[] = $row;
  }
  return $row;
 }
?>