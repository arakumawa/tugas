<?php
include "koneksi.php";
?>
<button type="button" style="margin-top:10px; display:inline-block; background-color: #ABCDEF; color: #5262BA;" onclick="javascript: $('.tambah-data').slideToggle(750);">Tambah Data</button>
<form method="POST" style="display:inline-block; " action="index.php?page=produk">
	<?php
	if(isset($_POST['txtcari'])){
		$katakunci = $_POST['txtcari'];
	}else{
		$katakunci = "";
	}
	?>
	<input type="text" name="txtcari" placeholder="Searching Data...." autocomplete="off" value="<?php echo $katakunci; ?>" onclick="this.select();"/>
	<input type="submit" style="color: #5262BA; background-color: #ABCDEF; " value="cari"/>
</form>
<div class="tambah-data" style="display:none; width:325px; height:200px; border:1px solid #123ABC; background-color: #4D5B67;">
<form method="POST" action="index.php?page=produk_proses" enctype="multipart/form-data">
	<table width="100%" style="margin-left:10px; margin-top:5px;">
		<tr>
			<td style="color:white;">ID. produk</td>
			<td><input type="text" name="txtid"/></td>
		</tr>
		<tr>
			<td style="color:white;">Nama produk</td>
			<td><input type="text" name="txtnama"/></td>
		</tr>
		<tr>
			<td style="color:white;">kategori</td>
			<td>
			 	<select name="cbkategori">
					<option value="">--Pilih Kategori--</option>
					<?php
					$kat = mysql_query("SELECT id_kategori,nama_kategori FROM kategori ORDER BY nama_kategori ASC");
					while($hasil_kat = mysql_fetch_array($kat)){
						echo "<option value='$hasil_kat[id_kategori]'>$hasil_kat[nama_kategori]</option>";
					}
					?>
				</select>
			</td>					
		</tr>
		<tr>
			<td style="color:white;">Harga</td>
			<td>Rp.<input name="txtharga" onkeyup="javascript:if(isNaN(this.value)){this.value='0'; whis.select();}"/></td>
		</tr>
		<tr>
			<td>foto</td>
			<td><textarea name="file" name="filefoto" /></td>
		</tr>
		<tr>
			<td style="color:white;">Keterangan</td>
			<td><textarea name="txtketerangan"></textarea></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Simpan" style= "background-color: #ABCDEF;"/>
				<input type="reset" value="Hapus" style="background-color: #ABCDEF;"/>
			</td>
		</tr>
	</table>
</form>
</div>
<table class="table" border="1">
	<tr class="table-header">
		<th>No.</th>
		<th>Id.produk</th>
		<th>Nama produk</th>
		<th>Kategori</th>
		<th>Harga (Rp.)</th>
		<th>Foto</th>
		<th>Harga</th>
		<th>Keterangan</th>
		<th width="10" colspan="2">Aksi</th>
	</tr>
	<?php
	//Langkah 1 : Tentukan /cari banyak total data
	$jumlah = mysql_query("SELECT * FROM produk");
	$total = mysql_num_rows($jumlah);
	
	//Langkah 2 : Tentukan Banyaknya data perhalaman yang diinginkan
	$data = 5;
	
	//Langkah 3 : cari banyaknya halaman
	$hal = ceil($total/$data);
	
	//Langkah 4 : merubah query dengan menggunakan batas/limit
	if(isset($_GET['start'])){
		$start = $_GET['start'];
	}else{
		$start = 0;
	}
	?>
	<?php
	if(isset($_POST['txtcari'])){
		$katakunci = $_POST['txtcari'];
	}else{
		$katakunci = "";
	}
	$a = mysql_query("SELECT A.id_produk, A.nama_produk, B.nama_kategori, A.harga, A.foto, A.keterangan 
	FROM produk AS A
		INNER JOIN 	kategori AS B
			ON ( A.id_kategori = B.id_kategori)
		WHERE A.id_produk LIKE '%$katakunci%' OR 
			A.nama_produk LIKE '%$katakunci%' 
		ORDER BY A.id_produk ASC LIMIT $start, $data
	");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='6' align='center'><b>Data Belum Ada</b></td></tr>";
	}else{
		$no=$start+1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td align='center'>$no.</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:lime'><i>".$katakunci."</i></b>",$b['id_produk'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>",$b['nama_produk'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:lime'><i>".$katakunci."</i></b>",$b['nama_kategori'])."</td>";
			echo "<td align='center'>Rp.".str_replace($katakunci, "<b style='color:lime'><i>".$katakunci."</i></b>",$b['harga'])."</td>";
			echo "<td align='center'><img scr='$b[foto]' width='150' /></td>";
			echo"<td>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>",$b['keterangan'])."</td>";
			echo "<td align='center'><button type='button' onclick=\"javascript:window.location.href='index.php?page=produk_edit&id=$b[id_produk]';\">Edit</button></td>";
			echo "<td align='center'><button type='button' onclick=\"javascript: if(confirm('apakah data mau dihapus ?')==true){window.location.href='index.php?page=produk_proses&id=$b[id_produk]&aksi=hapus';}\">Hapus</button></td>";
			echo "</tr>";
			$no++;
		}
	}		
	?>
</table>
<?php 
//Langkah 5 = Buat link pagingnya
echo "Total data yang ditampilkan = $total Data";
//Link untuk Prev
echo "<center>";
if($start !=0){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=produk&start=".($start-$data)."'>Prev</a>";
}

//Link untuk masing-masing halamannya
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "&nbsp;[<a href='index.php?page=produk&start=$x'>".($i+1)."</a>]";
	}
}

//Link untuk Next
if($start != $x){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=produk&start=".($start+$data)."'>Next</a>";
}
?>