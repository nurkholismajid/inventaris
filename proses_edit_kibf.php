<?php
include 'lib/koneksi.php';
	
	$thn_pengadaan = $_POST['thn_pengadaan'];
	$tahun = substr($thn_pengadaan,2,4);
	$nomor_label = "12.13.31.08.01.$tahun.03.19";

	mysql_query("UPDATE kib_f SET nomor_label='$nomor_label',bangunan='$_POST[bangunan]',bertingkat='$_POST[bertingkat]',beton='$_POST[beton]',luas='$_POST[luas]',lokasi='$_POST[lokasi]',tgl_dokumen='$_POST[tgl_dokumen]',no_dokumen='$_POST[no_dokumen]',tgl_pengadaan='$_POST[tgl_pengadaan]',status_tanah='$_POST[status_tanah]',kode_tanah='$_POST[kode_tanah]',asal_pembiayaan='$_POST[asal_pembiayaan]',nilai_kontrak='$_POST[nilai_kontrak]',ket='$_POST[ket]' WHERE id='$_POST[id]'");
	header("Location: inventaris.php");
	exit;
?>