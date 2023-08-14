<?php
session_start();
include("../database/db.php");
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
  <title>CUTI | Admin</title>
  <link rel="icon" type="image/png" href="">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/LOGO UNMUL.png" />

  <link href="../css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <style>
    #ftz16 {
      font-size: 16px;
    }

    body {
      background-color: #f1f1f1;
    }
  </style>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">


    <a class="navbar-brand ps-3" href="index.php"> CUTI | ADMIN</a>
    <!-- Navbar Brand-->
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
      <i class="fas fa-bars"></i>
    </button>

    <!-- navbar nama -->
    <div class="navbar-nav ps-3 d-md-inline-block form-inline ms-auto" style="color: white; text-decoration: none">
      <p><?php echo "<p>" . $_SESSION['admin']['nama'] . "</p>" ?></p>
    </div>

    <!-- navbar icon  -->
    <ul class="navbar-nav me-0 me-md-3 my-2 my-md-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="setting.php">Profil</a></li>
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
            <div class="sb-sidenav-menu-heading">Super Admin</div>
            <a class="nav-link" href="index.php">
              <div class="sb-nav-link-icon">
                <i class="fas fa-home"></i>
              </div>
              Dashboard
            </a>
            <a class="nav-link" href="pegawai.php">
              <div class="sb-nav-link-icon">
                <i class="fas fa-address-book"></i>
              </div>
              Pegawai
            </a>
            <a class="nav-link aktif" href="cuti.php">
              <div class="sb-nav-link-icon">
                <i class="fas fa-chalkboard-teacher"></i>
              </div>
              Cuti
            </a>
            <a class="nav-link" href="cetak-laporan-bar.php">
              <div class="sb-nav-link-icon">
                <i class="fas fa-chalkboard-teacher"></i>
              </div>
              Cetak Laporan
            </a>
            <a class="nav-link" href="setting.php">
              <div class="sb-nav-link-icon">
                <i class="fas fa-gear"></i>
              </div>
              Setting
            </a>
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">masuk sebagai:</div>
          <h6>Admin</h6>
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-3">
          <ol class="breadcrumb mb-4 mt-2">
            <li class="breadcrumb-item active">Laporan Cuti</li>
          </ol>
          <button type="button" class="mb-2 btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Jenis Cuti</button>

          <!-- jenis cuti -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h6>Jenis Cuti</h6>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST">
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="recipent-name">Tambah Jenis Cuti</label>
                      <input type="text" class="form-control mb-3" id="recipient-name" autocomplete="off" name="jenisCutiBaru" value="">
                      <?php
                      $jenisCuti = mysqli_query($conn, "SELECT * FROM jenis_cuti");
                      if (mysqli_num_rows($jenisCuti) > 0) {
                        while ($pq = mysqli_fetch_array($jenisCuti)) {
                      ?>
                          <ul>
                            <li><?= $pq['jenis_cuti'] ?> <a href="cuti-delete.php?id_jeniscuti=<?= $pq['id_jeniscuti'] ?>" onclick="return confirm('konfirmasi hapus')"><img src="../icons/trash-fill-2.svg"> </a></li>
                          </ul>
                      <?php }
                      } ?>

                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="regist" value="Save">
                  </div>
                </form>
                <?php
                // include_once("db.php");
                if (isset($_POST["regist"])) {
                  $jenisCutiBaru = $_POST['jenisCutiBaru'];
                  $cek_regist = mysqli_query($conn, "SELECT * FROM jenis_cuti WHERE jenis_cuti = '$jenisCutiBaru'");
                  if (mysqli_num_rows($cek_regist) == 0) {
                    $get_regist = mysqli_query($conn, "INSERT INTO jenis_cuti VALUE(
                                null,
                                '" . $jenisCutiBaru . "'
                            )");
                    if ($get_regist) {
                      echo '
                      <script>
                        alert("berhasil disimpan");
                        window.location="cuti.php";
                      </script>';
                    } else {
                      echo '<script>alert("Gagal")</script>';
                    }
                  } else {
                    echo '<script>alert("Gagal, jenis cuit sudah ada")</script>';
                  }
                }
                ?>
              </div>
            </div>
          </div>
          <!-- cetak laporan -->
          <!-- <div class="modal fade" id="cetaklaporan" tabindex="-1" aria-labelledby="cetaklaporanLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h6>Periode Laporan</h6>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="cetak-laporan-cuti.php">
                  <div class="modal-body">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                          <label for="">Dari</label>
                          <input type="date" class="form-control col-md-6" id="tglmulai" autocomplete="off" name="awal" value="" required>
                        </div>
                        <div class="col-md-6">
                          <label for="">Sampai</label>
                          <input type="date" class="form-control col-md-6" id="tglmulai" autocomplete="off" name="akhir" value="" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="periode" value="Save">
                  </div>
                </form>
              </div>
            </div>
          </div> -->
          <!--  -->
          <div class="card">
            <div class="card-body">
              <table id="datatablesSimple">
                <thead>
                  <tr style="font-size: 14px;">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Cuti</th>
                    <th>Alasan</th>
                    <th>Tgl diajukan</th>
                    <th>Mulai</th>
                    <th>Berakhir</th>
                    <th>status</th>
                    <th>aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $get_pegawai = mysqli_query($conn, "SELECT * FROM pengajuan LEFT JOIN pegawai USING (id_pegawai) LEFT JOIN jenis_cuti USING (id_jeniscuti) ORDER BY id_pengajuan DESC");
                  while ($p = mysqli_fetch_array($get_pegawai)) {
                  ?>
                    <tr style="font-size: 14px;" id="klik-tabel">
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $p['nama']; ?></td>
                      <td><?php echo $p['jenis_cuti']; ?></td>
                      <td><?php echo $p['alasan_cuti']; ?></td>
                      <td><?php echo $p['tgl_pengajuan']; ?></td>
                      <td><?php echo $p['tgl_cuti']; ?></td>
                      <td><?php echo $p['tgl_berakhir']; ?></td>
                      <td>
                        <?php
                        if ($p['status_cuti'] == 'Menunggu Persetujuan') {
                        ?>
                          <h6 class="btn btn-sm btn-secondary">Menunggu Persetujuan</h6>
                        <?php
                        } else if ($p['status_cuti'] == 'ditolak') {
                        ?>
                          <div class="btn btn-sm btn-danger">Ditolak</div>
                        <?php
                        } else {
                        ?>
                          <div class="btn btn-sm btn-success">Disetujui</div>
                        <?php
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        if ($p['status_cuti'] == 'Disetujui') {
                        ?>
                          <a href="cetak.php?id_pengajuan=<?php echo $p['id_pengajuan'] ?>" class="btn btn-sm btn-warning m-1" target="_blank">Cetak Surat</a>
                          <a href="cetak-form.php?id_pengajuan=<?php echo $p['id_pengajuan'] ?>" class="btn btn-sm btn-info m-1" target="_blank">Cetak Form</a>
                        <?php
                        } else if ($p['status_cuti'] == 'ditolak') {
                          echo "-";
                        } else {
                        ?>
                          <div class="">-</div>
                        <?php
                        }
                        ?>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>
      <footer class="mt-5">
      </footer>
    </div>
  </div>
  <script src="../js/scripts.js"></script>
  <script src="../datatables/datatable.js"></script>
  <script src="../js/datatables-simple-demo.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>