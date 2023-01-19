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
   <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
   <link href="css/styles.css" rel="stylesheet" />
   <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
   <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">


      <!-- Navbar Brand-->
      <a class="navbar-brand ps-3" href="index.php"> SIDINI </a>
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
                  <div class="sb-sidenav-menu-heading">Laporan</div>
                  <a class="nav-link" href="laporan.php">
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
                  <a class="nav-link aktif" href="sarana-dan-prasarana.php">
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
               <h4 class="mt-4">Sarana dan Prasarana</h4>
               <ol class="breadcrumb mb-4">
                  <li class="breadcrumb-item active"><a href="sarana-dan-prasarana">sarana dan prasarana</a> > Tambah data</li>
               </ol>


               <div class="card mb-4">
                  <div class="card-header">

                     <div class="col-md-12">

                     </div>
                  </div>
                  <div class="card-body">
                     <form method="POST" enctype="multipart/form-data">
                        <table class="table table-bordered table-sm" id="font">
                           <thead>
                              <tr>
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
                              $id_author = $_SESSION['user']['id_author'];
                              $jum = 16;

                              $sarana = mysqli_query($conn, "SELECT * FROM tabel_sarana");
                              if (mysqli_num_rows($sarana) > 0) {
                                 while ($tampil = mysqli_fetch_array($sarana)) {

                              ?>
                                    <tr>
                                       <td><?php echo $no++ ?></td>
                                       <td>
                                          <?php echo $tampil['jenis'] ?>
                                          <input type="hidden" class="" name="jenis[]" readonly value="<?php echo $tampil['jenis'] ?>" />
                                       </td>
                                       <td>
                                          <input type="text" class="" name="jumlah[]" />
                                       </td>
                                       <td>
                                          <input type="text" class="" name="status_kepemilikan[]" />
                                       </td>
                                       <td>
                                          <input type="text" class="" name="kondisi[]" />
                                          <input type="hidden" class="" name="id_author[]" value="<?php echo $_SESSION['user']['id_author']; ?>" />
                                       </td>


                                    </tr>
                              <?php
                                 }
                              }
                              ?>

                           </tbody>
                        </table>
                        <input type="hidden" name="jum" value="<?php echo $jum ?>">
                        <a href="sarana-dan-prasarana.php" class="bi bi-arrow-return-left btn btn-secondary">Kembali</a>
                        <button type="submit" name="save" class="btn btn-primary">
                           Simpan
                        </button>
                     </form>
                     <?php
                     if (isset($_POST['save'])) {
                        $jenis = $_POST['jenis'];
                        $jumlah = $_POST['jumlah'];
                        $status_kepemilikan = $_POST['status_kepemilikan'];
                        $kondisi = $_POST['kondisi'];
                        $id_author = $_POST['id_author'];

                        for ($i = 0; $i < $jum; $i++) {
                           $add = mysqli_query(
                              $conn,
                              "INSERT INTO sarana_dan_prasarana VALUES(
                           null,
                           '" . $jenis[$i] . "',
                           '" . $jumlah[$i] . "',
                           '" . $status_kepemilikan[$i] . "',
                           '" . $kondisi[$i] . "',
                           '" . $id_author[$i] . "')"
                           );
                        }
                        if ($add) {
                           echo '<script>window.location="sarana-dan-prasarana.php"</script>';
                        } else {
                           echo 'Tidak ada data yang dipilih' . mysqli_error($conn);
                        }
                     }

                     ?>
                  </div>
               </div>
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
   <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
   <script src="js/datatables-simple-demo.js"></script>
</body>

</html>