<?php
include 'lib/koneksi.php';
	
	$thn_pengadaan = $_POST['thn_pengadaan'];
	$tahun = substr($thn_pengadaan,2,4);
	$nomor_label = "12.13.31.08.01.$tahun.03.19";

	mysql_query("UPDATE kib_a SET nomor_label='$nomor_label',luas='$_POST[luas]',thn_pengadaan='$_POST[thn_pengadaan]',letak='$_POST[letak]',hak='$_POST[hak]',tgl='$_POST[tgl]',nomor='$_POST[nomor]',penggunaan='$_POST[penggunaan]',asal='$_POST[asal]',harga='$_POST[harga]',ket='$_POST[ket]',tgl_pengadaan='$_POST[tgl_pengadaan]',lokasi='$_POST[lokasi]' WHERE id='$_POST[id]'");
	header("Location: inventaris.php");
	exit;
?>