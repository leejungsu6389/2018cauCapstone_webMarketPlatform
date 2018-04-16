<?php

  /* import classes */
  require_once("./bigDreamClasses.php");

  /* server decides the action with this variable */
  /* server acts with many if-else statements */
  $_WHAT_TO_DO = $_POST["_WHAT_TO_DO"];



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

















  /* ============================================ */
  if($_WHAT_TO_DO == 'test'){
  
	  echo "WHAT_TO_DO: ".$_WHAT_TO_DO;

    /* 잘 작성했는지 테스트 해보기 */

	  /* 생성 */
	  $abc = new User();
	  $def = new Admin();
	  $ghi = new Item();
	  $jkl = new Cart();
	  $mno = new Order();


    /* test user */

    $abc->setID("kim");
    $abc->setPswd("1234");
    $abc->setDate(2018-4-8);
    $abc->setName("김철수");
    $abc->setZipCode("ㅁㄴㅇㄹ");
    $abc->setAddress("cau");
    $abc->setEmail("kim@naver.com");
    $abc->setTelNum("010-0000-0000");
    $abc->setPoint(10000);
  
    echo "<br/>----------User Test----------";
	  echo "<br/>id: ".$abc->getID();
	  echo "<br/>pswd: ".$abc->getPswd();
	  echo "<br/>date: ".$abc->getDate();
	  echo "<br/>name: ".$abc->getName();
	  echo "<br/>zipcode: ".$abc->getZipCode();
	  echo "<br/>addr: ".$abc->getAddress();
	  echo "<br/>email: ".$abc->getEmail();
	  echo "<br/>tel: ".$abc->getTelNum();
	  echo "<br/>point: ".$abc->getPoint();


  
    /* test Admin */

    $def->setID("admin01");
    $def->setPswd("password");
    $def->setAuthority(3);
  
    echo "<br/>----------Admin Test----------";
	  echo "<br/>id: ".$def->getID();
	  echo "<br/>pswd: ".$def->getPswd();
	  echo "<br/>autho: ".$def->getAuthority();
  
  }
  





?>