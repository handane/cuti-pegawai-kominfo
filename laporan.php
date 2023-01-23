<?php
// error_reporting(0);
session_start();
include("db.php");
if (!isset($_SESSION["user"])) {
   echo "<script>location='index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <title>SIDINI</title>
   <link rel="icon" type="image/png" href="foto/tut wuri.png">
   <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
   <link href="css/styles.css" rel="stylesheet" />
   <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
   <style>
      #noborder {
         border: none;
         background: none;
      }

      .tabel-border {
         border: 1px solid black;
      }

      .tabel-border th {
         background-color: #DFDFDE;
      }

      #font {
         font-size: 14px;
      }

      #grey {
         background-color: #54BAB9;
      }

      #border-body {
         border-color: #54BAB9;
      }

      .tengah {
         text-align: center;
      }

      .pad-10 {
         width: 50px;
      }

      .mar-10 {
         margin: 10px 0px 0 15px;
      }

      .warning {
         padding: 5px 0 5px 7px;
         background-color: rgba(255, 220, 0, 0.3);
         border: 1px dotted rgba(255, 185, 37, 0.8);
         border-radius: 5px;
         color: rgba(180, 133, 1, 1);
         width: 190px;
      }

      .bgc {
         background-color: #FBFBFB;
      }

      .bx-shadow {
         box-sizing: border-box;
         box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
      }

      .bx-shadow2 {
         box-sizing: border-box;
         box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
         padding: 15px;
      }

      .kirim {
         background-image: url(icons/send-fill.svg);
         background-position: 135px center;
         background-repeat: no-repeat;
         /* margin-right: 5px; */
      }

      .alert-atas {
         position: absolute;
         top: 10px;
         right: 20px;
      }

      span {
         color: #B20600;
      }

      .last {
         color: black;
         float: right;
      }
   </style>
</head>

<body class="sb-nav-fixed">

   <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
      <!-- Navbar Brand-->
      <a class="navbar-brand ps-3" href="paud.php"> SIDINI </a>
      <!-- Sidebar Toggle-->
      <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
         <i class="fas fa-bars"></i>
      </button>

      <!-- navbar nama -->
      <div class="navbar-nav ps-3 d-md-inline-block form-inline ms-auto" href="index.html" style="color: white; text-decoration: none">
         <p><?php echo "<p>" . $_SESSION['user']['nama_paud'] . "</p>" ?></p>
      </div>

      <!-- navbar icon  -->
      <ul class="navbar-nav me-0 me-md-3 my-2 my-md-0">
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
               <li><a class="dropdown-item" href="paud.php">Profil</a></li>
               <li>
                  <hr class="dropdown-divider" />
               </li>
               <li><a href="logout.php" class="dropdown-item">logout</a></li>

            </ul>
         </li>
      </ul>
   </nav>
   <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
         <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
               <div class="nav">
                  <div class="sb-sidenav-menu-heading">main</div>
                  <a class="nav-link" href="dashboard.php">
                     <div class="sb-nav-link-icon">
                        <i class="fas fa-home"></i>
                     </div>
                     Home
                  </a>
                  <a class="nav-link aktif" href="laporan.php">
                     <div class="sb-nav-link-icon">
                        <i class="far fa-calendar"></i>
                     </div>
                     Kirim Laporan
                  </a>
                  <a class="nav-link" href="riwayat-laporan.php">
                     <div class="sb-nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                     </div>
                     Riwayat Laporan
                  </a>
                  <a class="nav-link" href="paud.php">
                     <div class="sb-nav-link-icon">
                        <i class="fas fa-book"></i>
                     </div>
                     Identitas PAUD
                  </a>

                  <a class="nav-link" href="tenaga-pendidik.php">
                     <div class="sb-nav-link-icon">
                        <i class="fas fa-book"></i>
                     </div>
                     Tenaga Pendidik
                  </a>

                  <a class="nav-link" href="peserta-didik.php">
                     <div class="sb-nav-link-icon">
                        <i class="fas fa-book"></i>
                     </div>
                     Peserta Didik
                  </a>
                  <a class="nav-link" href="sarana-dan-prasarana.php">
                     <div class="sb-nav-link-icon">
                        <i class="fas fa-book"></i>
                     </div>
                     Sarana dan Prasarana
                  </a>
                  <a class="nav-link" href="help.php">
                     <div class="sb-nav-link-icon">
                        <i class="far fa-question-circle"></i>
                     </div>
                     Bantuan
                  </a>
               </div>
            </div>
            <div class="sb-sidenav-footer">
               <div class="small">masuk sebagai:</div>
               PAUD
            </div>
         </nav>
      </div>
      <div id="layoutSidenav_content" class="bgc">
         <main>
            <div class="container-fluid px-3">
               <h4 class="mt-4">KIRIM LAPORAN</h4>

               <ol class="breadcrumb mb-4">
                  <li class="breadcrumb-item active" style="width: 100%;">Laporan

                  </li>
               </ol>

               <?php
               function acak($panjang = 8)
               {
                  $karakter = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
                  $data = '';
                  for ($i = 0; $i < $panjang; $i++) {
                     $rand = rand(0, strlen($karakter) - 1);
                     $data .= $karakter[$rand];
                  }
                  return $data;
               }
               ?>
               <form action="" method="POST" enctype="multipart/form-data">
                  <!-- ID laporan -->
                  <input type="hidden" name="id_laporan" readonly value="<?php echo date('Ymd') . acak(); ?>">
                  <!-- Periode Laporan -->

                  <div class="card bx-shadow" id="border-body">
                     <div class="card-header" id="grey">
                        <h6>PERIODE LAPORAN</h6>
                     </div>
                     <p class="mar-10 warning" style="float: left; font-weight:500; font-size: 14px;"><img src=" icons/alert.svg" alt="" style="margin: 0 4px 2px 0;"> wajib mengisi kolom</p>
                     <div class="card-body row">
                        <div class="col-md-6">
                           <label for="" class="form-label-md">
                              <h6>Bulan</h6>
                           </label>
                           <select class="form-select form-select-md" aria-label=".form-select-sm example" name="bulan" required>
                              <option value="<?php date('M') ?>"> - </option>
                              <option value="Januari">Januari</option>
                              <option value="Februari">Februari</option>
                              <option value="Maret">Maret</option>
                              <option value="April">April</option>
                              <option value="Mei">Mei</option>
                              <option value="Juni">Juni</option>
                              <option value="Juli">Juli</option>
                              <option value="Agustus">Agustus</option>
                              <option value="September">September</option>
                              <option value="Oktober">Oktober</option>
                              <option value="November">November</option>
                              <option value="Desember">Desember</option>
                           </select>
                        </div>
                        <!-- tahun                      -->
                        <div class="col-md-6">
                           <label for="" class="form-label-md">
                              <h6>Tahun</h6>
                           </label>
                           <input type="text" class="form-control" value="<?php echo date('Y') ?>" name="tahun">
                        </div>
                     </div>
                  </div>
                  <br>

                  <!-- Identitas Satuan -->
                  <div class="card bx-shadow" id="border-body">
                     <div class="card-header" id="grey">
                        <h6>IDENTITAS SATUAN PAUD</h6>
                     </div>
                     <div class="card-body" id="border-body">
                        <table class="table table-sm">
                           <tbody>
                              <?php
                              $paud = $_SESSION['user']['npsn'];
                              $x = mysqli_query($conn, "SELECT * FROM user WHERE npsn = $paud");
                              if (mysqli_num_rows($x) > 0) {
                                 while ($p = mysqli_fetch_array($x)) {
                              ?>
                                    <tr>
                                       <td class="col-md-3">Nama Satuan Pendidikan</td>
                                       <td>:</td>
                                       <td>
                                          <?php echo $p['nama_paud'] ?>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>NPSN</td>
                                       <td>:</td>
                                       <td>
                                          <?php echo $p['npsn'] ?>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>No. Perijinan</td>
                                       <td>:</td>
                                       <td>
                                          <?php echo $p['no_perijinan'] ?>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>DiKeluarkan Tanggal</td>
                                       <td>:</td>
                                       <td>
                                          <?php echo $p['dikeluarkan_tanggal'] ?>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>Alamat</td>
                                       <td>:</td>
                                       <td>
                                          <?php echo $p['alamat'] ?>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>Email/Website</td>
                                       <td>:</td>
                                       <td>
                                          <?php echo $p['email'] ?>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>Akreditasi</td>
                                       <td>:</td>
                                       <td>
                                          <?php echo $p['akreditasi'] ?>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>No. SK. Akreditasi</td>
                                       <td>:</td>
                                       <td>
                                          <?php echo $p['no_sk_akreditasi'] ?>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>Nama Bank</td>
                                       <td>:</td>
                                       <td>
                                          <?php echo $p['nama_bank'] ?>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>No Rekening</td>
                                       <td>:</td>
                                       <td>
                                          <?php echo $p['no_rekening'] ?>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>Atas Nama</td>
                                       <td>:</td>
                                       <td>
                                          <?php echo $p['atas_nama'] ?>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>Pengelola/Kepsek</td>
                                       <td>:</td>
                                       <td>
                                          <?php echo $p['pengelola'] ?>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>No. HP</td>
                                       <td>:</td>
                                       <td>
                                          <?php echo $p['no_hp'] ?>
                                       </td>
                                    </tr>
                              <?php }
                              } ?>
                           </tbody>
                        </table>
                     </div>
                  </div>

                  <br>

                  <!-- Pendidik dan Tenaga Pendidik -->
                  <div class="card bx-shadow" id="border-body">
                     <div class="card-header" id="grey">
                        <h6>PENDIDIK DAN TENAGA KEPENDIDIKAN</h6>
                     </div>
                     <div class="card-body table-responsive">
                        <table class="table table-bordered table-sm" id="font">
                           <thead>
                              <tr>
                                 <th>No</th>
                                 <th>Nama</th>
                                 <th>Jenis Kelamin</th>
                                 <th>tempat lahir</th>
                                 <th>Tgl lahir</th>
                                 <th>pendidikan</th>
                                 <th>status</th>
                                 <th>tgl tugas</th>
                                 <th>jabatan</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              $no = 1;
                              $id_author = $_SESSION['user']['npsn'];
                              $pendidik = mysqli_query($conn, "SELECT * FROM tenaga_pendidik WHERE id_author = $id_author");
                              if (mysqli_num_rows($pendidik) > 0) {
                                 while ($row = mysqli_fetch_array($pendidik)) {
                              ?>
                                    <tr>
                                       <?php
                                       $id = $row['id_tenaga_pendidik'];
                                       ?>
                                       <td>
                                          <?php echo $no++ ?>
                                          <input type="hidden" readonly value="<?php echo $row['id_tenaga_pendidik'] ?>" name="id_tenaga_pendidik[]" id="noborder">
                                       </td>
                                       <td>
                                          <input type="text" readonly value="<?php echo $row['nama_pendidik'] ?>" name="nama_pendidik[]" id="noborder">

                                       </td>
                                       <td>
                                          <input type="text" readonly value="<?php echo $row['jenis_kelamin'] ?>" name="jenis_kelamin[]" id="noborder">
                                       </td>
                                       <td>
                                          <input type="text" readonly value="<?php echo $row['tempat_lahir'] ?>" name="tempat_lahir[]" id="noborder">
                                       </td>
                                       <td>
                                          <input type="text" readonly value="<?php echo $row['tanggal_lahir'] ?>" name="tanggal_lahir[]" id="noborder">
                                       </td>
                                       <td>
                                          <input type="text" readonly value="<?php echo $row['pendidikan_terakhir'] ?>" name="pendidikan_terakhir[]" id="noborder">

                                       </td>
                                       <td>
                                          <input type="text" readonly value="<?php echo $row['status'] ?>" name="status[]" id="noborder">
                                       </td>
                                       <td>
                                          <input type="text" readonly value="<?php echo $row['tanggal_mulai_tugas'] ?>" name="tanggal_mulai_tugas[]" id="noborder">
                                       </td>
                                       <td>
                                          <input type="text" readonly value="<?php echo $row['jabatan'] ?>" name="jabatan[]" id="noborder">
                                          <input type="hidden" class="form-control" name="id_author[]" value="<?php echo $_SESSION['user']['npsn']; ?>" />
                                       </td>
                                    </tr>
                                 <?php
                                 }
                              } else {
                                 ?>
                                 <tr>
                                    <td colspan="8">tidak ada data</td>
                                 </tr>
                              <?php } ?>
                           </tbody>
                        </table>

                        <?php
                        $hitung = mysqli_query($conn, "SELECT COUNT(id_tenaga_pendidik) FROM tenaga_pendidik WHERE id_author = $id_author");
                        while ($row2 = mysqli_fetch_array($hitung)) {
                           $jumlah_pendidik = $row2['COUNT(id_tenaga_pendidik)'];
                        }
                        ?>
                        <input type="hidden" name="count_pendidik" value="<?php echo $jumlah_pendidik; ?>">

                     </div>
                  </div>
                  <!-- END pendidik dan tenaga kependidikan  -->
                  <br>
                  <!-- Peserta Didik -->
                  <div class="card mb-4 bx-shadow" id="border-body">
                     <div class="card-header" id="grey">
                        <h6>PESERTA DIDIK</h6>
                     </div>
                     <div class="card-body table-responsive">
                        <?php
                        $no = 1;
                        $id_author = $_SESSION['user']['npsn'];
                        $peserta = mysqli_query($conn, "SELECT * FROM peserta_didik WHERE id_author = $id_author");
                        if (mysqli_num_rows($peserta) > 0) {
                           while ($lihat_peserta = mysqli_fetch_array($peserta)) {
                        ?>
                              <table class="table table-striped table-bordered table-sm tengah" id="font">
                                 <thead>
                                    <tr class="tengah ftn-pad">
                                       <th colspan="3">1-2 Tahun</th>
                                       <th colspan="3">3 Tahun</th>
                                       <th colspan="3">4 Tahun</th>
                                       <th colspan="3">5-6 Tahun</th>
                                       <th colspan="3">Total Seluruhnya</th>
                                    </tr>
                                    <tr class="tengah ftn-pad">
                                       <td>L</td>
                                       <td>P</td>
                                       <td><span>Total</span></td>
                                       <td>L</td>
                                       <td>P</td>
                                       <td><span>Total</span> </td>
                                       <td>L</td>
                                       <td>P</td>
                                       <td><span>Total</span> </td>
                                       <td>L</td>
                                       <td>P</td>
                                       <td><span>Total</span> </td>
                                       <td>L</td>
                                       <td>P</td>
                                       <td><span>Total</span> </td>
                                    </tr>

                                 </thead>
                                 <tbody class="ftn-pad">

                                    <?php
                                    $J12 = $lihat_peserta['L12'] + $lihat_peserta['P12'];
                                    $J3 = $lihat_peserta['L3'] + $lihat_peserta['P3'];
                                    $J4 = $lihat_peserta['L4'] + $lihat_peserta['P4'];
                                    $J56 = $lihat_peserta['L56'] + $lihat_peserta['P56'];
                                    $total_L = $lihat_peserta['L12'] + $lihat_peserta['L3'] + $lihat_peserta['L4'] + $lihat_peserta['L56'];
                                    $total_P = $lihat_peserta['P12'] + $lihat_peserta['P3'] + $lihat_peserta['P4'] + $lihat_peserta['P56'];
                                    $J_total = $J12 + $J3 + $J4 + $J56;
                                    ?>
                                    <tr>
                                       <td>
                                          <input type="hidden" class="tengah pad-10" id="noborder" name="id_peserta[]" value="<?php echo $lihat_peserta['id'] ?>" />
                                          <input type="text" class="tengah pad-10" id="noborder" name="L12[]" readonly value="<?php echo $lihat_peserta['L12'] ?>" />
                                       </td>
                                       <td>
                                          <input type="text" class="tengah pad-10" id="noborder" name="P12[]" readonly value="<?php echo $lihat_peserta['P12'] ?>" />
                                       </td>
                                       <td>
                                          <span> <?php echo $J12 ?></span>
                                       </td>
                                       <td>
                                          <input type="text" class="tengah pad-10" id="noborder" name="L3[]" readonly value="<?php echo $lihat_peserta['L3'] ?>" />
                                       </td>
                                       <td>
                                          <input type="text" class="tengah pad-10" id="noborder" name="P3[]" readonly value="<?php echo $lihat_peserta['P3'] ?>" />
                                       </td>
                                       <td>
                                          <span><?php echo $J3 ?></span>
                                       </td>
                                       <td>
                                          <input type="text" class="tengah pad-10" id="noborder" name="L4[]" readonly value="<?php echo $lihat_peserta['L4'] ?>" />
                                       </td>
                                       <td>
                                          <input type="text" class="tengah pad-10" id="noborder" name="P4[]" readonly value="<?php echo $lihat_peserta['P4'] ?>" />
                                       </td>
                                       <td>
                                          <span><?php echo $J4 ?></span>
                                       </td>
                                       <td>
                                          <input type="text" class="tengah pad-10" id="noborder" name="L56[]" readonly value="<?php echo $lihat_peserta['L56'] ?>" />
                                       </td>
                                       <td>
                                          <input type="text" class="tengah pad-10" id="noborder" name="P56[]" readonly value="<?php echo $lihat_peserta['P56'] ?>" />
                                       </td>
                                       <td>
                                          <span><?php echo $J56 ?></span>
                                       </td>
                                       <td>
                                          <?php echo $total_L ?>
                                       </td>
                                       <td>
                                          <?php echo $total_P ?>
                                       </td>
                                       <td>
                                          <span><?php echo $J_total ?> </span>
                                       </td>
                                    </tr>

                                 </tbody>
                              </table>
                              <table class="table table-striped table-bordered table-sm tengah" id="font">
                                 <thead>
                                    <tr class="tengah ftn-pad">
                                       <th>Pindah (masuk)</th>
                                       <th>Pindah (keluar)</th>
                                       <th>Baru</th>
                                       <th>Berhenti</th>
                                    </tr>

                                 </thead>
                                 <tbody class="ftn-pad">
                                    <tr>
                                       <td>
                                          <input type="text" class="tengah pad-10" id="noborder" name="pindah_masuk[]" value="<?php echo $lihat_peserta['pindah_masuk'] ?>" />
                                       </td>
                                       <td>
                                          <input type="text" class="tengah pad-10" id="noborder" name="pindah_keluar[]" value="<?php echo $lihat_peserta['pindah_keluar'] ?>" />
                                       </td>
                                       <td>
                                          <input type="text" class="tengah pad-10" id="noborder" name="baru[]" value="<?php echo $lihat_peserta['baru'] ?>" />
                                       </td>
                                       <td>
                                          <input type="text" class="tengah pad-10" id="noborder" name="berhenti[]" value="<?php echo $lihat_peserta['berhenti'] ?>" />
                                          <input type="hidden" class="form-control" name="id_author[]" value="<?php echo $_SESSION['user']['npsn']; ?>" />
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                              <?php
                              $hitung_peserta = mysqli_query($conn, "SELECT COUNT(id_peserta) FROM peserta_didik WHERE id_author = $id_author");
                              while ($row3 = mysqli_fetch_array($hitung_peserta)) {
                                 $jumlah_peserta = $row3['COUNT(id_peserta)'];
                              }
                              ?>
                              <input type="hidden" name="count_peserta" value="<?php echo $jumlah_peserta; ?>">
                           <?php
                           }
                        } else {
                           ?>
                           <table>
                              <tr>
                                 <td>tidak ada data</td>
                              </tr>
                           </table>
                        <?php } ?>
                     </div>
                  </div>
                  <!-- END peserta didik -->

                  <!-- Sarana dan Prasarana -->
                  <div class="card mb-4 bx-shadow" id="border-body">
                     <div class="card-header" id="grey">
                        <h6>SARANA DAN PRASARANA</h6>
                     </div>
                     <div class="card-body table-responsive">
                        <table class="table table-striped table-bordered table-sm" id="font">
                           <thead>
                              <tr>
                                 <th>Jenis</th>
                                 <th>Jumlah</th>
                                 <th>Status Kepemilikan</th>
                                 <th>Kondisi</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              $no = 1;
                              $id_author = $_SESSION['user']['npsn'];
                              $sarana = mysqli_query($conn, "SELECT * FROM sarana_dan_prasarana WHERE id_author = $id_author");
                              if (mysqli_num_rows($sarana) > 0) {
                                 while ($tampil = mysqli_fetch_array($sarana)) {
                              ?>

                                    <tr>
                                       <td>
                                          <input type="hidden" readonly value="<?php echo $tampil['id_prasarana'] ?>" name="id_prasarana[]">
                                          <input type="hidden" readonly name="jenis[]" value="<?php echo $tampil['jenis'] ?>" name="jenis[]">
                                          <?php echo $tampil['jenis'] ?>
                                       </td>
                                       <td>
                                          <input type="hidden" readonly name="jumlah[]" value="<?php echo $tampil['jumlah'] ?>" name="jumlah[]">
                                          <?php echo $tampil['jumlah'] ?>
                                       </td>
                                       <td>
                                          <input type="hidden" readonly name="status_kepemilikan[]" value="<?php echo $tampil['status_kepemilikan'] ?>" name="status_kepemilikan[]">
                                          <?php echo $tampil['status_kepemilikan'] ?>
                                       </td>
                                       <td>
                                          <input type="hidden" readonly name="kondisi[]" value="<?php echo $tampil['kondisi'] ?>" name="kondisi[]">
                                          <?php echo $tampil['kondisi'] ?>
                                          <input type="hidden" class="form-control" name="id_author[]" value="<?php echo $_SESSION['user']['npsn']; ?>" />
                                       </td>
                                    </tr>
                                 <?php
                                 }
                              } else { ?>
                                 <tr>
                                    <td colspan="4">tidak ada data</td>
                                 </tr>
                              <?php } ?>
                           </tbody>
                        </table>
                        <?php
                        $hitung_sarana = mysqli_query($conn, "SELECT COUNT(id_prasarana) FROM sarana_dan_prasarana WHERE id_author = $id_author");
                        while ($row_sarana = mysqli_fetch_array($hitung_sarana)) {
                           $jumlah_sarana = $row_sarana['COUNT(id_prasarana)'];
                        }
                        ?>
                        <input type="hidden" name="count_prasarana" value="<?php echo $jumlah_sarana; ?>">
                     </div>
                  </div>
                  <!-- END sarana dan prasarana -->
                  <!-- Kegiatan Bulanan -->
                  <div class="card bx-shadow" id="border-body">
                     <div class="card-header" id="grey">
                        <h6>KEGIATAN BULANAN</h6>

                     </div>

                     <p class="mar-10 warning" style="float: left; font-weight:500; font-size: 14px;"><img src=" icons/alert.svg" alt="" style="margin: 0 4px 2px 0;"> wajib mengisi kolom</p>

                     <div class="card-body table-responsive">
                        <div class="bx-shadow2 table-responsive" id="font">
                           <table class="table table-bordered table-sm">
                              <thead>
                                 <tr class="tengah ftn-pad">
                                    <th>No</th>
                                    <th>Bentuk KBM</th>
                                    <th>Jumlah Hari KBM</th>
                                    <th>Jumlah Hari kerja</th>
                                    <th>Prosentase Kehadiran Peserta Didik</th>
                                    <th>Prosentase Kehadiran Pegawai</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 $id_author = $_SESSION['user']['npsn'];
                                 ?>
                                 <tr>
                                    <td>1</td>
                                    <td>
                                       <input type="text" name="bentuk_kbm" id="noborder" readonly value="Tatap Muka">
                                    </td>
                                    <td id="ftn-mar">
                                       <input type="text" id="ftn-jar" name="jumlah_hari_kbm" placeholder="0">
                                    </td>
                                    <td>
                                       <input type="text" name="jumlah_hari_kerja" placeholder="0">
                                    </td>
                                    <td>
                                       <input type="text" name="kehadiran_peserta" placeholder="0"> %
                                    </td>
                                    <td>
                                       <input type="text" name="kehadiran_pegawai" placeholder="0"> %
                                       <input type="hidden" name="author" value="<?php echo $_SESSION['user']['npsn'] ?>">
                                    </td>
                                 </tr>
                                 <tr class="ftn-pad">
                                    <td>2</td>
                                    <td>
                                       <input type="text" name="bentuk_kbm2" id="noborder" readonly value="Belajar Dari Rumah">
                                    </td>
                                    <td>
                                       <input type="text" id="ftn-mar" name="jumlah_hari_kbm2" placeholder="0">
                                    </td>
                                    <td>
                                       <input type="text" name="jumlah_hari_kerja2" placeholder="0">
                                    </td>
                                    <td>
                                       <input type="text" name="kehadiran_peserta2" placeholder="0"> %
                                    </td>
                                    <td>
                                       <input type="text" name="kehadiran_pegawai2" placeholder="0"> %
                                       <input type="hidden" name="author" value="<?php echo $_SESSION['user']['npsn'] ?>">
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                           <div class="row g-3">
                              <div class="col-md-12">
                                 <label for="" class="form-label-md ftn-pad"><b>Sisipkan gambar:</b><br>gambar yang diupload maksimal berukuran 5MB</label>
                              </div>
                              <div class="col-md-3 tengah ">
                                 <div class="form-control klik">
                                    <img src="icons/card-image.svg" alt="">
                                    <div class="btn-sm gambar"><input type="file" name="foto_1" class="btn-sm gambar form-control up-gambar"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <br>
                        <div class="bx-shadow2" id="font">
                           <div class="col-md-12">
                              <label for="" class="form-label-md ftn-pad"><b>Kegiatan Lainnya</b></label>
                              <input type="text" name="kegiatan_lainnya" placeholder="masukkan teks..." style="border: 1px solid grey;" class="form-control borderb"></input>
                           </div>
                           <br>
                           <div class="row g-3">
                              <div class="col-md-12">
                                 <label for="" class="form-label-md ftn-pad"><b>Sisipkan gambar:</b><br>gambar yang diupload maksimal berukuran 5MB </label>
                              </div>
                              <div class="col-md-3 tengah ">
                                 <div class="form-control klik">
                                    <img src="icons/card-image.svg" alt="">
                                    <div class="btn-sm gambar">
                                       <input type="file" name="foto_11" class="btn-sm gambar form-control up-gambar">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>
                  <!-- submit -->
                  <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kirim" style="float: right; margin-bottom:5px; padding:10px;">
                     KIRIM LAPORAN <img src="icons/send-fill.svg" alt="" style="margin-bottom:3px;">
                  </button>
                  <div class="modal fade" id="kirim" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="kirimLabel" aria-hidden="true">
                     <div class="modal-dialog dialog-sm">
                        <div class="modal-content">
                           <div class="modal-header">
                              <img src="icons/alert-red.svg" style="margin: 0 5px 6px 0;">
                              <h5>KIRIM LAPORAN</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                              </button>
                           </div>
                           <div class="modal-body">
                              <p>Harap diperiksa kembali, laporan yang telah dikirim tidak dapat di tarik kembali.</p>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                              <input type="submit" class="btn btn-primary" name="submit" value="KIRIM" onclick="myFunction()">
                           </div>
                        </div>
                     </div>
                  </div>

               </form>
               <?php
               $timezone = new DateTimeZone('Asia/Makassar');
               $date = new DateTime();
               $date->setTimeZone($timezone);
               if (isset($_POST["submit"])) {
                  $id_laporan = $_POST["id_laporan"];
                  $nama_pendidik = $_POST["nama_pendidik"];
                  $jenis_kelamin = $_POST['jenis_kelamin'];
                  $tempat_lahir = $_POST['tempat_lahir'];
                  $tanggal_lahir = $_POST['tanggal_lahir'];
                  $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
                  $status = $_POST['status'];
                  $tanggal_mulai_tugas = $_POST['tanggal_mulai_tugas'];
                  $jabatan = $_POST['jabatan'];
                  $id_author = $_POST['id_author'];
                  $bulan = $_POST['bulan'];
                  $tahun = $_POST['tahun'];
                  $hitung_ulang = $_POST['count_pendidik'];
                  $tanggal_kirim = $date->format('Y-m-d H:i:s');
                  // peserta didik
                  $P12 = $_POST['P12'];
                  $L12 = $_POST['L12'];
                  $P3 = $_POST['P3'];
                  $L3 = $_POST['L3'];
                  $P4 = $_POST['P4'];
                  $L4 = $_POST['L4'];
                  $P56 = $_POST['P56'];
                  $L56 = $_POST['L56'];
                  $pindah_masuk = $_POST['pindah_masuk'];
                  $pindah_keluar = $_POST['pindah_keluar'];
                  $baru = $_POST['baru'];
                  $berhenti = $_POST['berhenti'];
                  $hitung_peserta = $_POST['count_peserta'];
                  // sarana dan prasarana
                  $jenis = $_POST['jenis'];
                  $jumlah = $_POST['jumlah'];
                  $status_kepemilikan = $_POST['status_kepemilikan'];
                  $kondisi = $_POST['kondisi'];
                  $hitung_sarana = $_POST['count_prasarana'];

                  $bentuk_kbm = $_POST['bentuk_kbm'];
                  $jumlah_hari_kbm = $_POST['jumlah_hari_kbm'];
                  $jumlah_hari_kerja = $_POST['jumlah_hari_kerja'];
                  $kehadiran_peserta = $_POST['kehadiran_peserta'];
                  $kehadiran_pegawai = $_POST['kehadiran_pegawai'];
                  $bentuk_kbm2 = $_POST['bentuk_kbm2'];
                  $jumlah_hari_kbm2 = $_POST['jumlah_hari_kbm2'];
                  $jumlah_hari_kerja2 = $_POST['jumlah_hari_kerja2'];
                  $kehadiran_peserta2 = $_POST['kehadiran_peserta2'];
                  $kehadiran_pegawai2 = $_POST['kehadiran_pegawai2'];
                  $kegiatan_lainnya = $_POST['kegiatan_lainnya'];
                  $author = $_POST['author'];

                  $filename1 = $_FILES['foto_1']['name']; // file kegiatan pembelajaran
                  // $filename2 = $_FILES['foto_2']['name'];
                  // $filename3 = $_FILES['foto_3']['name'];
                  // $filename4 = $_FILES['foto_4']['name'];

                  $filename11 = $_FILES['foto_11']['name']; // file kegiatan lainnya
                  // $filename22 = $_FILES['foto_22']['name'];
                  // $filename33 = $_FILES['foto_33']['name'];
                  // $filename44 = $_FILES['foto_44']['name'];

                  $tmp_name1 = $_FILES['foto_1']['tmp_name']; // file kegiatan pembelajaran
                  // $tmp_name2 = $_FILES['foto_2']['tmp_name'];
                  // $tmp_name3 = $_FILES['foto_3']['tmp_name'];
                  // $tmp_name4 = $_FILES['foto_4']['tmp_name'];

                  $tmp_name11 = $_FILES['foto_11']['tmp_name']; // file kegiatan lainnya
                  // $tmp_name22 = $_FILES['foto_22']['tmp_name'];
                  // $tmp_name33 = $_FILES['foto_33']['tmp_name'];
                  // $tmp_name44 = $_FILES['foto_44']['tmp_name'];

                  $ukuran1 = $_FILES['foto_1']['size'];
                  // $ukuran2 = $_FILES['foto_2']['size'];
                  // $ukuran3 = $_FILES['foto_3']['size'];
                  // $ukuran4 = $_FILES['foto_4']['size'];
                  $ukuran5 = $_FILES['foto_11']['size'];
                  // $ukuran6 = $_FILES['foto_22']['size'];
                  // $ukuran7 = $_FILES['foto_33']['size'];
                  // $ukuran8 = $_FILES['foto_44']['size'];

                  $type1 = explode('.', $filename1); // file kegiatan pembelajaran
                  $type2 = $type1[1];
                  // $type3 = explode('.', $filename2);
                  // $type4 = $type3[1];
                  // $type5 = explode('.', $filename3);
                  // $type6 = $type5[1];
                  // $type7 = explode('.', $filename4);
                  // $type8 = $type7[1];

                  $type11 = explode('.', $filename11); // file kegiatan lainnya
                  $type12 = $type11[1];
                  // $type33 = explode('.', $filename22);
                  // $type14 = $type33[1];
                  // $type55 = explode('.', $filename33);
                  // $type16 = $type55[1];
                  // $type66 = explode('.', $filename44);
                  // $type18 = $type66[1];

                  $newname1 = $author . 'foto' . '1' . time() . '.' . $type2; // file kegiatan pembelajaran
                  // $newname2 = $author . 'foto' . '2' . time() . '.' . $type4;
                  // $newname3 = $author . 'foto' . '3' . time() . '.' . $type6;
                  // $newname4 = $author . 'foto' . '4' . time() . '.' . $type8;

                  $newname11 = $author . 'lainnya' . '1' . time() . '.' . $type12; // file kegiatan lainnya
                  // $newname22 = $author . 'lainnya' . '2' . time() . '.' . $type14;
                  // $newname33 = $author . 'lainnya' . '3' . time() . '.' . $type16;
                  // $newname44 = $author . 'lainnya' . '4' . time() . '.' . $type18;

                  $tipe_diizinkan = array('jpg', 'jpeg', 'png', '');
                  $maxsize = 5120000;
                  if (in_array($type2 or $type12, $tipe_diizinkan) === true) {
                     if ($ukuran1 < $maxsize && $ukuran5 < $maxsize) {
                        $query = mysqli_query($conn, "SELECT * FROM admin_peserta_didik WHERE bulan='{$bulan}' AND tahun='{$tahun}' AND id_author ='{$author}'");
                        if (mysqli_num_rows($query) == 0) {
                           $dest = "./foto/" . $_FILES['foto_1']['name'];
                           if (move_uploaded_file($tmp_name1, $dest)) {
                              list($lebar, $tinggi) = getimagesize($dest);
                              $filebaru = imagecreatefromjpeg($dest);
                              $warnabaru = imagecreatetruecolor($lebar, $tinggi);
                              imagecopyresampled($warnabaru, $filebaru, 0, 0, 0, 0, $lebar, $tinggi, $lebar, $tinggi);
                              imagejpeg($warnabaru, $dest, 25);
                           } else {
                              echo "gagal";
                           };
                           // move_uploaded_file($tmp_name2, './foto/' . $newname2);
                           // move_uploaded_file($tmp_name3, './foto/' . $newname3);
                           // move_uploaded_file($tmp_name4, './foto/' . $newname4);

                           move_uploaded_file($tmp_name11, './foto/' . $newname11);
                           // move_uploaded_file($tmp_name22, './foto/' . $newname22);
                           // move_uploaded_file($tmp_name33, './foto/' . $newname33);
                           // move_uploaded_file($tmp_name44, './foto/' . $newname44);

                           $insert_pembelajaran = mysqli_query(
                              $conn,
                              "INSERT INTO kegiatan_pembelajaran VALUES(
                                    null,
                                    '" . $bentuk_kbm . "',
                                    '" . $jumlah_hari_kbm . "',
                                    '" . $jumlah_hari_kerja . "',
                                    '" . $kehadiran_peserta . "',
                                    '" . $kehadiran_pegawai . "',
                                    '" . $bulan . "',
                                    '" . $tahun . "',
                                    '" . $author . "',
                                    '" . $id_laporan . "')"
                           );
                           $insert_pembelajaran2 = mysqli_query(
                              $conn,
                              "INSERT INTO kegiatan_pembelajaran VALUES(
                                    null,
                                    '" . $bentuk_kbm2 . "',
                                    '" . $jumlah_hari_kbm2 . "',
                                    '" . $jumlah_hari_kerja2 . "',
                                    '" . $kehadiran_peserta2 . "',
                                    '" . $kehadiran_pegawai2 . "',
                                    '" . $bulan . "',
                                    '" . $tahun . "',
                                    '" . $author . "',
                                    '" . $id_laporan . "')"
                           );
                           $insert_foto = mysqli_query(
                              $conn,
                              "INSERT INTO kegitan_pembelajaran_foto VALUES(
                                    null,
                                    '" . $newname1 . "',
                                    '" . $bulan . "',
                                    '" . $tahun . "',
                                    '" . $author . "',
                                    '" . $id_laporan . "')"
                           );
                           $insert_lainnya = mysqli_query(
                              $conn,
                              "INSERT INTO kegiatan_lainnya VALUES(
                                    null,
                                    '" . $kegiatan_lainnya . "',
                                    '" . $newname11 . "',
                                    '" . $bulan . "',
                                    '" . $tahun . "',
                                    '" . $author . "',
                                    '" . $id_laporan . "')"
                           );

                           for ($i = 0; $i < $hitung_ulang; $i++) {
                              $insert = mysqli_query($conn, "INSERT INTO admin_tenaga_pendidik VALUES( null,
                                    '" . $nama_pendidik[$i] . "',
                                    '" . $jenis_kelamin[$i] . "',
                                    '" . $tempat_lahir[$i] . "', 
                                    '" . $tanggal_lahir[$i] . "',
                                    '" . $pendidikan_terakhir[$i] . "',
                                    '" . $status[$i] . "',
                                    '" . $tanggal_mulai_tugas[$i] . "',
                                    '" . $jabatan[$i] . "',
                                    '" . $id_author[$i] . "',
                                    '" . $bulan . "',
                                    '" . $tahun . "',
                                    '" . $id_laporan . "')");
                           }
                           for ($s = 0; $s < $hitung_sarana; $s++) {
                              $insert_sarana = mysqli_query($conn, "INSERT INTO admin_sarana_dan_prasarana VALUES( null,
                                    '" . $jenis[$s] . "',
                                    '" . $jumlah[$s] . "',
                                    '" . $status_kepemilikan[$s] . "',
                                    '" . $kondisi[$s] . "',
                                    '" . $id_author[$s] . "',
                                    '" . $bulan . "',
                                    '" . $tahun . "',
                                    '" . $id_laporan . "')");
                           }
                           for ($d = 0; $d < $hitung_peserta; $d++) {
                              $insert_peserta = mysqli_query($conn, "INSERT INTO admin_peserta_didik VALUES( null,
                                       '" . $L12[$d] . "',
                                       '" . $P12[$d] . "',
                                       '" . $L3[$d] . "',
                                       '" . $P3[$d] . "',
                                       '" . $L4[$d] . "',
                                       '" . $P4[$d] . "',
                                       '" . $L56[$d] . "',
                                       '" . $P56[$d] . "',
                                       '" . $pindah_masuk[$d] . "',
                                       '" . $pindah_keluar[$d] . "',
                                       '" . $baru[$d] . "',
                                       '" . $berhenti[$d] . "',
                                       '" . $tanggal_kirim . "',
                                       '" . $bulan . "',
                                       '" . $tahun . "',
                                       '" . $id_author[$d] . "',
                                       '" . $id_laporan . "')");
                           }

                           if ($insert_pembelajaran and $insert_pembelajaran2 and $insert_foto and $insert_lainnya and $insert and $insert_sarana and $insert_peserta) {
                              echo '<script>alert("Laporan berhasil dikirim")</script>';
               ?>
                              <div class="alert alert-success alert-dismissible alert-atas"><img src="icons/check2-square.svg" alt=""> Laporan bulan <b><?php echo $bulan ?> <?php echo $tahun ?></b> berhasil dikirim <a href="riwayat-laporan.php" class="alert-link">Klik disini</a> untuk melihat riwayat laporan
                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                              </div>
                           <?php
                           } else {
                              echo '<script>alert("gagal mengirim, periksa kembali data anda")</script>' . mysqli_error($conn);
                           ?>

                              <div class="alert alert-danger alert-dismissible alert-atas"><img src="icons/exclamation-circle-fill.svg" alt="" style="margin-bottom: 3px;"> laporan gagal dikirim, Periksa kembali data anda
                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                              </div>

                           <?php
                           }
                        } else {
                           echo '<script>
                              alert("gagal, hanya dapat mengirim laporan bulan ' . $bulan . ' satu kali Silahkan tunggu periode laporan berikutnya")
                           </script>';
                           ?>

                           <div class="alert alert-danger alert-dismissible alert-atas"><img src="icons/exclamation-circle-fill.svg" alt="" style="margin-bottom: 3px;"> laporan gagal dikirim, hanya dapat mengirim laporan bulan <b><?php echo $bulan ?> <?php echo $tahun ?></b> sebanyak satu kali
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                           </div>

                        <?php
                        }
                     } else {
                        echo '<script>
                              alert("Laporan gagal dikirim, Ukuran gambar terlalu besar")
                           </script>';
                        ?>

                        <div class="alert alert-danger alert-dismissible alert-atas"><img src="icons/exclamation-circle-fill.svg" alt="" style="margin-bottom: 4px;"> Gagal dikirim, ukuran gambar terlalu besar maksimal 5MB <a href="help.php" class="alert-link">klik disini</a> cara mengecilkan ukuran gambar
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        </div>
                     <?php
                     }
                  } else {
                     echo '<script>
                              alert("Laporan gagal dikirim")
                           </script>';
                     ?>

                     <div class="alert alert-danger alert-dismissible alert-atas"><img src="icons/exclamation-circle-fill.svg" alt="" style="margin-bottom: 4px;"> Gagal dikirim, format gambar tidak didukung <a href="help.php" target="#format-gambar" class="alert-link">klik disini</a> untuk mempelajari
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                     </div>
               <?php
                  }
               }
               ?>
            </div>
         </main>
         <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
               <div class="d-flex align-items-center justify-content-between small">
                  <div class="text-muted">
                     Copyright &copy; Sistem Aplikasi Pelaporan Pendidikan
                     Anak Usia Dini
                  </div>
                  <div>
                     <a href="#">Privacy Policy</a>
                     &middot;
                     <a href="#">Terms &amp; Conditions</a>
                  </div>
               </div>
            </div>
         </footer>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
   <script src="js/scripts.js"></script>
   <script src="assets/demo/chart-area-demo.js"></script>
   <script src="assets/demo/chart-bar-demo.js"></script>
   <script src="datatables/datatable.js"></script>
   <script src="js/datatables-simple-demo.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
</body>

</html>