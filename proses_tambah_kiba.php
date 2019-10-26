<?php
include 'lib/koneksi.php';

	$id = $_POST['id'];	
	$nama_barang = $_POST['nama_barang'];
	$kode_barang = $_POST['kode_barang'];
	
	$luas = $_POST['luas'];
	$thn_pengadaan = $_POST['thn_pengadaan'];
	$letak = $_POST['letak'];
	$hak = $_POST['hak'];
	$tgl = $_POST['tgl'];
	$nomor = $_POST['nomor'];
	$penggunaan = $_POST['penggunaan'];
	$asal = $_POST['asal'];
	$harga = $_POST['harga'];
	$ket = $_POST['ket'];
	$tgl_pengadaan = $_POST['tgl_pengadaan'];
	$lokasi = $_POST['lokasi'];
	
	$tahun = substr($thn_pengadaan,2,4);
	$no_reg = 1;
	$nomor_label = "12.13.31.08.01.$tahun.03.19";
	
	$cek_kode = mysql_query("SELECT * FROM kib_a WHERE kode_barang='$kode_barang' AND no_reg='000$no_reg'");
	$cek_kode_row=mysql_num_rows($cek_kode);
	
	if($cek_kode_row==0){
		mysql_query("INSERT INTO kib_a VALUES('','$nomor_label','$nama_barang','$kode_barang','000$no_reg','$luas','$thn_pengadaan','$letak','$hak','$tgl','$nomor','$penggunaan','$asal','$harga','$ket','$tgl_pengadaan','$lokasi')");
	}
	else{
		$cek_reg = mysql_query("SELECT no_reg FROM kib_a WHERE kode_barang='$kode_barang' ORDER BY no_reg DESC");
		$cek_reg_row=mysql_fetch_array($cek_reg);
		$no_reg=$cek_reg_row['no_reg']+1;
		
		mysql_query("INSERT INTO kib_a VALUES('','$nomor_label','$nama_barang','$kode_barang','000$no_reg','$luas','$thn_pengadaan','$letak','$hak','$tgl','$nomor','$penggunaan','$asal','$harga','$ket','$tgl_pengadaan','$lokasi')");
	}
		
	header("Location: inventaris.php");
?>