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
  <title>CUTI | ADMIN</title>
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
            <a class="nav-link aktif" href="pegawai.php">
              <div class="sb-nav-link-icon">
                <i class="fas fa-address-book"></i>
              </div>
              Pegawai
            </a>
            <a class="nav-link" href="cuti.php">
              <div class="sb-nav-link-icon">
                <i class="fas fa-chalkboard-teacher"></i>
              </div>
              Cuti
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
            <li class="breadcrumb-item active">Update Data Pegawai</li>
          </ol>
          <div class="card">
            <div class="card-body">
              <?php
              if (isset($_GET['id_pegawai'])) {
                $id_pegawai = $_GET['id_pegawai'];
                $edit = mysqli_query($conn, "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'");
                if (mysqli_num_rows($edit) > 0) {
                  while ($row = mysqli_fetch_array($edit)) {
              ?>

                    <form class="row g-3" method="POST" enctype="multipart/form-data">
                      <div class="col-md-6">
                        <label for="" class="form-label-md"><b>Nama</b></label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $row['nama'] ?>" />
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label-md"><b>NIP</b></label>
                        <input type="text" class="form-control" name="nip" value="<?php echo $row['nip'] ?>" />
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label-md"><b>No Telepon</b></label>
                        <input type="text" class="form-control" name="telp" value="<?php echo $row['telp'] ?>" />
                      </div>
                      <div class="col-md-12">
                        <input type="submit" class="btn btn-success" name="submit" value="Save" />
                      </div>
                    </form>
              <?php }
                }
              } ?>

              <?php
              if (isset($_POST['submit'])) {
                $nama = $_POST['nama'];
                $nip = $_POST['nip'];
                $telp = $_POST['telp'];

                $update = mysqli_query($conn, "UPDATE pegawai SET
                           nip = '$nip',
                           nama = '$nama',
                           telp = '$telp' 
                           WHERE id_pegawai = '$id_pegawai'");
                if ($update) {
              ?>
              <?php
                  echo 
                  '<script>
                  window.location="pegawai.php";
                  alert("data berhasil di update");
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