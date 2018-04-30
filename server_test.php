<?php

  /* import classes */
  require_once("./bigDreamClasses.php");
  
  /* import modules */
  /* it's similar to include header in C, C++ */
  require_once("./admin_itemManagement.php");
  require_once("./admin_membershipManagement.php");
  require_once("./admin_orderManagement.php");
  
  require_once("./user_account.php");
  require_once("./user_order.php");



  /* server decides the action with this variable */
  /* server acts with many if-else statements */
  $_WHAT_TO_DO = $_POST["_WHAT_TO_DO"];




  /* execute each modules */
  exec_admin_itemManagement($_WHAT_TO_DO);
  exec_admin_membershipManagement($_WHAT_TO_DO);
  exec_admin_orderManagement($_WHAT_TO_DO);
  
  exec_user_account($_WHAT_TO_DO);
  exec_user_order($_WHAT_TO_DO);






?>