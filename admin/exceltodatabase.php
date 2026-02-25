<?php

include_once '../dbconnect.php';
require 'Classes/PHPExcel/IOFactory.php';
	
$inputfilename = "List/Student/".$branch.$semester.$section.".".$student_FileType;
$exceldata = array();

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
 
//  Read your Excel workbook
try
{
    $inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
    $objReader = PHPExcel_IOFactory::createReader($inputfiletype);
	$objPHPExcel = $objReader->load($inputfilename);
	

}
catch(Exception $e)
{
	die('Error loading file "'.pathinfo($inputfilename,PATHINFO_BASENAME).'": '.$e->getMessage());
}
 
//  Get worksheet dimensions
$sheet = $objPHPExcel->getSheet(0); 
$highestRow = $sheet->getHighestRow(); 
$highestColumn = $sheet->getHighestColumn();

 
//  Loop through each row of the worksheet in turn
for ($row = 1; $row <= $highestRow; $row++)
{ 
    //  Read a row of data into an array
    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
	
    //  Insert row data array into your database of choice here
	$sql = "INSERT INTO student_details (student_id,student_pass,student_name,student_branch,student_section,student_semester,student_cgpa,student_email)
			VALUES ('".$rowData[0][0]."', '".$rowData[0][1]."', '".$rowData[0][2]."', '".$rowData[0][3]."', '".$rowData[0][4]."', '".$rowData[0][5]."', '".$rowData[0][6]."', '".$rowData[0][7]."')";
	
	if (mysqli_query($connection, $sql)) {
		$exceldata[] = $rowData[0];
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($connection);
	}
	$folder = "../student/Cloud Storage/StudentArea/".$rowData[0][0];
	mkdir($folder);
}




 
mysqli_close($connection);
?>