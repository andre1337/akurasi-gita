<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbmahasiswa`";
if(getJum($conn,$sql)>0){
	print "<mahasiswa>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$kode_mahasiswa=$d["kode_mahasiswa"];
				$nama=$d["nama"];
				$telepon=$d["telepon"];
				$email=$d["email"];
			    $keterangan=$d["keterangan"];
				$status=$d["status"];
												
				print "<record>\n";
				print "  <nama>$nama</nama>\n";
				print "  <telepon>$telepon</telepon>\n";
				print "  <email>$email</email>\n";
				print "  <keterangan>$keterangan</keterangan>\n";
				print "  <status>$status</status>\n";
				print "  <kode_mahasiswa>$kode_mahasiswa</kode_mahasiswa>\n";
				print "</record>\n";
			}
	print "</mahasiswa>\n";
}
else{
	$null="null";
	print "<mahasiswa>\n";
		print "<record>\n";
				print "  <nama>$null</nama>\n";
				print "  <telepon>$null</telepon>\n";
				print "  <email>$null</email>\n";
				print "  <keterangan>$null</keterangan>\n";
				print "  <status>$null</status>\n";
				print "  <kode_mahasiswa>$null</kode_mahasiswa>\n";
		print "</record>\n";
	print "</mahasiswa>\n";
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
	