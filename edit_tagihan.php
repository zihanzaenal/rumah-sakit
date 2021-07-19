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
	$jumlah_terbayar=$_POST['jumlah_terbayar'];
	$jumlah_tagihan=$_POST['jumlah_tagihan'];
	if ($jumlah_terbayar == '0') {

       
		
	// update user data
	$result = mysqli_query($koneksi, "UPDATE tagihan SET jumlah_tagihan = '".$jumlah_tagihan."'   WHERE id_tagihan = ".$no_id);
    
	
	// Redirect to homepage to display updated user in list
    header("Location: tagihan.php?notif='berhasil update tagihan'");
    } else {
    
	$result = mysqli_query($koneksi, "UPDATE tagihan SET jumlah_terbayar = '".$jumlah_terbayar."', status ='lunas'  WHERE id_tagihan = ".$no_id);
    header("Location: tagihan.php?notif='berhasil update pembayaran'");

    }
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$no_id = $_GET['no_id'];
 
// Fetech user data based on id
$result = mysqli_query($koneksi, "select tagihan.id_tagihan, tagihan.id_pasien, tagihan.jumlah_tagihan, tagihan.jumlah_terbayar, tagihan.status, tagihan.tanggal_bayar, pasien.nama_pasien FROM tagihan INNER JOIN pasien ON pasien.no_id = tagihan.id_pasien WHERE tagihan.id_tagihan =$no_id");
 
while($user_data = mysqli_fetch_array($result))
{   
    
	$nama_pasien = $user_data['nama_pasien'];
	$status = $user_data['status'];
	$jumlah_tagihan = $user_data['jumlah_tagihan'];
    $jumlah_terbayar = $user_data['jumlah_terbayar'];
    
}
?>
<html>
<head>	
	<title>Edit Data Tagihan</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/btn.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
 
<body>
<center>
<div class="container">  
  <form id="contact" style="width:40%" name="update_user" method="post" action="edit_tagihan.php">
    <h3>Edit Data Tagihan</h3>
    <h4><a href="tagihan.php">Go to Tagihan</a></h4>
    <fieldset>
    
      <input disabled placeholder="Nama Pasien" type="text" name="nama_pasien" value=<?php echo $nama_pasien;?> tabindex="1" required autofocus>
    </fieldset>
        <fieldset>
      <input disabled placeholder="Status" type="text" name="status" value=<?php echo $status;?> tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Jumlah Tagihan" <?php if( $jumlah_terbayar != '0') {echo 'disabled';} ?> type="text" name="jumlah_tagihan"  value=<?php echo $jumlah_tagihan;?> tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Jumlah Terbayar" type="text" name="jumlah_terbayar"  value=<?php echo $jumlah_terbayar;?> tabindex="2" required>
    </fieldset>
    <input type="hidden" name="no_id" value=<?php echo $no_id;?>>
    <fieldset>
    <br>
    <input class="btn btn-primary"  type="submit" name="update" value="Update">
      
    </fieldset>

    
  </form>
</div>
</center>
</body>
</html>