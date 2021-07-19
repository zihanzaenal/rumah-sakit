<html>
<head>	
	<title>Cek jumlah tagihan</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/btn.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<?php
// include database connection file
error_reporting(0);
include_once("koneksi.php");

// Check if form is submitted for user update, then redirect to homepage after update
$kode_bayar = $_POST['kode_bayar'];
if(isset($_POST['update']))
{	
	
  
	
 
// Fetech user data based on id
$result = mysqli_query($koneksi, "select tagihan.id_tagihan, tagihan.id_pasien, tagihan.jumlah_tagihan, tagihan.status, tagihan.tanggal_bayar, pasien.nama_pasien FROM tagihan INNER JOIN pasien ON pasien.no_id = tagihan.id_pasien WHERE tagihan.kode_bayar ='".$kode_bayar."'");
 
while($user_data = mysqli_fetch_array($result))
{   
    
	$nama_pasien = $user_data['nama_pasien'];
	$status = $user_data['status'];
	$jumlah_tagihan = $user_data['jumlah_tagihan'];

}
?>

 
<body>
<center>
<div class="container">  
  <form id="contact" style="width:40%" >
    <h3>Data Tagihan</h3>
    <h4><a href="index.php">Go to Home</a></h4>
    <fieldset>
    
      <input disabled placeholder="Nama Pasien" type="text" name="nama_pasien" value=<?php echo $nama_pasien;?> tabindex="1" required autofocus>
    </fieldset>
        <fieldset>
      <input disabled placeholder="Nama Penyakit" type="text" name="nama_penyakit" value=<?php echo $status;?> tabindex="2" required>
    </fieldset>
    <fieldset>
      <input  disabled placeholder="Keterangan" type="text" name="jumlah_tagihan" value=<?php echo $jumlah_tagihan;?> tabindex="2" required>
    </fieldset>
    <input type="hidden" name="no_id" value=<?php echo $no_id;?>>
    <fieldset>
    <br>
    <!-- <input class="btn btn-primary"  type="submit" name="update" value="Update"> -->
      
    </fieldset>

    
  </form>
</div>
	
<?php } else {
?>
<center>
<form id="contact" style="width:40%" name="cek" method="post" action="cek_bayar.php">
    <h3>Cek Data Tagihan</h3>
    <h4><a href="index.php">Data Tagihan</a></h4>
    <fieldset>
    
      <input  placeholder="kode bayar" type="text" name="kode_bayar"  tabindex="1" required autofocus>
    </fieldset>
   
    <br>
    <input class="btn btn-primary"  type="submit" name="update" value="Update">
      
    </fieldset>

    
  </form>


</center>
</body>
</html>

<?php } ?>