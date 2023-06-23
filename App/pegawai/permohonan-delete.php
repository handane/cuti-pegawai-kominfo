<?php
session_start();
include("../database/db.php");
if (!isset($_SESSION["pegawai"])) {
  echo "<script>location='../index.php'</script>";
}

if (isset($_GET['id_pengajuan']) AND isset($_GET['id_pegawai'])) {
  $id_pengajuan = $_GET['id_pengajuan'];
  $id_pegawai = $_GET['id_pegawai'];
  
  $cek_jarak = mysqli_query($conn, "SELECT * FROM pengajuan WHERE id_pengajuan = '$id_pengajuan'");
  $cek_jumlah = mysqli_query($conn, "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'");
  $cek_jarak_2 = mysqli_fetch_array($cek_jarak);
  $cek_jumlah_2 = mysqli_fetch_array($cek_jumlah);
  
  $jenis_cuti = $cek_jarak_2['id_jeniscuti'];
  $waktu_awal = date_create($cek_jarak_2['tgl_cuti']);
  $waktu_akhir = date_create($cek_jarak_2['tgl_berakhir']);
  $diff = date_diff($waktu_awal, $waktu_akhir);
  $diff_d = $diff->d;
  $jumlah_cuti = $cek_jumlah_2['jumlah_cuti'] + $diff_d;

  if($jenis_cuti == 3){
    $update2 = mysqli_query($conn, "UPDATE pegawai SET 
                    jumlah_cuti = '$jumlah_cuti'
                    WHERE id_pegawai = '$id_pegawai'
                  ");
    $delete1 = mysqli_query($conn, "DELETE FROM pengajuan WHERE id_pengajuan = '$id_pengajuan'");
    if ($delete1 and $update2) {
      echo "<script>
    alert('permohonan cuti berhasil dibatalkan');
    window.location='cuti.php';
    </script>";
    }
  }else{
    $delete2 = mysqli_query($conn, "DELETE FROM pengajuan WHERE id_pengajuan = '$id_pengajuan'");
    if ($delete2) {
      echo "<script>
      alert('permohonan cuti berhasil dibatalkan');
      window.location='cuti.php';
      </script>";
    }
  }
echo "<script>
      alert('permohonan cuti berhasil dibatalkan');
      window.location='cuti.php';
      </script>";
}
      


