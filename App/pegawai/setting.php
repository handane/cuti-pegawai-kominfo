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

    table tr th,
    td {
      padding: 5px 8px;
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
            <a class="nav-link" href="permohonan-cuti.php">
              <div class="sb-nav-link-icon">
                <i class="fas fa-chalkboard-teacher"></i>
              </div>
              Permohonan Cuti
            </a>
            <a class="nav-link aktif" href="setting.php">
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
            <li class="breadcrumb-item active">Profil</li>
          </ol>
          <div class="card">
            <div class="card-body">
              <?php
              $id_pegawai = $_SESSION['pegawai']['id_pegawai'];
              $profil = mysqli_query($conn, "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'");
              $row = mysqli_fetch_array($profil);
              ?>
              <a href="setting-edit.php?id_pegawai=<?php echo $row['id_pegawai'] ?>" class="btn btn-sm btn-success">Edit</a>
              <div class="table-responsive">
                <table class="m-3 p-3">
                  <thead>
                    <tr>  
                      <td colspan="3" class="text-center"><img src="foto/<?= $row['foto'] ?>" alt="empty image" style="width:110px; height:110px; border-radius:50%; border: 1px solid grey"></td>
                    </tr>
                    <tr>
                      <th>Nama</th>
                      <td>:</td>
                      <td><?php echo $row['nama'] ?></td>
                    </tr>
                    <tr>
                      <th>NIP</th>
                      <td>:</td>
                      <td><?php echo $row['nip'] ?></td>
                    </tr>
                    <tr>
                      <th>No Telepon</th>
                      <td>:</td>
                      <td><?php echo $row['telp'] ?></td>
                    </tr>
                    <tr>
                      <th>Username</th>
                      <td>:</td>
                      <td><?php echo $row['username'] ?></td>
                    </tr>
                    <tr>
                      <th>Password</th>
                      <td>:</td>
                      <td><?php echo $row['password'] ?></td>
                    </tr>
                  </thead>
                </table>
              </div>
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