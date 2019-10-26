<?php
include 'lib/koneksi.php';

	$id = $_POST['id'];
	$nama_barang = $_POST['nama_barang'];
	$kode_barang = $_POST['kode_barang'];
	$buku = $_POST['buku'];
	$spesifikasi = $_POST['spesifikasi'];
	$asal_daerah = $_POST['asal_daerah'];
	$lokasi = $_POST['lokasi'];
	$pencipta = $_POST['pencipta'];
	$bahan = $_POST['bahan'];
	$jenis = $_POST['jenis'];
	$ukuran = $_POST['ukuran'];
	$jumlah = $_POST['jumlah'];
	$asal = $_POST['asal'];
	$harga = $_POST['harga'];
	$ket = $_POST['ket'];
	$lokasi = $_POST['lokasi'];
	$thn_pengadaan = $_POST['thn_pengadaan'];
	$tgl_pengadaan = $_POST['tgl_pengadaan'];
	
	$tahun = substr($thn_pengadaan,2,4);
	$no_reg = 1;
	$nomor_label = "12.13.31.08.01.$tahun.03.19";
	
	$cek_kode = mysql_query("SELECT * FROM kib_e WHERE kode_barang='$kode_barang' AND no_reg='000$no_reg'");
	$cek_kode_row=mysql_num_rows($cek_kode);
	
	if($cek_kode_row==0){
		mysql_query("INSERT INTO kib_e VALUES('','$kode_barang','000$no_reg','$nama_barang','$buku','$spesifikasi','$asal_daerah','$pencipta','$bahan','$jenis','$ukuran','$jumlah','$thn_pengadaan','$asal','$harga','$ket','$lokasi','$tgl_pengadaan','$nomor_label')");
	}
	else{
		$cek_reg = mysql_query("SELECT no_reg FROM kib_e WHERE kode_barang='$kode_barang' ORDER BY no_reg DESC");
		$cek_reg_row=mysql_fetch_array($cek_reg);
		$no_reg=$cek_reg_row['no_reg']+1;
		
		mysql_query("INSERT INTO kib_e VALUES('','$kode_barang','000$no_reg','$nama_barang','$buku','$spesifikasi','$asal_daerah','$pencipta','$bahan','$jenis','$ukuran','$jumlah','$thn_pengadaan','$asal','$harga','$ket','$lokasi','$tgl_pengadaan','$nomor_label')");
	}
		
	header("Location: inventaris.php");
?>