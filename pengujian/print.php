<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<h3><center>Laporan data pengujian:</h3>
 

<table width="98%" border="0">
  <tr>
    <th width="3%"><center>no</td>
    <th width="5%"><center>id_pengujian</td>
    <th width="10%"><center>tgl</td>
    <th width="10%"><center>jam</td>
    <th width="30%"><center>komentar</td>
    <th width="10%"><center>penilaian</td>
    <th width="5%"><center>keterangan</td>
  </tr>
<?php  
  $sql="select * from `$tbpengujian` order by `id_pengujian` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_pengujian=$d["id_pengujian"];
				$tgl=$d["tgl"];
				$jam=$d["jam"];
				$komentar=$d["komentar"];
				$penilaian=$d["penilaian"];
				$keterangan=$d["keterangan"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$id_pengujian</td>
				<td>$tgl</td>
				<td>$jam</td>
				<td>$komentar</td>
				<td>$penilaian</td>
				<td>$keterangan</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$id_pengujian</td>
				<td>$tgl</td>
				<td>$jam</td>
				<td>$komentar</td>
				<td>$penilaian</td>
				<td>$keterangan</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data pengujian belum tersedia...</blink></td></tr>";}
		
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

