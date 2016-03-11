<?php
include "koneksi.php";

switch($_REQUEST['aksi'])
{
	case 'tambah' :
		$id		= $_POST['txtid'];
		$nama	= $_POST['txtnama'];
		$kategori = $_POST['cbkategori'];
		$harga = $_POST['txtharga'];
		$asal_file = $FILES['filefoto']['tmp_name'];
		$tujuan_file = $_FILES['filefoto']['name'];
	if(!file_exists("foto")){
			mkdir("foto");
		}
		move_uploaded_file($asal_file, "foto/".$tujuan_file);
		$keterangan = $_POST['txtketerangan'];
		$a	= mysql_query("INSERT INTO produk VALUES('$id', '$nama', '$kategori', '$harga', '$keterangan')");
	if ($a == true){
		echo "<script>alert('Selamat, data yang di-inputkan berhasil');</script>";
	}else{
		echo "<script>alert('Maaf, data tidak ter-inputkan ');</script>";
	}
	break;
	
	case 'edit' :
		$id		= $_POST['txtid'];
		$idx	= $_POST['idx'];
		$nama	= $_POST['txtnama'];
		$kategori = $_POST['cbkategori'];
		$keterangan = $_POST['txtketerangan'];
		$a	= mysql_query("UPDATE produk SET id_produk = '$id', nama_produk = '$nama', id_kategori='$kategori', harga='$harga',  keterangan= '$keterangan' WHERE id_produk = '$idx' ");
	if ($a == true){
		echo "<script>alert('Selamat, Update Berhasil dilakukan');</script>";
	}else{
		echo "<script>alert('Maaf, gagal untuk meng-Update ');</script>";
	}
	break;
	
	case 'hapus' :
		$id		= $_GET['id'];
		$a	= mysql_query("DELETE FROM produk WHERE id_produk = '$id' ");
	if ($a == true){
		echo "<script>alert('Selamat, Hapus Berhasil dilakukan');</script>";
	}else{
		echo "<script>alert('Maaf, gagal untuk meng-Hapus ');</script>";
	}
	break;
}
?>
<meta http-equiv="refresh" content="1;url=index.php?page=produk"/>