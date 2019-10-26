<?
include "lib/koneksi.php";
include ('lib/paginate.php');

$per_page = 30;         // number of results to show per page
$result = mysql_query("SELECT * FROM lokasi ORDER BY kode_lokasi");
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
			  <li><a href="barang.php">Barang</a></li>
			  <li class="active"><a href="lokasi.php">Lokasi</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
	<div class="row-fluid">
			<div class="span3">
			  <form action="proses_tambah_lokasi.php" method="post">			
				<input type="text" name="nama_lokasi" placeholder="Nama Lokasi"><br/>
				<button type="submit" class="btn btn-primary">Tambah</button>
			  </form>
			  </div>
			  <div class="span8">
			  <h2>Daftar Lokasi</h2>
              <?php
                    
                    // display data in table
                    echo "<table class='table table-striped'>";
                    echo "<thead><tr><th width='50px'>Kode</th> <th>Nama</th><th width='40px'></th></tr></thead>";
                    // loop through results of database query, displaying them in the table 
                    for ($i = $start; $i < $end; $i++) {
                        // make sure that PHP doesn't try to show results that don't exist
                        if ($i == $total_results) {
                            break;
                        }
                      
                        // echo out the contents of each row into a table
                        echo "<tr " . $cls . ">";
                        echo '<td>' . mysql_result($result, $i, 'kode_lokasi') . '</td>';
                        echo '<td>' . mysql_result($result, $i, 'nama_lokasi') . '</td>';
						echo '
						<td>
						  <i class="icon-pencil"></i>&nbsp;&nbsp;
						  <a href="proses_hapus_lokasi.php?kode_lokasi='. mysql_result($result, $i, 'kode_lokasi') .'" onclick="return confirm(\'Dengan mengklik OK, Anda setuju menghapus barang yang dipilih dari daftar. Apakah Anda yakin?\')" title="Hapus"><i class="icon-trash"></i>
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
	  <p class="nav pull-right">&copy; 2013 <a target="_blank" href="https://twitter.com/apikhost">@apikhost</a>. Made with <a target="_blank" href="http://getbootstrap.com">Bootstrap.</a> <a href="#">Back to top</a></p>
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
				source: "autocomplete.php",
				select: function(event, ui){
					$("#kode").val(ui.item.kode);
					$("#grup").val(ui.item.grup);
				},
				minLength:1
			};
			$("#search").autocomplete(ac_config);
		});
	</script>

  </body>
</html>
