<?php
// error_reporting(0);
session_start();
include('db.php');
if (!isset($_SESSION["koderegistrasi"])) {
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
   <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
   <link href="css/styles.css" rel="stylesheet" />
   <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
   <style>
      #grey {
         color: #444444;
      }

      .bgc {
         background-color: #FBFBFB;
      }

      span {
         color: red;
      }

      .bx-shadow {
         box-sizing: border-box;
         box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
         margin: auto;
      }

      .alert-atas {
         position: absolute;
         top: 0px;
         right: 0;
      }
   </style>
</head>

<body class="sb-nav-fixed bgc">
   <main>
      <div class="container-fluid px-3">
         <ol class="breadcrumb mt-2">
            <li class="breadcrumb-item active">
               <h5>Registrasi Akun</h5>
            </li>
         </ol>
         <div class="card bx-shadow col-md-8">
            <div class="card-header">
               <h5 class="mb-4 mt-4">Masukkan Data</h5>
            </div>
            <div class="card-body">
               <form class="row g-3" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                     <label for="" class="form-label-md" id="grey"><b>Nama PAUD</b></label>
                     <input type="text" class="form-control" name="nama_paud" />
                  </div>
                  <div class="col-md-6">
                     <label for="" class="form-label-md" id="grey"><b>NPSN</b><span>*</span></label>
                     <input type="text" class="form-control" name="npsn" / required>
                  </div>
                  <div class="col-md-6">
                     <label for="" class="form-label-md" id="grey"><b>No. Perijinan</b></label>
                     <input type="text" class="form-control" name="no_perijinan" />
                  </div>
                  <div class="col-md-6">
                     <label for="" class="form-label-md" id="grey"><b>Dikeluarkan Tanggal</b></label>
                     <input type="text" class="form-control" name="dikeluarkan_tanggal" />
                  </div>
                  <div class="col-md-6">
                     <label for="" class="form-label-md" id="grey"><b>Alamat</b></label>
                     <input type="text" class="form-control" name="alamat" />
                  </div>
                  <div class="col-md-6">
                     <label for="" class="form-label-md" id="grey"><b>Email/Website</b></label>
                     <input type="text" class="form-control" name="email" />
                  </div>
                  <div class="col-md-6">
                     <label for="" class="form-label-md" id="grey"><b>Akreditasi</b></label>
                     <input type="text" class="form-control" name="akreditasi" />
                  </div>
                  <div class="col-md-6">
                     <label for="" class="form-label-md" id="grey"><b>No. SK. Akreditasi</b></label>
                     <input type="text" class="form-control" name="no_sk_akreditasi" />
                  </div>
                  <div class="col-md-6">
                     <label for="" class="form-label-md" id="grey"><b>Nama Bank</b></label>
                     <input type="text" class="form-control" name="nama_bank" />
                  </div>
                  <div class="col-md-6">
                     <label for="" class="form-label-md" id="grey"><b>No Rekening</b></label>
                     <input type="text" class="form-control" name="no_rekening" />
                  </div>
                  <div class="col-md-6">
                     <label for="" class="form-label-md" id="grey"><b>Atas Nama</b></label>
                     <input type="text" class="form-control" name="atas_nama" />
                  </div>
                  <div class="col-md-6">
                     <label for="" class="form-label-md" id="grey"><b>Nama kepsek/pengelola</b></label>
                     <input type="text" class="form-control" name="pengelola" />
                  </div>
                  <div class="col-md-6">
                     <label for="" class="form-label-md" id="grey"><b>No.HP</b></label>
                     <input type="text" class="form-control" name="no_hp" />
                  </div>
                  <div class="col-md-6">
                     <label for="" class="form-label-md" id="grey"><b>Password </b><i>(terdiri huruf atau angka maksimal 20 karakter)</i></label>
                     <input type="text" class="form-control" name="password" / placeholder="contoh: paudtanjungselor01" required>
                  </div>
                  <p><b>Note:</b> Harap diingat atau disimpan nomor NPSN dan Password untuk digunakan login</p>
                  <div class="col-md-12">
                     <button type="submit" name="submit" class="btn btn-primary" style="float: right;">
                        Submit
                     </button>
                  </div>
               </form>

               <?php
               if (isset($_POST['submit'])) {
                  $nama_paud = $_POST['nama_paud'];
                  $npsn = $_POST['npsn'];
                  $no_perijinan = $_POST['no_perijinan'];
                  $dikeluarkan_tanggal = $_POST['dikeluarkan_tanggal'];
                  $alamat = $_POST['alamat'];
                  $email = $_POST['email'];
                  $akreditasi = $_POST['akreditasi'];
                  $no_sk_akreditasi = $_POST['no_sk_akreditasi'];
                  $nama_bank = $_POST['nama_bank'];
                  $no_rekening = $_POST['no_rekening'];
                  $atas_nama = $_POST['atas_nama'];
                  $pengelola = $_POST['pengelola'];
                  $no_hp = $_POST['no_hp'];
                  $password = $_POST['password'];

                  if (strlen($password) >= 6 && strlen($password) <= 20) {
                     $query = mysqli_query($conn, "SELECT * FROM user WHERE npsn='{$npsn}'");
                     if (mysqli_num_rows($query) == 0) {
                        $add = mysqli_query($conn, "INSERT INTO user VALUES(null,
                          '" . $npsn . "',
                          '" . $nama_paud . "', 
                          '" . $npsn . "',
                          '" . $no_perijinan . "',
                          '" . $dikeluarkan_tanggal . "',
                          '" . $alamat . "',
                          '" . $email . "',
                          '" . $akreditasi . "',
                          '" . $no_sk_akreditasi . "',
                          '" . $nama_bank . "',
                          '" . $no_rekening . "',
                          '" . $atas_nama . "',
                          '" . $pengelola . "',
                          '" . $no_hp . "',
                          '" . $password . "')");
                        if ($add) {
                           echo '<script>alert("data berhasil di tambahkan")</script>';
               ?>
                           <div class="alert alert-success alert-dismissible alert-atas"><img src="icons/check2-square.svg" alt=""> Pendaftaran berhasil, gunakan <br>NPSN: <b><?php echo $npsn ?></b> <br>Password: <b><?php echo $password ?></b> <br>untuk login <a href="index.php" target="_blank" class="alert-link"> Klik disini</a>
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                           </div>
                        <?php
                        } else {
                           echo 'pendaftaran gagal ' . mysqli_error($conn);
                        }
                     } else {
                        ?>
                        <div class="alert alert-danger alert-dismissible alert-atas"><img src="icons/exclamation-circle-fill.svg" style="margin-bottom: 4px;"> <span class="alert-link">Pendaftaran gagal,</span> NPSN <b><?php echo $npsn ?></b> telah terdaftar. Tidak dapat mendaftar dua kali <br> Silahkan laporkan kepada Admin
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        </div>
                     <?php
                     }
                  } else {
                     ?>
                     <div class="alert alert-danger alert-dismissible alert-atas"><img src="icons/exclamation-circle-fill.svg" style="margin-bottom: 4px;"> <span class="alert-link">Pendaftaran gagal,</span> Minimal password 6 karakter & Maksimal password 20 karakter
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                     </div>
               <?php }
               } ?>

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
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
   <script src="js/scripts.js"></script>
   <script src="assets/demo/chart-area-demo.js"></script>
   <script src="assets/demo/chart-bar-demo.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
   <script src="js/datatables-simple-demo.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
</body>

</html>