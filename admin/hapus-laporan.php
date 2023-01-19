<?php
include('../db.php');

if (isset($_GET['idlaporan'])) {
   $delete1 = mysqli_query($conn, "DELETE FROM admin_peserta_didik WHERE id_laporan = '" . $_GET['idlaporan'] . "'");
   $delete2 = mysqli_query($conn, "DELETE FROM admin_sarana_dan_prasarana WHERE id_laporan = '" . $_GET['idlaporan'] . "'");
   $delete3 = mysqli_query($conn, "DELETE FROM admin_tenaga_pendidik WHERE id_laporan = '" . $_GET['idlaporan'] . "'");

   $sql = $conn->query("SELECT * FROM kegiatan_lainnya WHERE id_laporan = '" . $_GET['idlaporan'] . "'");
   $dataf = $sql->fetch_assoc();
   $foto = $dataf['foto_1'];
   if (file_exists("../foto/$foto")) {
      unlink("../foto/$foto");
   }

   $delete4 = mysqli_query($conn, "DELETE FROM kegiatan_lainnya WHERE id_laporan = '" . $_GET['idlaporan'] . "'");

   $delete5 = mysqli_query($conn, "DELETE FROM kegiatan_pembelajaran WHERE id_laporan = '" . $_GET['idlaporan'] . "'");

   $sql2 = $conn->query("SELECT * FROM kegitan_pembelajaran_foto WHERE id_laporan = '" . $_GET['idlaporan'] . "'");
   $datafl = $sql2->fetch_assoc();
   $foto = $datafl['foto_1'];
   if (file_exists("../foto/$foto")) {
      unlink("../foto/$foto");
   }

   $delete6 = mysqli_query($conn, "DELETE FROM kegitan_pembelajaran_foto WHERE id_laporan = '" . $_GET['idlaporan'] . "'");
   echo '<script>window.location="laporan.php"</script>';
}
if (isset($_GET['id_akun'])) {
   $deleteakun = mysqli_query($conn, "DELETE FROM user WHERE id_author = '" . $_GET['id_akun'] . "'");
   echo '<script>window.location="identitas-paud.php"</script>';
}
