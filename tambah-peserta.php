<?php
error_reporting(0);
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
      .lebar {
         width: 95%;
      }

      .tengah {
         text-align: center;
      }

      .ftn-pad {
         padding: 3px;
         font-size: 14px;
      }

      .bx-shadow {
         box-sizing: border-box;
         box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
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
                  <a class="nav-link " href="laporan.php">
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

                  <a class="nav-link aktif" href="peserta-didik.php">
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
      <div id="layoutSidenav_content">
         <main>
            <div class="container-fluid px-3">
               <h5 class="mt-4">Peserta Didik</h5>
               <ol class="breadcrumb mb-4">
                  <li class="breadcrumb-item active"><a href="sarana-dan-prasarana" style="text-decoration: none; color:grey;">Peserta Didik</a> > tambah peserta didik</li>
               </ol>

               <!-- keadaan -->
               <div class="card mb-4 bx-shadow">
                  <div class="card-header" style="padding:4px 0 0 15px">
                     <h6>Keadaan</h6>
                  </div>
                  <div class="card-body">
                     <form method="POST" enctype="multipart/form-data">
                        <table class="table table-bordered">
                           <thead>
                              <tr class="tengah ftn-pad">
                                 <th colspan="2">1-2 Tahun</th>
                                 <th colspan="2">3 Tahun</th>
                                 <th colspan="2">4 Tahun</th>
                                 <th colspan="2">5-6 Tahun</th>
                              </tr>
                              <tr class="tengah ftn-pad">
                                 <td>Laki-laki</td>
                                 <td>Perempuan</td>
                                 <td>Laki-laki</td>
                                 <td>Perempuan</td>
                                 <td>Laki-laki</td>
                                 <td>Perempuan</td>
                                 <td>Laki-laki</td>
                                 <td>Perempuan</td>
                              </tr>

                           </thead>
                           <tbody class="ftn-pad">
                              <?php
                              $no = 1;
                              $id_author = $_SESSION['user']['id_author'];
                              ?>
                              <tr>
                                 <td>
                                    <input type="text" class="lebar" name="L12" value="0" />
                                 </td>
                                 <td>
                                    <input type="text" class="lebar" name="P12" value="0" />
                                 </td>
                                 <td>
                                    <input type="text" class="lebar" name="L3" value="0" />
                                 </td>
                                 <td>
                                    <input type="text" class="lebar" name="P3" value="0" />
                                 </td>
                                 <td>
                                    <input type="text" class="lebar" name="L4" value="0" />
                                 </td>
                                 <td>
                                    <input type="text" class="lebar" name="P4" value="0" />
                                 </td>
                                 <td>
                                    <input type="text" class="lebar" name="L56" value="0" />
                                 </td>
                                 <td>
                                    <input type="text" class="lebar" name="P56" value="0" />
                                 </td>
                              </tr>

                           </tbody>
                        </table>

                  </div>
               </div>

               <!-- mutasi -->
               <div class="card mb-4 bx-shadow">
                  <div class="card-header" style="padding:4px 0 0 15px">
                     <h6>Mutasi</h6>
                  </div>
                  <div class="card-body">
                     <form method="POST" enctype="multipart/form-data">
                        <table class="table table-bordered">
                           <thead>
                              <tr class="tengah ftn-pad">
                                 <th>Pindah (masuk)</th>
                                 <th>Pindah (keluar)</th>
                                 <th>Baru</th>
                                 <th>Berhenti</th>
                              </tr>

                           </thead>
                           <tbody class="ftn-pad">
                              <?php
                              $no = 1;
                              $id_author = $_SESSION['user']['id_author'];

                              ?>

                              <tr>
                                 <td>
                                    <input type="text" class="lebar" name="pindah_masuk" value="0" />
                                 </td>
                                 <td>
                                    <input type="text" class="lebar" name="pindah_keluar" value="0" />
                                 </td>
                                 <td>
                                    <input type="text" class="lebar" name="baru" value="0" />
                                 </td>
                                 <td>
                                    <input type="text" class="lebar" name="berhenti" value="0" />
                                    <input type="hidden" class="" name="id_author" value="<?php echo $id_author ?>" />
                                 </td>
                              </tr>
                           </tbody>
                        </table>

                  </div>
               </div>

               <a href="peserta-didik.php" class="bi bi-arrow-return-left btn btn-secondary">Kembali</a>
               <button type="submit" name="save" class="btn btn-primary">
                  Simpan
               </button>
               </form>
               <?php
               if (isset($_POST['save'])) {
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
                  $id_author = $_POST['id_author'];

                  $insert = mysqli_query($conn, "INSERT INTO peserta_didik VALUES(null,
                  '" . $L12 . "',
                  '" . $P12 . "', 
                  '" . $L3 . "', 
                  '" . $P3 . "', 
                  '" . $L4 . "',
                  '" . $P4 . "',  
                  '" . $L56 . "',
                  '" . $P56 . "',
                  '" . $pindah_masuk . "',
                  '" . $pindah_keluar . "',
                  '" . $baru . "',
                  '" . $berhenti . "',
                  '" . $id_author . "')
                  ");


                  if ($insert) {
                     echo '<script>window.location="peserta-didik.php"</script>';
                  } else {
                     echo 'gagal' . mysqli_error($conn);
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
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
   <script src="js/scripts.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
   <script src="assets/demo/chart-area-demo.js"></script>
   <script src="assets/demo/chart-bar-demo.js"></script>
   <script src="datatables/datatable.js"></script>
   <script src="js/datatables-simple-demo.js"></script>
</body>

</html>