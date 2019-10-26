<?php

if ( !isset($_REQUEST['term']) )
    exit;

$dblink = mysql_connect('localhost', 'root', '') or die( mysql_error() );
mysql_select_db('inventaris');

$rs = mysql_query('select * from barang where nama_barang like "'. mysql_real_escape_string($_REQUEST['term']) .'%" order by kode_barang asc limit 0,10', $dblink);

$data = array();
if ( $rs && mysql_num_rows($rs) )
{
    while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
    {
        $data[] = array(
            'label' => $row['nama_barang'] .', '. $row['kode_barang'] ,
            'value' => $row['nama_barang'],
			'kode' => $row['kode_barang'],
			'grup' => $row['grup']
        );
    }
}

echo json_encode($data);
flush();

