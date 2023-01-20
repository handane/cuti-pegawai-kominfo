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
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SIDINI</title>
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

      .card {
         box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
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
      <div class="navbar-nav ps-3 d-md-inline-block form-inline ms-auto" href="index.html" style="color: white; text-decoration: none">
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
                  <a class="nav-link" href="identitas-paud.php">
                     <div class="sb-nav-link-icon">
                        <i class="fas fa-address-book"></i>
                     </div>
                     PAUD
                  </a>

                  <a class="nav-link aktif" href="laporan.php">
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
            <div class="container-fluid px-3">
               <h4 class="mt-4">Identitas Satuan PAUD</h4>
               <ol class="breadcrumb mb-4">
                  <li class="breadcrumb-item active">Identitas PAUD</li>
               </ol>

               <div class="card">
                  <form action="" method="POST">
                     <div class="card-body row">
                        <div class="col-md-6">
                           <select class="form-select form-select-md" aria-label=".form-select-sm example" name="bulan">
                              <option value=""><span>Bulan</span></option>
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
                        <div class="col-md-5">
                           <input type="text" name="tahun" class="form-control" placeholder="Tahun">
                        </div>
                        <div class="col-md-1">
                           <button type="submit" class="form-control btn btn-light" name="submit" style="border: 1px solid #DDDDDD;"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                 <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                              </svg></button>
                        </div>
                     </div>
                  </form>

                  <div class="card-body">
                     <table id="datatablesSimple">
                        <thead style="background-color:lightgray;">
                           <tr style="font-size: 16px;">
                              <th class="col-md-1">no</th>
                              <th>Nama Paud</th>
                              <th>Waktu Pengiriman</th>
                              <th>Bulan</th>
                              <th>Tahun</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $no = 1;
                           if (isset($_POST['submit'])) {
                              $tahun = $_POST['tahun'];
                              $bulan = $_POST['bulan'];
                              $laporan = mysqli_query($conn, "SELECT * FROM admin_peserta_didik LEFT JOIN user USING (id_author) WHERE bulan LIKE '%" . $bulan . "%' AND tahun LIKE '%" . $tahun . "%' ORDER BY tanggal_kirim DESC");
                           } else {
                              $laporan = mysqli_query($conn, "SELECT * FROM admin_peserta_didik LEFT JOIN user USING (id_author) ORDER BY tanggal_kirim DESC");
                           }
                           // $dan = html_entity_decode();
                           if (mysqli_num_rows($laporan) > 0) {
                              while ($p = mysqli_fetch_array($laporan)) {
                           ?>
                                 <tr style="font-size: 16px;" id="klik-tabel">
                                    <td><?php echo $no++ ?></td>
                                    <td>
                                       <a href="laporan-paud.php?id=<?php echo $p['id_laporan']; ?>&identitas=<?php echo $p['id_author']; ?>" style="text-decoration:none; color:darkblue;">
                                          <div class="klik-tabel"><?php echo $p['nama_paud']; ?></div>
                                       </a>
                                    </td>
                                    <td><?php echo $p['tanggal_kirim']; ?></td>
                                    <td><?php echo $p['bulan']; ?></td>
                                    <td><?php echo $p['tahun']; ?></td>
                                 </tr>
                           <?php }
                           } ?>
                        </tbody>
                     </table>
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
   <script src="../js/scripts.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
   <script src="../assets/demo/chart-area-demo.js"></script>
   <script src="../assets/demo/chart-bar-demo.js"></script>
   <script src="../js/datatables-simple-demo.js"></script>
   <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> -->
   <script src="../datatables/datatable.js"></script>

</body>

</html>