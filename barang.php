<?php 
include "lib/koneksi.php";
include ('lib/paginate.php');

//$id = $_GET['id'];
//$id_baru = substr($id,0,12);

$per_page = 30;         // number of results to show per page
$result = mysql_query("SELECT * FROM barang");
$total_results = mysql_num_rows($result);
$total_pages = ceil($total_results / $per_page);//total pages we going to have

//-------------if page is setcheck------------------//
if (isset($_GET['page'])) {
    $show_page = $_GET['page'];             //it will telles the current page
    if ($show_page > 0 && $show_page <= $total_pages) {
        $start = ($show_page - 1) * $per_page;
        $end = $start + $per_page;
    } else {
        // error - show first set of results
        $start = 0;              
        $end = $per_page;
    }
} else {
    // if page isn't set, show first set of results
    $start = 0;
    $end = $per_page;
}
// display pagination
$page = intval($_GET['page']);

$tpages=$total_pages;
if ($page <= 0)
    $page = 1;
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
			  <li><a href="inventaris.php">Inventaris</a></li>
			  <li class="active"><a href="barang.php?page=1">Barang</a></li>
			  <li><a href="lokasi.php">Lokasi</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
	<div class="row-fluid">
			<div class="span3">
			  <form action="proses_tampil_barang.php" method="post">
				<input type="hidden" id="kode1" name="kode_barang">			  
				<input type="text" name="cari_barang" id="search1" placeholder="Cari Barang"><br/>
				<button type="submit" class="btn btn-primary">Cari</button>
			  </form>
			  
			  <form action="proses_tambah_barang.php" method="post">			
				<input type="text" name="grup" id="grup" placeholder="Grup"><br/>
				<input type="text" name="sub_barang" id="search" placeholder="Sub Barang"><br/>
				<input type="text" name="kode_barang" id="kode" placeholder="Kode Barang"><br/>		
				<input type="text" name="nama_barang" placeholder="Nama Barang"><br/>
				<button type="submit" class="btn btn-primary">Tambah</button>
			  </form>
			  </div>
			  <div class="span8">
			  <h2>Daftar Barang</h2>
              <?php
                    
                    // display data in table
                    echo "<table class='table table-striped'>";
                    echo "<thead><tr><th>Kode Barang</th> <th>Nama Barang</th><th width='40px'></th></tr></thead>";
                    // loop through results of database query, displaying them in the table 
                    for ($i = $start; $i < $end; $i++) {
                        // make sure that PHP doesn't try to show results that don't exist
                        if ($i == $total_results) {
                            break;
                        }
                      
                        // echo out the contents of each row into a table
                        //echo "<tr " . $cls . ">";
                        echo '<td>' . mysql_result($result, $i, 'kode_barang') . '</td>';
                        echo '<td>' . mysql_result($result, $i, 'nama_barang') . '</td>';
						echo '
						<td>
						  <i class="icon-pencil"></i>&nbsp;&nbsp;
						  <a href="proses_hapus_barang.php?kode_barang='. mysql_result($result, $i, 'kode_barang') .'" onclick="return confirm(\'Dengan mengklik OK, Anda setuju menghapus barang yang dipilih dari daftar. Apakah Anda yakin?\')" title="Hapus"><i class="icon-trash"></i>
						</td>';
                        echo "</tr>";
                    }       
                    // close table>
                echo "</table>";
				$reload = $_SERVER['PHP_SELF'] . "?tpages=" . $tpages;
                    echo '<div class="pagination"><ul>';
                    if ($total_pages > 1) {
                        echo paginate($reload, $show_page, $total_pages);
                    }
                    echo "</ul></div>";
            // pagination
            ?>
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
	<script type="text/javascript" src="assets/js/jquery-1.4.2.min.js"></script> 
	<script type="text/javascript" src="assets/js/jquery-ui-1.8.2.custom.min.js"></script> 
	
	<script>
		jQuery(document).ready(function(){
			var ac_config = {
				source: "autocomplete_barang.php",
				select: function(event, ui){
					$("#kode").val(ui.item.kode);
					$("#grup").val(ui.item.grup);
				},
				minLength:1
			};
			$("#search").autocomplete(ac_config);

			var ac_config = {
				source: "autocomplete_barang.php",
				select: function(event, ui){
					$("#kode1").val(ui.item.kode);
				},
				minLength:1
			};
			$("#search1").autocomplete(ac_config);	
		});
	</script>

  </body>
</html>
