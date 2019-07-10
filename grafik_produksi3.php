<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "00f_unsadasentimen_analis";
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>
<script src="chart/jquery-1.9.1.min.js"></script>
<script src="chart/highcharts.js"></script>
<script src="chart/exporting.js"></script>
<script type="text/javascript">
	var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Data Komentar Positif dan Negatif'
			
         },
         xAxis: {
            categories: ['Komentar']
         },
         yAxis: {
            title: {
               text: 'Jumlah'
            }
         },
              series:             
            [
<?php 
           

$sql   = "SELECT * from tbkategori";
$query = mysql_query( $sql )  or die(mysql_error());         
while($ambil = mysql_fetch_array($query)){
	$jns_penyakit=$ambil['id'];
	$nm=$ambil['nama_produksi'];
	$sql_jumlah   = "SELECT * from grafik_produksi where id='$jns_penyakit'";        
	$query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
	$data=mysql_fetch_array($query_jumlah);
	$lop=$data['jumlah_produksi'];
	  
	  ?>
	  {
		  name: '<?php echo $nm; ?>',
		  data: [<?php echo $lop; ?>]
	  },
	  <?php } ?>
]
});
});	
</script>
<div id="container" style="min-width: 500px; height: 400px; margin: 0 auto"></div>

