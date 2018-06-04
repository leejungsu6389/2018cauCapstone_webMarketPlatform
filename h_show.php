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
      
  if($result->num_rows==0) exit('No rows');
      
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
   
   echo "lengtest".$arrLeng."<br/>";

         
  $stmt->close();
      

  
        
  /* paging */
  
  if(!isset($_GET['page'])){
    $page = 1;
  }
  else{  
    $page = $_GET['page'];
  }
  
  $data_per_page = 9;

  $pageNumber = ceil($arrLeng/$data_per_page);
  
  echo "총 페이지수 ".$pageNumber."\n";
  
  
  for($i=0; $i<$arrLeng; $i++){    
  
    /* 상품의 정렬번호 */
    $j = $i+1;
    
    /* 상품이 속한 페이지 */
    $p = ceil($j/$data_per_page);
    
    /* 페이지에 해당하는 놈들만 출력 */
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
          <div class='prod_details_tab'> <a href='#' class='prod_buy'>Add to Cart</a> <a href='#' class='prod_details'>Details</a> </div>
        </div>
       
         ";
       
       }
       
     }

  echo "<br><br>";
  
  /* make page numbers */
  for($i=1; $i <= $pageNumber; $i++){
  
    $j = $i;
    echo " [";
    echo "<a href ='h_showItemList.php?category=".$category_name."&page=".$j."'>".$j."</a>";
    echo "] ";
    
  }
  
  echo "
         </div>";

}

?>