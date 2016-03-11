<?php
include "koneksi.php";

switch($_REQUEST['aksi'])
{
	case 'tambah' :
		$id		= $_POST['txtid'];
		$nama	= $_POST['txtnama'];
		$a	= mysql_query("INSERT INTO kategori VALUES('$id', '$nama')");
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
		$a	= mysql_query("UPDATE kategori SET id_kategori = '$id', nama_kategori = '$nama' WHERE id_kategori = '$idx' ");
	if ($a == true){
	echo "<script>alert('Selamat, Update Berhasil dilakukan');</script>";
	}else{
	echo "<script>alert('Maaf, gagal untuk meng-Update ');</script>";
	}
	break;
	
	case 'hapus' :
		$id		= $_GET['id'];
		$a	= mysql_query("DELETE FROM kategori WHERE id_kategori = '$id' ");
	if ($a == true){
	echo "<script>alert('Selamat, Hapus Berhasil dilakukan');</script>";
	}else{
	echo "<script>alert('Maaf, gagal untuk meng-Hapus ');</script>";
	}
	break;
}
?>
<meta http-equiv="refresh" content="1;url=index.php?page=kategori"/>