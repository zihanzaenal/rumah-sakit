<?php
// include database connection file
include_once("koneksi.php");
 
// Get id from URL to delete that user
$no_id = $_GET['no_id'];
 
// Delete user row from table based on given id
$result = mysqli_query($koneksi, "DELETE FROM pasien WHERE no_id=".$no_id);

// $result2 = mysqli_query($koneksi, "INSERT INTO log_crud(jenis_aksi, waktu) VALUES('delete','2021-07-05')");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index.php");
?>