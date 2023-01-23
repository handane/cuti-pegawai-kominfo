<?php
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
  <link rel="icon" type="image/png" href="foto/tut wuri.png">
  <link href="css/styles.css" rel="stylesheet" />
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
      <p><?php echo "<p>" . $_SESSION['user']['nama_paud'] . "</p>" ?></p>
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
            <div class="sb-sidenav-menu-heading">main</div>
            <a class="nav-link aktif" href="dashboard.php">
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
            <a class="nav-link" href="paud.php">
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
          <ol class="breadcrumb mb-2 mt-2">
            <li class="breadcrumb-item active">HOME</li>
          </ol>
          <div class="card mb-3">
            <div class="col-md-12 card-body">
              <p><b>Hai, <?php echo $_SESSION['user']['pengelola']; ?>.</b> Lihat pembaruan beranda hari ini untuk mendapatkan informasi terbaru</p>

            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="">
                <div class="card card-header bg-info">
                  <h6 style="margin-bottom: 1px;">Beranda</h6>
                </div>
                <?php
                $pesan = mysqli_query($conn, "SELECT * FROM pesan ORDER BY id DESC");
                if (mysqli_num_rows($pesan) > 0) {
                  while ($row = mysqli_fetch_array($pesan)) {
                ?>
                    <div class="col-md-12">
                      <div class="card card-body mt-1 mb-3 pb-4">
                        <!-- Judul Pesan -->
                        <div class="pb-2" style="display: flex">
                          <figure>
                            <img src="foto/paud.png" alt="" style="width: 40px; height:40px; border-radius: 50%;">
                          </figure>
                          <div class="ps-2">
                            <div class="jud">
                              <h6 class="m-0 mb-1 ms-1"><?php echo $row['pengirim'] ?> (Disdikbud Kab. Bulungan)</h6>
                            </div>
                            <!-- pesan -->
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

                        <div class="isi-pesan ms-5">

                          <p><?php echo $row['teks']; ?></p>

                        </div>
                      </div>
                    </div>
                  <?php }
                } else { ?>
                  <div class="col-md-12">
                    <div class="card card-body mt-1 mb-3 pb-4">
                      <div class="isi-pesan ms-5">
                        <i>Tidak ada pemberitahuan</i>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
      </main>
      <footer class="mt-5">
      </footer>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@latest/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
  <script>
    ClassicEditor
      .create(document.querySelector('#editor'))
      .catch(error => {
        console.error(error);
      });
  </script>

</body>

</html>