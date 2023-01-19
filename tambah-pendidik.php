<?php
// error_reporting(0);
session_start();
include('db.php');
if (!isset($_SESSION["user"])) {
   echo "<script>location='index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="id">

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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" integrity="sha256-VWSAQg9FYh64jM/CRHYL7Wz8doNXiKN4hC7Xl79ZOdg=" crossorigin="anonymous">
   <style>
      .tm {
         position: relative;
         /*width: 150px; height: 20px;*/
         /*color: white;*/

         display: block;
         width: 100%;
         height: 2.4rem;
         padding: .375rem .75rem;
         font-size: 1rem;
         line-height: 1.5;
         color: #495057;
         background-color: #fff;
         background-clip: padding-box;
         border: 1px solid #ced4da;
         border-radius: .25rem;
         box-shadow: inset 0 0 0 transparent;
         transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
         align-content: center;
      }

      .tm:before {
         position: absolute;
         top: 10px;
         left: 3px;
         content: attr(data-date);
         display: block;
         color: #495057;
      }

      .tm::-webkit-datetime-edit,
      .tm::-webkit-inner-spin-button,
      .tm::-webkit-clear-button {
         display: none;
      }

      .tm::-webkit-calendar-picker-indicator {
         position: absolute;
         top: 10px;
         right: 0;
         color: #495057;
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

                  <a class="nav-link aktif" href="tenaga-pendidik.php">
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
               <ol class="breadcrumb mt-2">
                  <li class="breadcrumb-item active">
                     <a href="tenaga-pendidik.php">Tenaga Pendidik</a> > Tambah Data Pendidik
                  </li>
               </ol>
               <div class="card">
                  <div class="card-header">
                     <h5>Masukkan Data Pendidik</h5>
                  </div>
                  <div class="card-body">
                     <form class="row g-3" method="POST" enctype="multipart/form-data">
                        <div class="col-md-6">
                           <label for="" class="form-label-md"><b>Nama</b></label>
                           <input type="text" class="form-control" name="nama_pendidik" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md"><b>Tempat Lahir</b></label>
                           <input type="text" class="form-control" name="tempat_lahir" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md"><b>Jenis Kelamin</b></label>
                           <select class="form-select form-select-md" aria-label=".form-select-sm example" name="jenis_kelamin">
                              <option>--</option>
                              <option value="L">Laki-laki</option>
                              <option value="P">Perempuan</option>
                           </select>
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md"><b>Tanggal Lahir</b> </label>
                           <input class="form-control" type="text" name="tanggal_lahir" id="date-start" required>

                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md"><b>Pendidikan Terakhir</b></label>
                           <input type="text" class="form-control" name="pendidikan_terakhir" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md"><b>Status Pendidik</b></label>
                           <select class="form-select form-select-md" aria-label=".form-select-sm example" name="status">
                              <option value="PNS">PNS</option>
                              <option value="PPPK">PPPK</option>
                              <option value="Honorer">Honorer</option>
                              <option value="Tenaga Kontrak">Tenaga Kontrak</option>
                           </select>
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md"><b>Jabatan/Tugas</b></label>
                           <input type="text" class="form-control" name="jabatan" />
                        </div>
                        <div class="col-md-6">
                           <label for="" class="form-label-md"><b>Tanggal Mulai Tugas</b></label>
                           <input class="form-control" type="text" name="tanggal_mulai_tugas" id="date-end">
                        </div>
                        <div class="col-md-6">
                           <input type="hidden" class="form-control" name="id_author" value="<?php echo $_SESSION['user']['id_author']; ?>" />
                        </div>
                        <div class="col-12">
                           <button type="submit" name="submit" class="btn btn-primary">
                              Simpan
                           </button>
                        </div>
                     </form>

                     <?php
                     if (isset($_POST['submit'])) {
                        $nama_pendidik = $_POST['nama_pendidik'];
                        $jenis_kelamin = $_POST['jenis_kelamin'];
                        $tempat_lahir = $_POST['tempat_lahir'];
                        $tanggal_lahir = $_POST['tanggal_lahir'];
                        $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
                        $status = $_POST['status'];
                        $tanggal_mulai_tugas = $_POST['tanggal_mulai_tugas'];
                        $jabatan = $_POST['jabatan'];
                        $id_author = $_POST['id_author'];

                        $insert = mysqli_query(
                           $conn,
                           "INSERT INTO tenaga_pendidik VALUES(
                           null,
                           '" . $nama_pendidik . "',
                           '" . $jenis_kelamin . "',
                           '" . $tempat_lahir . "', 
                           '" . $tanggal_lahir . "',
                           '" . $pendidikan_terakhir . "',
                           '" . $status . "',
                           '" . $tanggal_mulai_tugas . "',
                           '" . $jabatan . "',
                           '" . $id_author . "')"
                        );
                        if ($insert) {
                     ?>
                           <div class="alert alert-success alert-dismissible alert-atas"><img src="icons/check2-square.svg" alt=""> Data berhasil ditambahkan
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                           </div>
                     <?php
                           echo '<script>window.location="tenaga-pendidik.php"</script>';
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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js" integrity="sha256-8nZlwiYjMLBTg03gFKmhxYl0GVyuUyELAPGQJiWD0jQ=" crossorigin="anonymous"></script>
   <script type="text/javascript">
      $(document).ready(function() {
         $('#date-start').datepicker({
            format: "dd-mm-yyyy",
            autoclose: true
         })
      })

      $(document).ready(function() {
         $('#date-end').datepicker({
            format: "dd-mm-yyyy",
            autoclose: true
         })
      })
   </script>
</body>

</html>