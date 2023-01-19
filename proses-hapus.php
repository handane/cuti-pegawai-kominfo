<?php
include 'db.php';

if (isset($_GET['id_pendidik'])) {
   $delete = mysqli_query($conn, "DELETE FROM tenaga_pendidik WHERE id_tenaga_pendidik = '" . $_GET['id_pendidik'] . "'");
   if ($delete) {
      $_SESSION['user'] = 'Dihapus';
      echo '<script>window.location="tenaga-pendidik.php"</script>';
   } else {
      $_SESSION['user'] = 'Gagal Dihapus';
      echo '<script>window.location="tenaga-pendidik.php"</script>';
   }
}
if (isset($_GET['id_prasarana'])) {
   $delete = mysqli_query($conn, "DELETE FROM sarana_dan_prasarana WHERE id_prasarana = '" . $_GET['id_prasarana'] . "'");
   echo '<script>window.location="sarana-dan-prasarana.php"</script>';
}
if (isset($_GET['id_kegiatan_lainnya'])) {
   $sql = $conn->query("SELECT * FROM kegitan_pembelajaran_foto WHERE id_author = '" . $_GET['id_kegiatan_lainnya'] . "'");
   $dataf = $sql->fetch_assoc();
   $foto = $dataf['foto_1'];
   if (file_exists("foto/$foto")) {
      unlink("foto/$foto");
   }
   $foto2 = $dataf['foto_2'];
   if (file_exists("foto/$foto2")) {
      unlink("foto/$foto2");
   }
   $foto3 = $dataf['foto_3'];
   if (file_exists("foto/$foto3")) {
      unlink("foto/$foto3");
   }

   $sql2 = $conn->query("SELECT * FROM kegiatan_lainnya WHERE id_author = '" . $_GET['id_kegiatan_lainnya'] . "'");
   $datafl = $sql2->fetch_assoc();
   $fotol1 = $datafl['foto_1'];
   if (file_exists("foto/$fotol1")) {
      unlink("foto/$fotol1");
   }
   $fotol2 = $datafl['foto_2'];
   if (file_exists("foto/$fotol2")) {
      unlink("foto/$fotol2");
   }
   $fotol3 = $datafl['foto_3'];
   if (file_exists("foto/$fotol3")) {
      unlink("foto/$fotol3");
   }

   $idf = $conn->query("DELETE FROM kegitan_pembelajaran_foto WHERE id_author = '" . $_GET['id_kegiatan_lainnya'] . "'");
   $delete = mysqli_query($conn, "DELETE FROM kegiatan_lainnya WHERE id_author = '" . $_GET['id_kegiatan_lainnya'] . "'");
   $delete2 = mysqli_query($conn, "DELETE FROM kegitan_pembelajaran_foto WHERE id_author = '" . $_GET['id_kegiatan_lainnya'] . "'");
   $delete3 = mysqli_query($conn, "DELETE FROM kegiatan_pembelajaran WHERE id_author = '" . $_GET['id_kegiatan_lainnya'] . "'");


   echo '<script>window.location="edit-kegiatan-bulanan.php"</script>';
}
