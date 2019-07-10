<?php
require_once"../koneksivar.php";

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

define('FPDF_FONTPATH', '../ypathcss/bantuan/fpdf/font/');
require('../ypathcss/bantuan/fpdf/fpdf.php');

class PDF extends FPDF{
  function Header(){
    $this->SetTextColor(128,0,0);
    $this->SetFont('Arial','B','12');//	$this->SetFont('Times','',12);
    $this->Cell(20,0,'Data pengujian',0,0,'L');
    $this->Ln();
    $this->Cell(5,1,'Laporan data pengujian',0,0,'L');
    $this->Ln();
	

	
  }
  
  function Footer(){
	$this->SetY(-4,5);
	$this->Image("../ypathfile/avatar.jpg", (8.5/2)-1.5, 9.8, 3, 1, "JPG", "http://www.lp2maray.com");
    $this->SetY(-2,5);
    $this->Cell(0,1,$this->PageNo(),0,0,'C');
	
  }
} 

$sql = "select * from `$tbpengujian`";
$jml =  getJum($conn,$sql);

$i=0;
$arr=getData($conn,$sql);
		foreach($arr as $d) {	
  $cell[$i][0]=$d["id_pengujian"];
  $cell[$i][1]=$d["tgl"];
  $cell[$i][2]=$d["jam"];
  $cell[$i][3]=$d["komentar"];
  $cell[$i][4]=$d["penilaian"];
  $cell[$i][5]=$d["keterangan"];
  $i++;
}
				
				
$pdf=new PDF('L','cm','A4');
//$pdf=new PDF("P","in","Letter");
$pdf->Open();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B','9');
$pdf->SetFillColor(192,192,192);
$pdf->Cell(1,1,'no','LR',0,'L',1);
//$pdf->MultiCell(0, 0.5, $lipsum1, 'LR', "L");
$pdf->Cell(3,1,'id_pengujian','LR',0,'C',1);
$pdf->Cell(3,1,'tgl','LR',0,'C',1);
$pdf->Cell(3,1,'jam','LR',0,'C',1);
$pdf->Cell(12,1,'komentar','LR',0,'C',1);
$pdf->Cell(3,1,'penilaian','LR',0,'C',1);
$pdf->Cell(3,1,'keterangan','LR',0,'C',1);
$pdf->Ln();
$pdf->SetFont('Arial','','8');

for ($j=0;$j<$i;$j++){
  $pdf->Cell(1,1,$j+1,'B',0,'L');         // no
  $pdf->Cell(3,1,$cell[$j][0],'B',0,'L'); // id_pengujian
  $pdf->Cell(3,1,$cell[$j][1],'B',0,'L'); // tgl
  $pdf->Cell(3,1,$cell[$j][2],'B',0,'L'); // jam
  $pdf->Cell(12,1,$cell[$j][3],'B',0,'L'); // komentar
  $pdf->Cell(3,1,$cell[$j][4],'B',0,'L'); // penilaian
  $pdf->Cell(3,1,$cell[$j][5],'B',0,'L'); // keterangan
  $pdf->Ln();
}
$pdf->Output();
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

