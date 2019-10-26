<?php
include 'lib/koneksi.php';

	$id = $_POST['id'];
	$nomor_label = $_POST['nomor_label'];
	$nama_barang = $_POST['nama_barang'];
	$kode_barang = $_POST['kode_barang'];
	$no_reg = $_POST['no_reg'];
	$bangunan = $_POST['bangunan'];
	$bertingkat = $_POST['bertingkat'];
	$beton = $_POST['beton'];
	$luas = $_POST['luas'];
	$lokasi = $_POST['lokasi'];
	$tgl_dokumen = $_POST['tgl_dokumen'];
	$no_dokumen = $_POST['no_dokumen'];
	$luas_dokumen = $_POST['luas_dokumen'];
	$status_tanah = $_POST['status_tanah'];
	$kode_tanah = $_POST['kode_tanah'];
	$asal_pembiayaan = $_POST['asal_pembiayaan'];
	$nilai_kontrak = $_POST['nilai_kontrak'];
	$ket = $_POST['ket'];
	$lokasi = $_POST['lokasi'];
	$tgl_pengadaan = $_POST['tgl_pengadaan'];
	
	$tahun = substr($tgl_pengadaan,8,10);
	$no_reg = 1;
	$nomor_label = "12.13.31.08.01.$tahun.03.19";
	
	$cek_kode = mysql_query("SELECT * FROM kib_f WHERE kode_barang='$kode_barang' AND no_reg='000$no_reg'");
	$cek_kode_row=mysql_num_rows($cek_kode);
	
	if($cek_kode_row==0){
		mysql_query("INSERT INTO kib_f VALUES('','$kode_barang','000$no_reg','$nama_barang','$bangunan','$bertingkat','$beton','$luas','$lokasi','$tgl_dokumen','$no_dokumen','$tgl_pengadaan','$status_tanah','$kode_tanah','$asal_pembiayaan','$nilai_kontrak','$ket','$nomor_label')");
	}
	else{
		$cek_reg = mysql_query("SELECT no_reg FROM kib_f WHERE kode_barang='$kode_barang' ORDER BY no_reg DESC");
		$cek_reg_row=mysql_fetch_array($cek_reg);
		$no_reg=$cek_reg_row['no_reg']+1;
		
		mysql_query("INSERT INTO kib_f VALUES('','$kode_barang','000$no_reg','$nama_barang','$bangunan','$bertingkat','$beton','$luas','$lokasi','$tgl_dokumen','$no_dokumen','$tgl_pengadaan','$status_tanah','$kode_tanah','$asal_pembiayaan','$nilai_kontrak','$ket','$nomor_label')");
	}
		
	header("Location: inventaris.php");
?>