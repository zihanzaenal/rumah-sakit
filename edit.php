<?php
// include database connection file
session_start();
if($_SESSION['status'] != "login"){
  header("location:login.php?pesan=belum_login");
}
include_once("koneksi.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$no_id = $_POST['no_id'];
	$nama_pasien=$_POST['nama_pasien'];
	$keterangan=$_POST['keterangan'];
	$nama_dokter=$_POST['nama_dokter'];
  $nama_penyakit=$_POST['nama_penyakit'];
		
	// update user data
	$result = mysqli_query($koneksi, "UPDATE pasien SET nama_pasien = '".$nama_pasien."', keterangan = '".$keterangan."', nama_dokter = '".$nama_dokter."', nama_penyakit = '".$nama_penyakit."' WHERE no_id = ".$no_id);
    
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$no_id = $_GET['no_id'];
 
// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM pasien WHERE no_id=$no_id");
 
while($user_data = mysqli_fetch_array($result))
{
	$name = $user_data['nama_pasien'];
	$keterangan = $user_data['keterangan'];
	$nama_dokter = $user_data['nama_dokter'];
  $nama_penyakit = $user_data['nama_penyakit'];
}
?>
<html>
<head>	
	<title>Edit User Data</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/btn.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
 
<body>
<center>
<div class="container">  
  <form id="contact" style="width:40%" name="update_user" method="post" action="edit.php">
    <h3>Edit User</h3>
    <h4><a href="index.php">Go to Home</a></h4>
    <fieldset>
      <input placeholder="Nama Pasien" type="text" name="nama_pasien" value=<?php echo $name;?> tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Nama Dokter" type="text" name="nama_dokter"  value=<?php echo $nama_dokter;?> tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Nama Penyakit" type="text" name="nama_penyakit" value=<?php echo $nama_penyakit;?> tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Keterangan" type="text" name="keterangan" value=<?php echo $keterangan;?> tabindex="2" required>
    </fieldset>
    <input type="hidden" name="no_id" value=<?php echo $_GET['no_id'];?>>
    <fieldset>
    <br>
    <input class="btn btn-primary"  type="submit" name="update" value="Update">
      
    </fieldset>

    
  </form>
</div>
</center>
</body>
</html>