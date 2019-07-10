<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<h3><center>Laporan data mahasiswa:</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>no</td>
    <th width="10%"><center>kode_mahasiswa</td>
    <th width="25%"><center>nama</td>
    <th width="25%"><center>telepon</td>
    <th width="20%"><center>email</td>
    <th width="10%"><center>keterangan</td>
    <th width="5%"><center>status</td>
  </tr>
<?php  
  $sql="select * from `$tbmahasiswa` order by `kode_mahasiswa` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$kode_mahasiswa=$d["kode_mahasiswa"];
				$nama=$d["nama"];
				$telepon=$d["telepon"];
				$email=$d["email"];
				$keterangan=$d["keterangan"];
				$status=$d["status"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$kode_mahasiswa</td>
				<td>$nama</td>
				<td>$telepon</td>
				<td>$email</td>
				<td>$keterangan</td>
				<td>$status</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$kode_mahasiswa</td>
				<td>$nama</td>
				<td>$telepon</td>
				<td>$email</td>
				<td>$keterangan</td>
				<td>$status</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data mahasiswa belum tersedia...</blink></td></tr>";}
		
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

</table>

