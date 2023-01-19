<?php
include_once('../db.php');
session_start();
if (!isset($_SESSION["admin"])) {
   echo "<script>location='../index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SIDINI</title>
</head>

<body>

</body>

</html>
<?php
if (isset($_GET['page'])) {
   if ($_GET['page'] == "dot") {
      include 'laporan-paud.php';
   }
} else {
}
?>