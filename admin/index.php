<?php session_start(); ?>
<?php
if(isset($_SESSION['user']) == false){
	header("location:login.php");
}
?>
<html>	
<head>
	<title> Toko online &trade;</title>
	<link rel="stylesheet" href="style.css"></link> 
	<script type="text/javascript" src="jquery.js"></script>
</head>
	<body>
	<div id="header">
	<p style="font-size:40px; color:magenta; margin-top:-1px;">Administrasi&reg;</p>
	</div>
	<div id="kiri">
		<div align="center" id="info-user">
		<b id="nama"><?php echo $_SESSION['nama']; ?></b>
		<a href="#" onclick="javascript: if(confirm('Apakah mau Keluar ?')==true){window.location.href='logout.php';}"><b>keluar</b></a>
		</div>
		<div id="menu">
			<h4 align="center"> Master Data </h4>
			<ul type="circle" style="color:white;">
				<li><a href="index.php?page=home"><b>Home</b></a></li>
				<li><a href="index.php?page=kategori"><b>Kategori Produk</b></a></li>
				<li><a href="index.php?page=produk"><b>Data Produk</b></a></li>
			</ul>
		</div>
	</div>
	<div id="kanan">
		<?php include "isi.php"; ?>
	</div>
	<div id="footer">
	
	
	</div>
	</body>
</html>