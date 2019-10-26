<?php
include 'lib/koneksi.php';

	$id = $_POST['id'];
	$nama_barang = $_POST['nama_barang'];
	$kode_barang = $_POST['kode_barang'];
	$konstruksi = $_POST['konstruksi'];
	$panjang = $_POST['panjang'];
	$lebar = $_POST['lebar'];
	$luas = $_POST['luas'];
	$tgl_dokumen = $_POST['tgl_dokumen'];
	$no_dokumen = $_POST['no_dokumen'];
	$status_tanah = $_POST['status_tanah'];
	$kode_tanah = $_POST['kode_tanah'];
	$asal = $_POST['asal'];
	$harga = $_POST['harga'];
	$ket = $_POST['ket'];
	$lokasi = $_POST['lokasi'];
	$kondisi = $_POST['kondisi'];
	$tgl_pengadaan = $_POST['tgl_pengadaan'];
	
	$tahun = substr($tgl_pengadaan,8,10);
	$no_reg = 1;
	$nomor_label = "12.13.31.08.01.$tahun.03.19";
	
	$cek_kode = mysql_query("SELECT * FROM kib_d WHERE kode_barang='$kode_barang' AND no_reg='000$no_reg'");
	$cek_kode_row=mysql_num_rows($cek_kode);
	
	if($cek_kode_row==0){
		mysql_query("INSERT INTO kib_d VALUES('','$kode_barang','000$no_reg','$nama_barang','$kondisi','$konstruksi','$panjang','$lebar','$luas','$tgl_dokumen','$no_dokumen','$status_tanah','$kode_tanah','$asal','$harga','$ket','$tgl_pengadaan','$nomor_label','$lokasi')");
	}
	else{
		$cek_reg = mysql_query("SELECT no_reg FROM kib_d WHERE kode_barang='$kode_barang' ORDER BY no_reg DESC");
		$cek_reg_row=mysql_fetch_array($cek_reg);
		$no_reg=$cek_reg_row['no_reg']+1;
		
		mysql_query("INSERT INTO kib_d VALUES('','$kode_barang','000$no_reg','$nama_barang','$kondisi','$konstruksi','$panjang','$lebar','$luas','$tgl_dokumen','$no_dokumen','$status_tanah','$kode_tanah','$asal','$harga','$ket','$tgl_pengadaan','$nomor_label','$lokasi')");
	}
		
	header("Location: inventaris.php");
?>