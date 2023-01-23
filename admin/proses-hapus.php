<?php 
  require('../db.php');
  $id_pesan = $_GET['id_pesan'];
  $delete_pesan = mysqli_query($conn, "DELETE FROM pesan WHERE id = '$id_pesan'");
  echo "<script>window.location='index.php'</script>";
?>