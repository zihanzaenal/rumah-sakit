<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <title>Jekma Hospital</title>
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

<h1>JEKMA HOSPITAL</h1> 

<br></br>

<a type="button" class="btn btn-warning" href="add.php">Add New User</a>
<a type="button" class="btn btn-success" href="tagihan.php">Pembayaran</a>
<a type="button" class="btn btn-primary" href="log_crud.php">Log Aktivitas</a>
<a type="button" class="btn btn-danger" href="logout.php">Logout</a>

<br></br>

<table style="width:60%"  class = table >
<thead class="thead-dark">

     <tr>
        <th>No ID</th>
        <th>Nama Pasien</th>
        <th>Nama Dokter</th>
        <th>Nama Penyakit</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>

   

	<?php
  session_start();
	if($_SESSION['status'] != "login"){
		header("location:login.php?pesan=belum_login");
	}

	  include('koneksi.php'); //memanggil file koneksi
		$result = mysqli_query($koneksi, "select * from pasien") or die(mysqli_error($koneksi));


		$no = 1;//untuk pengurutan nomor

		//melakukan perulangan
		while($row = mysqli_fetch_assoc($result)) {
	?>	

	<tr>
        <td><?= $row['no_id']; ?></td>
        <td><?= $row['nama_pasien'];?></td>
        <td><?= $row['nama_dokter']; ?></td>
        <td><?= $row['nama_penyakit']; ?></td>
        <td><?= $row['keterangan']; ?></td>
        <td><a type="button" class="btn btn-warning" href='edit.php?no_id=<?php echo $row['no_id'];?>'>Edit</a> <a type="button" class="btn btn-danger" href='delete.php?no_id=<?php echo $row['no_id'];?>'>Delete</a></td></tr>
	</tr>
	<?php } ?>
</table>

<a type="button" class="btn btn-success" href="excel.php">Download Data</a>

</center>
</tbody>
</body>
</html>
