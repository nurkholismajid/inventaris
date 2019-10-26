<?php
include 'lib/koneksi.php';
	
	$thn_pengadaan = $_POST['thn_pengadaan'];
	$tahun = substr($thn_pengadaan,2,4);
	$nomor_label = "12.13.31.08.01.$tahun.03.19";

	mysql_query("UPDATE kib_c SET nomor_label='$nomor_label',kondisi='$_POST[kondisi]',bertingkat='$_POST[bertingkat]',beton='$_POST[beton]',luas_lantai='$_POST[luas_lantai]',lokasi='$_POST[lokasi]',tgl_dokumen='$_POST[tgl_dokumen]',no_dokumen='$_POST[no_dokumen]',luas_dokumen='$_POST[luas_dokumen]',status_tanah='$_POST[status_tanah]',kode_tanah='$_POST[kode_tanah]',asal='$_POST[asal]',harga='$_POST[harga]',ket='$_POST[ket]' WHERE id='$_POST[id]'");
	header("Location: inventaris.php");
	exit;
?>