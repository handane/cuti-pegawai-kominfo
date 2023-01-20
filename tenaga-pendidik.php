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
   <script>

   </script>
   <style>
      .bx-shadow {
         box-sizing: border-box;
         box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
      }

      .bgc {
         background-color: #FBFBFB;
      }

      .tengah {
         text-align: center;
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
      <div id="layoutSidenav_content" class="bgc">
         <main>
            <div class="container-fluid px-3">
               <h5 class="mt-4">Pendidik dan Tenaga Kependidikan</h5>
               <ol class="breadcrumb mb-4">
                  <li class="breadcrumb-item active">Tenaga Pendidik</li>
               </ol>


               <div class="card mb-4 bx-shadow">
                  <div class="card-header" style="padding: 15px 0 0 15px;">
                     <a href="tambah-pendidik.php">
                        <p class="btn btn-primary btn-sm">Tambah <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 1.5 16 16">
                              <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                              <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                           </svg></p>
                     </a>
                  </div>
                  <div class="card-body">
                     <table id="datatablesSimple">
                        <thead>
                           <tr>
                              <th>No</th>
                              <th>Nama</th>
                              <th>L/P</th>
                              <th>Tempat/Tgl lahir</th>
                              <th>Pendidikan</th>
                              <th>Status</th>
                              <th>Tanggal Tugas</th>
                              <th>Jabatan</th>
                              <th>OPSI</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $no = 1;
                           $id_author = $_SESSION['user']['id_author'];
                           $pendidik = mysqli_query($conn, "SELECT * FROM tenaga_pendidik WHERE id_author = $id_author");
                           if (mysqli_num_rows($pendidik) > 0) {
                              while ($row = mysqli_fetch_array($pendidik)) {
                           ?>

                                 <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td>
                                       <?php echo $row['nama_pendidik'] ?>
                                    </td>
                                    <td>
                                       <?php echo $row['jenis_kelamin'] ?>
                                    </td>
                                    <td>
                                       <?php echo ($row['tempat_lahir']) ?>, <?php echo ($row['tanggal_lahir']) ?>
                                    </td>
                                    <td>
                                       <?php echo $row['pendidikan_terakhir'] ?>
                                    </td>
                                    <td>
                                       <?php echo $row['status'] ?>
                                    </td>
                                    <td>
                                       <?php echo $row['tanggal_mulai_tugas'] ?>
                                    </td>
                                    <td>
                                       <?php echo $row['jabatan'] ?>
                                    </td>
                                    <td class="tengah">
                                       <a href="edit-pendidik.php?id_pendidik=<?php echo $row['id_tenaga_pendidik'] ?>" class="btn btn-sm btn-success">
                                          <img src="icons/pencil-square.svg" style="margin-bottom: 3px;">
                                       </a>
                                       <a href="proses-hapus.php?id_pendidik=<?php echo $row['id_tenaga_pendidik'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger"><img src="icons/trash-fill.svg" alt="Hapus" style="margin-bottom: 3px;"></a>

                                    </td>
                                 </tr>

                                 </td>
                                 </tr>
                              <?php
                              }
                           } else { ?>
                              <tr>
                                 <td colspan="8">tidak ada data</td>
                              </tr>
                           <?php } ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </main>


         <!-- Modal -->


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
   <script src="js/scripts.js"></script>
   <!-- <script src="js/hapus.js"></script> -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
   <script src="assets/demo/chart-area-demo.js"></script>
   <script src="assets/demo/chart-bar-demo.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
   <script src="js/datatables-simple-demo.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

   <!-- <script>
      $(document).ready(function() {

         $('#modal_delete').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget); // Tombol dimana modal di tampilkan

            // Untuk mengambil nilai dari data-id="" yang telah kita tempatkan pada link hapus
            var id = div.data('id');

            var modal = $(this);

            // Mengisi atribut href pada tombol ya yang kita berikan id hapus-true pada modal .
            modal.find('#hapus-true-data').attr("href", "proses-hapus.php?id_pendidik=" + id);
         })

      });
   </script> -->

</body>

</html>