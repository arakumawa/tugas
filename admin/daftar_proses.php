<?php
include "koneksi.php";
$user 	= $_POST['user'];
$pass1	= $_POST['pass1'];
$pass2	= $_POST['pass2'];
$nama	= $_POST['nama'];
if($pass1 != $pass2) {
	echo "<script>alert('password yang diketikkan gak cocok');</script>";
	}else{
	$a = mysql_query("INSERT INTO admin (user, pass, nama) VALUES ('$user', MD5('$pass1'), '$nama') ");
		if($a == true){
		echo "<script>alert('daftar Berhasil');</script>";
		}else{
		echo "<script>alert('daftar Gagal');</script>";
		}
}
?>
<meta http-equiv="refresh" content="0;url=index.php"/>