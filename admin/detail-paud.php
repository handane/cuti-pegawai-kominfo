<?php
include("../db.php");
session_start();
if (!isset($_SESSION["admin"])) {
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
   <link href="../css/styles.css" rel="stylesheet" />
   <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
   <style>
      #ftz16 {
         font-size: 16px;
      }

      .card {
         box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
      }

      .bgc {
         background-color: #FBFBFB;
      }
   </style>
</head>

<body class="sb-nav-fixed">
   <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">


      <!-- Navbar Brand-->
      <a class="navbar-brand ps-3" href="admin.php"> SIDINI </a>
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
            <?php
            $id_ambil = $_GET['id'];
            $x = mysqli_query($conn, "SELECT * FROM user WHERE id_author='$id_ambil'");
            if (mysqli_num_rows($x) > 0) {
               while ($p = mysqli_fetch_array($x)) {
            ?>
                  <div class="container-fluid row">
                     <ol class="breadcrumb mb-2 mt-2">
                        <li class="breadcrumb-item active" style="width:100%;"><a href="identitas-paud.php" style="color: grey; text-decoration:none; ">Identitas PAUD</a> > <?php echo $p['nama_paud']; ?>
                           <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAkun" style="float: right;"> Hapus Akun
                              <img src="../icons/person-x-fill.svg" alt="" style="margin-bottom:3px;">
                           </button>

                           <div class="modal fade" id="deleteAkun" tabindex="-1" role="dialog" aria-labelledby="deleteAkunLabel" aria-hidden="true">
                              <div class="modal-dialog dialog-sm">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5>Hapus Akun</h5>
                                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <p style="color: black;">Yakin ingin menghapus akun <b><i><?php echo $p['nama_paud']; ?></i></b>?</p>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                                       <a href="hapus-laporan.php?id_akun=<?php echo $p['id_author']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </li>
                     </ol>
                     <div class="col-md-6">
                        <div class="card">
                           <div class="card-header">
                              <h6 style="margin-bottom: 1px;">Identitas PAUD</h6>
                           </div>
                           <div class="col-md-12">

                              <div class="card-body">
                                 <table class="table table-sm">
                                    <tbody>
                                       <tr id="ftz16"">
                              <th>Nama Paud</th>
                              <td class=" col-md-6"><?php echo $p['nama_paud']; ?></td>
                                       </tr>
                                       <tr id="ftz16"">
                              <th>NPSN</th>
                              <td class=" col-md-6"><?php echo $p['npsn']; ?></td>
                                       </tr>
                                       <tr id="ftz16"">
                              <th>No. Perijinan</th>
                              <td class=" col-md-6"><?php echo $p['no_perijinan']; ?></td>
                                       </tr>
                                       <tr id="ftz16"">
                              <th>Dikeluarkan Tanggal</th>
                              <td class=" col-md-6"><?php echo $p['dikeluarkan_tanggal']; ?></td>
                                       </tr>
                                       <tr id="ftz16"">
                              <th>Alamat</th>
                              <td class=" col-md-6"><?php echo $p['alamat']; ?></td>
                                       </tr>
                                       <tr id="ftz16"">
                              <th>Email</th>
                              <td class=" col-md-6"><?php echo $p['email']; ?></td>
                                       </tr>
                                       <tr id="ftz16"">
                              <th>Akreditasi</th>
                              <td class=" col-md-6"><?php echo $p['akreditasi']; ?></td>
                                       </tr>
                                       <tr id="ftz16"">
                              <th>No. SK. Akreditasi</th>
                              <td class=" col-md-6"><?php echo $p['no_sk_akreditasi']; ?></td>
                                       </tr>
                                       <tr id="ftz16"">
                              <th>Nama Bank</th>
                              <td class=" col-md-6"><?php echo $p['nama_bank']; ?></td>
                                       </tr>
                                       <tr id="ftz16"">
                              <th>No Rekening</th>
                              <td class=" col-md-6"><?php echo $p['no_rekening']; ?></td>
                                       </tr>
                                       <tr id="ftz16"">
                              <th>Atas Nama</th>
                              <td class=" col-md-6"><?php echo $p['atas_nama']; ?></td>
                                       </tr>
                                       <tr id="ftz16"">
                              <th>Pengelola</th>
                              <td class=" col-md-6"><?php echo $p['pengelola']; ?></td>
                                       </tr>
                                       <tr id="ftz16">
                                          <th>No. HP</th>
                                          <td class="col-md-6"><?php echo $p['no_hp']; ?></td>
                                       </tr>
                                       <tr id="ftz16">
                                          <th>Login Password</th>
                                          <td class="col-md-6"><?php echo $p['password']; ?></td>
                                       </tr>
                                 <?php }
                           } ?>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="card">
                           <div class="card-header">
                              <h6 style="margin-bottom: 1px;">Laporan</h6>
                           </div>
                           <div class="card-body">
                              <table id="datatablesSimple">
                                 <thead>
                                    <tr style="font-size: 16px;">
                                       <th>Nama Paud</th>
                                       <th>tanggal kirim</th>
                                       <th>Bulan</th>
                                       <th>Tahun</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    $no = 1;
                                    // $id_author = $_SESSION['user']['id_author'];
                                    if (isset($_POST['submit'])) {
                                       $tahun = $_POST['tahun'];
                                       $bulan = $_POST['bulan'];
                                       $laporan = mysqli_query($conn, "SELECT * FROM admin_peserta_didik LEFT JOIN user USING (id_author) WHERE id_author = '$_GET[id]' AND bulan LIKE '%" . $bulan . "%' AND tahun LIKE '%" . $tahun . "%' ORDER BY tanggal_kirim DESC");
                                    } else {
                                       $laporan = mysqli_query($conn, "SELECT * FROM admin_peserta_didik LEFT JOIN user USING (id_author) WHERE id_author = '$_GET[id]' ORDER BY tanggal_kirim DESC");
                                    }
                                    if (mysqli_num_rows($laporan) > 0) {
                                       while ($p = mysqli_fetch_array($laporan)) {
                                    ?>


                                          <tr style="font-size: 16px;" id="klik-tabel">
                                             <td>
                                                <a href="detail-laporan.php?page=dot&identitas=<?php echo $p['id_author']; ?>?page=dot&id=<?php echo $p['id_laporan']; ?>" style="text-decoration:none; color:darkblue;">
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
   <script src="../datatables/datatable.js"></script>
   <script src="../js/datatables-simple-demo.js"></script>
</body>

</html>