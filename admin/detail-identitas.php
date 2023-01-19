<?php
include_once('../db.php');
session_start();
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
if (isset($_GET['halaman'])) {
   if ($_GET['halaman'] == "detail") {
      include 'detail-paud.php';
   }
} else {
}
?>