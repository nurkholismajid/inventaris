<?php 
include "lib/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sarpras | Inventaris</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
	<link href="assets/css/datepicker_jqui.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="assets/css/jquery.autocomplete.css" type="text/css" rel="stylesheet"/>
	<link href="assets/css/smoothness/jquery-ui-1.8.2.custom.css" rel="stylesheet" /> 

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body data-spy="scroll" data-target=".subnav" data-offset="50">


  <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="./index.html">Sarpras</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="index.php">Home</a></li>
			  <li class="active"><a href="inventaris.php">Inventaris</a></li>
			  <li><a href="barang.php?page=1">Barang</a></li>
			  <li><a href="lokasi.php">Lokasi</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
	
	<ul class="nav nav-tabs">
	  <li><a href="#kiba" data-toggle="tab">KIB A</a></li>
	  <li class="active"><a href="#kibb" data-toggle="tab">KIB B</a></li>
	  <li><a href="#kibc" data-toggle="tab">KIB C</a></li>
	  <li><a href="#kibd" data-toggle="tab">KIB D</a></li>
	  <li><a href="#kibe" data-toggle="tab">KIB E</a></li>
	  <li><a href="#kibf" data-toggle="tab">KIB F</a></li>
	  <li><a href="#kir" data-toggle="tab">KIR</a></li>
	</ul>

		  <div id="myTabContent" class="tab-content">            
			<div class="tab-pane fade" id="kiba">			  
			  <div class="span3">
			  <form action="proses_tambah_kiba.php" method="post">
				<input type="text" class="span3" id="kode1" name="kode_barang" placeholder="Kode Barang"><br/>
				<input type="text" class="span3" id="search1" name="nama_barang" placeholder="Nama Barang"><br/>
				<select class="span1" name="thn_pengadaan">
				  <?php for($i=1990;$i<=2020;$i++){?>
				  <option><?php echo $i;?></option>
				  <?php }?>
				</select>
				<input type="text" class="span3" name="tgl_pengadaan" value="02/08/2011" id="jqui1" name="tgl_pengadaan"><br>				
				<input type="text" class="span3" name="luas" placeholder="Luas"><br/>
				<textarea row="3" class="span3" name="letak" placeholder="Letak/Alamat"></textarea><br/>
				<input type="text" class="span3" name="penggunaan" placeholder="Penggunaan"><br/>
				<input type="text" class="span3" name="asal" placeholder="Asal-Usul"><br/>
				<input type="text" class="span3" name="harga" placeholder="Harga (Rp)"><br/>
				<input type="text" class="span3" name="hak" placeholder="Hak"><br/>
				<input type="text" class="span3" name="tgl" placeholder="Tanggal Sertifikat"><br/>
				<input type="text" class="span3" name="nomor" placeholder="No Sertifikat"><br/>
				<textarea row="3" class="span3" name="ket" placeholder="Keterangan"></textarea><br/>
				<button type="submit" class="btn btn-primary">Tambah</button>
			  </form>
			  </div>
			  <div class="span8">				
				<h2>Kartu Inventaris Barang (KIB) A</h2>
				<form action="proses_hapus_multia.php" method="post">
				<table class="table table-striped">
					<thead>
					  <tr>
						<th><input type="checkbox"></th>
					    <th>Kode Barang</th>
						<th>No Register</th>						
						<th>No Label</th>
						<th>Nama</th>
						<th>Tahun</th>
						<th width="40px"></th>
					  </tr>
					</thead>
					<?php 
					  $mysql1=mysql_query("SELECT * FROM kib_a ORDER BY kode_barang");
					?>
					<tbody>
					<?php 
					  while($row1=mysql_fetch_array($mysql1)){
					?>
					  <tr>
						<th><input type="checkbox" name="id[]" id="id[]" value="<?php  echo $row1['id'];?>"></th>
						<td><?php  echo $row1['kode_barang'];?></td>
						<td><?php  echo $row1['no_reg'];?></td>						
						<td><?php  echo $row1['nomor_label'];?></td>
						<td><?php  echo $row1['nama_barang'];?></td>
						<td><?php  echo $row1['thn_pengadaan'];?></td>
						<td>
						  <a href="edit_kiba.php?id=<?php  echo $row1['id'];?>" title="Edit"><i class="icon-pencil"></i></a>&nbsp;
						  <a href="proses_hapus_kiba.php?id=<?php  echo $row1['id'];?>" onclick="return confirm('Dengan mengklik OK, Anda setuju menghapus barang yang dipilih dari daftar. Apakah Anda yakin?')" title="Hapus"><i class="icon-trash"></i>
						</td>
					  </tr>
					<?php }?>
					</tbody>
				</table>
				<button type="submit" class="btn btn-primary" name="hapus" id="hapus">Hapus</button>				
				<button type="submit" class="btn btn-primary" name="cetak" id="cetak" name="cetak" id="cetak">Cetak Label</button>
				</form>				
			  </div>
            </div>
            <div class="tab-pane fade active in" id="kibb">
              <div class="span3">
			  <form action="proses_tambah_kibb.php" method="post">
				<input type="text" class="span3" id="kode2" name="kode_barang" placeholder="Kode Barang"><br/>
				<input type="text" class="span3" id="search2" name="nama_barang" placeholder="Nama Barang"><br/>
				<select class="span1" name="thn_pengadaan">
				  <?php for($i=1990;$i<=2020;$i++){?>				  
				  <?php if($i==2013){?>
					<option selected>2013</option>
				  <?php }else?>
					<option><?php echo $i;?></option>
				  <?php }?>
				</select>
				<input type="text" class="span3" name="bahan" placeholder="Bahan"><br/>
				<input type="text" class="span3" id="lokasi" name="lokasi" placeholder="Lokasi"><br/>				
				<input type="text" class="span3" name="type" placeholder="Merk"><br/>
				<input type="text" class="span3" name="ukuran" placeholder="Ukuran"><br/>
				<input type="text" class="span3" name="no_pabrik" placeholder="No Pabrik"><br/>
				<input type="text" class="span3" name="no_rangka" placeholder="No Rangka"><br/>
				<input type="text" class="span3" name="no_mesin" placeholder="No Mesin"><br/>
				<input type="text" class="span3" name="no_polisi" placeholder="No Polisi"><br/>
				<input type="text" class="span3" name="no_bpkb" placeholder="No BPKB"><br/>
				<input type="text" class="span3" name="asal" placeholder="Asal-Usul"><br/>
				<input type="text" class="span3" name="harga" placeholder="Harga (Rp)"><br/>
				<textarea row="3" class="span3" name="ket" placeholder="Keterangan"></textarea><br/>
				<select class="span1" name="kondisi">
                  <option>Baik</option>
                  <option>Tidak Baik</option>
				</select><br/>
				<button type="submit" class="btn btn-primary">Tambah</button>
			  </form>
			  </div>
			  <div class="span8">				
				<h2>Kartu Inventaris Barang (KIB) B</h2>
				<form action="proses_hapus_multib.php" method="post">
				<table class="table table-striped">
					<thead>
					  <tr>
						<th><input type="checkbox"></th>
					    <th>Kode Barang</th>
						<th>No Register</th>						
						<th>No Label</th>
						<th>Nama</th>
						<th>Tahun</th>
						<th width="40px"></th>
					  </tr>
					</thead>
					<?php 
					  $mysql2=mysql_query("SELECT * FROM kib_b ORDER BY nama_barang");
					?>
					<tbody>
					<?php 
					  while($row2=mysql_fetch_array($mysql2)){
					?>
					  <tr>
						<th><input type="checkbox" name="id[]" id="id[]" value="<?php  echo $row2['id'];?>"></th>
						<td><?php  echo $row2['kode_barang'];?></td>
						<td><?php  echo $row2['no_reg'];?></td>						
						<td><?php  echo $row2['nomor_label'];?></td>
						<td><?php  echo $row2['nama_barang'];?></td>
						<td><?php  echo $row2['thn_pengadaan'];?></td>
						<td>
						  <a href="edit_kibb.php?id=<?php  echo $row2['id'];?>" title="Edit"><i class="icon-pencil"></i></a>&nbsp;
						  <a href="proses_hapus_kibb.php?id=<?php  echo $row2['id'];?>" onclick="return confirm('Dengan mengklik OK, Anda setuju menghapus barang yang dipilih dari daftar. Apakah Anda yakin?')" title="Hapus"><i class="icon-trash"></i>
						</td>
					  </tr>
					<?php }?>
					</tbody>
				</table>
				<button type="submit" class="btn btn-primary" name="hapus" id="hapus">Hapus</button>				
				<button type="submit" class="btn btn-primary" name="cetak" id="cetak">Cetak Label</button>
				</form>	
			  </div>
            </div>
            <div class="tab-pane fade" id="kibc">
              <div class="span3">
			  <form action="proses_tambah_kibc.php" method="post">			  
				<input type="text" class="span3" id="kode3" name="kode_barang" placeholder="Kode Barang"><br/>
				<input type="text" class="span3" id="search3" name="nama_barang" placeholder="Nama Barang"><br/>
				<input type="text" class="span3" value="02/08/2011" id="jqui3" name="tgl_pengadaan"><br>
				<select class="span2"  name="kondisi" >
                  <option>Baik</option>
                  <option>Tidak Baik</option>
				</select>
				<select class="span2"  name="bertingkat" >
                  <option>Bertingkat</option>
                  <option>Bertingkat</option>
				</select>
				<select class="span2"  name="beton" >
                  <option>Beton</option>
                  <option>Beton</option>
				</select>
				<input type="text" class="span3" name="luas_lantai" placeholder="Luas Lantai"><br/>
				<input type="text" class="span3" value="02/08/2011" id="jqui4" name="tgl_dokumen"><br>
				<input type="text" class="span3" name="no_dokumen" placeholder="Nomor"><br/>
				<input type="text" class="span3" name="luas_dokumen" placeholder="Luas (m2)"><br/>
				<input type="text" class="span3" name="status_tanah" placeholder="Status Tanah"><br/>
				<input type="text" class="span3" name="kode_tanah" placeholder="Kode Tanah"><br/>
				<input type="text" class="span3" name="asal" placeholder="Asal-Usul"><br/>
				<input type="text" class="span3" name="harga" placeholder="Harga (Rp)"><br/>
				<textarea row="3" class="span3" name="ket" placeholder="Keterangan"></textarea><br/>
				<button type="submit" class="btn btn-primary">Tambah</button>
			  </form>
			  </div>
			  <div class="span8">				
				<h2>Kartu Inventaris Barang (KIB) C</h2>
				<form action="proses_hapus_multic.php" method="post">
				<table class="table table-striped">
					<thead>
					  <tr>
						<th><input type="checkbox"></th>
					    <th>Kode Barang</th>
						<th>No Register</th>						
						<th>No Label</th>
						<th>Nama</th>
						<th>Tanggal</th>
						<th width="40px"></th>
					  </tr>
					</thead>
					<?php 
					  $mysql3=mysql_query("SELECT * FROM kib_c");
					?>
					<tbody>
					<?php 
					  while($row3=mysql_fetch_array($mysql3)){
					?>
					  <tr>
						<th><input type="checkbox" name="id[]" id="id[]" value="<?php  echo $row3['id'];?>"></th>
						<td><?php  echo $row3['kode_barang'];?></td>
						<td><?php  echo $row3['no_reg'];?></td>						
						<td><?php  echo $row3['nomor_label'];?></td>
						<td><?php  echo $row3['nama_barang'];?></td>
						<td><?php  echo $row3['tgl_pengadaan'];?></td>
						<td>
						  <a href="edit_kibc.php?id=<?php  echo $row3['id'];?>" title="Edit"><i class="icon-pencil"></i></a>&nbsp;
						  <a href="proses_hapus_kibc.php?id=<?php  echo $row3['id'];?>" onclick="return confirm('Dengan mengklik OK, Anda setuju menghapus barang yang dipilih dari daftar. Apakah Anda yakin?')" title="Hapus"><i class="icon-trash"></i>
						</td>
					  </tr>
					<?php }?>
					</tbody>
				</table>
				<button type="submit" class="btn btn-primary" name="hapus" id="hapus">Hapus</button>				
				<button type="submit" class="btn btn-primary" name="cetak" id="cetak">Cetak Label</button>
				</form>	
			  </div>
            </div>
			<div class="tab-pane fade" id="kibd">
              <div class="span3">
			  <form action="proses_tambah_kibd.php" method="post">
				<input type="text" class="span3" id="kode4" name="kode_barang" placeholder="Kode Barang"><br/>
				<input type="text" class="span3" id="search4" name="nama_barang" placeholder="Nama Barang"><br/>
				<input type="text" class="span3" name="luas" placeholder="Luas"><br/>
				<input type="text" class="span3" value="02/08/2011" id="jqui5" name="tgl_pengadaan"><br>
				<select class="span2" name="kondisi">
                  <option>Baik</option>
                  <option>Tidak Baik</option>
				</select>				
				<input type="text" class="span3" name="konstruksi" placeholder="Konstruksi"><br/>
				<input type="text" class="span3" name="panjang" placeholder="Panjang (km)"><br/>
				<input type="text" class="span3" name="lebar" placeholder="Lebar (m)"><br/>
				<input type="text" class="span3" name="luas" placeholder="Luas (m2)"><br/>
				<textarea row="3" class="span3" name="letak" placeholder="Letak/Lokasi"></textarea><br/>
				<input type="text" class="span3" name="tgl_dokumen" placeholder="Tanggal Dokumen"><br/>
				<input type="text" class="span3" name="no_dokumen" placeholder="Nomor Dokumen"><br/>
				<input type="text" class="span3" name="status_tanah" placeholder="Status Tanah"><br/>
				<input type="text" class="span3" name="kode_tanah" placeholder="Kode Tanah"><br/>
				<input type="text" class="span3" name="asal" placeholder="Asul-Usul"><br/>
				<input type="text" class="span3" name="harga" placeholder="Harga (Rp)"><br/>
				<textarea row="3" class="span3" name="ket" placeholder="Keterangan"></textarea><br/>
				<button type="submit" class="btn btn-primary">Tambah</button>
			  </form>
			  </div>
			  <div class="span8">				
				<h2>Kartu Inventaris Barang (KIB) D</h2>
				<form action="proses_hapus_multid.php" method="post">
				<table class="table table-striped">
					<thead>
					  <tr>
						<th><input type="checkbox"></th>
					    <th>Kode Barang</th>
						<th>No Register</th>						
						<th>No Label</th>
						<th>Nama</th>
						<th>Tanggal</th>
						<th width="40px"></th>
					  </tr>
					</thead>
					<?php 
					  $mysql4=mysql_query("SELECT * FROM kib_d");
					?>
					<tbody>
					<?php 
					  while($row4=mysql_fetch_array($mysql4)){
					?>
					  <tr>
						<th><input type="checkbox" name="id[]" id="id[]" value="<?php  echo $row4['id'];?>"></th>
						<td><?php  echo $row4['kode_barang'];?></td>
						<td><?php  echo $row4['no_reg'];?></td>						
						<td><?php  echo $row4['nomor_label'];?></td>
						<td><?php  echo $row4['nama_barang'];?></td>
						<td><?php  echo $row4['tgl_pengadaan'];?></td>
						<td>
						  <a href="edit_kibd.php?id=<?php  echo $row4['id'];?>" title="Edit"><i class="icon-pencil"></i></a>&nbsp;
						  <a href="proses_hapus_kibd.php?id=<?php  echo $row4['id'];?>" onclick="return confirm('Dengan mengklik OK, Anda setuju menghapus barang yang dipilih dari daftar. Apakah Anda yakin?')" title="Hapus"><i class="icon-trash"></i>
						</td>
					  </tr>
					<?php }?>
					</tbody>
				</table>
				<button type="submit" class="btn btn-primary" name="hapus" id="hapus">Hapus</button>				
				<button type="submit" class="btn btn-primary" name="cetak" id="cetak">Cetak Label</button>
				</form>	
			  </div>
            </div>
            <div class="tab-pane fade" id="kibe">
              <div class="span3">
			  <form action="proses_tambah_kibe.php" method="post">
				<input type="text" class="span3" id="kode5" name="kode_barang" placeholder="Kode Barang"><br/>
				<input type="text" class="span3" id="search5" name="nama_barang" placeholder="Nama Barang"><br/>				
				<select class="span1" name="thn_pengadaan">
				  <?php for($i=1990;$i<=2020;$i++){?>
				  <option><?php echo $i;?></option>
				  <?php }?>
				</select>
				<input type="text" class="span3" name="bahan" placeholder="Bahan"><br/>				
				<input type="text" class="span3" value="02/08/2011" id="jqui6" name="tgl_pengadaan"><br>
				<input type="text" class="span3" name="buku" placeholder="Buku/Perpustakaan"><br/>
				<input type="text" class="span3" name="spesifikasi" placeholder="Spesifikasi Asli"><br/>
				<input type="text" class="span3" name="asal_daerah" placeholder="Asal Daerah"><br/>
				<input type="text" class="span3" name="pencipta" placeholder="Pencipta"><br/>
				<input type="text" class="span3" name="jenis" placeholder="Jenis"><br/>
				<input type="text" class="span3" name="ukuran" placeholder="Ukuran"><br/>
				<input type="text" class="span3" name="jumlah" placeholder="Jumlah"><br/>
				<input type="text" class="span3" name="asal" placeholder="Asal-Usul"><br/>
				<input type="text" class="span3" name="harga" placeholder="Harga (Rp)"><br/>
				<textarea row="3" class="span3" name="ket" placeholder="Keterangan"></textarea><br/>
				<button type="submit" class="btn btn-primary">Tambah</button>
			  </form>
			  </div>
			  <div class="span8">				
				<h2>Kartu Inventaris Barang (KIB) E</h2>
				<form action="proses_hapus_multie.php" method="post">
				<table class="table table-striped">
					<thead>
					  <tr>
						<th><input type="checkbox"></th>
					    <th>Kode Barang</th>
						<th>No Register</th>						
						<th>No Label</th>
						<th>Nama</th>
						<th>Tahun</th>
						<th width="40px"></th>
					  </tr>
					</thead>
					<?php 
					  $mysql5=mysql_query("SELECT * FROM kib_e");
					?>
					<tbody>
					<?php 
					  while($row5=mysql_fetch_array($mysql5)){
					?>
					  <tr>
						<th><input type="checkbox" name="id[]" id="id[]" value="<?php  echo $row5['id'];?>"></th>
						<td><?php  echo $row5['kode_barang'];?></td>
						<td><?php  echo $row5['no_reg'];?></td>						
						<td><?php  echo $row5['nomor_label'];?></td>
						<td><?php  echo $row5['nama_barang'];?></td>
						<td><?php  echo $row5['thn_pengadaan'];?></td>
						<td>
						  <a href="edit_kibe.php?id=<?php  echo $row5['id'];?>" title="Edit"><i class="icon-pencil"></i></a>&nbsp;
						  <a href="proses_hapus_kibe.php?id=<?php  echo $row5['id'];?>" onclick="return confirm('Dengan mengklik OK, Anda setuju menghapus barang yang dipilih dari daftar. Apakah Anda yakin?')" title="Hapus"><i class="icon-trash"></i>
						</td>
					  </tr>
					<?php }?>
					</tbody>
				</table>
				<button type="submit" class="btn btn-primary" name="hapus" id="hapus">Hapus</button>				
				<button type="submit" class="btn btn-primary" name="cetak" id="cetak">Cetak Label</button>
				</form>			
			  </div>
            </div>
			<div class="tab-pane fade" id="kibf">
              <div class="span3">
			  <form action="proses_tambah_kibf.php" method="post">
				<input type="text" class="span3" id="kode6" name="kode_barang" placeholder="Kode Barang"><br/>
				<input type="text" class="span3" id="search6" name="nama_barang" placeholder="Nama Barang"><br/>
				<input type="text" class="span3" value="02/08/2011" id="jqui7" name="tgl_pengadaan"><br>
				<select class="span2" name="bangunan">
                  <option>S</option>
                  <option>SP</option>
				  <option>D</option>
				</select>
				<select class="span2" name="bertingkat">
                  <option>Bertingkat</option>
                  <option>Bertingkat</option>
				</select>
				<select class="span2" name="beton">
                  <option>Beton</option>
                  <option>Beton</option>
				</select>
				<input type="text" class="span3" name="luas" placeholder="Luas (m2)"><br/>
				<textarea row="3" class="span3" name="lokasi" placeholder="Letak/Alamat"></textarea><br/>
				<input type="text" class="span3" value="02/08/2011" id="jqui8" name="tgl_dokumen"><br>
				<input type="text" class="span3" name="no_dokumen" placeholder="Nomor Dokumen"><br/>
				<input type="text" class="span3" name="status_tanah" placeholder="Status Tanah"><br/>
				<input type="text" class="span3" name="kode_tanah" placeholder="Kode Tanah"><br/>
				<input type="text" class="span3" name="asal_pembiayaan" placeholder="Asal Pembiayaan"><br/>
				<input type="text" class="span3" name="nilai_kontrak" placeholder="Nilai Kontrak (Rp)"><br/>
				<textarea row="3" class="span3" name="ket" placeholder="Keterangan"></textarea><br/>
				<button type="submit" class="btn btn-primary">Tambah</button>
			  </form>
			  </div>
			  <div class="span8">				
				<h2>Kartu Inventaris Barang (KIB) F</h2>
				<form action="proses_hapus_multif.php" method="post">
				<table class="table table-striped">
					<thead>
					  <tr>
						<th><input type="checkbox"></th>
					    <th>Kode Barang</th>
						<th>No Register</th>						
						<th>No Label</th>
						<th>Nama</th>
						<th>Tanggal</th>
						<th width="40px"></th>
					  </tr>
					</thead>
					<?php 
					  $mysql6=mysql_query("SELECT * FROM kib_f");
					?>
					<tbody>
					<?php 
					  while($row6=mysql_fetch_array($mysql6)){
					?>
					  <tr>
						<th><input type="checkbox" name="id[]" id="id[]" value="<?php  echo $row6['id'];?>"></th>
						<td><?php  echo $row6['kode_barang'];?></td>
						<td><?php  echo $row6['no_reg'];?></td>						
						<td><?php  echo $row6['nomor_label'];?></td>
						<td><?php  echo $row6['nama_barang'];?></td>
						<td><?php  echo $row6['tgl_pengadaan'];?></td>
						<td>
						  <a href="edit_kibf.php?id=<?php  echo $row6['id'];?>" title="Edit"><i class="icon-pencil"></i></a>&nbsp;
						  <a href="proses_hapus_kibf.php?id=<?php  echo $row6['id'];?>" onclick="return confirm('Dengan mengklik OK, Anda setuju menghapus barang yang dipilih dari daftar. Apakah Anda yakin?')" title="Hapus"><i class="icon-trash"></i>
						</td>
					  </tr>
					<?php }?>
					</tbody>
				</table>
				<button type="submit" class="btn btn-primary" name="hapus" id="hapus">Hapus</button>				
				<button type="submit" class="btn btn-primary" name="cetak" id="cetak">Cetak Label</button>
				</form>	
			  </div>
            </div>
            <div class="tab-pane fade" id="kir">
              <p>KIR</p>
            </div>
          </div>

     <!-- Footer
      ================================================== -->
      <footer class="footer">
	  <p class="nav pull-right">&copy; <?php echo date("Y");?> nurkholismajid. Made with <a target="_blank" href="http://getbootstrap.com">Bootstrap.</a> <a href="#">Back to top</a></p>
      </footer>

    </div><!-- /container -->



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/google-code-prettify/prettify.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
    <script src="assets/js/application.js"></script>
	<script src="assets/js/mootools-core.js" type="text/javascript"></script>
	<script src="assets/js/mootools-more.js" type="text/javascript"></script>
	<script src="assets/js/Locale.en-US.DatePicker.js" type="text/javascript"></script>
	<script src="assets/js/Picker.js" type="text/javascript"></script>
	<script src="assets/js/Picker.Attach.js" type="text/javascript"></script>
	<script src="assets/js/Picker.Date.js" type="text/javascript"></script>
	<script type="text/javascript" src="assets/js/jquery-1.4.2.min.js"></script> 
	<script type="text/javascript" src="assets/js/jquery-ui-1.8.2.custom.min.js"></script>
	
	<script>
		window.addEvent('domready', function(){
			new Picker.Date('jqui1', {
				pickerClass: 'datepicker_jqui'
			});
			new Picker.Date('jqui2', {
				pickerClass: 'datepicker_jqui'
			});
			new Picker.Date('jqui3', {
				pickerClass: 'datepicker_jqui'
			});
			new Picker.Date('jqui4', {
				pickerClass: 'datepicker_jqui'
			});
			new Picker.Date('jqui5', {
				pickerClass: 'datepicker_jqui'
			});
			new Picker.Date('jqui6', {
				pickerClass: 'datepicker_jqui'
			});
			new Picker.Date('jqui7', {
				pickerClass: 'datepicker_jqui'
			});
			new Picker.Date('jqui8', {
				pickerClass: 'datepicker_jqui'
			});
		});
		
		jQuery(document).ready(function(){
			var ac_config = {
				source: "autocomplete_barang.php",
				select: function(event, ui){
					$("#kode1").val(ui.item.kode);
					$("#kode2").val(ui.item.kode);
					$("#kode3").val(ui.item.kode);
					$("#kode4").val(ui.item.kode);
					$("#kode5").val(ui.item.kode);
					$("#kode6").val(ui.item.kode);
				},
				minLength:1
			};
			$("#search1").autocomplete(ac_config);
			$("#search2").autocomplete(ac_config);
			$("#search3").autocomplete(ac_config);
			$("#search4").autocomplete(ac_config);
			$("#search5").autocomplete(ac_config);
			$("#search6").autocomplete(ac_config);
		});
		
		jQuery(document).ready(function(){
			var ac_config = {
				source: "autocomplete_lokasi.php",
				minLength:1
			};
			$("#lokasi").autocomplete(ac_config);
		});
	</script>

  </body>
</html>
