<?php
session_start();
require("../database/db.php");
if (!isset($_SESSION["admin"])) {
  echo "<script>location='../index.php'</script>";
}

if (isset($_GET['id_jeniscuti'])) {
  $id_jeniscuti = $_GET['id_jeniscuti'];
  
  $delete1 = mysqli_query($conn, "DELETE FROM jenis_cuti WHERE id_jeniscuti = '$id_jeniscuti'");
  
if ($delete1) {
  echo "<script>
    alert('berhasil dihapus');
    window.location='cuti.php';
    </script>";
  }
}
