<head>
  <!--include style sheet-->
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<?php



  /* import db connection header */
  require_once("./db_connect.php");
  
      echo '<div class="left_content">
      <div class="title_box">카테고리</div>
      <ul class="left_menu">
      ';
     
        
        
      /* using prepared statement */
      /* block the SQL injection */
      $sql = "SELECT * 
              FROM categoryList
              ORDER BY orderNumber ASC";
  
      /* prepare */
      $stmt = $s->prepare($sql);
          
      /* execute */
      $stmt->execute();
      
      /* get result */
      $result = $stmt->get_result();
      

      while($row = $result->fetch_assoc()){
      
        $od[] = $row['orderNumber'];
        $name[] = $row['cName'];
      
      }
         
      $stmt->close();
      
      
      if(!isset($od)){
  
      echo '<li class="odd">"카테고리 없음"</li>';
  
      }
      else{
  
        /*count array length*/
        $arrLeng = count($od);
  
  
        /* make categories */
        for($i=0; $i < $arrLeng; $i++){
  
          if($i%2 == 0){
            echo '<li class="odd"><a href="index.php?category='.$name[$i].'">'.$name[$i].'</a></li>';
          }
          else {
            echo '<li class="even"><a href="index.php?category='.$name[$i].'">'.$name[$i].'</a></li>';
          }
  
        }
  
      }

  echo "
  </ul>
  </div>
  <!-- end of left content -->
  ";
  
  
  /* disconnect db */ 
  mysqli_close($s);












/* 카테고리별 검색 */
function search_c($q){
  $category_name = $q;
  
  /* connect to mysql */
  $k = new mysqli(DB_SERVER, DB_USER, DB_PSWD, DB_NAME);
  
  if($k->connect_error){
    die("connection failed: ". $k->connect_error);
  }

      
  /* using prepared statement */
  /* block the SQL injection */
  $sql = "SELECT * 
          FROM item 
          WHERE category = ?
          ORDER BY date DESC";
  
  /* prepare */
  $stmt = $k->prepare($sql);
      
  /* bind */
  $stmt->bind_param("s", $b_category);
                        
  /* set parameters */
  $b_category = $category_name;  
      
  /* execute */
  $stmt->execute();
      
  /* get result */
  $result = $stmt->get_result();
      
  if($result->num_rows==0) {
  
    echo "검색 결과가 없습니다.  
    ";
  
  };
      
  while($row = $result->fetch_assoc()){
      
    $id[] = $row['itemID'];
    $name[] = $row['itemName'];
    $price[] = $row['price'];
    $category[] = $row['category'];
    $company[] = $row['company'];
    $description[] = $row['description'];
    $description2[] = $row['description2'];
    $description3[] = $row['description3'];
    $d[] = $row['date'];
    
    $isSoldout[] = $row['soldout'];
  }
  
    if(!isset($id)){  
      $arrLeng = 0;  
    }
    else{  
      /*count array length*/
     $arrLeng = count($id);
    }
    
   /*
   echo "데이터수: ".$arrLeng."<br/>";
         */
         
  $stmt->close();
      
  /* disconnect db */ 
  mysqli_close($k);
  
        
  /* paging */
  
  
  if(!isset($_GET['page'])){
    $page = 1;
  }
  else{  
    $page = $_GET['page'];
  }
  
  $data_per_page = 9;
  $pageNumber = ceil($arrLeng/$data_per_page);
  
  /*
  echo "총 페이지수 ".$pageNumber."\n";
  */
  
  for($i=0; $i<$arrLeng; $i++){    
  
    /* 상품의 정렬번호 */
    $j = $i+1;
    
    /* 상품이 속한 페이지 */
    $p = ceil($j/$data_per_page);
    
    
    /* 페이지에 해당하는 놈들만 출력 */
    /*
    if($p == $page){
    
      echo "<br><br><b>정렬번호:".$j."</b>";
      echo "<br><b>페이지번호:".$p."</b>";
      echo "<br>상품id: ".$id[$i];
      echo "<br>상품명: ".$name[$i];
      echo "<br>가격: ".$price[$i];
      echo "<br>카테고리: ".$category[$i];
      echo "<br>제조사: ".$company[$i];
      echo "<br>설명1: ".$description[$i];
      echo "<br>설명2: ".$description2[$i];
      echo "<br>설명3: ".$description3[$i];
      echo "<br>등록일: ".$d[$i];
      echo "<br>품절: ".$isSoldout[$i];
    }
    */

  }
  
    /* 페이지내 상품 출력 */
    
    $start = ($page - 1)*$data_per_page;
    
    echo "<table><tr><td>";
  	echo "<div class='center_content'>
          <div class='center_title_bar'>상품 목록</div>";
    
    for($i=$start; $i < $start + $data_per_page; $i++){
    
      if($i < $arrLeng){
      
        echo "
        <div class='prod_box'>
          <div class='center_prod_box'>
            <div class='product_title'><a href='#'>";
          
            /* 상품명 */
            $namej = $name[$i];
            echo $namej."</a></div>
            <div class='product_img'><a href='#'><img src='images/"; 
          
            /* 상품id */
            $idj = $id[$i];
            echo "$idj".".jpg' alt='' border='0' /></a></div>
            <div class='prod_price'><span class='price'>";
            
            /* 상품 가격 */
            $pri = $price[$i];
            echo $pri."원</span></div>
          </div>
          
          <div class='prod_details_tab'>
          
          ";
          
          echo "<a href='index.php?category=".$category_name."&page=".$page."&addCart=".$idj."' class='prod_buy'>장바구니</a> 
          
          <a title ='상품명: ".$name[$i]."\n가격: ".$price[$i]
          ."원\n제조사: ".$company[$i]."\n".$description[$i]." ".$description2[$i]."\n".$description3[$i]."' 
          class ='prod_details'>상품정보</a> </div>
        </div>
       
         ";
       
       }
       
     }

  echo "<br><br>";
  
  echo "</td></tr>";
  echo "<tr><td>";
  

  
  echo '<table class="centered"><tr><td>';
  /* make page numbers */
  for($i=1; $i <= $pageNumber; $i++){
  
    $j = $i;
    echo " [";
    echo "<a href ='index.php?category=".$category_name."&page=".$j."'>".$j."</a>";
    echo "] ";
    
  }
  
  echo '</td></tr></table>';
  echo "</td></tr></table>";
  
  echo "
         </div>";

}













/* 상품명으로 검색 */
function search_n($q){
  $nn = $q;
  
  /* connect to mysql */
  $l = new mysqli(DB_SERVER, DB_USER, DB_PSWD, DB_NAME);
  
  if($l->connect_error){
    die("connection failed: ". $l->connect_error);
  }

      
  /* using prepared statement */
  /* block the SQL injection */
  $sql = "SELECT * 
          FROM item 
          WHERE itemName LIKE ?
          ORDER BY date DESC";
  
  /* prepare */
  $stmt = $l->prepare($sql);
      
  /* bind */
  $stmt->bind_param("s", $b_name);
                        
  /* set parameters */
  $b_name = "%" . $nn . "%";  
      
  /* execute */
  $stmt->execute();
      
  /* get result */
  $result = $stmt->get_result();
      
      
  while($row = $result->fetch_assoc()){
      
    $id[] = $row['itemID'];
    $name[] = $row['itemName'];
    $price[] = $row['price'];
    $category[] = $row['category'];
    $company[] = $row['company'];
    $description[] = $row['description'];
    $description2[] = $row['description2'];
    $description3[] = $row['description3'];
    $d[] = $row['date'];
    
    $isSoldout[] = $row['soldout'];
  }
  
    if(!isset($id)){  
      $arrLeng = 0;  
    }
    else{  
      /*count array length*/
     $arrLeng = count($id);
    }
    
    /*
   echo "데이터수: ".$arrLeng."<br/>";
         */
         
  $stmt->close();
      
  /* disconnect db */ 
  mysqli_close($l);
  
        
  /* paging */
  
  
  if(!isset($_GET['page'])){
    $page = 1;
  }
  else{  
    $page = $_GET['page'];
  }
  
  $data_per_page = 9;
  $pageNumber = ceil($arrLeng/$data_per_page);
  
  /*
  echo "총 페이지수 ".$pageNumber."\n";
  */
  
  for($i=0; $i<$arrLeng; $i++){    
  
    /* 상품의 정렬번호 */
    $j = $i+1;
    
    /* 상품이 속한 페이지 */
    $p = ceil($j/$data_per_page);
    
    
    /* 페이지에 해당하는 놈들만 출력 */
    /*
    if($p == $page){
    
      echo "<br><br><b>정렬번호:".$j."</b>";
      echo "<br><b>페이지번호:".$p."</b>";
      echo "<br>상품id: ".$id[$i];
      echo "<br>상품명: ".$name[$i];
      echo "<br>가격: ".$price[$i];
      echo "<br>카테고리: ".$category[$i];
      echo "<br>제조사: ".$company[$i];
      echo "<br>설명1: ".$description[$i];
      echo "<br>설명2: ".$description2[$i];
      echo "<br>설명3: ".$description3[$i];
      echo "<br>등록일: ".$d[$i];
      echo "<br>품절: ".$isSoldout[$i];
    }
    */

  }
  
    /* 페이지내 상품 출력 */
    
    $start = ($page - 1)*$data_per_page;
    
    
  	echo "<div class='center_content'>
          <div class='center_title_bar'>상품 목록</div>";
    
    for($i=$start; $i < $start + $data_per_page; $i++){
    
      if($i < $arrLeng){
      
        echo "
        <div class='prod_box'>
          <div class='center_prod_box'>
            <div class='product_title'><a href='#'>";
          
            /* 상품명 */
            $namej = $name[$i];
            echo $namej."</a></div>
            <div class='product_img'><a href='#'><img src='images/"; 
          
            /* 상품id */
            $idj = $id[$i];
            echo "$idj".".jpg' alt='' border='0' /></a></div>
            <div class='prod_price'><span class='price'>";
            
            /* 상품 가격 */
            $pri = $price[$i];
            echo $pri."원</span></div>
          </div>
          <div class='prod_details_tab'>
          ";
          
          echo "<a href='index.php?search=".$nn."&page=".$page."&addCart=".$idj."' class='prod_buy'>장바구니</a> 
          
                    <a title ='상품명: ".$name[$i]."\n상품코드: ".$id[$i]."\n가격: ".$price[$i]
          ."원\n제조사: ".$company[$i]."\n".$description[$i]."\n".$description2[$i]."\n".$description3[$i]."' 
          class ='prod_details'>상품정보</a> </div>
        </div>
       
         ";
       
       }
       
     }

  echo "<br><br>";
  
  echo "<table><tr><td>";
  
  /* make page numbers */
  for($i=1; $i <= $pageNumber; $i++){
  
    $j = $i;
    echo " [";
    echo "<a href ='index.php?search=".$nn."&page=".$j."'>".$j."</a>";
    echo "] ";
    
  }
  
  echo "</td></tr></table>";
  
  echo "
         </div>";

}







/* 최신 상품 */
function recent_item(){
  
  $data_per_page = 9;
  
  /* connect to mysql */
  $o = new mysqli(DB_SERVER, DB_USER, DB_PSWD, DB_NAME);
  
  if($o->connect_error){
    die("connection failed: ". $o->connect_error);
  }

      
  /* using prepared statement */
  /* block the SQL injection */
  $sql = "SELECT * 
          FROM item 
          ORDER BY date DESC
          LIMIT ?";
  
  /* prepare */
  $stmt = $o->prepare($sql);
      
  /* bind */
  $stmt->bind_param("s", $b_name);
                        
  /* set parameters */
  $b_name = $data_per_page;  
      
  /* execute */
  $stmt->execute();
      
  /* get result */
  $result = $stmt->get_result();
      
      
  while($row = $result->fetch_assoc()){
      
    $id[] = $row['itemID'];
    $name[] = $row['itemName'];
    $price[] = $row['price'];
    $category[] = $row['category'];
    $company[] = $row['company'];
    $description[] = $row['description'];
    $description2[] = $row['description2'];
    $description3[] = $row['description3'];
    $d[] = $row['date'];
    
    $isSoldout[] = $row['soldout'];
  }
  
    if(!isset($id)){  
      $arrLeng = 0;  
    }
    else{  
      /*count array length*/
     $arrLeng = count($id);
    }
    
    /*
   echo "데이터수: ".$arrLeng."<br/>";
         */
         
  $stmt->close();
      
  /* disconnect db */ 
  mysqli_close($o);
  
        
  /* paging */
  
  
  if(!isset($_GET['page'])){
    $page = 1;
  }
  else{  
    $page = $_GET['page'];
  }
  
  
  $pageNumber = ceil($arrLeng/$data_per_page);
  
  /*
  echo "총 페이지수 ".$pageNumber."\n";
  */
  
  for($i=0; $i<$arrLeng; $i++){    
  
    /* 상품의 정렬번호 */
    $j = $i+1;
    
    /* 상품이 속한 페이지 */
    $p = ceil($j/$data_per_page);
    
    
    /* 페이지에 해당하는 놈들만 출력 */
    /*
    if($p == $page){
    
      echo "<br><br><b>정렬번호:".$j."</b>";
      echo "<br><b>페이지번호:".$p."</b>";
      echo "<br>상품id: ".$id[$i];
      echo "<br>상품명: ".$name[$i];
      echo "<br>가격: ".$price[$i];
      echo "<br>카테고리: ".$category[$i];
      echo "<br>제조사: ".$company[$i];
      echo "<br>설명1: ".$description[$i];
      echo "<br>설명2: ".$description2[$i];
      echo "<br>설명3: ".$description3[$i];
      echo "<br>등록일: ".$d[$i];
      echo "<br>품절: ".$isSoldout[$i];
    }
    */

  }
  
    /* 페이지내 상품 출력 */
    
    $start = ($page - 1)*$data_per_page;
    
    
  	echo "<div class='center_content'>
          <div class='center_title_bar'>최신 상품</div>";
    
    for($i=$start; $i < $start + $data_per_page; $i++){
    
      if($i < $arrLeng){
      
        echo "
        <div class='prod_box'>
          <div class='center_prod_box'>
            <div class='product_title'><a href='#'>";
          
            /* 상품명 */
            $namej = $name[$i];
            echo $namej."</a></div>
            <div class='product_img'><a href='#'><img src='images/"; 
          
            /* 상품id */
            $idj = $id[$i];
            echo "$idj".".jpg' alt='' border='0' /></a></div>
            <div class='prod_price'><span class='price'>";
            
            /* 상품 가격 */
            $pri = $price[$i];
            echo $pri."원</span></div>
          </div>
          
          <div class='prod_details_tab'>";
          
          echo "<a href='index.php?addCart=".$idj."' class='prod_buy'>장바구니</a> 
                   <a title ='상품명: ".$name[$i]."\n상품코드: ".$id[$i]."\n가격: ".$price[$i]
          ."원\n제조사: ".$company[$i]."\n".$description[$i]."\n".$description2[$i]."\n".$description3[$i]."' 
          class ='prod_details'>상품정보</a> </div>
         
        </div>
       
         ";
       
       }
       
     }

  echo "<br><br>";
  
  
  echo "
         </div>";

}







/* 장바구니 표시 */
function show_cart($uid){
  
  /* connect to mysql */
  $p = new mysqli(DB_SERVER, DB_USER, DB_PSWD, DB_NAME);
  
  if($p->connect_error){
    die("connection failed: ". $p->connect_error);
  }

      
  /* using prepared statement */
  /* block the SQL injection */
  $sql = "SELECT * 
          FROM cart a NATURAL JOIN item b
          WHERE a.userID = ? AND a.itemID = b.itemID
          ORDER BY itemName ASC";
  
  /* prepare */
  $stmt = $p->prepare($sql);
      
  /* bind */
  $stmt->bind_param("s", $b_id);
  
          
    /* set parameters */
    $b_id = $uid;  
      
    /* execute */
    $stmt->execute();
      
    /* get result */
    $result = $stmt->get_result();
      
      
    while($row = $result->fetch_assoc()){
      
      $id[] = $row['itemID'];
      $name[] = $row['itemName'];
      $price[] = $row['price'];
      $category[] = $row['category'];
      $company[] = $row['company'];
      $description[] = $row['description'];
      $description2[] = $row['description2'];
      $description3[] = $row['description3'];
      $d[] = $row['date'];
    
      $isSoldout[] = $row['soldout'];
    }
   
  
  
  
  

         
  $stmt->close();
      
  /* disconnect db */ 
  mysqli_close($p);
  
  
  
  if(!isset($id)){  
    $arrLeng = 0;  
  }
  else{  
    /*count array length*/
    $arrLeng = count($id);
  }
  
  
  $total = 0;
  
  for($i=0; $i < $arrLeng; $i++){
    $j = $i+1;
      echo '<br>'.$j.'. '.$name[$i];
      
      echo '<br>';
    
    $total += $price[$i];
  }
  
    echo "<br><br><b>합계: ".$total."원</b><br>";
  


}




/* 장바구니 넣기 */
function add_cart($uid, $iid){
  
  /* connect to mysql */
  $q = new mysqli(DB_SERVER, DB_USER, DB_PSWD, DB_NAME);
  
  if($q->connect_error){
    die("connection failed: ". $q->connect_error);
  }

      
  /* using prepared statement */
  /* block the SQL injection */
  $sql = "INSERT  
          INTO cart(userID, itemID)
          VALUES(?,?)";
  
  /* prepare */
  $stmt = $q->prepare($sql);
      
  /* bind */
  $stmt->bind_param("si", $b_uid, $b_iid);
  

  /* set parameters */
  $b_uid = $uid;  
  $b_iid = $iid;  
      
  /* execute */
  $stmt->execute();


         
  $stmt->close();
      
  /* disconnect db */ 
  mysqli_close($q);
  
  


}



/* 장바구니 비우기 */
function clear_cart($uid){
  
  /* connect to mysql */
  $r = new mysqli(DB_SERVER, DB_USER, DB_PSWD, DB_NAME);
  
  if($r->connect_error){
    die("connection failed: ". $r->connect_error);
  }

      
  /* using prepared statement */
  /* block the SQL injection */
  $sql = "DELETE  
          FROM cart
          WHERE userID = ?";
  
  /* prepare */
  $stmt = $r->prepare($sql);
      
  /* bind */
  $stmt->bind_param("s", $b_uid);
  

  /* set parameters */
  $b_uid = $uid;  
      
  /* execute */
  $stmt->execute();


         
  $stmt->close();
      
  /* disconnect db */ 
  mysqli_close($r);
  
  


}






/* 주문 조회 */
function show_order($uid){
  
  /* 1. 주문 물품, 날짜, 수령인정보 뽑기 */
  /* connect to mysql */
  $e = new mysqli(DB_SERVER, DB_USER, DB_PSWD, DB_NAME);
  
  if($e->connect_error){
    die("connection failed: ". $e->connect_error);
  }

      
  /* using prepared statement */
  /* block the SQL injection */
  $sql = "SELECT * 
          FROM purchase a NATURAL JOIN user b
          WHERE a.userID = b.userID AND a.userID = ?
          ORDER BY a.date DESC";
  
  /* prepare */
  $stmt = $e->prepare($sql);
      
  /* bind */
  $stmt->bind_param("s", $b_id);
  
          
    /* set parameters */
    $b_id = $uid;  
      
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
    mysqli_close($e);
    
    
  if(!isset($id)){  
    $arrLeng = 0;  
  }
  else{  
    /*count array length*/
    $arrLeng = count($id);
  }
  
  
  /* 2. itemID에 해당하는 상품명, 가격 뽑기 */
    $f = new mysqli(DB_SERVER, DB_USER, DB_PSWD, DB_NAME);
  
  if($f->connect_error){
    die("connection failed: ". $f->connect_error);
  }

      
  /* using prepared statement */
  /* block the SQL injection */
  $sql = "SELECT * 
          FROM item
          WHERE itemID = ?";
  
  /* prepare */
  $stmt = $f->prepare($sql);
       
  /* bind */
  $stmt->bind_param("s", $b_id);
  
  echo "<table><tr><td><b>상품명</b></td><td>가격</td><td>수령인</td><td>우편번호</td><td>주소</td><td>연락처</td>";
  
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
      echo "<tr><td>".$nm[$i]."</td><td>".$pr[$i]."</td><td>".$rcvn[$i]."</td><td>".$rcvz[$i]."</td><td>".$rcva[$i]
      ."</td><td>".$rcvt[$i];
    
    
    }
         
    $stmt->close();
      
    /* disconnect db */ 
    mysqli_close($f);
  

    echo "</td></tr></table>";
  
  
  


}






?>