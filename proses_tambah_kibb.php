<?php
include 'lib/koneksi.php';

	$id = $_POST['id'];
	$nama_barang = $_POST['nama_barang'];
	$kode_barang = $_POST['kode_barang'];

	$thn_pengadaan = $_POST['thn_pengadaan'];
	$type = $_POST['type'];
	$ukuran = $_POST['ukuran'];
	$bahan = $_POST['bahan'];
	$no_pabrik = $_POST['no_pabrik'];
	$no_rangka = $_POST['no_rangka'];
	$no_mesin = $_POST['no_mesin'];
	$no_polisi = $_POST['no_polisi'];
	$no_bpkb = $_POST['no_bpkb'];
	$asal = $_POST['asal'];
	$harga = $_POST['harga'];
	$ket = $_POST['ket'];
	$tgl_pengadaan = $_POST['tgl_pengadaan'];
	$lokasi = $_POST['lokasi'];
	$kondisi = $_POST['kondisi'];
	$stok = $_POST['stok'];
	$sts = $_POST['sts'];
	
	$tahun = substr($thn_pengadaan,2,4);
	$no_reg = 1;
	$nomor_label = "12.13.31.08.01.$tahun.03.19";
	
	$cek_kode = mysql_query("SELECT * FROM kib_b WHERE kode_barang='$kode_barang' AND no_reg='000$no_reg'");
	$cek_kode_row=mysql_num_rows($cek_kode);
	
	if($cek_kode_row==0){
		mysql_query("INSERT INTO kib_b VALUES('','$kode_barang','$nama_barang','000$no_reg','$nomor_label','$type','$ukuran','$bahan','$thn_pengadaan','$no_pabrik','$no_rangka','$no_mesin','$no_polisi','$no_bpkb','$asal','$harga','$ket','$tgl_pengadaan','$lokasi','$kondisi','$stok','$sts')");
	}
	else{
		$cek_reg = mysql_query("SELECT no_reg FROM kib_b WHERE kode_barang='$kode_barang' ORDER BY no_reg DESC");
		$cek_reg_row=mysql_fetch_array($cek_reg);
		$no_reg1=$cek_reg_row['no_reg'];
		$no_reg2=(int)$no_reg1;
		
		if($no_reg2<9){
			$no_reg3=$no_reg2+1;
			$no_reg4="000".$no_reg3;
		}else{
			$no_reg3=$no_reg2+1;
			$no_reg4="00".$no_reg3;
		}		
		
		mysql_query("INSERT INTO kib_b VALUES('','$kode_barang','$nama_barang','$no_reg4','$nomor_label','$type','$ukuran','$bahan','$thn_pengadaan','$no_pabrik','$no_rangka','$no_mesin','$no_polisi','$no_bpkb','$asal','$harga','$ket','$tgl_pengadaan','$lokasi','$kondisi','$stok','$sts')");
	}
		
	header("Location: inventaris.php");
?>