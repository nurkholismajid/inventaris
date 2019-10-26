<?php
include 'lib/koneksi.php';

	mysql_query("DELETE FROM barang WHERE kode_barang = '$_GET[kode_barang]'");
	header("Location: barang.php");
	exit;
?>