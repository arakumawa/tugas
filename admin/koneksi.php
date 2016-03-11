<?php
$host = "localhost";
$user = "root";
$pass = "";
//script konek ke database
mysql_connect ($host, $user, $pass) or die (mysql_error());
//dipilih databasenya apase...
mysql_select_db("toko_online") or die (mysql_error());
?>