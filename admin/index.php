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
         /* display: none; */
      }
   </style>
</head>

<body class="sb-nav-fixed">
   <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">


      <a class="navbar-brand ps-3" href="index.php"> SIDINI </a>
      <!-- Navbar Brand-->
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
                  <li class="breadcrumb-item active">Beranda</li>
               </ol>
               <div class="card mb-4">
                  <div class="col-md-12 card-body" style="display: flex;">
                     <p><b>Hai, <?php echo $_SESSION['admin']['nama_admin']; ?>.</b> Semua pesan keluar akan tampil secara publik ke semua beranda pengguna sebagai pemberitahuan</p>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="">
                        <div class="card card-header bg-info">
                           <div class="col-md-6">
                              <h6 style="margin-bottom: 1px;">Pesan Keluar</h6>
                           </div>

                        </div>
                        <?php
                        $pesan = mysqli_query($conn, "SELECT * FROM pesan ORDER BY id DESC");
                        if (mysqli_num_rows($pesan) > 0) {
                           while ($row = mysqli_fetch_array($pesan)) {
                        ?>
                              <div class="col-md-12">
                                 <div class="card card-body mt-1 mb-3 pb-3">
                                    <!-- Judul Pesan -->
                                    <div class="bungkus-atas">
                                       <div class="pb-2" style="display: flex">
                                          <figure>
                                             <img src="../foto/paud.png" alt="" style="width: 40px; height:40px; border-radius: 50%;">
                                          </figure>
                                          <div class="ps-2">
                                             <div class="jud">
                                                <h6 class="m-0 mb-1 ms-1"><?php echo $_SESSION['admin']['nama_admin']; ?> (Disdikbud Kab. Bulungan)</h6>
                                             </div>
                                             <div class="jud m-0" style="display: flex;">
                                                <?php
                                                date_default_timezone_set("Asia/Makassar");
                                                $t1 = strtotime($row['waktu_kirim']);
                                                $t2 = ceil((time() - $t1) / 60 / 60 / 24) - 1;
                                                ?>
                                                <p class="badges pesan m-0">PESAN</p>
                                                <?php
                                                if ($t2 == 0) { ?>
                                                   <p class="badges m-0 text-dark" style="font-size: 8pt;">
                                                      Hari ini </p>
                                                <?php } else { ?>
                                                   <p class="badges m-0 text-dark" style="font-size: 8pt;">
                                                      <?php echo $t2 ?> Hari lalu</p>
                                                <?php } ?>
                                             </div>
                                             <!-- <i class="fas fa-user fa-fw" style="color: #eba908;"></i> -->
                                          </div>
                                       </div>
                                       <a href="proses-hapus.php?id_pesan=<?php echo $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus pesan ini?')" class="buttre"><img src="../icons/x-circle-fill.svg" alt="delete"></a>
                                    </div>

                                    <div class="isi-pesan ms-5">

                                       <p><?php echo $row['teks']; ?></p>

                                    </div>
                                 </div>
                              </div>
                           <?php }
                        } else { ?>
                           <div class="col-md-12">
                              <div class="card card-body mt-1 mb-3 pb-3">
                                 <div class="isi-pesan ms-5">
                                    <i>Tidak ada pesan yang ditampilkan</i>
                                 </div>
                              </div>
                           </div>
                        <?php } ?>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="card">
                        <div class="card-header bg-info">
                           <h6 style="margin-bottom: 1px;">Tulis Pesan</h6>
                        </div>
                        <div class="card-body">
                           <form action="" method="POST">
                              <textarea rows="" cols="" id="editor" name="teks"></textarea>
                              <button class="btn btn-sm btn-success mt-2" type="submit" name="kirim">Kirim</button>
                           </form>
                           <?php
                           if (isset($_POST['kirim'])) {
                              $pengirim = $_SESSION['admin']['nama_admin'];
                              $teks = $_POST['teks'];
                              $waktu_kirim = date('d F Y');
                              if ($teks != "") {
                                 $simpan = mysqli_query($conn, "INSERT INTO pesan VALUES(
                                       null,
                                       '" . $pengirim . "',
                                       '" . $teks . "',
                                       '" . $waktu_kirim . "')");
                                 if ($simpan) {
                                    echo "<script>window.location='index.php'</script>";
                                 }
                              }
                           }
                           ?>
                        </div>
                     </div>
                  </div>
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