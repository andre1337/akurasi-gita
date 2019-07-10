<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>

<?php
require_once"../konmysqli.php";

error_reporting(0);

$query = mysqli_query($konmysqli, " SELECT tbangket.idangket, tb_kategori.id_kategori, tb_kategori.kalimat, tb_kategori.kategori, tb_angket.label, tb_angket.hasil, tb_angket.penentuan FROM `$tbkategori, `$tbangket` ");

$data = mysqli_fetch_array($query);
?>



<div class="container">
	<div class="row">
	<div class="col-sm-12"><br><div class="alert alert-info">
	</div>
	</div>
</div>

<div class ="panel-group">
	<div class="panel-body">
	<div class="table-responsive">
	<table class="table table-bordered" id="" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>ID ANGKET</th>
				<th>ID KATEGORI</th>
				<th>KOMENTAR</th>
				<th>LABEL SEBENARNYA</th>
				<th>LABEL PROBABILITAS</th>
				<th>HASIL</th>
				<th>PENENTUAN</th>
			</tr>

			<tr>
				<td><?php echo $data['idangket'] ?></td>
				<td>ID KATEGORI</td>
				<td>KOMENTAR</td>
				<td>LABEL SEBENARNYA</td>
				<td>LABEL PROBABILITAS</td>
				<td>HASIL</td>
				<td>PENENTUAN</td>
			</tr>
		</thead>
	</table>

	</div>
	</div>
</div>
