<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbuser`";
if(getJum($conn,$sql)>0){
	print "<user>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_user=$d["id_user"];
				$nama_user=$d["nama_user"];
				$tlp_user=$d["tlp_user"];
				$email=$d["email"];
			    $username=$d["username"];
				$password=$d["password"];
												
				print "<record>\n";
				print "  <nama>$nama_user</nama>\n";
				print "  <telepon>$tlp_user</telepon>\n";
				print "  <email>$email</email>\n";
				print "  <username>$username</username>\n";
				print "  <password>$password</password>\n";
				print "  <id_user>$id_user</id_user>\n";
				print "</record>\n";
			}
	print "</user>\n";
}
else{
	$null="null";
	print "<user>\n";
		print "<record>\n";
				print "  <nama>$null</nama>\n";
				print "  <telepon>$null</telepon>\n";
				print "  <email>$null</email>\n";
				print "  <username>$null</username>\n";
				print "  <password>$null</password>\n";
				print "  <id_user>$null</id_user>\n";
		print "</record>\n";
	print "</user>\n";
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
	