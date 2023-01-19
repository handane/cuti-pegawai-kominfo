<?php

use Mpdf\Tag\Font;

require_once __DIR__ . "/vendor/autoload.php";
$mpdf = new \Mpdf\Mpdf();

$html =
   '<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <title>SIAP PAUD</title>
   <style>
   * {
         font-family: "Times New Roman", Times, serif;
      }
      body {
         width:100%;
      }
      
   .table-3 {
      width:100%;
         border: 0.5px solid black;
         border-collapse: collapse;
      }

      .table-3 th {
         border: 0.5px solid black;
         padding: 5px;
      }

      .table-3 td {
         border: 0.5px solid black;
         padding: 5px;
      }

      .mar-40 {
         margin-left: 40px;
      }

      .mar-20 {
         margin-left: 20px;
      }

      .kontainer {
         margin: 3px;
      }
      .image {
         width:290px;
         height:160px;
         padding:10px;
      }
      .image img {
         
      }
      #font {
         font-size: 11pt;
      }
      #font2 {
         font-size: 9pt;
      }
</style>
</head>

<body>';
include("db.php");
$x = mysqli_query($conn, "SELECT * FROM admin_peserta_didik WHERE id_laporan='$_GET[id]'");
while ($p = mysqli_fetch_array($x)) {
   $html .= '
      <b>Laporan Bulan : </b>' . $p["bulan"] . '
   ' . $p["tahun"] . '</p>';
}
$html .= '
   <h5>1. IDENTITAS SATUAN PAUD</h5>';

$x = mysqli_query($conn, "SELECT * FROM user WHERE id_author='$_GET[identitas]'");
if (mysqli_num_rows($x) > 0) {
   while ($p = mysqli_fetch_array($x)) {
      $html .= '
         <table class="mar-20">
            <tr>
               <td>Nama Paud</td>
               <td>:</td>
               <td style="width: 60%;">' . $p["nama_paud"] . '</td>
            </tr>
            <tr>
               <td>NPSN</td>
               <td>:</td>
               <td>' . $p["npsn"] . '</td>
            </tr>
            <tr>
               <td>No. Perijinan</td>
               <td>:</td>
               <td>' . $p["no_perijinan"] . '</td>
            </tr>
            <tr>
               <td>Dikeluarkan Tanggal</td>
               <td>:</td>
               <td>' . $p["dikeluarkan_tanggal"] . '</td>
            </tr>
            <tr>
               <td>Alamat</td>
               <td>:</td>
               <td>' . $p["alamat"] . '</td>
            </tr>
            <tr>
                  <td>Email</td>
                  <td>:</td>
                  <td>' . $p['email'] . '</td>
               </tr>
               <tr>
                  <td>Akreditasi</td>
                  <td>:</td>
                  <td>' . $p['akreditasi'] . '</td>
               </tr>
               <tr>
                  <td>No. SK. Akreditasi</td>
                  <td>:</td>
                  <td>' . $p['no_sk_akreditasi'] . '</td>
               </tr>
               <tr>
                  <td>Nama Bank</td>
                  <td>:</td>
                  <td>' . $p['nama_bank'] . '</td>
               </tr>
               <tr>
                  <td>No Rekening</td>
                  <td>:</td>
                  <td>' . $p['no_rekening'] . '</td>
               </tr>
               <tr>
                  <td>Atas Nama</td>
                  <td>:</td>
                  <td>' . $p['atas_nama'] . '</td>
               </tr>
               <tr>
                  <td>Pengelola</td>
                  <td>:</td>
                  <td>' . $p['pengelola'] . '</td>
               </tr>
               <tr>
                  <td>No. HP</td>
                  <td>:</td>
                  <td>' . $p['no_hp'] . '</td>
               </tr>
         </table>';
   }
}
$html .= ' 
<h5>2. PENDIDIK DAN TENAGA KEPENDIDIKAN</h5>
   <table class="table-3 mar-20" id="font">
      <thead>
         <tr class="tengah">
            <th id="font">No</th>
            <th id="font">Nama</th>
            <th id="font">L/K</th>
            <th id="font">Tempat Lahir</th>
            <th id="font">Tanggal Lahir</th>
            <th id="font">Pendidik Terakhir</th>
            <th id="font">PNS/P3K/Kontrak/Honorer</th>
            <th id="font">Tanggal Mulai Tugas</th>
            <th id="font">Jabatan/Tugas</th>
         </tr>
      </thead>
      <tbody>';

$no = 1;
$x = mysqli_query($conn, "SELECT * FROM admin_tenaga_pendidik WHERE id_laporan='$_GET[id]'");
if (mysqli_num_rows($x) > 0) {
   while ($p = mysqli_fetch_array($x)) {
      $html .= '
               <tr>
                  <td>' . $no++ . '</td>
                  <td>' . $p['nama_pendidik'] . '</td>
                  <td>' . $p['jenis_kelamin'] . '</td>
                  <td>' . $p['tempat_lahir'] . '</td>
                  <td>' . $p['tanggal_lahir'] . '</td>
                  <td>' . $p['pendidikan_terakhir'] . '</td>
                  <td>' . $p['status'] . '</td>
                  <td>' . $p['tanggal_mulai_tugas'] . '</td>
                  <td>' . $p['jabatan'] . '</td>
               </tr>';
   }
}
$html .= '
</tbody>
   </table>
<h5>3. PESERTA DIDIK</h5>
   <h5 class="mar-20">A. Keadaan</h5>
   <table class="table-3 mar-40 tengah" id="font2">
      <thead>
         <tr class="tengah">
            <th colspan="3">1-2 Tahun</th>
            <th colspan="3">3 Tahun</th>
            <th colspan="3">4 Tahun</th>
            <th colspan="3">5-6 Tahun</th>
            <th colspan="3">Jumlah Seluruhnya</th>
         </tr>
         <tr>
            <th>L</th>
            <th>P</th>
            <th>Jumlah</th>
            <th>L</th>
            <th>P</th>
            <th>Jumlah</th>
            <th>L</th>
            <th>P</th>
            <th>Jumlah</th>
            <th>L</th>
            <th>P</th>
            <th>Jumlah</th>
            <th>L</th>
            <th>P</th>
            <th>Jumlah</th>
         </tr>
      </thead>
      <tbody>';

$x = mysqli_query($conn, "SELECT * FROM admin_peserta_didik WHERE id_laporan='$_GET[id]'");
if (mysqli_num_rows($x) > 0) {
   while ($p = mysqli_fetch_array($x)) {


      $J12 = $p['L12'] + $p['P12'];
      $J3 = $p['L3'] + $p['P3'];
      $J4 = $p['L4'] + $p['P4'];
      $J56 = $p['L56'] + $p['P56'];
      $total_L = $p['L12'] + $p['L3'] + $p['L4'] + $p['L56'];
      $total_P = $p['P12'] + $p['P3'] + $p['P4'] + $p['P56'];
      $J_total = $J12 + $J3 + $J4 + $J56;
      $html .= '
               <tr>
                  <td>' . $p['L12'] . '</td>
                  <td>' . $p['P12'] . '</td>
                  <td>' . $J12 . '</td>
                  <td>' . $p['L3'] . '</td>
                  <td>' . $p['P3'] . '</td>
                  <td>' . $J3 . '</td>
                  <td>' . $p['L4'] . '</td>
                  <td>' . $p['P4'] . '</td>
                  <td>' . $J4 . '</td>
                  <td>' . $p['L56'] . '</td>
                  <td>' . $p['P56'] . '</td>
                  <td>' . $J56 . '</td>
                  <td>' . $total_L . '</td>
                  <td>' . $total_P . '</td>
                  <td>' . $J_total . '</td>
               </tr>';
   }
}
$html .= '
      </tbody>
   </table>
   <h5 class="mar-20">B. Mutasi</h5>
                     <table class="table-3 mar-40 tengah" id="font2">
                        <thead>
                           <tr class="tengah atas-bg2">
                              <th>Pindah (Masuk)</th>
                              <th>Pindah (Keluar)</th>
                              <th>Baru</th>
                              <th>Berhenti</th>
                           </tr>
                        </thead>
                        <tbody>';

$no = 1;
$peserta = mysqli_query($conn, "SELECT * FROM admin_peserta_didik WHERE id_laporan ='$_GET[id]'");
if (mysqli_num_rows($peserta) > 0) {
   while ($row = mysqli_fetch_array($peserta)) {

      $html .= ' 
                                 <tr>
                                    <td>
                                         ' . $row['pindah_masuk'] . ' 
                                    </td>
                                    <td>
                                         ' . $row['pindah_keluar'] . ' 
                                    </td>
                                    <td>
                                         ' . $row['baru'] . ' 
                                    </td>
                                    <td>
                                         ' . $row['berhenti'] . ' 
                                    </td>

                                 </tr>';
   }
} else {
   $html .= '
   <tr>
                                 <td colspan="8">tidak ada data</td>
                              </tr>';
}
$html .= '
                        </tbody>
                     </table>
   <h5>4. SARANA DAN PRASARANA</h5>
   <table class="table-3 mar-20" id="font2">
      <thead>
         <tr class="tengah">
            <th>No</th>
            <th>Jenis</th>
            <th>Jumlah</th>
            <th>Status Kepemilikan</th>
            <th>Kondisi</th>
         </tr>
      </thead>
      <tbody>';

$no = 1;
$x = mysqli_query($conn, "SELECT * FROM admin_sarana_dan_prasarana WHERE id_laporan='$_GET[id]'");
if (mysqli_num_rows($x) > 0) {
   while ($p = mysqli_fetch_array($x)) {

      $html .= ' 
              <tr>
                  <td>' . $no++ . '</td>
                  <td>' . $p['jenis'] . ' </td>
                  <td>' . $p['jumlah'] . ' </td>
                  <td>' . $p['status_kepemilikan'] . ' </td>
                  <td>' . $p['kondisi'] . ' </td>
               </tr>';
   }
}
$html .= '
      </tbody>
   </table>
   <h5>5. KEGIATAN BULAN INI</h5>
                     <h5 class="mar-20">A. Kegiatan Pembelajaran</h5>
                     <table class="table-3 mar-40" id="font2">
                        <thead>
                           <tr>
                              <th>No</th>
                              <th>Bentuk KBM</th>
                              <th>Jumlah Hari KBM</th>
                              <th>Jumlah Hari Kerja</th>
                              <th>Prosentase Kehadiran Peserta Didik</th>
                              <th>Prosentasi Kehadiran Pegawai</th>
                           </tr>
                        </thead>
                        <tbody>';

$no = 1;
$x = mysqli_query($conn, "SELECT * FROM kegiatan_pembelajaran WHERE id_laporan='$_GET[id]'");
if (mysqli_num_rows($x) > 0) {
   while ($p = mysqli_fetch_array($x)) {
      $html .= '
                                 <tr>
                                    <td>' . $no++ . '</td>
                                    <td>' . $p["bentuk_kbm"] . ' </td>
                                    <td>' . $p["jumlah_hari_kbm"] . ' </td>
                                    <td>' . $p["jumlah_hari_kerja"] . ' </td>
                                    <td>' . $p["kehadiran_peserta"] . ' </td>
                                    <td>' . $p["kehadiran_pegawai"] . ' </td>
                                 </tr>';
   }
}
$html .= '
                        </tbody>
                     </table>
                     <br>
               <div class="kontainer">                     
<table class="image-kontainer mar-40">
                                 <tbody>';
$foto = mysqli_query($conn, "SELECT * FROM kegitan_pembelajaran_foto WHERE id_laporan='$_GET[id]'");
if (mysqli_num_rows($foto) > 0) {
   while ($poto = mysqli_fetch_array($foto)) {
      $html .= '
                                    <tr>
                                       <td class="image"><img src="foto/' . $poto["foto_1"] . '" alt=""></td>';
   }
}
$html .= '
                                 </tbody>
                              </table>
                              </div>
                              <br>
   <h5 class="mar-20">B. Kegiatan Lainnya</h5>';
$no = 1;
$x = mysqli_query($conn, "SELECT * FROM kegiatan_lainnya WHERE id_laporan='$_GET[id]'");
while ($p = mysqli_fetch_array($x)) {
   $html .= '
            <p class="mar-40">' . $p["nama_kegiatan"] . '</p>
            ';
}


$html .= '
<br>         
<div class="kontainer">                     
<table class="image-kontainer mar-40">
                                 <tbody>';
$foto = mysqli_query($conn, "SELECT * FROM kegiatan_lainnya WHERE id_laporan='$_GET[id]'");
if (mysqli_num_rows($foto) > 0) {
   while ($poto = mysqli_fetch_array($foto)) {
      $html .= '
                                    <tr>
                                       <td class="image"><img src="foto/' . $poto["foto_1"] . '"></td>
                                       ';
   }
}
$html .= '
                                 </tbody>
                              </table>
                              </div>
         
</body>

</html>';




// $html = ob_get_contents();
$mpdf->WriteHTML(utf8_decode($html));
$mpdf->Output("laporan", \Mpdf\Output\Destination::INLINE);
exit;
