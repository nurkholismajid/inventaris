<?php
include 'lib/koneksi.php';
	
	$thn_pengadaan = $_POST['thn_pengadaan'];
	$tahun = substr($thn_pengadaan,2,4);
	$nomor_label = "12.13.31.08.01.$tahun.03.19";

	mysql_query("UPDATE kib_e SET nomor_label='$nomor_label',buku='$_POST[buku]',spesifikasi='$_POST[spesifikasi]',asal_daerah='$_POST[asal_daerah]',pencipta='$_POST[pencipta]',bahan='$_POST[bahan]',jenis='$_POST[jenis]',ukuran='$_POST[ukuran]',jumlah='$_POST[jumlah]',harga='$_POST[harga]',ket='$_POST[ket]',tgl_pengadaan='$_POST[tgl_pengadaan]',lokasi='$_POST[lokasi]',asal='$_POST[asal]' WHERE id='$_POST[id]'");
	header("Location: inventaris.php");
	exit;
?>