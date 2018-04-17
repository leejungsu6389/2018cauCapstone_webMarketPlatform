<?php

  /* import classes */
  require_once("./bigDreamClasses.php");

  /* server decides the action with this variable */
  /* server acts with many if-else statements */



  function exec_user_order($_WHAT_TO_DO){

  
    /* ============================================ */
    /* USER PAGE */
    /* ============================================ */


    /* ============================================ */
    /* user - Order Module */


    /* order - check order */
    if($_WHAT_TO_DO == 'CHECKORDER_ORDER'){
  
      /* create new object */
      $orderO = new Order();
    
      /* set object member variable */
      $orderO->setOrderID($_POST["_orderID"]);
  
  
      echo "<br/>----------Unit Test----------";
	    echo "<br/>"."What To Do: ".$_WHAT_TO_DO;
	    echo "<br/>".$orderO->getOrderID();
  
  
    }


    /* order - cancel order */
    else if($_WHAT_TO_DO == 'CANCELORDER_ORDER'){
  
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