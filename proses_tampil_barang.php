<?php
include 'lib/koneksi.php';

	$kode_barang = $_POST['kode_barang'];

	header("Location: barang.php?id=$kode_barang");
?>