<?php

  /* import db connection header */
  require_once("./db_connect.php");
      
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
      
  /* disconnect db */ 
  mysqli_close($s);
  


  
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
  
  
  
  
  

      

?>