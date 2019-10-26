<?php
include 'lib/koneksi.php';

	$nama_lokasi = $_POST['nama_lokasi'];
	mysql_query("INSERT INTO lokasi VALUES('','$nama_lokasi')");
	header("Location: lokasi.php");
?>