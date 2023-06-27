<?php
session_start();
include("../database/db.php");
if (!isset($_SESSION["admin"])) {
  echo "<script>location='../index.php'</script>";
}

if (isset($_GET['id_pegawai'])) {
   $delete_admin = mysqli_query($conn, "DELETE FROM pegawai WHERE id_pegawai = '" . $_GET['id_pegawai'] . "'");
   $delete_pengajuan = mysqli_query($conn, "DELETE FROM pengajuan WHERE id_pegawai = '" . $_GET['id_pegawai'] . "'");   
   if($delete_admin AND $delete_pengajuan){
      echo "<script>window.location='pegawai.php'</script>";
   }
}
?>
