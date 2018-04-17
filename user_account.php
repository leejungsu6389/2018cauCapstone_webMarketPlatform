<?php

  /* import classes */
  require_once("./bigDreamClasses.php");

  /* server decides the action with this variable */
  /* server acts with many if-else statements */



  function exec_user_account($_WHAT_TO_DO){

  
    /* ============================================ */
    /* USER PAGE */
    /* ============================================ */


    /* ============================================ */
    /* Account Module */


    /* Account: join */
    if($_WHAT_TO_DO == 'JOIN_ACCOUNT'){
  
      /* create new object */
      $userO = new User();
    
      /* set object member variable */
      $userO->setID($_POST["_userID"]);
      $userO->setPswd($_POST["_pswd"]);
      $userO->setName($_POST["_name"]);
      $userO->setDate($_POST["_joined_date"]);
      $userO->setZipCode($_POST["_zipCode"]);
      $userO->setAddress($_POST["_address"]);
      $userO->setEmail($_POST["_email"]);
      $userO->setTelNum($_POST["_telNum"]);
      $userO->setPoint($_POST["_mileage"]);
  
  
      echo "<br/>----------Unit Test----------";
	    echo "<br/>"."What To Do: ".$_WHAT_TO_DO;
	    echo "<br/>".$userO->getID();
	    echo "<br/>".$userO->getPswd();
	    echo "<br/>".$userO->getDate();
	    echo "<br/>".$userO->getName();
	    echo "<br/>".$userO->getZipCode();
	    echo "<br/>".$userO->getAddress();
	    echo "<br/>".$userO->getEmail();
	    echo "<br/>".$userO->getTelNum();
	    echo "<br/>".$userO->getPoint();
  
  
    }


    /* Account: Login */
    else if($_WHAT_TO_DO == 'LOGIN_ACCOUNT'){
  
      /* create new object */
      $userO = new User();
    
      /* set object member variable */
      $userO->setID($_POST["_userID"]);
      $userO->setPswd($_POST["_pswd"]);
  
  
      echo "<br/>----------Unit Test----------";
	    echo "<br/>"."What To Do: ".$_WHAT_TO_DO;
	    echo "<br/>".$userO->getID();
	    echo "<br/>".$userO->getPswd();
  
  
    }


    /* Account: Edit */
    else if($_WHAT_TO_DO == 'EDIT_ACCOUNT'){
  
      /* create new object */
      $userO = new User();
    
      /* set object member variable */
      $userO->setID($_POST["_userID"]);
      $userO->setPswd($_POST["_pswd"]);
      $userO->setName($_POST["_name"]);
      $userO->setDate($_POST["_joined_date"]);
      $userO->setZipCode($_POST["_zipCode"]);
      $userO->setAddress($_POST["_address"]);
      $userO->setEmail($_POST["_email"]);
      $userO->setTelNum($_POST["_telNum"]);
      $userO->setPoint($_POST["_mileage"]);
  
  
      echo "<br/>----------Unit Test----------";
	    echo "<br/>"."What To Do: ".$_WHAT_TO_DO;
	    echo "<br/>".$userO->getID();
	    echo "<br/>".$userO->getPswd();
	    echo "<br/>".$userO->getDate();
	    echo "<br/>".$userO->getName();
	    echo "<br/>".$userO->getZipCode();
	    echo "<br/>".$userO->getAddress();
	    echo "<br/>".$userO->getEmail();
	    echo "<br/>".$userO->getTelNum();
	    echo "<br/>".$userO->getPoint();
  
  
    }


    /* Account: Quit */
    else if($_WHAT_TO_DO == 'QUIT_ACCOUNT'){
  
      /* create new object */
      $userO = new User();
    
      /* set object member variable */
      $userO->setID($_POST["_userID"]);
      $userO->setPswd($_POST["_pswd"]);
  
  
      echo "<br/>----------Unit Test----------";
	    echo "<br/>"."What To Do: ".$_WHAT_TO_DO;
	    echo "<br/>".$userO->getID();
	    echo "<br/>".$userO->getPswd();
  
  
    }
  
  }


?>