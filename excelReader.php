<?php

  require_once 'classes/PHPExcel/IOFactory.php';

  if(isset($_FILES['excelFile']) && !empty($_FILES['excelFile']['tmp_name'])){
    
    $excelObject = PHPExcel_IOFactory::load($_FILES['excelFile']['tmp_name']);
    
    $getSheet = $excelObject->getActiveSheet()->toArray(null);
    

	echo $getSheet[0][1];

	/* [0][0~9] 첫행 애트리뷰트 네임 */
	/* [n][*] 데이타 뽑기 */
	/* [n][k] 데이터의 특정 애트리뷰트 */

	echo $getSheet[1][6];
	
	echo "<br>";
	echo "<br>";

	/* 애트리뷰트 포함 row 갯수 */
	$arrLeng = count($getSheet);

	echo "sheet leng: ".$arrLeng;
	
	echo "<br>";
	echo "<br>";


	/* db에 때려박기 */
	/* import db connection header */
    /* connect to mysql */
	  $a = new mysqli(DB_SERVER, DB_USER, DB_PSWD, DB_NAME);
  
	  if($a->connect_error){
		die("connection failed: ". $a->connect_error);
	  }


	  $d = date('Y-m-d H:i:s', time());
  
      
      /* using prepared statement */
      /* block the SQL injection */
      $sql = "INSERT INTO item(itemID, itemName, price, category, description, description2, description3, company, date, soldout) 
              VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  
      /* prepare */
      $stmt = $a->prepare($sql);
      
      /* bind */
      $stmt->bind_param("isissssssi", 
                        $b_id, $b_name, $b_price, $b_category, $b_description, $b_description2, $b_description3,
                        $b_company, $b_d, $b_soldout);
                     
       
       /* test input */
      for($i=1; $i<$arrLeng; $i++){
                        
        /* set parameters */
        $b_id = $getSheet[$i][0];  
        $b_name = $getSheet[$i][1];  
        $b_price = $getSheet[$i][2];   
        $b_category = $getSheet[$i][3];   
		
        $b_company = $getSheet[$i][4];  

        $b_description = $getSheet[$i][5];
        $b_description2 = $getSheet[$i][6];
        $b_description3 = $getSheet[$i][7];
      
        $b_d = $d;
        $b_soldout = 0;
      

	      /* execute */
	      $stmt->execute();

	  }
      
      $stmt->close();
      
      /* disconnect db */ 
      mysqli_close($a);

	


    echo '<pre>';

    echo var_dump($getSheet);

	      echo"
        <script>
          alert('물품 등록 완료.');
          location.href='index_admin.php';
        </script>
      
      ";
	
    
    
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