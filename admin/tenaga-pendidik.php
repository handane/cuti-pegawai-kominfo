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

            <a class="nav-link" href="laporan.php">
              <div class="sb-nav-link-icon">
                <i class="fas fa-book-open"></i>
              </div>
              Laporan
            </a>
            <a class="nav-link aktif" href="tenaga-pendidik.php">
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
          <h5 class="mt-4">Tenaga Pendidik</h4>
          <div class="">
            <section id="minimal-statistics">
              <?php
              // PNS
              $ambil_pns = mysqli_query($conn, "SELECT * FROM tenaga_pendidik WHERE status = 'pns'");
              $pns = mysqli_num_rows($ambil_pns);
              // HONORER
              $ambil_honorer = mysqli_query($conn, "SELECT * FROM tenaga_pendidik WHERE status = 'Honorer'");
              $honorer = mysqli_num_rows($ambil_honorer);

              // PPPK
              $ambil_pppk = mysqli_query($conn, "SELECT * FROM tenaga_pendidik WHERE status = 'pppk'");
              $pppk = mysqli_num_rows($ambil_pppk);
              // tenaga kontrak
              $ambil_tenaga_kontrak = mysqli_query($conn, "SELECT * FROM tenaga_pendidik WHERE status = 'tenaga kontrak'");
              $tenaga_kontrak = mysqli_num_rows($ambil_tenaga_kontrak);
              // Total
              $ambil_total_pendidik = mysqli_query($conn, "SELECT * FROM tenaga_pendidik");
              $total_pendidik = mysqli_num_rows($ambil_total_pendidik);
              ?>
              <div class="row bg-light pt-3 pb-3">
                <div class="col-xl-2 col-sm-6 col-12">
                  <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="media-body text-left">
                            <h3 class="primary"><?php echo $pns; ?></h3>
                            <span>PNS</span>
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
                <div class="col-xl-2 col-sm-6 col-12">
                  <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="media-body text-left">
                            <h3 class="warning"><?php echo $honorer ?></h3>
                            <span>Honorer</span>
                          </div>
                          <div class="align-self-center">
                            <i class="icon-bubbles warning font-large-2 float-right"></i>
                          </div>
                        </div>
                        <div class="progress mt-1 mb-0" style="height: 7px;">
                          <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-2 col-sm-6 col-12">
                  <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="media-body text-left">
                            <h3 class="success"><?php echo $pppk; ?></h3>
                            <span>PPPK</span>
                          </div>
                        </div>
                        <div class="progress mt-1 mb-0" style="height: 7px;">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-2 col-sm-6 col-12">
                  <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="media-body text-left">
                            <h3 class="danger"><?php echo $tenaga_kontrak; ?></h3>
                            <span>Tenaga Kontrak</span>
                          </div>
                          <div class="align-self-center">
                            <i class="icon-direction danger font-large-2 float-right"></i>
                          </div>
                        </div>
                        <div class="progress mt-1 mb-0" style="height: 7px;">
                          <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-12">
                  <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="media-body text-left">
                            <h3 class="danger"><?php echo $total_pendidik; ?></h3>
                            <h6>Total Pendidik</h6>
                          </div>
                        </div>
                        <div class="progress mt-1 mb-0" style="height: 7px;">
                          <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
          <div class="card">
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