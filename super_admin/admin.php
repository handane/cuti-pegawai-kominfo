<?php
session_start();
include("../database/db.php");
if (!isset($_SESSION["kadis"])) {
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
  <title>CUTI | KADIS</title>
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


    <a class="navbar-brand ps-3" href="index.php"> CUTI | KADIS</a>
    <!-- Navbar Brand-->
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
      <i class="fas fa-bars"></i>
    </button>

    <!-- navbar nama -->
    <div class="navbar-nav ps-3 d-md-inline-block form-inline ms-auto" style="color: white; text-decoration: none">
      <p><?php echo "<p>" . $_SESSION['kadis']['nama'] . "</p>" ?></p>
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
            <a class="nav-link aktif" href="admin.php">
              <div class="sb-nav-link-icon">
                <i class="fas fa-address-book"></i>
              </div>
              Admin
            </a>

            <a class="nav-link" href="pegawai.php">
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
          <h6>Super Admin</h6>
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-3">
          <ol class="breadcrumb mb-4 mt-2">
            <li class="breadcrumb-item active">Data Admin</li>
          </ol>
          <button type="button" class="btn btn-sm btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Tambah Admin</button>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h6>Add Admin</h6>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST">
                  <div class="modal-body">
                    <div class="mb-3">
                      <input type="text" class="form-control mt-3" id="recipient-name" autocomplete="off" name="nama_baru" placeholder="Nama">
                      <input type="text" class="form-control mt-3" id="recipient-name" autocomplete="off" name="nip_baru" placeholder="NIP">
                      <input type="text" class="form-control mt-3" id="recipient-name" autocomplete="off" name="telp_baru" placeholder="No Telepon">
                      <select name="jeniskelamin_baru" class="form-control mt-3" id="recipient-name" autocomplete="off" id="">
                        <option>-- Jenis Kelamin --</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                      <input type="text" class="form-control mt-3" id="recipient-name" autocomplete="off" name="user_baru" placeholder="Username">
                      <input type="text" class="form-control mt-3" id="recipient-name" autocomplete="off" name="pass_baru" placeholder="Password">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="regist" value="Daftar">
                  </div>
                </form>
                <?php
                // include_once("db.php");
                if (isset($_POST["regist"])) {
                  $nip_baru = $_POST['nip_baru'];
                  $nama_baru = $_POST['nama_baru'];
                  $jeniskelamin_baru = $_POST['jeniskelamin_baru'];
                  $telp_baru = $_POST['telp_baru'];
                  $user_baru = $_POST['user_baru'];
                  $pass_baru = $_POST['pass_baru'];
                  $cek_regist = mysqli_query($conn, "SELECT * FROM admin WHERE nip = '$nip_baru'");
                  if (mysqli_num_rows($cek_regist) == 0) {
                    $get_regist = mysqli_query($conn, "INSERT INTO admin VALUE(
                                null,
                                '" . $user_baru . "',
                                '" . $pass_baru . "',
                                '" . $nip_baru . "',
                                '" . $nama_baru . "',
                                '" . $telp_baru . "',
                                '" . $jeniskelamin_baru . "'
                            )");
                    if ($get_regist) {
                      echo '<script>alert("akun berhasil dibuat")</script>';
                    } else {
                      echo '<script>alert("akun gagal dibuat")</script>';
                    }
                  } else {
                    echo '<script>alert("Gagal, NIP sudah terdaftar")</script>';
                  }
                }
                ?>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <table id="datatablesSimple">
                <thead>
                  <tr style="font-size: 16px;">
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telpon</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $get_admin = mysqli_query($conn, "SELECT * FROM admin");
                  while ($p = mysqli_fetch_array($get_admin)) {
                  ?>
                    <tr style="font-size: 16px;" id="klik-tabel">
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $p['nip']; ?></td>
                      <td><?php echo $p['nama']; ?></td>
                      <td><?php echo $p['jenis_kelamin']; ?></td>
                      <td><?php echo $p['telp_admin']; ?></td>
                      <td><a class="btn btn-sm btn-danger me-2" href="hapus.php?id_admin=<?php echo $p['id_admin'] ?>" onclick="return confirm('Yakin ingin menghapus admin <?php echo $p['nama'] ?>')">Hapus</a><a href="admin-edit.php?id_admin=<?php echo $p['id_admin'] ?>" class="btn btn-sm btn-success">Edit</a></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
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