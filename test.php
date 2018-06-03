<?php

require_once('./PHPExcel/IOFactory.php');
 
$file = './test.xlsx';
 
try {
    $inputFileType = PHPExcel_IOFactory::identify($file);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($file);
} catch(Exception $e) {
    die('Error loading file "'.pathinfo($file, PATHINFO_BASENAME).'" : '.$e->getMessage());
}
 
$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
 
print_r($sheetData);

var_export($sheetData);


?>