<?php
session_start();
include("../database/db.php");
if (!isset($_SESSION["kadis"])) {
  echo "<script>location='../index.php'</script>";
}

if (isset($_GET['id_admin'])) {
   $delete_admin = mysqli_query($conn, "DELETE FROM admin WHERE id_admin = '" . $_GET['id_admin'] . "'");   
   if($delete_admin){
      echo "<script>window.location='admin.php'</script>";
   }
}
?>
