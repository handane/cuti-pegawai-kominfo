<?php
session_start();
include("../db.php");
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
      #ftz16 {
         font-size: 16px;
      }
   </style>
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
                  <a class="nav-link" href="identitas-paud.php">
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
               <ol class="breadcrumb mb-4 mt-2">
                  <li class="breadcrumb-item active">Identitas admin</li>
               </ol>
               <div class="card mb-4">
                  <div class="col-md-6 card-body">
                     <h6>Selamat Datang, <?php echo $_SESSION['admin']['nama_admin']; ?></h6>
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
   <script src="../js/scripts.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
   <script src="../assets/demo/chart-area-demo.js"></script>
   <script src="../assets/demo/chart-bar-demo.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
   <script src="../js/datatables-simple-demo.js"></script>
</body>

</html>