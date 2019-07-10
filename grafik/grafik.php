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
win=window.open('pengujian/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
  $sql="select `id_pengujian` from `$tbpengujian` order by `id_pengujian` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="MHS".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_pengujian"];
   
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
  $id_pengujian=$idmax;
?>

<?php
if($_GET["pro"]=="ubah"){
	$id_pengujian=$_GET["kode"];
	$sql="select * from `$tbpengujian` where `id_pengujian`='$id_pengujian'";
	$d=getField($conn,$sql);
				$id_pengujian=$d["id_pengujian"];
				$id_pengujian0=$d["id_pengujian"];
				$tgl=$d["tgl"];
				$jam=$d["jam"];
				$komentar=$d["komentar"];
				$penilaian=$d["penilaian"];
				$keterangan=$d["keterangan"];
				$pro="ubah";		
}
?>


<blockquote>
  <blockquote>
    <form action="" method="post" enctype="multipart/form-data">
      <table width="447">
        
        
        <tr>
          <td width="123" height="44"><label for="id_pengujian">Id Pengujian</label>
          <td width="38">:
          <td width="270" colspan="2"><b><?php echo $id_pengujian;?></b>
        </tr>
        
        <tr>
          <td height="54"><label for="tgl">Tanggal</label>
          <td>:
          <td colspan="2"><input class="form-control" name="tgl" type="text" id="tgl" value="<?php echo $tgl;?>" size="30" /></td>
        </tr>
        
        <tr>
          <td height="52"><label for="jam">Jam</label>
          <td>:<td colspan="2"><input class="form-control" name="jam" type="text" id="jam" value="<?php echo $jam;?>" size="15" />
            </td>
        </tr>
        
        <tr>
          <td height="51"><label for="komentar">Komentar</label>
          <td>:
          <td><input class="form-control" name="komentar" type="text" id="komentar" value="<?php echo $komentar;?>" size="30" />
          <label for="id_pengujian"></label></td>
        </tr>
        
        <tr>
          <td height="53"><label for="penilaian">Penilaian</label>
          <td>:<td colspan="2"><input class="form-control"  name="penilaian" type="text" id="penilaian" value="<?php echo $penilaian;?>" size="25" />
            </td>
        </tr>
        
        <tr>
          <td height="50"><label for="keterangan">Keterangan</label>
        <td>:<td colspan="2"><input class="form-control"  name="keterangan" type="text" id="keterangan" value="<?php echo $keterangan;?>" size="15" /></td></tr>
        
        <tr>
          <td height="43">
          <td>
          <td colspan="2">	<input name="Simpan" type="submit" id="Simpan" value="Simpan" />
            <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
            <input name="id_pengujian" type="hidden" id="id_pengujian" value="<?php echo $id_pengujian;?>" />
            <input name="id_pengujian0" type="hidden" id="id_pengujian0" value="<?php echo $id_pengujian0;?>" />
            <a href="?mnu=pengujian"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
        </td></tr>
      </table>
    </form>
  </blockquote>
</blockquote>

Data pengujian: 
| <a href="pengujian/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="pengujian/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <a href="pengujian/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table width="100%" border="0">
  <tr bgcolor="#036">
    <th width="3%"><center>no</th>
    <th width="10%"><center>id_pengujian</th>
    <th width="20%"><center>tanggal</th>
    <th width="10%"><center>jam</th>
    <th width="30%"><center>komentar</th>
    <th width="15%"><center>penilaian</th>
    <th width="10%"><center>keterangan</th>
    <th width="10%"><center>menu</th>
  </tr>
<?php  
  $sql="select * from `$tbpengujian` order by `id_pengujian` desc";
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
				$id_pengujian=$d["id_pengujian"];
				$tgl=$d["tgl"];
				$jam=$d["telepon"];
				$komentar=$d["komentar"];
				$penilaian=$d["penilaian"];
				$keterangan=$d["keterangan"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$id_pengujian</td>
				<td>$tgl</td>
				<td>$jam</td>
				<td>$komentar</td>
				<td>$penilaian</td>
				<td>$keterangan</td>
				<td align='center'>$status</td>
				<td align='center'>
<a href='?mnu=pengujian&pro=ubah&kode=$id_pengujian'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=pengujian&pro=hapus&kode=$id_pengujian'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama pada data pengujian ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data pengujian belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=pengujian'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=pengujian'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=pengujian'>Next »</a></span>";
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
	$id_pengujian=strip_tags($_POST["id_pengujian"]);
	$id_pengujian0=strip_tags($_POST["id_pengujian0"]);
	$tgl=strip_tags($_POST["tgl"]);
	$jam=strip_tags($_POST["jam"]);
	$komentar=strip_tags($_POST["komentar"]);
	$penilaian=strip_tags($_POST["penilaian"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbpengujian` (
`id_pengujian` ,
`tgl` ,
`jam` ,
`komentar` ,
`penilaian` ,
`keterangan` 
) VALUES (
'$id_pengujian', 
'$tgl', 
'$jam',
'$komentar',
'$penilaian',
'$keterangan'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $id_pengujian berhasil disimpan !');document.location.href='?mnu=pengujian';</script>";}
		else{echo"<script>alert('Data $id_pengujian gagal disimpan...');document.location.href='?mnu=pengujian';</script>";}
	}
	else{
$sql="update `$tbpengujian` set 
`tgl`='$tgl',
`jam`='$jam' ,
`komentar`='$komentar',
`penilaian`='$penilaian',
`keterangan`='$keterangan' 
where `id_pengujian`='$id_pengujian0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id_pengujian berhasil diubah !');document.location.href='?mnu=pengujian';</script>";}
	else{echo"<script>alert('Data $id_pengujian gagal diubah...');document.location.href='?mnu=pengujian';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_pengujian=$_GET["kode"];
$sql="delete from `$tbpengujian` where `id_pengujian`='$id_pengujian'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data pengujian $id_pengujian berhasil dihapus !');document.location.href='?mnu=pengujian';</script>";}
else{echo"<script>alert('Data pengujian $id_pengujian gagal dihapus...');document.location.href='?mnu=pengujian';</script>";}
}
?>

