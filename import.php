
    <html>
    <head>
    <title>How To Import Excel (.xls) File To MySql Database Using PHP</title>
    </head>
    <body>
    <center><h1>lp2maray</h1></center>
    <form name="import_export_form" method="post" action="import.php" enctype="multipart/form-data">
    <label>Select Excel File : </label><input type="file" name="excelfile"/><br>
    <input type="submit" name="form_submit"/>
    </form>
    </body>
    </html>


<?php
 if(isset($_POST['form_submit'])){
		require_once 'Excel/reader.php';
		$data = new Spreadsheet_Excel_Reader();
		$data->setOutputEncoding('CP1251');
		$filename = $_FILES['excelfile']['tmp_name'];
		$data->read($filename);//'Book1.xls');
		 
		//$conn = mysql_connect("localhost","root","");
		//mysql_select_db("test",$conn);
		 
		for ($x = 2; $x <= count($data->sheets[0]["cells"]); $x++) {
			$first = $data->sheets[0]["cells"][$x][1];
			$middle = $data->sheets[0]["cells"][$x][2];
			$last = $data->sheets[0]["cells"][$x][3];
			$sql = "INSERT INTO mytable (First,Middle,Last) VALUES ('$first','$middle','$last')";
			echo $sql."\n";
		//mysql_query($sql);
		}
 
 
 }
?>