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

    
    
    /* do order */
    else if($_WHAT_TO_DO == 'DO_ORDER'){
    
    
      if($_POST["_name"] == ""){
        echo"
          <script>
            alert('수령인 이름이 누락되었습니다.');
            location.href='index.php';
          </script>
      
        ";      
      }
      
      if($_POST["_zipCode"] == ""){
        echo"
          <script>
            alert('우편번호가 누락되었습니다.');
            location.href='index.php';
          </script>
      
        ";      
      }
    
      if($_POST["_address"] == ""){
        echo"
          <script>
            alert('수령주소가 누락되었습니다.');
            location.href='index.php';
          </script>
      
        ";      
      }

      if($_POST["_telNum"] == ""){
        echo"
          <script>
            alert('수령인 연락처가 누락되었습니다.');
            location.href='index.php';
          </script>
      
        ";      
      }
      
      

      $uid = $_POST["_userID"];
      
      
      $rcn = $_POST["_name"];
      $rcz = $_POST["_zipCode"];
      $rca = $_POST["_address"];
      $rct = $_POST["_telNum"];
      
      
        /* import db connection header */
      require_once("./db_connect.php");
        
      /* connect to mysql */
      $b = new mysqli(DB_SERVER, DB_USER, DB_PSWD, DB_NAME);
  
      if($b->connect_error){
      die("connection failed: ". $b->connect_error);
      }

      
      /* 1. 장바구니 내역을 받아와서 */
      /* using prepared statement */
      /* block the SQL injection */
      $sql = "SELECT * 
              FROM cart a NATURAL JOIN item b
              WHERE a.userID = ? AND a.itemID = b.itemID
              ORDER BY itemName ASC";
  
      /* prepare */
      $stmt = $b->prepare($sql);
      
      /* bind */
      $stmt->bind_param("s", $b_id);
  
          
      /* set parameters */
      $b_id = $uid;  
      
      /* execute */
      $stmt->execute();
      
      /* get result */
      $result = $stmt->get_result();
      
      
      while($row = $result->fetch_assoc()){
      
        $id[] = $row['itemID'];
        $name[] = $row['itemName'];
        $price[] = $row['price'];
        $category[] = $row['category'];
        $company[] = $row['company'];
        $description[] = $row['description'];
        $description2[] = $row['description2'];
        $description3[] = $row['description3'];
        $d[] = $row['date'];
    
        $isSoldout[] = $row['soldout'];
      }
    
      $stmt->close();
      
      /* disconnect db */ 
      mysqli_close($b);
   
      if(!isset($id)){  
        $arrLeng = 0;  
      }
      else{  
      /*count array length*/
       $arrLeng = count($id);
      }
  
  
  
  
      /* 2. 주문 내역에 삽입 */
    
      /* connect to mysql */
      $c = new mysqli(DB_SERVER, DB_USER, DB_PSWD, DB_NAME);
  
      if($b->connect_error){
      die("connection failed: ". $b->connect_error);
      }
  
      /* using prepared statement */
      /* block the SQL injection */
      $sql = "INSERT INTO 
              purchase(orderID, userID, itemID, date, recvName, recvZip, recvAddr, recvTel)
              VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
  
      /* prepare */
      $stmt = $c->prepare($sql);
    
      
      /* bind */
      $stmt->bind_param("ssisssss", $b_oid, $b_uid, $b_iid, $b_d, $b_rcvN, $b_rcvZ, $b_rcvA, $b_rcvT);
  
      $dd = date("Y-m-d");
  
    
      for($i=0; $i < $arrLeng; $i++){
          
      /* set parameters */
      $b_oid = $uid.'&&'.$dd;  
      $b_uid = $uid;
      $b_iid = $id[$i];
      $b_d = $dd;
      
      $b_rcvN = $rcn;
      $b_rcvZ = $rcz;
      $b_rcvA = $rca;
      $b_rcvT = $rct;
    
      /* execute */
      $stmt->execute();
    
      }

         
      $stmt->close();
      
      /* disconnect db */ 
      mysqli_close($c);
      
      
       echo"
        <script>
          location.href='kspay_wh_order.html';
        </script>
      
      ";
      
      
      
      /*
       echo"
        <script>
          alert('주문이 완료되었습니다.');
          location.href='index.php?clearCart=1';
        </script>
      
      ";
  
  */
  
      
      
  
    }
  }


?>