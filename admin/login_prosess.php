<?php
session_start();
include "koneksi.php";
include "securimage/securimage.php";
$user 	= $_POST['user'];
$pass	= $_POST['pass'];
$kode	= $_POST['kode'];
$gambar	= new Securimage();
$cocok 	= $gambar->check($kode);
if ($cocok == true){
	//jika kode yang dimasukkan dan dituliskan sama
	$a = mysql_query("SELECT user, nama FROM admin WHERE user='$user' AND pass= MD5('$pass')");
	$jumlah = mysql_num_rows($a);
	if($jumlah==0){
		echo "<script>alert('user pass salah');</script>";
		}else{
		$b = mysql_fetch_array($a);
		echo "<script>alert('Hello Bos $b[nama]');</script>";
		$_SESSION['user']	= $b['user'];
		$_SESSION['nama']	= $b['nama'];
		}
}else{
	//jika tidak sama
	echo "<script>alert('Kode gak podo bos!!');</script>";
}
?>
<meta http-equiv="refresh" content="0;url=index.php"/>