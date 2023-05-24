<?php
session_start();
include("../database/db.php");
if (!isset($_SESSION["pegawai"])) {
  echo "<script>location='../index.php'</script>";
}

if (isset($_GET['id_pengajuan']) AND isset($_GET['id_pegawai'])) {
  $id_pengajuan = $_GET['id_pengajuan'];
  $id_pegawai = $_GET['id_pegawai'];
  $delete1 = mysqli_query($conn, "DELETE FROM pengajuan WHERE id_pengajuan = '$id_pengajuan'");

  $cek_jumlah = mysqli_query($conn, "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'");
  $cek_jumlah_2 = mysqli_fetch_array($cek_jumlah);
  $jumlah_cuti = $cek_jumlah_2['jumlah_cuti'] + 1;
  $update2 = mysqli_query($conn, "UPDATE pegawai SET 
                  jumlah_cuti = '$jumlah_cuti'
                  WHERE id_pegawai = '$id_pegawai'
                ");

  if ($delete1 AND $update2) {
    echo "<script>
    alert('permohonan cuti berhasil dibatalkan');
    window.location='cuti.php';
    </script>";
  }
}
