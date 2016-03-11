<html>
	<head> 
		<title>Login Page</title>
	</head>
	<body>
		<form method="POST" action="login_prosess.php">
			<table width="60%" align="center">
				<tr>
					<td>User:</td>
					<td><input type="text" name="user"/></td>
				</tr>
				<tr>
					<td>Pass:</td>
					<td><input type="password" name="pass" onmouseover="javascript: this.type='text';" onmouseout="javascript: this.type='password';"/></td>
				</tr>
				<tr>
					<td colspan="2">
					<div style="width:500px; height:50px;">
						<img id="gambar" src="securimage/securimage_show.php?sid=<?php echo md5(time()); ?>" width="145" height="50" />
					<object width="19" height="19" id="suaranya" >
						<param name="allowScriptAccess" value="sameDomain" />
						<param name="movie" value="securimage/securimage_play.swf?audio=securimage/securimage_play.php"/>
						<embed src="securimage/securimage_play.swf?audio=securimage/securimage_play.php" width="19" height="19" type="application/x-shockwave-flash" />
					</object>
						<a href="#" onclick="javascript: document.getElementById('gambar').src='securimage/securimage_show.php?sid='+Math.random();"> refresh </a>
					</div>
					</td>
				</tr>
				<tr>
					<td>Kode</td>
					<td><input type="text" name="kode" /></td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" value="masuk!!!"/>
						<input type="reset" value="Gak wes"/>
				Misale ra duwe akun ??<br> daftar nag kene oke !! ;D, <a href="daftar.php">Sign Up with Us</a>
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>