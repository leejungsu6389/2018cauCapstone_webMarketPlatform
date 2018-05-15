<?php

function search_item_category($category_name){


  /* import db connection header */
  require_once("./db_connect.php");
      
  /* using prepared statement */
  /* block the SQL injection */
  $sql = "SELECT * 
          FROM item 
          WHERE category = ?";
  
  /* prepare */
  $stmt = $s->prepare($sql);
      
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
      
  }

  var_export($id);
  var_export($name);
  var_export($price);
  var_export($category);
  var_export($company);
  var_export($description);
  var_export($description2);
  var_export($description3);
         
  $stmt->close();
      
  /* disconnect db */ 
  mysqli_close($s);
      


}


?>