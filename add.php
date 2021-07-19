<html>
<head>
	  <meta charset="UTF-8">
  <title>Add User</title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/btn.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
 
<body>
	
	<br/><br/>
 
<center>
<div class="container">  
	<form id="contact" action="add.php" method="post" name="form1" style="width:40%">
    <h3>Form Add User</h3>
    <h4><a href="index.php">Go to Home</a></h4>
    <fieldset>
      <input placeholder="Nama Pasien" type="text" name="nama_pasien" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Nama Dokter" type="text" name="nama_dokter" tabindex="2" required>
    </fieldset>
	<fieldset>
      <input placeholder="Nama Penyakit" type="text" name="nama_penyakit" tabindex="2" required>
    </fieldset>
     <!-- <fieldset>
      <input placeholder="Keterangan" type="text" name="keterangan" tabindex="2" required>
    </fieldset> -->
    <fieldset>
	<br>
	<input class="btn btn-primary"  type="submit" name="Submit" value="Add">
    </fieldset>
    
  	</form>
</div>
	
	<?php
  session_start();
	if($_SESSION['status'] != "login"){
		header("location:login.php?pesan=belum_login");
	}
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$nama_pasien = $_POST['nama_pasien'];
		// $keterangan = $_POST['keterangan'];
		$nama_dokter = $_POST['nama_dokter'];
		$nama_penyakit =  $_POST['nama_penyakit'];
		
		// include database connection file
		include_once("koneksi.php");
				
		// Insert user data into table
		$result = mysqli_query($koneksi, "INSERT INTO pasien(nama_pasien, keterangan, nama_dokter, nama_penyakit) VALUES('$nama_pasien','Dirawat','$nama_dokter', '$nama_penyakit')");
		
		// Show message when user added
		echo "User added successfully. <a href='index.php'>View Users</a>";
        header('Location: index.php');
	}
	?>
</center>
</body>
</html>