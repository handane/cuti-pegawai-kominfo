<?php
session_start();
include("../database/db.php");
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
   <title>CUTI | KADIS</title>
   <link rel="icon" type="image/png" href="../foto/tut wuri.png">
   <link href="../css/styles.css" rel="stylesheet" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
   <style>
      #ftz16 {
         font-size: 16px;
      }

      body {
         background-color: #f1f1f1;
      }

      .bg-greenyellow {
         background-color: #63dd60;
      }

      .badges {
         padding: 2px 10px 0 10px;
         font-weight: bold;
      }

      .pesan {
         font-size: 7pt;
         border-radius: 10px;
         background-color: #3ba539;
         color: white;
         margin-left: 0;
         width: 50px;
      }

      .isi-pesan p {
         margin: 0;
      }

      .bungkus-atas {
         display: flex;
         justify-content: space-between;
      }

      .tooltips button {
         padding: 0 0 0 0;
         margin: 0;
      }
   </style>
</head>

<body class="sb-nav-fixed">
   <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
      <a class="navbar-brand ps-3" href="index.php"> CUTI | ADMIN</a>
      <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
         <i class="fas fa-bars"></i>
      </button>
      <!-- navbar nama -->
      <div class="navbar-nav ps-3 d-md-inline-block form-inline ms-auto" style="color: white; text-decoration: none">
         <p><?php echo "<p>" . $_SESSION['admin']['nama'] . "</p>" ?></p>
      </div>
      <!-- navbar icon  -->
      <ul class="navbar-nav me-0 me-md-3 my-2 my-md-0">
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
               <li><a class="dropdown-item" href="setting.php">Profil</a></li>
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
                  <div class="sb-sidenav-menu-heading">Admin</div>
                  <a class="nav-link aktif" href="index.php">
                     <div class="sb-nav-link-icon">
                        <i class="fas fa-home"></i>
                     </div>
                     Dashboard
                  </a>
                  <a class="nav-link" href="pegawai.php">
                     <div class="sb-nav-link-icon">
                        <i class="fas fa-address-book"></i>
                     </div>
                     Pegawai
                  </a>
                  <a class="nav-link" href="cuti.php">
                     <div class="sb-nav-link-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                     </div>
                     Cuti
                  </a>
                  <a class="nav-link" href="cetak-laporan-bar.php">
                     <div class="sb-nav-link-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                     </div>
                     Cetak Laporan
                  </a>
                  <a class="nav-link" href="setting.php">
                     <div class="sb-nav-link-icon">
                        <i class="fas fa-gear"></i>
                     </div>
                     Setting
                  </a>
               </div>
            </div>
            <div class="sb-sidenav-footer">
               <div class="small">masuk sebagai:</div>
               <h6>Admin</h6>
            </div>
         </nav>
      </div>
      <div id="layoutSidenav_content">
         <main>
            <div class="container-fluid px-3">
               <ol class="breadcrumb mb-4 mt-2">
                  <li class="breadcrumb-item active">Beranda</li>
               </ol>
               <div class="">
                  <section id="minimal-statistics">
                     <?php
                     $ambil_cuti1 = mysqli_query($conn, "SELECT * FROM pengajuan");
                     $cuti1 = mysqli_num_rows($ambil_cuti1);
                     $ambil_cuti2 = mysqli_query($conn, "SELECT * FROM pengajuan WHERE status_cuti = 'menunggu persetujuan'");
                     $cuti2 = mysqli_num_rows($ambil_cuti2);
                     $ambil_cuti3 = mysqli_query($conn, "SELECT * FROM pengajuan WHERE status_cuti = 'disetujui'");
                     $cuti3 = mysqli_num_rows($ambil_cuti3);
                     $ambil_cuti4 = mysqli_query($conn, "SELECT * FROM pengajuan WHERE status_cuti = 'ditolak'");
                     $cuti4 = mysqli_num_rows($ambil_cuti4);
                     $ambil_pegawai = mysqli_query($conn, "SELECT * FROM pegawai");
                     $pegawai = mysqli_num_rows($ambil_pegawai);
                     $ambil_admin = mysqli_query($conn, "SELECT * FROM admin");
                     $admin = mysqli_num_rows($ambil_admin);
                     ?>
                     <div class="row bg-light pt-2 pb-1">
                        <div class="col-md-3">
                           <div class="card bg-primary text-white mb-1">
                              <div class="card-body">
                                 <h4><?php echo $cuti1; ?></h4>
                              </div>
                              <div class="card-footer d-flex align-items-center justify-content-between">
                                 <h6>Data Cuti</h6>
                                 <div class="small text-white"><i class="fas fa-chalkboard-teacher"></i></div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="card bg-warning text-white mb-1">
                              <div class="card-body">
                                 <h4><?php echo $cuti2; ?></h4>
                              </div>
                              <div class="card-footer d-flex align-items-center justify-content-between">
                                 <h6>Cuti Menunggu Konfirmasi</h6>
                                 <div class="small text-white"><i class="fas fa-chalkboard-teacher"></i></div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="card bg-success text-white mb-1">
                              <div class="card-body">
                                 <h4><?php echo $cuti3; ?></h4>
                              </div>
                              <div class="card-footer d-flex align-items-center justify-content-between">
                                 <h6>Cuti Diterima</h6>
                                 <div class="small text-white"><i class="fas fa-chalkboard-teacher"></i></div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="card bg-danger text-white mb-1">
                              <div class="card-body">
                                 <h4><?php echo $cuti4; ?></h4>
                              </div>
                              <div class="card-footer d-flex align-items-center justify-content-between">
                                 <h6>Cuti ditolak</h6>
                                 <div class="small text-white"><i class=""></i></div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="card bg-secondary text-white mb-1">
                              <div class="card-body">
                                 <h4><?php echo $pegawai; ?></h4>
                              </div>
                              <div class="card-footer d-flex align-items-center justify-content-between">
                                 <h6>Pegawai</h6>
                                 <div class="small text-white"><i class="fas fa-chalkboard-teacher"></i></div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="card bg-info text-white mb-1">
                              <div class="card-body">
                                 <h4><?php echo $admin; ?></h4>
                              </div>
                              <div class="card-footer d-flex align-items-center justify-content-between">
                                 <h6>Admin</h6>
                                 <div class="small text-white"><i class="fas fa-chalkboard-teacher"></i></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
         </main>
         <footer class="mt-5">
         </footer>
      </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@latest/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
   <script src="../js/scripts.js"></script>
   <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
   <script>
      ClassicEditor
         .create(document.querySelector('#editor'))
         .catch(error => {
            console.error(error);
         });
   </script>
   <script>
      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
      const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
   </script>

</body>

</html>