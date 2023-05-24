<?php
session_start();
include("../database/db.php");
if (!isset($_SESSION["pegawai"])) {
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
  <title>CUTI | pegawai</title>
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


    <a class="navbar-brand ps-3" href="index.php"> CUTI | Pegawai</a>
    <!-- Navbar Brand-->
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
      <i class="fas fa-bars"></i>
    </button>

    <!-- navbar nama -->
    <div class="navbar-nav ps-3 d-md-inline-block form-inline ms-auto" style="color: white; text-decoration: none">
      <p><?php echo "<p>" . $_SESSION['pegawai']['nama'] . "</p>" ?></p>
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
            <div class="sb-sidenav-menu-heading">Pegawai</div>
            <a class="nav-link" href="index.php">
              <div class="sb-nav-link-icon">
                <i class="fas fa-home"></i>
              </div>
              Dashboard
            </a>
            <a class="nav-link" href="cuti.php">
              <div class="sb-nav-link-icon">
                <i class="fas fa-address-book"></i>
              </div>
              Data Cuti
            </a>
            <a class="nav-link aktif" href="permohonan-cuti.php">
              <div class="sb-nav-link-icon">
                <i class="fas fa-chalkboard-teacher"></i>
              </div>
              Permohonan Cuti
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
          <h6>Pegawai</h6>
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-3">
          <ol class="breadcrumb mb-4 mt-2">
            <li class="breadcrumb-item active">Data Cuti Pegawai</li>
          </ol>
          <div class="card">
            <div class="card-body">
              <?php
              $id_pegawai = $_SESSION['pegawai']['id_pegawai'];
              $cuti = mysqli_query($conn, "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'");
              while ($row = mysqli_fetch_array($cuti)) {
              ?>
                <form class="row g-3" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                    <label for="" class="form-label-md"><b>Nama</b></label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $row['nama'] ?>" readonly />
                  </div>
                  <div class="col-md-6">
                    <label for="" class="form-label-md"><b>NIP</b></label>
                    <input type="text" class="form-control" name="nip" value="<?php echo $row['nip'] ?>" readonly />
                  </div>
                  <div class="col-md-6">
                    <label for="" class="form-label-md"><b>Jenis Cuti</b></label>
                    <select class="form-select form-select-md" aria-label=".form-select-sm example" name="id_jeniscuti" required>
                      <option value=""></option>
                      <?php
                      $get_jc = mysqli_query($conn, "SELECT * FROM jenis_cuti");
                      if (mysqli_num_rows($get_jc) > 0) {
                        while ($row_jc = mysqli_fetch_array($get_jc)) {
                      ?>
                          <option value="<?php echo $row_jc['id_jeniscuti'] ?>"><?php echo $row_jc['jenis_cuti'] ?></option>
                      <?php }
                      } ?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="" class="form-label-md"><b>Alasan Cuti</b></label>
                    <input type="text" class="form-control" name="alasan_cuti" required />
                  </div>
                  <div class="col-md-6">
                    <label for="" class="form-label-md"><b>Tanggal Mulai Cuti</b></label>
                    <input type="date" class="form-control" name="tgl_cuti" required />
                  </div>
                  <div class="col-md-6">
                    <label for="" class="form-label-md"><b>Tanggal Cuti Berakhir</b></label>
                    <input type="date" class="form-control" name="tgl_berakhir" required />
                  </div>
                  <div class="col-md-6">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
                  </div>
                </form>
              <?php } ?>

              <?php
              if (isset($_POST['submit'])) {
                $nama = $_POST['nama'];
                $id_jeniscuti = $_POST['id_jeniscuti'];
                $id_pegawai = $_SESSION['pegawai']['id_pegawai'];
                $tgl_pengajuan = date('d-m-Y');
                $tgl_cuti = $_POST['tgl_cuti'];
                $tgl_berakhir = $_POST['tgl_berakhir'];
                $alasan_cuti = $_POST['alasan_cuti'];
                $status_cuti = "Menunggu Persetujuan";

                $update = mysqli_query($conn, "INSERT INTO pengajuan VALUE(
                           null,
                           '".$id_jeniscuti. "',
                           '" . $id_pegawai . "',
                           '" . $tgl_pengajuan . "',
                           '" . $tgl_cuti . "',
                           '" . $tgl_berakhir . "',
                           '" . $alasan_cuti . "',
                           '" . $status_cuti . "')");

                $cek_jumlah = mysqli_query($conn, "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'");
                $cek_jumlah_2 = mysqli_fetch_array($cek_jumlah);
                $jumlah_cuti = $cek_jumlah_2['jumlah_cuti'] - 1;
                $update2 = mysqli_query($conn, "UPDATE pegawai SET 
                  jumlah_cuti = '$jumlah_cuti'
                  WHERE id_pegawai = '$id_pegawai'
                ");
                
                if ($update AND $update2) {
              ?>
              <?php
                  echo
                  '<script>
                  window.location="cuti.php";
                  alert("cuti berhasil diajukan");
                  </script>';
                } else {
                  echo 'gagal ' . mysqli_error($conn);
                }
              }
              ?>

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