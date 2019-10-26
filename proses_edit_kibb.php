<?php
include 'lib/koneksi.php';
	
	$thn_pengadaan = $_POST['thn_pengadaan'];
	$tahun = substr($thn_pengadaan,2,4);
	$nomor_label = "12.13.31.08.01.$tahun.03.19";

	mysql_query("UPDATE kib_b SET nomor_label='$nomor_label',bahan='$_POST[bahan]',thn_pengadaan='$_POST[thn_pengadaan]',lokasi='$_POST[lokasi]',ukuran='$_POST[ukuran]',type='$_POST[type]',no_pabrik='$_POST[no_pabrik]',no_rangka='$_POST[no_rangka]',no_mesin='$_POST[no_mesin]',no_polisi='$_POST[no_polisi]',ket='$_POST[ket]',no_bpkb='$_POST[no_bpkb]',asal='$_POST[asal]',harga='$_POST[harga]' WHERE id='$_POST[id]'");
	header("Location: inventaris.php");
	exit;
?>