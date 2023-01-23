<?php
// error_reporting(0);
session_start();
include('db.php');
if (!isset($_SESSION["user"])) {
   echo "<script>location='index.php'</script>";
}

$paud = mysqli_query($conn, "SELECT * FROM user WHERE id_author = '" . $_GET['id'] . "' ");
if (mysqli_num_rows($paud) == 0) {
   echo '<script>window.location = "paud.php"</script>';
}
$p = mysqli_fetch_object($paud);
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
      .bx-shadow {
         box-sizing: border-box;
         box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
      }

      #grey {
         color: #444444;
      }

      .alert-atas {
         position: absolute;
         top: 0px;
         right: 20px;
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
                  <div class="sb-sidenav-menu-heading">main</div>
                  <a class="nav-link" href="dashboard.php">
                     <div class="sb-nav-link-icon">
                        <i class="fas fa-home"></i>
                     </div>
                     Home
                  </a>
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
                  <a class="nav-link aktif" href="paud.php">
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
      <div id="layoutSidenav_content">
         <main>
            <div class="container-fluid px-3">
               <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="paud.php">PAUD</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
                  </ol>
               </nav>
               <div class="card">
                  <div class="card-header">
                     <h5>Masukkan Data</h5>
                  </div>
                  <div class="card-body">
                     <form class="row g-3" method="POST" enctype="multipart/form-data">
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>Nama</b></label>
                           <input type="text" class="form-control" name="nama_paud" value="<?php echo $p->nama_paud ?>" />
                        </div>
                        <div class="col-md-6">
                           <input type="hidden" class="form-control" name="npsn" value="<?php echo $p->npsn ?>" required />
                           <label for="" class="form-label-md" id="grey"><b>No. Perijinan</b></label>
                           <input type="text" class="form-control" name="no_perijinan" value="<?php echo $p->no_perijinan ?>" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>Dikeluarkan Tanggal</b></label>
                           <input type="text" class="form-control" name="dikeluarkan_tanggal" value="<?php echo $p->dikeluarkan_tanggal ?>" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>Alamat</b></label>
                           <input type="text" class="form-control" name="alamat" value="<?php echo $p->alamat ?>" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>Email/Website</b></label>
                           <input type="text" class="form-control" name="email" value="<?php echo $p->email ?>" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>Akreditasi</b></label>
                           <input type="text" class="form-control" name="akreditasi" value="<?php echo $p->akreditasi ?>" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>No. SK. Akreditasi</b></label>
                           <input type="text" class="form-control" name="no_sk_akreditasi" value="<?php echo $p->no_sk_akreditasi ?>" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>Nama Bank</b></label>
                           <input type="text" class="form-control" name="nama_bank" value="<?php echo $p->nama_bank ?>" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>No Rekening</b></label>
                           <input type="text" class="form-control" name="no_rekening" value="<?php echo $p->no_rekening ?>" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>Atas Nama</b></label>
                           <input type="text" class="form-control" name="atas_nama" value="<?php echo $p->atas_nama ?>" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>Nama kepsek/pengelola</b></label>
                           <input type="text" class="form-control" name="pengelola" value="<?php echo $p->pengelola ?>" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>No.HP</b></label>
                           <input type="text" class="form-control" name="no_hp" value="<?php echo $p->no_hp ?>" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md" id="grey"><b>Password</b></label>
                           <input type="password" class="form-control" name="password" value="<?php echo $p->password ?>" required />


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
                        $password = $_POST['password'];

                        $update = mysqli_query($conn, "UPDATE user SET
                          nama_paud = '$nama_paud', 
                          npsn = '$npsn',
                          no_perijinan = '$no_perijinan',
                          dikeluarkan_tanggal = '$dikeluarkan_tanggal',
                          alamat = '$alamat',
                          email = '$email',
                          akreditasi = '$akreditasi',
                          no_sk_akreditasi = '$no_sk_akreditasi',
                          nama_bank = '$nama_bank',
                          no_rekening = '$no_rekening',
                          atas_nama = '$atas_nama',
                          pengelola = '$pengelola',
                          no_hp = '$no_hp',
                          password = '$password'
                        WHERE id_author = '" .
                           $p->id_author . "'");
                        if ($update) {
                           echo '<script>window.location="paud.php"</script>';
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
   <script src="datatables/datatable.js"></script>
   <script src="js/datatables-simple-demo.js"></script>
</body>

</html>