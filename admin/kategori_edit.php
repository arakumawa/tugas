<?php
include "koneksi.php";
$id_kategori = $_GET['id'];
$a = mysql_query("SELECT id_kategori, nama_kategori FROM kategori WHERE id_kategori = '$id_kategori' ");
$hasil = mysql_fetch_array($a); 
?>
<button type="button" style="margin-top:10px;display:inline-block; background-color: #ABCDEF; color: #5262BA;" onclick="javascript: $('.tambah-data').slideToggle(750);">Tambah Data</button>
<form method="POST" style="display:inline-block; " action="index.php?page=kategori">
	<input type="text" name="txtcari" placeholder="Searching Data...."/>
	<input type="submit" style="color: #5262BA; background-color: #ABCDEF; " value="cari"/>
</form>
<div class="tambah-data" style="width:300px; height:100px; border:1px solid #123ABC; background-color: #4D5B67;">
<form method="POST" action="index.php?page=kategori_proses">
	<input type="hidden" name="aksi" value="edit"/>
	<input type="hidden" name="idx" value="<?php echo $hasil['id_kategori']?>"/>
	<table width="100%" style="margin-left:10px; margin-top:5px;">
		<tr>
			<td style="color:white;">ID. Kategori</td>
			<td><input type="text" name="txtid" value="<?php echo $hasil['id_kategori'];?>" /></td>
		</tr>
		<tr>
			<td style="color:white;">Nama Kategori</td>
			<td><input type="text" name="txtnama" value="<?php echo $hasil['nama_kategori'];?>"/></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Update" style= "background-color: #ABCDEF;"/>
				<input type="reset" value="Hapus" style="background-color: #ABCDEF;"/>
			</td>
		</tr>
	</table>
</form>
</div>
<table class="table" border="1">
	<tr class="table-header">
		<th width="">No.</th>
		<th width="">Id.Kategori</th>
		<th width="">Nama Kategori</th>
		<th width="10" colspan="2">Aksi</th>
	</tr>
	<?php 
	$a = mysql_query("SELECT id_kategori, nama_kategori FROM kategori ORDER BY id_kategori ASC");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='3' align='center'><b>Data Belum Ada</b></td></tr>";
	}else{
		$no=1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td align='center'>$no.</td>";
			echo "<td align='center'>$b[id_kategori]</td>";
			echo "<td align='center'>$b[nama_kategori]</td>";
			echo "<td align='center'><button type='button' onclick=\"javascript:window.location.href='index.php?page=kategori_edit&id=$b[id_kategori]';\">Edit</button></td>";
			echo "<td align='center'><button type='button' onclick=\"javascript: if(confirm('apakah data mau dihapus ?')==true){window.location.href='index.php?page=kategori_proses&id=$b[id_kategori]';}\">Hapus</button></td>";
			echo "</tr>";
			$no++;
		}
	}		
	?>
</table>