<?php
include 'lib/koneksi.php';
	
	$thn_pengadaan = $_POST['thn_pengadaan'];
	$tahun = substr($thn_pengadaan,2,4);
	$nomor_label = "12.13.31.08.01.$tahun.03.19";

	mysql_query("UPDATE kib_d SET nomor_label='$nomor_label',kondisi='$_POST[kondisi]',konstruksi='$_POST[konstruksi]',panjang='$_POST[panjang]',lebar='$_POST[lebar]',luas='$_POST[luas]',tgl_dokumen='$_POST[tgl_dokumen]',no_dokumen='$_POST[no_dokumen]',status_tanah='$_POST[status_tanah]',kode_tanah='$_POST[kode_tanah]',harga='$_POST[harga]',tgl_pengadaan='$_POST[tgl_pengadaan]',lokasi='$_POST[lokasi]' WHERE id='$_POST[id]'");
	header("Location: inventaris.php");
	exit;
?>