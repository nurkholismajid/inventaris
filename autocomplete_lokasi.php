<?php

if ( !isset($_REQUEST['term']) )
    exit;

$dblink = mysql_connect('localhost', 'root', '') or die( mysql_error() );
mysql_select_db('inventaris');

$rs = mysql_query('select * from lokasi where nama_lokasi like "%'. mysql_real_escape_string($_REQUEST['term']) .'%" order by nama_lokasi asc limit 0,10', $dblink);

$data = array();
if ( $rs && mysql_num_rows($rs) )
{
    while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
    {
        $data[] = array(
            'label' => $row['nama_lokasi'],
            'value' => $row['nama_lokasi'],

        );
    }
}

echo json_encode($data);
flush();
?>