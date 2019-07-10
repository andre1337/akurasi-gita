<?php
$pro="simpan";
$tanggal=WKT(date("Y-m-d"));
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('mahasiswa/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
  $sql="select `kode_mahasiswa` from `$tbmahasiswa` order by `kode_mahasiswa` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="MHS".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["kode_mahasiswa"];
   
   $bul=substr($idmax,5,2);
   $tah=substr($idmax,3,2);
    if($bul==$bl && $tah==$th){
     $urut=substr($idmax,7,3)+1;
     if($urut<10){$idmax="$kd"."00".$urut;}
     else if($urut<100){$idmax="$kd"."0".$urut;}
     else{$idmax="$kd".$urut;}
    }//==
    else{
     $idmax="$kd"."001";
     }   
   }//jum>0
  else{$idmax="$kd"."001";}
  $kode_mahasiswa=$idmax;
?>

<?php
if($_GET["pro"]=="ubah"){
	$kode_mahasiswa=$_GET["kode"];
	$sql="select * from `$tbmahasiswa` where `kode_mahasiswa`='$kode_mahasiswa'";
	$d=getField($conn,$sql);
				$kode_mahasiswa=$d["kode_mahasiswa"];
				$kode_mahasiswa0=$d["kode_mahasiswa"];
				$nama=$d["nama"];
				$telepon=$d["telepon"];
				$email=$d["email"];
				$keterangan=$d["keterangan"];
				$status=$d["status"];
				$pro="ubah";		
}
?>


<form action="" method="post" enctype="multipart/form-data">
<table width="385">


<tr>
<th width="66"><label for="kode_mahasiswa">kode_mahasiswa</label>
<th width="9">:
<th colspan="2"><b><?php echo $kode_mahasiswa;?></b>
</tr>

<tr>
<td><label for="nama">nama</label>
<td>:
<td colspan="2"><input name="nama" type="text" id="nama" value="<?php echo $nama;?>" size="30" /></td>
</tr>

<tr>
<td height="24"><label for="telepon">telepon</label>
<td>:<td colspan="2"><input name="telepon" type="text" id="telepon" value="<?php echo $telepon;?>" size="15" />
</td>
</tr>

<tr>
<td height="24"><label for="email">email</label>
<td>:
<td><input name="email" type="text" id="email" value="<?php echo $email;?>" size="30" />
  <label for="kode_barang"></label></td>
</tr>

<tr>
<td height="24"><label for="keterangan">keterangan</label>
<td>:<td colspan="2"><input name="keterangan" type="text" id="keterangan" value="<?php echo $keterangan;?>" size="25" />
</td>
</tr>

<tr>
<td><label for="status">status</label>
<td>:<td colspan="2"><input name="status" type="text" id="status" value="<?php echo $status;?>" size="15" /></td></tr>

<tr>
<td>
<td>
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="kode_mahasiswa" type="hidden" id="kode_mahasiswa" value="<?php echo $kode_mahasiswa;?>" />
        <input name="kode_mahasiswa0" type="hidden" id="kode_mahasiswa0" value="<?php echo $kode_mahasiswa0;?>" />
        <a href="?mnu=mahasiswa"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

Data mahasiswa: 
| <a href="mahasiswa/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="mahasiswa/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <a href="mahasiswa/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table width="100%" border="0">
  <tr bgcolor="#036">
    <th width="3%"><center>no</th>
    <th width="10%"><center>kode</th>
    <th width="20%"><center>nama</th>
    <th width="10%"><center>telepon</th>
    <th width="30%"><center>email</th>
    <th width="15%"><center>keterangan</th>
    <th width="10%"><center>Status</th>
    <th width="10%"><center>menu</th>
  </tr>
<?php  
  $sql="select * from `$tbmahasiswa` order by `kode_mahasiswa` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	//--------------------------------------------------------------------------------------------
	$batas   = 2;
	$page = $_GET['page'];
	if(empty($page)){$posawal  = 0;$page = 1;}
	else{$posawal = ($page-1) * $batas;}
	
	$sql2 = $sql." LIMIT $posawal,$batas";
	$no = $posawal+1;
	//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {							
				$kode_mahasiswa=$d["kode_mahasiswa"];
				$nama=$d["nama"];
				$telepon=$d["telepon"];
				$email=$d["email"];
				$keterangan=$d["keterangan"];
				$status=$d["status"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$kode_mahasiswa</td>
				<td>$nama</td>
				<td>$telepon</td>
				<td>$email</td>
				<td>$keterangan</td>
				<td align='center'>$status</td>
				<td align='center'>
<a href='?mnu=mahasiswa&pro=ubah&kode=$kode_mahasiswa'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=mahasiswa&pro=hapus&kode=$kode_mahasiswa'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama pada data mahasiswa ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data mahasiswa belum tersedia...</blink></td></tr>";}
?>
</table>

<?php
//Langkah 3: Hitung total data dan page 
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=mahasiswa'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=mahasiswa'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=mahasiswa'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total Data <b>$jmldata</b> Item</p>";
?>

<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$kode_mahasiswa=strip_tags($_POST["kode_mahasiswa"]);
	$kode_mahasiswa0=strip_tags($_POST["kode_mahasiswa0"]);
	$nama=strip_tags($_POST["nama"]);
	$telepon=strip_tags($_POST["telepon"]);
	$email=strip_tags($_POST["email"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	$status=strip_tags($_POST["status"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbmahasiswa` (
`kode_mahasiswa` ,
`nama` ,
`telepon` ,
`email` ,
`keterangan` ,
`status` 
) VALUES (
'$kode_mahasiswa', 
'$nama', 
'$telepon',
'$email',
'$keterangan',
'$status'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $kode_mahasiswa berhasil disimpan !');document.location.href='?mnu=mahasiswa';</script>";}
		else{echo"<script>alert('Data $kode_mahasiswa gagal disimpan...');document.location.href='?mnu=mahasiswa';</script>";}
	}
	else{
$sql="update `$tbmahasiswa` set 
`nama`='$nama',
`telepon`='$telepon' ,
`email`='$email',
`status`='$status',
`keterangan`='$keterangan' 
where `kode_mahasiswa`='$kode_mahasiswa0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $kode_mahasiswa berhasil diubah !');document.location.href='?mnu=mahasiswa';</script>";}
	else{echo"<script>alert('Data $kode_mahasiswa gagal diubah...');document.location.href='?mnu=mahasiswa';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$kode_mahasiswa=$_GET["kode"];
$sql="delete from `$tbmahasiswa` where `kode_mahasiswa`='$kode_mahasiswa'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data mahasiswa $kode_mahasiswa berhasil dihapus !');document.location.href='?mnu=mahasiswa';</script>";}
else{echo"<script>alert('Data mahasiswa $kode_mahasiswa gagal dihapus...');document.location.href='?mnu=mahasiswa';</script>";}
}
?>

