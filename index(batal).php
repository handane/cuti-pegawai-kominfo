<?php
// include our connect script 
session_start();
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- CSS only -->
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
   <link rel="icon" type="image/png" href="foto/tut wuri.png">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
   <link href="css/styles.css" rel="stylesheet" />
   <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

   <!-- JavaScript Bundle with Popper -->
   <title>SIDINI | Login</title>
   <style>
      .form-bg {
         background: linear-gradient(to bottom, #04795A, #0BD6A0);
         height: 100vh;
         display: flex;
         align-items: center;
      }

      .container {
         margin: 0 auto;
      }

      .row {
         text-align: center;
      }

      .tengah {
         margin: auto auto;
      }

      .form_horizontal {
         text-align: center;
      }

      .form_horizontal .form_icon {
         color: #fff;
         font-size: 100px;
         line-height: 85px;
         margin: 0 0 13px;
      }

      .form_horizontal .title {
         color: #fff;
         font-size: 23px;
         font-weight: 700px;
         letter-spacing: 1px;
         text-transform: uppercase;
         margin: 0 0 35px 0;
      }

      .form_horizontal .form-group {
         margin: 0 0 10px;
         position: relative;
      }

      .form_horizontal .input-icon {
         position: absolute;
         left: 13px;
         top: 55%;
         transform: translateY(-50%);
         font-size: 17px;
         color: #777;
      }

      .form_horizontal .form-control {
         color: #555;
         background-color: #fff;
         font-size: 15px;
         font-family: Arial, Helvetica, sans-serif;
         letter-spacing: 0.5px;
         height: 37px;
         padding: 2px 15px 2px 35px;
         border: none;
         border-radius: 50px;
      }

      .form_horizontal .form-control::placeholder {
         color: rgba(0, 0, 0, 0.7);
         font-size: 14px;
         font-weight: bold;
         color: grey;
      }

      .form_horizontal .btn {
         color: #fff;
         font-size: 15px;
         background-color: #222;
         font-weight: 600;
         letter-spacing: 1px;
         width: 100%;
         padding: 10px 20px;
         margin: 0 0 15px 0;
         border: none;
         border-radius: 20px;
         text-transform: uppercase;
      }

      .form-group input {
         font-size: 14px;
         font-weight: bold;
      }

      .alert-atas {
         position: absolute;
         top: 10px;
         right: 20px;
      }
   </style>
</head>

<body>
   <div class="form-bg">
      <div class="container">
         <div class="row">
            <div class="tengah col-md-4 col-sm-6">
               <form action="" method="POST" class="form_horizontal">
                  <div class="form_icon"><i class="fa fa-user-circle"></i></div>
                  <h3 class="title">SIDINI | Login</h3>
                  <div class="form-group">
                     <span class="input-icon"><i class="fa fa-user"></i></span>
                     <input type="text" class="form-control" placeholder="NPSN.." name="username" autocomplete="off">
                  </div>
                  <div class="form-group">
                     <span class="input-icon"><i class="fa fa-lock"></i></span>
                     <input type="password" class="form-control" placeholder="Password.." name="password" autocomplete="off">
                  </div>
                  <input type="submit" class="btn signin" name="submit" value="MASUK">
               </form>
               <button type="button" style="background: none;border:none;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Daftar</button>

               <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Masukkan Kode Pendaftaran</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST">
                           <div class="modal-body">
                              <div class="mb-3">
                                 <label for="recipient-name" class="col-form-label">Kode Pendaftaran:</label>
                                 <input type="text" class="form-control" id="recipient-name" autocomplete="off" name="koderegistrasi">
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                              <input type="submit" class="btn btn-primary" name="masuk" value="Submit">
                           </div>
                        </form>
                        <?php
                        // include_once("db.php");
                        if (isset($_POST["masuk"])) {
                           $koderegistrasi = htmlentities(mysqli_real_escape_string($conn, $_POST['koderegistrasi']));

                           $ambil = $conn->query("SELECT * FROM koderegistrasi WHERE koderegistrasi = '$koderegistrasi'");
                           $akunyangcocok = $ambil->num_rows;
                           if ($akunyangcocok == 1) {
                              $akun = $ambil->fetch_assoc();
                              $_SESSION["koderegistrasi"] = $akun;
                              echo "<script>window.location = 'registrasi.php'</script>";
                           } else {
                           }
                        }
                        ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php

   if (isset($_POST["submit"])) {
      $username = htmlentities(mysqli_real_escape_string($conn, $_POST['username']));
      $password = htmlentities(mysqli_real_escape_string($conn, $_POST['password']));

      if ($username != "" && $password != "") {
         $ambil = $conn->query("SELECT * FROM user WHERE npsn = '$username' AND password = '$password'");
         $ambiladmin = $conn->query("SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
         $akunyangcocok = $ambil->num_rows;
         $akunyangcocok2 = $ambiladmin->num_rows;
         if ($akunyangcocok == 1) {
            $akun = $ambil->fetch_assoc();
            $_SESSION["user"] = $akun;
            echo "<script>location='dashboard.php';</script>";
         } elseif ($akunyangcocok2 == 1) {
            $akun1 = $ambiladmin->fetch_assoc();
            $_SESSION["admin"] = $akun1;
            echo "<script>location='admin/index.php';</script>";
         } else {
   ?>

            <div class="alert alert-danger alert-dismissible alert-atas"><img src="icons/exclamation-circle-fill.svg" alt="" style="margin-bottom: 3px;"> tidak dapat login, Email atau password salah
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>

   <?php
         }
      }
   }
   ?>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
   <script src="js/scripts.js"></script>
   <script src="assets/demo/chart-area-demo.js"></script>
   <script src="assets/demo/chart-bar-demo.js"></script>
   <script src="datatables/datatable.js"></script>
   <script src="js/datatables-simple-demo.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
</body>

</html>