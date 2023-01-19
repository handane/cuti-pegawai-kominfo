<?php
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
   <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
   <link href="css/styles.css" rel="stylesheet" />
   <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
   <style>
      .tabel-border th {
         background-color: #DFDFDE;
      }

      #font {
         font-size: 14px;
      }

      .tengah {
         text-align: center;
      }

      .mar-20 {
         margin-left: 20px;
      }

      .mar-40 {
         margin-left: 40px;
      }

      th,
      td {
         padding: 5px 10px;
      }

      .table-1 {
         width: 95%;
         border: none;
      }

      .table-2 {
         width: 95%;
      }

      .table-2 th {
         border: 1px solid;
      }

      .table-2 td {
         border: 1px solid;
      }

      .table-3 {
         width: 93%;
      }

      .table-3 th {
         border: 1px solid;
      }

      .table-3 td {
         border: 1px solid;
      }

      .table-3 {
         border: 1px solid;
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

      span {
         color: #B20600;
      }

      .kontainer .image-kontainer {
         display: flex;
         flex-wrap: wrap;
         gap: 15px;
         justify-content: center;
         padding: 10px;
      }

      .kontainer .image-kontainer .image {
         height: 100px;
         width: 180px;
         border: 10px solid white;
         box-shadow: auto;
         overflow: hidden;
         cursor: zoom-in;
      }

      .kontainer .image-kontainer .image img {
         height: 100%;
         width: 100%;
         object-fit: cover;
         transition: .2s linear;
      }

      .kontainer .image-kontainer .image:hover img {
         transform: scale(1.1);
      }

      .kontainer .popup-image {
         position: fixed;
         top: 0;
         left: 0;
         background: rgba(0, 0, 0, .9);
         height: 100%;
         width: 100%;
         z-index: 100;
         display: none;
      }

      .kontainer .popup-image span {
         position: absolute;
         top: 20px;
         right: 50px;
         font-size: 60px;
         font-weight: bolder;
         color: #fff;
         cursor: pointer;
         z-index: 100;
      }

      .kontainer .popup-image img {
         position: absolute;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
         border: 5px solid #fff;
         border-radius: 5px;
         width: 750px;
         cursor: zoom-out;
         object-fit: cover;
      }

      .bord {
         box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
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
      <div class="navbar-nav ps-3 d-md-inline-block form-inline ms-auto" style="color: white; text-decoration: none">
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
                  <div class="sb-sidenav-menu-heading">Laporan</div>
                  <a class="nav-link" href="laporan.php">
                     <div class="sb-nav-link-icon">
                        <i class="far fa-calendar"></i>
                     </div>
                     Kirim Laporan
                  </a>
                  <a class="nav-link aktif" href="riwayat-laporan.php">
                     <div class="sb-nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                     </div>
                     Riwayat Laporan
                  </a>
                  <div class="sb-sidenav-menu-heading">Laman</div>
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
            <?php
            $x = mysqli_query($conn, "SELECT * FROM admin_peserta_didik WHERE id_laporan='$_GET[id]'");
            while ($p = mysqli_fetch_array($x)) {
            ?>
               <div class="container-fluid px-3 ">
                  <ol class="breadcrumb mt-3 mb-3">
                     <li class="breadcrumb-item active" style="width: 100%;">
                        <a href="riwayat-laporan.php" style="text-decoration: none;">Riwayat Laporan</a> > <?php echo $p['bulan']; ?> <?php echo $p['tahun']; ?>
                        <a href="pdf.php?page=dot&identitas=<?php echo $p['id_author']; ?>?page=dot&id=<?php echo $p['id_laporan']; ?>" style="float: right; margin-right : 10px;" class="btn btn-sm btn-success">Unduh PDF <img src="icons/download.svg"></a>
                     </li>
                  </ol>
               <?php } ?>

               <div class="card bx-shadow">
                  <div class="card-body table-responsive" id="border-body">
                     <?php
                     $x = mysqli_query($conn, "SELECT * FROM admin_peserta_didik WHERE id_laporan='$_GET[id]'");
                     while ($p = mysqli_fetch_array($x)) {
                     ?>
                        <p><b>Laporan Bulan : </b><?php echo $p['bulan']; ?> <?php echo $p['tahun']; ?></p>
                     <?php } ?>
                     <!-- identitas paud -->
                     <h6>1. IDENTITAS SATUAN PAUD</h6>
                     <?php
                     $x = mysqli_query($conn, "SELECT * FROM user WHERE id_author='$_GET[identitas]'");
                     if (mysqli_num_rows($x) > 0) {
                        while ($p = mysqli_fetch_array($x)) {
                     ?>
                           <table class="table-1 table table-sm table-borderless mar-20" id="font">
                              <tbody>
                                 <tr>
                                    <td>Nama Paud</td>
                                    <td>:</td>
                                    <td><?php echo $p['nama_paud']; ?></td>
                                 </tr>
                                 <tr>
                                    <td>NPSN</td>
                                    <td>:</td>
                                    <td><?php echo $p['npsn']; ?></td>
                                 </tr>
                                 <tr>
                                    <td>No. Perijinan</td>
                                    <td>:</td>
                                    <td><?php echo $p['no_perijinan']; ?></td>
                                 </tr>
                                 <tr>
                                    <td>Dikeluarkan Tanggal</td>
                                    <td>:</td>
                                    <td><?php echo $p['dikeluarkan_tanggal']; ?></td>
                                 </tr>
                                 <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?php echo $p['alamat']; ?></td>
                                 </tr>
                                 <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?php echo $p['email']; ?></td>
                                 </tr>
                                 <tr>
                                    <td>Akreditasi</td>
                                    <td>:</td>
                                    <td><?php echo $p['akreditasi']; ?></td>
                                 </tr>
                                 <tr>
                                    <td>No. SK. Akreditasi</td>
                                    <td>:</td>
                                    <td><?php echo $p['no_sk_akreditasi']; ?></td>
                                 </tr>
                                 <tr>
                                    <td>Nama Bank</td>
                                    <td>:</td>
                                    <td><?php echo $p['nama_bank']; ?></td>
                                 </tr>
                                 <tr>
                                    <td>No Rekening</td>
                                    <td>:</td>
                                    <td><?php echo $p['no_rekening']; ?></td>
                                 </tr>
                                 <tr>
                                    <td>Atas Nama</td>
                                    <td>:</td>
                                    <td><?php echo $p['atas_nama']; ?></td>
                                 </tr>
                                 <tr>
                                    <td>Pengelola</td>
                                    <td>:</td>
                                    <td><?php echo $p['pengelola']; ?></td>
                                 </tr>
                                 <tr>
                                    <td>No. HP</td>
                                    <td>:</td>
                                    <td><?php echo $p['no_hp']; ?></td>
                                 </tr>
                              </tbody>
                           </table>
                     <?php }
                     } ?>
                     <br>
                     <!-- tenaga pendidik -->
                     <h6>2. PENDIDIK DAN TENAGA KEPENDIDIKAN</h6>
                     <table class="table-2 table table-borderless table-hover mar-20" id="font">
                        <thead>
                           <tr class="tengah">
                              <th>No</th>
                              <th>Nama</th>
                              <th>L/K</th>
                              <th>Tempat Lahir</th>
                              <th>Tanggal Lahir</th>
                              <th>Pendidik Terakhir</th>
                              <th>PNS/P3K/Kontrak/Honorer</th>
                              <th>Tanggal Mulai Tugas</th>
                              <th>Jabatan/Tugas</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $no = 1;
                           $x = mysqli_query($conn, "SELECT * FROM admin_tenaga_pendidik WHERE id_laporan='$_GET[id]'");
                           if (mysqli_num_rows($x) > 0) {
                              while ($p = mysqli_fetch_array($x)) {
                           ?>
                                 <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $p['nama_pendidik']; ?></td>
                                    <td><?php echo $p['jenis_kelamin']; ?></td>
                                    <td><?php echo $p['tempat_lahir']; ?></td>
                                    <td><?php echo $p['tanggal_lahir']; ?></td>
                                    <td><?php echo $p['pendidikan_terakhir']; ?></td>
                                    <td><?php echo $p['status']; ?></td>
                                    <td><?php echo $p['tanggal_mulai_tugas']; ?></td>
                                    <td><?php echo $p['jabatan']; ?></td>
                                 </tr>
                           <?php }
                           } ?>
                        </tbody>
                     </table>
                     <br>
                     <!-- peserta didik -->
                     <h6>3. PESERTA DIDIK</h6>
                     <h6 class="mar-20">A. Keadaan</h6>
                     <table class="table-3 mar-40 tengah" id="font">
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
                        <tbody>
                           <?php
                           $x = mysqli_query($conn, "SELECT * FROM admin_peserta_didik WHERE id_laporan='$_GET[id]'");
                           if (mysqli_num_rows($x) > 0) {
                              while ($p = mysqli_fetch_array($x)) {
                           ?>
                                 <?php
                                 $J12 = $p['L12'] + $p['P12'];
                                 $J3 = $p['L3'] + $p['P3'];
                                 $J4 = $p['L4'] + $p['P4'];
                                 $J56 = $p['L56'] + $p['P56'];
                                 $total_L = $p['L12'] + $p['L3'] + $p['L4'] + $p['L56'];
                                 $total_P = $p['P12'] + $p['P3'] + $p['P4'] + $p['P56'];
                                 $J_total = $J12 + $J3 + $J4 + $J56;
                                 ?>
                                 <tr>
                                    <td><?php echo $p['L12']; ?></td>
                                    <td><?php echo $p['P12']; ?></td>
                                    <td><?php echo $J12; ?></td>
                                    <td><?php echo $p['L3']; ?></td>
                                    <td><?php echo $p['P3']; ?></td>
                                    <td><?php echo $J3; ?></td>
                                    <td><?php echo $p['L4']; ?></td>
                                    <td><?php echo $p['P4']; ?></td>
                                    <td><?php echo $J4; ?></td>
                                    <td><?php echo $p['L56']; ?></td>
                                    <td><?php echo $p['P56']; ?></td>
                                    <td><?php echo $J56; ?></td>
                                    <td><?php echo $total_L; ?></td>
                                    <td><?php echo $total_P; ?></td>
                                    <td><?php echo $J_total; ?></td>
                                 </tr>
                           <?php }
                           } ?>
                        </tbody>
                     </table>
                     <br>
                     <h6 class="mar-20">B. Mutasi</h6>
                     <table class="table-3 mar-40 tengah" id="font">
                        <thead>
                           <tr>
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
                        <tbody>
                           <?php
                           $x = mysqli_query($conn, "SELECT * FROM admin_peserta_didik WHERE id_laporan='$_GET[id]'");
                           if (mysqli_num_rows($x) > 0) {
                              while ($p = mysqli_fetch_array($x)) {
                           ?>
                                 <?php
                                 $J12 = $p['L12'] + $p['P12'];
                                 $J3 = $p['L3'] + $p['P3'];
                                 $J4 = $p['L4'] + $p['P4'];
                                 $J56 = $p['L56'] + $p['P56'];
                                 $total_L = $p['L12'] + $p['L3'] + $p['L4'] + $p['L56'];
                                 $total_P = $p['P12'] + $p['P3'] + $p['P4'] + $p['P56'];
                                 $J_total = $J12 + $J3 + $J4 + $J56;
                                 ?>
                                 <tr>
                                    <td><?php echo $p['L12']; ?></td>
                                    <td><?php echo $p['P12']; ?></td>
                                    <td><?php echo $J12; ?></td>
                                    <td><?php echo $p['L3']; ?></td>
                                    <td><?php echo $p['P3']; ?></td>
                                    <td><?php echo $J3; ?></td>
                                    <td><?php echo $p['L4']; ?></td>
                                    <td><?php echo $p['P4']; ?></td>
                                    <td><?php echo $J4; ?></td>
                                    <td><?php echo $p['L56']; ?></td>
                                    <td><?php echo $p['P56']; ?></td>
                                    <td><?php echo $J56; ?></td>
                                    <td><?php echo $total_L; ?></td>
                                    <td><?php echo $total_P; ?></td>
                                    <td><?php echo $J_total; ?></td>
                                 </tr>
                           <?php }
                           } ?>
                        </tbody>
                     </table>
                     <br>

                     <h6>4. SARANA DAN PRASARANA</h6>
                     <table class="table-2 table table-borderless table-hover mar-20" id="font">
                        <thead>
                           <tr class="tengah">
                              <th>No</th>
                              <th>Jenis</th>
                              <th>Jumlah</th>
                              <th>Status Kepemilikan</th>
                              <th>Kondisi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $no = 1;
                           $x = mysqli_query($conn, "SELECT * FROM admin_sarana_dan_prasarana WHERE id_laporan='$_GET[id]'");
                           if (mysqli_num_rows($x) > 0) {
                              while ($p = mysqli_fetch_array($x)) {
                           ?>
                                 <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $p['jenis']; ?></td>
                                    <td><?php echo $p['jumlah']; ?></td>
                                    <td><?php echo $p['status_kepemilikan']; ?></td>
                                    <td><?php echo $p['kondisi']; ?></td>
                                 </tr>
                           <?php }
                           } ?>
                        </tbody>
                     </table>
                     <br>
                     <!-- Kegiatan bulan ini -->
                     <h6>5. KEGIATAN BULAN INI</h6>
                     <h6 class="mar-20">A. Kegiatan Pembelajaran</h6>
                     <table class="table-3 mar-40" id="font">
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
                        <tbody>
                           <?php
                           $no = 1;
                           $x = mysqli_query($conn, "SELECT * FROM kegiatan_pembelajaran WHERE id_laporan='$_GET[id]'");
                           if (mysqli_num_rows($x) > 0) {
                              while ($p = mysqli_fetch_array($x)) {
                           ?>
                                 <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $p['bentuk_kbm'] ?></td>
                                    <td><?php echo $p['jumlah_hari_kbm'] ?></td>
                                    <td><?php echo $p['jumlah_hari_kerja'] ?></td>
                                    <td><?php echo $p['kehadiran_peserta'] ?></td>
                                    <td><?php echo $p['kehadiran_pegawai'] ?></td>
                                 </tr>
                           <?php }
                           } ?>
                        </tbody>
                     </table>
                     <br>
                     <div class="kontainer">
                        <?php
                        $x = mysqli_query($conn, "SELECT * FROM kegitan_pembelajaran_foto WHERE id_laporan='$_GET[id]'");
                        if (mysqli_num_rows($x) > 0) {
                           while ($p = mysqli_fetch_array($x)) {
                        ?>
                              <table class="image-kontainer mar-40">
                                 <tbody>
                                    <tr>
                                       <td class="image"><img src="foto/<?php echo $p['foto_1'] ?>" alt="not found"></td>
                                       <td class="image"><img src="https://drive.google.com/drive/folders/1_Kx4Hk2nSm1e6HjiUt0fAdRwq1AySmPk?usp=sharing/<?php echo $p['foto_1'] ?>" alt="not found"></td>
                                    </tr>
                                 </tbody>
                              </table>
                              <div class="popup-image">
                                 <span>&times;</span>
                                 <img src="../foto/<?php echo $p['foto_1'] ?>">
                              </div>
                        <?php }
                        } ?>
                     </div>
                     <br>
                     <h6 class="mar-20">A. Kegiatan Lainnya</h6>
                     <table class="table-3 mar-40" id="font">
                        <tbody>
                           <?php
                           $no = 1;
                           $x = mysqli_query($conn, "SELECT * FROM kegiatan_lainnya WHERE id_laporan='$_GET[id]'");
                           if (mysqli_num_rows($x) > 0) {
                              while ($p = mysqli_fetch_array($x)) {
                           ?>
                                 <div class="mar-40">
                                    <?php echo $p['nama_kegiatan'] ?>
                                 </div>
                           <?php }
                           } ?>
                        </tbody>
                     </table>
                     <br>
                     <div class="kontainer">
                        <?php
                        $x = mysqli_query($conn, "SELECT * FROM kegiatan_lainnya WHERE id_laporan='$_GET[id]'");
                        if (mysqli_num_rows($x) > 0) {
                           while ($p = mysqli_fetch_array($x)) {
                        ?>
                              <table class="image-kontainer mar-40">
                                 <tbody>
                                    <tr>
                                       <td class="image"><img src="foto/<?php echo $p['foto_1'] ?>" alt="not found"></td>
                                    </tr>
                                 </tbody>
                              </table>
                              <div class="popup-image">
                                 <span>&times;</span>
                              </div>
                     </div>
               <?php }
                        } ?>
                  </div>
               </div>
               <br>
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
   <script>
      document.querySelectorAll('.image-kontainer img').forEach(image => {
         image.onclick = () => {
            document.querySelector('.popup-image').style.display = 'block';
            document.querySelector('.popup-image img').src = image.getAttribute('src');
         }
      });
      document.querySelector('.popup-image').onclick = () => {
         document.querySelector('.popup-image').style.display = 'none';
      }
   </script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
   <script src="js/scripts.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
   <script src="assets/demo/chart-area-demo.js"></script>
   <script src="assets/demo/chart-bar-demo.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
   <script src="js/datatables-simple-demo.js"></script>
</body>

</html>