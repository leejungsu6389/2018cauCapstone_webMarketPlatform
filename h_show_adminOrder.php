<head>
  <!--include style sheet-->
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<?php

  /* import db connection header */
  require_once("./db_connect.php");

  /* 관리자 주문 조회 */
function show_orderA($k){
  
  /* 1. 주문 물품, 날짜, 수령인정보 뽑기 */
  /* connect to mysql */
  $ee = new mysqli(DB_SERVER, DB_USER, DB_PSWD, DB_NAME);
  
  if($ee->connect_error){
    die("connection failed: ". $ee->connect_error);
  }

      
  /* using prepared statement */
  /* block the SQL injection */
  $sql = "SELECT * 
          FROM purchase a NATURAL JOIN user b
          WHERE a.userID = b.userID
          ORDER BY a.date DESC";
  
  /* prepare */
  $stmt = $ee->prepare($sql);
      
    /* execute */
    $stmt->execute();
      
    /* get result */
    $result = $stmt->get_result();
      
      
    while($row = $result->fetch_assoc()){
    
      $id[] = $row['itemID'];      
      $d[] = $row['date'];
      
      $rcvn[] = $row['recvName'];
      $rcvz[] = $row['recvZip'];
      $rcva[] = $row['recvAddr'];
      $rcvt[] = $row['recvTel'];
    
    }
         
    $stmt->close();
      
    /* disconnect db */ 
    mysqli_close($ee);
    
    
  if(!isset($id)){  
    $arrLeng = 0;  
  }
  else{  
    /*count array length*/
    $arrLeng = count($id);
  }
  
  
  /* 2. itemID에 해당하는 상품명, 가격 뽑기 */
    $ff = new mysqli(DB_SERVER, DB_USER, DB_PSWD, DB_NAME);
  
  if($ff->connect_error){
    die("connection failed: ". $ff->connect_error);
  }

      
  /* using prepared statement */
  /* block the SQL injection */
  $sql = "SELECT * 
          FROM item
          WHERE itemID = ?";
  
  /* prepare */
  $stmt = $ff->prepare($sql);
       
  /* bind */
  $stmt->bind_param("s", $b_id);
  
  echo "<div class='center_content'><div class='center_title_bar'>상품 목록</div>";
  
  echo "<table><tr><td><b>상품명</b></td><td><b>가격</b></td><td><b>수령인</b></td>
  <td><b>우편번호</b></td><td><b>주소</b></td><td><b>연락처</b></td><td><b>날짜</b>";
  
  echo "</td></tr>";
  
  for($i=0; $i < $arrLeng; $i++){
            
      /* set parameters */
      $b_id = $id[$i];  
      
      /* execute */
      $stmt->execute();
      
      /* get result */
      $result = $stmt->get_result();
      
      
      while($row = $result->fetch_assoc()){
    
        $nm[] = $row['itemName'];      
        $pr[] = $row['price'];
    
      }
        echo "<tr><td>".$nm[$i]."</td><td>".$pr[$i]."</td><td>".$rcvn[$i]."</td><td>"
        .$rcvz[$i]."</td><td>".$rcva[$i]."</td><td>".$rcvt[$i]."</td><td>".$d[$i];

    
    }
         
    $stmt->close();
      
    /* disconnect db */ 
    mysqli_close($ff);
  

    echo "</td></tr></table>
    
    </div>";
  
  
 
}



?>