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
win=window.open('kategori/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>
<link rel="stylesheet" href="js/jquery-ui.css">
  <link rel="stylesheet" href="resources/demos/style.css">
<script src="js/jquery-1.12.4.js"></script>
  <!-- <script src="js/jquery-ui.js"></script> -->
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

#mytable tr:nth-child(even)

#mytable tr:hover 

#mytable th {
  padding-top: 6px;
  padding-bottom: 6px;
  text-align: left;
  color: white;
}
</style>

<?php
if($_GET["pro"]=="ubah"){
	$id_kategori=$_GET["kode"];
	$sql="select * from `$tbkategori` where `id_kategori`='$id_kategori'";
	$d=getField($conn,$sql);
				$id_kategori=$d["id_kategori"];
				$id_kategori0=$d["id_kategori"];
				$kalimat=$d["kalimat"];
				$kategori=$d["kategori"];
				$pro="ubah";		
}
?>


<div id="accordion">
  <h4>Input Data Kategori</h4>
  <div>
    <form name="import_export_form" method="post" action="" enctype="multipart/form-data">
    <label>Select Excel File : </label><input type="file" name="excelfile"/><br>
    <input type="submit" name="form_submit"/>
    </form> 
  
<form action="" method="post" enctype="multipart/form-data">
<table width="517">

<tr>
<td height="25"><label for="kalimat">Kalimat</label>
<td>:
<td colspan="2"><textarea name="kalimat" cols="60" rows="4" class="form-control" id="kalimat"><?php echo $kalimat;?></textarea></td>
</tr>


<tr>
<td height="24"><label for="kategori">Kategori</label>
<td>:<td colspan="2">
  <select name="kategori" id="kategori">
    <option value="Positif"<?php if($kategori=="Positif"){echo"selected";}?>>Positif</option>
    <option value="Negatif"<?php if($kategori=="Negatif"){echo"selected";}?>>Negatif</option>
  </select></td>
</tr>


<tr>
<td height="26">
<td>
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
       <input name="id_kategori0" type="hidden" id="id_kategori0" value="<?php echo $id_kategori0;?>" />
        <a href="?mnu=kategori"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
		 <a href="?mnu=kategori&pro=gen"><input name="Generate" type="button" id="Generate" value="Generate" /></a>
</td></tr>
</table>
</form>
</div>

<?php  
  $sqlv="select distinct(kategori)from `$tbkategori` order by `kategori` asc";
  	$arrv=getData($conn,$sqlv);
		foreach($arrv as $dv) {					
				$kategori=$dv["kategori"];
				
				?>
 <h4>Data Kategori <?php echo $kategori;?></h4>

 <div>
| <a href="kategori/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>
<table class="table table-bordered table-striped">
<thead>
  <tr bgcolor="#036">
    <th width="3%"><center>No</th>
    <th width="45%"><center>Kalimat</th>
	 <th width="45%"><center>Stemming</th>
    <th width="10%"><center>Menu</th>
  </tr>
   </thead>
  <tbody>
<?php  
  $sql="select * from `$tbkategori` where kategori='$kategori' order by `id_kategori` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	//--------------------------------------------------------------------------------------------
	$batas   = 100;
	$page = $_GET['page'];
	if(empty($page)){$posawal  = 0;$page = 1;}
	else{$posawal = ($page-1) * $batas;}
	
	$sql2 = $sql." LIMIT $posawal,$batas";
	$no = $posawal+1;
	//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {							
				$id_kategori=$d["id_kategori"];
				$kalimat=$d["kalimat"];
				$kategori=$d["kategori"];
				
				$stemming=$d["stemming"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$kalimat
				<td>$stemming</td>
				
			<td align='center'>
<a href='?mnu=kategori&pro=ubah&kode=$id_kategori'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=kategori&pro=hapus&kode=$id_kategori'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama pada data pengujian ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data mahasiswa belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=kategori'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=kategori'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=kategori'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total Data <b>$jmldata</b> Item</p>";
?>
</div>
<?Php
		}
		?>
</div>
<form action="" method="post">
<input name="Training" type="Submit" id="traning" title="traning Semua data Angket yang belum memiliki Label" value="traning" />
 </form>
</div>

<?php  
if(isset($_GET["pro"]) && $_GET["pro"]=="gen"){
    $sql="select * from `$tbkategori`";
	$arr=getData($conn,$sql);
	$i=0;
		foreach($arr as $d) {							
				$id_kategori=$d["id_kategori"];
				$kalimat=$d["kalimat"];
				$stemming=getNorm($kalimat);
		$sqld="Update `$tbkategori` set `stemming`='$stemming' where `id_kategori`='$id_kategori'";
		$up=process($conn,$sqld);
$i++;
			}
		echo "<script>alert('Generate Stemming Sebanyak $i kata dari database berhasil  !');document.location.href='?mnu=kategori';</script>";
		}
		?>

<?php
if(isset($_POST["Training"])){
	
	   echo"<h4>Training Data Angket</h4>
  <div>";

 require_once __DIR__ . '../../vendor/autoload.php';
 $initos = new \Sastrawi\Stemmer\StemmerFactory();
 $bikinos = $initos->createStemmer();

	$ak=getStopNumber();
	$ar=getStopWords();


  //============================================
  $i=0;
  $tot=0;
  $sqlq="select distinct(kategori) from `$tbkategori` order by `kategori` asc";
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$kategori=$dq["kategori"];
				$nk=$dq["kategori"];
  
				   $sql="select kategori from `$tbkategori` where kategori='$kategori'";
				  $jum=getJum($conn,$sql);
				  
				  $arKat[$i]=$kategori;
				  $arJum[$i]=$jum;

		  $tot+=$jum;
		  $i++;
  }//foreach


  $p=$i;
  
  echo"<table border='1' width='60%'>";
  echo"<tr bgcolor='#bbbbbb'><td align='center'>No<td align='center'>Kategori<td>Jumlah</tr>";
  for($i=0;$i<$p;$i++){
	  $no=$i+1;
	  $kat=$arKat[$i];
	  $jum=$arJum[$i];
	  $color='#dddddd';
	  if($i%2==0){$color='#eeeeee';}
  echo"<tr bgcolor='$color'><td>$no<td>$kat<td align='right'>$jum</tr>";	
  }//for
  echo"</table>";
  echo"Total data=".$tot."<br>";
  
  
  $gab="";
  $sql="select stemming from `$tbkategori` order by `kategori` asc";//limit 0,10
	$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$normalisasi=$d["stemming"];
				if(strlen($normalisasi)>0){
					$gab.=$normalisasi." ";
				}
		}
$ar0=explode(" ",$gab);

$ar=getUnik($ar0);
$N=count($ar);	
  
  echo"<strong Tokenization</strong>";
  $no=0;
  echo"<table border='1' width='60%'>";
  echo"<tr bgcolor='#bbbbbb'><td align='center'>No<td align='center'>Token";
    for($i=0;$i<$p;$i++){
	  $kat=$arKat[$i];
	  echo"<td>".$kat;
	  }
	  echo"</tr>";
		  for($j=0;$j<count($ar)-1;$j++){
			  $no=$j+1;
			  $color='#dddddd';
			  if($no%2==0){$color='#eeeeee';}
			  
			  $KAL=$ar[$j];
			  
		  echo"<tr bgcolor='$color'><td>$no<td>$KAL";
			   for($ii=0;$ii<$p;$ii++){
					$idk=$arKat[$ii];
					$kalimat=$KAL;
					
				  $r=getHitung($conn,$idk,$kalimat);//rand(0,1);
				  echo"<td>".$r;
				  }
				  echo"</tr>";
		  }//for
  echo"</table><br>";

//=====================================================================

/*echo"Hasil Klasifikasi";*/

$sqlg="select * from `$tbangket` where label='' order by `idangket` asc";
  $jumg=getJum($conn,$sqlg);
  if($jumg>0){
		$arrg=getData($conn,$sqlg);
		foreach($arrg as $dg) {		
				$idangket=$dg["idangket"];
				$idkelas=$dg["idkelas"];
				$nim=$dg["nim"];
				$isvalid=$dg["isvalid"];
				$komentar=$dg["komentar"];
				$label=$dg["label"];

		$kalimat=strtolower($komentar); 
$stemming=$bikinos->stem($kalimat);
$stemmingnew=strtolower($stemming);
 
$ak=getStopNumber();
$ar=getStopWords();
$wordStop=$stemmingnew;
for($i=0;$i<count($ar);$i++){
 $wordStop =str_replace($ar[$i]." ","", $wordStop); 
}

for($i=0;$i<count($ak);$i++){
 $wordStop =str_replace($ak[$i],"", $wordStop); 
}
$stopword=str_replace("  "," ", $wordStop); 

	echo"<b>";
	echo "kalimat=".$kalimat."<br>";
	echo "stemming=".$stemmingnew."<br>";
	echo "stopword=".$stopword."<br>";
	echo"</b>";
  

  						$ark=explode(" ",$stopword);
				  
				 echo"<table border='1' width='60%'>";
				 echo"<tr bgcolor='#bbbbbb'><td align='center'>No<td align='center'>Kategori</td>";
				  			for($j=0;$j<count($ark);$j++){				
								echo"<td>".$ark[$j];
							}
				echo"</tr>";
			
 //+++++++++++++++++++++++++++++++++++++++++++++++++++
  
			  for($i=0;$i<$p;$i++){
				  $no=$i+1;
				  $idk=$arKat[$i];
				  $kat=$arKat[$i];
				  $jum=$arJum[$i];
				  $color='#dddddd';
				  if($i%2==0){$color='#eeeeee';}
				  
				 $n=$tot;
				  $pt=$jum/$tot;
				  $m=count($ark);
				  
  		echo"<tr bgcolor='$color'><td>$no<td>$kat</td>";
		$totc=$pt;
		$stotc="$pt x ";
		
								for($j=0;$j<$m;$j++){
									  $kata=$ark[$j];				
										$nc=getHitung($conn,$idk,$kata);
										
									  $ajum[$i][$j]=$nc;
									  $bob[$i][$j]=($nc+($m * $pt))/($n+$m);
									  $totc *=$bob[$i][$j];
									  $stotc .=$bob[$i][$j]." x ";
									  
									echo"<td>"."($nc+($m * $pt))/($n+$m)<br>=".$bob[$i][$j];
								}
					$arTotc[$i]=$totc;
					$arSTotc[$i]=$stotc;
						
			echo"</tr>";
			  	
			  }//for i
			  echo"</table><br>";
  //+++++++++++++++++++++++++++++++++++++++++++++++++++
  
  
			  echo"Perhitungan Probabilitas";
			 echo"<table border='1' width='100%'>";
			 echo"<tr bgcolor='#bbbbbb'><td align='center'>No<td align='center'>Kategori</td><td width='60%'>Formulas<td>Total</tr>";
			 

			 for($i=0;$i<$p;$i++){
				  $no=$i+1;
				  $kat=$arKat[$i];
				  $color='#dddddd';
				  if($i%2==0){$color='#eeeeee';}
				  
				  echo"<tr bgcolor='$color'>
				  	<td align='center'  valign='top'>$no
					<td  valign='top' align='left'>$kat</td>
					<td valign='top'>".$arSTotc[$i]."<td  valign='top'>".$arTotc[$i]."</tr>";
			  }
			echo"</table><br>";
  
  
		  //bubblerost
		        for($x = 0; $x < $p; $x++){
		            for($a = 0 ;  $a < $p - 1 ; $a++){
		                if($a < $p ){
		                    if($arTotc[$a] < $arTotc[$a + 1] ){
		                            swap($arTotc, $a, $a+1);
									 swap($arSTotc, $a, $a+1);
									  swap($arKat, $a, $a+1);
		                    }
		                }
		            }
		        }
		
  
   echo"Pengurutan Probabilitas";
	 echo"<table border='1' width='100%'>";
	 echo"<tr bgcolor='#bbbbbb'><td align='center'>No<td align='left'>Kategori</td><td width='60%'>Formulas<td>Total</tr>";
	 $hs="";
	  for($i=0;$i<$p;$i++){
		  $no=$i+1;
		  $kat=$arKat[$i];

		  $color='#dddddd';
		  if($i%2==0){$color='#eeeeee';}

		  if($i==0){$hs=$kat;}
		  

		  $no=$i+1;
		  echo"<tr bgcolor='$color'>
		  	<td align='center'  valign='top'>$no
			<td  valign='top' align='center'>$kat</td>
			<td valign='top'>".$arSTotc[$i]."<td  valign='top'>".$arTotc[$i]."</tr>";
	  }
	echo"</table><br>";

 $sql="UPDATE `$tbangket` set label='$hs' where `idangket`='$idangket'";
$up=process($conn,$sql);

echo"<font color='green' size='24'>Kategori: $hs</font><hr>";




}//foreach
}//jumg
else{
/*echo"Maaf data angket yang belum diproses belum tersedia.....";*/

}
echo "</div>";
}//isset


//+++++++++++++++++++++++++++++++++++++++++++++++++++

    function swap2(&$arr, $a, $b) {
        $tmp = $arr[$a];
        $arr[$a] = $arr[$b];
        $arr[$b] = $tmp;
    }
	
	

function getUnik($a){
	$b=array_unique($a);
	$i=0;
		for($m=0;$m<=count($a);$m++){
			if($b[$m]==""){}
			else{
			$c[$i]=$b[$m];
			$i++;
			}
		}
return $c;		
}

function getHitung($conn,$idk,$kata){
$sql="select kategori from `tb_kategori` where `kategori`='$idk' and `stemming` like '%$kata%'";//kalimat
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

?>


<?php
if(isset($_POST["Simpan"])){
	
	
 require_once __DIR__ . '../../vendor/autoload.php';
 $initos = new \Sastrawi\Stemmer\StemmerFactory();
 $bikinos = $initos->createStemmer();

	$ak=getStopNumber();
	$ar=getStopWords();
	
	
	
	$pro=strip_tags($_POST["pro"]);
	$id_kategori=strip_tags($_POST["id_kategori"]);
	$id_kategori0=strip_tags($_POST["id_kategori0"]);
	$kalimat=strip_tags($_POST["kalimat"]);
	$kategori=strip_tags($_POST["kategori"]);
	
	
$kalimat=strtolower($kalimat); 
$stemming=$bikinos->stem($kalimat);
$stemmingnew=strtolower($stemming);
 
$ak=getStopNumber();
$ar=getStopWords();
$wordStop=$stemmingnew;
for($i=0;$i<count($ar);$i++){
 $wordStop =str_replace($ar[$i]." ","", $wordStop); 
}

for($i=0;$i<count($ak);$i++){
 $wordStop =str_replace($ak[$i],"", $wordStop); 
}
$stopword=str_replace("  "," ", $wordStop); 
$stemming=trim($stopword);


if($pro=="simpan"){
$sql=" INSERT INTO `$tbkategori` (
`id_kategori` ,
`kalimat` ,`stemming` ,
`kategori`
) VALUES (
'', 
'$kalimat', '$stemming', 
'$kategori'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $id_kategori berhasil disimpan !');document.location.href='?mnu=kategori';</script>";}
		else{echo"<script>alert('Data $id_kategori gagal disimpan...');document.location.href='?mnu=kategori';</script>";}
	}
	else{
$sql="update `$tbkategori` set 
`kalimat`='$kalimat',`stemming`='$stemming',
`kategori`='$kategori'
where `id_kategori`='$id_kategori0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id_kategori berhasil diubah !');document.location.href='?mnu=kategori';</script>";}
	else{echo"<script>alert('Data $id_kategori gagal diubah...');document.location.href='?mnu=kategori';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_kategori=$_GET["kode"];
$sql="delete from `$tbkategori` where `id_kategori`='$id_kategori'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data kategori $id_kategori berhasil dihapus !');document.location.href='?mnu=kategori';</script>";}
else{echo"<script>alert('Data kategori $id_kategori gagal dihapus...');document.location.href='?mnu=kategori';</script>";}
}
?>


<?php
 if(isset($_POST['form_submit'])){
		require_once 'Excel/reader.php';
		$data = new Spreadsheet_Excel_Reader();
		$data->setOutputEncoding('CP1251');
		$filename = $_FILES['excelfile']['tmp_name'];
		$data->read($filename);//'Book1.xls');
		 
		 
		for ($x = 2; $x <= count($data->sheets[0]["cells"]); $x++) {
			$kalimat = $data->sheets[0]["cells"][$x][1];
			$kategori = $data->sheets[0]["cells"][$x][2];
			
			$hs="Positif";
			if($kategori=="negatif"){$hs="Negatif";}
			$sql=" INSERT INTO `$tbkategori` (
`id_kategori` ,
`kalimat` ,
`kategori`
) VALUES (
'', 
'$kalimat', 
'$hs'
)";
	
$simpan=process($conn,$sql);
			
		}
 	echo "<script>alert('Data Import berhasil  !');document.location.href='?mnu=kategori';</script>";
	
 
 }
 
 
 
 
 
?>

