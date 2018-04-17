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
      $itemO->setCategory($_POST["_categoryID"]);
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
  
    }


    /* Edit item */
    else if($_WHAT_TO_DO == 'EDIT_ITEM'){
  
      /* create new object */
      $itemO = new Item();
    
      /* set object member variable */
      $itemO->setItemID($_POST["_itemID"]);
      $itemO->setItemName($_POST["_itemName"]);
      $itemO->setPrice($_POST["_price"]);
      $itemO->setCategory($_POST["_categoryID"]);
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