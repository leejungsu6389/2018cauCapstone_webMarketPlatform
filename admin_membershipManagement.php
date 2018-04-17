<?php

  /* import classes */
  require_once("./bigDreamClasses.php");

  /* server decides the action with this variable */
  /* server acts with many if-else statements */



  function exec_admin_membershipManagement($_WHAT_TO_DO){

    /* Admin Page */

    /* ============================================ */
    /* Membership management */


    /* point manage */
    if($_WHAT_TO_DO == 'POINTMANAGE_MEMBERSHIP'){
  
      /* create new object */
      $userO = new User();
    
      /* set object member variable */
      $userO->setID($_POST["_userID"]);
      $userO->setPoint($_POST["_mileage"]);
  
  
      echo "<br/>----------Unit Test----------";
	    echo "<br/>"."What To Do: ".$_WHAT_TO_DO;
	    echo "<br/>".$userO->getID();
	    echo "<br/>".$userO->getPoint();
  
    }


    /* ret info */
    else if($_WHAT_TO_DO == 'RETINFO_MEMBERSHIP'){
  
      /* create new object */
      $userO = new User();
    
      /* set object member variable */
      $userO->setID($_POST["_userID"]);
  
  
      echo "<br/>----------Unit Test----------";
	    echo "<br/>"."What To Do: ".$_WHAT_TO_DO;
	    echo "<br/>".$userO->getID();
  
    }


    /* ban */
    else if($_WHAT_TO_DO == 'BAN_MEMBERSHIP'){
  
      /* create new object */
      $userO = new User();
    
      /* set object member variable */
      $userO->setID($_POST["_userID"]);
  
  
      echo "<br/>----------Unit Test----------";
	    echo "<br/>"."What To Do: ".$_WHAT_TO_DO;
	    echo "<br/>".$userO->getID();
  
    }
  
  }


?>