<?php

  /* import classes */
  require_once("./bigDreamClasses.php");

  /* server decides the action with this variable */
  /* server acts with many if-else statements */



  function exec_admin_orderManagement($_WHAT_TO_DO){

   /* ============================================ */
    /* Order management */


    /* see order */
    if($_WHAT_TO_DO == 'SEEORDER_ORDER'){
  
      /* create new object */
      $orderO = new Order();
    
      /* set object member variable */
      $orderO->setOrderID($_POST["_orderID"]);
  
  
      echo "<br/>----------Unit Test----------";
	    echo "<br/>"."What To Do: ".$_WHAT_TO_DO;
	    echo "<br/>".$orderO->getOrderID();
  
    }


    /* see info */
    else if($_WHAT_TO_DO == 'SEEINFO_ORDER'){
  
      /* create new object */
      $orderO = new Order();
    
      /* set object member variable */
      $orderO->setOrderID($_POST["_orderID"]);
  
  
      echo "<br/>----------Unit Test----------";
	    echo "<br/>"."What To Do: ".$_WHAT_TO_DO;
	    echo "<br/>".$orderO->getOrderID();
  
    }
  
  }


?>