
<style>
#table {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
	background-color:#ddd;
	
}

#table td, #table th {
    border: 1px solid #696969;
    padding: 8px;
}



#table th {
	 padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #A9A9A9;
    color: white;
}
</style>

    <link rel="stylesheet" href="jsacor/jquery-ui.css">
    <link rel="stylesheet" href="resources/demos/style.css">
    <script src="jsacor/jquery-1.12.4.js"></script>
    <script src="jsacor/jquery-ui.js"></script>
    <script>
    $( function() {
    $( "#accordion" ).accordion({
    collapsible: true
    });
    } );
    </script>
	
	
<?php

	$id_pengujian=$_GET["id"];
	$sql="select * from `$tbpengujian` where `id_pengujian`='$id_pengujian'";
	$d=getField($conn,$sql);
				$id_pengujian=$d["id_pengujian"];
				$tgl=$d["tgl"];
				$jam=$d["jam"];
				$komentar0=$d["komentar"];
				$penilaian=$d["penilaian"];
				$keterangan=$d["keterangan"];
				$komentar=getNorm($komentar0);
$judul=$komentar;
?>


<div id="accordion">
  <h4>Info Data Pengujian</h4>
  <div>
<table width="517">
        <tr>
          <td width="166" ><label for="id_pengujian">Id Pengujian</label>
          <td width="19">:
          <td width="397" colspan="2"><b><?php echo $id_pengujian;?></b>
        </tr>
        <tr>
          <td ><label for="komentar0">Komentar</label>
          <td>:
          <td><?php echo $komentar0;?></td>
        </tr>
		
		  <tr>
          <td ><label for="komentar">Stemming</label>
          <td>:
          <td><?php echo $komentar;?></td>
        </tr>
    <tr>
<td><label for="penilaian">Kategori</label>
<td>:<td colspan="2"><?php echo $kategori;?>
</td></tr>
        <tr>
          <td height="24"><label for="keterangan">Keterangan</label>
        <td>:<td colspan="2"><?php echo $keterangan;?></td></tr>
</table>

</div>

<?php
require_once __DIR__ . '/vendor/autoload.php';

error_reporting(0);
$initos = new \Sastrawi\Stemmer\StemmerFactory();
$bikinos = $initos->createStemmer();
$stemming=$bikinos->stem($judul);
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
$juduluji=str_replace("  "," ", $wordStop); 
//=====================================================	
 $stemming=$juduluji;
 $arAsli=explode(".",$stemming);
 $jumk=count($arAsli);

 $AR=explode(" ",$stemming);
 $AR=array_unique($AR);

$m=0;
for($i=0;$i<count($AR);$i++){
 if(strlen($AR[$i])>1){
  $arUnix[$m]=$AR[$i]; 
  $m++;
	}
 }
 //======================================

 $sql="select * from `$tbkategori`  order by `id_kategori` asc limit 0,3";				
	$arr=getData($conn,$sql);
	$i=0;
	$arStem[0]=$stemming;
	$gabungan=$stemming." ";
		foreach($arr as $d) {							
				$id_kategori0=$d["id_kategori"];
				$kalimat=$d["stemming"];
				$kalimat0=$d["stemming"];
				$kategori0=$d["kategori"];
				
					$arKode[$i]=$id_kategori0;
					$arKat[$i]=$d["kategori"];
				
				
				$arAslidoc[$i]=$kalimat0;
				
				//==================
				
				$stemming2=$bikinos->stem($kalimat0);
					$stemmingnew2=strtolower($stemming2);
					$wordStop2=$stemmingnew2;
					for($y=0;$y<count($ar);$y++){
					 $wordStop2 =str_replace($ar[$y]." ","", $wordStop2); 
					}

					for($y=0;$y<count($ak);$y++){
					 $wordStop2 =str_replace($ak[$y],"", $wordStop2); 
					}
					$kalimatfilter=str_replace("  "," ", $wordStop2); 

				//==================
				$gabungan.=$kalimatfilter." ";
				$arStem[$i+1]=$kalimatfilter;
				$arDoc[$i]=$kalimatfilter;
				$arKe[$i]="Data ke-".($i+1);
				 $TOT[$i]=0;
		$i++;		
		}
		$jumk=$i;
 //======================================
 
 
 $arAsli=explode(" ",$gabungan);
  $arUnix0=array_unique($arAsli);
  
  $ii=0;
  for($i=0;$i<count($arUnix0);$i++){
	  if($arUnix0[$i]==""){}
	  else{
		  $arUnix[$ii]=$arUnix0[$i];
		  $ii++;
		}
	  }
	  
 $jumb=count($arUnix);
 
echo"<table width='300%' border='1'>";
echo"<tr><td>Kata";
echo"<td>Q";
 for($i=0;$i<$jumk;$i++){
  $u=$i+1;
  echo"<td>D".$u; 
 }
 echo"<td>df";
 echo"<td>IDF";
 echo"<td>QDF";
 for($i=0;$i<$jumk;$i++){
	  $u=$i+1;
	  echo"<td>QD".$u; 
 }

  for($i=0;$i<$jumk;$i++){
  	$u=$i+1;
  	echo"<td>QDFD".$u; 
 }

echo"<td>Q<sup>2</sup>";
  for($i=0;$i<$jumk;$i++){
  	$u=$i+1;
  	echo"<td>D<sup>2</sup>".$u; 
 }



echo"</tr>";
 
 $bar=count($arUnix);
 for($i=0;$i<$bar;$i++){
  $kata=$arUnix[$i];
  $hitung=0;
 echo"<tr><td>".$kata."</td>";
 $jumada=0;
 
   for($j=0;$j<$jumk+1;$j++){
    $ada=getHit($kata,$arStem[$j]);
    $M[$i][$j]=$ada;
    if($ada>0){
		$jumada++;
	}
	echo"<td>".$ada;
   }
 // $log=log($jumk+1,10)/$jumada; 
  $log=log(($jumk)/$jumada,10); 
 $log=abs($log);
 echo"<td>$jumada</td>";//idf
 echo"<td>log($jumk/$jumada)=$log";
 
   for($j=0;$j<$jumk+1;$j++){
		$N[$i][$j]=$M[$i][$j] * $log;
		$N2[$i][$j]=pow($N[$i][$j],2);
		
		$TOT[$j]=$TOT[$j]+$N[$i][$j];
		echo "<td>".$N[$i][$j];
   }
   
  for($j=1;$j<$jumk+1;$j++){
    $NN[$i][$j-1]=$N[$i][0] * $N[$i][$j];
    echo "<td>".$NN[$i][$j-1];
   }


  for($j=0;$j<$jumk+1;$j++){
    echo "<td>".$N2[$i][$j];
   }
   
 echo"</tr>"; 
 }//for i


   for($j=0;$j<$jumk;$j++){//kolom
	  $TOT1[$j]=0;
	  	for($k=0;$k<$bar;$k++){//baris
    		$TOT1[$j]+=$NN[$k][$j];
		}
   }

	  for($j=0;$j<$jumk+1;$j++){
			$TOT2[$j]=0;
			for($k=0;$k<$bar;$k++){//baris
					$TOT2[$j]+=$N2[$k][$j];
			}
	   }
   
//------------------------------------
echo"<tr><td>Kata";
echo"<td>Q";
 for($i=0;$i<$jumk;$i++){
  $u=$i+1;
  echo"<td>D".$u; 
 }
 echo"<td>df";
 echo"<td>IDF";
 echo"<td>QDF";
 for($i=0;$i<$jumk;$i++){
	  $u=$i+1;
	  echo"<td>QD".$u; 
 }

  for($i=0;$i<$jumk;$i++){
  	echo"<td>".$TOT1[$i]; 
 }

  for($i=0;$i<$jumk+1;$i++){
  	echo"<td>".$TOT2[$i]; 
 }



echo"</tr>";

echo"</table>"; 

?>


</div>


</div>



