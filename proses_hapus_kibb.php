<?php
include 'lib/koneksi.php';

	mysql_query("DELETE FROM kib_b WHERE id = '$_GET[id]'");
	header("Location: inventaris.php");
	exit;
?>