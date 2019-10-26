<?php
include 'lib/koneksi.php';

	$grup = $_POST['grup'];
	$sub_barang = $_POST['sub_barang'];
	$nama_barang = $_POST['nama_barang'];
	$kode_barang = $_POST['kode_barang'];
	
	$kode_barang1 = substr($kode_barang,0,12);
	
	$cek_kode = mysql_query("SELECT * FROM barang WHERE kode_barang LIKE '$kode_barang1%' ORDER BY kode_barang DESC");
	$cek_kode_row=mysql_fetch_array($cek_kode);
	$kode_barang2=$cek_kode_row['kode_barang'];
	$kode_barang2 = substr($kode_barang2,12,14)+1;
	
	if($kode_barang2 < 10){
		$kode_barang3 = 0;
		mysql_query("INSERT INTO barang VALUES('$grup','$kode_barang1$kode_barang3$kode_barang2','$nama_barang')");
	}
	else{
		mysql_query("INSERT INTO barang VALUES('$grup','$kode_barang1$kode_barang2','$nama_barang')");
	}	
		
	header("Location: barang.php?id=$kode_barang");
?>