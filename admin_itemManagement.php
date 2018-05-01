<?php

  /* import classes */
  require_once("./bigDreamClasses.php");

  /* server decides the action with this variable */
  /* server acts with many if-else statements */



  function exec_admin_itemManagement($_WHAT_TO_DO){

    /* Admin Page */

    /* ============================================ */
    /* item management */
  
    /* add item */
    if($_WHAT_TO_DO == 'ADD_ITEM'){
  
      /* create new object */
      $itemO = new Item();
    
      /* set object member variable */
      $itemO->setItemID($_POST["_itemID"]);
      $itemO->setItemName($_POST["_itemName"]);
      $itemO->setPrice($_POST["_price"]);
      $itemO->setCategory($_POST["_category"]);
      $itemO->setCompany($_POST["_description"]);
      $itemO->setDescription($_POST["_company"]);
  
  
      echo "<br/>----------Unit Test----------";
	    echo "<br/>"."What To Do: ".$_WHAT_TO_DO;
	    echo "<br/>".$itemO->getItemID();
	    echo "<br/>".$itemO->getItemName();
	    echo "<br/>".$itemO->getPrice();
	    echo "<br/>".$itemO->getCategory();
	    echo "<br/>".$itemO->getCompany();
	    echo "<br/>".$itemO->getDescription();
      
      
      /* import db connection header */
      require_once("./db_connect.php");
  
      
      /* using prepared statement */
      /* block the SQL injection */
      $sql = "INSERT INTO item(itemID, itemName, price, category, description, company, img_path) 
              VALUES(?, ?, ?, ?, ?, ?, ?)";
  
      /* prepare */
      $stmt = $s->prepare($sql);
      
      /* bind */
      $stmt->bind_param("isissss", 
                        $b_id, $b_name, $b_price, $b_category, $b_description,
                        $b_company, $b_img_path);
                        
      /* set parameters */
      $b_id = $itemO->getItemID();  
      $b_name = $itemO->getItemName();  
      $b_price = $itemO->getPrice();  
      $b_category = $itemO->getCategory();  
      $b_description = $itemO->getDescription();  
      
      $b_company = $itemO->getCompany();  
      $b_img_path = "nothing yet";  
      
      /* execute */
      $stmt->execute();
      
      $stmt->close();
      
      /* disconnect db */ 
      mysqli_close($s);
  
    }


    /* Edit item */
    else if($_WHAT_TO_DO == 'EDIT_ITEM'){
  
      /* item's original ID */
      $org_id = $_POST["_org_itemID"];
  
          
      /* create new object */
      $itemO = new Item();
    
      /* set object member variable */
      $itemO->setItemID($_POST["_itemID"]);
      $itemO->setItemName($_POST["_itemName"]);
      $itemO->setPrice($_POST["_price"]);
      $itemO->setCategory($_POST["_category"]);
      $itemO->setCompany($_POST["_description"]);
      $itemO->setDescription($_POST["_company"]);
  
  
      echo "<br/>----------Unit Test----------";
	    echo "<br/>"."What To Do: ".$_WHAT_TO_DO;
	    echo "<br/>".$itemO->getItemID();
	    echo "<br/>".$itemO->getItemName();
	    echo "<br/>".$itemO->getPrice();
	    echo "<br/>".$itemO->getCategory();
	    echo "<br/>".$itemO->getCompany();
	    echo "<br/>".$itemO->getDescription();
            
      
      
      /* import db connection header */
      require_once("./db_connect.php");
  
      
      /* using prepared statement */
      /* block the SQL injection */
      $sql = "UPDATE item
              SET itemID = ?, itemName = ?, price = ?, category = ?, description = ?, company = ?, img_path = ?
              WHERE itemID = ?";
  
      /* prepare */
      $stmt = $s->prepare($sql);
      
      /* bind */
      $stmt->bind_param("isissssi", 
                        $b_id, $b_name, $b_price, $b_category, $b_description, $b_company, $b_img_path,
                        $b_org_itemID);
                        
      /* set parameters */
      $b_id = $itemO->getItemID();  
      $b_name = $itemO->getItemName();  
      $b_price = $itemO->getPrice();  
      $b_category = $itemO->getCategory();  
      $b_description = $itemO->getDescription();  
      
      $b_company = $itemO->getCompany();  
      $b_img_path = "nothing yet";  
      
      $b_org_itemID = $org_id;
      
      /* execute */
      $stmt->execute();
      
      $stmt->close();
      
      /* disconnect db */ 
      mysqli_close($s);
  
  
    }


    /* Del item */
    else if($_WHAT_TO_DO == 'DEL_ITEM'){
  
      /* create new object */
      $itemO = new Item();
    
      /* set object member variable */
      $itemO->setItemID($_POST["_itemID"]);
  
  
      echo "<br/>----------Unit Test----------";
	    echo "<br/>"."What To Do: ".$_WHAT_TO_DO;
	    echo "<br/>".$itemO->getItemID();
      
      
      /* import db connection header */
      require_once("./db_connect.php");
  
      
      /* using prepared statement */
      /* block the SQL injection */
      $sql = "DELETE FROM item
              WHERE itemID = ?";
  
      /* prepare */
      $stmt = $s->prepare($sql);
      
      /* bind */
      $stmt->bind_param("i", 
                        $b_id);
                        
      /* set parameters */
      $b_id = $itemO->getItemID(); 
    
      
      /* execute */
      $stmt->execute();
      
      $stmt->close();
      
      /* disconnect db */ 
      mysqli_close($s);
  
    }


    /* Sold out item */
    else if($_WHAT_TO_DO == 'SOLDOUT_ITEM'){
  
      /* create new object */
      $itemO = new Item();
    
      /* set object member variable */
      $itemO->setItemID($_POST["_itemID"]);
  
  
      echo "<br/>----------Unit Test----------";
	    echo "<br/>"."What To Do: ".$_WHAT_TO_DO;
	    echo "<br/>".$itemO->getItemID();
  
    }
  
  }


?>