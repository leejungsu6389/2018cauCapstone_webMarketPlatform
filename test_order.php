<?php

  /* import classes */
  require_once("./bigDreamClasses.php");

  /* server decides the action with this variable */
  /* server acts with many if-else statements */
  
  $cart_list = 


    /* Admin Page */

    /* ============================================ */
    /* item management */
  
    /* add item */
  
      /* create new object */
      $itemO = new Item();
    
      /* set object member variable */
      $itemO->setItemID($_POST["_itemID"]);
      $itemO->setItemName($_POST["_itemName"]);
      $itemO->setPrice($_POST["_price"]);
      $itemO->setCategory($_POST["_category"]);
      $itemO->setCompany($_POST["_company"]);
      $itemO->setDescription($_POST["_description"]);
      $itemO->setDescription2($_POST["_description2"]);
      $itemO->setDescription3($_POST["_description3"]);
  
  
      echo "<br/>----------Unit Test----------";
	    echo "<br/>"."What To Do: ".$_WHAT_TO_DO;
	    echo "<br/>".$itemO->getItemID();
	    echo "<br/>".$itemO->getItemName();
	    echo "<br/>".$itemO->getPrice();
	    echo "<br/>".$itemO->getCategory();
	    echo "<br/>".$itemO->getCompany();
	    echo "<br/>".$itemO->getDescription();
	    echo "<br/>".$itemO->getDescription2();
	    echo "<br/>".$itemO->getDescription3();
      
      
      /* import db connection header */
      require_once("./db_connect.php");
  
      
      /* using prepared statement */
      /* block the SQL injection */
      $sql = "INSERT INTO item(itemID, itemName, price, category, description, description2, description3, company, img_path) 
              VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
  
      /* prepare */
      $stmt = $s->prepare($sql);
      
      /* bind */
      $stmt->bind_param("isissssss", 
                        $b_id, $b_name, $b_price, $b_category, $b_description, $b_description2, $b_description3,
                        $b_company, $b_img_path);
                        
       
       /* test input */
      for($i=0; $i<1000; $i++){
                        
        /* set parameters */
        $b_id = 200+$i;  
        $b_name = "testName".$i;  
        $b_price = 200 + $i;   
        $b_category = $i%10;   
        $b_description = "testD1".$i;
        $b_description2 = "testD2".$i;
        $b_description3 = "testD3".$i;
      
        $b_company = "testC".$i;  
        $b_img_path = "nothing yet";  
      
        /* execute */
        $stmt->execute();
      
      }
      
      $stmt->close();
      
      /* disconnect db */ 
      mysqli_close($s);
  
    





?>