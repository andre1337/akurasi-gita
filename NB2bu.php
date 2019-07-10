<h1>Proses Naive Bayes</h1>
<?php

//default input

	$idangket=$_GET["id"];
	$sql="select * from `$tbangket` where `idangket`='$idangket'";
	$d=getField($conn,$sql);
				$idangket=$d["idangket"];
				$idangket0=$d["idangket"];
				$idkelas=$d["idkelas"];
				$nim=$d["nim"];
				$isvalid="isvalid";	
				$komentar=$d["komentar"];		

$kalimat=$komentar;
 require_once __DIR__ . '/vendor/autoload.php';
 $initos = new \Sastrawi\Stemmer\StemmerFactory();
 $bikinos = $initos->createStemmer();

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

	echo"<b>";
	echo "kalimat=".$kalimat."<br>";
	echo "stemming=".$stemmingnew."<br>";
	echo "stopword=".$stopword."<br>";
	echo"</b>";
  
  //============================================
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
			   for($i=0;$i<$p;$i++){
					$idk=$arIdKat[$i];
					$kalimat=$KAL;//gab kata norm
					
				  $r=getHitung($conn,$idk,$kalimat);//rand(0,1);
				  echo"<td>".$r;
				  }
				  echo"</tr>";
		  }//for
  echo"</table>";


  $ark=explode(" ",$stopword);
  
 echo"<table border='1' width='60%'>";
 echo"<tr bgcolor='#bbbbbb'><td align='center'>No<td align='center'>Kategori</td>";
  			for($j=0;$j<count($ark);$j++){				
				echo"<td>".$ark[$j];
			}
echo"</tr>";
			
  $pan=$p;
  for($i=0;$i<$pan;$i++){
	  $no=$i+1;
	  $idk=$arIdKat[$i];
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
  	
  }//for
  echo"</table><br>";
  
 echo"Perhitungan Probabilitas";
 echo"<table border='1' width='100%'>";
 echo"<tr bgcolor='#bbbbbb'><td align='center'>No<td align='center'>Kategori</td><td width='60%'>Formulas<td>Total</tr>";
  
  
  for($i=0;$i<$pan;$i++){
	  $no=$i+1;
	  $kat=$arKat[$i];
	  $color='#dddddd';
	  if($i%2==0){$color='#eeeeee';}
	  
	  $no=$i+1;
	  echo"<tr bgcolor='$color'>
	  	<td align='center'  valign='top'>$no
		<td  valign='top' align='left'>$kat</td>
		<td valign='top'>".$arSTotc[$i]."<td  valign='top'>".$arTotc[$i]."</tr>";
  }
echo"</table><br>";
  
  
  //bubblerost
        for($x = 0; $x < $pan; $x++){
            for($a = 0 ;  $a < $pan - 1 ; $a++){
                if($a < $pan ){
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
  for($i=0;$i<$pan;$i++){
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
//$up=process($conn,$sql);

echo"<font color='green' size='24'>Kategori: $hs</font><hr>";



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
  