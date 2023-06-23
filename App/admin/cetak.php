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
      padding-right: 30px;
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

    body {
      background-color: #fff;
    }
  </style>
</head>

<body class="sb-nav-fixed">
  <?php
  $id_pengajuan = $_GET['id_pengajuan'];
  $ping = mysqli_query($conn, "SELECT * FROM pengajuan LEFT JOIN pegawai USING (id_pegawai) LEFT JOIN jenis_cuti USING (id_jeniscuti) WHERE id_pengajuan = '$id_pengajuan'");
  $pk = mysqli_fetch_array($ping);
  $waktu_awal = date_create($pk['tgl_cuti']);
  $waktu_akhir = date_create($pk['tgl_berakhir']);
  $diff = date_diff($waktu_awal, $waktu_akhir);
  $diff_d = $diff->d ;
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
      <h5><u>SURAT IZIN CUTI TAHUNAN</u></h5>
      <h6>NOMOR : 851/1183/100.17</h6>
    </div>
    <div class="text-justify">
      <div class="ms-5 me-3">
        <p style="text-indent: 30px;">Diberikan <?php echo $pk['jenis_cuti'] ?> untuk Tahun 2021,2022, dan 2023 kepada Pegawai Negeri Sipil:</p>
        <table class="fill-1">
          <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?php echo $pk['nama'] ?></td>
          </tr>
          <tr>
            <td>NIP</td>
            <td>:</td>
            <td><?php echo $pk['nama'] ?></td>
          </tr>
          <tr>
            <td>Pangkat/Golongan</td>
            <td>:</td>
            <td>PNS</td>
          </tr>
          <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td>-</td>
          </tr>
          <tr>
            <td>Satuan Organisasi</td>
            <td>:</td>
            <td>-</td>
          </tr>
        </table>
      </div>
      <?php 
function tgl_indo($tanggal){
	$bulan = array (
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
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

$tgl = $pk['tgl_cuti'];
$pick = tgl_indo($tgl);
      ?>
      <div class="mt-4 ms-5">
        <p style="text-indent: 30px;">Selama <?php echo $diff_d ?> hari kerja terhitung mulai tanggal <?php echo $pick ?> dengan ketentuan sebagai berikut :
        </p>
        <ol style="margin-left:15px;">
          <li style="padding-left:10px;">Sebelum menjalankan cuti <?php echo $pk['jenis_cuti'] ?> wajib menyerahkan pekerjaannya kepada atasan langsungnya atau pejabat lain yang ditunjuk.</li>
          <li style="padding-left:10px;">Setelah berakhir jangka waktu <?php echo $pk['jenis_cuti'] ?> tersebut wajib melaporkan diri kepada atasan langsung dan bekerja kembali sebagaimana biasa.</li>
        </ol>
        <p style="text-indent: 30px;">Demikian surat izin <?php echo $pk['jenis_cuti'] ?> ini dibuat untuk dapat dipergunakan sebagainya mestinya
        </p>
      </div>
      <?php 
        $datem = tgl_indo(date('Y-m-d'));
        $date = date('d');
        $month = date('M');
        $year = date('Y');
        $kadis = mysqli_query($conn, "SELECT * FROM kepala_dinas");
        $pkadis = mysqli_fetch_array($kadis);
      ?>
      <div class="mt-4 ms-5 ttd">
        Samarinda, <?php echo $datem ?> <br>
        Kepala Dinas, <br>
        <br><br><br>
        <u><?php echo $pkadis['nama'] ?></u><br>
        Pembimbing Utama Muda / IV c <br>
        NIP. <?php echo $pkadis['nip'] ?>
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