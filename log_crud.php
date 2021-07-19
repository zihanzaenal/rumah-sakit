<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <title>Riwayat</title>
    <style>

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}


</style>
</head> 
<body>
<tbody>
<center>
<br></br>
<h1>RIWAYAT</h1> 
<br>
<a type="button" class="btn btn-primary" href="index.php">Go to Home</a>
<a type="button" class="btn btn-danger" href="log_delete.php">Delete</a>
<br></br>
<table style="width:30%"  class = "table" >
<thead class="thead-dark">

     <tr>
        <th>Jenis Aksi</th>
        <th>Tanggal</th>
        <th>Id Pasien</th>
    </tr>
<!-- </thead> -->

<?php

session_start();
if($_SESSION['status'] != "login"){
	header("location:login.php?pesan=belum_login");
}

include('koneksi.php');

$result = mysqli_query($koneksi, "select * from log_crud") or die(mysqli_error($koneksi));

while($row = mysqli_fetch_assoc($result)) {
?>

<tr>
    <td><?= $row['jenis_aksi']; ?></td>
    <td><?= $row['waktu'];?></td>
    <td><?= $row['kolom'];?></td>
</tr>
<?php } ?>
</table>
</center>
</tbody>
</body>
</html>