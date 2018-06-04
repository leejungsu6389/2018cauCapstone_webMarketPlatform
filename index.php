<?php

  require_once 'classes/PHPExcel/IOFactory.php';

  if(isset($_FILES['excelFile']) && !empty($_FILES['excelFile']['tmp_name'])){
    
    $excelObject = PHPExcel_IOFactory::load($_FILES['excelFile']['tmp_name']);
    
    $getSheet = $excelObject->getActiveSheet()->toArray(null);
    
    echo '<pre>';
    echo json_encode($getSheet);
    
    echo var_dump($getSheet);
    
    
  }
?>


<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data">
		<input type="file" name="excelFile">
		<input type="submit" value="Submit">
	</form>
</body>

</html>