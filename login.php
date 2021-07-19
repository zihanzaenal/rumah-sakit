<?php

session_start();
// include database connection file
include_once("koneksi.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['login']))
{	
	include 'koneksi.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);    
    $data = mysqli_query($koneksi,"select * from users where username='$username' and password='$password' or  email ='$username' and password='$password'   ");
    $cek = mysqli_num_rows($data);
 
    if($cek > 0){
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("location:index.php");
    }else{
        header("location:login.php?pesan=gagal");
    }

}
?>

<html lang="en"><head>
<title>Rumah Sakit</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="./css/favicon.ico">

<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v8/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v8/vendor/animate/animate.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v8/vendor/css-hamburgers/hamburgers.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v8/vendor/animsition/css/animsition.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v8/vendor/select2/select2.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v8/vendor/daterangepicker/daterangepicker.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v8/css/util.css">
<link rel="stylesheet" type="text/css" href="./css/main.css">

<meta name="robots" content="noindex, follow">
</head>
<body>
<div class="limiter">
<div class="container-login100">
<div class="wrap-login100">
<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="post" action="login.php">
<span class="login100-form-title">
Masuk
</br>
<h5> <?php 
if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "gagal"){
        echo "Login gagal! username dan password salah!";
    }else if($_GET['pesan'] == "logout"){
        echo "Anda telah berhasil logout";
    }else if($_GET['pesan'] == "belum_login"){
        echo "Anda harus login untuk mengakses halaman admin";
    }
} ?></h5>
</span>

<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
<input class="input100" type="text" name="username" placeholder="Username / Email">
<span class="focus-input100"></span>
</div>
<div class="wrap-input100 validate-input" data-validate="Please enter password">
<input class="input100" type="password" name="password" placeholder="Password">
<span class="focus-input100"></span>
</div>
<div class="text-right p-t-13 p-b-23">
<!-- <span class="txt1">
Forgot
</span>
<a href="#" class="txt2">
Username / Password?
</a> -->
</div>
<div class="container-login100-form-btn">
<button class="login100-form-btn"  type="submit" name="login" value="login">
Masuk
</button>
</div>
<div class="flex-col-c p-t-170 p-b-40">
<span class="txt1 p-b-9">
Tidak Punya Akun?
</span>
<a href="regis.php" class="txt3">
Daftar Sekarang
</a> <a href="cek_bayar.php" class="txt3">
Cek bayar
</a>
</div>
</form>
</div>
</div>
</div>

<script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script><script src="vendor/jquery/jquery-3.2.1.min.js"></script>

<script src="https://colorlib.com/etc/lf/Login_v8/vendor/animsition/js/animsition.min.js"></script>

<script src="https://colorlib.com/etc/lf/Login_v8/vendor/bootstrap/js/popper.js"></script>
<script src="https://colorlib.com/etc/lf/Login_v8/vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="https://colorlib.com/etc/lf/Login_v8/vendor/select2/select2.min.js"></script>

<script src="https://colorlib.com/etc/lf/Login_v8/vendor/daterangepicker/moment.min.js"></script>
<script src="https://colorlib.com/etc/lf/Login_v8/vendor/daterangepicker/daterangepicker.js"></script>

<script src="https://colorlib.com/etc/lf/Login_v8/vendor/countdowntime/countdowntime.js"></script>

<script src="https://colorlib.com/etc/lf/Login_v8/js/main.js"></script>

<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
<script defer="" src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon="{&quot;rayId&quot;:&quot;6696ecee6e8a1a88&quot;,&quot;token&quot;:&quot;cd0b4b3a733644fc843ef0b185f98241&quot;,&quot;version&quot;:&quot;2021.6.0&quot;,&quot;si&quot;:10}"></script>


</body></html>