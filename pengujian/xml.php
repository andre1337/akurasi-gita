<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbpengujian`";
if(getJum($conn,$sql)>0){
	print "<pengujian>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_pengujian=$d["id_pengujian"];
				$tgl=$d["tgl"];
				$jam=$d["jam"];
				$komentar=$d["komentar"];
			    $penilaian=$d["penilaian"];
				$keterangan=$d["keterangan"];
								
				print "<record>\n";
				print "  <tgl>$tgl</tgl>\n";
				print "  <jam>$jam</jam>\n";
				print "  <komentar>$komentar</komentar>\n";
				print "  <penilaian>$penilaian</penilaian>\n";
				print "  <keterangan>$keterangan</keterangan>\n";
				print "  <id_pengujian>$id_pengujian</id_pengujian>\n";
				print "</record>\n";
			}
	print "</pengujian>\n";
}
else{
	$null="null";
	print "<pengujian>\n";
		print "<record>\n";
				print "  <tgl>$null</tgl>\n";
				print "  <jam>$null</jam>\n";
				print "  <komentar>$null</komentar>\n";
				print "  <penilaian>$null</penilaian>\n";
				print "  <keterangan>$null</keterangan>\n";
				print "  <id_pengujian>$null</id_pengujian>\n";
		print "</record>\n";
	print "</pengujian>\n";
	}
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	
	$rs->free();
	return $arr;
}
?>
	