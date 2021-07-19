<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <title>Pembayaran</title>
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

<h1>PEMBAYARAN</h1> 

<br></br>

<a type="button" class="btn btn-primary" href="index.php">Go To Home</a>
<a type="button" class="btn btn-danger" href="logout.php">Logout</a>

<br></br>

<table style="width:65%"  class = table >
<thead class="thead-dark">

     <tr>
        <th>No ID</th>
        <th>Nama Pasien</th>
        <th>Jumlah Tagihan</th>
        <th>Jumlah Terbayar</th>
        <th>Status</th>
        <th>Kode Bayar</th>
        <th>Tanggal Bayar</th>
        <th>Aksi</th>
    </tr>

   

	<?php
  session_start();
	if($_SESSION['status'] != "login"){
		header("location:login.php?pesan=belum_login");
	}

	  include('koneksi.php'); //memanggil file koneksi
		$result = mysqli_query($koneksi, "select tagihan.id_tagihan, tagihan.id_pasien,tagihan.kode_bayar, tagihan.jumlah_tagihan, tagihan.jumlah_terbayar, tagihan.status, tagihan.tanggal_bayar, pasien.nama_pasien FROM tagihan INNER JOIN pasien ON pasien.no_id = tagihan.id_pasien") or die(mysqli_error($koneksi));


		$no = 1;//untuk pengurutan nomor

		//melakukan perulangan
		while($row = mysqli_fetch_assoc($result)) {
	?>	

	<tr>
        <td><?= $row['id_tagihan']; ?></td>
        <td><?= $row['nama_pasien'];?></td>
        <td><?= $row['jumlah_tagihan']; ?></td>
        <td><?= $row['jumlah_terbayar']; ?></td>
        <td><?= $row['status']; ?></td>
        <td><?= $row['kode_bayar']; ?></td>
        <td><?= $row['tanggal_bayar']; ?></td>
        <td><a type="button" class="btn btn-warning" href='edit_tagihan.php?no_id=<?php echo $row['id_tagihan'];?>'>Edit</a></td></tr>
	</tr>
	<?php } ?>
</table>

<a type="button" class="btn btn-success" href="excel.php">Download Data</a>

</center>
</tbody>
</body>
</html>
