<?php
include('koneksi.php');

$result = mysqli_query($koneksi, "TRUNCATE TABLE log_crud");
    
	
// Redirect to homepage to display updated user in list
header("Location: log_crud.php");

?>