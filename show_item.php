<?php

function show_item_info($item_ID){


  /* import db connection header */
  require_once("./db_connect.php");
      
  /* using prepared statement */
  /* block the SQL injection */
  $sql = "SELECT * 
          FROM item 
          WHERE itemID = ?";
  
  /* prepare */
  $stmt = $s->prepare($sql);
      
  /* bind */
  $stmt->bind_param("s", $b_id);
                        
  /* set parameters */
  $b_id = $item_ID;  
      
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

         
  $stmt->close();
      
  /* disconnect db */ 
  mysqli_close($s);
      




  /* header */
  print '<html>';
  print '<head>';
  print '<meta charset="utf-8">';
  print '<title>item</title>';

  /* ref external css */
  print '<link rel="stylesheet" type="text/css" href="styles/item_N.css" />';
  print '</head>';


  /* body */
  print '<body>';



  print '<section class="content">';
  print '<main>';


  print '<div class="main">';

  print '<div class="main_info">';
  print '<div class="item_pic">pic</div>';

  print '<div class="bottom_info">'.$description3[0].'</div>';
  print '</div>';

  print '<div class="main_info">';

  print '<div class="side_info">'.$name[0].'</div>';
  print '<div class="side_info">'.$price[0].'</div>';
  print '<div class="side_info">'.$category[0].'</div>';
  print '<div class="side_info">'.$id[0].'</div>';
  print '<div class="side_info">'.$company[0].'</div>';
  print '<div class="side_info">'.$description[0].'</div>';
  print '<div class="side_info">'.$description2[0].'</div>';
  print '<div class="side_info">buy now</div>';
  print '<div class="side_info">add to cart</div>';

  print '</div>';
  print '</div>';



  print '<div class="addition_info">';
  print '<div class="addition_pic">pic1</div>';
  print '<div class="addition_pic">pic2</div>';
  print '</div>';



  print '</main>';
  print '</section>';



  print '</body>';

  print '</html>';


}


?>