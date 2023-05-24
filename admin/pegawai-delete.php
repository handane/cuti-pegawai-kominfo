<?php
session_start();
include("../database/db.php");
if (!isset($_SESSION["admin"])) {
   echo "<script>location='../index.php'</script>";
}

if (isset($_GET['id_pegawai'])) {
  $id_pegawai = $_GET['id_pegawai'];
  $delete1 = mysqli_query($conn, "DELETE FROM pegawai WHERE id_pegawai = '$id_pegawai'");
  if($delete1) {
    echo "<script>
    alert('akun berhasil dihapus');
    window.location='pegawai.php';
    </script>";
  }
}