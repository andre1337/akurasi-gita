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
win=window.open('angket/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
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
	$idangket=$_GET["id"];
	$sql="select * from `$tbangket` where `idangket`='$idangket'";
	$d=getField($conn,$sql);
				$idangket=$d["idangket"];
				$idangket0=$d["idangket"];
				$idkelas=$d["idkelas"];
				$nim=$d["nim"];
				$isvalid="isvalid";	
				$id_kategori="id_kategori";	
				$komentar="komentar";		
}
?>


<div id="accordion">
  <h4>Input Data Angket</h4>
  <div>
    <form name="import_export_form" method="post" action="" enctype="multipart/form-data">
    <label>Select Excel File : </label><input type="file" name="excelfile"/><br>
    <input type="submit" name="form_submit"/>
    </form> 
<hr>
<?php
if($_GET["pro"]=="ubah"){
	
	?>
<form action="" method="post" enctype="multipart/form-data">
<table width="517">

<tr>
<td height="38"><label for="idangket">Id Angket</label>
<td>:
<td colspan="2"><input class="form-control"  name="idangket" type="text" id="idangket" value="<?php echo $idangket;?>" size="30" /></td>
</tr>

<tr>
<td height="38"><label for="idkelas">Id kelas</label>
<td>:
<td colspan="2"><input class="form-control"  name="idkelas" type="text" id="idkelas" value="<?php echo $idkelas;?>" size="30" /></td>
</tr>

<tr>
<td height="38"><label for="nim">Nim</label>
<td>:
<td colspan="2"><input class="form-control"  name="nim" type="text" id="nim" value="<?php echo $nim;?>" size="30" /></td>
</tr>

<tr>
<td height="38"><label for="isvalid">Is Valid</label>
<td>:
<td colspan="2"><input class="form-control"  name="isvalid" type="text" id="isvalid" value="<?php echo $isvalid;?>" size="30" /></td>
</tr>

<tr>
<td height="38"><label for="id_kategori">Id Kategori</label>
<td>:
<td colspan="2"><input class="form-control"  name="id_kategori" type="text" id="id_kategori" value="<?php echo $id_kategori;?>" size="30" /></td>
</tr>

<tr>
<td height="25" valign="top"><label for="komentar">Komentar</label>
<td valign="top">:
<td colspan="2"><textarea name="komentar" cols="60" rows="4" class="form-control" id="komentar" value="<?php echo $komentar;?></textarea></td>
</tr></td>
</tr>

<tr>
<td height="26">
<td>
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
       <input name="idangket0" type="hidden" id="idangket0" value="<?php echo $idangket0;?>" />
        <a href="?mnu=angket"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
<?php
}
?>
</div>

<?php  
  $sqlv="select distinct(label) from `$tbangket` order by `idangket` asc";
  	$arrv=getData($conn,$sqlv);
		foreach($arrv as $dv) {					
				$label=$dv["label"];
				
				?>
 <h4>Data Angket <!-- <?php echo $label;?> --></h4>

 <div>
| <a href="angket/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>
<table class="table table-bordered table-striped">
<thead>
  <tr bgcolor="#036">
    <th width="10%"><center>Id Angket</th>
    <th width="10%"><center>Id Kelas</th>
	 <th width="10%"><center>Nim</th>
	 <th width="5%"><center>Isvalid</th>
	 <th width="10%"><center>Id Kategori</th>
	 <th width="45%"><center>komentar</th>
    <th width="10%"><center>Menu</th>
  </tr>
   </thead>
  <tbody>
<?php  
  $sql="select * from `$tbangket` where label='$label' order by `idangket` desc";
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
				$idangket=$d["idangket"];
				$idkelas=$d["idkelas"];
				$nim=$d["nim"];
				$isvalid=$d["isvalid"];
				$isvalid=$d["id_kategori"];
				$komentar=$d["komentar"];
				$label=$d["label"];
				

					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>

				<td>$idangket</td>
				<td>$idkelas</td>
				<td>$nim</td>
				<td>$isvalid</td>
				<td>$id_kategori</td>
				<td>$komentar</td>
				
			<td align='center'>
<a href='?mnu=nb2&id=$idangket'><img src='ypathicon/xls.png' title='ubah'></a>			
<a href='?mnu=angket&pro=ubah&kode=$idangket'><img src='ypathicon/u.png' title='ubah'></a>
<a href='?mnu=angket&pro=hapus&kode=$idangket'><img src='ypathicon/h.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama pada data angket ?..\")'></a></td>
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=angket'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=angket'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=angket'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total Data <b>$jmldata</b> Item</p>";
?>
<form action="" method="post">
<input name="Generate" type="Submit" id="Generate" title="Generate Semua data Angket yang belum memiliki Label" value="Generate" />
 </form>
</div>
<?Php
		}
		?>
</div>


<?php  
/*
if(isset($_GET["pro"]) && $_GET["pro"]=="gen"){
    $sql="select * from `$tbangket`";
	$arr=getData($conn,$sql);
	$i=0;
		foreach($arr as $d) {							
				$idangket=$d["idangket"];
				$idkelas=$d["idkelas"];
				$nim=$d["nim"];
				$isvalid=$d["isvalid"];
				$komentar=$d["komentar"];
													

		$sqld="Update `$tbangket` where `idangket`='$idangket'";
		$up=process($conn,$sqld);
$i++;
			}
		echo "<script>alert('Generate Stemming Sebanyak $i kata dari database berhasil  !');document.location.href='?mnu=angket';</script>";
		}
		*/
		?>


<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$idangket=strip_tags($_POST["idangket"]);
	$idkelas=strip_tags($_POST["idkelas"]);
	$nim=strip_tags($_POST["nim"]);
	$isvalid=strip_tags($_POST["isvalid"]);
	$id_kategori=strip_tags($_POST["id_kategori"]);
	$komentar=strip_tags($_POST["komentar"]);

if($pro=="simpan"){
$sql=" INSERT INTO `$tbangket` (
`idangket` ,
`idkelas` ,
`nim`,
`isvalid`,
`id_kategori`,
`komentar`
) VALUES (
'', 
'$idangket', 
'$idkelas',
'$nim',
'$isvalid',
'$id_kategori',
'$komentar'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $idangket berhasil disimpan !');document.location.href='?mnu=angket';</script>";}
		else{echo"<script>alert('Data $idangket gagal disimpan...');document.location.href='?mnu=angket';</script>";}
	}
	else{
$sql="update `$tbangket` set 
`idangket`='$idangket',
`idkelas`='$idkelas'
`nim`='$nim'
`isvalid`='$isvalid'
`id_kategori`='$id_kategori'
`komentar`='$komentar'
where `idangket`='$idangket'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $idangket berhasil diubah !');document.location.href='?mnu=angket';</script>";}
	else{echo"<script>alert('Data $idangket gagal diubah...');document.location.href='?mnu=angket';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$idangket=$_GET["id"];
$sql="delete from `$tbangket` where `idangket`='$idangket'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data angket $idangket berhasil dihapus !');document.location.href='?mnu=angket';</script>";}
else{echo"<script>alert('Data angket $idangket gagal dihapus...');document.location.href='?mnu=angket';</script>";}
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
			$idangket = $data->sheets[0]["cells"][$x][1];
			$idkelas = $data->sheets[0]["cells"][$x][2];
			$nim = $data->sheets[0]["cells"][$x][3];
			$isvalid = $data->sheets[0]["cells"][$x][4];
			$id_kategori = $data->sheets[0]["cells"][$x][5];
			$komentar = $data->sheets[0]["cells"][$x][6];
			

			$sql=" INSERT INTO `$tbangket` (
`idangket` ,
`idkelas` ,
`nim`,
`isvalid`,
`id_kategori`,
`komentar`
) VALUES (
'$idangket', 
'$idkelas', 
'$nim',
'$isvalid',
'$id_kategori',
'$komentar'
)";
	
$simpan=process($conn,$sql);
			
		}
 	echo "<script>alert('Data Import berhasil  !');document.location.href='?mnu=angket';</script>";
	
 
 }
 
 
 
 
 
?>





<?php
if(isset($_POST["Generate"])){
	
	
require_once __DIR__ . 'vendor/autoload.php';
$initos = new \Sastrawi\Stemmer\StemmerFactory();
$bikinos = $initos->createStemmer();


 $i=0;
  $tot=0;
  $sqlq="select distinct(kategori) from `$tbkategori` order by `kategori` asc";
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$kategori=$dq["kategori"];
				$nk=$dq["kategori"];
  
   $sql="select kategori from `$tbkategori` where kategori='$kategori' order by `kategori` asc ";
  $jum=getJum($conn,$sql);
  
  $arKat[$i]=$kategori;
  $arIdKat[$i]=$kategori;
  $arJum[$i]=$jum;

  $tot+=$jum;
  $i++;
  }//foreach
  $p=$i;
  
  //echo"<table border='1' width='60%'>";
  //echo"<tr bgcolor='#bbbbbb'><td align='center'>No<td align='center'>Kategori<td>Jumlah</tr>";
  for($i=0;$i<$p;$i++){
	  $no=$i+1;
	  $kat=$arKat[$i];
	  $jum=$arJum[$i];
	  $color='#dddddd';
	  if($i%2==0){$color='#eeeeee';}
  //echo"<tr bgcolor='$color'><td>$no<td>$kat<td align='right'>$jum</tr>";	
  }//for
  //echo"</table>";
  //echo"Total data=".$tot."<br>";
  
  
  $gab="";
  $sql="select stemming from `$tbkategori` order by `kategori` asc limit 0,10";//limit 0,10
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
  
  //echo"<strong Tokenization</strong>";
  $no=0;
  //echo"<table border='1' width='60%'>";
  //echo"<tr bgcolor='#bbbbbb'><td align='center'>No<td align='center'>Token";
    for($i=0;$i<$p;$i++){
	  $kat=$arKat[$i];
	  //echo"<td>".$kat;
	  }
	  //echo"</tr>";
		  for($j=0;$j<count($ar)-1;$j++){
			  $no=$j+1;
			  $color='#dddddd';
			  if($no%2==0){$color='#eeeeee';}
			  
			  $KAL=$ar[$j];
			  
		  //echo"<tr bgcolor='$color'><td>$no<td>$KAL";
			   for($i=0;$i<$p;$i++){
					$idk=$arIdKat[$i];
					$kalimat=$KAL;
					
				  $r=getHitung($conn,$idk,$kalimat);//rand(0,1);
				  //echo"<td>".$r;
				  }
				  //echo"</tr>";
		  }//for
  //echo"</table>";




$nom=0;
$sqlg="select * from `$tbangket` where label='' order by `idangket` asc";
  $jumg=getJum($conn,$sqlg);
	$arrg=getData($conn,$sqlg);
		foreach($arrg as $dg) {		

				$idangket=$dg["idangket"];
				$idkelas=$dg["idkelas"];
				$nim=$dg["nim"];
				$isvalid=$dg["isvalid"];
				$id_kategori=$dg["id_kategori"];
				$komentar=$dg["komentar"];
				$label=$dg["label"];

			$ARID[$nom]=$idangket;
			$ARKLS[$nom]=$idkelas;
			$ARNIM[$nom]=$nim;
			$ARIS[$nom]=$isvalid;
			$ARGO[$nom]=$id_kategori;
			$ARKOM[$nom]=$komentar;
			$ARLAB[$nom]=$label;
			
$nom++;						

$kalimat=$komentar;
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

	//echo"<b>$nom. ";
	//echo "Kalimat=".$kalimat."<br>";
	//echo "Stemming=".$stemmingnew."<br>";
	//echo "Stopword=".$stopword."</b><br>";
  //============================================
 
//==============================
  $ark=explode(" ",$stopword);
  
 //echo"<table border='1' width='60%'>";
 //echo"<tr bgcolor='#bbbbbb'><td align='center'>No<td align='center'>Kategori</td>";
  			for($j=0;$j<count($ark);$j++){				
				//echo"<td>".$ark[$j];
			}
//echo"</tr>";
			
  $pan=$p;
  for($i=0;$i<$pan;$i++){
	  $no=$i+1;
	  $idk=$arIdKat[$i];
	  $kat=$arKat[$i];
	  $jum=$arJum[$i];
	  $color='#dddddd';
	  if($i%2==0){$color='#eeeeee';}
	  
	  $n=$tot;
	  $p=$jum/$tot;
	  $m=count($ark);
	  
  		//echo"<tr bgcolor='$color'><td>$no<td>$kat</td>";
		$totc=$p;
		$stotc="$p x ";
		
  			for($j=0;$j<$m;$j++){
				  $kata=$ark[$j];				
				  	$nc=getHitung($conn,$idk,$kata);
	 				
				  $ajum[$i][$j]=$nc;
				  $bob[$i][$j]=($nc+($m * $p))/($n+$m);
				  $totc *=$bob[$i][$j];
				  $stotc .=$bob[$i][$j]." x ";
				  
				//echo"<td>"."($nc+($m * $p))/($n+$m)<br>=".$bob[$i][$j];
			}
			$arTotc[$i]=$totc;
			$arSTotc[$i]=$stotc;
			
			//echo"</tr>";
  	
  }//for
//  echo"</table><br>";
  
//  echo"Perhitungan Probabilitas";
 //echo"<table border='1' width='100%'>";
 //echo"<tr bgcolor='#bbbbbb'><td align='center'>No<td align='center'>Kategori</td><td width='60%'>Formulas<td>Total</tr>";

  
  
  //bubblerost
        for($x = 0; $x < $pan; $x++){
            for($a = 0 ;  $a < $pan - 1 ; $a++){
                if($a < $pan ){
                    if($arTotc[$a] < $arTotc[$a + 1] ){
                            swap($arTotc, $a, $a+1);
							 swap($arSTotc, $a, $a+1);
							  swap($arKat, $a, $a+1);
							
							swap($ARID, $a, $a+1);
							 swap($ARKLS, $a, $a+1);
							  swap($ARNIM, $a, $a+1);
								swap($ARIS, $a, $a+1);
								swap($ARGO, $a, $a+1);
							 swap($ARKOM, $a, $a+1);
							  swap($ARLAB, $a, $a+1);


                    }
                }
            }
        }
		
   $hs="";
  for($i=0;$i<$pan;$i++){
	  $no=$i+1;
	  $kat=$arKat[$i];

	 if($i==0){$hs=$kat;
				$shasil=$arSTotc[$i];
				$vhasil=$arTotc[$i];
				$ARHASIL[$nom-1]=$hs;
				$ARSHASIL[$nom-1]=$shasil;
				$ARVHASIL[$nom-1]=$vhasil;
						
		}
  }

$sql="UPDATE `$tbangket` set label='$hs' where `id_angket`='$id_angket'";
$up=process($conn,$sql);

}//foreach angket






echo"Hasil Klasifikasi";
echo"<table border='1' width='100%'>";
echo"<tr bgcolor='#bbbbbb'>
<td align='center'>No<td>IDANGKET<td>IDKELAS<td>NIM<td>ISVALID<td>KOMENTAR<td>LABEL<td>OUT</tr>";

for($i=0;$i<$jumg;$i++){


	$idangket=$ARID[$i];
	$idkelas=$ARKLS[$i];
	$nim=$ARNIM[$i];
	$isvalid=$ARIS[$i];
	$id_kategori=$ARGO[$i];
	$komentar=$ARKOM[$i];
	$label=$ARLAB[$i];

	$hs=$ARHASIL[$nom-1];
	$shasil=$ARSHASIL[$nom-1];
	$vhasil=$ARVHASIL[$nom-1];
$no=$i+1;
	echo"<tr bgcolor='#cccccc'>
<td align='center'>$no<td>$idangket<td>$idkelas<td>$nim<td>$isvalid<td>$komentar<td>$hs<td>$vhasil</tr>";
}
echo "</table>";



}//isset






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
  
