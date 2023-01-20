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
          <h5 class="mt-3">Tenaga Pendidik</h4>
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
                <div class="row bg-light pt-2 pb-1">
                  <div class="col-md-2">
                    <div class="card bg-primary text-white mb-1">
                      <div class="card-body">
                        <h4><?php echo $pns; ?></h4>
                      </div>
                      <div class="card-footer d-flex align-items-center justify-content-between">
                        <h6>PNS</h6>
                        <div class="small text-white"><i class="fas fa-chalkboard-teacher"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="card bg-warning text-white mb-1">
                      <div class="card-body">
                        <h4><?php echo $honorer; ?></h4>
                      </div>
                      <div class="card-footer d-flex align-items-center justify-content-between">
                        <h6>Honorer</h6>
                        <div class="small text-white"><i class="fas fa-chalkboard-teacher"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="card bg-success text-white mb-1">
                      <div class="card-body">
                        <h4><?php echo $pppk; ?></h4>
                      </div>
                      <div class="card-footer d-flex align-items-center justify-content-between">
                        <h6>PPPK</h6>
                        <div class="small text-white"><i class="fas fa-chalkboard-teacher"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="card bg-danger text-white mb-1">
                      <div class="card-body">
                        <h4><?php echo $tenaga_kontrak; ?></h4>
                      </div>
                      <div class="card-footer d-flex align-items-center justify-content-between">
                        <h6>Tenaga Kontrak</h6>
                        <div class="small text-white"><i class=""></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card bg-secondary text-white mb-1">
                      <div class="card-body">
                        <h4><?php echo $total_pendidik; ?></h4>
                      </div>
                      <div class="card-footer d-flex align-items-center justify-content-between">
                        <h6>Total Pendidik</h6>
                        <div class="small text-white"><i class="fas fa-chalkboard-teacher"></i></div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>
            <div class="">
              <section id="minimal-statistics">

                <?php
                // s1
                $ambil_s1 = mysqli_query($conn, "SELECT * FROM tenaga_pendidik WHERE pendidikan_terakhir LIKE 'S1%' OR pendidikan_terakhir LIKE 'sarjana%' OR pendidikan_terakhir LIKE 'STRATA 1%'");
                $s1 = mysqli_num_rows($ambil_s1);
                // s2
                $ambil_s2 = mysqli_query($conn, "SELECT * FROM tenaga_pendidik WHERE pendidikan_terakhir LIKE 's2%' OR pendidikan_terakhir LIKE 'dua%'");
                $s2 = mysqli_num_rows($ambil_s2);

                // sma
                $ambil_sma = mysqli_query($conn, "SELECT * FROM tenaga_pendidik WHERE pendidikan_terakhir LIKE 'sma%' OR pendidikan_terakhir LIKE 'smk%' OR pendidikan_terakhir LIKE 'man%' OR pendidikan_terakhir LIKE 'slta%' OR pendidikan_terakhir LIKE 'smea%' OR pendidikan_terakhir LIKE 'smu%' OR pendidikan_terakhir LIKE 'stm%' OR pendidikan_terakhir LIKE 'paket c%' OR pendidikan_terakhir LIKE 'madrasah aliah%' OR pendidikan_terakhir LIKE 'MA%'");
                $sma = mysqli_num_rows($ambil_sma);

                // smp
                $ambil_smp = mysqli_query($conn, "SELECT * FROM tenaga_pendidik WHERE pendidikan_terakhir LIKE 'smp%' OR pendidikan_terakhir LIKE 'sltp%' OR pendidikan_terakhir LIKE 'mts%' OR pendidikan_terakhir LIKE 'paket b%'");
                $smp = mysqli_num_rows($ambil_smp);

                // sd
                $ambil_sd = mysqli_query($conn, "SELECT * FROM tenaga_pendidik WHERE pendidikan_terakhir LIKE 'sd%' OR pendidikan_terakhir LIKE 'paket a%'");
                $sekolah_dasar = mysqli_num_rows($ambil_sd);

                // D1 D2 D3
                $ambil_d123 = mysqli_query($conn, "SELECT * FROM tenaga_pendidik WHERE pendidikan_terakhir LIKE 'd1%' OR pendidikan_terakhir LIKE 'd2%' OR pendidikan_terakhir LIKE 'd3%' OR pendidikan_terakhir LIKE 'diii%' OR pendidikan_terakhir LIKE 'd.iii%' OR pendidikan_terakhir LIKE 'dii%'");
                $d123 = mysqli_num_rows($ambil_d123);

                ?>
                <div class="row bg-light pt-3 pb-3">
                  <h6>Tingkat Pendidikan</h6>
                  <div class="col-md-2 col-12">
                    <div class="card">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="media d-flex">
                            <div class="media-body text-left">
                              <h3 class="warning"><?php echo $s2 ?></h3>
                              <span>S2</span>
                            </div>
                            <div class="align-self-center">
                              <i class="icon-bubbles warning font-large-2 float-right"></i>
                            </div>
                          </div>
                          <div class="progress mt-1 mb-0" style="height: 7px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="50"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2 col-12">
                    <div class="card">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="media d-flex">
                            <div class="media-body text-left">
                              <h3 class="primary"><?php echo $s1; ?></h3>
                              <span>S1</span>
                            </div>
                            <div class="align-self-center">
                              <i class="icon-book-open primary font-large-2 float-right"></i>
                            </div>
                          </div>
                          <div class="progress mt-1 mb-0" style="height: 7px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2 col-12">
                    <div class="card">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="media d-flex">
                            <div class="media-body text-left">
                              <h3 class="primary"><?php echo $d123; ?></h3>
                              <span>D1 - D3</span>
                            </div>
                            <div class="align-self-center">
                              <i class="icon-book-open primary font-large-2 float-right"></i>
                            </div>
                          </div>
                          <div class="progress mt-1 mb-0" style="height: 7px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2 col-12">
                    <div class="card">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="media d-flex">
                            <div class="media-body text-left">
                              <h3 class="success"><?php echo $sma; ?></h3>
                              <span>SMA Sederajat</span>
                            </div>
                          </div>
                          <div class="progress mt-1 mb-0" style="height: 7px;">
                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2 col-12">
                    <div class="card">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="media d-flex">
                            <div class="media-body text-left">
                              <h3 class="danger"><?php echo $smp; ?></h3>
                              <span>SMP Sederajat</span>
                            </div>
                            <div class="align-self-center">
                              <i class="icon-direction danger font-large-2 float-right"></i>
                            </div>
                          </div>
                          <div class="progress mt-1 mb-0" style="height: 7px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2 col-12">
                    <div class="card">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="media d-flex">
                            <div class="media-body text-left">
                              <h3 class="danger"><?php echo $sekolah_dasar; ?></h3>
                              <span>SD Sederajat</span>
                            </div>
                            <div class="align-self-center">
                              <i class="icon-direction danger font-large-2 float-right"></i>
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
                      <th>Nama Pendidik</th>
                      <th>L/K</th>
                      <th>Jabatan</th>
                      <th>Status</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th>Pendidikan</th>
                      <th>Mulai Tugas</th>
                      <th>PAUD</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $get_pendidik = mysqli_query($conn, "SELECT * FROM tenaga_pendidik LEFT JOIN user USING (id_author) ORDER BY nama_pendidik ASC");
                    while ($p = mysqli_fetch_array($get_pendidik)) {
                    ?>
                      <tr style="font-size: 16px;" id="klik-tabel">
                        <td><?php echo $p['nama_pendidik']; ?></td>
                        <td><?php echo $p['jenis_kelamin']; ?></td>
                        <td><?php echo $p['jabatan']; ?></td>
                        <td><?php echo $p['status']; ?></td>
                        <td><?php echo $p['tempat_lahir']; ?></td>
                        <td><?php echo $p['tanggal_lahir']; ?></td>
                        <td><?php echo $p['pendidikan_terakhir']; ?></td>
                        <td><?php echo $p['tanggal_mulai_tugas']; ?></td>
                        <td><?php echo $p['nama_paud']; ?></td>
                      </tr>
                    <?php } ?>
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