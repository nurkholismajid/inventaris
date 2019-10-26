<?php
include 'lib/koneksi.php';

	mysql_query("DELETE FROM kib_f WHERE id = '$_GET[id]'");
	header("Location: inventaris.php");
	exit;
?>