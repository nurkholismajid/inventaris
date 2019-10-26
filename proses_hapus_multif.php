<?php
 
include "lib/koneksi.php";

if(isset($_POST['hapus'])){
	$id = $_POST['id'];
	$jml_id = count($id);
	 
	for($i = 0; $i<$jml_id;$i++)
	{
		mysql_query("DELETE FROM kib_f WHERE id='$id[$i]' ");
	}
	header("location: inventaris.php");
}

if(isset($_POST['cetak'])){
	$mysql=mysql_query("SELECT * FROM kib_f ORDER BY kode_barang");
	
	?>
	<title>Cetak Label</title>
	<body onload="window.print(); window.close();">
	<? while($row=mysql_fetch_array($mysql)){?>
		<table border="1" cellspacing="0" cellpadding="0">
			<tr>
				<td rowspan="3" height="90px"><img src="images/malang.png"></td>
				<td width="200px" height="30px"><center>SMK NEGERI 6 MALANG</center></td>
			</tr>
			<tr>
				<td height="30px"><center><? echo $row['nomor_label'];?></center></td>
			</tr>
			<tr>
				<td height="30px"><center><? echo $row['kode_barang'].".".$row['no_reg'];?></center></td>
			</tr>
		</table>
		<br/>
	<?}?>
	</body>
<?
}
?>