<?php
session_start();
include("../database/db.php");
if (!isset($_SESSION["kadis"])) {
  echo "<script>location='../index.php'</script>";
}

if (isset($_GET['id_pengajuan']) AND isset($_GET['id_pegawai'])) {
  $id_pengajuan = $_GET['id_pengajuan'];
  $id_pegawai = $_GET['id_pegawai'];
  $update = mysqli_query($conn, "UPDATE pengajuan SET 
      status_cuti = 'ditolak'
      WHERE id_pengajuan = '$id_pengajuan'
    ");

  $cek_jumlah = mysqli_query($conn, "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'");
  $cek_jumlah_2 = mysqli_fetch_array($cek_jumlah);
  $jumlah_cuti = $cek_jumlah_2['jumlah_cuti'] + 1;
  $update2 = mysqli_query($conn, "UPDATE pegawai SET 
                  jumlah_cuti = '$jumlah_cuti'
                  WHERE id_pegawai = '$id_pegawai'
                ");

  if ($update AND $update2) {
    echo "<script>
    alert('permohonan cuti ditolak');
    window.location='cuti.php';
    </script>";
  }
}
