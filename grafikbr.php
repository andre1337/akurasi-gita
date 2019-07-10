<h1>Grafik Perbandingan Kata Posistif dan Negatif</h1>
<div id="chart1" style="width:1000px; height:300px"></div>
<hr>

<?php

$i=0;
  $tot=0;
  $sqlq="select distinct(kategori) from `$tbkategori` order by `kategori` asc";
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$kategori=$dq["kategori"];
				$nk=$dq["kategori"];
  
   $sql="select kategori from `$tbkategori` where kategori='$kategori' order by `kategori` asc";
  $jum=getJum($conn,$sql);
  
  $arKat[$i]=$kategori;
  $arIdKat[$i]=$kategori;
  $arJum[$i]=$jum;

  $tot+=$jum;
  $i++;
  }//foreach
  $p=$i;
 $gab="";
  $sql="select stemming from `$tbkategori` order by `kategori` asc";
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
	  
	  $gab1="";
	  $gab2="";
	  
		  for($j=0;$j<count($ar)-1;$j++){
			  $no=$j+1;
			  $color='#dddddd';
			  if($no%2==0){$color='#eeeeee';}
			  
			  $KAL=$ar[$j];
			  
		  echo"<tr bgcolor='$color'><td>$no<td>$KAL";
			   for($i=0;$i<$p;$i++){
					$idk=$arIdKat[$i];
					$kalimat=$KAL;
					
				  $r=getHitung($conn,$idk,$kalimat);//rand(0,1);
				  echo"<td>".$r;
					
						if($i==0){
							$gab1.="[$no,$r],";
						}
						else{
							$gab2.="[$no,$r],";
						}
				  }
				  echo"</tr>";
		  }//for
  echo"</table>";
  
 $gab1=substr($gab1,0,strlen($gab1)-1); 
 $gab2=substr($gab2,0,strlen($gab2)-1); 
  
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
  
  
  
  <head>
    <link class="include" rel="stylesheet" type="text/css" href="lib/jquery.jqplot.min.css" />
    <link rel="stylesheet" type="text/css" href="lib/examples.min.css" />
    <link type="text/css" rel="stylesheet" href="lib/syntaxhighlighter/styles/shCoreDefault.min.css" />
    <link type="text/css" rel="stylesheet" href="lib/syntaxhighlighter/styles/shThemejqPlot.min.css" />
  
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="../excanvas.js"></script><![endif]-->
    <script class="include" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>   
</head>

<!-- Example scripts go here -->

<script class="code" type="text/javascript">
    $(document).ready(function () {
        var s1 = [<?php echo $gab1;?>];
        var s2 = [<?php echo $gab2;?>];

        plot1 = $.jqplot("chart1", [s2, s1], {
            animate: true,
            animateReplot: true,
            cursor: {
                show: true,
                zoom: true,
                looseZoom: true,
                showTooltip: false
            },
            series:[
                {
                    pointLabels: {
                        show: true
                    },
                    renderer: $.jqplot.BarRenderer,
                    showHighlight: false,
                    yaxis: 'y2axis',
                    rendererOptions: {
                        // Speed up the animation a little bit.
                        // This is a number of milliseconds.  
                        // Default for bar series is 3000.  
                        animation: {
                            speed: 2500
                        },
                        barWidth: 15,
                        barPadding: -15,
                        barMargin: 0,
                        highlightMouseOver: false
                    }
                }, 
                {
                    rendererOptions: {
                        // speed up the animation a little bit.
                        // This is a number of milliseconds.
                        // Default for a line series is 2500.
                        animation: {
                            speed: 2000
                        }
                    }
                }
            ],
            axesDefaults: {
                pad: 0
            },
            axes: {
                xaxis: {
                    tickInterval: 1,
                    drawMajorGridlines: false,
                    drawMinorGridlines: true,
                    drawMajorTickMarks: false,
                    rendererOptions: {
                    tickInset: 0.5,
                    minorTicks: 1
                }
                },
                yaxis: {
                    tickOptions: {
                        formatString: "%'d"
                    },
                    rendererOptions: {
                        forceTickAt0: true
                    }
                },
                y2axis: {
                    tickOptions: {
                        formatString: "%'d"
                    },
                    rendererOptions: {
                        // align the ticks on the y2 axis with the y axis.
                        alignTicks: true,
                        forceTickAt0: true
                    }
                }
            },
            highlighter: {
                show: true, 
                showLabel: true, 
                tooltipAxes: 'y',
                sizeAdjust: 7.5 , tooltipLocation : 'ne'
            }
        });
      
    });

</script>
    <script class="include" type="text/javascript" src="lib/jquery.jqplot.min.js"></script>
    <script type="text/javascript" src="lib/syntaxhighlighter/scripts/shCore.min.js"></script>
    <script type="text/javascript" src="lib/syntaxhighlighter/scripts/shBrushJScript.min.js"></script>
    <script type="text/javascript" src="lib/syntaxhighlighter/scripts/shBrushXml.min.js"></script>
  <script class="include" type="text/javascript" src="lib/plugins/jqplot.barRenderer.min.js"></script>
  <script class="include" type="text/javascript" src="lib/plugins/jqplot.highlighter.min.js"></script>
  <script class="include" type="text/javascript" src="lib/plugins/jqplot.cursor.min.js"></script> 
  <script class="include" type="text/javascript" src="lib/plugins/jqplot.pointLabels.min.js"></script>