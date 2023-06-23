<?php 
  require('database/db.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <style>
    .gradient-custom {
      /* fallback for old browsers */
      background: #6a11cb;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
    }
  </style>
</head>

<body>
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <!-- <img src="" alt="" class="align-center mb-4" width="150px"> -->
              <h3 class="mb-5">Login</h3>
              <form action="" method="POST">
                <div class="form-outline mb-4">
                  <input type="username" id="typeEmailX-2" class="form-control form-control-lg" name="username" placeholder="username" required />
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password" placeholder="password" required />
                </div>

                <div class="login">
                  <button class="btn btn-success form-control btn-block" name="submit" type="submit">Masuk</button><br>
                </div>
                <button type="button" class="mt-3" style="background: none;border:none; color:grey;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Buat akun pegawai</button>
              </form>
              <!-- tanggapan -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h6>Registrasi Pegawai</h6>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST">
                      <div class="modal-body">
                        <div class="mb-3">
                          <input type="text" class="form-control mt-3" id="recipient-name" autocomplete="off" name="nip_baru" placeholder="nip">
                          <input type="text" class="form-control mt-3" id="recipient-name" autocomplete="off" name="nama_baru" placeholder="Nama Lengkap">
                          <input type="text" class="form-control mt-3" id="recipient-name" autocomplete="off" name="username_baru" placeholder="username">
                          <input type="text" class="form-control mt-3" id="recipient-name" autocomplete="off" name="password_baru" placeholder="password">
                          <input type="text" class="form-control mt-3" id="recipient-name" autocomplete="off" name="telp_baru" placeholder="no.telpon">
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
                      $username_baru = $_POST['username_baru'];
                      $password_baru = $_POST['password_baru'];
                      $telp_baru = $_POST['telp_baru'];
                      $cek_regist = mysqli_query($conn, "SELECT * FROM pegawai WHERE username = '$username_baru' OR nip = '$nip_baru'");
                      if (mysqli_num_rows($cek_regist) == 0) {
                        $get_regist = mysqli_query($conn, "INSERT INTO pegawai VALUE(
                                null,
                                '" . $nip_baru . "',
                                '" . $nama_baru . "',
                                '" . $username_baru . "',
                                '" . $password_baru . "',
                                '" . $telp_baru . "',
                                '12',
                                ''
                            )");
                        if ($get_regist) {
                          echo '<script>alert("akun berhasil dibuat")</script>';
                        } else {
                          echo '<script>alert("akun gagal dibuat")</script>';
                        }
                      } else {
                        echo '<script>alert("Gagal, akun sudah terdaftar")</script>';
                      }
                    }
                    ?>
                  </div>
                </div>
              </div>
              <?php
              if (isset($_POST["submit"])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                if ($username != "" && $password != "") {
                  $get_pegawai = mysqli_query($conn, "SELECT * FROM pegawai WHERE username = '$username' AND password = '$password'");
                  $get_kadis = mysqli_query($conn, "SELECT * FROM kepala_dinas WHERE username = '$username' AND password = '$password'");
                  $get_admin = mysqli_query($conn, "SELECT * FROM admin WHERE user_admin = '$username' AND pass_admin = '$password'");
                  $akun_pegawai = mysqli_num_rows($get_pegawai);
                  $akun_kadis = mysqli_num_rows($get_kadis);
                  $akun_admin = mysqli_num_rows($get_admin);
                  if ($akun_pegawai == 1) {
                    $pegawai = $get_pegawai->fetch_assoc();
                    $_SESSION["pegawai"] = $pegawai;
                    echo "<script>location='pegawai/index.php';</script>";
                  }
                  else if ($akun_kadis == 1) {
                    $kadis = $get_kadis->fetch_assoc();
                    $_SESSION["kadis"] = $kadis;
                    echo "<script>location='super_admin/index.php';</script>";
                  } 
                  else if ($akun_admin == 1) {
                    $admin = $get_admin->fetch_assoc();
                    $_SESSION["admin"] = $admin;
                    echo "<script>location='admin/index.php';</script>";
                  }
                   else {
              ?>

                    <div class="alert alert-danger alert-dismissible alert-atas"><img src="icons/exclamation-circle-fill.svg" alt="" style="margin-bottom: 3px;"> tidak dapat login, username atau password salah
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>

              <?php
                  }
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>