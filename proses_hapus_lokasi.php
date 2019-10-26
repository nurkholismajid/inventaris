<?php
include 'lib/koneksi.php';

	mysql_query("DELETE FROM lokasi WHERE kode_lokasi = '$_GET[kode_lokasi]'");
	header("Location: lokasi.php");
	exit;
?>