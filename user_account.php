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
      
      $dd = date("Y-m-d");
      $init_p = 1000;
    
      /* set object member variable */
      $userO->setID($_POST["_userID"]);
      $userO->setPswd($_POST["_pswd"]);
      $userO->setName($_POST["_name"]);
      
      $userO->setDate($dd);
      
      $userO->setZipCode($_POST["_zipCode"]);
      $userO->setAddress($_POST["_address"]);
      $userO->setEmail($_POST["_email"]);
      $userO->setTelNum($_POST["_telNum"]);
      
      $userO->setPoint($init_p);
  
  
      /*
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
      */
      
      
      /* import db connection header */
      require_once("./db_connect.php");
  
      
      /* using prepared statement */
      /* block the SQL injection */
      $sql = "INSERT INTO user(userID, pswd, name, joined_date, zipCode, address, email, telNum, mileage) 
              VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
  
      /* prepare */
      $stmt = $s->prepare($sql);
      
      /* bind */
      $stmt->bind_param("ssssssssi", $b_id, $b_pswd, $b_name, $b_joined_date, $b_zipCode, 
                        $b_address, $b_email, $b_telNum, $b_mileage);
                        
      /* set parameters */
      $b_id = $userO->getID();  
      $b_pswd = $userO->getPswd();  
      $b_name = $userO->getName();  
      $b_joined_date = $userO->getDate();  
      $b_zipCode = $userO->getZipCode();  
      
      $b_address = $userO->getAddress();  
      $b_email = $userO->getEmail();  
      $b_telNum = $userO->getTelNum();  
      $b_mileage = $userO->getPoint();  
      
      /* execute */
      $stmt->execute();
      
      $stmt->close();
      
      /* disconnect db */ 
      mysqli_close($s);
      
      echo"
        <script>
          alert('회원가입이 완료되었습니다. 로그인해주세요.');
          location.href='index.php';
        </script>
      
      ";
  
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
      
      
      /* import db connection header */
      require_once("./db_connect.php");
      
      /* using prepared statement */
      /* block the SQL injection */
      $sql = "SELECT * 
              FROM user 
              WHERE userID = ? AND pswd = ?";
  
      /* prepare */
      $stmt = $s->prepare($sql);
      
      /* bind */
      $stmt->bind_param("ss", $b_id, $b_pswd);
                        
      /* set parameters */
      $b_id = $userO->getID();  
      $b_pswd = $userO->getPswd();
      
      /* execute */
      $stmt->execute();
      
      /* get result */
      $result = $stmt->get_result();
      
      if($result->num_rows==0) exit('No rows');
      
      while($row = $result->fetch_assoc()){
      
        $ids[] = $row['userID'];
        $pswds[] = $row['pswd'];
      
      }
      
      var_export($ids);
      var_export($pswds);
      
      print $ids[0];
      print $pswds[0];
         
      $stmt->close();
      
      /* disconnect db */ 
      mysqli_close($s);
      

  
  
    }


    /* Account: Edit */
    else if($_WHAT_TO_DO == 'EDIT_ACCOUNT'){
  
      /* create new object */
      $userO = new User();
      
    
      /* set object member variable */
      $userO->setID($_POST["_userID"]);
      $userO->setPswd($_POST["_pswd"]);
      
      $new_pswd = $_POST["_pswd2"];
       
      $userO->setZipCode($_POST["_zipCode"]);
      $userO->setAddress($_POST["_address"]);
      $userO->setEmail($_POST["_email"]);
      $userO->setTelNum($_POST["_telNum"]);
      

  
  
      /*
      echo "<br/>----------Unit Test----------";
	    echo "<br/>"."What To Do: ".$_WHAT_TO_DO;
	    echo "<br/>".$userO->getID();
	    echo "<br/>".$userO->getPswd();
      
	    echo "<br/>".$new_pswd;
      
	    echo "<br/>".$userO->getZipCode();
	    echo "<br/>".$userO->getAddress();
	    echo "<br/>".$userO->getEmail();
	    echo "<br/>".$userO->getTelNum();
      */
      
      
      /* import db connection header */
      require_once("./db_connect.php");
  
      
      /* using prepared statement */
      /* block the SQL injection */
      $sql = "UPDATE user
              SET pswd = ?, zipCode = ?, address = ?, email = ?, telNum = ?
              WHERE userID = ? AND pswd = ?";
  
      /* prepare */
      $stmt = $s->prepare($sql);
      
      
      /* bind */
      $stmt->bind_param("sssssss", 
                        $b_pswd2, $b_zipCode, $b_address, $b_email, $b_telNum,
                        $b_id, $b_pswd);
                        
      /* set parameters */
      $b_id = $userO->getID();  
      $b_pswd = $userO->getPswd();  
      
      $b_pswd2 = $new_pswd; 
      
      $b_zipCode = $userO->getZipCode();      
      $b_address = $userO->getAddress();  
      $b_email = $userO->getEmail();  
      $b_telNum = $userO->getTelNum();  
      
      /* execute */
      $stmt->execute();
      
      $stmt->close();
      
      /* disconnect db */ 
      mysqli_close($s);
  
  
    }


    /* Account: Quit */
    else if($_WHAT_TO_DO == 'QUIT_ACCOUNT'){
  
      /* create new object */
      $userO = new User();
 
    
      /* set object member variable */
      $userO->setID($_POST["_userID"]);
      $userO->setPswd($_POST["_pswd"]);
      
      $sig = $_POST["_signature"];
      
  
      /*
      echo "<br/>----------Unit Test----------";
	    echo "<br/>"."What To Do: ".$_WHAT_TO_DO;
	    echo "<br/>".$userO->getID();
	    echo "<br/>".$userO->getPswd();
      
	    echo "<br/>".$new_pswd;
      
	    echo "<br/>".$userO->getZipCode();
	    echo "<br/>".$userO->getAddress();
	    echo "<br/>".$userO->getEmail();
	    echo "<br/>".$userO->getTelNum();
      */
      
      
      if($sig == '동의'){
      
        /* import db connection header */
        require_once("./db_connect.php");
  
      
        /* using prepared statement */
        /* block the SQL injection */
        $sql = "DELETE FROM user
                WHERE userID = ? AND pswd = ?";
  
        /* prepare */
        $stmt = $s->prepare($sql);
      
      
        /* bind */
        $stmt->bind_param("ss", 
                          $b_id, $b_pswd);
                        
        /* set parameters */
        $b_id = $userO->getID();  
        $b_pswd = $userO->getPswd();  
      
      
        /* execute */
        $stmt->execute();
      
        $stmt->close();
      
        /* disconnect db */ 
        mysqli_close($s);
  
      }
      else{
        print "do nothing";
      }
  
    }
  
  }


?>