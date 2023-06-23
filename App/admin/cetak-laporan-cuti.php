<?php
session_start();
error_reporting(0);
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
  <title>Cetak Laporan</title>
  <link rel="icon" type="image/png" href="">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/LOGO UNMUL.png" />

  <link href="../css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <style>
    #ftz16 {
      font-size: 16px;
    }

    .tb-top {
      width: 100%;
      margin: 0 auto;
    }

    .title-top {
      line-height: 1;
      text-align: center;
    }

    .title-top .logo {
      text-align: left;
    }

    .text-justify {
      text-align: justify;
      padding-right: 10px;
      padding-left: 10px;
    }

    .title-top h4,
    h3,
    h6 {
      line-height: 0.8;
    }

    .title-top h6 {
      font-size: 13px;
    }

    .title-top td {
      padding-bottom: 5px;
    }

    .title-top .a-1 {
      margin-right: 10px;
    }

    .title-top .a-2 {
      margin-left: 10px;
    }

    .tb-top {
      border-bottom: 3px solid #000;
    }

    .title-top {
      font-size: 12px;
      font-weight: normal;
    }

    .fill-1 {
      text-align: left;
      margin-left: 30px;
    }

    .fill-1 td {
      padding-right: 20px;
    }

    .ttd {
      float: right;
    }

    .tb_data {
      width: 100%;
    }

    .tb_data tr, .tb_data th, .tb_data td {
      border: 1px solid black;
      padding: 4px;
      font-size: 12px;
      text-align: center;
    }
    .tb_data .title {
      text-align: left;
    }


    body {
      background-color: #fff;
    }
  </style>
</head>

<body class="sb-nav-fixed">
  <?php
  $awal = isset($_GET['awal']);
  $akhir = isset($_GET['akhir']);
  $ping = mysqli_query($conn, "SELECT * FROM pengajuan LEFT JOIN pegawai USING(id_pegawai)");
  $pks = mysqli_fetch_array($ping);
  // $waktu_awal = date_create($pk['tgl_cuti']);
  // $waktu_akhir = date_create($pk['tgl_berakhir']);
  // $diff = date_diff($waktu_awal, $waktu_akhir);
  // $diff_d = $diff->d;
  ?>
  <?php
  function tgl_indo($tanggal)
  {
    $bulan = array(
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
  }

  $tgl = $pks['tgl_cuti'];
  $pick = tgl_indo($tgl);
  ?>

  <main>
    <table class="tb-top">
      <thead>
        <tr class="title-top">
          <th class="logo"><img src="../images/logo-pemkot.png" alt="" width="100px"></th>
          <td>
            <h4>PEMERINTAH KOTA SAMARINDA</h4>
            <h3>DINAS KOMUNIKASI DAN</h3>
            <h3>INFOMATIKA</h3>
            <h6>Jalan Kesuma Bangsa No 84. Kode Pos 75123</h6>
            <br>
            <a class="a-1" href="#">http://diskominfo.samarindakota.go.id</a>
            <a class="a-2" href="#">http://diskominfo.samarindakota.go.id</a>
          </td>
        </tr>
      </thead>
    </table>
    <div class="text-center mt-4 mb-4">
      <h5><u>LAPORAN DATA CUTI</u></h5>
      <h6>Periode</h6>
    </div>
    <div class="text-justify">
      <table class="tb_data">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Pemohon</th>
            <th>Tanggal Pengajuan</th>
            <th>Tanggal Awal</th>
            <th>Tanggal Akhir</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $ping2 = mysqli_query($conn, "SELECT * FROM pengajuan LEFT JOIN pegawai USING(id_pegawai) ORDER BY tgl_pengajuan ASC");
          if (mysqli_num_rows($ping2) > 0) {
            while ($pk = mysqli_fetch_array($ping2)) {
          ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td class="title"><?php echo $pk['nama']; ?></td>
                <td><?php echo $pk['tgl_pengajuan']; ?></td>
                <td><?php echo $pk['tgl_cuti']; ?></td>
                <td><?php echo $pk['tgl_berakhir']; ?></td>
                <td><?php echo $pk['status_cuti']; ?></td>
              </tr>
          <?php }
          } ?>
        </tbody>
      </table>
      <?php
      $datem = tgl_indo(date('Y-m-d'));
      $date = date('d');
      $month = date('M');
      $year = date('Y');
      $kadis = mysqli_query($conn, "SELECT * FROM kepala_dinas");
      $pkadis = mysqli_fetch_array($kadis);
      ?>
    </div>
  </main>
  <script src="../js/scripts.js"></script>
  <script src="../datatables/datatable.js"></script>
  <script src="../js/datatables-simple-demo.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>