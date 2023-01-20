<?php
// error_reporting(0);
session_start();
include('../db.php');
if (!isset($_SESSION["admin"])) {
   echo "<script>location='../index.php'</script>";
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
   <link href="../css/styles.css" rel="stylesheet" />
   <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
   <style>
      .bx-shadow {
         box-sizing: border-box;
         box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
      }

      #grey {
         color: #444444;
      }
   </style>
</head>

<body class="sb-nav-fixed">
   <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
      <!-- Navbar Brand-->
      <a class="navbar-brand ps-3" href="index.html"> SIDINI </a>
      <!-- Sidebar Toggle-->
      <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
         <i class="fas fa-bars"></i>
      </button>

      <!-- navbar nama -->
      <div class="navbar-nav ps-3 d-md-inline-block form-inline ms-auto" style="color: white; text-decoration: none">
         <p><?php echo "<p>" . $_SESSION['admin']['nama_admin'] . "</p>" ?></p>
      </div>

      <!-- navbar icon  -->
      <ul class="navbar-nav me-0 me-md-3 my-2 my-md-0">
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
               <li><a class="dropdown-item" href="index.php">Profil</a></li>
               <li>
                  <hr class="dropdown-divider" />
               </li>
               <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
         </li>
      </ul>
   </nav>
   <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
         <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
               <div class="nav">
                  <div class="sb-sidenav-menu-heading">Admin</div>
                  <a class="nav-link" href="index.php">
                     <div class="sb-nav-link-icon">
                        <i class="fas fa-home"></i>
                     </div>
                     Dashboard
                  </a>
                  <a class="nav-link aktif" href="identitas-paud.php">
                     <div class="sb-nav-link-icon">
                        <i class="fas fa-address-book"></i>
                     </div>
                     PAUD
                  </a>

                  <a class="nav-link" href="laporan.php">
                     <div class="sb-nav-link-icon">
                        <i class="fas fa-book-open"></i>
                     </div>
                     Laporan
                  </a>
                  <a class="nav-link" href="tenaga-pendidik.php">
                     <div class="sb-nav-link-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                     </div>
                     Tenaga Pendidik
                  </a>
               </div>
            </div>
            <div class="sb-sidenav-footer">
               <div class="small">masuk sebagai:</div>
               <?php
               echo $_SESSION['admin']['nama_admin'];
               ?>
            </div>
         </nav>
      </div>
      <div id="layoutSidenav_content">
         <main>
            <div class="container-fluid px-3">
               <ol class="breadcrumb mt-2">
                  <li class="breadcrumb-item active">
                     <a style="text-decoration: none; color:gray" href="identitas-paud.php">Identitas PAUD</a> > Ubah Data
                  </li>
               </ol>
               <div class="card">
                  <div class="card-header">
                     <h5>Masukkan Data</h5>
                  </div>
                  <div class="card-body">
                     <form class="row g-3" method="POST" enctype="multipart/form-data">
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>Nama</b></label>
                           <input type="text" class="form-control" name="nama_paud" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>NPSN</b></label>
                           <input type="text" class="form-control" name="npsn" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>No. Perijinan</b></label>
                           <input type="text" class="form-control" name="no_perijinan" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>Dikeluarkan Tanggal</b></label>
                           <input type="text" class="form-control" name="dikeluarkan_tanggal" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>Alamat</b></label>
                           <input type="text" class="form-control" name="alamat" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>Email/Website</b></label>
                           <input type="text" class="form-control" name="email" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>Akreditasi</b></label>
                           <input type="text" class="form-control" name="akreditasi" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>No. SK. Akreditasi</b></label>
                           <input type="text" class="form-control" name="no_sk_akreditasi" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>Nama Bank</b></label>
                           <input type="text" class="form-control" name="nama_bank" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>No Rekening</b></label>
                           <input type="text" class="form-control" name="no_rekening" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>Atas Nama</b></label>
                           <input type="text" class="form-control" name="atas_nama" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>Nama kepsek/pengelola</b></label>
                           <input type="text" class="form-control" name="pengelola" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>No.HP</b></label>
                           <input type="text" class="form-control" name="no_hp" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>Username</b></label>
                           <input type="text" class="form-control" name="username" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>Password</b></label>
                           <input type="text" class="form-control" name="password" />
                        </div>
                        <div class="col-md-12">
                           <button type="submit" name="submit" class="btn btn-primary">
                              Simpan
                           </button>
                        </div>
                     </form>

                     <?php
                     if (isset($_POST['submit'])) {
                        $nama_paud = $_POST['nama_paud'];
                        $npsn = $_POST['npsn'];
                        $no_perijinan = $_POST['no_perijinan'];
                        $dikeluarkan_tanggal = $_POST['dikeluarkan_tanggal'];
                        $alamat = $_POST['alamat'];
                        $email = $_POST['email'];
                        $akreditasi = $_POST['akreditasi'];
                        $no_sk_akreditasi = $_POST['no_sk_akreditasi'];
                        $nama_bank = $_POST['nama_bank'];
                        $no_rekening = $_POST['no_rekening'];
                        $atas_nama = $_POST['atas_nama'];
                        $pengelola = $_POST['pengelola'];
                        $no_hp = $_POST['no_hp'];
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        $add = mysqli_query($conn, "INSERT INTO user VALUES(null,
                          '" . $nama_paud . "', 
                          '" . $npsn . "',
                          '" . $no_perijinan . "',
                          '" . $dikeluarkan_tanggal . "',
                          '" . $alamat . "',
                          '" . $email . "',
                          '" . $akreditasi . "',
                          '" . $no_sk_akreditasi . "',
                          '" . $nama_bank . "',
                          '" . $no_rekening . "',
                          '" . $atas_nama . "',
                          '" . $pengelola . "',
                          '" . $no_hp . "',
                          '" . $username . "',
                          '" . $password . "')");
                        if ($add) {
                           echo '<script>alert("data berhasil di tambahkan")</script>';
                           echo '<script>window.location="identitas-paud.php"</script>';
                        } else {
                           echo 'gagal ' . mysqli_error($conn);
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