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
  <title>CUTI | admin</title>
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

    .title-top {
      font-size: 12px;
      font-weight: normal;
    }

    .data .tdx1 {
      width: 5%;
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

    .data {
      font-size: 12px;
    }

    .data th,
    .data td {
      border: 1px solid #000;
      padding: 0 1px 0 5px;
    }

    .data .table-1,
    .data .table-2,
    .data .table-3,
    .data .table-4,
    .data .table-5 {
      width: 100%;
    }

    .table-1 td {
      width: 25%;
    }

    .td-0,
    .td-1 {
      width: 10%;
    }

    .table-4 td {
      width: 15%;
    }

    .data .tdx1 {
      width: 5%;
    }

    .tb-keterangan {
      width: 30%;
    }

    .tb-keterangan-2 {
      width: 5%;
    }

    body {
      background-color: #fff;
    }
  </style>
</head>

<body class="sb-nav-fixed">

  <?php
  // Jenis Cuti
  $get_jenis_cuti = mysqli_query($conn, "SELECT * FROM jenis_cuti");
  // Pengajuan Cuti
  $id_pengajuan = $_GET['id_pengajuan'];
  $ping = mysqli_query($conn, "SELECT * FROM pengajuan LEFT JOIN pegawai USING (id_pegawai) LEFT JOIN jenis_cuti USING (id_jeniscuti) WHERE id_pengajuan = '$id_pengajuan'");
  $pk = mysqli_fetch_array($ping);
  $waktu_awal = date_create($pk['tgl_cuti']);
  $waktu_akhir = date_create($pk['tgl_berakhir']);
  $diff = date_diff($waktu_awal, $waktu_akhir);
  $diff_d = $diff->d;
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

  $tgl = $pk['tgl_cuti'];
  $pick = tgl_indo($tgl);
  $tgl_akhir = $pk['tgl_berakhir'];
  $pick_berakhir = tgl_indo($tgl_akhir);
  ?>

  <?php
  $datem = tgl_indo(date('Y-m-d'));
  $date = date('d');
  $month = date('M');
  $year = date('Y');
  $kadis = mysqli_query($conn, "SELECT * FROM kepala_dinas");
  $pkadis = mysqli_fetch_array($kadis);
  ?>
  <main>
    <table class="tb-top">
      <thead class="ttd">
        <tr>
          <td>Samarinda, <?= $datem ?></td>
        </tr>
        <tr>
          <td>Kepada</td>
        </tr>
        <tr>
          <td>Yth. Kepala Dinas Kominfo Samarinda</td>
        </tr>
        <tr>
          <td>di - </td>
        </tr>
        <tr>
          <td class="ps-5">Tempat</td>
        </tr>
      </thead>
    </table>
    <div class="text-center mt-4 mb-4" style="line-height: 5px;">
      <h6><u>PERMINTAAN DAN PEMBERIAN CUTI</u></h6>
      <p>NOMOR : 851/1183/100.17</p>
    </div>

    <div class="text-justify">
      <div class="data">
        <table class="table-1 mb-3">
          <tr>
            <th colspan="4">I. DATA PEGAWAI</th>
          </tr>
          <tr>
            <td>Nama</td>
            <td><?= $pk['nama'] ?></td>
            <td>NIP</td>
            <td><?= $pk['nip'] ?></td>
          </tr>
          <tr>
            <td>Jabatan</td>
            <td>-</td>
            <td>Gol/Ruang</td>
            <td>-</td>
          </tr>
          <tr>
            <td>Unit Kerja</td>
            <td>Dinas Kominfo Samarinda</td>
            <td>Masa Kerja</td>
            <td>-</td>
          </tr>
        </table>
        <table class="table-2 mb-3">
          <tr>
            <th colspan="2">II. JENIS CUTI YANG DIAMBIL **</th>
          </tr>
          <?php if (mysqli_num_rows($get_jenis_cuti) > 0) {
            while ($asd = mysqli_fetch_array($get_jenis_cuti)) { ?>
              <tr>
                <td><?= $asd['jenis_cuti'] ?></td>
                <td class="tdx1"></td>
              </tr>
          <?php }
          } ?>
        </table>
        <table class="table-3 mb-3">
          <tr>
            <th>III. ALASAN CUTI</th>
          </tr>
          <tr>
            <td><?= $pk['alasan_cuti'] ?></td>
          </tr>
        </table>
        <table class="table-4 mb-3">
          <tr>
            <th colspan="6">IV. LAMANYA CUTI</th>
          </tr>
          <tr>
            <td>Selama</td>
            <td><?php echo $diff_d ?> hari</td>
            <td class="text-center">Mulai Tanggal</td>
            <td><?= $pick ?></td>
            <td class="text-center">s/d</td>
            <td><?= $pick_berakhir ?></td>
          </tr>
        </table>
        <table class="table-5">
          <tr>
            <th colspan="6">V. CATATAN CUTI ***</th>
          </tr>
          <tr>
            <td colspan="3">1. CUTI TAHUNAN</td>
            <td rowspan="2" class="text-center">PARAF PETUGAS CUTI</td>
            <td>2. CUTI BESAR</td>
            <td></td>
          </tr>
          <tr>
            <th>Tahun</th>
            <th>Sisa</th>
            <th class="tb-keterangan">Keterangan</th>
            <td>3. CUTI SAKIT</td>
            <td class="tb-keterangan-2"></td>
          </tr>
          <tr>
            <td>2021</td>
            <td>6 hari</td>
            <td></td>
            <td rowspan="3"></td>
            <td>4. CUTI MELAHIRKAN</td>
            <td></td>
          </tr>
          <tr>
            <td>2022</td>
            <td>6 hari</td>
            <td></td>
            <td>5. CUTI KARENA ALASAN PENTING</td>
            <td></td>
          </tr>
          <tr>
            <td>2023</td>
            <td>3 hari</td>
            <td></td>
            <td>6. CUTI DILUAR TANGGUNG JAWAB NEGARA</td>
            <td></td>
          </tr>
        </table>
      </div>

      <div class="mt-4 ms-5 ttd">
        Samarinda, <?php echo $datem ?> <br>
        Admin, <br>
        <br><br><br>
        <u><?= $_SESSION['admin']['nama'] ?></u><br>
        Pembimbing Utama Muda / IV c <br>
        NIP. <?= $_SESSION['admin']['nip'] ?>
      </div>
    </div>
  </main>
  <script src="../js/scripts.js"></script>
  <script src="../datatables/datatable.js"></script>
  <script src="../js/datatables-simple-demo.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>