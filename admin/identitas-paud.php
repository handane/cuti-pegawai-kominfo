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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
   <link href="../css/styles.css" rel="stylesheet" />
   <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
   <style>
      .klik-tabel {
         padding: 0;
      }

      .bgc {
         background-color: #FBFBFB;
      }

      .kode {
         padding: 3px 5px;
         background-color: #eef;
         border: 1px solid grey;
         border-radius: 3px;
      }

      .card {
         box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;
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
      <div id="layoutSidenav_content" class="bgc">
         <main>
            <div class="container-fluid px-3 row">
               <h5 class="mt-2 mb-2">Identitas Satuan PAUD</h4>

                  <div class="col-md-6">
                     <div class="card">
                        <div class=" card-body">
                           <table id="datatablesSimple">
                              <thead style="background-color:lightgray;">
                                 <tr style="font-size: 16px;">
                                    <th class="col-md-1">no</th>
                                    <th>Nama Paud</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 $no = 1;
                                 $admin = $_SESSION['admin']['id_admin'];
                                 $x = mysqli_query($conn, "SELECT * FROM user");
                                 if (mysqli_num_rows($x) > 0) {
                                    while ($p = mysqli_fetch_array($x)) {
                                 ?>
                                       <tr style="font-size: 16px;" id="klik-tabel">
                                          <td><?php echo $no++ ?></td>
                                          <td>
                                             <a href="detail-paud.php?id=<?php echo $p['id_author']; ?>" style="text-decoration:none; color:darkblue;">

                                                <div class="klik-tabel"><?php echo $p['nama_paud']; ?></div>
                                             </a>
                                          </td>
                                       </tr>

                                 <?php }
                                 } ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="card">
                        <div class="card-body row">
                           <?php
                           $x = mysqli_query($conn, "SELECT * FROM koderegistrasi");
                           if (mysqli_num_rows($x) > 0) {
                              while ($kode = mysqli_fetch_array($x)) {
                           ?>
                                 <ol class="breadcrumb mb-0 px-3">
                                    <li class="breadcrumb-item active">
                                       <b>Kode Pendaftaran: </b> <input readonly type="text" class="kode" name="nama_paud" value="<?php echo $kode['koderegistrasi'] ?>" />
                                       <button type="button" class="btn btn-sm btn-success" style="margin-bottom: 5px;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><img src="../icons/pencil-square.svg" style="margin-bottom: 4px;"></button>

                                       <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                   <h5 class="modal-title" id="exampleModalLabel">Masukkan Kode Pendaftaran Baru</h5>
                                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="POST">
                                                   <div class="modal-body">
                                                      <div class="mb-3">
                                                         <label for="recipient-name" class="col-form-label">maksimal 12 angka atau huruf <i>(contoh: 123ABC)</i>:</label>
                                                         <input type="text" class="form-control" id="recipient-name" name="koderegistrasi">
                                                      </div>
                                                   </div>
                                                   <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                      <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                                                   </div>
                                                </form>
                                                <?php
                                                // include_once("db.php");
                                                if (isset($_POST["simpan"])) {
                                                   $koderegistrasi = $_POST['koderegistrasi'];

                                                   $update = mysqli_query($conn, "UPDATE koderegistrasi SET
                          koderegistrasi = '$koderegistrasi'");
                                                   if ($update) {
                                                      echo '<script>window.location="identitas-paud.php"</script>';
                                                   } else {
                                                      echo 'gagal ' . mysqli_error($conn);
                                                   }
                                                }
                                                ?>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                 </ol>
                           <?php
                              }
                           }
                           ?>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6 mt-3">
                           <div class="card">
                              <div class="card-content">
                                 <div class="card-body">
                                    <div class="media d-flex">
                                       <div class="media-body text-left">
                                          <?php
                                          // PAUD
                                          $ambil_paud = mysqli_query($conn, "SELECT * FROM user WHERE nama_paud LIKE 'paud%'");
                                          $paud = mysqli_num_rows($ambil_paud);
                                          ?>
                                          <h3 class="primary"><?php echo $paud; ?></h3>
                                          <h6>PAUD</h6>
                                       </div>
                                       <div class="align-self-center">
                                          <i class="icon-book-open primary font-large-2 float-right"></i>
                                       </div>
                                    </div>
                                    <div class="progress mt-1 mb-0" style="height: 7px;">
                                       <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 mt-3">
                           <div class="card">
                              <div class="card-content">
                                 <div class="card-body">
                                    <div class="media d-flex">
                                       <div class="media-body text-left">
                                          <?php
                                          // PAUD
                                          $ambil_KB = mysqli_query($conn, "SELECT * FROM user WHERE nama_paud LIKE 'KB%'");
                                          $KB = mysqli_num_rows($ambil_KB);
                                          ?>
                                          <h3 class="primary"><?php echo $KB; ?></h3>
                                          <h6>Kelompok Bermain</h6>
                                       </div>
                                       <div class="align-self-center">
                                          <i class="icon-book-open primary font-large-2 float-right"></i>
                                       </div>
                                    </div>
                                    <div class="progress mt-1 mb-0" style="height: 7px;">
                                       <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 mt-3">
                           <div class="card">
                              <div class="card-content">
                                 <div class="card-body">
                                    <div class="media d-flex">
                                       <div class="media-body text-left">
                                          <?php
                                          // PAUD
                                          $ambil_tk = mysqli_query($conn, "SELECT * FROM user WHERE nama_paud LIKE 'tk%'");
                                          $tk = mysqli_num_rows($ambil_tk);
                                          ?>
                                          <h3 class="primary"><?php echo $tk; ?></h3>
                                          <h6>TK</h6>
                                       </div>
                                       <div class="align-self-center">
                                          <i class="icon-book-open primary font-large-2 float-right"></i>
                                       </div>
                                    </div>
                                    <div class="progress mt-1 mb-0" style="height: 7px;">
                                       <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 mt-3">
                           <div class="card">
                              <div class="card-content">
                                 <div class="card-body">
                                    <div class="media d-flex">
                                       <div class="media-body text-left">
                                          <?php
                                          // PAUD
                                          $ambil_total = mysqli_query($conn, "SELECT * FROM user");
                                          $total = mysqli_num_rows($ambil_total);
                                          ?>
                                          <h3 class="primary"><?php echo $total; ?></h3>
                                          <h6>Total</h6>
                                       </div>
                                       <div class="align-self-center">
                                          <i class="icon-book-open primary font-large-2 float-right"></i>
                                       </div>
                                    </div>
                                    <div class="progress mt-1 mb-0" style="height: 7px;">
                                       <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
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
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
   <script src="../js/scripts.js"></script>
   <script src="../assets/demo/chart-area-demo.js"></script>
   <script src="../assets/demo/chart-bar-demo.js"></script>
   <script src="../datatables/datatable.js"></script>
   <script src="../js/datatables-simple-demo.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>


</body>

</html>