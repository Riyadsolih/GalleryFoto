<?php
include "koneksi.php";
session_start();

$Username = $_POST["Username"];
$Password = MD5($_POST["Password"]);

$sql=mysqli_query($koneksi, "SELECT * FROM user WHERE Username='$Username' AND Password='$Password'");
$cek=mysqli_num_rows($sql);

if($cek==1){
	while($data=mysqli_fetch_array($sql)){
		$_SESSION['UserID']=$data['UserID'];
		$_SESSION['NamaLengkap']=$data['NamaLengkap'];
		$_SESSION['Username']=$data['Username'];
		$_SESSION['role']=$data['role'];

		// Periksa peran (role) dan arahkan sesuai ke halaman yang sesuai
		if($_SESSION['role'] == 'user'){
			header('Location: beranda.php');
		}else if($_SESSION['role'] == 'admin'){
			header('Location: admin.php');
		}else{
			// Jika peran tidak sesuai, arahkan ke halaman login
			header('Location: login.php');
		}
		exit();
	}
}else{
	echo "<script>alert('Username/Password Salah!.'); document.location='login.php';</script>";
}
?>
