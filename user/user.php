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
win=window.open('user/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<link rel="stylesheet" href="js/jquery-ui.css">
  <link rel="stylesheet" href="resources/demos/style.css">
<script src="js/jquery-1.12.4.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion({
      collapsible: true
    });
  } );
  </script>
  
  
<style>
#mytable {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#mytable td, #mytable th {
  border: 1px solid #ddd;
  padding: 4px;
}

#mytable tr:nth-child(even){background-color: #f2f2f2;}

#mytable tr:hover {background-color: #ddd;}

#mytable th {
  padding-top: 6px;
  padding-bottom: 6px;
  text-align: left;
  background-color: #6699FF;
  color: white;
}
</style>
<?php
  $sql="select `id_user` from `$tbuser` order by `id_user` desc";
    $jum= getJum($conn,$sql);
  $kd="USR";
		if($jum > 0){
				$d=getField($conn,$sql);
    			$idmax=$d['id_user'];	
				$urut=substr($idmax,3,2)+1;//01
				if($urut<10){$idmax="$kd"."0".$urut;}
				else{$idmax="$kd".$urut;}
			}
		else{$idmax="$kd"."01";}
  $id_user=$idmax;
?>

<?php
if($_GET["pro"]=="ubah"){
	$id_user=$_GET["kode"];
	$sql="select * from `$tbuser` where `id_user`='$id_user'";
	$d=getField($conn,$sql);
				$id_user=$d["id_user"];
				$id_user0=$d["id_user"];
				$nama_user=$d["nama_user"];
				$tlp_user=$d["tlp_user"];
				$email=$d["email"];
				$username=$d["username"];
				$password=$d["passwords"];

				$pro="ubah";		
}
?>

<div id="accordion">
  <h4>Input Data User</h4>
  <div>
<form action="" method="post" enctype="multipart/form-data">
<table width="638">


<tr>
<td width="142" height="37"><label for="id_user">Id User</label>
<td width="9">:
<td width="471" colspan="2"><b><?php echo $id_user;?></b>
</tr>

<tr>
<td height="38"><label for="nama_user">Nama</label>
<td>:
<td colspan="2"><input class="form-control"  name="nama_user" type="text" id="nama_user" value="<?php echo $nama_user;?>" size="30" /></td>
</tr>

<tr>
<td height="39"><label for="tlp_user">Telepon</label>
<td>:<td colspan="2"><input class="form-control"  name="tlp_user" type="text" id="tlp_user" value="<?php echo $tlp_user;?>" size="15" />
</td>
</tr>

<tr>
<td height="37"><label for="email">Email</label>
<td>:
<td><input class="form-control"  name="email" type="text" id="email" value="<?php echo $email;?>" size="30" />
</td>
</tr>

<tr>
<td height="37"><label for="username">Username</label>
<td>:<td colspan="2"><input class="form-control" name="username" type="text" id="username" value="<?php echo $username;?>" size="25" />
</td>
</tr>

<tr>
<td height="40"><label for="username">Password</label>
<td>:<td colspan="2"><input class="form-control" name="password" type="text" id="password" value="<?php echo $password;?>" size="25" />
</td>
</tr>

<tr>
<td height="37">
<td>
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_user" type="hidden" id="id_user" value="<?php echo $id_user;?>" />
        <input name="id_user0" type="hidden" id="id_user0" value="<?php echo $id_user0;?>" />
        <a href="?mnu=user"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
</div>
 <h4>Data User</h4>
 <div>
Data user: 
| <a href="user/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table class="table table-bordered table-striped">
<thead>
  <tr>
    <th width="3%"><center>no</th>
    <th width="10%"><center>Id User</th>
    <th width="20%"><center>Nama User</th>
    <th width="10%"><center>Telepon</th>
    <th width="30%"><center>Email</th>
    <th width="15%"><center>Username</th>
    <th width="30%"><center>Password</th>
    <th width="15%"><center>Menu</th>

  </tr>
  </thead>
<tbody>
<?php  
  $sql="select * from `$tbuser` order by `id_user` desc";
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
				$id_user=$d["id_user"];
				$nama_user=$d["nama_user"];
				$tlp_user=$d["tlp_user"];
				$email=$d["email"];
				$username=$d["username"];
				$password=$d["password"];
			
				
echo"<tr >
				<td>$no</td>
				<td>$id_user</td>
				<td>$nama_user</td>
				<td>$tlp_user</td>
				<td>$email</td>
				<td>$username</td>
				<td>$password</td>
				<td align='center'>
<a href='?mnu=user&pro=ubah&kode=$id_user'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=user&pro=hapus&kode=$id_user'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama pada data user ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data user belum tersedia...</blink></td></tr>";}
?>
</tbody>
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=user'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=user'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=user'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total Data <b>$jmldata</b> Item</p>";
?>
</div>
</div>
<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id_user=strip_tags($_POST["id_user"]);
	$id_user0=strip_tags($_POST["id_user0"]);
	$nama_user=strip_tags($_POST["nama_user"]);
	$tlp_user=strip_tags($_POST["tlp_user"]);
	$email=strip_tags($_POST["email"]);
	$username=strip_tags($_POST["username"]);
	$password=strip_tags($_POST["password"]);

if($pro=="simpan"){
$sql=" INSERT INTO `$tbuser` (
`id_user` ,
`nama_user` ,
`tlp_user` ,
`email` ,
`username` ,
`password` 
) VALUES (
'$id_user', 
'$nama_user', 
'$tlp_user',
'$email',
'$username',
'$password'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $id_user berhasil disimpan !');document.location.href='?mnu=user';</script>";}
		else{echo"<script>alert('Data $id_user gagal disimpan...');document.location.href='?mnu=user';</script>";}
	}
	else{
$sql="update `$tbuser` set 
`nama_user`='$nama_user',
`tlp_user`='$tlp_user' ,
`email`='$email',
`username`='$username',
`password`='$password'
where `id_user`='$id_user0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id_user berhasil diubah !');document.location.href='?mnu=user';</script>";}
	else{echo"<script>alert('Data $id_user gagal diubah...');document.location.href='?mnu=user';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_user=$_GET["kode"];
$sql="delete from `$tbuser` where `id_user`='$id_user'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data user $id_user berhasil dihapus !');document.location.href='?mnu=user';</script>";}
else{echo"<script>alert('Data user $id_user gagal dihapus...');document.location.href='?mnu=user';</script>";}
}
?>

