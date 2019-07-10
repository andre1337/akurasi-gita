<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);  
  ?>
<?php
session_start();
//error_reporting(0);
require_once"konmysqli.php";

$mnu=$_GET["mnu"];
date_default_timezone_set("Asia/Jakarta");
 if(!isset($_SESSION["cid"])){
 echo"<script>
			document.location.href='Login.php';</script>";
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>analisis sentimen</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html"> Admin</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome <?php echo $_SESSION["cid"];?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
         </ul>
    </li>
    <li class=""><a title="" href="index.php?mnu=logout"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
   
   
 <?php if(isset($_SESSION["cid"])){  ?> 
    <li><a href="index.php?mnu=home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li><a href="index.php?mnu=user"><i class="icon icon-user"></i> <span>User</span></a> </li>
    <li><a href="index.php?mnu=kategori"><i class="icon icon-th"></i> <span>Kategori</span></a></li>
     <li><a href="index.php?mnu=angket"><i class="icon icon-file"></i> <span>Angket</span></a> </li>
    <li><a href="index.php?mnu=pengujian"><i class="icon icon-check"></i> <span>Pengujian</span></a> </li>
    <li><a href="index.php?mnu=grafik"><i class="icon icon-signal"></i> <span>Grafik</span></a></li>
    <li><a href="index.php?mnu=akurasi"><i class="icon icon-signal"></i> <span>Akurasi</span></a></li>
   <?php }else{?>
      <li><a href="index.html"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li><a href="index.php?mnu=login"><i class="icon icon-key"></i> <span>Login</span></a> </li>
 
   <?php }?>
  </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->
<div class="container-fluid">
  <hr>
<div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Personal-info</h5>
        </div>
        <div class="widget-content">
 
<?php 
 
if($mnu=="admin"){require_once"admin/admin.php";}
else if($mnu=="akurasi"){require_once"akurasi.php";}
else if($mnu=="user"){require_once"user/user.php";}
else if($mnu=="pengujian"){require_once"pengujian/pengujian.php";}
else if($mnu=="kategori"){require_once"kategori/kategori.php";}
else if($mnu=="angket"){require_once"angket.php";}
else if($mnu=="kategori"){require_once"graik/grafik.php";}
else if($mnu=="login"){require_once"login.php";}
else if($mnu=="logout"){require_once"logout.php";}
else if($mnu=="tfidf"){require_once"NB.php";}
else if($mnu=="nb2"){require_once"NB2.php";}
else if($mnu=="tfidf2"){require_once"tfidf.php";}
else if($mnu=="grafik"){require_once"grafik.php";}
else {require_once"home.php";}
                
               

 ?>
</div>
</div>
</div>
</div>
</div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2019 &copy; Universitas Darma Persada by Gita Fitriana </div>
</div>

<!--end-Footer-part-->

<?php if ($mnu=="" || $mnu=="home"){?>
<script src="js/excanvas.min.js"></script>
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 

<?php }?>
<script src="js/jquery.flot.min.js"></script> 
<script src="js/jquery.flot.resize.min.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/fullcalendar.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.dashboard.js"></script> 
<script src="js/jquery.gritter.min.js"></script> 
<script src="js/matrix.interface.js"></script> 
<script src="js/matrix.chat.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.form_validation.js"></script> 
<script src="js/jquery.wizard.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.popover.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.tables.js"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>


<?php function RP($rupiah){return number_format($rupiah,"2",",",".");}?>
<?php
function WKT($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,0,4);

$judul_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September","Oktober", "November", "Desember");
$wk=$tanggal." ".$judul_bln[(int)$bulan]." ".$tahun;
return $wk;
}
?>
<?php
function WKTP($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,2,2);

$judul_bln=array(1=> "Jan", "Feb", "Mar", "Apr", "Mei","Jun", "Jul", "Agu", "Sep","Okt", "Nov", "Des");
$wk=$tanggal." ".$judul_bln[(int)$bulan]."'".$tahun;
return $wk;
}
?>
<?php
function BAL($tanggal){
    $arr=split(" ",$tanggal);
    if($arr[1]=="Januari"){$bul="01";}
    else if($arr[1]=="Februari"){$bul="02";}
    else if($arr[1]=="Maret"){$bul="03";}
    else if($arr[1]=="April"){$bul="04";}
    else if($arr[1]=="Mei"){$bul="05";}
    else if($arr[1]=="Juni"){$bul="06";}
    else if($arr[1]=="Juli"){$bul="07";}
    else if($arr[1]=="Agustus"){$bul="08";}
    else if($arr[1]=="September"){$bul="09";}
    else if($arr[1]=="Oktober"){$bul="10";}
    else if($arr[1]=="November"){$bul="11";}
    else if($arr[1]=="Nopember"){$bul="11";}
    else if($arr[1]=="Desember"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";  
}
?>

<?php
function BALP($tanggal){
    $arr=split(" ",$tanggal);
    if($arr[1]=="Jan"){$bul="01";}
    else if($arr[1]=="Feb"){$bul="02";}
    else if($arr[1]=="Mar"){$bul="03";}
    else if($arr[1]=="Apr"){$bul="04";}
    else if($arr[1]=="Mei"){$bul="05";}
    else if($arr[1]=="Jun"){$bul="06";}
    else if($arr[1]=="Jul"){$bul="07";}
    else if($arr[1]=="Agu"){$bul="08";}
    else if($arr[1]=="Sep"){$bul="09";}
    else if($arr[1]=="Okt"){$bul="10";}
    else if($arr[1]=="Nov"){$bul="11";}
    else if($arr[1]=="Nop"){$bul="11";}
    else if($arr[1]=="Des"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";  
}
?>


<?php
function process($conn,$sql){
$s=false;
$conn->autocommit(FALSE);
try {
  $rs = $conn->query($sql);
  if($rs){
        $conn->commit();
        $last_inserted_id = $conn->insert_id;
        $affected_rows = $conn->affected_rows;
        $s=true;
  }
} 
catch (Exception $e) {
    echo 'fail: ' . $e->getMessage();
    $conn->rollback();
}
$conn->autocommit(TRUE);
return $s;
}

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
    $rs->free();
    return $jum;
}

function getField($conn,$sql){
    $rs=$conn->query($sql);
    $rs->data_seek(0);
    $d= $rs->fetch_assoc();
    $rs->free();
    return $d;
}

function getData($conn,$sql){
    $rs=$conn->query($sql);
    $rs->data_seek(0);
    $arr = $rs->fetch_all(MYSQLI_ASSOC);
    //foreach($arr as $row) {
    //  echo $row['nama_kelas'] . '*<br>';
    //}
    
    $rs->free();
    return $arr;
}

function getAdmin($conn,$kode){
$field="username";
$sql="SELECT `$field` FROM `tb_admin` where `kode_admin`='$kode'";
$rs=$conn->query($sql); 
    $rs->data_seek(0);
    $row = $rs->fetch_assoc();
    $rs->free();
    return $row[$field];
    }

?>





 <?php
 
 function getHit($kal,$kalimat){
  $ar=explode(" ",$kalimat);
  $ada=0;
  for($i=0;$i<count($ar);$i++){
   if($kal==$ar[$i]){$ada++;}
   }//for
  return $ada;
  } 
 ?>
  
    <?php
function swap(&$arr, $a, $b) {
    $tmp = $arr[$a];
    $arr[$a] = $arr[$b];
    $arr[$b] = $tmp;
}
?>
    
    
    

<?php

function getNorm($judul){
require_once __DIR__ . '/vendor/autoload.php';
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
$gab="";
for($i=0;$i<count($AR);$i++){
 if(strlen($AR[$i])>1){
  $arUnix[$m]=$AR[$i]; 
  $gab.=$AR[$i]." ";
  $m++;
	}
 }
 
 return trim($gab);
}
 
function getStopWords()
    {
        return array(
            'yang', 'untuk', 'pada', 'ke', 'para', 'namun', 'menurut', 'antara', 'dia', 'dua',
            'ia', 'seperti', 'jika', 'jika', 'sehingga', 'kembali', 'dan', 'tidak', 'ini', 'karena',
            'kepada', 'oleh', 'saat', 'harus', 'sementara', 'setelah', 'belum', 'kami', 'sekitar',
            'bagi', 'serta', 'di', 'dari', 'telah', 'sebagai', 'masih', 'hal', 'ketika', 'adalah',
            'itu', 'dalam', 'bisa', 'bahwa', 'atau', 'hanya', 'kita', 'dengan', 'akan', 'juga',
            'ada', 'mereka', 'sudah', 'saya', 'terhadap', 'secara', 'agar', 'lain', 'anda',
            'begitu', 'mengapa', 'kenapa', 'yaitu', 'yakni', 'daripada', 'itulah', 'lagi', 'maka',
            'tentang', 'demi', 'dimana', 'kemana', 'pula', 'sambil', 'sebelum', 'sesudah', 'supaya',
            'guna', 'kah', 'pun', 'sampai', 'sedangkan', 'selagi', 'sementara', 'tetapi', 'apakah',
            'kecuali', 'sebab', 'selain', 'seolah', 'seraya', 'seterusnya', 'tanpa', 'agak', 'boleh',
            'dapat', 'dsb', 'dst', 'dll', 'dahulu', 'dulunya', 'anu', 'demikian', 'tapi', 'ingin',
            'juga', 'nggak', 'mari', 'nanti', 'melainkan', 'oh', 'ok', 'seharusnya', 'sebetulnya',
            'setiap', 'setidaknya', 'sesuatu', 'pasti', 'saja', 'toh', 'ya', 'walau', 'tolong',
            'tentu', 'amat', 'apalagi', 'bagaimanapun', 'nya', 'hehe','dgn','pa','bu', 'pak', 'ibu','fotocopy','print','ga','gak','gk','wkwkwk','ckckck','hahaha','di','pas','jgn','tdk','in','pas','an','yg','si','bapak','bp','bpk','ke'
        );
    }


function getStopNumber()
    {
        return array(
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '!', '@', '#', '$', '%', '"', '-', '+',']','[','{','}','|','!','(',')','^','&','*','`','~','?','/','.','<','>'
        );
    }
 
 
 
function getUnix($array){
error_reporting(0);
$unique = array_flip(array_flip($array));
//print_r($unique);
$jd=count($array);
//echo $jd."#<br>";
$m=0;
for($i=0;$i<$jd;$i++){
 if(strlen($unique[$i])>0){
  //echo "$m =".$unique[$i]."<br>";
  $M[$m]=$unique[$i];
  $m++;
 }
}
 return $M;
}

?>